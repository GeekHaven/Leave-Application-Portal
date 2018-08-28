<link rel="stylesheet" type="text/css" href="static/css/login.css">
<body>

<h2>Login Form</h2>

<form action="./core/verifylogin.php" method="post">
  <div class="imgcontainer">
    <img src="index.png" alt="Avatar" class="avatar" height="200" width="100">
  </div>

  <div class="container">
    <label for="Email"><b>Username</b></label>
    <input type="email" placeholder="Enter Email" name="Email" required>

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
        
   <input type="submit" name="submit" value="submit" class="sub">
    <label>
      <h3>Not Registered ?? Click <a href="usersignup.php">Here</a></h3>
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>

