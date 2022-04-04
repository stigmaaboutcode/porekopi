<?php  

$validate = array();

if(isset($_POST['submit_customer_and_back'])){

    // data pribadi
    if(empty($_POST['name']) || $_POST['name'] == ""){
        $validate['name'] = "Nama Lengkap Tidak Boleh Kosong";
    }else{
        $name = $admin->formatName($_POST['name']);
    }
    
    if(empty($_POST['email']) || $_POST['email'] == ""){
        $validate['email'] = "Email Tidak Boleh Kosong"; 
    }else{
        $checkEmail = $admin->checkCustomer("checkByEmail", $_POST['email']);
        
        if($checkEmail['nums'] > 0){
            $validate['email'] = "Email Sudah Digunakan"; 
        }else{
            $email = $_POST['email'];
        }
    }

    $jk = $_POST['gender'];

    if(empty($_POST['no']) || $_POST['no'] == ""){
        $validate['no'] = "Nomor Telepon Tidak Boleh Kosong";
    }else{
        $no = $admin->formatNoTelpn($_POST['no']);
    }

    // data alamat
    if(empty($_POST['prov']) || $_POST['prov'] == ""){
        $validate['prov'] = "Mohon Pilih Provinsi Terlebih Dahulu";
    }else{
        $prov = $_POST['prov'];
    }

    if(empty($_POST['kab']) || $_POST['kab'] == ""){
        $validate['kab'] = "Mohon pilih Kabupaten / Kota Terlebih Dahulu";
    }else{
        $kab = $_POST['kab'];
    }

    if(empty($_POST['kec']) || $_POST['kec'] == ""){
        $validate['kec'] = "Mohon Pilih Kecamatan Terlebih Dahulu";
    }else{
        $kec = $_POST['kec'];
    }

    if(empty($_POST['alamat']) || $_POST['alamat'] == ""){
        $validate['alamat'] = "Alamat Lengkap Tidak Boleh Kosong";
    }else{
        $alamat = $_POST['alamat'];
    }

    if(count($validate) == 0){
        $CustomerAction = $admin->addCustomer($name,$email,$jk,$no,$prov,$kab,$kec,$alamat);

        if($CustomerAction){
            $_SESSION['alert2'] = "success";
            header('Location: tambah-pelanggan');
            exit();
        }
    }

}

if(isset($_POST['submit_customer'])){

    // data pribadi
    if(empty($_POST['name']) || $_POST['name'] == ""){
        $validate['name'] = "Nama Lengkap Tidak Boleh Kosong";
    }else{
        $name = $admin->formatName($_POST['name']);
    }
    
    if(empty($_POST['email']) || $_POST['email'] == ""){
        $validate['email'] = "Email Tidak Boleh Kosong"; 
    }else{
        if($customer != ""){
            $checkEmail = $admin->checkCustomer("checkByEmailEdit", $_POST['email'], $emailEdit);
        }else{
            $checkEmail = $admin->checkCustomer("checkByEmail", $_POST['email']);
        }
        if($checkEmail['nums'] > 0){
            $validate['email'] = "Email Sudah Digunakan"; 
        }else{
            $email = $_POST['email'];
        }
    }

    $jk = $_POST['gender'];

    if(empty($_POST['no']) || $_POST['no'] == ""){
        $validate['no'] = "Nomor Telepon Tidak Boleh Kosong";
    }else{
        $no = $admin->formatNoTelpn($_POST['no']);
    }

    // data alamat
    if(empty($_POST['prov']) || $_POST['prov'] == ""){
        $validate['prov'] = "Mohon Pilih Provinsi Terlebih Dahulu";
    }else{
        $prov = $_POST['prov'];
    }

    if(empty($_POST['kab']) || $_POST['kab'] == ""){
        $validate['kab'] = "Mohon pilih Kabupaten / Kota Terlebih Dahulu";
    }else{
        $kab = $_POST['kab'];
    }

    if(empty($_POST['kec']) || $_POST['kec'] == ""){
        $validate['kec'] = "Mohon Pilih Kecamatan Terlebih Dahulu";
    }else{
        $kec = $_POST['kec'];
    }

    if(empty($_POST['alamat']) || $_POST['alamat'] == ""){
        $validate['alamat'] = "Alamat Lengkap Tidak Boleh Kosong";
    }else{
        $alamat = $_POST['alamat'];
    }

    if(count($validate) == 0){
        if($customer != ""){
            $CustomerAction = $admin->UpdateCustomer($name,$email,$jk,$no,$prov,$kab,$kec,$alamat,$customer);
        }else{
            $CustomerAction = $admin->addCustomer($name,$email,$jk,$no,$prov,$kab,$kec,$alamat);
        }

        if($CustomerAction){
            $_SESSION['alert2'] = "success";
            header('Location: pelanggan-toko');
            exit();
        }
    }

}



?>