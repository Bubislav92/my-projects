<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Payment Confirmation</title>
    <style>
        /*
         * General PDF Styling Considerations:
         * - Use absolute units (px, pt, mm, cm) for better predictability.
         * - Embed fonts or use common system fonts if you encounter font issues.
         * - Avoid complex CSS properties like 'flexbox' or 'grid' if your PDF generator struggles.
         */
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif; /* More common for PDFs */
            color: #333;
            line-height: 1.6;
            font-size: 10pt; /* Using pt for PDF consistency */
            margin: 0; /* Remove default body margin */
            padding: 0;
            -webkit-print-color-adjust: exact; /* Ensure background colors are printed */
            print-color-adjust: exact; /* Standard property for compatibility */
        }

        .invoice-container {
            width: 100%;
            padding: 20pt; /* Padding for the entire document */
            box-sizing: border-box; /* Include padding in element's total width/height */
        }

        .header-bar {
            background-color: #f2f2f2;
            padding: 15pt 20pt;
            border-bottom: 1px solid #eee;
            margin-bottom: 30pt;
            text-align: center;
        }

        .header-bar h1 {
            margin: 0;
            color: #007bff; /* A nice blue for branding */
            font-size: 18pt;
            font-weight: normal;
        }

        .section-title {
            font-size: 14pt;
            color: #555;
            margin-bottom: 15pt;
            border-bottom: 1px solid #eee;
            padding-bottom: 5pt;
        }

        .info-block {
            margin-bottom: 20pt;
            font-size: 10pt;
        }

        .info-block p {
            margin: 0 0 5pt 0;
        }

        .info-block strong {
            display: inline-block;
            width: 90pt; /* Adjust width as needed for alignment */
            font-weight: bold;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20pt;
            font-size: 9pt; /* Slightly smaller font for table content */
        }

        .summary-table th, .summary-table td {
            padding: 8pt;
            border: 1px solid #ddd;
            text-align: left;
        }

        .summary-table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
        }

        .summary-table td {
            background-color: #fff;
        }

        .summary-table tr:nth-child(even) td { /* Stripe effect */
            background-color: #fbfbfb;
        }

        .total-row {
            font-weight: bold;
            background-color: #e0e0e0 !important;
        }

        .footer-bar {
            margin-top: 40pt;
            padding: 15pt 20pt;
            background-color: #f2f2f2;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 8pt;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header-bar">
            <h1>Payment Confirmation</h1>
        </div>

        <h2 class="section-title">Payment Details</h2>

        <div class="info-block">
            <p><strong>Payer Name:</strong> {{ $payment->payer_name }}</p>
            <p><strong>Payer Email:</strong> {{ $payment->payer_email }}</p>
            <p><strong>Product:</strong> {{ $payment->product_name }}</p>
            <p><strong>Payment Date:</strong> {{ $payment->created_at->format('M d, Y H:i') }}</p>
            <p><strong>Payment ID:</strong> {{ $payment->payment_id }}</p>
            <p><strong>Capture ID:</strong> {{ $payment->capture_id ?? 'N/A' }}</p>
        </div>

        <h2 class="section-title">Order Summary</h2>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $payment->product_name }}</td>
                    <td>{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->currency }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                </tr>
                {{-- If you have a total row, you can add it here --}}
                {{-- <tr>
                    <td colspan="3" style="text-align: right;" class="total-row">Total:</td>
                    <td class="total-row">{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                </tr> --}}
            </tbody>
        </table>

        <div class="footer-bar">
            Thank you for your purchase! If you have any questions, please contact us.<br>
            &copy; {{ date('Y') }} Digitaly Tycoon
        </div>
    </div>
</body>
</html>