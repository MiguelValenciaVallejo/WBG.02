<?php
// build for the header of each page
require_once('build/header-build.php');
if (isset($_COOKIE['account_id'])) {
    // start session
    session_start();
    // retreieve current user account_id
    echo $_COOKIE['account_id'];
    echo $_SESSION['account_id'];
}
?>