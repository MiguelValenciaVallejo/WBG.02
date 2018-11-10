<?php

// build for the header of each page
require_once('build/header-build.php');
// functions used by this page
require_once('support/login-functions.php');

// page submited before?
if (isset($_POST['submit'])) {
    // test inputs & login if everything passes
    $test_inputs = test_inputs();
}


// build structure for the webpage
require_once('build/login-build.php');
?>