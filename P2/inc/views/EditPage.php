<?php

 class EditPage {

   private $db;
   private $user;
   private $order;

   public function __construct($db, $user, $order)
   {
     $this->db = $db;
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
      $view .='
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
                  <div id="editorArea">';
                  
                  //TEMP
                  $view .= '<img class="template" id="template" title="Click to outside of a text box to enable dragging" src="images/misc/misc1.png" width="525" height="720">';
                  
                  $view .= '
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
                    <footer id="footer" style="text-align: center">
                        <hr>
                        <p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
                        <script src="js/site.js"></script>
                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                        <script src="js/EditPage.js"></script>
                    </footer>
              </body>
              </html>

              ';
     return $view;
   }
 }
