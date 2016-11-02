
<?php
class LoginPage
{

    public function __construct()
    {}

    public function view()
    {
        $view = '<!DOCTYPE html>
<html>
<head>
<title>Hallmark Cards</title>
<link rel="stylesheet" href="css/index.css" />
</head>
<body>
	<header>
	<img src ="images/hallmarkCardsLogo.png">
		<div class="nav">
			<ul class="outer-nav-ul">
				<li><a href="./index">Home</a></li>
				<ul class="inner-nav-ul">
					<li><a href="./register">Create Account</a></li>
					<li><a href="./login">LogIn</a></li>
                                        <li><a href="./help">Help</a></li>
                                          <li><a href ="./tracking">Track Orders</a></li>
				</ul>
			</ul>
		</div>
	</header>
		<div class="log">
			<form action="./login" method="POST">
			<h1 class="loginH1" id = "welcome"></h1>
      ';
      if(isset($_COOKIE['login_page']))
      {
        $view .= '<h2>' . $_COOKIE['login_page'] . '</h2>';
        setcookie('login_page', '', time()-1000);
        setcookie('login_page', '', time()-1000, '/');
      }
      $view .= '<h1 class="loginH1">Please sign in to your account.</h1>
			<input type = "text"  name = "username" placeholder="Username" autofocus/>
			<div class = "siteText" id = "unanswer">
				<label id = "commentName"></label>
			</div>
			<input type = "password" name = "password" placeholder="Password"/>
			<div class = "siteText" id = "pwanswer">
				<label id = "commentPassword"></label>
			</div>
			<p>
				<button style="cursor:pointer" value = "Login" type = "submit">Login</button>
			</p>
			</form>
			<p>
				Don\'t have an account? <br/>
				<a href="./register">Create one now</a>
			</p>
		</div>

		<footer id="footer">
			<hr>
			<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
		</footer>
</body>
</html>';
        return $view;
    }
}
