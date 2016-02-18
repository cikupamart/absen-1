<html>
<head>
<script language="javascript" type="text/javascript">
 function playSound(soundfile) {
 document.getElementById("dummy").innerHTML="<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
 }
 </script>
 </head>
 
 <body>
 
 
 
 
 <span id="dummy"></span>
 
 <a href="#" onclick="playSound('audio/sukses.mp3');">Click here to hear a sound</a>

 <p onmouseover="playSound('audio/gagal.mp3');">Mouse over this text to hear a sound</p>
 
 
 </body>
 </html>