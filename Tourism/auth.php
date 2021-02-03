<?php
include 'DatabaseConnection.php';
class Auth
{
    use getData;
    public function __construct()
    {

    }
    public static function login() {
        $connection = DatabaseConnection::dbConnect();
        $username = self::post('username');
        $password = self::post('password');
        $hash = sha1($password);
        $sql = "SELECT password FROM admin WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $db_password = $data['password'];
            if ($hash == $db_password) {
                session_start();
                $_SESSION['username'] = $username;
                echo json_encode(["status" => "Authenticated", "code" => 1]);
            }else {
                echo json_encode(["status" => "Invalid username or password", "code" => 0]);
            }
        }else {
            echo json_encode(["status" => "There is no account associated with the records that you entered. Please contact the site administrator for more information", "code" => 0]);
        }
    }
    public static function create_user() {
        $connection = DatabaseConnection::dbConnect();
        $username = self::post('username');
        $password = self::post('password');
        $password2 = self::post('password2');
        if ($password2 !== $password) {
            echo self::failure("Passwords do not match");
            return false;
        }
        if (!empty(trim($username)) && !empty(trim($password))){
            $hash = sha1($password);
            $sql = "INSERT INTO admin (username,password) VALUES('$username', '$hash')";
            mysqli_query($connection, $sql);
            if (mysqli_affected_rows($connection) > 0) {
                echo self::success("Account created successfully");
            }else {
                echo self::failure();
            }
        }
    }
    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
        self::redirect("index.php");
    }
}
//create account
if (isset($_POST['account'])) {
    Auth::create_user();
}
//login user
if (isset($_POST['login'])) {
    Auth::login();
}
//logout a user
if (isset($_REQUEST['logout'])) {
    Auth::logout();
}
