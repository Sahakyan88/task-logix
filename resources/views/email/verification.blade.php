<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .verification-code {
            background-color: #f2f2f2;
            padding: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Email Verification Code</h2>
    <p>Hello!</p>
    <p>Your verification code for changing your email address is:</p>
    <h3 class="verification-code">{{ $verificationCode }}</h3>
    <p>Please use this code within 30 minutes to confirm your new email address.</p>
    <p>If you didn't request this change, please ignore this message.</p>
    <p>Thank you!</p>
</div>

</body>
</html>
