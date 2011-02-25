<?php
include 'config.php';

function get_header($headerData){
    global $__page_;
    if (isset($headerData))
        require_once dirname(__FILE__).'/../frame/header.php';
    else{
        $headerData = array(
            'page' => '页面',
            'h1' => '神秘小屋',
            'intro' => '刚刚有一个神奇的声音穿过你的耳洞',
            );
        require_once dirname(__FILE__).'/../frame/header.php';
    }
}

function get_footer(){
    require_once dirname(__FILE__).'/../frame/footer.php';
}

function get_login_box($error_type, $error_msg){
    if (isset($error_type) && isset($error_msg)){
        require_once 'frame/login_box.php';
    }
    else
        echo '<span>Setup Error</span>';
}
