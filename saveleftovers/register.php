<?php
if (isset($_POST["submit"])) {
    include 'config.php';

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_1 WHERE email='{$email}'")) > 0) {
        echo "<script>alert('{$email} - This email is already taken.');</script>";
    }else {
        if ($password) {
            $sql = "INSERT INTO user_1 (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php");
            }else {
                echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Saveleftovers Registration</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Register</h2>
        <form action="" method="post" class="form">
            <div class="input-field">
                <label for="name" class="input-label">Full Name</label>
                <input type="name" name="name" id="name" class="input" placeholder="Enter your full name" required>
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
            </div>
            <button class="btn" name="submit">Register</button>
            <p>You have already an account! <a href="index.php">Login</a>.</p>
        </form>
    </div>
</body>
</html>
