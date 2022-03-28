<?php  
require_once 'class/apiClass.php';
$admin = new dbAdmin();
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}
$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];

$key = $_GET['key'];

if(!is_null($key) || $key != ""){
    $checkToDel = $admin->checkProduct("checkToDel", $key, null);
    if($checkToDel['nums'] > 0){
        $exeDel = $admin->deleteData("kode_stok", $key, "stok_produk");
        if($exeDel){
            $exeDelReporting = $admin->deleteData("kode_stok", $key, "laporan_pengeluaran");
            if($exeDelReporting){
                $_SESSION['alert2'] = "success";
                header('Location: daftar-produk');
                exit();
            }
        }
    }else{
        header('Location: daftar-produk');
        exit();
    }
}

include_once "daftar-produk-action.php";

?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Daftar Produk | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Responsive Table css -->
        <link href="assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- kalkulasi -->
        <script src="assets/js//calProduct.js"></script>
    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <?php require_once "sidebar.php" ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Daftar Produk</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                                            <li class="breadcrumb-item active">Daftar Produk</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <form action="" method="post">
                            <div class="row">

                                <!-- data -->
                                    <form action="" method="post" class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title title-kategori">
                                                    <div class="row height d-flex align-items-center">
                                                        <div class="col-md-8 col-sm-6">
                                                            <h6>Produk</h6>
                                                        </div>
                                                        <div  class="col-md-4 col-sm-6">
                                                            <div class="search"> 
                                                                <i class="fa fa-search"></i> <input type="text" value="<?= $_POST['search'] ?>" name="search" class="form-control" placeholder="Search produk . . ."> <button type="submit" name="actionTosearch" class="btn btn-primary">Search</button> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="table-rep-plugin">
                                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                        <table id="tech-companies-1" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Kategori</th>
                                                                    <th>Jenis Biji</th>
                                                                    <th>HPP (Rp)</th>
                                                                    <th>Stok (Kg)</th>
                                                                    <th>Harga (Rp) / Kg</th>
                                                                    <th>Total Harga (Rp)</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                $dataProduct = $admin->checkProduct(null, null, null);
                                                                $empty = "Data Produk Masih Kosong";
                                                                if(isset($_POST['actionTosearch'])){
                                                                    $dataProduct = $admin->checkProduct("searchh", $_POST['search'], null);
                                                                    $empty ='"' . $_POST['search'] . '" Tidak ditemukan';
                                                                }

                                                                if($dataProduct['nums'] == 0){
                                                                ?>
                                                                <tr align="center">
                                                                    <td colspan="8"><h4><?= $empty ?></h4></td>
                                                                </tr>
                                                                <?php
                                                                }else{
                                                                    foreach($dataProduct['data'] as $product){
                                                                ?>
                                                                        <tr>
                                                                            <td><?= $product['kode_stok'] ?></td>
                                                                            <td><?= ucfirst($product['kategori_produk']) ?></td>
                                                                            <td><?= $product['biji_kopi'] ?></td>
                                                                            <td><?= number_format($product['hpp_per_kg'],2,".",",") ?></td>
                                                                            <td><?= $product['stok_kopi'] ?></td>
                                                                            <td><?= number_format($product['hj_per_kg'],2,".",",") ?></td>
                                                                            <td><?= number_format($product['stok_kopi'] * $product['hj_per_kg'],2,".",",") ?></td>
                                                                            <td>                                                                                
                                                                                <?php  
                                                                                    if($admin->checkToDelete($product['kode_stok'])){
                                                                                ?>
                                                                                    <a href="daftar-produk?key=<?= $product['kode_stok'] ?>" id="delete"><i class="mdi mdi-delete browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i></a>
                                                                                <?php } ?>
                                                                                
                                                                                <a href="#add_stok<?= $product['id_stok'] ?>" data-bs-toggle="modal"><i class="mdi mdi-plus-box-outline browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Stok"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                <?php  
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <!-- data END -->

                            
                            </div>

                        </form>

                    </div> <!-- container-fluid -->
                </div>

                <!-- modal -->
                <?php  
                $dataProduct = $admin->checkProduct(null, null, null);
                if($dataProduct['nums'] > 0){
                    foreach($dataProduct['data'] as $product){
                ?>
                    <div class="modal fade" id="add_stok<?= $product['id_stok'] ?>" tabindex="-1" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Stok Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- <p>Modal body text goes here.</p> -->
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="id" value="<?= $product['id_stok'] ?>">
                                        <input type="number" min="1" class="form-control" required name="stok" id="stok" placeholder="stok">
                                        <label for="stok">Jumlah Stok (Kg)</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="addStock" class="btn button-brown">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php  
                    }
                }
                ?>
                <!-- modal end -->

                <!-- End Page-content -->
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Pore Kopi.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Create by Budi
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <!-- Responsive Table js -->
        <script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/table-responsive.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
<?php $_SESSION['alert2'] = "" ?>