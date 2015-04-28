<?PHP

    if (!empty($_POST))
    {
        include_once("classes/Guide.class.php");
        include_once("classes/Tourist.class.php");

        try
        {
            if (!empty($_POST['type']))
            {
                $type_guide = $_POST['type'];
            }
            else
            {
                throw new Exception("Type is required!");
            }
            switch($type_guide)
            {
                case 'tourist':
                    $u = new Tourist();
                    break;

                case 'guide':
                    $u = new Guide();
                    break;
            }
            $u->checkPass($_POST['pass'],$_POST['pass_rep']);
            $u->Name = $_POST['name'];
            $u->Email = $_POST['email'];
            $u->Password = $_POST['pass'];
            $u->save();
        }
        catch (Exception $e)
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
            
               <input type="text" id="name" name="name" placeholder="Name"><br>
               <input type="email" id="email" name="email" placeholder="Email address"><br>
               <input type="password" id="pass" name="pass" placeholder="Password"><br>
               <input type="password" id="pass_rep" name="pass_rep" placeholder="Retype password"><br>
               
               <div class="container_radio">
                   <input class="radio_btn" type="radio" name="type" id="tourist" value="tourist"><label class="label_radio_button" for="tourist">I'm a tourist</label></input><br>
                   <input class="radio_btn" type="radio" name="type" id="guide" value="guide"><label class="label_radio_button" for="guide">I'm a guide</label>
               </div>

               <input type="submit" id="login_screen_button" value="Register!">
            
            </form>            
            
        </section>
        
    </div>

</body>
</html>