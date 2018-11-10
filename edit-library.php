<?php
// build header
require_once('build/header-build.php');
// bring in constants used by page and others
require_once('support/constants-used.php');
echo "Hello, but we cannot ciomply";
session_start();
if (isset($COOKIE['account_id']) || isset($_SESSION['account_id'])) {
    header("location:". TO_LOGIN);
    exit;
} else{
    echo "wirking";
}
?>