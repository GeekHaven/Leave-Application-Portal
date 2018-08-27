<?php 
     
    session_start();

    require 'db.php' ;

    // verify login and set session variable for branch also
    // we will divide application into two section ECE and IT
    // division is done for admin-dashboard-fecth.php if ECE department opens dashboard only ECE students applications will be shown
    // else other one

    
