
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<style>
body{background: #2C3E50;
    background: -webkit-linear-gradient(to left, #4CA1AF, #2C3E50);
    background: linear-gradient(to left, #4CA1AF, #2C3E50);
}
.form
     {
        width: 340px;
        height: 700px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: auto;
        margin-top: 2%;
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
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active  {-webkit-box-shadow: 0 0 0 30px #e6e6e6 inset !important;}
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

      
 
#snackbar {
    visibility: hidden; 
    min-width: 250px;
    margin-left: -125px; 
    background-color: #333; 
    color: #fff; 
    text-align: center; 
    border-radius: 2px; 
    padding: 16px; 
    position: fixed; 
    z-index: 1; 
    left: 50%; 
    bottom: 30px; 
}

.show {
    visibility: visible !important; 


    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}


@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
</head>
<body>

<form class="form" action="./core/signupcheck.php" method="post">
<div id="snackbar"><?php 
if (isset($_SESSION['error']))
echo $_SESSION['error']; 
if (isset($_SESSION['success']))
echo $_SESSION['success']; 
?></div>

  <h2>USER SIGNUP</h2> 
  <h4>LEAVE APPLICATION PORTAL</h4>
 
<?php if (isset($_SESSION['error']) || isset($_SESSION['success'])){

  echo '<script>function myFunction() {
  
   var x = document.getElementById("snackbar")
 
  
   x.className = "show";
 
  
   setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
 
 }
 myFunction();

 
 </script>';
 
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

