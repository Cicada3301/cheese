<html ng-app>
<head>
	<title>Cicada3301's Website</title>
  <link rel='stylesheet' type='text/css' href='assets/stylesheet.css'>
  <script  type="text/javascript" src="assets/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="assets/scripts.js"></script>
  <script src='home-scripts.js'></script>
  <script src='http://www.copot.eu/matei/assets/angular.min.js'></script>
	<link rel='shortcut icon' type='image/x-icon' href='assets/me.jpg'>
</head>
<body>
    <div id="chat" ng-controller='greet'>
                        <div id="closeChat">
                            <div>C</div>
                            <div>H</div>
                            <div>A</div>
                            <div>T</div>
                        </div>
                        <div id="openChat">
                            <div id="insertChat">
                                <form action="?savedata=1" method="post">
                                    <input type="text" name="name" value='{{userName}}' style='display:none'>
                                    <textarea name="message" rows="5" cols="30" placeholder="Message"></textarea>
                                    <input type="submit" name="submit" value="Submit">
                                </form>
                                 <?php
      $x='<a href="http://www.copot.eu/matei/feedback" style="color:red; font-family:Courier"> [X]</a>';
      $savedata = $_REQUEST['savedata'];
      if($savedata==1){
        $test=$_POST['name'].$_POST['message'];
        if(strlen($_POST['name'])<4){
          $message = "Make sure your name has more than 3 characters".$x;
          echo $message;
        }elseif(strlen($_POST['message'])<10){
          $message = "Make sure your message has more than 10 characters (right now it is ".strlen($_POST['message'])." characters long)".$x;
          echo $message;
        }elseif(strpos($test, '-..--..-..---.-')==true){
          $message = "Cheater!".$x;
          echo $message;
        }elseif(strlen($test)>749){
          $message='The text needs to have less than 750 characters'.$x;
          echo $message;
        }else{
          $now = time();
          $num = date("w");
          if ($num == 0){
           $sub = 6; 
          } else { 
          $sub = ($num-1);
          }
          $WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
          $todayh = getdate($WeekMon); //monday week begin reconvert

          $current_time = ($todayh[mday]).'/'.$todayh[mon].'/'.$todayh[year];
          $data ="<article class='chat' title='".$current_time."''><span class='chatName'>" . htmlentities($_POST['name']) . "</span>";
          $data .= "<span class='chatMessage'>".htmlentities($_POST['message'])."</span></article>-..--..-..---.-";
          $file = 'D:\inetpub\webs\copoteu\matei/feedback/feedback_file-of_awesomeness.txt';

          $fp = fopen($file, "a") or die("Couldn't open $file for writing!");
          fwrite($fp, $data) or die("Couldn't write values to file!"); 

          fclose($fp);
          header('Location: http://www.copot.eu/matei',true);
        }
      }
      ?>

                            </div>
                            <div id="contentChat">
                            </div>
                        </div>
                    </div>
  <div ng-controller='greet' class='centerText'>
    <h1>Welcome {{first}}<span class='clickable' id='name' ng-click='addUserName()' title='click to change name'>{{userName}}</span>! This is the <span class='clickable' id='number' ng-click='resetNumber()' ng-attr-title='if you ask, it {{isPrimeNumberView}} a prime number. Click to reset'>{{number}}{{th}}</span> time you visit the main page</h1>
  </div>
