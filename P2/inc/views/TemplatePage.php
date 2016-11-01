<?php


class TemplatePage {
  private $user;

  public function __construct($user)
  {
    $this->user = $user;
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
            <li><a href="./index">Home</a></li>
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
        <h1>Click on a Template to edit.</h1>
        <hr>
    		<div class="log" >
    			<h1 class="loginH1">Birthday</h1>
    			<form>
    				<table id = "tablePage">
            <tr>
      				<td><a href="./edit/1"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday1.jpg"></a></td>
      				<td><a href="./edit/2"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday2.gif"></a></td>
      				<td><a href="./edit/3"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday3.jpg"></a></td>
      				<td><a href="./edit/4"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday5.jpg"></a></td>
    				</tr>
            <tr>
              <td><a href="./edit/5"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday6.jpg"></a></td>
      				<td><a href="./edit/6"><img id= "tableimg" height="200" width="150" src ="images/birthday/birthday7.jpg"></a></td>
    				</tr></table>

    			<h1 class="loginH1">Holiday</h1>
    			<form>
    				<table id = "tablePage">
            <tr>
      				<td><a href="./edit/7"><img id= "tableimg" height="200" width="150" src ="images/holiday/holiday1.jpg"></a></td>
      				<td><a href="./edit/8"><img id= "tableimg" height="200" width="150" src ="images/holiday/holiday2.jpg"></a></td>
    				</tr>
            </table>


    			<h1 class="loginH1">Kids</h1>
    			<form>
    				<table id = "tablePage">
              <tr>
        				<td><a href="./edit/9"><img id= "tableimg" height="200" width="150" src ="images/kids/kids1.jpg"></a></td>
        				<td><a href="./edit/10"><img id= "tableimg" height="200" width="150" src ="images/kids/kids2.jpg"></a></td>
        				<td><a href="./edit/11"><img id= "tableimg" height="200" width="150" src ="images/kids/kids3.jpg"></a></td>
        				<td><a href="./edit/12"><img id= "tableimg" height="200" width="150" src ="images/kids/kids4.jpg"></a></td>
        			</tr>
              <tr>
                <td><a href="./edit/13"><img id= "tableimg" height="200" width="150" src ="images/kids/kids5.jpg"></a></td>
        				<td><a href="./edit/14"><img id= "tableimg" height="200" width="150" src ="images/kids/kids6.png"></a></td>
        				<td><a href="./edit/15"><img id= "tableimg" height="200" width="150" src ="images/kids/kids7.jpg"></a></td>
        				<td><a href="./edit/16"><img id= "tableimg" height="200" width="150" src ="images/kids/kids8.jpg"></a></td>
        			</tr>
              <tr>
                <td><a href="./edit/17"><img id= "tableimg" height="200" width="150" src ="images/kids/kids9.jpg"></a></td>
        				<td><a href="./edit/18"><img id= "tableimg" height="200" width="150" src ="images/kids/kids10.gif"></a></td>
        				<td><a href="./edit/19"><img id= "tableimg" height="200" width="150" src ="images/kids/kids11.jpg"></a></td>
        				<td><a href="./edit/20"><img id= "tableimg" height="200" width="150" src ="images/kids/kids12.jpg"></a></td>
      				</tr>
            </table>

    			<h1 class="loginH1">Wedding</h1>
    			<form>
    				<table id = "tablePage">
              <tr>
        				<td><a href="./edit/21"><img id= "tableimg" height="200" width="150" src ="images/wedding/wedding 1.jpg"></a></td>
        				<td><a href="./edit/22"><img id= "tableimg" height="200" width="150" src ="images/wedding/wedding 2.png"></a></td>
        				<td><a href="./edit/23"><img id= "tableimg" height="200" width="150" src ="images/wedding/wedding3.jpg"></a></td>
      				</tr>
            </table>

    			<h1 class="loginH1">Other</h1>
    			<form>
    				<table id = "tablePage">
              <tr>
        				<td><a href="./edit/24"><img id= "tableimg" height="200" width="150" src ="images/misc/misc1.png"></a></td>
        				<td><a href="./edit/25"><img id= "tableimg" height="200" width="150" src ="images/misc/misc2.jpg"></a></td>
        				<td><a href="./edit/26"><img id= "tableimg" height="200" width="150" src ="images/misc/misc3.jpg"></a></td>
                <td><a href="./edit/27"><img id= "tableimg" height="200" width="150" src ="images/custom.png"></a></td>
        			</tr>
              <tr>
                <td><a href="./edit/28"><img id= "tableimg" height="200" width="150" src ="images/misc/misc4.jpg"></a></td>
        				<td><a href="./edit/29"><img id= "tableimg" height="200" width="150" src ="images/misc/misc5.jpg"></a></td>
        				<td><a href="./edit/30"><img id= "tableimg" height="200" width="150" src ="images/misc/misc6.png"></a></td>
        				<td><a href="./edit/31"><img id= "tableimg" height="200" width="150" src ="images/misc/misc7.jpg"></a></td>
      				</tr>
              <tr>
                <td><a href="./edit/32"><img id= "tableimg" height="200" width="150" src ="images/misc/misc8.jpg"></a></td>
        				<td><a href="./edit/33"><img id= "tableimg" height="200" width="150" src ="images/misc/misc9.jpg"></a></td>
        				<td><a href="./edit/34"><img id= "tableimg" height="200" width="150" src ="images/misc/misc10.jpg"></a></td>
        				<td><a href="./edit/35"><img id= "tableimg" height="200" width="150" src ="images/misc/misc11.jpg"></a></td>
      				</tr>
            </table>


    				<div class = "siteText" >
    					<p>
    						<a href="./templates">Back to the top</a>
    					</p>
    				</div>
    			</form>
    		</div>


    </body>

    <footer id="footer" style="text-align: center">
    	<hr>
    	<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
    	<script src="js/site.js"></script>
    	<script src="js/trackOrders.js"></script>
    </footer>
    </html>';
    return $view;
  }
}
