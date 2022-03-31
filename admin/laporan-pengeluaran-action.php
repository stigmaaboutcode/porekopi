<?php  
$reportData = $admin->checkReport(null, "view");
$emptyNotif = "Data masih kosong";
if(isset($_POST['filter_data'])){
    $dari = $_POST['dari'] . " 00:00:00";
    $sampai = $_POST['sampai'] . " 23:00:00";
    $reportData = $admin->checkReport(null, "filter_date", $dari, $sampai);
    $emptyNotif = "Data " . $_POST['dari'] . " sampai " . $_POST['sampai'] . " Tidak ditemukan.";
}elseif(isset($_POST['actionTosearch'])){
    $dari = $_POST['dari'] . " 00:00:00";
    $sampai = $_POST['sampai'] . " 23:00:00";
    $search = $_POST['search'];
    $reportData = $admin->checkReport($search, "search", $dari, $sampai);
    $emptyNotif ='"' . $_POST['search'] . '" Tidak ditemukan';
}

?>