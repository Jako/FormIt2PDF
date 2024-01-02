<?php
/**
 * Setting Lexicon Entries for FormIt2PDF
 *
 * @package formit2pdf
 * @subpackage lexicon
 */
$_lang['area_pdf'] = 'PDF';
$_lang['area_template'] = 'Template';
$_lang['setting_formit2pdf.author'] = 'PDF Autor';
$_lang['setting_formit2pdf.author_desc'] = 'Autor der PDF-Datei.';
$_lang['setting_formit2pdf.creator'] = 'PDF-Ersteller';
$_lang['setting_formit2pdf.creator_desc'] = 'Ersteller der PDF-Datei.';
$_lang['setting_formit2pdf.styleTpl'] = 'PDF-Style-Chunk';
$_lang['setting_formit2pdf.styleTpl_desc'] = 'Template-Chunk für den PDF-Style. Sie könnten die @FILE-Bindung verwenden, um den Chunk aus einer Datei abzurufen.';
$_lang['setting_formit2pdf.customFonts'] = 'Benutzerdefinierte Schriftarten';
$_lang['setting_formit2pdf.customFonts_desc'] = 'JSON-kodiertes Objekt mit benutzerdefinierten Schriftarten, siehe <a href="https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html#example">Fonts</a> in der mPDF-Dokumentation für das Array-Format. Bitte kopieren Sie die Schriftdateien in den Ordner, auf den in der Systemeinstellung <strong>formit2pdf.customFontsFolder</strong> verwiesen wird.';
$_lang['setting_formit2pdf.customFontsFolder'] = 'Ordner für benutzerdefinierte Schriftarten';
$_lang['setting_formit2pdf.customFontsFolder_desc'] = 'Pfad zum Ordner mit den benutzerdefinierten Schriftarten. Wenn der Pfad nicht festgelegt oder verfügbar ist, wird "formit2pdf.customFonts" nicht verwendet. Die Platzhalter {core_path}, {base_path} und {assets_path} können für diese Einstellung verwendet werden.';
$_lang['setting_formit2pdf.debug'] = 'Debug';
$_lang['setting_formit2pdf.debug_desc'] = 'Debug-Informationen im MODX Fehlerprotokoll ausgeben.';
$_lang['setting_formit2pdf.defaultFont'] = 'PDF-Standardschriftart';
$_lang['setting_formit2pdf.defaultFont_desc'] = 'Standardschriftart der generierten PDF-Datei.';
$_lang['setting_formit2pdf.defaultFontSize'] = 'PDF-Standard-Schriftgröße';
$_lang['setting_formit2pdf.defaultFontSize_desc'] = 'Standard-Schriftgröße der generierten PDF-Datei.';
$_lang['setting_formit2pdf.format'] = 'PDF-Seitengröße';
$_lang['setting_formit2pdf.format_desc'] = 'Wenn Sie die Ausrichtung einer "benannten" PDF-Seitengröße ändern möchten, müssen Sie -L an den String für die PDF-Seitengröße anhängen (z. B. A4-L).';
$_lang['setting_formit2pdf.mgb'] = 'PDF-Rand unten';
$_lang['setting_formit2pdf.mgb_desc'] = 'Unterer Rand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mgf'] = 'PDF-Fußzeilenrand';
$_lang['setting_formit2pdf.mgf_desc'] = 'Fußzeilenrand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mgh'] = 'PDF-Kopfzeilenrand';
$_lang['setting_formit2pdf.mgh_desc'] = 'Kopfzeilenrand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mgl'] = 'PDF-Rand links';
$_lang['setting_formit2pdf.mgl_desc'] = 'Linker Rand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mgr'] = 'PDF-Rand rechts';
$_lang['setting_formit2pdf.mgr_desc'] = 'Rechter Rand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mgt'] = 'PDF-Rand oben';
$_lang['setting_formit2pdf.mgt_desc'] = 'Oberer Rand der generierten PDF-Datei.';
$_lang['setting_formit2pdf.mode'] = 'mPDF-Modus';
$_lang['setting_formit2pdf.mode_desc'] = 'Mögliche Werte finden Sie auf den Seiten <a href="https://mpdf.github.io/reference/mpdf-functions/mpdf.html#parameters" target="_blank">Modus Parameter</a> und <a href="https://mpdf.github.io/fonts-languages/choosing-a-configuration-v5-x.html" target="_blank">Auswahl einer Konfiguration</a> in der mPDF-Dokumentation.';
$_lang['setting_formit2pdf.mPDFMethods'] = 'mPDF-Methoden';
$_lang['setting_formit2pdf.mPDFMethods_desc'] = 'JSON-kodiertes Array von aufrufbaren mPDF-Methodennamen.';
$_lang['setting_formit2pdf.orientation'] = 'PDF-Ausrichtung';
$_lang['setting_formit2pdf.orientation_desc'] = 'Wenn Sie die Ausrichtung einer "benannten" PDF-Seitengröße ändern möchten, müssen Sie -L an den String für die PDF-Seitengröße anhängen (z. B. A4-L).';
$_lang['setting_formit2pdf.ownerPassword'] = 'PDF-Eigentümer-Passwort';
$_lang['setting_formit2pdf.ownerPassword_desc'] = 'Kennwort für den vollen Zugriff und für die Berechtigungen der generierten PDF-Datei.';
$_lang['setting_formit2pdf.textTpl'] = 'PDF-Inhalt-Chunk';
$_lang['setting_formit2pdf.textTpl_desc'] = 'Template-Chunk für den PDF-Inhalt. Sie könnten die @FILE-Bindung verwenden, um den Chunk aus einer Datei abzurufen.';
$_lang['setting_formit2pdf.permissions'] = 'PDF-Berechtigungen';
$_lang['setting_formit2pdf.permissions_desc'] = 'JSON-kodiertes Array von Berechtigungen, die dem Endbenutzer der PDF-Datei gewährt werden. Mögliche Werte finden Sie auf der Seite <a href="https://mpdf.github.io/reference/mpdf-functions/setprotection.html#parameters">Berechtigungen</a> in der mPDF-Dokumentation.';
$_lang['setting_formit2pdf.userPassword'] = 'PDF-Benutzerpasswort';
$_lang['setting_formit2pdf.userPassword_desc'] = 'Kennwort zum Öffnen der generierte PDF-Datei.';
