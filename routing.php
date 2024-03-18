<?php

function handleRoute() {
    $uri = $_SERVER['REQUEST_URI'];

    if ($uri == '/' || $uri == '/home') {
        return 'home.php';
        // return 'blog_view.php';

    } elseif ($uri == '/settings') {
        return 'settings.php';
    } elseif (strpos($uri, '/videos') === 0) {
        $params = substr($uri, strlen('/videos'));
        return 'video.php' ;
    } 

    elseif (strpos($uri, '/blog') === 0) {
        $params = substr($uri, strlen('/blog'));
        return 'view_blog.php' ;
    } 

     elseif (strpos($uri, '/edit_blog') === 0) {
        $params = substr($uri, strlen('/edit_blog'));
        return 'edit_blog.php' ;
    } 

     elseif (strpos($uri, '/create_blog') === 0) {
        $params = substr($uri, strlen('/create_blog'));
        return 'create_blog.php' ;
    } 
    
    
    else {
        return '404.php'; 
    }
}
