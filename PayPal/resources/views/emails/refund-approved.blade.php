<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Refund Approved</title>
    <style type="text/css">
        /* Basic Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f4;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        td {
            padding: 0;
            vertical-align: top;
        }
        img {
            max-width: 100%;
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        a {
            color: #1a73e8; /* Standard blue for links */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Main Container */
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Header */
        .header {
            background-color: #28a745; /* A success green for approval */
            padding: 25px;
            text-align: center;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        /* Body Content */
        .content {
            padding: 25px;
        }
        .content p {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .content strong {
            font-weight: bold;
            color: #000000;
        }

        /* Footer */
        .footer {
            background-color: #f8f8f8;
            padding: 20px 25px;
            text-align: center;
            font-size: 12px;
            color: #777777;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            border-top: 1px solid #eeeeee;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <center style="width: 100%; background-color: #f4f4f4;">
        <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            Your refund request has been approved!
        </div>
        <div class="email-container">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="header">
                <tr>
                    <td>
                        <h1>Refund Approved!</h1>
                    </td>
                </tr>
            </table>

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="content">
                <tr>
                    <td>
                        <p>Dear customer,</p>
                        <p>We are pleased to inform you that your refund request for purchase number <strong>{{ $refund->payment->payment_id }}</strong> has been **approved**.</p>
                        <p>The refund was processed on: <strong>{{ $refund->refunded_at->format('M d, Y H:i') }}</strong>.</p>
                        <p>The funds will be returned to your original payment method (card or PayPal account) as soon as possible. Please allow a few business days for the transaction to reflect in your account.</p>
                        <p>Thank you for your patience and understanding.</p>
                        <p>Best regards,<br>Your Team</p>
                    </td>
                </tr>
            </table>

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="footer">
                <tr>
                    <td>
                        <p>&copy; {{ date('Y') }} Digitaly Tycoon. All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>