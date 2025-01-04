<!DOCTYPE html>
<html>
<head>
    <title>Receipt-{{$order_id}}</title>
    <meta charset="UTF-8">
    <style>

        @page { margin: 0}

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
            margin: 0;
            padding: 0;
        }



        .receipt-header {
            height: 100px;
            background: #6D1A3D;
            color: #FFFFFF;
            margin-bottom: 20px;
            padding: 35px;
        }

        .receipt-header img {
            display: inline-block;
            margin-right: auto;
        }

        .receipt-header span {
            font-weight: bold;
            display: inline-block;
            font-size: 40px;
            margin-left: 170px;
        }

        .receipt {
            width: 100%;
        }

        .receipt-details {
            margin-bottom: 0;
            padding: 35px;
        }

        .receipt-details .order-table {
            width: 100%;
            border-collapse: collapse;

        }


        .receipt-details .order-table tr th {
            font-size: 12px;
            color: #6D1A3D;
            text-align: left;
        }

        .order-table th,.order-table td {
            border-right: 1px solid #6D1A3D;
            margin-top: 0;
            padding-left: 15px;
        }

        .receipt-details .order-table tr td {
            font-size: 12px;
        }

        .order-items {
            margin-top: 42.9px;
            border: 1px solid #000000;
            border-collapse: collapse;
        }

        .order-items td , .order-items th {
            text-align: center;
        }

        .order-items thead th {
            background: #6D1A3D;
            color: #FFFFFF;
        }

        .order-items tbody th {
            color: #6D1A3D;
        }

        .order-items td, .order-items th {
            border-color: #000000;
        }

        .order-items tbody th + td {
            font-weight: bold;
            font-size: 20px;
        }

        .qr-container {
            display: block;
            margin: 20px 0 0 0;
            text-align: center;
        }

        .receipt-footer {
            background: #6D1A3D;
            color: #FFFFFF;
            padding: 35px;
        }

        .receipt-footer p,.receipt-footer h3 {
            margin: 0;
        }

        .receipt-footer a {
            color: #FFFFFF;
            font-weight: bold;
            text-decoration: none;
        }
        .satim {
            margin-top: 15px;
            text-align: center;
        }

        .satim img {
            display: block;
            margin: 0;
        }



    </style>
</head>
<body>

<div class="receipt-header">
    <img src="{{public_path('images/Ondefoc White.svg')}}" alt="logo-ondefoc" height="60">
    <span>Reçu de paiement</span>
</div>

<div class="receipt">

    <div class="receipt-details">

        <table class="order-table">


                    <tr>
                        <th>Nº COMMANDE</th>
                        <th>Nº D'AUTORISATION</th>
                        <th>Nº TRANSACTION</th>
                        <th>MODE DE PAIEMENT</th>
                        <th style="border-right: none">DATE</th>
                    </tr>


                    <tr>
                        <td>{{$order_id}}</td>
                        <td>{{$auth}}</td>
                        <td>{{$transaction_id}}</td>
                        <td>CIB/Edahabia</td>
                        <td style="border-right: none">{{$date}}</td>
                    </tr>




        </table>

        <table  border="1" width="100%" class="order-items">

               <thead>
                   <tr>
                       <th style="border-right-color: #FFFFFF">Nom Complet</th>
                       <th colspan="2" style="border-right-color: #FFFFFF">Produit</th>
                   </tr>
               </thead>


                <tbody>

                    <tr>
                        <td>{{$name}}</td>
                        <td colspan="2">{{$product_sku}}</td>
                    </tr>

                    <tr>
                        <th colspan="2">Total HT</th>
                        <td>{{$sale_amount}} DA</td>
                    </tr>

                    <tr>
                        <th colspan="2">TVA {{$tax_rate}}%</th>
                        <td>{{number_format(($tax_rate / 100) * $sale_amount,2,'.','')}} DA</td>
                    </tr>

                    <tr>
                        <th  colspan="2">Montant TTC</th>
                        <td>{{number_format($total_amount,2,'.','')}} DA</td>
                    </tr>

                </tbody>

        </table>

        <div class="qr-container">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="code qr" id="qr-code">
        </div>

        <div class="satim">
            <div>Si vous rencontrez un problème avec le paiement <strong style="color: green">SATIM</strong> </div>
            <img src="{{public_path('images/numero-vert-satim.png')}}" width="200" alt="satim-green-number">
        </div>



    </div>

</div>

<div class="receipt-footer">
    <h3>Office National De Développement Et De Promotion De La Formation Continue</h3>
    <p>Route n°1 MEDRAR Hacène – Rouiba 16012, Alger Algérie / 023 86 27 83</p>
    <a href="https://www.ondefoc.dz">www.ondefoc.dz</a>
</div>

</body>
</html>
