<?php
$url = $_SERVER['REQUEST_URI'];

if ($url == '/') {
    header('Location: /Homepage.php');
    exit;
}
else{
    $fileurl = '../app/views'.$url;
    include $fileurl;
}
    
?>