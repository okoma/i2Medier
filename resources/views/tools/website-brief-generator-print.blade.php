<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Website Brief Print | i2Medier</title>
    @vite('resources/css/public/pages/website-brief-print.css')
</head>
<body id="website-brief-print-page">
    <div class="print-shell" data-storage-key="i2medierWebsiteBriefPrintPayload">
        <div class="print-toolbar">
            <div class="print-toolbar__title">Website Brief Preview</div>
            <div class="print-toolbar__actions">
                <button class="print-toolbar__button" type="button" onclick="window.print()">Print / Save PDF</button>
                <button class="print-toolbar__button print-toolbar__button--light" type="button" onclick="window.close()">Close</button>
            </div>
        </div>

        <main class="print-stage">
            <div id="brief-document" class="brief-document"></div>

            <div id="print-empty-state" class="print-empty-state" hidden>
                <h1>No website brief found</h1>
                <p>Generate a brief first, then open the print view again.</p>
            </div>
        </main>
    </div>

    @vite('resources/js/public/pages/tool-website-brief-print.js')
</body>
</html>
