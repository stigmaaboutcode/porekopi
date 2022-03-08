<?php

$prov = $_GET['prov_id'];

require_once "../class/apiRajaOngkir.php";

$rajaongkir = new apiRajaOngkir();

$idprov = "";
$value = $prov;
$provs = $rajaongkir->dataIndonesia("prov",null);

foreach($provs as $key => $prov){
    $idprov .= $value == $prov['province'] ? $prov["province_id"] : "";
}

$idkab = "";
$value = $_GET['kab_id'];
$kab_kota = $rajaongkir->dataIndonesia("kab_kota",$idprov);

foreach ($kab_kota as $key => $kab){
    $idkab .= $value == $kab['city_name'] ? $kab["city_id"] : "";
}

$kecamatan = $rajaongkir->dataIndonesia("kec",$idkab);

if ($kecamatan == "error") {
    echo "cURL Error #:" . $err;
} else {

    foreach ($kecamatan as $key => $kec){
        echo '<option value="'.$kec["subdistrict_name"].'">';
    }
}


