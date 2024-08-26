<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sel = mysqli_query($con, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if(mysqli_num_rows($sel) > 0){
        $_SESSION['username'] = $user;
        
    
        setcookie('username', $user, time() + 3600, "/"); 
       

        header("Location: students.php");
        exit();
    } else {
        echo "<script>window.alert('Unknown Account')</script>";
    }
}
?>




<center>
    <div class="hd">
       
    </div><br><br><br>

    <h1 style="font-style:poppins, sans-serif;">LOGIN</h1>
    <fieldset >
        <form action="index.php" method="POST">
            <p>USERNAME:</p>
            <input type="text" name="username" placeholder="Enter Username..." value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" required>
            <p>PASSWORD:</p>
            <input type="password" name="password" placeholder="Enter your password" required>
            <p>
                <input type="submit" name="submit" value="Login">
                <input type="reset" name="reset" value="Cancel">
            </p>
        </form>
    </fieldset>
</center>
