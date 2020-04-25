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
        break;
    case '/type':
        require 'type.php';
		case '/profile':
				require 'profile.php';
				break;
		case '/signup':
				require 'signup.php';
				break;
		case '/delete_account':
				require 'delete_account.php';
				break;
		case '/logout':
				require 'logout.php';
				break;
    default:
        http_response_code(404);
        exit('Not Found');
}



?>
