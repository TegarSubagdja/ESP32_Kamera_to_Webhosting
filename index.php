<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESP32-CAM Captured Photo Gallery</title>
    
    <!-- Menambahkan link untuk Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  </head>
  <body style="background-color:#202125;" id="myESP32CAMPhotos">
    
    <!-- Menambahkan link untuk JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/b4UdnQ+I575S6wS8xT+TkgpGbz/0owXAP7jpu6KLvI6Mn7ZvoO3TWaB2EBrvIVP" crossorigin="anonymous"></script>
    
    <script>
    var totalphotos = 0;
    var last_totalphotos = 0;
    
    loadPhotos();
    
    var timer_1 = setInterval(myTimer_1, 2000);
    
    function myTimer_1() {
      getTotalPhotos();
      if(last_totalphotos != totalphotos) {
        last_totalphotos = totalphotos;
        
        loadPhotos();
      }
    }
    
    function getTotalPhotos() {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          totalphotos = this.responseText;
        }
      };
      xmlhttp.open("POST","CountImageFile.php",true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("cmd=GTP");
    }
    
    function loadPhotos() {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("myESP32CAMPhotos").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","loadPhotos.php",true);
      xmlhttp.send();
    }
    </script>
    
    <!-- Menambahkan link untuk Javascript Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>
