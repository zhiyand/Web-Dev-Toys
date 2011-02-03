<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset='<?php echo $__site_encode_; ?>'" />
    <title><?php echo $title['page'].'|'.$__site_name_; ?></title>
    <link rel="stylesheet" href="<?php echo $__site_url_.$__site_css_;?>" type="text/css" />
    <link rel="shortcut icon" href="<?php echo $__site_url_.$__site_favicon_;?>" type="image/x-icon" />
</head>
<body>
<div id="wrapper">
<div id="header">
    <div id="header_logo">
        <h1><?php echo $title['h1']; ?></h1>
        <p class="welcome"><?php echo $title['intro'];?></p>
    </div><!--End Of header_logo-->
    <div id="header_menu">
        <ul id="menu" class="menu">
<?php 
foreach($__page_ as $row){
    $url = $row['url'];
    $name = $row['name'];
echo <<< menu
        <li><a href="$__site_url_$url">$name</a></li>\n
menu;
}
?>
        </ul>
    </div><!--End Of header_menu-->
</div><!--End Of header-->
