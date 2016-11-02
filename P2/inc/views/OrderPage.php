<?php

class OrderPage{
  private $user;
  private $db;

  public function __construct($db, $user)
  {
    $this->db = $db;
    $this->user = $user;
  }

  public function view()
  {
    $view = '<!DOCTYPE html>
    <html>
    <head>
    <title>Hallmark Cards</title>
    <link rel="stylesheet" href="./css/index.css" />
    </head>

    <body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $(".inputCard").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $(".error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".inputCard").bind("paste", function (e) {
                return false;
            });
            $(".inputCard").bind("drop", function (e) {
                return false;
            });
        });
</script>
    	<header>
    	<img src ="./images/hallmarkCardsLogo.png">
    		<div class="nav">
    			<ul>
    				<li><a href="newIndex.html">Home</a></li>
    				<ul style="float: right; list-style-type: none;">
    					<li><a href ="./tracking">Track Orders</a></li>
    					<li><a href="#">User</a></li>
    					<li><a href="./help">Help</a></li>
    					<li><a href="./logout">Logout</a><li>
    				</ul>
    			</ul>
    		</div>
    	</header>

      <form action="./order" method="POST" id="shippings">
    	<div class="page-title">
    	 <h1 class="loginH1">Payment and Shipping.</h1>
    	 <h2 id="cost">Total Cost: $5.00</h2>
    	</div>
    <div class="columns">
    	<div class="column">
    		<div class="row">
    			<h3>Credit Card Information</h3>
    		</div>
    		<div class="row">
    			Name on the Card: <input type="text"/>
    		</div>
    		<div class="row">
    			Credit Card #:
    			<input class="inputCard" type="number"  min="1000" max="9999" name="creditCard1" id="creditCard1" />
          -
          <input class="inputCard" type="number" min="1000" max="9999" name="creditCard2" id="creditCard2" />
          -
          <input class="inputCard" type="number" min="1000" max="9999" name="creditCard3" id="creditCard3" />
    			-
          <input class="inputCard" type="number" min="1000" max="9999" name="creditCard4" id="creditCard4" />
          <span class="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
    		</div>
    		<div class="row">
    			Expiration Date: <input type="month" min="2011-01" max="2021-12"/>
    		</div>
    		<div class="row">
    			CSV: <input type="number" min="001" max="999"/>
    		</div>
    		<div class="row">
          Quantity: <button id="less" form=""><</button><input type="number" min="1" max="99999" value="1" name="quantity"/><button id="less" form="">></button>
    		</div>
    	</div>

    	<div class="column">
    		<div class="row">
    			<h3>Shipping Information</h3>
    		</div>
    		<div class="row">
    			Address: <input type="text"/>
    		</div>
    		<div class="row">
    			City: <input type="text"/>
    		</div>
    		<div class="row">
    			State: <select name=\'state\'>
    				<option value=\'\'></option>
    				<option value=\'AL\'>Alabama</option>
    				<option value=\'AK\'>Alaska</option>
    				<option value=\'AZ\'>Arizona</option>
    				<option value=\'AR\'>Arkansas</option>
    				<option value=\'CA\'>California</option>
    				<option value=\'CO\'>Colorado</option>
    				<option value=\'CT\'>Connecticut</option>
    				<option value=\'DE\'>Deleware</option>
    				<option value=\'FL\'>Florida</option>
    				<option value=\'GA\'>Georgia</option>
    				<option value=\'HI\'>Hawaii</option>
    				<option value=\'ID\'>Idaho</option>
    				<option value=\'IL\'>Illinois</option>
    				<!-- Insert the 37 states here -->
    		</select>
    	</div>
    	<div class="row">
    		Zip Code: <input type="number" min="0001" max="9999"/>
    	</div>
    	<div class="row">

    	</div>
    </div>
    </div>
    </form>

    <div class="page-title">
    	<a href = "./templates"><button value = "Cancel">Cancel</button></a>
    	<button type="submit" form="shipping">Submit</button>
    </div>


    	<footer id="footer" style="text-align: center">
    		<hr>
    		<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
    		<script src="js/site.js"></script>
    		<script src="js/paymentAndShipping.js"></script>
    	</footer>
    </body>
    </html>';
    return $view;
  }
}
