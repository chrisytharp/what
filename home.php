<?php
   ob_start();
   session_start();
    if (!isset($_SESSION['email']) || (trim($_SESSION['email']) == '')) {
        header("Location: /webapp/index.php");
    }
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<html lang = "en">
<head>
<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <title>Immersive Care</title>
    <link href = "bootstrap.min.css" rel = "stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <div class="row m-1">
    <div class="col-md-2 homepage p-4 m-1 rounded">
            <a href="/home.php">Home</a><br><hr>
            <a href="/appointments.php">Appointments</a><br><hr>
            <a href="/prescriptions.php">Prescriptions</a><br><hr>
            <a href="/results.php">Results</a><br><hr>
        </div>
        <div class="col-md-9 homepage p-4 m-1 rounded">
            <h2>Immersive Care</h2>
            <h4>Homepage</h4>
            <hr>
            <p> Hello, <?php echo $_SESSION["email"] ?> Welcome to the Immersive care application. We are currently undergoing maintainance, to book an appointment please phone your GP directly.</p><br><p>Many thanks, IC Cyber Team.</p>
            <p>
            <?php
                //session_start();
                $db = new mysqli("127.0.0.1", "appuser", "hisdai79218eiaosdjad", "IMLCare");
                if($db->connect_errno > 0){
                    die('Unable to connect to database [' . $db->connect_error . ']');
                }
                $sql = "SELECT * from patientLogin where patient_email='".$_SESSION["email"]."'";
                $rs = $db->query($sql);
                if($rs === false) {
                    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                } else {
                    $rs->data_seek(0);
                    while($row = $rs->fetch_assoc()){ echo $row['patient_email'] . '<br />'; }
                }
                mysqli_close($db);
            ?>
            </p>

            <p>Your edit token is : <?php echo  $_SESSION['token']; ?> This is not the final token.</p>
        </div>
        <div class="span9 text-center fixed-bottom">Immersive Care Ltd.<br><a href = "logout.php" tite = "Logout">Logout<div>

    </div>
</div>
</body>
</html>


<!--

-->
