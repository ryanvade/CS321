/**
* Created by PhpStorm.
* User: ryan owens
* Date: 10/28/2016
* Time: 8:14 PM
*/

<?php
    require './inc/db.php';

    require './inc/models/User.php';
    require './inc/models/Order.php';
    require './inc/models/Image.php';
    require './inc/models/Invitation.php';
    require './inc/models/Template.php';

    require './inc/views/HomePage.php';
    require './inc/views/LoginPage.php';
    require './inc/views/RegisterPage.php';

	function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
	}

    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
 
	$base_url = getCurrentUri();
	$routes = array();
	$routes = explode('/', $base_url);
    $database = new db();
    $user = null;
    $order = null;
    $page = null;
 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    switch ($routes[1]){
        case 'login':
            echo 'Login with : ';
            print_r($_POST);
            break;
        case 'register':
            echo 'Register with: ';
            print_r($_POST);
            break;
        case 'addInvitation':
            echo 'Add Invitation with: ';
            print_r($_POST);
            break;
        case 'order':
            echo 'Order with: ';
            print_r($_POST);
            break;
        default:
            redirect('./index');
            break;
    }
}else
{
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }else
    {
        if(isset($_SESSION['user_id']))
        {
            $user = new User($db = $database, $id = $_SESSION['user_id']);
        }

        if(isset($_SESSION['order']) && isset($_SESSION['order']['id']))
        {
            $order = new Order($_SESSION['order']['id']);
        }
    }

	switch($routes[1]){
        case '': // /
        case 'index':
            $page = new HomePage($user, $order);
            echo $page->view();
            break;
        case 'login':
            if($user == null)
            {
                $page = new LoginPage();
                echo $page->view();
            }else
            {
              redirect('./index');
            }
            break;
        case 'register':
            if($user == null)
            {
                $page = new RegisterPage();
                echo $page->view();
            }else
            {
                redirect('./index');
            }
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

$db->close();