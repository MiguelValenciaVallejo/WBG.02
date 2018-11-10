<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Login | Where Bloggers Go</title>
</head>
<body>

<?php
    // do we have account information? If yes, let user know they are logged in and give them the options
    if (isset($_COOKIE['account_id']) || isset($_SESSION['account_id'])) {
        echo "You are logged in!";
        echo "<p>Logout?</p>";
    } else{
        // we do not have account_id stored so show form to make it do so
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
                <!-- these are the different warnings that the user might recieve based on inputs given -->
                <p>
                    <?php
                        // shows warning depending on values given to test_inputs
                        if (isset($test_inputs)) {
                            switch ($test_inputs) {
                                case 'missing':
                                    echo "All fields are required to login";
                                    break;
                                case 'no_match':
                                    echo "We did not find this account. Try Again";
                                    break;
                                default:
                                    // nothing is set to default
                                    break;
                            }
                        }
                    ?>
                </p>
                <!-- email input -->
                <label for="email">Email Address:</label><br>
                <input type="text" name="email"
                    value="<?php echo (isset($_POST['email'])?$_POST['email']:''); ?>"><br>

                <!-- password input -->
                <label for="password">Password:</label><br>
                <input type="text" name="password"><br> <!--not making this sticky on purpose-->

                <!-- submit -->
                <input type="submit" name="submit" value="login">
            </form>
        <?php
    }
?>
</body>
</html>