<?PHP

    

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