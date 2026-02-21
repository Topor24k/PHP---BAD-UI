<?php
session_start();

// Process login
if(isset($_POST['action'])) {
    if($_POST['action'] === 'login') {
        // Simple login logic (no database for demo)
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_POST['username'] ?? 'Guest User';
        header('Location: index.php');
        exit;
    } elseif($_POST['action'] === 'signup') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_POST['signup_username'] ?? 'New User';
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMart Login - Professional Healthcare Portal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(45deg, #ff00ff, #00ffff, #ffff00, #ff00ff);
            background-size: 400% 400%;
            animation: gradientShift 3s ease infinite;
            font-family: 'Comic Sans MS', cursive;
            overflow-x: hidden;
            position: relative;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            10% { transform: translateX(-10px) rotate(-2deg); }
            20% { transform: translateX(10px) rotate(2deg); }
            30% { transform: translateX(-10px) rotate(-2deg); }
            40% { transform: translateX(10px) rotate(2deg); }
            50% { transform: translateX(-10px) rotate(-2deg); }
            60% { transform: translateX(10px) rotate(2deg); }
            70% { transform: translateX(-10px) rotate(-2deg); }
            80% { transform: translateX(10px) rotate(2deg); }
            90% { transform: translateX(-10px) rotate(-2deg); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .container {
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 48px;
            color: #ff0000;
            text-shadow: 3px 3px #00ff00, 6px 6px #0000ff;
            animation: shake 0.5s infinite;
        }
        
        .blinking-text {
            font-size: 24px;
            color: #ff00ff;
            animation: blink 1s infinite;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border: 10px solid #ff6600;
            border-radius: 50px;
            padding: 40px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 50px rgba(255, 0, 255, 0.8);
            position: relative;
        }
        
        .warning-banner {
            background: yellow;
            border: 5px solid red;
            padding: 10px;
            margin-bottom: 20px;
            animation: blink 1.5s infinite;
            font-weight: bold;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-size: 18px;
            color: #ff0000;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 3px solid #00ff00;
            border-radius: 10px;
            font-size: 16px;
            background: #ffffcc;
        }
        
        .small-login-btn {
            padding: 3px 8px;
            font-size: 10px;
            background: #cccccc;
            border: 1px solid #999999;
            color: #666666;
            cursor: pointer;
            border-radius: 3px;
            float: right;
        }
        
        .small-signup-link {
            font-size: 8px;
            color: #999999;
            text-decoration: underline;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }
        
        .giant-forgot-btn {
            width: 100%;
            padding: 40px;
            font-size: 32px;
            background: linear-gradient(45deg, #ff0000, #ff00ff, #0000ff);
            color: white;
            border: 10px solid #ffff00;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 30px;
            animation: float 2s infinite;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-shadow: 3px 3px #000000;
        }
        
        .giant-forgot-btn:hover {
            animation: shake 0.3s infinite;
        }
        
        .random-popup {
            position: fixed;
            background: #ff00ff;
            border: 5px solid #ffff00;
            padding: 20px;
            border-radius: 10px;
            z-index: 1000;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        }
        
        .floating-text {
            position: fixed;
            animation: float 3s infinite;
            font-size: 24px;
            font-weight: bold;
            color: #ff0000;
            text-shadow: 2px 2px #00ff00;
        }
        
        #signup-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border: 10px solid #ff0000;
            padding: 30px;
            z-index: 2000;
            border-radius: 20px;
        }
        
        .modal-close {
            background: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 15px;
        }
        
        marquee {
            background: #ff0000;
            color: #ffff00;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            border: 3px solid #00ff00;
        }
    </style>
</head>
<body>
    <marquee behavior="scroll" direction="left">WELCOME TO HEALTHMART - Professional Healthcare Services | Limited Time Offers Available</marquee>
    
    <div class="container">
        <div class="header">
            <h1>HEALTHMART</h1>
            <div class="blinking-text">WELCOME FUTURE PAIIENT</div>
            <div class="blinking-text" style="animation-delay: 0.5s;">LOGIN NOW</div>
        </div>
        
        <div class="login-container">
            <div class="warning-banner">
                WARNING: LOGGING IN REQUIRED
            </div>
            
            <form method="POST" id="login-form">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label>USERNAME:</label>
                    <input type="text" name="username" placeholder="Enter your username..." required>
                </div>
                
                <div class="form-group">
                    <label>PASSWORD:</label>
                    <input type="password" name="password" placeholder="Enter password..." required>
                </div>
                
                <button type="submit" class="small-login-btn" title="Good luck finding me!">login</button>
                <br><br><br>
                <a class="small-signup-link" onclick="showSignup()">sign up (click here if you can see this)</a>
            </form>
            
            <button class="giant-forgot-btn" onclick="forgotPassword()">
                I FORGOT MY PASSWORD
            </button>
        </div>
        
        <!-- Floating random texts -->
        <div class="floating-text" style="top: 10%; left: 10%;">HEALTH!</div>
        <div class="floating-text" style="top: 20%; right: 15%; animation-delay: 0.5s;">WELLNESS!</div>
        <div class="floating-text" style="bottom: 15%; left: 20%; animation-delay: 1s;">VITAMINS!</div>
        <div class="floating-text" style="bottom: 10%; right: 10%; animation-delay: 1.5s;">CHAOS!</div>
    </div>
    
    <!-- Signup Modal -->
    <div id="signup-modal">
        <h2 style="color: #ff0000;">CREATE ACCOUNT (QUESTIONABLE DECISION)</h2>
        <form method="POST">
            <input type="hidden" name="action" value="signup">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="signup_username" required>
            </div>
            <div class="form-group">
                <label>Email (we'll spam you):</label>
                <input type="text" name="email" required>
            </div>
            <button type="submit" style="background: #00ff00; padding: 10px 20px; border: none; font-size: 16px; cursor: pointer;">SIGN UP NOW!!!</button>
            <button type="button" class="modal-close" onclick="closeSignup()">Close</button>
        </form>
    </div>
    
    <marquee behavior="scroll" direction="right" style="position: fixed; bottom: 0; width: 100%;">
        HOT DEALS: Special Offers Available | Check our products today
    </marquee>
    
    <script>
        // Random pop-ups
        function createRandomPopup() {
            const messages = [
                "SPECIAL OFFER!",
                "HEALTH PRODUCTS",
                "SALE NOW!",
                "NEW ITEMS!",
                "CLICK HERE!"
            ];
            
            const popup = document.createElement('div');
            popup.className = 'random-popup';
            popup.style.top = Math.random() * 80 + 'vh';
            popup.style.left = Math.random() * 80 + 'vw';
            popup.innerHTML = messages[Math.floor(Math.random() * messages.length)];
            popup.onclick = function() { this.remove(); };
            
            document.body.appendChild(popup);
            
            setTimeout(() => popup.remove(), 3000);
        }
        
        setInterval(createRandomPopup, 5000);
        
        function forgotPassword() {
            alert("PASSWORD RECOVERY\n\nPlease contact support to reset your password.\n\nFor demo purposes, you can use any password to login.");
        }
        
        function showSignup() {
            document.getElementById('signup-modal').style.display = 'block';
        }
        
        function closeSignup() {
            document.getElementById('signup-modal').style.display = 'none';
        }
        
        // Annoying alert on page load
        setTimeout(() => {
            alert("WELCOME TO HEALTHMART\n\nClick OK to continue.");
        }, 1000);
    </script>
</body>
</html>
