<?php
// build for the header of each page
require_once('build/header-build.php');

echo $_COOKIE['user_id'];

// build structure for this page
require_once('build/my-library-build.php');
?>