<?php  

if(isset($_POST['submit_alamat'])){
    $provinsi = $_POST['provinsi'];
    $kab_kota = $_POST['kab_kota'];
    $kec = $_POST['kec'];
    $kode_pos = $_POST['kode_pos'];
    $alamat_lengkap = $_POST['alamat_lengkap'];

    if($provinsi == "" && $kab_kota == "" && $kec == "" && $kode_pos == "" && $kode_pos == ""){
        $alert_a = 1;
    }elseif($provinsi == ""){
        $alert_a = 2;
    }
}

?>