<?php

$prov = $_GET['prov_id'];

require_once "../class/apiRajaOngkir.php";

$rajaongkir = new apiRajaOngkir();

$idprov = 0;
$value = $prov;
$provs = $rajaongkir->dataIndonesia("prov",null);

foreach($provs as $key => $prov){
    $idprov .= $value == $prov['province'] ? $prov["province_id"] : "";
}

$kab_kota = $rajaongkir->dataIndonesia("kab_kota",$idprov);


if ($kab_kota == "error") {
    echo "cURL Error #:";
} else {
    foreach ($kab_kota as $key => $kab){
        echo '<option value="'.$kab["city_name"].'">';
    }
}
