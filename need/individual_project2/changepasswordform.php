<?php
	require "session_auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Change Password</title>
  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
  </script>
</head>
<body>
  <h1>Change Password, facebook</h1>
  <h2>Mini Facebook Application</h2>
  <div id="digit-clock"></div>  
<?php
  //some code here
  echo "Visited time: " . date("Y-m-d h:i:sa")
?>
  <form action="changepassword.php" method="POST" class="form login">
    Username:<!--input type="text" class="text_field" name="username" /--> <?php echo htmlentities($_SESSION['username']); ?>
    <br>
    New Password: <input type="password" class="text_field" name="newpassword" /> <br>
    <button class="button" type="submit">Change password</button>
  </form>
</body>
</html>
