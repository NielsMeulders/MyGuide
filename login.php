<?PHP

    include_once("classes/Db.class.php");

    if (!empty($_POST))
    {
        try
        {
            $conn = Db::getInstance();
            $post = $conn->prepare("SELECT * FROM tbl_guide WHERE email=?");
            $post->execute(array($_POST['email']));
            $row = $post->fetch(PDO::FETCH_ASSOC);

            if (password_verify($_POST['pass'], $row['password'])) {
                header('Location: http://www.nielsmeulders.be');
            } else {
                throw new Exception("Password is incorrect!");
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
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
        
        <header>
            <a href="index.php"><img class="btn_back" src="images/bnt_back.png" alt="Return button"></a>
            <img src="images/logo_full.png" alt="logo">
        </header>
        
        <section class="form">
            
            <form action="" method="post">
            
                <input type="text" id="email" name="email" placeholder="Email address"><br>
                <input type="password" id="pass" name="pass" placeholder="Password">

                <input type="submit" id="login_screen_button" value="Log in!">
            
            </form>            
            
        </section>
        
    </div>

</body>
</html>