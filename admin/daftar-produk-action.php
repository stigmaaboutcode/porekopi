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
        $date = date("Y-m-d");
        $addReporting = $admin->addReport($jumStock, $hpp, $kode, $date);
        if($addReporting){
            $_SESSION['alert2'] = "success";
            header('Location: daftar-produk');
            exit();
        }
    }
}

?>