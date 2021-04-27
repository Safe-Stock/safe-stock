<?php 
class User {
    public static function ConnectWithCookies($login, $password) {
        session_start();
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        $req = PDORequest::GetUserInformation($login);
        $data = $req->fetch();
        if(password_verify($password, $data['MdpUtil'])){
            $_SESSION['user'] = $data['IdUtil'];
        }
        header('location : ./index.php');
    }
}
?>