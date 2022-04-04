<?php  
require_once 'class/apiClass.php';
$rajaOngkir = new apiRajaOngkir();
$admin = new dbAdmin();
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}
$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];

$customer = $_GET['key'];

if($customer != ""){
    $checkCustomer = $admin->checkCustomer("checkById", $customer);
    if($checkCustomer['nums'] > 0){
        foreach($checkCustomer['data'] as $customerr){
            $nameEdit = $customerr['name_customer'];
            $emailEdit = $customerr['email_customer'];
            $noEdit = $customerr['no_telp_customer'];
            $genderEdit = $customerr['gender_customer'];
            $alamatEdit = $customerr['alamat_customer'];
            $provEdit = $customerr['prov_customer'];
            $kabEdit = $customerr['kab_kota_customer'];
            $kecEdit = $customerr['kec_customer'];
        }
    }else{
        header('Location: pelanggan-toko');
        exit();
    }
}

include_once "tambah-pelaggan-action.php"; 


?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title> Tambah Pelanggan | Pore Kopi</title>
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

        <!-- ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="assets/js/address.js"></script>

        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
                                    <h4 class="mb-sm-0">Tambah Pelanggan</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pelanggan Toko</a></li>
                                            <li class="breadcrumb-item active">Tambah Pelanggan</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">Data Pelanggan</div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="<?= $customer != "" ? $nameEdit : $_POST['name'] ?>" name="name" id="name" class="form-control <?= $validate['name'] != "" ? "is-invalid" : "" ?>" placeholder="example: Jhon Wick">
                                                    <?php  
                                                        if($validate['name'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['name'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <?php  
                                                    if($customer != ""){
                                                    ?>
                                                        <input type="email" value="<?= isset($_POST['submit_customer']) ? $_POST['email'] : $emailEdit ?>" name="email" id="email" class="form-control <?= $validate['email'] != "" ? "is-invalid" : "" ?>" placeholder="example@mail.com">
                                                    <?php }else{ ?>
                                                        <input type="email" value="<?= $_POST['email'] ?>" name="email" id="email" class="form-control <?= $validate['email'] != "" ? "is-invalid" : "" ?>" placeholder="example@mail.com">
                                                    <?php } ?>
                                                    <?php  
                                                        if($validate['email'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['email'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                    $val = $$customer != "" ? $genderEdit : "Laki-laki";
                                                    $radios = array("Laki-laki","Perempuan");
                                                    foreach($radios as $radio){
                                                    ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="<?= $radio ?>" value="<?= $radio ?>" <?= $radio == $val ? "checked" : "" ?>>
                                                        <label class="form-check-label" for="<?= $radio ?>">
                                                            <?= $radio ?>
                                                        </label>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="no" class="col-sm-2 col-form-label">No. Telpn / WA</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text" >+62</span>
                                                        <input type="number" value="<?= $customer != "" ? $noEdit : $_POST['no'] ?>" name="no" id="no" class="form-control <?= $validate['no'] != "" ? "is-invalid" : "" ?>" placeholder="82xxxxxxx">
                                                        <?php  
                                                            if($validate['no'] != ""){
                                                        ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validate['no'] ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">Alamat Pelanggan</div>
                                        <div class="card-body">

                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <input 
                                                        type="text" 
                                                        value="<?= $customer != "" ? $provEdit : $_POST['prov'] ?>"
                                                        name="prov" 
                                                        id="provinsi" 
                                                        class="form-control <?= $validate['prov'] != "" ? "is-invalid" : "" ?>"
                                                        placeholder="PILIH PROVINSI"
                                                        list="prov_data"
                                                        onchange="viewKab(this.value)"
                                                    >
                                                    <datalist id="prov_data">
                                                        <?php  
                                                            $provs = $rajaOngkir->dataIndonesia("prov",null);
                                                            foreach($provs as $key => $prov){
                                                                echo '<option value="'.$prov["province"].'">';
                                                            }
                                                        ?>
                                                    </datalist>
                                                    <?php  
                                                        if($validate['prov'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['prov'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="kab" class="form-label">Kabupaten/Kota</label>
                                                    <input 
                                                        type="text" 
                                                        value="<?= $customer != "" ? $kabEdit : $_POST['kab'] ?>"
                                                        name="kab" 
                                                        id="kab" 
                                                        class="form-control <?= $validate['kab'] != "" ? "is-invalid" : "" ?>"
                                                        placeholder="PILIH KAB/KOTA"
                                                        list="kab_data"
                                                        onchange="viewKec(this.value)"
                                                    >
                                                    <datalist id="kab_data"></datalist>
                                                    <?php  
                                                        if($validate['kab'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['kab'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="kec" class="form-label">Kecamatan</label>
                                                    <input 
                                                        type="text" 
                                                        value="<?= $customer != "" ? $kecEdit : $_POST['kec'] ?>" 
                                                        name="kec" 
                                                        id="kec" 
                                                        class="form-control <?= $validate['kec'] != "" ? "is-invalid" : "" ?>"
                                                        placeholder="PILIH KECAMATAN"
                                                        list="kec_data"
                                                    >
                                                    <datalist id="kec_data"></datalist>
                                                    <?php  
                                                        if($validate['kec'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['kec'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="alamat" rows="3" class="form-control <?= $validate['alamat'] != "" ? "is-invalid" : "" ?>"><?= $customer != "" ? $alamatEdit : $_POST['alamat'] ?></textarea>
                                                    <?php  
                                                        if($validate['alamat'] != ""){
                                                    ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validate['alamat'] ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <?php if($customer == ""){ ?>
                                                <div class="p-1">
                                                    <button type="submit" name="submit_customer_and_back" class="btn btn-secondary">Simpan & Tambah</button>
                                                </div>
                                                <?php } ?>
                                                <div class="p-1">
                                                    <button type="submit" name="submit_customer" class="btn button-brown">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <!-- Responsive Table js -->
        <script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/table-responsive.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
<?php $_SESSION['alert2'] = "" ?>