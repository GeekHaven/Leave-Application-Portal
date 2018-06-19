<link rel="stylesheet" type="text/css" href="static/css/signup.css">
<body>

<form action="signupcheck.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="Name" required>

    <label for="Enroll"><b>Enrollment No.</b></label>
    <input type="text" placeholder="Enter Enrollment No." name="Enroll" required>


    <label for="Email"><b>Email</b></label>
    <input type="email" placeholder="Enter College Email" name="Email" required>

    <label for="Password"><b>Enter Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
    
   
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix" align="center">
   
     <input type="submit" name="submit" value="submit">
      <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </div>
  </div>
</form>

</body>

