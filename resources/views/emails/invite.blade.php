<!DOCTYPE html >
    <html>
        <head>
            <meta https-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
            <meta https-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />            
            <title>Ajakteman OLX</title>
            <style type="text/css">                
                @font-face {font-family: 'normaldin';font-style: normal; font-weight: normal;src: url('{{ asset('fonts/dincondensed.otf') }}') format('opentype');}
                body{margin: 0; font-family: 'normaldin', sans-serif; text-align: center;font-size:16px;}
            </style>
        </head>
        <body style="font-family: 'normaldin', sans-serif; ">
            <center>
            <!-- VIEW IN BROWSER -->

            <table style="width:100%; max-width:600px; background-color: #FFFFFF;" border="0" cellpadding="0" cellspacing="0">
                <tr><td style="text-align: center; padding: 30px 0px; background-color: #FFFFFF;">
                    <center><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" style="display: block; max-width: 150px;"></a></center>
                </td></tr>                
                <tr><td style="background-color:#FFFFFF; padding:15px 15px 0px; font-size:26px; color:#333333; line-height:1.2em; text-align:center;">
                    Terima kasih telah mengajak {{ $x }} teman untuk pasang iklan di OLX
                </td></tr>                
                <tr><td style="background-color:#FFFFFF; padding:15px; color:#333333; font-size: 16px; line-height:25px; text-align:center;">
                    Mau segera dapat voucher belanja? Pastikan mereka sudah pasang iklan
                </td></tr>                
                <tr><td style="padding:50px 0px 30px; background-color:#FFFFFF; text-align:center;">
                    <a href="{{ url('dashboard#table-referral') }}" style="padding:15px 20px; border:1px solid #999999; color:#FFFFFF; text-decoration:none; font-weight:bold; background-color:#651784">CEK STATUS TEMAN ANDA DISINI</a>
                </td></tr>                
                <tr><td style="padding:30px 10px 50px; background-color:#FFFFFF; text-align:left; color: #333333; font-size: 12px;">
                    <center><b>Tentang OLX & Saldo OLX</b></center><br>
                    <p>OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!
<br>Saldo OLX dapat digunakan untuk membuat iklan Anda dilihat lebih banyak calon pembeli dan laku lebih cepat. </p>
                </td></tr>                
                <tr><td style="padding:10px 0px 40px; background-color:#FFFFFF; text-align:center; color: #333333; font-size: 10px;">
                    Powered by OLX.co.id
                </td></tr>                
            </table>

            <table style="width:100%; max-width:600px; background-color: #FFFFFF; color:#632c85; font-style: italic;" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-top: 20px; font-size: 12px; text-align: center;">Hubungi Kami Via <a href="mailto:" style="color: #632c85">Email</a> atau SMS <a href="sms://+628574671188" style="color: #632c85">085-7467-1188</a></td>
                </tr>                
            </table>



            </center>
        </body>
    </html>