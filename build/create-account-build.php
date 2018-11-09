<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Where Bloggers Go</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
    <?php
        // set test_inputs for SWITCH
        (isset($_SESSION['test_inputs'])?$test_inputs=$_SESSION['test_inputs']:$test_inputs='');
        (isset($_COOKIE['test_inputs'])?$test_inputs=$_COOKIE['test_inputs']:$test_inputs='');
        echo $test_inputs;

        switch ($test_inputs) {
            case 'missing_inputs':
                echo "All fields are required";
                break;
            case 'email_mismatch':
                echo "The two emails you entered do not match";
                break;
            case 'invalid_email':
                echo "The emails entered are invalid";
                break;
            case 'invalid_password':
                echo "The password must be 6 characters or longer";
                break;
            case 'email_used':
                echo "That email is already associated with an account <a href='login.php'>Login?</a>";
                break;

            default:
                # code...
                break;
        }
    ?>
    </p>
    <!-- input for email -->
    <label for="email">Email Address:</label><br>
    <input type="text" name="email"
        value="<?php echo (isset($_POST['email'])?$_POST['email']:''); ?>"><br>

    <!-- confirm email -->
    <label for="confirm_email">Confirm Email:</label><br>
    <input type="text" name="confirm_email"
        value="<?php echo (isset($_POST['confirm_email'])?$_POST['confirm_email']:''); ?>"><br>

    <!-- password -->
    <label for="password">Password:</label><br>
    <input type="text" name="password"
        value="<?php echo (isset($_POST['password'])?$_POST['password']:''); ?>"><br>

    <!-- confirm -->
    <input type="submit" name="submit" value="Create Account">
</form>
</body>
</html>