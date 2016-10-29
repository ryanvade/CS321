<?php

/**
 * Created by PhpStorm.
 * User: ryan owens
 * Date: 10/29/2016
 * Time: 10:43 AM
 */
class HomePage
{
    private $user;
    private $order;

    public  function __construct($user = null, $order = null)
    {
        $this->user = $user;
        $this->order = $order;
    }

    public function view()
    {
        $view = '
<!DOCTYPE html>
<html>
<head>
<title>Hallmark Cards</title>
<link rel="stylesheet" href="css/index.css" />
</head>

<body>
	<header>
	<img src ="images/hallmarkCardsLogo.png">';
        if($this->user == null)
        {
            $view .= '<div class="nav">
			<ul class="outer-nav-ul">
				<li><a href="/">Home</a></li>
				<ul class="inner-nav-ul">
					<li><a href="./register">Register</a></li>
					<li><a href="./login">Log In</a></li>
				</ul>
			</ul>
		</div>';
        }else
        {
            $view .= '<div class="nav">
			<ul class="outer-nav-ul">
				<li><a href="./">Home</a></li>
				<ul class="inner-nav-ul">
					<li>' . $this->user->name() . '</li>
				</ul>
			</ul>
		</div>';
        }
	$view .='</header>

	<form>
			<div class="logo" id= "logo">
				<img  align="middle" src="images/homepageBanner.png">
				<h1 class="loginH1" align="middle">Free shipping on purchases of $50 or more</h1>
				<hr>
				<h1 class="loginH1" align="middle">Invitation Templates</h1>

				<table id = "tablePage"><tr>
				<td><img id= "tableimg" src ="images/templates/temp1.jpg"></td>
				<td><img id= "tableimg" src ="images/templates/temp2.jpg"></td>
				<td><img id= "tableimg" src ="images/templates/temp3.jpg"></td>
				</tr></table>

				<table id = "tablePage"><tr>
				<td><img id= "tableimg" src ="images/templates/temp4.jpg"></td>
				<td><img id= "tableimg" src ="images/templates/temp5.jpg"></td>
				<td><img id= "tableimg" src ="images/templates/temp6.jpg"></td>
				</tr></table>
			</div>
	</form>

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