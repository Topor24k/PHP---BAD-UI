<?php
session_start();
// Clear session data and destroy session
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Logged Out - HealthMart</title>
    <style>
        body { background: repeating-linear-gradient(45deg,#ff0000 0 10px,#ffff00 10px 20px);
               font-family: Impact, 'Comic Sans MS', Arial, sans-serif; color: #000; }
        .big { font-size: 120px; text-align: center; margin-top: 10vh; color: #fff; text-shadow: 4px 4px 0 #000; }
        .flash { animation: blink 0.4s steps(2) infinite; }
        @keyframes blink { 0%,50%{opacity:1}51%,100%{opacity:0} }
        .redirect { text-align:center; margin-top: 40px; font-size: 24px; color: #000; background:#fff; display:inline-block; padding:10px 20px; border:6px solid #000; }
        a { color: #000; font-weight: bold; }
    </style>
    <script>
        // Auto-redirect back to login after a brief, obnoxious pause
        setTimeout(function(){ window.location = 'login.php?logged_out=1'; }, 2500);
    </script>
</head>
<body>
    <div class="big flash">YOU'RE LOGGED OUT!</div>
    <div style="text-align:center;"><div class="redirect">Redirecting you back to <a href="login.php">login</a>... (ugh)</div></div>
</body>
</html>
