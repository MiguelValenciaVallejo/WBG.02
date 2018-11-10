<?php
require_once('login.php');
// build for the header of each page
require_once('build/header-build.php');
// constants used in page
require_once('support/constants-used.php');
// functions used in page
require_once('support/library-functions.php');
$account_id = test_acc_id();

// does user need to login?
if ($account_id != 'login_req') {
    // call page once we do have the login information
    // build structure for this page
    require_once('build/library-build.php');
}

?>