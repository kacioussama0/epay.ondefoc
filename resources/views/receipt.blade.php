<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <meta charset="UTF-8">
    <style>


        body {
            font-family: "IBM Plex Sans Arabic", serif !important;
        }

        .receipt {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-details {
            margin-bottom: 20px;
        }
        .receipt-footer {
            text-align: center;
            font-size: 0.9em;
            color: #888;
        }
    </style>
</head>
<body>
<div class="receipt">
    <div class="receipt-header">

        <h1>Reçu de paiement Ondefoc</h1>
        <p>N° Transaction : {{ $transaction_id }}</p>
    </div>
    <div class="receipt-details">
        <p><strong>N° Commande :</strong> {{ $order_id }}</p>
        <p><strong>N° Autorisation:</strong> {{ $auth }}</p>
        <p><strong>Date de Transaction :</strong> {{ $date }}</p>
        <p><strong>Montant total:</strong> DA {{ number_format($amount, 2, '.', '') }}</p>
        <p><strong>Status:</strong> Payé</p>
        <p><strong>Mode De Paiement:</strong> CIB/Edhahabia</p>
    </div>

    <div class="receipt-footer">
        <p>Merci d'avoir choisi nos services Ondefoc.</p>
    </div>
</div>
</body>
</html>
