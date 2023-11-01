<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.html"); 
        } else {
            echo '<script>alert("Kata sandi salah.");</script>';
        }
    } else {
        echo '<script>alert("Nama pengguna tidak ditemukan.");</script>';
    }    
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <!-- <link rel="stylesheet" type="text/css" href="styleUser.css"> -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .popup {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-size: 250% 250%;
            background-image: linear-gradient(
                -45deg,
                #000000 0%,
                #FFD700 100%
            );
            animation: AnimateBG 12s ease infinite;
        }

        @keyframes AnimateBG {
            0% {
                background-position: 0% 50%;
                background-image: linear-gradient(-45deg, #906126 0%, #F3CB51 25%, #F0D27F 51%, #A87C2D 100%);
            }
            50% {
                background-position: 100% 50%;
                background-image: linear-gradient(-45deg, #906126 0%, #F3CB51 25%, #F0D27F 51%, #A87C2D 100%);
            }
            100% {
                background-position: 0% 50%;
                background-image: linear-gradient(-45deg, #906126 0%, #F3CB51 25%, #F0D27F 51%, #A87C2D 100%);
            }
        }

        .popup-content {
            width: 500px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white; 
        }

        .inputBox {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
        }

        .inputBox label {
            font-size: 18px;
            font-weight: 600;
            padding-left: 15px;
        }

        .inputBox input {
            font-size: 16px;
            font-weight: 500;
            padding: 2px 15px;
            border-radius: 7px;
            border: none;
            outline: none;
            margin-top: 3px;
        }

        ::placeholder {
            color: #999999;
        }

        .links {
            display: flex;
            justify-content: space-between;
        }

        .khusus {
            color: #FFD700; 
            font-weight: 500;
        }

        .khusus:hover {
            border: 1px solid rgba(255, 215, 0, 0.8); 
        }

        form a {
            font-size: 14px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 7px;
            padding: 3px 7px;
            color: white;
            text-decoration: none;
            border: 1px solid transparent;
            transition: all 0.5s;
        }

        form a:hover {
            color: #FFD700; 
            opacity: 0.8;
            border: 1px solid rgba(255, 215, 0, 0.2); 
        }

        form input[type="submit"] {
            text-align: center;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            padding: 3px 0;
            border-radius: 7px;
            transition: all 0.5s;
            background: #FFD700; 
            color: #000000; 

        form input[type="submit"]:hover {
            color: #FFD700; 
            background: rgba(255, 215, 0, 0.25); 
        }
    </style>
</head>
<body>
    <div class="popup">
        <div class="popup-content">
            <h3>Login Pengguna</h3>
            <form action="login.php" method="POST">
                <div class="inputBox">
                    <label for="username">Nama Pengguna:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="inputBox">
                    <label for="password">Kata Sandi:</label>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" value="Masuk">
                <div class="links">
                    <a href="registrasi.php">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
