<?php
function test_acc_id(){

    // test if account_id is stored
    if (!isset($_COOKIE['account_id']) && !isset($_SESSION['account_id'])) {

        // called login page to login in library.php

        // no account stored, head to login page


        // return that the user needs to login
        return 'login_req';
    } elseif (isset($_COOKIE['account_id'])) {
        // store cookie id
        $account_id = $_COOKIE['account_id'];

        // end session (to avoid multiple sessions open)
        session_destroy();

        // return acc id to load correct content
        return $account_id;
    } elseif (isset($_SESSION['account_id'])) {
        // store cookie id
        $account_id = $_SESSION['account_id'];


        // return acc id to load correct content
        return $account_id;
    }
}
?>