<?php  
require_once 'class/apiClass.php';
$admin = new dbAdmin();
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}
$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];
require_once "tambah-produk-action.php";
?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Tambah Produk | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-sm-0">Tambah Produk</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                                            <li class="breadcrumb-item active">Tambah Produk</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <form action="" method="post">
                            <div class="row">

                                <!-- DETAIL -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">Detail Produk</div>
                                            <div   div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-5 mb-3">
                                                        <label for="kategori" class="form-label">Kategori Kopi</label>
                                                        <select name="kategori" id="kategori" class="form-control <?= $alertProduct['kategori'] != "" ? "is-invalid" : "" ?>">
                                                            <option value="" selected="selected" disabled>Pilih Kategori Kopi</option>
                                                            <?php  
                                                            $valueCategory = $_POST['kategori'];
                                                            $categorys = $admin->checkCategory(null, "select", null);
                                                            foreach($categorys['data'] as $category){
                                                                $select = $category['id_kategori'] == $valueCategory ? 'selected="selected"' : '';
                                                            ?>
                                                            <option value="<?= $category['nama_kategori'] ?>" <?= $select ?>><?= ucfirst($category['nama_kategori'])  ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if($alertProduct['kategori'] != ""){ ?>
                                                            <div id="" class="invalid-feedback">
                                                                <?= $alertProduct['kategori'] ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-12 col-sm-4 mb-3">
                                                        <label for="jenisBiji" class="form-label">Biji Kopi</label>
                                                        <select name="jenisBiji" id="jenisBiji" class="form-control <?= $alertProduct['jenisBiji'] != "" ? "is-invalid" : "" ?>">
                                                            <option value="" selected="selecred" disabled>Pilih Biji Kopi</option>
                                                            <?php 
                                                            $valBiji = $_POST['jenisBiji']; 
                                                            $opts = array("Robusta", "Arabika");
                                                            foreach($opts as $opt){
                                                                $select = $opt == $valBiji ? 'selected="selected"' : '';
                                                            ?>
                                                            <option value="<?= $opt ?>" <?= $select ?>><?= $opt ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if($alertProduct['jenisBiji'] != ""){ ?>
                                                            <div id="" class="invalid-feedback">
                                                                <?= $alertProduct['jenisBiji'] ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-12 col-sm-3 mb-3">
                                                        <label for="jumlahStok" class="form-label">Stok</label>
                                                        <div class="input-group">
                                                            <input value="<?= $_POST['jumlahStok'] ?>" type="number" name="jumlahStok" id="jumlahStok" class="form-control <?= $alertProduct['jumlahStok'] != "" ? "is-invalid" : "" ?>" placeholder="Stok Produk" onkeyup="calWithStock(this.value)">
                                                            <span class="input-group-text">Kg</span>
                                                            <?php if($alertProduct['jumlahStok'] != ""){ ?>
                                                                <div id="" class="invalid-feedback">
                                                                    <?= $alertProduct['jumlahStok'] ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- DETAIL END -->

                                <!-- harga PER KILOGRAM -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">Harga / KG</div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <label for="hpp" class="col-sm-2 col-form-label">Harga Pokok Penjualan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input value="<?= $_POST['hpp'] ?>" type="number" name="hpp" id="hpp" class="form-control <?= $alertProduct['hpp'] != "" ? "is-invalid" : "" ?>" placeholder="Masukkan Harga / KG" onkeyup="calWithHpp(this.value)">
                                                            <?php if($alertProduct['hpp'] != ""){ ?>
                                                                <div id="" class="invalid-feedback">
                                                                    <?= $alertProduct['hpp'] ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="hj" class="col-sm-2 col-form-label">Harga jual</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input value="<?= $_POST['hj'] ?>" type="number" name="hj" id="hj" class="form-control <?= $alertProduct['hj'] != "" ? "is-invalid" : "" ?>" placeholder="Masukkan Harga / KG" onkeyup="calWithHj(this.value)">
                                                            <?php if($alertProduct['hj'] != ""){ ?>
                                                                <div id="" class="invalid-feedback">
                                                                    <?= $alertProduct['hj'] ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- harga PER KILOGRAM END -->

                                <!-- KALKULASI HARGA PRODUK -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">Kalkulasi Harga</div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-12 col-sm-4">
                                                        <label for="" class="form-label">Harga Pokok Penjualan</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input value="<?= $_POST['khpp'] ?>" type="text" name="khpp" id="khpp" class="form-control" readonly placeholder="0.00">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="" class="form-label">Harga Jual</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input value="<?= $_POST['khj'] ?>" type="text" name="khj" id="khj" class="form-control" readonly placeholder="0.00">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="" class="form-label">Keuntungan (Profit)</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input value="<?= $_POST['kk'] ?>" type="text" name="kk" id="kk" class="form-control" readonly placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mt-3">
                                                    <div class="p-1">
                                                        <button type="submit" name="submit_product" class="btn button-brown">Simpan</button>
                                                    </div>
                                                    <div class="p-1">
                                                        <button type="submit" name="submit_product_and_back" class="btn btn-secondary">Simpan & Tambah Produk</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- KALKULASI HARGA PRODUK END -->
                            
                            </div>

                        </form>

                    </div> <!-- container-fluid -->
                </div>
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

        <script src="assets/js/app.js"></script>

    </body>
</html>
<?php $_SESSION['alert2'] = "" ?>