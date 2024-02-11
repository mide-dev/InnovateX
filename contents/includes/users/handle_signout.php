<?php

require_once "../config/session.php";
session_unset();
session_destroy();

// send user to homepage after succesfull login and exit
header("Location: ../../index.php");
die();