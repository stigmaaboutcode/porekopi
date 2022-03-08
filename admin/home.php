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
                                    <h4 class="mb-sm-0">Dasbor</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> -->
                                            <li class="breadcrumb-item active">Dasbor</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <!-- content body -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="d-flex text-muted">
                                                <div class="flex-shrink-0  me-3 align-self-center">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title bg-light rounded-circle browns-text font-size-20">
                                                            <i class="mdi mdi-cash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Penjualan hari ini</p>
                                                    <h5 class="mb-3">Rp.240.000,00</h5>
                                                    <p class="text-truncate mb-0"><span class="browns-text me-2"> Rp.13.000,00 <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> Rata-rata</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        <!-- col -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="d-flex text-muted">
                                                <div class="flex-shrink-0  me-3 align-self-center">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title bg-light rounded-circle browns-text font-size-20">
                                                            <i class="mdi mdi-cash-multiple"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Penjualan bulan ini</p>
                                                    <h5 class="mb-3">Rp.240.000,00</h5>
                                                    <p class="text-truncate mb-0"><span class="browns-text me-2">Rp.13.000,00 - Rp.13.000,00 <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> Target</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <!-- col -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="d-flex text-muted">
                                                <div class="flex-shrink-0  me-3 align-self-center">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title bg-light rounded-circle browns-text font-size-20">
                                                            <i class="mdi mdi-cart-outline"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Total Penjualan</p>
                                                    <h5 class="mb-3">234 Pesanan</h5>
                                                    <p class="text-truncate mb-0"><span class="browns-text me-2">0.13% <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> Persentase</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <!-- col -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="d-flex text-muted">
                                                <div class="flex-shrink-0  me-3 align-self-center">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title bg-light rounded-circle browns-text font-size-20">
                                                            <i class="mdi mdi-calculator-variant"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Laba bersih bulan ini</p>
                                                    <h5 class="mb-3">Rp.100.000,00</h5>
                                                    <p class="text-truncate mb-0"><span class="browns-text me-2">0.13% <i class="ri-arrow-right-up-line align-bottom ms-1"></i></span> Persentase</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <!-- col -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Data Tahun 2022</h4>
                                        <p class="card-title-desc">Pemasukan & pengeluaran</p>
    
                                        <canvas id="barChart"></canvas>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                            <!-- end col -->
                        </div>
                        <!-- endcontent body -->

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

        <!-- Chart JS -->
        <script src="assets/libs/chart.js/Chart.bundle.min.js"></script>
        <script>
            !function(n){"use strict";n(function(){var e,a,r,o,t;Chart.defaults.global.defaultFontColor="#7b919e",Chart.defaults.scale.gridLines.color="rgba(123, 145, 158,0.1)",
                n("#barChart").length&&(a=n("#barChart").get(0).getContext("2d"),new Chart(a,{
                    type:"bar",
                    data:{
                        labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                        datasets:[
                            {
                                label:"Pemasukan",
                                data:[46,57,59,54,62,58,64,60,66,44,66,54],
                                backgroundColor:"#4FD3C4"
                            },
                            {
                                label:"Pengeluaran",
                                data:[74,83,102,97,86,106,93,114,94,78,34,89],
                                backgroundColor:"#D82148"
                            }
                        ]
                    },
                    options:{
                        responsive:!0,
                        maintainAspectRatio:!0,
                        scales:{
                            yAxes:[
                                {
                                    display:!1,
                                    gridLines:{
                                        drawBorder:!1
                                    },
                                    ticks:{
                                        fontColor:"#686868"
                                    }
                                }
                            ],
                            xAxes:[
                                {
                                    barPercentage:.7,
                                    categoryPercentage:.5,
                                    ticks:{
                                        fontColor:"#7b919e"
                                    },
                                    gridLines:{
                                        display:!1,
                                        drawBorder:!1
                                    }
                                }
                            ]
                        },
                        elements:{
                            point:{
                                radius:0
                            }
                        }
                    }
                }))
            })}(jQuery);
        </script>
        

        <script src="assets/js/app.js"></script>

    </body>
</html>
