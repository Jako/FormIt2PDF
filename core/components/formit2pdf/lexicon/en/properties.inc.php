<?php
/**
 * Properties Lexicon Entries for FormIt2PDF
 *
 * @package formit2pdf
 * @subpackage lexicon
 */
$_lang['area_pdf'] = 'PDF';
$_lang['formit2pdf.formit2pdf.pdfAuthor'] = 'Author of the PDF file';
$_lang['formit2pdf.formit2pdf.pdfCreator'] = 'Creator of the PDF file';
$_lang['formit2pdf.formit2pdf.pdfCustomFonts'] = 'JSON-encoded object of custom fonts, see <a href="https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html#example">Fonts</a> in the mPDF documentation for the array format. Please copy the font files to the folder referenced in the `pdfCustomFontsFolder` property or `formit2pdf.customFontsFolder` system setting.';
$_lang['formit2pdf.formit2pdf.pdfCustomFontsFolder'] = 'Path to the custom fonts folder. If the path is not set or available, the `pdfCustomFonts` property or the `formit2pdf.customFonts` system setting is not used. The {core_path}, {base_path} and {assets_path} placeholders can be used in this property.';
$_lang['formit2pdf.formit2pdf.pdfDefaultFont'] = 'Default font of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfDefaultFontSize'] = 'Default font size of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfFilename'] = 'Filename of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfFormat'] = 'PDF page size. If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).';
$_lang['formit2pdf.formit2pdf.pdfMgb'] = 'Bottom Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMgf'] = 'Footer Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMgh'] = 'Header Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMgl'] = 'Left Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMgr'] = 'Right Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMgt'] = 'Top Margin of the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfMode'] = 'mPDF mode. See <a href="https://mpdf.github.io/reference/mpdf-functions/mpdf.html#parameters" target="_blank">mode parameter</a> and <a href="https://mpdf.github.io/fonts-languages/choosing-a-configuration-v5-x.html" target="_blank">choosing a configuration</a> in the mPDF documentation for possible values.';
$_lang['formit2pdf.formit2pdf.pdfMPDFMethods'] = 'JSON-encoded array of callable mPDF method names';
$_lang['formit2pdf.formit2pdf.pdfMultiSeparator'] = 'The default separator for array values sent through checkboxes/multi-selects. Defaults to ’,’.';
$_lang['formit2pdf.formit2pdf.pdfOrientation'] = 'PDF Orientation. If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).';
$_lang['formit2pdf.formit2pdf.pdfOwnerPassword'] = 'Password for full access and permissions to the generated PDF';
$_lang['formit2pdf.formit2pdf.pdfPermissions'] = 'JSON-encoded array of permissions granted to the end-user of the PDF file. see <a href="https://mpdf.github.io/reference/mpdf-functions/setprotection.html#parameters">permissions</a> in the mPDF documentation for possible values.';
$_lang['formit2pdf.formit2pdf.pdfStationery'] = 'Specify an external PDF file to use as a stationery in the generated PDF. The last page of the exernal PDF file will be repeated, when the generated PDF contains more pages than the external PDF file. The {core_path}, {base_path} and {assets_path} placeholders can be used in this property.';
$_lang['formit2pdf.formit2pdf.pdfStyleTpl'] = 'Template chunk for the PDF style';
$_lang['formit2pdf.formit2pdf.pdfTextTpl'] = 'Template chunk for the PDF text';
$_lang['formit2pdf.formit2pdf.pdfTitle'] = 'Title of the PDF file';
$_lang['formit2pdf.formit2pdf.pdfUserPassword'] = 'Password required to open the generated PDF';
