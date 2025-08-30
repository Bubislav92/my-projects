<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda Uplate</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50; /* Zelena boja za uspeh */
            color: #ffffff;
            padding: 24px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 24px;
            line-height: 1.6;
        }
        .content p {
            margin-top: 0;
            margin-bottom: 16px;
        }
        .order-summary {
            background-color: #edf2f7;
            border-radius: 6px;
            padding: 16px;
            margin-bottom: 24px;
        }
        .order-summary h2 {
            margin-top: 0;
            font-size: 18px;
            color: #2d3748;
        }
        .order-summary p {
            margin: 8px 0;
        }
        .order-items {
            margin-bottom: 24px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .order-items th, .order-items td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .order-items th {
            background-color: #f7fafc;
            font-weight: 600;
        }
        .footer {
            background-color: #cbd5e0;
            color: #4a5568;
            padding: 24px;
            text-align: center;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Uplata uspešna!</h1>
        </div>
        <div class="content">
            <p>Poštovani/a,</p>
            <p>Vaša uplata je uspešno obrađena! Hvala Vam na kupovini u **Vesna's Web Store**-u. Vaša porudžbina **#{{ $order->id }}** je sada u obradi.</p>
            
            <div class="order-summary">
                <h2>Detalji uplate</h2>
                <p><strong>Ukupan iznos:</strong> {{ number_format($order->total_amount, 2) }} EUR</p>
                <p><strong>Način plaćanja:</strong> Stripe</p>
                <p><strong>Status plaćanja:</strong> Plaćeno</p>
            </div>
            
            <p>
                Račun za Vašu kupovinu je poslat na Vaš email.
            </p>
            <p>
                Možete pratiti status svoje porudžbine na našem sajtu.
            </p>
        </div>
        <div class="footer">
            <p>Ako imate bilo kakvih pitanja, slobodno nas kontaktirajte.</p>
            <p>&copy; 2024 Vesna's Web Store. Sva prava zadržana.</p>
        </div>
    </div>
</body>
</html>