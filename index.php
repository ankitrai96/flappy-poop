<?php
    session_start();
    session_unset();  
    /*
        Database configuration
        Modify as per database
    */
    $servername = "";
    $username = "";
    $password = "";
    $db_name = "";
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    $leaders=$conn->query("select name, lname, score from scores ORDER BY score DESC LIMIT 5");
    while($row=$leaders->fetch_array(MYSQLI_ASSOC))   
        {     
          $res[]=$row;
        }

    $champ = "SELECT name, lname, score from scores ORDER BY score DESC LIMIT 1";
    $result = mysqli_query($conn, $champ);
    $topper = mysqli_fetch_assoc($result);
    mysqli_close($conn);
?>

<html>
  <head>
    <meta charset="UTF-8">
    <!--Meta tags for Search Engine Optimisation -->
    <meta name="title" content="Play Zone"/>
    <meta name="description" content="Flappy Bird Spoof: Save the poop and score the trophy">
    <meta name="keywords" content="poop,flappy,bird,game,javascript,flappy poop,ankit rai">
    <meta name="author" content="Ankit Rai">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Open Graph meta tags for Social Network Optimisation-->
    <meta property="og:title" content="Play Zone"/>
    <meta property="og:image" content="http://ankitrai.net/front_face.jpg"/>
    <meta property="og:url" content="http://ankitrai96.github.io/flappy-poop"/>
    <link type="text/css" rel="stylesheet" href="resource/decoration.css">
    <link id="favicon" rel="shortcut icon" href="resource/favicon_flappypoop.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="resource/front_face.jpg" type="image/jpg">
    <script type="text/javascript">
      function dudaa(){
        document.getElementById('container').style.display = "none";
        document.getElementById('btn2').style.display = "none";
        document.getElementById('leaderboard').style.display = "none";
        document.getElementById('btn').style.display = "none";
        document.getElementById('name_box').style.display = "block";
      }
      function leaders(){
        document.getElementById('container').style.display = "none";
        document.getElementById('btn2').style.display = "none";
        document.getElementById('leaderboard').style.display = "block";
      }
      function toggle(){
        document.getElementById('toggle1').style.display = "block";
        document.getElementById('pink').style.display = "none";
        document.getElementById('toggle2').style.display = "block";
      }
  </script>
  </head>
  <body>

    <div id="leaderboard">
        <h3>Top 5 Players</h3>
        <table >
          <th>Name</th>
          <th>Score</th>

          <?php foreach ($res as $show){?>
            <tr>
              <td><?php echo $show['name']." ".$show['lname'];?></td>
              <td><?php echo $show['score'];?></td>
            </tr>
          <?php } ?>
        </table><br>
    </div>
    <div id="container">
        <div id="champ">
          <p><?php echo $topper["name"];?><br><?php echo $topper["lname"];?></p>
        </div>
    </div>
          <br>
          <button class="button" id="btn" onclick="dudaa()">Play</button>
    <br>
    <center>
      <button id="btn2" style="border: 1px solid red; padding: 5px; border-radius: 8px; margin: auto; color: white; background-color: #333; font-weight: bold;" onclick="leaders()">LeaderBoard</button><br><br>
    </center>
    <div id="name_box">
      <br><button id="pink" style="float: right; border: 1px solid red; padding: 5px; border-radius: 8px; margin: auto; color: white; background-color: #333; font-weight: bold;" onclick="toggle()">New Player?</button><br><br>
      <center>
        <form action="flappypoop.php" method="POST">
            <input placeholder="email id (Required)" type="email" name="uid" required>
            <input placeholder="First Name (Required)" type="text" name="fname" id="toggle1">
            <input placeholder="Last name (Optional)" type="text" name="lname" id="toggle2">
            <br><button type="submit" class="button">Play</button>
        </form><br>
      </center>
    </div>
</body>
</html>
