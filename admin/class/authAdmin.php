<?php
$admin = new dbAdmin();

if(isset($_POST['get_login'])){
    $username = str_replace(' ', '', strtolower($_POST['username']));
    $password = $_POST['password'];

    if($username == '' && $password == ''){
        $alert = 3;
    }elseif($username == ''){
        $alert = 1;
    }elseif($password == ''){
        $alert = 2;
    }else{
        $dataAdmin = $admin->checkAdmin($username);
        if($dataAdmin['nums'] == 0){
            $alert = 1;
        }else{
            $dbpass = $dataAdmin['password'];
            if(!password_verify($password, $dbpass)){
                $alert = 2;
            }else{
                $_SESSION['login_store'] = true;
                $_SESSION['username_aadmin'] = $dataAdmin['username'];
                header('Location: home');
                exit();
            }
        }
    }

}
?>