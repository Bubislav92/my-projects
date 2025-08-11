<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Refund Confirmation</title>
    <style>
        /* General PDF Styling Considerations (same as payment confirmation) */
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            font-size: 10pt;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact; /* Ensure background colors are printed (for WebKit browsers) */
            print-color-adjust: exact; /* Standard property for compatibility */
        }

        .invoice-container {
            width: 100%;
            padding: 20pt;
            box-sizing: border-box;
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
            color: #dc3545; /* Reddish tone for refunds */
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
            width: 90pt;
            font-weight: bold;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20pt;
            font-size: 9pt;
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
            <h1>Refund Confirmation</h1>
        </div>

        <h2 class="section-title">Refund Details</h2>

        <div class="info-block">
            {{-- Podaci o uplati na koju se povrat odnosi --}}
            <p><strong>Payment ID:</strong> {{ $refund->payment->payment_id }}</p>
            <p><strong>Payer Email:</strong> {{ $refund->payment->payer_email }}</p>
            <p><strong>Product:</strong> {{ $refund->payment->product_name }}</p>
            <p><strong>Original Amount:</strong> {{ number_format($refund->payment->amount, 2) }} {{ $refund->payment->currency }}</p>
            
            {{-- Specifični podaci o zahtevu za povrat / izvršenom povratu --}}
            <p><strong>Refund Request ID:</strong> {{ $refund->id }}</p>
            <p><strong>Reason for Refund:</strong> {{ $refund->reason }}</p>
            <p><strong>Request Status:</strong> {{ ucfirst($refund->status) }}</p>
            <p><strong>Requested At:</strong> {{ $refund->created_at->format('M d, Y H:i') }}</p>
            @if($refund->status === 'approved' && $refund->refunded_at)
                <p><strong>Refund Date:</strong> {{ $refund->refunded_at->format('M d, Y H:i') }}</p>
            @endif
        </div>

        <h2 class="section-title">Refund Summary</h2>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Status</th>
                    <th>Reason</th>
                    <th>Refund ID</th>
                    <th>Refund Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $refund->payment->payment_id }}</td>
                    <td>{{ ucfirst($refund->status) }}</td>
                    <td>{{ $refund->reason }}</td>
                    <td>{{ $refund->refund_id ?? 'N/A' }}</td>
                    <td>{{ $refund->refunded_at ? $refund->refunded_at->format('M d, Y H:i') : 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer-bar">
            This is a confirmation of your refund request. Please allow some time for the refund to be processed.<br>
            If you have any questions, please contact us.<br>
            &copy; {{ date('Y') }} Digitaly Tycoon
        </div>
    </div>
</body>
</html>