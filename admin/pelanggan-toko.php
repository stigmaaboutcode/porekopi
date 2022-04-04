<?php  
require_once 'class/apiClass.php';
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
        $deleteCustomer = $admin->deleteData("id_customer", $customer, "customer_store");
        if($deleteCustomer){
            $_SESSION['alert2'] = "success";
            header('Location: pelanggan-toko');
            exit();
        }
    }else{
        header('Location: pelanggan-toko');
        exit();
    }
}




?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title> Data Pelanggan | Pore Kopi</title>
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
                                    <h4 class="mb-sm-0">Data Pelanggan</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pelanggan Toko</a></li>
                                            <li class="breadcrumb-item active">Data Pelanggan</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <form action="" method="post">
                            <div class="row">

                                <!-- data -->
                                    <div  class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title title-kategori">
                                                    <div class="row height d-flex align-items-center">
                                                        <div class="col-md-8 col-sm-6">
                                                            <h6>Data Pelanggan</h6>
                                                        </div>
                                                        <div  class="col-md-4 col-sm-6">
                                                            <div class="search"> 
                                                                <i class="fa fa-search"></i> <input type="text" value="<?= isset($_POST['actionTosearch']) ? $_POST['search'] : '' ?>" name="search" class="form-control" placeholder="Search Customer . . ."> <button type="submit" name="actionTosearch" class="btn btn-primary">Search</button> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="table-rep-plugin">
                                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                        <table id="tech-companies-1" class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama</th>
                                                                    <th>Email</th>
                                                                    <th>No Telpn</th>
                                                                    <th>Jenis Kelamin</th>
                                                                    <th>Alamat</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                if(isset($_POST['actionTosearch'])){
                                                                    $search = $_POST['search'];
                                                                    $geCustomer = $admin->checkCustomer("search", $search);
                                                                }else{
                                                                    $geCustomer = $admin->checkCustomer(null, null);
                                                                }
                                                                foreach($geCustomer['data'] as $row){
                                                                ?>
                                                                <tr>
                                                                    <td><?= ucfirst($row['name_customer']) ?></td>
                                                                    <td><?= $row['email_customer'] ?></td>
                                                                    <td><?= $row['no_telp_customer'] ?></td>
                                                                    <td><?= $row['gender_customer'] ?></td>
                                                                    <td>
                                                                        <?= $row['prov_customer'] ?><br>
                                                                        <?= $row['kab_kota_customer'] ?><br>
                                                                        <?= $row['kec_customer'] ?><br>
                                                                        <?= $row['alamat_customer'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="tambah-pelanggan?key=<?= $row['id_customer'] ?>" id="edit">
                                                                            <i class="mdi mdi-square-edit-outline browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="edit"></i>
                                                                        </a>
                                                                        <a href="pelanggan-toko?key=<?= $row['id_customer'] ?>" id="delete">
                                                                            <i class="mdi mdi-delete browns-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php  
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- data END -->

                            
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