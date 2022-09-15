## How it works

The FormIt hook uses the following properties. Most of the properties default to the value of the according system setting in the `formit2pdf` namespace.

### Hook Properties

| Property          | Description                                                                                                                                                                                                                                                                       | Default          |
|-------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------|
| author            | Author of the PDF file                                                                                                                                                                                                                                                            | (system setting) |
| creator           | Creator of the PDF file                                                                                                                                                                                                                                                           | attachment.pdf   |
| styleTpl          | Template chunk for the PDF style                                                                                                                                                                                                                                                  | (system setting) |
| customFonts       | JSON encoded object of custom fonts, see [Fonts](https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html#example) in the mPDF documentation for the array format. Please copy the font files to the folder referenced in the `formit2pdf.customFontsFolder` system setting. | (system setting) |
| customFontsFolder | Path to the custom fonts folder. If the path is not set or available, `formit2pdf.customFonts` is not used. The {core_path}, {base_path} and {assets_path} placeholders can be used in this setting.                                                                              | (system setting) |
| defaultFont       | Default font of the generated PDF                                                                                                                                                                                                                                                 | (system setting) |
| defaultFontSize   | Default font size of the generated PDF                                                                                                                                                                                                                                            | (system setting) |
| filename          | Filename of the generated PDF                                                                                                                                                                                                                                                     | (system setting) |
| format            | PDF page size. If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).                                                                                                                                    | (system setting) |
| mPDFMethods       | JSON encoded array of callable mPDF method names                                                                                                                                                                                                                                  | (system setting) |
| mgb               | Bottom Margin of the generated PDF                                                                                                                                                                                                                                                | (system setting) |
| mgf               | Footer Margin of the generated PDF                                                                                                                                                                                                                                                | (system setting) |
| mgh               | Header Margin of the generated PDF                                                                                                                                                                                                                                                | (system setting) |
| mgl               | Left Margin of the generated PDF                                                                                                                                                                                                                                                  | (system setting) |
| mgr               | Right Margin of the generated PDF                                                                                                                                                                                                                                                 | (system setting) |
| mgt               | Top Margin of the generated PDF                                                                                                                                                                                                                                                   | (system setting) |
| mode              | mPDF mode. See [mode parameter](https://mpdf.github.io/reference/mpdf-functions/mpdf.html#parameters) and [choosing a configuration](https://mpdf.github.io/fonts-languages/choosing-a-configuration-v5-x.html) in the mPDF documentation for possible values.                    | (system setting) |
| orientation       | PDF Orientation. If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).                                                                                                                                  | (system setting) |
| ownerPassword     | Password for full access and permissions to the generated PDF                                                                                                                                                                                                                     | (system setting) |
| permissions       | JSON encoded array of permissions granted to the end-user of the PDF file. see [permissions](https://mpdf.github.io/reference/mpdf-functions/setprotection.html#parameters) in the mPDF documentation for possible values.                                                                                                                                 | (system setting) |
| textTpl           | Template chunk for the PDF text                                                                                                                                                                                                                                                   | (system setting) |
| title             | Title of the PDF file                                                                                                                                                                                                                                                             | (system setting) |
| userPassword      | Password required to open the generated PDF                                                                                                                                                                                                                                       | (system setting) |

### System Settings

If you use the FormIt hook multiple on the website, it is easier to set the default snippet properties with the following system settings.

| Setting           | Description                                                                                                                                                                                                                                                                       | Default                               |
|-------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------|
| author            | Author of the PDF file.                                                                                                                                                                                                                                                           | {site_name}                           |
| creator           | Creator of the PDF file.                                                                                                                                                                                                                                                          | {site_url} powered by FormIt2PDF/mPDF |
| styleTpl          | Template chunk for the PDF style. You could use @FILE binding to retreive the chunk from a file.                                                                                                                                                                                  | tplFormIt2PDFStyle                    |
| customFonts       | JSON encoded object of custom fonts, see [Fonts](https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html#example) in the mPDF documentation for the array format. Please copy the font files to the folder referenced in the `formit2pdf.customFontsFolder` system setting. | -                                     |
| customFontsFolder | Path to the custom fonts folder. If the path is not set or available, `formit2pdf.customFonts` is not used. The {core_path}, {base_path} and {assets_path} placeholders can be used in this setting.                                                                              | {core_path}components/customfonts/    |
| debug             | Log debug information in the MODX error log.                                                                                                                                                                                                                                      | No                                    |
| defaultFont       | Default font of the generated PDF.                                                                                                                                                                                                                                                | -                                     |
| defaultFontSize   | Default font size of the generated PDF.                                                                                                                                                                                                                                           | -                                     |
| format            | If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).                                                                                                                                                   | A4                                    |
| mgb               | Bottom Margin of the generated PDF.                                                                                                                                                                                                                                               | 16                                    |
| mgf               | Footer Margin of the generated PDF.                                                                                                                                                                                                                                               | 9                                     |
| mgh               | Header Margin of the generated PDF.                                                                                                                                                                                                                                               | 9                                     |
| mgl               | Left Margin of the generated PDF.                                                                                                                                                                                                                                                 | 15                                    |
| mgr               | Right Margin of the generated PDF.                                                                                                                                                                                                                                                | 15                                    |
| mgt               | Top Margin of the generated PDF.                                                                                                                                                                                                                                                  | 16                                    |
| mode              | See [mode parameter](https://mpdf.github.io/reference/mpdf-functions/mpdf.html#parameters) and [choosing a configuration](https://mpdf.github.io/fonts-languages/choosing-a-configuration-v5-x.html) in the mPDF documentation for possible values.                               | -                                     |
| mPDFMethods       | JSON encoded array of callable mPDF method names.                                                                                                                                                                                                                                 | -                                     |
| orientation       | If you want to change the orientation of a "named" PDF page size you have to append -L to the PDF page size string (i.e. A4-L).                                                                                                                                                   | P                                     |
| ownerPassword     | Password for full access and permissions to the generated PDF.                                                                                                                                                                                                                    | -                                     |
| textTpl           | Template chunk for the PDF content. You could use @FILE binding to retreive the chunk from a file.                                                                                                                                                                                | tplFormIt2PDFText                     |
| permissions       | JSON encoded array of permissions granted to the end-user of the PDF file. see [permissions](https://mpdf.github.io/reference/mpdf-functions/setprotection.html#parameters) in the mPDF documentation for possible values.                                             | -                                     |
| userPassword      | Password required to open the generated PDF.                                                                                                                                                                                                                                      | -                                     |