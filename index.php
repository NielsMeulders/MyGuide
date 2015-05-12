<?PHP

    session_start();

    if(isset($_SESSION['loggedIn']))
    {
        if ($_SESSION['type']=="tourist")
        {
            header('Location: home.php');
        }
        else
        {
            header('Location: guide_home.php');
        }
    }

?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>MyGuide</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!--<meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />-->
</head>
<body>

    <div class="container">
        
        <h1 id="header_splash">WELCOME TO</h1>
        
        <img id="logo_splash" src="images/logo.png" alt="Logo">
        <p id="slogan_splash">Your guide booking app</p>
        
        <a class="button full_blue" href="register.php">Register</a><br>
        <a class="button ghost_blue" href="login.php">Log in</a>
        
        <footer><p>&copy; Niels Meulders - 2015</p></footer>
        
    </div>

</body>
</html>