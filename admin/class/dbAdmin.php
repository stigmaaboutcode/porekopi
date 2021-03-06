<?php  
class dbAdmin extends dbConnect{
    public function checkAdmin(string $username){
        // query get data from table admin_store
        $sql = "SELECT * FROM admin_store WHERE username_admin='$username'";

        // execution the query table admin_store
        $ext = $this->dbConn()->query($sql);

        // get total row in table admin_store 
        $result['nums'] = $ext->num_rows;
        
        // view data from table admin_store
        while($rows = $ext->fetch_assoc()){
            // get username & password from table admin_store
            $result['username'] = $rows['username_admin'];
            $result['password'] = $rows['password_admin'];
        }

        // return data
        return $result;
    }

    // get data addresss store
    public function checkAddress(){
        $sql = "SELECT * FROM alamat_store WHERE id='1'";
        $exe = $this->dbConn()->query($sql);
        $nums = $exe->num_rows;
        while($rows = $exe->fetch_assoc()){
            $data[] = $rows;
        }
        
        $result['data'] = $data;
        $result['nums'] = $nums;

        return $result;
    }

    // save and update address store
    public function saveAddress(string $prov, string $kab, string $kec, string $pos, string $alamat){
        if($this->checkAddress()['nums'] > 0){
            $sql = "UPDATE alamat_store SET prov='$prov', kab='$kab', kec='$kec', pos='$pos', detail='$alamat' WHERE id='1'";
        }else{
            $sql = "INSERT INTO alamat_store (prov,kab,kec,pos,detail) VALUES('$prov','$kab','$kec','$pos','$alamat')";
        }
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    // get data contact store
    public function checkContact(){
        $sql = "SELECT * FROM kontak_store WHERE id='1'";
        $exe = $this->dbConn()->query($sql);
        $nums = $exe->num_rows;
        while($rows = $exe->fetch_assoc()){
            $data[] = $rows;
        }
        
        $result['data'] = $data;
        $result['nums'] = $nums;

        return $result;
    }

    // save and update contact store
    public function saveContact(string $wa, string $ig, string $fb){
        $wa_new = $this->formatNoTelpn($wa);

        if($this->checkContact()['nums'] > 0){
            $sql = "UPDATE kontak_store SET wa='$wa_new', ig='$ig', fb='$fb' WHERE id='1'";
        }else{
            $sql = "INSERT INTO kontak_store (wa,ig,fb) VALUES('$wa_new','$ig','$fb')";
        }
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    // get data category stock product
    public function checkCategory(?string $name, ?string $param, ?string $newName){
        $sql = "SELECT * FROM kategori_produk LIMIT 3";
        if(is_null($param)){
            $sql = "SELECT * FROM kategori_produk WHERE nama_kategori='$name'";
        }elseif($param == "edit"){
            $sql = "SELECT * FROM kategori_produk WHERE nama_kategori<>'$name' AND  nama_kategori='$newName'";
        }elseif($param == "select"){
            $sql = "SELECT * FROM kategori_produk";
        }
        $exe = $this->dbConn()->query($sql);
        $nums = $exe->num_rows;
        while($rows = $exe->fetch_assoc()){
            $data[] = $rows;
        }
        
        $result['data'] = $data;
        $result['nums'] = $nums;

        return $result;
    }

    // insert data category stock product
    public function InsertCategory(string $fotoName, string $kategoriName){
        $sql = "INSERT INTO kategori_produk (nama_kategori,foto_kategori) VALUES('$kategoriName','$fotoName')";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    // update data category stock producy
    public function UpdateCategory(string $param, ?string $name, ?string $image, ?string $key){
        if($param == "withImg"){
            $sql = "UPDATE kategori_produk SET nama_kategori='$name', foto_kategori='$image' WHERE nama_kategori='$key'";
        }
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    // get data expense store
    public function checkReport(?string $codeProduct, string $param = "", string $dari = "", string $sampai = ""){
        $sql = "SELECT * FROM laporan_pengeluaran WHERE kode_stok='$codeProduct'";
        if($param == "view"){
            $month = date('m');
            $sql = "SELECT * FROM laporan_pengeluaran WHERE month(tgl_laporan)='$month' ORDER BY id DESC";
        }elseif($param == "filter_date"){
            $sql = "SELECT * FROM laporan_pengeluaran WHERE tgl_laporan BETWEEN '$dari' AND '$sampai' ORDER BY id DESC";
        }elseif($param == "search"){
            $sql = "SELECT * FROM laporan_pengeluaran WHERE
            ( tgl_laporan BETWEEN '$dari' AND '$sampai') AND
            ( fee LIKE '%$codeProduct' OR
            kode_stok LIKE '%$codeProduct' OR
            fee LIKE '%$codeProduct%' OR
            kode_stok LIKE '%$codeProduct%' OR
            fee LIKE '$codeProduct%' OR
            kode_stok LIKE '$codeProduct%' ) ORDER BY id DESC";

        }
        
        $exe = $this->dbConn()->query($sql);
        while($rows = $exe->fetch_assoc()){
            $data[] = $rows;
        }
        $result['data'] = $data;
        $result['nums'] = $exe->num_rows;
        return $result;
    }

    // insert data expense store
    public function addReport(string $jumlahStock, string $hpp, string $code, string $date){
        $ket = "Produksi Stok";
        $fee =$jumlahStock * $hpp;
        $sql = "INSERT INTO laporan_pengeluaran (keterangan,fee,kode_stok,tgl_laporan) VALUES('$ket','$fee','$code','$date')";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    // get data stock product
    public function checkProduct(?string $param, ?string $key, ?string $newkey){
        $sql = "SELECT * FROM stok_produk ORDER BY id_stok DESC";
        if($param == "checkToDel"){
            $sql = "SELECT * FROM stok_produk WHERE kode_stok='$key'";
        }elseif($param == "searchh"){
            $like = $key."%";
            $like2 = "%".$key."%";
            $like3 = "%".$key;
            $sql = "SELECT * FROM stok_produk WHERE 
            kode_stok LIKE '$like' OR 
            tgl_input_stok LIKE '$like' OR 
            kategori_produk LIKE '$like' OR 
            biji_kopi LIKE '$like' OR 
            stok_kopi LIKE '$like' OR 
            hpp_per_kg LIKE '$like' OR 
            hj_per_kg LIKE '$like' OR
            kode_stok LIKE '$like2' OR 
            tgl_input_stok LIKE '$like2' OR 
            kategori_produk LIKE '$like2' OR 
            biji_kopi LIKE '$like2' OR 
            stok_kopi LIKE '$like2' OR 
            hpp_per_kg LIKE '$like2' OR 
            hj_per_kg LIKE '$like2' OR
            kode_stok LIKE '$like3' OR 
            tgl_input_stok LIKE '$like3' OR 
            kategori_produk LIKE '$like3' OR 
            biji_kopi LIKE '$like3' OR
            stok_kopi LIKE '$like3' OR 
            hpp_per_kg LIKE '$like3' OR 
            hj_per_kg LIKE '$like3'
            ORDER BY id_stok DESC";
        }elseif($param == "addstock"){
            $sql = "SELECT kode_stok, stok_kopi, hpp_per_kg FROM stok_produk WHERE id_stok='$key'";
        }
        $exe = $this->dbConn()->query($sql);
        $nums = $exe->num_rows;
        while($rows = $exe->fetch_assoc()){
            $data[] = $rows;
        }
        
        $result['data'] = $data;
        $result['nums'] = $nums;

        return $result;
    }

    // insert data stock product
    public function addStock(string $kategori, string $jenisBiji, string $jumlahStok, string $hpp, string $hj, string $user){
        $timezone = new DateTimeZone('Asia/Makassar');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        $today = $date->format('Y-m-d H:i:s');

        $createCode = $this->createCode($today);
        $sql = "INSERT INTO stok_produk ( kode_stok, kategori_produk, biji_kopi, stok_kopi, hpp_per_kg, hj_per_kg, user_input, tgl_input_stok )  VALUES( '$createCode', '$kategori', '$jenisBiji', '$jumlahStok', '$hpp', '$hj', '$user', '$today' )";
        $exe = $this->dbConn()->query($sql);
        if($exe){
            $reportProduct = $this->addReport($jumlahStok, $hpp, $createCode, $today);
            return $reportProduct;
        }
    }

    // update data stock product
    public function updateStock(string $jum, string $key){
        $sql = "UPDATE stok_produk SET stok_kopi='$jum' WHERE kode_stok='$key'";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }


    // get data customer
    public function checkCustomer(?string $param, ?string $key, string $keyEDIT = ""){
        $sql = "SELECT * FROM customer_store ORDER BY name_customer ASC";
        
        if($param == "checkById"){
            $sql = "SELECT * FROM customer_store WHERE id_customer='$key' ORDER BY name_customer ASC";
        }elseif($param == "checkByEmail"){
            $sql = "SELECT email_customer FROM customer_store WHERE email_customer='$key'";
        }elseif($param == "checkByEmailEdit"){
            $sql = "SELECT email_customer FROM customer_store WHERE email_customer<>'$keyEDIT' AND email_customer='$key'";
        }elseif($param == "search"){
            $sql = "SELECT * FROM customer_store WHERE  
            name_customer LIKE '%$key' OR
            email_customer LIKE '%$key' OR
            no_telp_customer LIKE '%$key' OR
            gender_customer LIKE '%$key' OR
            alamat_customer LIKE '%$key' OR
            prov_customer LIKE '%$key' OR
            kab_kota_customer LIKE '%$key' OR
            kec_customer LIKE '%$key' OR
            name_customer LIKE '%$key%' OR
            email_customer LIKE '%$key%' OR
            no_telp_customer LIKE '%$key%' OR
            gender_customer LIKE '%$key%' OR
            alamat_customer LIKE '%$key%' OR
            prov_customer LIKE '%$key%' OR
            kab_kota_customer LIKE '%$key%' OR
            kec_customer LIKE '%$key%' OR
            name_customer LIKE '$key%' OR
            email_customer LIKE '$key%' OR
            no_telp_customer LIKE '$key%' OR
            gender_customer LIKE '$key%' OR
            alamat_customer LIKE '$key%' OR
            prov_customer LIKE '$key%' OR
            kab_kota_customer LIKE '$key%' OR
            kec_customer LIKE '$key%' ORDER BY name_customer ASC";
        }
        
        $exe = $this->dbConn()->query($sql);
        $nums = $exe->num_rows;
        while($row = $exe->fetch_assoc()){
            $data[] = $row;
        }

        $result['data'] = $data;
        $result['nums'] = $nums;

        return $result;
    }

    // insert data customer
    public function addCustomer(string $name, string $email, string $gender, string $no, string $prov, string $kab, string $kec, string $alamat){
        $sql = "INSERT INTO customer_store (
            name_customer,
            email_customer,
            no_telp_customer,
            gender_customer,
            alamat_customer,
            prov_customer,
            kab_kota_customer,
            kec_customer) VALUES('$name','$email','$no','$gender','$alamat','$prov','$kab','$kec')";
        $exe = $this->dbConn()->query($sql);

        return $exe;
    }

    // update data customer
    public function UpdateCustomer(string $name, string $email, string $gender, string $no, string $prov, string $kab, string $kec, string $alamat, string $key){
        $sql = "UPDATE customer_store SET name_customer = '$name', email_customer = '$email', no_telp_customer = '$no', gender_customer = '$gender', alamat_customer = '$alamat', prov_customer = '$prov', kab_kota_customer = '$kab', kec_customer = '$kec' WHERE id_customer = '$key'";

        $exe = $this->dbConn()->query($sql);

        return $exe;
    }

    // fonction to create code product 
    public function createCode($date){
        $month = date("m");
        $sql = "SELECT kode_stok FROM stok_produk WHERE month(tgl_input_stok)='$month'";
        $exe = $this->dbConn()->query($sql);
        if($exe->num_rows == 0){
            $arrayDate = explode("-", $date);
            $code = "PK-".$arrayDate[1].substr($arrayDate[0], -2)."001";
        }else{
            while($rows = $exe->fetch_assoc()){
                $DBCodeStok = $rows['kode_stok'];
            }
            $arrayCode = explode("-", $DBCodeStok);
            $newCode = ++$arrayCode[1];
            $code = "PK-0".$newCode;
        }

        return $code;
    }

    // function for hide button delete on data product 
    public function checkToDelete($code){
        $checkReporting = $this->checkReport($code);
        $getStock = $this->checkProduct("checkToDel", $code, null);
        foreach($getStock['data'] as $stock){
            $countStock = $stock['stok_kopi'];
        }
        if($countStock > 0){
            if($checkReporting['nums'] > 1){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    // format phone number remove 0
    public function formatNoTelpn(string $no){
        if(substr($no,0,1) == "0"){
            return substr_replace($no,"",0,1);
        }elseif(substr($no,0,2) == "62"){
            return substr_replace($no,"",0,2);
        }else{
            return $no;
        }
    }

    // format name
    public function formatName(string $name){
        $arrayName = explode(" ", $name);
        $newFormat = "";
        foreach($arrayName as $name){
            $newFormat .= ucfirst($name) . " "; 
        }

        return trim($newFormat);
    }

    // format date with name of the day
    public function formatDate(string $date){
        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
        $namahari = date('l', strtotime($date));

        $arrayDate = explode("-",$date);

        $result = $daftar_hari[$namahari] . ", " . $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];
        
        return $result;
    }
    
    // delete function every table data
    public function deleteData(string $key, string $value, string $table){
        $sql = "DELETE FROM $table WHERE $key='$value'";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

}

?>