<?php  
$alertProduct = array();

if(isset($_POST['submit_product'])){

    if(empty(trim($_POST['kategori']))){
        $alertProduct['kategori'] = "Silahkan Pilih kategori";
    }else{
        $categoriProduct = $_POST['kategori'];
    }

    if(empty(trim($_POST['jenisBiji']))){
        $alertProduct['jenisBiji'] = "Silahkan Pilih Jenis biji";
    }else{
        $jenisBijiProduct = $_POST['jenisBiji'];
    }
    
    if(empty(trim($_POST['jumlahStok']))){
        $alertProduct['jumlahStok'] = "Jumlah Stok tidak boleh kosong";
    }else{
        $jumlahStock = $_POST['jumlahStok'];
    }

    if(empty(trim($_POST['hpp']))){
        $alertProduct['hpp'] = "Harga Pokok Penjual tidak boleh kosong";
    }else{
        $hpp = $_POST['hpp'];
    }

    if(empty(trim($_POST['hj']))){
        $alertProduct['hj'] = "Harga jual tidak boleh kosong";
    }else{
        $hj = $_POST['hj'];
    }

    if(count($alertProduct) == 0){
        $addStock = $admin->addStock($categoriProduct, $jenisBijiProduct, $jumlahStock, $hpp, $hj, $_SESSION['username_aadmin']);
        if($addStock){
            $_SESSION['alert2'] = "success";
            header('Location: tambah-produk');
            exit();
        }
    }
}
?>