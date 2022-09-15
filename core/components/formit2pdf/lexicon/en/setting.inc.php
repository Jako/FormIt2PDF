<?php
/**
 * Setting Lexicon Entries for FormIt2PDF
 *
 * @package formit2pdf
 * @subpackage lexicon
 */
$_lang['area_pdf'] = 'PDF';
$_lang['area_template'] = 'Template';
$_lang['setting_formit2pdf.author'] = 'PDF Author';
$_lang['setting_formit2pdf.author_desc'] = 'Author of the PDF file.';
$_lang['setting_formit2pdf.creator'] = 'PDF Creator';
$_lang['setting_formit2pdf.creator_desc'] = 'Creator of the PDF file.';
$_lang['setting_formit2pdf.styleTpl'] = 'PDF style chunk';
$_lang['setting_formit2pdf.styleTpl_desc'] = 'Template chunk for the PDF style. You could use @FILE binding to retreive the chunk from a file.';
$_lang['setting_formit2pdf.customFonts'] = 'Custom Fonts';
$_lang['setting_formit2pdf.customFonts_desc'] = 'JSON encoded object of custom fonts, see <a href="https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html#example">Fonts</a> in the mPDF documentation for the array format. Please copy the font files to the folder referenced in the <strong>formit2pdf.customFontsFolder</strong> system setting.';
$_lang['setting_formit2pdf.customFontsFolder'] = 'Custom Fonts Folder';
$_lang['setting_formit2pdf.customFontsFolder_desc'] = 'Path to the custom fonts folder. If the path is not set or available, `formit2pdf.customFonts` is not used. The {core_path}, {base_path} and {assets_path} placeholders can be used in this setting.';
$_lang['setting_formit2pdf.debug'] = 'Debug';
$_lang['setting_formit2pdf.debug_desc'] = 'Log debug information in the MODX error log.';
$_lang['setting_formit2pdf.defaultFont'] = 'PDF default font';
$_lang['setting_formit2pdf.defaultFont_desc'] = 'Default font of the generated PDF.';
$_lang['setting_formit2pdf.defaultFontSize'] = 'PDF default font size';
$_lang['setting_formit2pdf.defaultFontSize_desc'] = 'Default font size of the generated PDF.';
$_lang['setting_formit2pdf.format'] = 'PDF page size';
$_lang['setting_formit2pdf.format_desc'] = 'If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).';
$_lang['setting_formit2pdf.mgb'] = 'PDF margin bottom';
$_lang['setting_formit2pdf.mgb_desc'] = 'Bottom Margin of the generated PDF.';
$_lang['setting_formit2pdf.mgf'] = 'PDF margin footer';
$_lang['setting_formit2pdf.mgf_desc'] = 'Footer Margin of the generated PDF.';
$_lang['setting_formit2pdf.mgh'] = 'PDF margin header';
$_lang['setting_formit2pdf.mgh_desc'] = 'Header Margin of the generated PDF.';
$_lang['setting_formit2pdf.mgl'] = 'PDF margin left';
$_lang['setting_formit2pdf.mgl_desc'] = 'Left Margin of the generated PDF.';
$_lang['setting_formit2pdf.mgr'] = 'PDF margin right';
$_lang['setting_formit2pdf.mgr_desc'] = 'Right Margin of the generated PDF.';
$_lang['setting_formit2pdf.mgt'] = 'PDF margin top';
$_lang['setting_formit2pdf.mgt_desc'] = 'Top Margin of the generated PDF.';
$_lang['setting_formit2pdf.mode'] = 'mPDF mode';
$_lang['setting_formit2pdf.mode_desc'] = 'See <a href="https://mpdf.github.io/reference/mpdf-functions/mpdf.html#parameters" target="_blank">mode parameter</a> and <a href="https://mpdf.github.io/fonts-languages/choosing-a-configuration-v5-x.html" target="_blank">choosing a configuration</a> in the mPDF documentation for possible values.';
$_lang['setting_formit2pdf.mPDFMethods'] = 'mPDF Methods';
$_lang['setting_formit2pdf.mPDFMethods_desc'] = 'JSON encoded array of callable mPDF method names.';
$_lang['setting_formit2pdf.orientation'] = 'PDF Orientation';
$_lang['setting_formit2pdf.orientation_desc'] = 'If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).';
$_lang['setting_formit2pdf.ownerPassword'] = 'PDF Owner Password';
$_lang['setting_formit2pdf.ownerPassword_desc'] = 'Password for full access and permissions to the generated PDF.';
$_lang['setting_formit2pdf.pdfTpl'] = 'PDF Content Chunk';
$_lang['setting_formit2pdf.pdfTpl_desc'] = 'Template chunk for the PDF content. You could use @FILE binding to retreive the chunk from a file.';
$_lang['setting_formit2pdf.permissions'] = 'PDF Permissions';
$_lang['setting_formit2pdf.permissions_desc'] = 'JSON encoded array of permissions granted to the end-user of the PDF file. see <a href="https://mpdf.github.io/reference/mpdf-functions/setprotection.html#parameters">permissions</a> in the mPDF documentation for possible values.';
$_lang['setting_formit2pdf.userPassword'] = 'PDF User Password';
$_lang['setting_formit2pdf.userPassword_desc'] = 'Password required to open the generated PDF.';
