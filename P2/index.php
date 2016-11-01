<?php
    require './inc/db.php';

    require './inc/models/User.php';
    require './inc/models/Order.php';
    require './inc/models/Image.php';
    require './inc/models/Invitation.php';
    require './inc/models/Template.php';

    require './inc/views/EditPage.php';
    require './inc/views/HomePage.php';
    require './inc/views/LoginPage.php';
    require './inc/views/RegisterPage.php';
    require './inc/views/TemplatePage.php';
    require './inc/views/HelpPage.php';

    require './inc/controllers/RegisterUser.php';
    require './inc/controllers/LoginUser.php';


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
    $db = new db();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    switch ($routes[1]){
        case 'login':
            $login = new LoginUser($_POST['username'], $_POST['password'], $db);
            $user = $login->action();
            if($user == null)
            {
                redirect('./login');
            }else
            {
                setcookie('user_id', $user->id(), time() + (86400 * 30), "/");
                redirect('./index');
            }
            break;
        case 'register':
            if($_POST['password'] == $_POST['confirmPassword'])
            {
                $register = new RegisterUser($db, $_POST['username'], $_POST['email'], $_POST['password']);
                $user = $register->action();
                setcookie('user_id', $user->id(), time() + (86400 * 30), "/");
                echo $user->id();
                redirect('./index');
            }else
            {
                redirect('./login');
            }

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
        if(isset($_COOKIE['user_id']))
        {
            $user = new User($_COOKIE['user_id'], null, null, null, $db);
        }

        if(isset($_COOKIE['order_id']))
        {
            $order = new Order($_COOKIE['order_id'], $db);
        }


	switch($routes[1]){
        case '': // /
        case 'index':
            $page = new HomePage($user, $order);
            echo $page->view();
            break;
        case 'login':
            if(!isset($_COOKIE['user_id']))
            {
                $page = new LoginPage();
                echo $page->view();
            }else
            {
              redirect('./index');
            }
            break;
        case 'logout':
            if(isset($_COOKIE['user_id']))
            {
                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                foreach($cookies as $cookie) {
                    $parts = explode('=', $cookie);
                    $name = trim($parts[0]);
                    setcookie($name, '', time()-1000);
                    setcookie($name, '', time()-1000, '/');
                }
                redirect('./index');
            }else{
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
            $page = new TemplatePage($user);
            echo $page->view();
            break;
        case 'edit':
            if(isset($routes[2]) && is_numeric($routes[2]))
            {
                $page = new EditPage($db, $user, $routes[2]);
                echo $page->view();
            }else
            {
                redirect('./index');
            }
            break;
        case 'order':
            if($user == null)
            {
              redirect("./login");
            }else {
              if($order == null)
              {
                $order = new Order(null, $db, $user);
              }
              echo 'order page';
            }
            break;
        case 'order-confirm':
            echo 'confirm-order';
            break;
        case 'tracking':
            echo 'order tracking page';
            break;
        case 'help':
          $page = new HelpPage($user);
          echo $page->view();
          break;
        default:
            echo '404';
            break;
	}
}

$db->close();
