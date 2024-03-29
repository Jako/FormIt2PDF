<?php
/**
 * FormIt2PDF
 *
 * Copyright 2012-2016 by Alan Pich <alan.pich@gmail.com>
 * Copyright 2016-2021 by Thomas Jakobi <office@treehillstudio.com>
 *
 * @package formit2pdf
 * @subpackage classfile
 */

namespace TreehillStudio\FormIt2PDF;

use modX;
use Mpdf\MpdfException;
use xPDO;

/**
 * Class FormIt2PDF
 */
class FormIt2PDF
{
    /**
     * A reference to the modX instance
     * @var modX $modx
     */
    public $modx;

    /**
     * The namespace
     * @var string $namespace
     */
    public $namespace = 'formit2pdf';

    /**
     * The package name
     * @var string $packageName
     */
    public $packageName = 'FormIt2PDF';

    /**
     * The version
     * @var string $version
     */
    public $version = '1.0.2';

    /**
     * The class options
     * @var array $options
     */
    public $options = [];

    /**
     * An modPDF object instance
     * @var modPDF $pdf
     */
    public $pdf;

    /**
     * Template cache
     * @var array $_tplCache
     */
    private $_tplCache;

    /**
     * Valid binding types
     * @var array $_validTypes
     */
    private $_validTypes = [
        '@CHUNK',
        '@FILE',
        '@INLINE'
    ];

