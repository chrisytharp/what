<?php
   ob_start();
   session_start();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<html lang = "en">
<head>
      <title>Immersive Care</title>
      <link href = "bootstrap.min.css" rel = "stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<div class="vertical-center">
  <div class = "container lpage">
    <h2>Immersive Care Login</h2>
    <div class = "container form-signin">
    </div>
    <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
      <input type = "text"     class = "form-control"     name = "username" placeholder = "username" required autofocus>
      <input type = "password" class = "form-control"     name = "password" placeholder = "password" required>
      <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
      <h5 class = "form-signin-heading"><?php echo $msg; ?></h5>
    </form><p>
    <?php
    $db = new mysqli("127.0.0.1", "appuser", "hisdai79218eiaosdjad", "IMLCare");
    if($db->connect_errno > 0){
      die('Unable to connect to database [' . $db->connect_error . ']');
    }
    if (!empty($_POST)){
      $sql = "SELECT * from patientLogin where patient_email='".$_POST['username']."' and patient_password='". $_POST['password']."'";
      $rs = $db->query($sql);
      if($rs === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
      } else {
        if ($rs->num_rows==0){
          echo "Credentials incorrect";
        }
        else{
          $rs->data_seek(0);
          session_start();
          $_SESSION['email'] = $_POST['username'];
          $_SESSION['time']     = time();
          $_SESSION['token'] = file_get_contents('/opt/token.txt');
          header("Location: /webapp/home.php");
          die();
          }
        }
      }
    mysqli_close($db);
  ?></p>
  </div></div>
  <div class="span9 text-center fixed-bottom">Immersive Care Ltd.<br><a href = "logout.php" tite = "Logout">Logout<div>
</body>
</html>
