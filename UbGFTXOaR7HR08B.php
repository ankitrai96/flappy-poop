<?php
    session_start();
    if(!isset($_SESSION['uid']) && isset($_POST['SNEzrIZfziJ9DSb'])){
      header("location: index.php");
    } else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name="flappypoop";
    $fresh  = $_POST['SNEzrIZfziJ9DSb'];
    $_SESSION['score'] = $fresh;
    $name = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $uid = $_SESSION['uid'];
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    $damn = "SELECT * FROM scores where uid='$uid'";
    $res = mysqli_query($conn, $damn);
    if($res->num_rows>0){
        $upper = mysqli_fetch_assoc($res);        
        if($upper["score"] < $fresh){
          $update_query="UPDATE scores SET score = $fresh WHERE uid='$uid'";
          mysqli_query($conn, $update_query);
        }

     } else {
          $query_pop = "INSERT INTO scores (uid, name, lname, score) VALUES ('$uid', '$name', '$lname', $fresh)";
          mysqli_query($conn, $query_pop);
     }
    mysqli_close($conn);
    header("location: flappypoop.php");
  }
?>