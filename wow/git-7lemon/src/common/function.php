<?php
include 'config.php';

function get_header($title){
    global $__page_,$__site_name_, $__site_encode_, $__site_url_, $__site_favicon_, $__site_css_, $__site_root_;
    if (isset($title))
        require_once dirname(__FILE__).'/../frame/header.php';
    else{
        $title = array(
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
