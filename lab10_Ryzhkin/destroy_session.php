<?php
session_start();
session_destroy();
header("Location: lab10.php");
exit();