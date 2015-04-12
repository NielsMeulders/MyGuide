<?PHP

include_once("classes/Db.class.php");

if (!empty($_POST))
{

}

$alltours = "lel";

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

<div class="container no-bg">

    <header id="logged-in-header">
        <a href=""><img class="btn_nav" src="images/btn_nav.png" alt="Nav button"></a>
        <h2 class="header_h">Tours</h2>
        <a href=""><img class="btn_search" src="images/btn_search.png" alt="Search button"></a>
    </header>

    <div id="search">
        <input type="text" id="term" name="term" placeholder="Search">
        <input type="submit" id="search_button" value="Search!">
    </div>
    
    <?PHP if (!isset($alltours)): ?>
        
        <p class="feedback">There are no tours nearby you!</p>
    
    <?PHP endif ?>

    <section class="tour_preview" style="background-image: url('images/tours/tour.jpg')">
        
        <div class="content_tour_preview">

            <div class="left">
            <h3>Sint-Rombouts tour</h3>
            <p class="detail guide">by: Jan Smit</p>
            <p class="detail duration">duration: 1h</p>
            
            <p class="price">&euro;50</p>
            </div>
            
            <div class="right">
            <a href="detail.php"><img class="btn_detail" src="images/btn_detail.png" alt="Detail button"></a>
            </div>
        
        </div>

    </section>
    
    <section class="tour_preview" style="background-image: url('images/tours/tour.jpg')">
        
        <div class="content_tour_preview">

            <div class="left">
            <h3>Sint-Rombouts tour</h3>
            <p class="detail guide">by: Jan Smit</p>
            <p class="detail duration">duration: 1h</p>
            
            <p class="price">&euro;50</p>
            </div>
            
            <div class="right">
            <a href="detail.php"><img class="btn_detail" src="images/btn_detail.png" alt="Detail button"></a>
            </div>
        
        </div>

    </section>
    
    <section class="tour_preview" style="background-image: url('images/tours/tour.jpg')">
        
        <div class="content_tour_preview">

            <div class="left">
            <h3>Sint-Rombouts tour</h3>
            <p class="detail guide">by: Jan Smit</p>
            <p class="detail duration">duration: 1h</p>
            
            <p class="price">&euro;50</p>
            </div>
            
            <div class="right">
            <a href="detail.php"><img class="btn_detail" src="images/btn_detail.png" alt="Detail button"></a>
            </div>
        
        </div>

    </section>
    
    <footer>

        <div class="endOfFile"></div>
        
    </footer>
    

</div>

</body>
</html>