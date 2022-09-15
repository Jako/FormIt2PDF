<?php
/**
 * FormIt2PDF
 *
 * @package formit2pdf
 * @subpackage hook
 *
 * @var modX $modx
 * @var array $scriptProperties
 * @var fiHooks $hook
 */

use TreehillStudio\FormIt2PDF\Snippets\FormIt2PDFHook;

$corePath = $modx->getOption('formit2pdf.core_path', null, $modx->getOption('core_path') . 'components/formit2pdf/');
/** @var FormIt2PDF $formit2pdf */
$formit2pdf = $modx->getService('formit2pdf', 'FormIt2PDF', $corePath . 'model/formit2pdf/', [
    'core_path' => $corePath
]);

$snippet = new FormIt2PDFHook($modx, $hook, $scriptProperties);
if ($snippet instanceof TreehillStudio\FormIt2PDF\Snippets\FormIt2PDFHook) {
    return $snippet->execute();
}
return 'TreehillStudio\FormIt2PDF\Snippets\FormIt2PDFHook class not found';
