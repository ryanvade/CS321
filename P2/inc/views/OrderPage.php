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
            $(".csv").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $("#csv-error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".csv").bind("paste", function (e) {
                return false;
            });
            $(".csv").bind("drop", function (e) {
                return false;
            });
            $(".zip").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $("#zip-error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".zip").bind("paste", function (e) {
                return false;
            });
            $(".zip").bind("drop", function (e) {
                return false;
            });
            var quantity = 1;
            var cost = 5;
            $("#more").click(function(){ quantity++;
              $("#quantity").val(quantity);
              $("#total").val(quantity * cost);
              $("#cost").text("Total Cost: $" + (quantity * cost));});

            $("#less").click(function(){ if(quantity > 1) {quantity--;}
            $("#quantity").val(quantity);
            $("#total").val(quantity * cost);
            $("#cost").text("Total Cost: $" + (quantity * cost));});

            $("#quantity").keyup(function() {
              if($("#quantity").val() > 0)
              {
                quantity = $("#quantity").val();
                $("#total").val(quantity * cost);
                $("#cost").text("Total Cost: $" + (quantity * cost));
              }else
              {
                quantity = 1;
                $("#quantity").val(quantity);
                $("#total").val(quantity * cost);
                $("#cost").text("Total Cost: $" + (quantity * cost));
              }
            });
        });
</script>
    	<header>
    	<img src ="./images/hallmarkCardsLogo.png">
    		<div class="nav">
    			<ul>
    				<li><a href="./index">Home</a></li>
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
      <input id="total" type="hidden" value="1"/> <!-- And this is where I pull an Amazon.com move... -->
    	<div class="page-title">
    	 <h1 class="loginH1">Payment and Shipping.</h1>
    	 <h2 id="cost">Total Cost: $5</h2>
    	</div>
    <div class="columns">
    	<div class="column">
    		<div class="row">
    			<h3>Credit Card Information</h3>
    		</div>
    		<div class="row">
    			Name on the Card: <input type="text" required/>
    		</div>
    		<div class="row">
    			Credit Card #:
    			<input class="inputCard" type="number"  max="9999" name="creditCard1" id="creditCard1" required/>
          -
          <input class="inputCard" type="number" max="9999" name="creditCard2" id="creditCard2" required/>
          -
          <input class="inputCard" type="number" max="9999" name="creditCard3" id="creditCard3" required/>
    			-
          <input class="inputCard" type="number" max="9999" name="creditCard4" id="creditCard4" required/>
          <span class="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
    		</div>
    		<div class="row">
    			Expiration Date: <input type="month" min="2011-01" max="2021-12" required/>
    		</div>
    		<div class="row">
    			CSV: <input class="csv" type="number" max="999" required/>
          <span class="error" id="csv-error" style="color: Red; display: none">* Input digits (0 - 9)</span>
    		</div>
    		<div class="row">
          Cost per card: $5, Quantity: <button id="less" form=""><</button><input type="number" min="1" max="99999" value="1" name="quantity" id="quantity" required/><button id="more" form="">></button>
    		</div>
    	</div>

    	<div class="column">
    		<div class="row">
    			<h3>Shipping Information</h3>
    		</div>
    		<div class="row">
    			Address: <input name="address" type="text" required/>
    		</div>
    		<div class="row">
    			City: <input name="city" type="text" required/>
    		</div>
    		<div class="row">
    			State: <select name=\'state\' required>
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
    		Zip Code: <input name="zipcode" class="zip" type="number" max="99999" required/>
        <span class="error" id="zip-error" style="color: Red; display: none">* Input digits (0 - 9)</span>
    	</div>
    	<div class="row">

    	</div>
    </div>
    </div>

    <div class="page-title">
    	<a href = "./templates">Cancel</a>
    	<button type="submit">Submit</button>
    </div>
    </form>


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
