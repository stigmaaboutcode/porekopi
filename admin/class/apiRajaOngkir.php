<?php  

class apiRajaOngkir{

    public function dataIndonesia(string $param, ?string $id){

        if($param == "prov"){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: 3edd124529d0527e0cff142cd3ec17a6"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return "error";
            } else {
                $array = json_decode($response,TRUE);
                return $array["rajaongkir"]["results"];
                
            }
        }elseif($param == "kab_kota"){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=".$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: 3edd124529d0527e0cff142cd3ec17a6"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return "error";
            } else {
                $array = json_decode($response,TRUE);
                return $array["rajaongkir"]["results"];
                
            }
        }elseif($param == "kec"){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=".$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: 3edd124529d0527e0cff142cd3ec17a6"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return "error";
            } else {
                $array = json_decode($response,TRUE);
                return $array["rajaongkir"]["results"];
            }
        }

    }
    
}

?>