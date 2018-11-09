<?php
// bring in constants to connect to db
require_once('support/constants-used.php');

function test_inputs(){
    // ---- STEP 1: CLEAN VARIABLES

    // create database connection
    $dbc = mysqli_connect(HOST, USER, PASS, NAME) or die('test_inputs could not connect to DB');

    // bring in variables from post array
    $email         = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $confirm_email = mysqli_real_escape_string($dbc, trim($_POST['confirm_email']));
    $password      = mysqli_real_escape_string($dbc, trim($_POST['password']));

    // ---- STEP 2: CHECK USER INPUTS
    // are inputs empty?
    if (empty($email) || empty($confirm_email) || empty($password)) {
        // stop stript and let user know they must enter inputs
        return 'missing_inputs';
    }

    // do emails match?
    if ($email != $confirm_email) {
        //stop stricpt and let user know emails don't match
        return 'email_mismatch';
    }

    // are emails vaid?
    if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\.\-&!=#]*@/', $email)) {
        // let user know email is not valid
        return 'invalid_email';
    } else{
        // strip away everything but domain from email
        $domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\.\-&!=#]*@/',"",$email);
        // check if domain is registered
        if(!checkdnsrr($domain)){
            // let user know email is not valid
            return 'invalid_email';
        }
    }

    // is password valid?
    if (!preg_match('/^[a-zA-Z0-p]{6}/', $password)) {
        // let user know password is not valid
        return 'invalid_password';
    }

    // ---- STEP 3: CHECK DB FOR EXISTING ACCOUNT

    // find account_id for the email inputed
    $query = "SELECT account_id
            FROM account_information
            WHERE email='$email'";
    // send query
    $result = mysqli_query($dbc, $query) or die('test inputs could not execute query to find acc_id in DB');
    // where any matches found?
    if (mysqli_num_rows($result) != 0) {
        // there was a match, therefor email already in use. Let user know
        return 'email_used';
    }

    // ---- STEP 4: ADD NEW USER TO DB

    // no matches, so insert new user into DB
    $query = "INSERT INTO account_information(email, password)"."VALUES('$email', '$password')";
    // send query
    mysqli_query($dbc, $query) or die('test inputs could not enter new user into DB');
    echo "created new account";

    // close connection with DB
    mysqli_close($dbc);
}
?>