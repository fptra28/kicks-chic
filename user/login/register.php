<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
    <title>LOGIN | Kicks & Chic</title>
</head>

<body>
    <div class="container">
        <div class="left-logo">
            <img src="../../assets/logo-knc.png" alt="logo-knc">
            <h3>WELCOME TO</h3>
            <h1>KICKS & CHIC</h1>
        </div>
        <div class="regis-right-form">
            <form action="">
                <h1>REGISTER</h1>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/user-1.png" alt="user-logo">
                    </div>
                    <div class="input">
                        <input type="text" name="username" id="username" placeholder="Username" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/e-mail (1).png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="E-Mail" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/phone.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="tel" name="PhoneNum" id="PhoneNum" placeholder="Phone Number" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/pass-2.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" placeholder="Password" require>
                    </div>
                </div>
                <div class="form-container">
                    <div class="logo">
                        <img src="../../assets/pass-2.png" alt="pass-logo">
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" placeholder="Confirm Password" require>
                    </div>
                </div>
                <div class="policy">
                    <input type="checkbox" name="policy" id="policy">I agree with <a href="./privacy-policy.php">privacy and policy</a>
                </div>
            </form>
            <div class="button">
                <button type="submit">REGISTER</button>
            </div>
            <div class="regis">
                Have an Account? <a href="./register.php">Login Here</a>
            </div>
        </div>
    </div>
</body>

</html>