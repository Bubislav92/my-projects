<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda Porudžbine</title>
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
            background-color: #4CAF50; /* Zelena boja */
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
            <h1>Potvrda porudžbine</h1>
        </div>
        <div class="content">
            <p>Poštovani/a,</p>
            <p>Hvala Vam na kupovini u **Vesna's Web Store**-u! Vaša porudžbina je uspešno primljena.</p>
            <p>Status vaše porudžbine je **na čekanju** dok ne izvršite uplatu.</p>
            
            <div class="order-summary">
                <h2>Detalji porudžbine #{{ $order->id }}</h2>
                <p><strong>Ukupni iznos:</strong> {{ number_format($order->total_amount, 2) }} USD</p>
                <p>
                    <strong>Rok za plaćanje:</strong> Porudžbina treba biti plaćena u roku od 72 sata, odnosno do
                    **{{ \Carbon\Carbon::parse($order->expires_at)->format('d.m.Y. u H:i') }}**.
                </p>
            </div>
            
            <div class="order-items">
                <h2>Stavke porudžbine:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Proizvod</th>
                            <th>Količina</th>
                            <th>Cena</th>
                            <th>Ukupno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} USD</td>
                            <td>{{ number_format($item->quantity * $item->price, 2) }} USD</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p>
                Molimo Vas da izaberete opciju za plaćanje klikom na jedno od dugmadi ispod.
            </p>
            
            <div style="text-align: center; margin-bottom: 24px;">
                <a href="{{ URL::temporarySignedRoute('checkout.pay-pending', now()->addHours(72), ['order' => $order->id, 'method' => 'stripe']) }}">
                    Plati putem Stripe-a
                </a>
                
                <a href="{{ URL::temporarySignedRoute('checkout.pay-pending', now()->addHours(72), ['order' => $order->id, 'method' => 'paypal']) }}">
                    Plati putem PayPal-a
                </a>                
            </div>

            <p>
                Molimo Vas da pratite status svoje porudžbine na našem sajtu.
                Nakon što primimo uplatu, dobićete potvrdu i račun na email.
            </p>
        </div>
        <div class="footer">
            <p>Ako imate bilo kakvih pitanja, slobodno nas kontaktirajte.</p>
            <p>&copy; 2024 Vesna's Web Store. Sva prava zadržana.</p>
        </div>
    </div>
</body>
</html>