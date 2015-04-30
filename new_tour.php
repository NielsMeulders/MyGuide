<?PHP

if (!empty($_POST))
{
    include_once("classes/Tour.class.php");
    try
    {
        $t = new Tour();
        $t->Name = $_POST['name'];
        $t->Duration = $_POST['duration'];
        $t->Price = $_POST['price'];
        $t->Description = $_POST['description'];
        $t->save();
    }
    catch (Exception $e)
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

<div class="container no-bg">

    <header id="logged-in-header">
        <a href="guide_home.php"><img class="btn_back btn_back_detail" src="images/btn_back.svg" alt="Return button"></a>
        <h2 class="header_h">Add a new tour</h2>
    </header>

    <section class="form">

        <form action="" method="post">

            <input type="text" id="name" name="name" placeholder="Name"><br>
            <input type="number" id="price" name="price" placeholder="Price"><br>
            <input type="number" id="duration" name="duration" placeholder="Duration (h)"><br>
            <input type="text" id="description" name="description" placeholder="Description"><br>

            <input type="submit" id="login_screen_button" value="Create this tour">

        </form>

    </section>

</div>

</body>
</html>