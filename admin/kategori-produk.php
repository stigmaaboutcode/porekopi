<?php  
require_once 'class/apiClass.php';
$admin = new dbAdmin();
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}

// delete or edit param
$param = $_GET['param']; $action = $_GET['action'];
// check value param if have a value
if(!is_null($param) || $param != ""){
    // check data with param
    $checkExits = $admin->checkCategory($param, null, null);
    if($checkExits['nums'] > 0 ){
        // select action
        if($action == "delete"){
            $delete = $admin->deleteData("nama_kategori", $param, "kategori_produk");
            if($delete){
                foreach($checkExits['data'] as $category){
                    $foto_kat = $category['foto_kategori'];
                    unlink($foto_kat);
                }
                $_SESSION['alert2'] = "success";
                header('Location: kategori-produk');
                exit();
            }
        }elseif($action == "edit"){
            foreach($checkExits['data'] as $category){
                $name_kat = $category['nama_kategori'];
                $foto_kat = $category['foto_kategori'];
            }
        }else{
            header('Location: kategori-produk');
            exit();
        }
    }else{
        header('Location: kategori-produk');
        exit();
    }
}

$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];
include_once "kategori-produk-action.php";
?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Kategori Toko | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-sm-0">Kategori Produk</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                                            <li class="breadcrumb-item active">Kategori Produk</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <!-- content body -->
                        <div class="row">
                            <div class="col-12 col-xl-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title"><h6>Tambah & Edit Kategori</h6></div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">Foto Sampul</label>
                                                <input name="foto_kategori" type="file" class="form-control <?= $uploadOk != "" ? "is-invalid" : "" ?>" >
                                                <?php if($action == "edit"){ ?>
                                                    <input type="hidden" name="old_img" value="<?= $data['foto_kategori'] ?>">
                                                <?php } ?>
                                                <?php if($uploadOk != ""){ ?>
                                                <div id="" class="invalid-feedback">
                                                    <?= $uploadOk ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="nama_kategori" value="<?= isset($_POST['simpan_kategori']) ? $_POST['nama_kategori'] : ( $action == "edit" ? $name_kat : "" ) ?>" type="text" class="form-control <?= $nameempty != "" ? "is-invalid" : "" ?>" id="kategori" placeholder="kategori">
                                                <label for="kategori">Nama Kategori</label>
                                                <?php if($nameempty != ""){ ?>
                                                <div id="" class="invalid-feedback">
                                                    <?= $nameempty ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <button name="simpan_kategori" class="btn button-brown" style="width: 100%;">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 col-sm-12">
                                <div class="card kategori-card">
                                    <div class="card-body ">
                                        <div class="card-title title-kategori">
                                            <!-- <h6>Data Kategori</h6> -->
                                            <div class="row height d-flex align-items-center">
                                                <div class="col-md-7">
                                                    <h6>Data Kategori</h6>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Search category . . ."> <button class="btn btn-primary">Search</button> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="scroll">
                                            <ul class="list-group list-group-horizontal">
                                                <?php  
                                                $categoryData = $admin->checkCategory(null, "all", null);
                                                if($categoryData['nums'] > 0){
                                                    foreach($categoryData['data'] as $data){
                                                ?>
                                                <li class="list-group-item">
                                                    <img src="<?= $data['foto_kategori'] ?>" alt="">
                                                    <div class="form-label"><strong><?= ucfirst($data['nama_kategori']) ?></strong></div>
                                                    <p>200 KG</p>
                                                    <a href="kategori-produk?param=<?= $data['nama_kategori'] ?>&action=edit" id="edit"><i class="mdi mdi-square-edit-outline browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i></a>
                                                    <a href="kategori-produk?param=<?= $data['nama_kategori'] ?>&action=delete" id="delete"><i class="mdi mdi-delete browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i></a>
                                                </li>
                                                <?php 
                                                    }
                                                }else{
                                                ?>
                                                <li class="list-group-item">
                                                    Data Kategori Kosong
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php if($categoryData['nums'] > 0){ ?>
                                        <nav aria-label="" class="mt-3">
                                            <ul class="pagination pagination-sm justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content body -->

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