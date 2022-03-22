<?php  
require_once 'class/apiClass.php';
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}
$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];

$rajaOngkir = new apiRajaOngkir();
$admin = new dbAdmin();

// kontak
if($admin->checkContact()['nums'] > 0){
    $datas = $admin->checkContact()['data'];
    foreach($datas as $data){
        $waa = $data['wa'];
        $igg = $data['ig'];
        $fbb = $data['fb'];
    }
}

// alamat
if($admin->checkAddress()['nums'] > 0){
    $datas = $admin->checkAddress()['data'];
    foreach($datas as $data){
        $provv = $data['prov'];
        $kabb = $data['kab'];
        $kecc = $data['kec'];
        $poss = $data['pos'];
        $alamatt = $data['detail'];
    }
}

require_once 'tentang-toko-action.php';

?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Tentang Toko | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="assets/js/address.js"></script>

        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-sm-0">Tentang Toko</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> -->
                                            <li class="breadcrumb-item active">Tentang Toko</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <!-- content -->
                        
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="card-title"><h5>Kontak Toko</h5></div>
                                            <hr>
                                            <div class="row mb-3">
                                                <label for="wa" class="col-sm-2 col-xl-2 col-form-label">WhatsApp</label>
                                                <div class="col-sm-10 col-xl-10">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon3">+62</span>
                                                        <input type="number" name="wa" id="wa" class="form-control <?= $error_wa == 1 ? "is-invalid" : '' ?>" value="<?= isset($_POST['submit_alamat']) ? $_POST['wa'] : $waa ?>">
                                                        <?php  
                                                        if($error_wa == 1){
                                                        ?>
                                                        <div class="invalid-feedback">
                                                            WhatsApp tidak boleh kosong.
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="ig" class="col-sm-2 col-xl-2 col-form-label">Instagram</label>
                                                <div class="col-sm-10 col-xl-10">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon3">instagram.com/</span>
                                                        <input type="text" name="ig" id="ig" class="form-control <?= $error_ig == 1 ? "is-invalid" : '' ?>" value="<?= isset($_POST['submit_alamat']) ? $_POST['ig'] : $igg ?>">
                                                        <?php  
                                                        if($error_ig == 1){
                                                        ?>
                                                        <div class="invalid-feedback">
                                                            Instagram tidak boleh kosong.
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="fb" class="col-sm-2 col-xl-2 col-form-label">Facebook</label>
                                                <div class="col-sm-10 col-xl-10">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon3">facebook.com/</span>
                                                        <input type="text" name="fb" id="fb" class="form-control <?= $error_fb == 1 ? "is-invalid" : '' ?>" value="<?= isset($_POST['submit_alamat']) ? $_POST['fb'] : $fbb ?>">
                                                        <?php  
                                                        if($error_fb == 1){
                                                        ?>
                                                        <div class="invalid-feedback">
                                                            Facebook tidak boleh kosong.
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-title mt-2"><h5>Alamat Toko</h5></div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-xl-3 col-sm-3 mb-3">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <input value="<?= isset($_POST['submit_alamat']) ? $_POST['provinsi'] : $provv ?>" type="text" list="prov_data" name="provinsi" id="provinsi" onchange="viewKab(this.value)" class="form-control <?= $error_prov == 1 ? "is-invalid" : "" ?>">
                                                    <?php  
                                                    if($error_prov == 1){
                                                    ?>
                                                    <div class="invalid-feedback">
                                                        Provinsi tidak boleh kosong.
                                                    </div>
                                                    <?php } ?>
                                                    <datalist id="prov_data">
                                                        <?php
                                                        // $idprov = $edit != "" ? "" : 0;
                                                        // $value = $edit != "" ? $rowedit['prov_customer'] : "";
                                                        $provs = $rajaOngkir->dataIndonesia("prov",null);
                                                        foreach($provs as $key => $prov){
                                                            // $select = $value == $prov['province'] ? 'selected="selected"' : "";
                                                            // $idprov .= $value == $prov['province'] ? $prov["province_id"] : "";
                                                            echo '<option value="'.$prov["province"].'">';
                                                        }
                                                        ?>
                                                    </datalist>
                                                </div>
                                                <div class="col-12 col-xl-3 col-sm-3 mb-3">
                                                    <label for="kab" class="form-label">Kab/Kota</label>
                                                    <input value="<?= isset($_POST['submit_alamat']) ? $_POST['kab_kota'] : $kabb ?>" type="text" list="kab_data" name="kab_kota" id="kab" onchange="viewKec(this.value)" class="form-control <?= $error_kab == 1 ? "is-invalid" : "" ?>">
                                                    <?php  
                                                    if($error_kab == 1){
                                                    ?>
                                                    <div class="invalid-feedback">
                                                        Kab/Kota tidak boleh kosong.
                                                    </div>
                                                    <?php } ?>
                                                    <datalist id="kab_data">
                                                        
                                                    </datalist>
                                                </div>
                                                <div class="col-12 col-xl-3 col-sm-3 mb-3">
                                                    <label for="kec" class="form-label">Kecamatan</label>
                                                    <input value="<?= isset($_POST['submit_alamat']) ? $_POST['kec'] : $kecc ?>" type="text" list="kec_data" name="kec" id="kec" class="form-control <?= $error_kec == 1 ? "is-invalid" : "" ?>">
                                                    <?php  
                                                    if($error_kec == 1){
                                                    ?>
                                                    <div class="invalid-feedback">
                                                        Kecamatan tidak boleh kosong.
                                                    </div>
                                                    <?php } ?>
                                                    <datalist id="kec_data">

                                                    </datalist>
                                                </div>
                                                <div class="col-12 col-xl-3 col-sm-3 mb-3">
                                                    <label for="kode_pos" class="form-label">Kode Pos</label>
                                                    <input value="<?= isset($_POST['submit_alamat']) ? $_POST['kode_pos'] : $poss ?>" type="number" name="kode_pos" id="kode_pos" class="form-control <?= $error_pos == 1 ? "is-invalid" : "" ?>">
                                                    <?php  
                                                    if($error_pos == 1){
                                                    ?>
                                                    <div class="invalid-feedback">
                                                        Kode pos tidak boleh kosong.
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-12 col-xl-12 col-sm-12 mb-3">
                                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                                    <textarea class="form-control <?= $error_alamat == 1 ? "is-invalid" : "" ?>" id="alamat_lengkap" name="alamat_lengkap" rows="3"><?= isset($_POST['submit_alamat']) ? $_POST['alamat_lengkap'] : $alamatt ?></textarea>
                                                    <?php  
                                                    if($error_alamat == 1){
                                                    ?>
                                                    <div class="invalid-feedback">
                                                        Alamat lengkap tidak boleh kosong.
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-2">
                                                <button type="submit" name="submit_alamat" class="btn button-brown">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->

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
<?php $_SESSION['alert2'] = ""; ?>
