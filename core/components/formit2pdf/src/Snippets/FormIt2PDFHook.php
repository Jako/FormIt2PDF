<?php
/**
 * FormIt2PDFHook Hook
 *
 * @package formit2pdf
 * @subpackage snippet
 */

namespace TreehillStudio\FormIt2PDF\Snippets;

use modPHPMailer;

class FormIt2PDFHook extends Hook
{
    /**
     * Get default snippet properties.
     *
     * @return array
     */
    public function getDefaultProperties()
    {
        return [
            'debug::bool' => $this->formit2pdf->getOption('debug', [], false),
            'filename' => 'attachment.pdf',
            'mode' => $this->formit2pdf->getOption('mode'),
            'format' => $this->formit2pdf->getOption('format'),
            'defaultFontSize' => $this->formit2pdf->getOption('defaultFontSize'),
            'defaultFont' => $this->formit2pdf->getOption('defaultFont'),
            'mgl' => $this->formit2pdf->getOption('mgl'),
            'mgr' => $this->formit2pdf->getOption('mgr'),
            'mgt' => $this->formit2pdf->getOption('mgt'),
            'mgb' => $this->formit2pdf->getOption('mgb'),
            'mgh' => $this->formit2pdf->getOption('mgh'),
            'mgf' => $this->formit2pdf->getOption('mgf'),
            'orientation' => $this->formit2pdf->getOption('orientation'),
            'customFonts' => $this->formit2pdf->getOption('customFonts'),
            'customFontsFolder' => $this->formit2pdf->getOption('customFontsFolder'),
            'textTpl' => $this->formit2pdf->getOption('textTpl'),
            'styleTpl' => $this->formit2pdf->getOption('styleTpl'),
            'title' => $this->modx->getOption('site_name'),
            'author' => $this->modx->getOption('site_name'),
            'userPassword' => $this->formit2pdf->getOption('userPassword'),
            'ownerPassword' => $this->formit2pdf->getOption('ownerPassword'),
            'permissions' => $this->formit2pdf->getOption('permissions'),
            'mPDFMethods' => $this->formit2pdf->getOption('mPDFMethods'),
            'multiSeparator' => $this->formit2pdf->getOption('multiSeparator'),
        ];
    }

    /**
     * Execute the hook and return success.
     *
     * @return bool
     * @throws /Exception
     */
    public function execute()
    {
        $pdfOptions = [
            'mode' => $this->getProperty('mode'),
            'format' => $this->getProperty('format'),
            'defaultFontSize' => $this->getProperty('defaultFontSize'),
            'defaultFont' => $this->getProperty('defaultFont'),
            'mgl' => $this->getProperty('mgl'),
            'mgr' => $this->getProperty('mgr'),
            'mgt' => $this->getProperty('mgt'),
            'mgb' => $this->getProperty('mgb'),
            'mgh' => $this->getProperty('mgh'),
            'mgf' => $this->getProperty('mgf'),
            'orientation' => $this->getProperty('orientation'),
            'customFonts' => $this->getProperty('customFonts'),
            'customFontsFolder' => $this->getProperty('customFontsFolder'),
            'pdfTpl' => $this->getProperty('textTpl'),
            'styleTpl' => $this->getProperty('styleTpl'),
            'title' => $this->getProperty('title'),
            'author' => $this->getProperty('author'),
            'creator' => $this->getProperty('creator'),
            'userPassword' => $this->getProperty('userPassword'),
            'ownerPassword' => $this->getProperty('ownerPassword'),
            'permissions' => $this->getProperty('permissions'),
            'mPDFMethods' => $this->getProperty('mPDFMethods'),
        ];

        $values = $this->hook->getValues();
        $formfields = [];
        foreach ($values as $key => &$value) {
            if (is_array($value)) {
                $value = implode($this->getProperty('multiSeparator'), $value);
            }
            $formfields[] = $key . ': ' . $value . "\n";
        }
        $formfields = implode("\n", $formfields);
        $values['formit2pdf.formfields'] = $formfields;
        $this->hook->setValue('formit2pdf.formfields', $formfields);

        $result = $this->formit2pdf->createPDF($values, $pdfOptions);

        if ($result) {
            /** @var modPHPMailer $mail */
            $mail = $this->hook->modx->getService('mail', 'mail.modPHPMailer');
            $mail->mailer->AddStringAttachment($result, $this->getProperty('filename'));
        } else {
            $this->hook->addError('formit2pdf', $this->modx->lexicon('formit2pdf.error_create_pdf'));
            return false;
        }

        return true;
    }
}
