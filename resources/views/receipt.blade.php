<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <title>Receipt</title>
    <meta charset="UTF-8">
    <style>

        @font-face {
            font-family: 'IBM Plex Sans Arabic';
            src: url('{{ storage_path("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap") }}') format('truetype');
        }


        body {
            font-family: "IBM Plex Sans Arabic", serif;
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

        <img src="https://ondefoc.dz/wp-content/uploads/2023/10/LOGO-ONDEFOC-1-1.png.webp" alt="logo-ondefoc" height="100">

        <h1>وصل الدفع</h1>
        <p>Order ID: {{ $orderId }}</p>
    </div>
    <div class="receipt-details">
        <p><strong>User ID:</strong> {{ '123' }}</p>
        <p><strong>Total Amount:</strong> ${{ '123' }}</p>
        <p><strong>Status:</strong> {{ '123' }}</p>
        <p><strong>Date:</strong> {{ $createdAt }}</p>
    </div>
    <div class="receipt-footer">
        <p>شكرا لإختيار خدمننا Ondefoc</p>
    </div>
</div>
</body>
</html>
