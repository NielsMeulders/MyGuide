<?PHP

include_once("classes/Db.class.php");
include_once("classes/Tour.class.php");
session_start();

if (!isset($_SESSION['loggedIn']))
{
    $link = "<a href='login.php'>login</a>";
    echo "You have to " . $link . " to view this page!";
}
else
{
    $t = new Tour();
    $alltours = $t->getAll();
}

try
{
    $conn = Db::getInstance();
    $user = $conn->prepare("SELECT * FROM tbl_guide WHERE id=?");
    $user->execute(array($_SESSION['userid']));
    $row = $user->fetch(PDO::FETCH_ASSOC);
}
catch (Exception $e)
{
    $error = $e->getMessage();
}

$name = substr($row['name'], 0, strpos($row['name'], " "));
$image = $row['profile_pic']

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <!--<meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />-->
</head>
<body>

<nav id="nav" class="container no-bg">
    
    <div class="inner_nav">
      
      <div class="profile_pic" style="background-image: url('<?PHP echo $image; ?>')"></div>
      

      <?PHP 
            $time = date("G");

            if ($time > 0 && $time < 7): $day_quote = "Goedenacht";
            elseif ($time >= 7 && $time < 12): $day_quote = "Goedemorgen";
            elseif ($time >= 12 && $time < 19): $day_quote = "Goedemiddag";
            elseif ($time >= 19 && $time != 0): $day_quote = "Goedenavond";
            endif;

        echo '<h2>' . $day_quote .' ' . $name .'!</h2>';

      ?>
       
       <a href="profile.php" class="std_nav">My Profile</a>
       <a href="about.php" class="std_nav">About MyGuide</a>
       <a href="contact.php" class="std_nav">Contact us</a>
       <a href="classes/logout.php" class="red_nav" id="logout">Logout</a>
       
    </div>
    
</nav>

<div class="container no-bg">
    
    <?PHP if (isset($_SESSION['loggedIn'])): ?>

    <header id="logged-in-header">
        <img class="btn_nav" id="btn_nav" src="images/btn_nav.svg" alt="Nav button">
        <h2 class="header_h">Tours</h2>
        <img id="click_search" class="btn_search" src="images/btn_search.svg" alt="Search button">
    </header>

    <div class="search">
        <input type="text" id="term" name="term" placeholder="Search">
        <input type="submit" id="search_button" value="">
    </div>

    <?php
    while($row = $alltours->fetch(PDO::FETCH_ASSOC)) : ?>

        <section class="tour_preview" style="background-image: url('images/tours/tour.jpg')">

            <div class="content_tour_preview">

                <div class="left">
                    <h3><?php echo $row['name']; ?></h3>
                    <p class="detail guide">by: Jan Smit</p>
                    <p class="detail duration">duration: <?php echo $row['duration']; ?>h</p>

                    <p class="price">&euro;<?php echo $row['price']; ?></p>
                </div>

                <div class="right">
                    <a href="detail.php?id=<?PHP echo $row['id']; ?>"><img class="btn_detail" src="images/btn_detail.png" alt="Detail button"></a>
                </div>

            </div>

        </section>

    <?PHP endwhile; ?>
    
    <footer>

        <div class="endOfFile"></div>
        
    </footer>

    <?PHP endif; ?>
    

</div>

</body>
</html>