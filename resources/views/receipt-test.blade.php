<!DOCTYPE html>
<html>
<head>
    <title>Recu de paiement</title>
    <meta charset="UTF-8">
    <style>


        @font-face {
            font-family: 'Cairo';
            src: url({{ storage_path('fonts/Cairo-Regular.ttf') }}) format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Cairo';
            src: url({{ storage_path('fonts/Cairo-Bold.ttf') }}) format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        body {
            font-family: 'Cairo', sans-serif;
        }

        .receipt {
            width: 100%;
            max-width: 600px;
            margin: 15px auto 0 auto;
            border: 2px dashed #6D1A3D;
            border-radius: 15px;
            padding: 20px;

        }
        .receipt-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details table {
            text-align: center;
            border-collapse: collapse;
        }

        .receipt-footer {
            text-align: center;
            font-size: 0.9em;
            color: #6D1A3D;
        }

        .satim {
            margin-top: 15px;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="receipt">
    <div class="receipt-header">

        <div class="image-container">
            <img src="{{public_path('images/Ondefoc Purple.svg')}}" alt="logo-ondefoc" width="400">
        </div>

        <h1>Reçu de paiement</h1>

    </div>
    <div class="receipt-details">

        <table width="100%" border="1">

                <tr>
                    <th>N° Transaction</th>
                    <td>{{ $transaction_id }}</td>
                </tr>

                <tr>
                    <th>N° Commande</th>
                    <td>{{ $order_id }}</td>
                </tr>

                <tr>
                    <th>N° Autorisation</th>
                    <td>{{ $auth }}</td>
                </tr>

                <tr>
                    <th>Date de Transaction</th>
                    <td>{{ $date }}</td>
                </tr>

                <tr>
                    <th>Montant total</th>
                    <td>DA {{ number_format($amount, 2, '.', '') }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>Payé</td>
                </tr>

                <tr>
                    <th>Mode De Paiement</th>
                    <td>CIB/Edahabia</td>
                </tr>


        </table>

    </div>

    <div class="receipt-footer">

        <div class="image-container">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="code qr">
        </div>

        <p>Merci d'avoir choisi nos services Ondefoc.</p>

    </div>
</div>

<div class="satim">
    <span>Si vous rencontrez un problème avec le paiement <strong style="color: green">SATIM</strong> </span>
    <img src="{{public_path('images/numero-vert-satim.png')}}" width="400" alt="satim-green-number">
</div>


</body>
</html>
