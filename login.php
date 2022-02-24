<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Please Login</title>
    
    <script>
        function check_form() {
            var username_check = document.getElementById("username").value;
            var password_check = document.getElementById("password").value;

            if (!is_empty(username_check) && !is_empty(password_check)) {
                return true;
            } else {
                alert("Both username and password must be filled in!")
                return false;
            }
        }
        function is_empty(text) {
            if (text.trim()=="") {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>
<body>
    <ul>
        <li><a href="main.php">Back to Home</a></li>
    </ul>
    <h1>MyOwn Portal. Log in below.</h1>

    <form action ="login_action.php" method="post" onsubmit="return check_form();">
    <table>
        <tr>
            <td>Username: </td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password" id="password"></td>
            
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Login" class="right">
                <input type="reset" value="Clear" class="right">
            </td>
        </tr>
    </table>
    </form>

</body>
</html>