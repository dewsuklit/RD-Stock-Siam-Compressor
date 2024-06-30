<?php
    session_start();
    include_once('function.php');
    
    $userdata = new DB_con();
    $db = new DB_con();

    if (isset($_POST['login'])) {
        $unameRemember = $_POST['username'];
        $passwordRemember = $_POST['password'];

        $uname = $_POST['username'];
        $password = $_POST['password'];
        
        $uname = $uname;
	    $password = $password;
        $result = $userdata->signin($uname, $password);
        
        $num = mysqli_fetch_array($result);

        if($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['name'] = $num['name'];
            if(!empty($_POST['remember'])){
                setcookie('user_login', $unameRemember, time() + (10 * 365 * 24 * 60 *60));
                setcookie('user_password', $passwordRemember, time() + (10 * 365 * 24 * 60 *60));
            }else{
                if(isset($_COOKIE['user_login'])){
                    setcookie('user_login', '');

                    if(isset($_COOKIE['user_password'])){
                        setcookie('user_password', '');
                    }
                }
            }
            // $result2 = $db->calculateDaysInStock();
            echo "<script>window.location.href='index.php'</script>";
        }else  {
            $msg = "Invalid Login";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en"></html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style-login.css">
    <style>
        .icon svg{
            fill: white;
            width: 10%;
        }
        .alert{
            background-color: #751c1c;
            height: 42px;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            border: 1px solid white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <section>
        <div class="login-box">
            <form method="post">
                <h2>LOGIN</h2>
                <?php if(isset($msg)){ ?>
                    <div class="alert">
                <?php echo $msg; ?>
                </div>
                <?php } ?>
                <div class="input-box">
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                    </span>
                    <input type="text" id="username" name="username" value="<?php if(isset($_COOKIE['user_login'])) {echo $_COOKIE['user_login'];} ?>" required>
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 208v-95a80 80 0 00-160 0v95" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="96" y="208" width="320" height="272" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </span>
                    <input type="password" id="password" name="password" value="<?php if(isset($_COOKIE['user_password'])) {echo $_COOKIE['user_password'];} ?>" required>
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE['user_login'])) { ?> checked <?php  } ?>>Remember me
                    </label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" name="login" onclick="">Login</button>

            </form>
        </div>
    </section>

    <script>
        let popup = document.getElementById("popup2");
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script>
</body>

</html>