<pre style="font: 10px/5px monospace;"><span id='pre'>







                    ````.'+++++++'`,.```.`                                              ````                                                   `....`.,.......`
               `+#@@@@@@@@@@@@@@@@@@@@@@@@@@@#'.                                     `:#@@@@#`.                                 `   .`'+###@@@@@@@@@@@@@@@@@@@@@@+'`
            .#@@@@@###'.`.      `...'#+@@@@@@@@@@@#,.`                            '+@@@@@@@@@@@#`                              .,#@@@@@@@@#@@@++.........`'+++##@@@@@+,
          '@@@#,     `             ``    `; ` :#@@@@@@+'.                       `@@#@#@+,`:#+@@@@@,                       .`##@@@@@@++,.`,,``  `        ;+' ```  .,#@#@#.
         @@#`` ` '#@+       +#@##@#..        '.   ``##@@@@+`                   `@@@@+`  ' .  ..@@@@`                   `#@@@@@#+##,  ``        '##++++  `'@@.@`   .`#@@@@'
       .@@,    '+,`#      ,@##+,.` `        ;#.'`'. ,+,,+@@@@+,                #@@@@`  '`  `; .@,@@.               .'+@@@##,.  .@,    `.        .,.++@'  ,@@+    `:`:`,'@@,
      .@@,  ,'.``:@.     ` #@'               .@+,+@#` .'@+..@@@@#'.            +@@@.```, `  ;';'`+,              ,#@@#@,. `` .@@       .`    `;++      `;`:.+    `+'`.+@' ;
      @@@ ;  ` ``#@.       :@+    `@@@#+##@@@@@@@`##@+ `  .#@+:#@@@@.          `+@#,  `                       ,#@#@@,.     `+@'   .+#+++...#@@@#'         @+' ` +#  `++,
     `@@@.`   `#@+ `       @#.        ##+++.`,`.`  `:@@@@#+. ,+#,:#@@@'          @@@  ,@@   `'@`           `##@@#'`     .+@#@.    +######@##,.` `         .#`  #,+#+, :,`
     `@@+ ` '@@.    `'@@ ;. `#   '+       `        ` `,+@@@@@#` +#@,'@@@@.       @###  @@`   +@`.+      `.@@@@'`    `#@@@@#'`      ``     .``  ` `:   ;..`@@+`  ;.#;@+ ,'
      @@,. '@,    '@@@'.      `'@@      `     ``` '+. `. `,+@@@@#+,:@#@@#@@'    ,@@@.+,@@ ,+:@#  '.   ,#@@@@, ` .`+@@@#'`           `    .@#    @@.      @@:+@@+` #@,+#+
      `,#..@.   ,@@#`        `@@##    `##@@@@@@@#`.```.,#@#, `+@#+#+#,+@@@@@@'  @@@#.@@@+`##@@.   + '@@@@@'  ,#@@#@'``      `   ,##@@@@@+#`,##. ,'@`  ` `:@:.',@#``'@#
       .;`'' `.,@@,    '@+ .;+;+   '#@@@#:+```.'`+@#@@@@@@#```;   `'###@.@@@@@@#@@@#.``.# '#:,,   #@@@@@@.#,+#,.    @,  +@@@#+#@@++'``',##@##@' `` `.  '@@. .'#`@@#+@
           '#,@@@.   `,@@@.  ,#@  ``,`      ```  . ;#@`.` .     `#@#@@@: ` ..@@@@@@@.++,     ` ,`##@@+#, .# ,#+ .``..   +##@@@@,;`+   `    .`.  `     '@#@@'` ##.'+,`
           ,`'':  ` '@@#      ,@#         `'@+ .'` ``       `,#@@@+.`+,'. `  .,@@@@+;      . `'+@@#+ `  `  @#`'@++,,.''+,   `#'#'#. ..`  `  ;.      ``.@+;,+@+.@,
             `  @ +#@#. ` '@@+,@..     `##@@,          .,#@@@@##,''..  +.  `+@ #@@,     `    .  @@+  :'`  `. .'+@@@@@@+'`  .#   ,. .#@@@#,  `++  ` .@#@:+'. ,@@+
              ` `+@#+`   `@@@@        '@@@'`      .`,#@@@@#@:''`    `++.    #.+# ``    @`    .@ `'`'' .++` ,+'`   `.+@@@@@@#.`   ++.``'@@@+.     `,+@@@@` +.;``
                `  ,+   +@@'    .  ` ##@@#    ,#@@@@@@@#:',``   ` ;#,      #@:#+     ,#@`    ,@.  . + ` `##``  `+#++. ``+#@@@#@###`+'#+,@@#,    ,,.@@+,#@',@'
                 ...#,#@@@.`  @@@@.:`,@@   :#@@@@@@''#'.     ` `'`        +@@+ `  `  .@@   `+##; `# ,@'   `.#;`  `` `'++`  `+@@@@@@#+:@#     .`'@@@#+;  +@@'
                  `;.+#,.    +@@#+    +@+ `@@#.. `,+.     .`+``         .`  . @@#` ` .@@`   @@@`      .#+`  `.`.+,''`   `+@'. ,` .'+#@@'      .@+`'@,`+.,.`
                    `+ .# ` +#:.`  ,#@@@+  .    `.#    ,###.                 +@@@` `@@@@`..@@@# `     ;. .;`     .:'.`; ` ` '@@.  `  ..  `,#@#`@#   @':@`
                      +.''+@@@    '#@##.       `@@. `'@#.                   `@@@@:#`@@@+ #@@@@. ;         ` ;       `` +``@.`+@;` ,++,   `,#@#@`+'  `@#,
                       `+;##,`   ,@@#`       `,@@# #@#``                   `'.+@@@  @@`   ;:,+ .'.+        ,;`          '#@@@@@#``.      ;` `  '.:@''`
                         .'`+' '@@#'     #+@#++@@@ ,:'`                     .@@@@,;,`         ``` `.;`        .         `#,@@@@: @@@@++`.` '`#@@@@@'
                         ` `,@@;,.      `      `##`'+;;                     .'@@@ ``   ;` ',  `                          '@#@@#. `    .,#+@+++.`.   `
                              ,#` .'.`      `+@@@'    `                      .@+@.     .   #'                             ;+@##`+@@#` `+'`
                                 ..'.     '@'@+,   .'@@`                     '@+@. .  +@ '`  '. `                          @@'  `+#@+##`
                                        ,#@#'`    +@@#@@                     '@#@  '.@+` ;@#'#`   ;                       +#@#`   .+,#@@#`
                                       '@@,     `#@'.:+#.                    .@@@.         .      '`                     +@@#` '   ,#@,#@@.
                                      '@@, ,+`'#` +@@+  .                    +@@+  `'`+      ``;   .                     '@@' `'`  ` ,@#,@@`
                                     `@@@ +#.    ##.#                        '@@#`.,.,      `@,                          '#@.   ` :,#@@,+'.+
                                     '@@@ `  .'+@@+.   `#`                   `+@#  `  `                                  @@;   `@@, .@+..  ,
                                     +@@,   '@@@+.  `                      `  #@@`    `+#  :  .`                        .@@. ` :`#@@#@@:'```
                                     `@@,`+#@@.  '@  `  ;                     +@@   +@@#` ##,+'`    `                    #@`    `'.##@,#@'
                                      @@#,@#`   +@'      `                    +@@   ,`     `.+@     `                   `@#       +#+'@@@,
                                      `@@@#`` ;@@`  ' `   .                   @@+     `@    ,+`     .`                ` ,@@`    .'+.@@;#`
                                       `@#@.`@@+  +@     @#                   @@#     .#`   ;@`      @                 `@@@`    #'+@+@'
                                        `@+'+,,  '@.``' .@`                   +@@      ,     `     ` `.                @@@#````+'#@'@+
                                          '#`+, #@.`,#``'.  `                 ##@'    .,    ,;    .'  +`              `@@..#.``+@#@+
                                            ++@+,' ,@. `@:''@`  `             `@@     `'   ``     `+  '               #@@`,@+,,.+@+
                                         `   .@,+;`'. .@#`@@#@@@+`             @@'    '#   ;``    ''   .          ,+#@@@@+@@@.@'+
                                               ,#,`:+. ..    `.                #@@.  @,#  #.`     #    '`        ##'@+`,` ,+...`
                                                 +'` ``  `                     +@@'    +          '     + `      `',      `
                                                   ``            +            ` @#:   .+ `               `'.`       ..'
                                                                                #@#   '.                `  .`'
                                                                                `@@: `':''+`
                                                                                 #@@  +` ..
                                                                                 .@@'
                                                                                  @@@
                                                                                  '@@,
                                                                                  `@##
                                                                                  `#@@`
                                                                                   ,@@.
                                                                                   `,@@,
                                                                                     '@@.
                                                                                      @@.
                                                                                      @@#
                                                                                      `#@.
                                                                                       `
</span></pre>
<hr>
<div id="tab-container">
  <input type='button' class='function-selection' onclick='displayNumbersTabs()' value='Numbers'>
  <input type='button' class='function-selection' onclick='displayTimeTabs()' value='Time'>

  <input type='button' class='function-selection' onclick='displayOtherTabs()' value='Other'>
</div>
<div id='second-tab-container'>
  <div id='second-tab-buttons'>
    <input type='button' class='function-selection' onclick='displayTabs1()' value='Primes'>
    <input type='button' class='function-selection' onclick='displayTabs9()' value='Nth prime'>
    <input type='button' class='function-selection' onclick="displayTabs4()" value='Base changer'>
    <input type='button' class='function-selection' onclick='displayTabs7()' value='Sum_Mult'>
    <input type='button' class='function-selection' onclick="displayTabs2()" value='Pi'>
    <input type='button' class='function-selection' onclick='displayTabs8()' value='Divisors'>
  </div>
  <div id='tab-result'>
    <p><input type="text" id="num"> Insert your number</p>
    <p><input type="checkbox" id="display"><label for="display"><span></span>Display numbers?</label></p>
    <p><input type="button" class="button" onclick="prime()" value="Submit"></p>
  </div>
</div>
<br>
<div id='resultContainer'>
  <div id='result'>Result</div>
  <input type='button' onclick='emptyResult()' value='empty'>
</div>
</body>
</html>