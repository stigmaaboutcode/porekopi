<?php  

if(isset($_POST['submit_alamat'])){

    if(empty(trim($_POST['wa']))){
        $error_wa = 1;
    }else{
        $wa = $_POST['wa'];
    }

    if(empty(trim($_POST['ig']))){
        $error_ig = 1;
    }else{
        $ig = $_POST['ig'];
    }

    if(empty(trim($_POST['fb']))){
        $error_fb = 1;
    }else{
        $fb = $_POST['fb'];
    }

    if(empty(trim($_POST['provinsi']))){
        $error_prov = 1;
    }else{
        $provinsi = $_POST['provinsi'];
    }
    
    if(empty(trim($_POST['kab_kota']))){
        $error_kab = 1;
    }else{
        $kab_kota = $_POST['kab_kota'];
    }

    if(empty(trim($_POST['kec']))){
        $error_kec = 1;
    }else{
        $kec = $_POST['kec'];
    }

    if(empty(trim($_POST['kode_pos']))){
        $error_pos = 1;
    }else{
        $kode_pos = $_POST['kode_pos'];
    }

    if(empty(trim($_POST['alamat_lengkap']))){
        $error_alamat = 1;
    }else{
        $alamat_lengkap = $_POST['alamat_lengkap'];
    }

    if(empty($error_wa) && empty($error_ig) && empty($error_fb) && empty($error_prov) && empty($error_kab) && empty($error_kec) && empty($error_pos) && empty($error_alamat)){
        $execute_address = $admin->saveAddress($provinsi,$kab_kota,$kec,$kode_pos,$alamat_lengkap);
        $execute_contact = $admin->saveContact($wa,$ig,$fb);
        if($execute_address && $execute_contact){
            $_SESSION['alert2'] = 'success';
            header('Location: '. $_SERVER['PHP_SELF']);
            exit();
        }
    }
}

?>