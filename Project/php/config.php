<?php
// config.php

// Check if session is not already started
if (!isset($_SESSION)) {
    session_start();
}

// Other configuration code
$con = mysqli_connect("localhost", "root", "", "tutorial") or die("Couldn't connect");
?>