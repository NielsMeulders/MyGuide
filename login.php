<?PHP

    include_once("classes/Db.class.php");

    if (!empty($_POST))
    {
        try
        {
        session_start();
        ini_set('session.gc_maxlifetime', 3600*24*30);
        session_set_cookie_params(3600*24*30);
        if (!empty($_POST['type']))
        {
            $type_guide = $_POST['type'];
        }
        else
        {
            throw new Exception("Kies uw type!");
        }

            $conn = Db::getInstance();
            switch ($type_guide)
            {
                case 'tourist':
                    $post = $conn->prepare("SELECT * FROM tbl_tourist WHERE email=?");
                    break;

                case 'guide':
                    $post = $conn->prepare("SELECT * FROM tbl_guide WHERE email=?");
                    break;
            }

            $post->execute(array($_POST['email']));
            $row = $post->fetch(PDO::FETCH_ASSOC);

            if (password_verify($_POST['pass'], $row['password'])) {
                $_SESSION['loggedIn']=true;
                switch ($type_guide)
                {
                    case 'tourist':
                        $_SESSION['type']= "tourist";
                        $_SESSION['userid']= $row['id'];
                        header('Location: home.php');
                        break;

                    case 'guide':
                        $_SESSION['type']= "guide";
                        $_SESSION['userid']= $row['id'];
                        //header('Location: guide_home.php');
                        header('Location: home.php');
                        break;
                }

            } else {
                throw new Exception("Gebruikersnaam of wachtwoord onjuist!");
            }
        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
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
            <a href="index.php"><img class="btn_back" src="images/btn_back.svg" alt="Return button"></a>
            <img src="images/logo_full.png" alt="logo">
        </header>

        <?PHP if (isset($error)): ?>
            <div class="error"><?PHP echo $error; ?></div>
        <?PHP endif; ?>
        
        <section class="form">
            
            <form action="" method="post">
            
                <input type="text" id="email" name="email" placeholder="Email address"><br>
                <input type="password" id="pass" name="pass" placeholder="Password">

                <div class="container_radio">
                    <input class="radio_btn" type="radio" name="type" id="tourist" value="tourist"><label class="label_radio_button" for="tourist">I'm a tourist</label></input><br>
                    <input class="radio_btn" type="radio" name="type" id="guide" value="guide"><label class="label_radio_button" for="guide">I'm a guide</label>
                </div>

                <input type="submit" id="login_screen_button" value="Log in!">
            
            </form>            
            
        </section>
        
    </div>

</body>
</html>