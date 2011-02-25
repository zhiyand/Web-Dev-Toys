<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset='utf8'" />
    <title><?php echo $headerData['page'].'|'.SITE_NAME; ?></title>
    <link rel="stylesheet" href="static/style.css" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="header">
    <div id="header_logo">
        <h1><?php echo $headerData['h1']; ?></h1>
        <p class="welcome"><?php echo $headerData['intro'];?></p>
    </div><!--End Of header_logo-->
    <div id="header_menu">
        <ul id="menu" class="menu">
<?php 
foreach($__page_ as $row){
    $url = $row['url'];
    $name = $row['name'];
echo <<< menu
        <li><a href="$url">$name</a></li>\n
menu;
}

if (isset($_SESSION['user']))
{
    echo '<li><a href="logout.php">退出</a></li>';
}
?>
        </ul>
    </div><!--End Of header_menu-->
</div><!--End Of header-->
