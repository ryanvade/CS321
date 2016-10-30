
<?php
class RegisterPage
{
    public function __construct()
    {
        // just an ordinary page
    }

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
						<li><a href="./login">LogIn instead?</a></li>
					</ul>
				</ul>
			</div>
	</header>

		<div class="log" style="text-align: center">
			<h1 class="loginH1">Create New Account</h1>
			<form action="./register" method="POST">
				<div class = "siteText">
					<input name="username" type = "text" id = "username" placeholder="Username"/>
				</div>
				<div class = "siteText" >
					<input name="email" type = "email" id = "email"  placeholder="Email"/>
				</div>
				<div class = "siteText">
					<input name="password" type = "password"  id = "password"  placeholder="Password"/>
				</div>
				<div class = "siteText">
					<label id = "commentPassword"></label>
				</div>
				<div class = "siteText">
					<input  name="confirmPassword" type = "password" id = "confirmPassword" placeholder="Confirm Password"/>
				</div>
				<div class = "siteText">
					<label id = "commentConfirmPassword"></label>
				</div>
				<p>
					<button type="submit">Submit</button>
				</p>
			</form>
	</div>

		<footer id="footer">
			<hr>
			<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
		</footer>
</body>
</html>
';
        return $view;
    }
}