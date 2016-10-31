<?php
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
        				<li><a href="./index">Home</a></li>
        				<ul class="inner-nav-ul">
        					<li><a href="./register">Create Account</a></li>
        					<li><a href ="./tracking">Track Orders</a></li>
        					<li><a href="./templates">Templates</a></li>
        					<li><a href="./login">Log In</a></li>

        				</ul>
        			</ul>
        		</div>';
        }else
        {
            $view .= '<div class="nav">
        			<ul class="outer-nav-ul">
        				<li><a href="index.html">Home</a></li>
        				<ul class="inner-nav-ul">
                  <li><a href="./templates">Templates</a></li>
                  <li><a href="./help">Help</a></li>
        					<li><a href="./logout">Logout</a></li>
        					<li><a href ="#">' . $this->user->name() . '</a></li>
        				</ul>
        			</ul>
        		</div>';
        }
	$view .='</header>

	<form>
			<div class="logo" id= "logo">
				<h1 class="loginH1" align="middle">About Hallmark</h1>
				<hr>
        <p id = "helloPar">
        No one does special occasions like Hallmark.

        Hallmark has been your family-owned creator of invitations and more for over 100 years. We take deep pride in helping individuals connect in just the right way.

        Our Hallmark invitations, available in a variety of aesthetic styles and tones, help you share your sentiments in a way that fits your unique relationships.

        Whatever the occasion, our gift offerings are diverse, unique and sure to have something for your situation.

        We feature special debuts, premiers and announcements throughout the year to help you stay up-to-date on these beautifully crafted, collector-quality invitations.

        Thank you for visiting!

        </p>
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
