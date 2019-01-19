
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<style>
body{background: #2C3E50;
    background: -webkit-linear-gradient(to left, #4CA1AF, #2C3E50);
    background: linear-gradient(to left, #4CA1AF, #2C3E50);
    overflow: hidden;
    
}
.form
     {
        width: 340px;
        height: 650px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: auto;
        margin-top: 8%;
        padding: 20px 30px;
        max-width: calc(100vw - 40px);
        box-sizing: border-box;
        font-family: 'Montserrat',sans-serif;
        position: relative;
          }
        h2
        {
          margin:10px 0;
          padding-bottom:10px;
          width:180px;
          color:#78788c;
          border-bottom:3px solid #78788c
          }

          h4
        {
          margin:10px 0;
          padding-bottom:10px;
          width:250px;
          color:#444;
          border-bottom:3px solid #78788c
          }

        input
        {
        width:100%;
        padding:10px;
        box-sizing:border-box;
        background:none;
        outline:none;
        resize:none;
        border:0;
        font-family:'Montserrat',sans-serif;transition:all .3s;
        border-bottom:2px solid #bebed2
        }
        input:focus{border-bottom:2px solid #78788c}
        p:before{content:attr(type);
        display:block;margin:28px 0 0;
        font-size:14px;color:#5a5a5a}
        button{float:right;padding:8px 12px;margin:8px 0 0;
        font-family:'Montserrat',sans-serif;
        border:2px solid #78788c;
        background:0;
        color:#5a5a6e;
        cursor:pointer;
        transition:all .3s
        }
        button:hover{background:#78788c;color:#fff}
        div{content:'Hi';
        position:absolute;
        bottom:-15px;right:-20px;background:#50505a;
        color:#fff;
        width:320px;
        padding:16px 4px 16px 0;
        border-radius:6px;
        font-size:13px;
        box-shadow:10px 10px 40px -14px #000
        }
        span{margin:0 5px 0 15px}
</style>
</head>
<body>

<form class="form" action="./core/signupcheck.php" method="post">

  <h2>USER SIGNUP</h2> 
  <h4>LEAVE APPLICATION PORTAL</h4>
  <?php if (isset($_SESSION['error'])){
echo "<p style='color: red'>";
echo $_SESSION['error'];
echo "</p>";
    session_destroy();
}

?>

<?php if (isset($_SESSION['success'])){
echo "<p style='color: green'>";
echo $_SESSION['success'];
echo "</p>";
    session_destroy();
}

?>
  <p type="Name:"><input placeholder="Write your name here.." name="Name"  required/></p>
  <p type="Enrollment No:"><input placeholder="Enrollment Number here.." name="Enroll" required/></p>
  <p type="Email:"><input type="email" placeholder="Write your college Email here.." name="Email" required/></p>
  <p type="Password:"><input placeholder="Enter password" name="Password" type="password" required/></p>
  <p type="RE-ENTER Password:"><input placeholder="Enter password again" name="Passwordagain" type="password" required/></p>
  <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>

