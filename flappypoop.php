<?php
        /*
            Database configuration
            Modify as per database
        */
        $servername = "";
        $username = "";
        $password = "";
        $db_name = "";
        $conn = mysqli_connect($servername, $username, $password, $db_name);
        session_start();
    if(isset($_SESSION['score']) || isset($_POST['uid'])){
      if(!isset($_SESSION['uid'])){
        extract($_POST);
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;      
        $_SESSION['uid'] = $uid;
      }
     $champ = "SELECT score from scores ORDER BY score DESC LIMIT 1";
        $result = mysqli_query($conn, $champ);
        $topper = mysqli_fetch_assoc($result);
        $_SESSION['highscore'] = $topper["score"];
    } else {
      header("location:index.php");
    }
    mysqli_close($conn);
?>
<html>
<head>
  <meta charset="UTF-8">
  <!--Meta tags for Search Engine Optimisation -->
  <meta name="title" content="Flappy Poop"/>
  <meta name="description" content="Spoof of Flappy Bird: Help the poop reach commode.">
  <meta name="keywords" content="poop,flappy,bird,game,javascript,programming,p5.js,flappy poop">
  <meta name="author" content="Ankit Rai">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Open Graph meta tags for Social Network Optimisation-->
  <meta property="og:title" content="Flappy Poop"/>
  <meta property="og:image" content="http://ankitrai.net/front_face.jpg"/>
  <meta property="og:url" content="http://ankitrai.net/flappypoop.html"/>
  <link id="favicon" rel="shortcut icon" href="resource/favicon_flappypoop.png" type="image/png">
  <link rel="apple-touch-icon" sizes="194x194" href="resource/front_face.jpg" type="image/jpg">
  <script language="javascript" type="text/javascript" src="resource/p5.js"></script>
  <script language="javascript" src="resource/p5.dom.js"></script>
  <script language="javascript" src="resource/p5.sound.js"></script>
  <script language="javascript" type="text/javascript" src="resource/poop.js"></script>
  <script language="javascript" type="text/javascript" src="resource/pipe.js"></script>
  <script language="javascript" type="text/javascript" src="resource/sketch.js"></script>
  <style>
    html, body {
      height: 100%;
      width: 100%;
      overflow: hidden;
      padding:0;
      margin:0;
    }
    body {
      background-color: 00bfff;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #dialogoverlay{
      display: none;
      opacity: .8;
      position: fixed;
      top: 0px;
      left: 0px;
      background: #FFF;
      width: 100%;
      z-index: 10;
    }
    #dialogbox{
      display: none;
      background: #000;
      border-radius:7px;
      width:85%;
      z-index: 10;
    }
    #dialogbox > div{ background:#FFF; margin:8px; }
    #dialogbox > div > #dialogboxhead{ background: #666; font-size:22px; padding:10px; color:#CCC; }
    #dialogbox > div > #dialogboxbody{ background:#333; padding:20px; color:#FFF; font-size:20px; }
    #dialogbox > div > #dialogboxfoot{ background: #666; padding:10px; text-align:right;}
  </style>
  </script>
</head>
<body>
  <div id="dialogoverlay"></div>
    <div id="dialogbox">
      <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot">
        <form id="regScore" method="POST" action="UbGFTXOaR7HR08B.php">
        <input type="hidden" name="SNEzrIZfziJ9DSb" value="" id="player_score">
        <button id="b" type="submit" onclick="Alert.ok()">OK</button>
        </form>
        </div>
      </div>
  </div>
</body>
</html>
