// Google Apps Script for posting registration form data to your Google Sheet
// 1. Open Google Apps Script at https://script.google.com
// 2. Paste this code into a new project
// 3. Replace the spreadsheet ID below if needed
// 4. Deploy as a web app and copy the web app URL into the WordPress plugin

const SPREADSHEET_ID = '1sf_l8tJWJCl4VtV_Dbs-_RQO0PeAz2eaIjea-GM85Hw';

function doPost(e) {
  try {
    const data = JSON.parse(e.postData.contents);
    const spreadsheet = SpreadsheetApp.openById(SPREADSHEET_ID);
    const sheet = spreadsheet.getActiveSheet();

    if (sheet.getLastRow() === 0) {
      sheet.appendRow(['Timestamp', 'Name', 'Email', 'Team', 'Captain', 'Instagram', 'Event']);
    }

    sheet.appendRow([
      data.timestamp || '',
      data.name || '',
      data.email || '',
      data.team || '',
      data.captain || '',
      data.instagram || '',
      data.event || ''
    ]);

    return ContentService
      .createTextOutput(JSON.stringify({ success: true }))
      .setMimeType(ContentService.MimeType.JSON);
  } catch (error) {
    return ContentService
      .createTextOutput(JSON.stringify({ success: false, error: error.toString() }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}
