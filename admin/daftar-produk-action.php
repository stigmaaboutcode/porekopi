<?php  

if(isset($_POST['addStock'])){
    $jumStock = $_POST['stok'];
    $idStock = $_POST['id'];
    $getStockDB = $admin->checkProduct("addstock", $idStock, null);
    foreach($getStockDB['data'] as $data){
        $kode = $data['kode_stok'];
        $stock = $data['stok_kopi'];
        $hpp = $data['hpp_per_kg'];
    }
    $totalStock = $jumStock + $stock;
    $addStockToDB = $admin->updateStock($totalStock, $kode);
    if($addStockToDB){
        $timezone = new DateTimeZone('Asia/Makassar');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        $today = $date->format('Y-m-d H:i:s');

        $addReporting = $admin->addReport($jumStock, $hpp, $kode, $today);
        if($addReporting){
            $_SESSION['alert2'] = "success";
            header('Location: daftar-produk');
            exit();
        }
    }
}

?>