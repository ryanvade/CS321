<?php
class TrackOrdersPage{
    private $user;
    private $order;
    public function __construct($user, $order)
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
            <li><a href="index">Home</a></li>
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
       <body>
		<div class="log" >
			<h1 class="loginH1">Track Your Order</h1>
			<form>
				<input type = "text" id = "username"  placeholder="Order Number"/>
				<div class = "siteText" >
					<p>
						<a href="trackOrdersData.html">Track Now!</a>
					</p>
				</div>
			</form>
		</div>


<footer id="footer" style="text-align: center">
	<hr>
	<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
	<script src="../js/site.js"></script>
	<script src="../js/trackOrders.js"></script>
</footer>

</body>

    </html>';
        return $view;
    }
}