<?php

 class EditPage {

   private $db;
   private $user;
   private $template;

   public function __construct($db, $user, $template)
   {
     $this->db = $db;
     $this->user = $user;
     $this->template = $template;
   }

   public function view()
   {
     $view = '
        <!DOCTYPE html>
        <html>
        <head>
        <title>Hallmark Cards</title>
        <link rel="stylesheet" href="../css/index.css" />
        </head>

        <body>
                <header>
                <img src ="../images/hallmarkCardsLogo.png">';
    if($this->user == null)
    {
        $view .= '<div class="nav">
          <ul class="outer-nav-ul">
            <li><a href="../index">Home</a></li>
            <ul class="inner-nav-ul">
              <li><a href="../register">Create Account</a></li>
              <li><a href ="../tracking">Track Orders</a></li>
              <li><a href="../templates">Templates</a></li>
              <li><a href="../login">Log In</a></li>

            </ul>
          </ul>
        </div>';
        }else
        {
            $view .= '<div class="nav">
              <ul class="outer-nav-ul">
                <li><a href="../index">Home</a></li>
                <ul class="inner-nav-ul">
                  <li><a href="../templates">Templates</a></li>
                  <li><a href="../help">Help</a></li>
                  <li><a href="../logout">Logout</a></li>
                  <li><a href ="#">' . $this->user->name() . '</a></li>
                </ul>
              </ul>
            </div>';
        }
      $view .='
          </header>
          <div class="log">
          <div id="editorGUI">
              <div id="editorButtonArea">
                  <table id="buttonTable">
                      <tr><td><button class="editorButton">Change template</button></td><td><button class="editorButton">Import image</button></td></tr>
                      <tr><td><button class="editorButton">Undo</button></td><td><button class="editorButton">Redo</button></td></tr>
                  </table>
                  <button>Add RSVP</button>
              </div>
              <div>
                  <div>
                  <span>
                      <button id="newbox">New Text Box</button>
                      <button id="deletebox">Delete Selected Box</button>
                      <label>Preview:<input id="showborders" type="checkbox"></label>
                  </span>
                  </div>
                  <span>
                    <select id="fontselect">
                        <option disabled>Font Selection</option>
                        <option disabled>--------------</option>
                        <option>Arial</option>
                        <option>Calibri</option>
                        <option>Comic Sans</option>
                        <option>Consolas</option>
                        <option>Courier New</option>
                        <option>Freestyle Script</option>
                        <option>French Script MT</option>
                        <option>Helvetica</option>
                        <option>Impact</option>
                        <option>Juice ITC</option>
                        <option>Lucida Sans Unicode</option>
                        <option>Papyrus</option>
                        <option>Segoe UI</option>
                        <option>Segoe UI Emoji</option>
                        <option>Tahoma</option>
                        <option>Times New Roman</option>
                        <option>Verdana</option>
                        <option>Wingdings</option>
                    </select>
                    <input id="fontsize" type="number" min=1 max=100 value=14>
                    <label title="Bold" style="font-weight: bold">B:<input type="checkbox" id="bold"></label>
                    <label title="Italic" style="font-style: italic">I:<input type="checkbox" id="italic"></label>
                    <label title="Underline" style="text-decoration: underline">U:<input type="checkbox" id="underline"></label>
                    <select id="alignment">
                        <option disabled>Text Alignment</option>
                        <option disabled>--------------</option>
                        <option>Left</option>
                        <option>Center</option>
                        <option>Right</option>
                    </select>
                    <select id="color">
                        <option disabled>Text Color</option>
                        <option disabled>--------------</option>
                        <option>Black</option>
                        <option>Blue</option>
                        <option>Green</option>
                        <option>Orange</option>
                        <option>Pink</option>
                        <option>Purple</option>
                        <option>Red</option>
                        <option>Yellow</option>
                        <option>White</option>
                    </select>
                  </span>
                  <div id="editorArea">';

                  //TEMP
                  $view .= '<img class="template" id="template" alt="" title="Click to outside of a text box to enable dragging" src="../'.$this->template->imageLocation().'" width="525" height="720">';

                  $view .= '
                      </div>
                  </div>
                  <span>
                      <a href="../index"><button type="button">Cancel</button></a>
                      <a href="../order"><button type="button">Continue to Payment</button></a>
                  </span>
              </div>

              <div>
                  

              </div>

              </div>
                    <footer id="footer" style="text-align: center">
                        <hr>
                        <p id="footerP"> &#169 2016 Hallmark Cards, LLC.</p>
                        <script src="../js/site.js"></script>
                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                        <script src="../js/EditPage.js"></script>
                    </footer>
              </body>
              </html>

              ';
     return $view;
   }
 }
