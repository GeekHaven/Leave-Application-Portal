<?php
session_start();
unset($_SESSION['isactive']);
session_destroy();

header("Location:../");
exit();
?>
