<?php
// bring in constants used by website
require_once('support/constants-used.php');
// -------- FUNCTION -------------

function test_inputs(){

    // connect to DB
    $dbc = mysqli_connect(HOST, USER, PASS, NAME);

    // store var from array
    $email    = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    // check if inputs are empty
    if (empty($email) || empty($password)) {
        // warning user to enter both fields
        return 'missing';
    }

    // query to find email & password match on DB
    $query = "SELECT account_id
            FROM account_information
            WHERE email='$email'
            AND password='$password'";

    //send query
    $result = mysqli_query($dbc, $query) or die ('test_inputs died trying to find user match');

    // matches found?
    if (mysqli_num_rows($result) != 1) {
        // let user know that there is no match
        return 'no_match';
    }

    // store array from result
    $row        = mysqli_fetch_array($result);
    $account_id = $row['account_id'];

    // store account_id in cookie and session
    setcookie('account_id', $account_id);
    session_start();
    $_SESSION['account_id'] = $account_id;

    // close connection
    mysqli_close($dbc);

    // logged in successfully, go to index.php
    header("location: ". TO_INDEX);
}
?>