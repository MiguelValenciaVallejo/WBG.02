<?php
// build for the header of each page
require_once('build/header-build.php');
// functions used by this page
require_once('support/create-account-functions.php');

if (isset($_POST['submit'])) {

    // call function to test inputs
    $test_inputs = test_inputs();

    // enter results into session & cookie
    setcookie('test_inputs',$test_inputs);
    session_start();
    $_SESSION['test_inputs'] = $test_inputs;
}

// build for new account form
require_once('build/create-account-build.php');
?>