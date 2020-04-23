<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'index.php';
        break;
    case '/simpleform.php':
        require 'simpleform.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}



?>
