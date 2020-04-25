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
		case '/profile':
				require 'profile.php';
				break;
		case '/signup':
				require 'signup.php';
				break;
    default:
        http_response_code(404);
        exit('Not Found');
}



?>
