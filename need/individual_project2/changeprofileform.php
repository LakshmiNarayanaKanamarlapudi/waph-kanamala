<?php
  require "session_auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Change Profile</title>
   <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
      
  </script>
</head>
<body>
  
  
  <div class="form-container">
   
    <form action="changeprofile.php" method="POST" class="form login">
    <h1>Change Profile, Facebook</h1>
    <h2>Mini Facebook Application</h2>
    Username:<!--input type="text" class="text_field" name="username" /--> <?php echo htmlentities($_SESSION['username']); ?>
    <br>
    New Fullname: <input type="text" class="text_field" name="new_fullname" /> <br>
    New Email: <input type="email" class="email" name="new_email" /> <br>
    New Phone: <input type="tel" id="phone" name="new_phone" class="phone" placeholder="Enter your phone number" /> <br>

    <button class="button" type="submit">Change Profile</button>
    </form>
   
  </div> 
</body>
</html>
