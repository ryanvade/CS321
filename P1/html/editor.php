<!DOCTYPE html>
<html>
<head>
<title>Hallmark Cards</title>
<link rel="stylesheet" href="../css/index.css" />
</head>

<body>
	<header>
	<img src ="../images/hallmarkCardsLogo.png">
		<div class="nav" style="text-align: center">
			<ul>
				<li><a href="newIndex.html">Home</a></li>
				<ul style="float: right; list-style-type: none;">
					<li><a href ="trackOrders.html">Track Orders</a></li>
					<li><a href="#">User</a></li>
					<li><a href="../index.html">Logout</a><li>
				</ul>
			</ul>
		</div>
	</header>
  <div class="log">
  <div id="editorGUI">
      <div id="editorButtonArea">
          <table id="buttonTable">
              <tr><td><button class="editorButton">Change template</button></td><td><button class="editorButton">Import image</button></td></tr>
              <tr><td><button class="editorButton">Undo</button></td><td><button class="editorButton">Redo</button></td></tr>
              <tr><td><button class="editorButton">TEST</button></td><td><button class="editorButton">TEST</button></td></tr>
              <tr><td><button class="editorButton">TEST</button></td><td><button class="editorButton">TEST</button></td></tr>
              <tr><td><button class="editorButton">TEST</button></td><td><button class="editorButton">TEST</button></td></tr>
          </table>
      </div>
      <div>
          <div>
          <span>
              <button id="newbox">New Text Box</button>
              <button id="deletebox">Delete Selected Box</button>
              Preview:<input id="showborders" type="checkbox">
          </span>
          </div>
          <span>
            <select id="fontselect">
                <option disabled>Font Selection</option>
                <option disabled>--------------</option>
                <option>Arial Black</option>
                <option>Calibri</option>
                <option>Times New Roman</option>
            </select>
            <input id="fontsize" type="number" min=1 max=100 value=14>
            Bold:<input type="checkbox" id="bold">
            Italic:<input type="checkbox" id="italic">
            Underline:<input type="checkbox" id="underline">
            <select id="alignment">
                <option disabled>Text Alignment</option>
                <option disabled>--------------</option>
                <option>Left</option>
                <option>Center</option>
                <option>Right</option>
            </select>
          </span>
          <div id="editorArea">
                <?php if(empty($_POST['template']) || $_POST['template']=="blank") {
                    //echo "Please select an invitation template or import your own image";
                    //TEMP
                    echo '<img class="template" id="template" title="Click to outside of a text box to enable dragging" src="../images/temp2.jpg" width="525" height="720">';
                }
                else {
                    echo '<img class="template" id="template" title="Click to outside of a text box to enable dragging" src="../images/'. $_POST['template'] .'.jpg" width="525" height="720">';
                }
                ?>
          </div>
      </div>
  </div>
      
  <div>
      <span>
          <a href="newIndex.html"><button type="button">Cancel</button></a>
          <a href="paymentAndShipping.html"><button type="button">Continue</button></a>
      </span>
          
  </div>

  </div>
   
  	<footer id="footer">
  		<hr>
  		<p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>

        <script src="../js/site.js"></script>
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="editor.js"></script>
  	</footer>

  </body>
  </html>
  
  