<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'index.php';
        break;
		case '/login':
				require 'login.php';
				break;
    case '/simpleform':
        require 'simpleform.php';
        break;
    case '/ability':
        require 'ability.php';
    case '/type':
        require 'type.php';
    default:
        http_response_code(404);
        exit('Not Found');
}



?>
