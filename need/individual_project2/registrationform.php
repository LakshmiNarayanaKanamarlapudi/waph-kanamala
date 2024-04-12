<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="style.css" />
 <!--  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
  </script> -->
</head>
<body>

  <div class="form-container">
     <div class="form">
       <h1>New User Registration</h1>

       <form action="addnewuser.php" method="POST" class="login">
       <input type="text" class="input_field" name="username" placeholder="Username" required/> <br>
       <input type="password" class="input_field" name="password" placeholder="Password" required/> <br>
       <input type="text" class="input_field" name="fullname" placeholder="Full name" required/> <br>
       <input type="email" class="input_field" name="email" placeholder="Email" required /> <br>
       <input type="tel" id="phone" name="phone" class="input_field" placeholder="Enter your phone number" required /> <br>
       <button class="button" type="submit">Register</button>
       </form>
     </div>
  </div>
</body>
</html>
