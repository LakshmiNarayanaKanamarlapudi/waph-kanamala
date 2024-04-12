<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login page</title>
  <link rel="stylesheet" href="style.css">
   <script type="text/javascript">
      
  </script> 
</head>
<body>
  <div class="form-container">
    <div class="form">
      <h1>Log In</h1>
     
      
      <form action="index.php" method="POST" class="login">
        <input type="text" class="input_field" name="username" placeholder="Email or Phone" required> <br>
        <input type="password" class="input_field" name="password" placeholder="Password" required> <br>
        <button class="button" type="submit">Log In</button>
        
      </form>
     <p><a href="registrationform.php" class="create-account">Create New Account</a></p>
    </div>
  </div>
</body>
</html>
