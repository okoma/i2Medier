<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Invoice Print | i2Medier</title>
    @vite('resources/css/public/pages/invoice-generator-print.css')
</head>
<body id="invoice-generator-print-page">
    <div class="print-shell" data-storage-key="i2medierInvoicePrintPayload">
        <div class="print-toolbar">
            <div class="print-toolbar__title">Invoice Preview</div>
            <div class="print-toolbar__actions">
                <button class="print-toolbar__button" type="button" onclick="window.print()">Print / Save PDF</button>
                <button class="print-toolbar__button print-toolbar__button--light" type="button" onclick="window.close()">Close</button>
            </div>
        </div>

        <main class="print-stage">
            <div id="invoice-document" class="invoice-document"></div>
            <div id="print-empty-state" class="print-empty-state" hidden>
                <h1>No invoice found</h1>
                <p>Create or load an invoice first, then open the print view again.</p>
            </div>
        </main>
    </div>

    @vite('resources/js/public/pages/tool-invoice-generator-print.js')
</body>
</html>