    /**
     * FormIt2PDF constructor
     *
     * @param modX $modx A reference to the modX instance.
     * @param array $options An array of options. Optional.
     */
    public function __construct(modX &$modx, $options = [])
    {
        $this->modx =& $modx;
        $this->namespace = $this->getOption('namespace', $options, $this->namespace);

        $corePath = $this->getOption('core_path', $options, $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/' . $this->namespace . '/');
        $assetsPath = $this->getOption('assets_path', $options, $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH) . 'components/' . $this->namespace . '/');
        $assetsUrl = $this->getOption('assets_url', $options, $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/' . $this->namespace . '/');
        $modxversion = $this->modx->getVersionData();

        // Load some default paths for easier management
        $this->options = array_merge([

            'namespace' => $this->namespace,
            'version' => $this->version,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'vendorPath' => $corePath . 'vendor/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'pagesPath' => $corePath . 'elements/pages/',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'pluginsPath' => $corePath . 'elements/plugins/',
            'controllersPath' => $corePath . 'controllers/',
            'processorsPath' => $corePath . 'processors/',
            'templatesPath' => $corePath . 'templates/',
            'assetsPath' => $assetsPath,
            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'imagesUrl' => $assetsUrl . 'images/',
            'connectorUrl' => $assetsUrl . 'connector.php'
        ], $options);

        $lexicon = $this->modx->getService('lexicon', 'modLexicon');
        $lexicon->load($this->namespace . ':default');

        $this->packageName = $this->modx->lexicon('formit2pdf');

        $this->modx->addPackage($this->namespace, $this->getOption('modelPath'));

        // Add default options
        $this->options = array_merge($this->options, [
            'debug' => (bool)$this->modx->getOption($this->namespace . '.debug', $options, false),
            'modxversion' => $modxversion['version'],
            'mode' => $this->modx->getOption($this->namespace . '.mode', [], ''),
            'format' => $this->modx->getOption($this->namespace . '.format', [], 'A4'),
            'defaultFontSize' => (int)$this->modx->getOption($this->namespace . '.defaultFontSize', [], 0),
            'defaultFont' => $this->modx->getOption($this->namespace . '.defaultFont', [], ''),
            'mgl' => (int)$this->modx->getOption($this->namespace . '.mgl', [], 15),
            'mgr' => (int)$this->modx->getOption($this->namespace . '.mgr', [], 15),
            'mgt' => (int)$this->modx->getOption($this->namespace . '.mgt', [], 16),
            'mgb' => (int)$this->modx->getOption($this->namespace . '.mgb', [], 16),
            'mgh' => (int)$this->modx->getOption($this->namespace . '.mgh', [], 9),
            'mgf' => (int)$this->modx->getOption($this->namespace . '.mgf', [], 9),
            'orientation' => $this->modx->getOption($this->namespace . '.orientation', [], 'P'),
            'customFonts' => json_decode($this->modx->getOption($this->namespace . '.customFonts', [], '[]'), true),
            'customFontsFolder' => $this->modx->getOption($this->namespace . '.customFontsFolder', [], '{core_path}components/customfonts/'),
            'textTpl' => $this->modx->getOption($this->namespace . '.textTpl', [], 'tplFormIt2PDFText'),
            'styleTpl' => $this->modx->getOption($this->namespace . '.styleTpl', [], 'tplFormIt2PDFStyle'),
            'userPassword' => $this->modx->getOption($this->namespace . '.userPassword', [], ''),
            'ownerPassword' => $this->modx->getOption($this->namespace . '.ownerPassword', [], ''),
            'permissions' => $this->modx->getOption($this->namespace . '.permissions', [], ''),
            'mPDFMethods' => $this->modx->getOption($this->namespace . '.mPDFMethods', [], ''),
            'multiSeparator' => $this->modx->getOption($this->namespace . '.multiSeparator', [], ', '),
        ]);
    }

    /**
     * Get a local configuration option or a namespaced system setting by key.
     *
     * @param string $key The option key to search for.
     * @param array $options An array of options that override local options.
     * @param mixed $default The default value returned if the option is not found locally or as a
     * namespaced system setting; by default this value is null.
     * @return mixed The option value or the default value specified.
     */
    public function getOption($key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->options)) {
                $option = $this->options[$key];
            } elseif (array_key_exists("$this->namespace.$key", $this->modx->config)) {
                $option = $this->modx->getOption("$this->namespace.$key");
            }
        }
        return $option;
    }

    /**
     * Initialize the modPDF class
     *
     * @param array $options The PDF options.
     * @throws MpdfException
     */
    public function initPDF($options)
    {
        $this->pdf = new modPDF($this->modx, [
            'mode' => $this->getOption('mode', $options),
            'format' => $this->getOption('format', $options),
            'defaultFontSize' => $this->getOption('defaultFontSize', $options),
            'defaultFont' => $this->getOption('defaultFont', $options),
            'mgl' => $this->getOption('mgl', $options),
            'mgr' => $this->getOption('mgr', $options),
            'mgt' => $this->getOption('mgt', $options),
            'mgb' => $this->getOption('mgb', $options),
            'mgh' => $this->getOption('mgh', $options),
            'mgf' => $this->getOption('mgf', $options),
            'orientation' => $this->getOption('orientation', $options),
            'customFonts' => $this->getOption('customFonts', $options),
            'customFontsFolder' => $this->getOption('customFontsFolder', $options)
        ]);
    }

    /**
     * Create a PDF with the options set in the class
     *
     * @return string The PDF content.
     */
    public function createPDF($placeholder, $pdfOptions)
    {
        // Get options
        $pdfTpl = $this->getOption('pdfTpl', $pdfOptions, 'tplPDF');
        $styleTpl = $this->getOption('styleTpl', $pdfOptions, 'tplCSS');

        // Parse template chunks
        $placeholder['tplPath'] = $this->getOption('assets_path');
        $html = $this->getChunk($pdfTpl, $placeholder);
        $css = $this->getChunk($styleTpl, $placeholder);
        unset($placeholder);

        if ($this->getOption('debug')) {
            $mode = $this->modx->getOption('mode', $_REQUEST, '');
            switch ($mode) {
                case 'html':
                    echo $html;
                    @session_write_close();
                    exit;
                case 'css':
                    echo $css;
                    @session_write_close();
                    exit;
            }
        }

        try {
            // Generate PDF file
            $this->initPDF([
                'mode' => $this->getOption('mode', $pdfOptions, 'utf-8'),
                'format' => $this->getOption('format', $pdfOptions, 'A4'),
                'defaultFontSize' => intval($this->getOption('defaultFontSize', $pdfOptions, 8)),
                'defaultFont' => $this->getOption('defaultFont', $pdfOptions, ''),
                'mgl' => intval($this->getOption('mgl', $pdfOptions, 10)),
                'mgr' => intval($this->getOption('mgr', $pdfOptions, 10)),
                'mgt' => intval($this->getOption('mgt', $pdfOptions, 7)),
                'mgb' => intval($this->getOption('mgb', $pdfOptions, 7)),
                'mgh' => intval($this->getOption('mgh', $pdfOptions, 10)),
                'mgf' => intval($this->getOption('mgf', $pdfOptions, 10)),
                'orientation' => $this->getOption('orientation', $pdfOptions, 'P'),
                'customFonts' => $this->getOption('customFonts', $pdfOptions, '[]')
            ]);

            $this->pdf->SetTitle($this->getOption('title', $pdfOptions, $this->modx->getOption('site_name')));
            $this->pdf->SetAuthor($this->getOption('author', $pdfOptions, $this->modx->getOption('site_name')));
            $this->pdf->SetCreator($this->getOption('creator', $pdfOptions, $this->modx->getOption('site_url') . ' powered by ' . $this->modx->lexicon('formit2pdf') . '/mPDF'));

            // Password protection
            $userPassword = $this->getOption('userPassword', $pdfOptions, '');
            $ownerPassword = $this->getOption('ownerPassword', $pdfOptions, '');
            $permissions = json_decode($this->getOption('permissions', $pdfOptions, ''), true);
            if ($userPassword || $ownerPassword) {
                // Set default permissions if needed
                $permissions = ($permissions) ?: [];
                // Random owner password if needed
                $ownerPassword = ($ownerPassword) ?: null;
                $this->pdf->SetProtection($permissions, $userPassword, $ownerPassword, 128);
            }

            // Call additional mPDF methods
            $mpdfMethods = json_decode($this->getOption('mPDFMethods', $pdfOptions, ''), true);
            $mpdfMethods = (is_array($mpdfMethods)) ? $mpdfMethods : [];
            foreach ($mpdfMethods as $methodName) {
                $value = $this->getOption($methodName, $pdfOptions, '');
                $value = (is_array($value)) ? $value : json_decode($value, true);
                if ($value && method_exists($this->pdf, $methodName)) {
                    call_user_func_array([$this->pdf, $methodName], $value);
                }
            }

            $this->pdf->WriteHTML($css, 1);
            $this->pdf->WriteHTML($html, 2);

            return $this->pdf->Output('', 'S');
        } catch (MpdfException $e) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not generate the pdf: ' . $e->getMessage(), '', 'PDFResource');
            return '';
        }
    }

    /**
     * Parse a chunk (with template bindings)
     * Modified parseTplElement method from getResources package (https://github.com/opengeek/getResources)
     *
     * @param string type The template binding type.
     * @param string $source The source of the parsed template (depends on template binding type).
     * @param array|null $properties An array of options.
     * @return string|bool The parsed chunk or false.
     */
    private function parseChunk($type, $source, $properties = null)
    {
        $output = false;

        if (!is_string($type) || !in_array($type, $this->_validTypes)) {
            $type = $this->modx->getOption('tplType', $properties, '@CHUNK');
        }

        $content = false;
        switch ($type) {
            case '@FILE':
                $path = $this->modx->getOption('tplPath', $properties, $this->modx->getOption('assets_path', $properties, MODX_ASSETS_PATH) . 'elements/chunks/');
                $key = $path . $source;
                if (!isset($this->_tplCache['@FILE'])) {
                    $this->_tplCache['@FILE'] = [];
                }
                if (!array_key_exists($key, $this->_tplCache['@FILE'])) {
                    if (file_exists($key)) {
                        $content = file_get_contents($key);
                    }
                    $this->_tplCache['@FILE'][$key] = $content;
                } else {
                    $content = $this->_tplCache['@FILE'][$key];
                }
                if (!empty($content) && $content !== '0') {
                    $chunk = $this->modx->newObject('modChunk', ['name' => $key]);
                    $chunk->setCacheable(false);
                    $output = $chunk->process($properties, $content);
                }
                break;
            case '@INLINE':
                $uniqid = uniqid();
                $chunk = $this->modx->newObject('modChunk', ['name' => "$type-$uniqid"]);
                $chunk->setCacheable(false);
                $output = $chunk->process($properties, $source);
                break;
            case '@CHUNK':
            default:
                $chunk = null;
                if (!isset($this->_tplCache['@CHUNK'])) {
                    $this->_tplCache['@CHUNK'] = [];
                }
                if (!array_key_exists($source, $this->_tplCache['@CHUNK'])) {
                    if ($chunk = $this->modx->getObject('modChunk', ['name' => $source])) {
                        $this->_tplCache['@CHUNK'][$source] = $chunk->toArray('', true);
                    } else {
                        $this->_tplCache['@CHUNK'][$source] = false;
                    }
                } elseif (is_array($this->_tplCache['@CHUNK'][$source])) {
                    $chunk = $this->modx->newObject('modChunk');
                    $chunk->fromArray($this->_tplCache['@CHUNK'][$source], '', true, true, true);
                }
                if (is_object($chunk)) {
                    $chunk->setCacheable(false);
                    $output = $chunk->process($properties);
                }
                break;
        }
        return $output;
    }

    /**
     * Get and parse a chunk (with template bindings)
     * Modified parseTpl method from getResources package (https://github.com/opengeek/getResources)
     *
     * @param string $tpl The template to parse
     * @param array|null $properties An array of options.
     * @return string|bool The parsed chunk or false.
     */
    public function getChunk($tpl, $properties = null)
    {
        $output = false;
        if (!empty($tpl)) {
            $bound = [
                'type' => '@CHUNK',
                'value' => $tpl
            ];
            if (strpos($tpl, '@') === 0) {
                $endPos = strpos($tpl, ' ');
                if ($endPos > 2 && $endPos < 10) {
                    $tt = substr($tpl, 0, $endPos);
                    if (in_array($tt, $this->_validTypes)) {
                        $bound['type'] = $tt;
                        $bound['value'] = substr($tpl, $endPos + 1);
                    }
                }
            }
            if (is_array($bound) && isset($bound['type']) && isset($bound['value'])) {
                $output = $this->parseChunk($bound['type'], $bound['value'], $properties);
            }
        }
        return $output;
    }
}
