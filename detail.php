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
    $id = $_GET['id'];

    $conn = Db::getInstance();
    $alltours = $conn->query("SELECT tbl_tour.id as tour_id, guide_id,tbl_tour.name as tour_name,duration, price, tbl_tour.description as tour_description, tbl_guide.name as guide_name, email, password, guidenr, profile_pic, tbl_guide.description as guide_description, picture FROM tbl_tour INNER JOIN tbl_guide ON tbl_tour.guide_id = tbl_guide.id WHERE tbl_tour.id = $id");
    $tour = $alltours->fetch(PDO::FETCH_ASSOC);

}

?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>MyGuide | detail</title>
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

<div class="container no-bg detail_page">
    
    <?PHP if (isset($_SESSION['loggedIn'])): ?>

    <header id="logged-in-header">
        <a href="home.php"><img class="btn_back btn_back_detail" src="images/btn_back.svg" alt="Return button"></a>
        <h2 class="header_h">Detail</h2>
    </header>
    
    <section class="tour_detail" style="background-image: url('<?PHP echo $tour['picture'] ?>')">

            <div class="content_tour_detail">

                <h3 class="center"><?php echo $tour['tour_name']; ?></h3>
                <p class="detail guide">by: <?php echo $tour['guide_name']; ?></p><br>
                <p class="detail duration">duration: <?php echo $tour['duration']; ?>h</p>

                <p class="price">&euro;<?php echo $tour['price']; ?></p>
                
                <div class="clearfix"></div>

            </div>

    </section>
    
    <section class="about_the_tour">
        
        <h4>About the tour <span></span></h4>
        <p><?PHP echo $tour['tour_description']; ?></p>
        
    </section>
    
    <section class="about_the_guide">
        
        <h4>About the guide <span></span></h4>
        <p><?PHP echo $tour['guide_description']; ?></p>
        
    </section>

    <?PHP endif; ?>
    

</div>

</body>
</html>