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

    public function InsertCategory(string $fotoName, string $kategoriName){
        $sql = "INSERT INTO kategori_produk (nama_kategori,foto_kategori) VALUES('$kategoriName','$fotoName')";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    public function UpdateCategory(string $param, ?string $name, ?string $image, ?string $key){
        if($param == "withImg"){
            $sql = "UPDATE kategori_produk SET nama_kategori='$name', foto_kategori='$image' WHERE nama_kategori='$key'";
        }
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

    public function formatNoTelpn(string $no){
        if(substr($no,0,1) == "0"){
            return substr_replace($no,"",0,1);
        }elseif(substr($no,0,2) == "62"){
            return substr_replace($no,"",0,2);
        }else{
            return $no;
        }
    }

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

    public function saveAddress(string $prov, string $kab, string $kec, string $pos, string $alamat){
        if($this->checkAddress()['nums'] > 0){
            $sql = "UPDATE alamat_store SET prov='$prov', kab='$kab', kec='$kec', pos='$pos', detail='$alamat' WHERE id='1'";
        }else{
            $sql = "INSERT INTO alamat_store (prov,kab,kec,pos,detail) VALUES('$prov','$kab','$kec','$pos','$alamat')";
        }
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }
    
    public function deleteData(string $key, string $value, string $table){
        $sql = "DELETE FROM $table WHERE $key='$value'";
        $exe = $this->dbConn()->query($sql);
        return $exe;
    }

}



?>