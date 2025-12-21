<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إيصال الدفع</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Tahoma, Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;padding:20px;">
    <tr>
        <td align="center">

            <!-- Container -->
            <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background-color:#6D1A3D;color:#ffffff;border-radius:8px;overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="padding:20px;text-align:right;">
                        <img
                            src="https://cdn.ondefoc.dz/wp-content/uploads/2023/10/Capture_d_ecran_2023-10-18_003858-removebg-preview-1-300x73.png"
                            alt="ONDEFOC Logo"
                            height="50"
                            style="display:block;margin-right:auto;"
                        >
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:30px;line-height:1.8;text-align:right;">

                        <p style="margin:0 0 15px 0;">
                            مرحباً <strong>{{ $data['name'] }}</strong>،
                        </p>

                        <p style="margin:0 0 15px 0;">
                            نشكرك على إتمام عملية الدفع بنجاح.
                        </p>

                        <p style="margin:0 0 25px 0;">
                            ستجد إيصال الدفع الخاص بك مرفقًا مع هذه الرسالة.
                            إذا كانت لديك أي استفسارات، لا تتردد في التواصل معنا.
                        </p>


                        <!-- Button -->
                        <table cellpadding="0" cellspacing="0" style="margin-right:auto;">
                            <tr>
                                <td style="background-color:#ffffff;border-radius:4px;">
                                    <a
                                        href="{{ $data['receipt_url'] ?? '#' }}"
                                        style="
                                            display:inline-block;
                                            padding:12px 24px;
                                            color:#6D1A3D;
                                            text-decoration:none;
                                            font-weight:bold;
                                            font-size:14px;
                                        "
                                    >
                                        تحميل الإيصال
                                    </a>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:20px;background-color:#5a1532;text-align:center;font-size:12px;color:#f1dbe4;">
                        © {{ date('Y') }} ONDEFOC — جميع الحقوق محفوظة
                    </td>
                </tr>

            </table>
            <!-- End Container -->

        </td>
    </tr>
</table>

</body>
</html>
