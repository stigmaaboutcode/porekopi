<?php  
require_once 'class/apiClass.php';
if($_SESSION['login_store_pore'] != true){
    header('Location: index');
    exit();
}
$_SESSION['revious_page'] = explode('.',$_SERVER['PHP_SELF'])[0];
?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dasbor Toko | Pore Kopi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PoreKopi" name="author"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

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
                            <div class="col-12 col-xl-4 col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title"><h6>Tambah & Edit Kategori</h6></div>
                                        <hr>
                                        <form action="" method="">
                                            <div class="mb-3">
                                                <label class="form-label">Foto Sampul</label>
                                                <input type="file" class="filestyle" data-input="false" data-buttonname="btn-secondary">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="kategori" placeholder="kategori" name="kategori">
                                                <label for="kategori">Nama Kategori</label>
                                            </div>
                                            <button class="btn button-brown" style="width: 100%;">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title"><h6>Data Kategori</h6></div>
                                        <hr>
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

        

        <script src="assets/js/app.js"></script>

    </body>
</html>
