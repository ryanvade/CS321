<?php
    require './inc/db.php';
    require './inc/User.php';
    require './inc/Order.php';
    require './inc/Image.php';
    require './inc/Invitation.php';
    require './inc/Template.php';

	function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
	}
 
	$base_url = getCurrentUri();
	$routes = array();
	$routes = explode('/', $base_url);
    $db = new db();
 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{

}else
{
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }else
    {
        if(isset($_SESSION['user_id']))
        {
            $user = new User($_SESSION['user_id']);
        }

        if(isset($_SESSION['order']) && isset($_SESSION['order']['id']))
        {
            $order = new Order($_SESSION['order']['id']);
        }
    }

	switch($routes[1]){
        case '': // /
            echo 'home page';
            break;
        case 'login':
            echo 'login page';
            break;
        case 'register':
            echo 'register page';
            break;
        case 'templates':
            if(isset($routes[2])) {
                switch($routes[2]){
                    case 'wedding':
                        echo 'wedding template page';
                        break;
                    case 'birthday_party':
                        echo 'birthday party template page';
                        break;
                    case 'generic':
                        echo 'generic template page';
                        break;
                    default:
                        echo '404';
                        break;
                }
            }else
            {
                echo 'templates page';
            }
            break;
        case 'edit':
            if(isset($routes[2]) && is_numeric($routes[2]))
            {
                echo 'editing template ' . $routes[2];
            }else
            {
                echo 'edit page';
            }
            break;
        case 'order':
            echo 'order page';
            break;
        case 'order_tracking':
            echo 'order tracking page';
            break;
        default:
            echo '404';
            break;
	}
}
