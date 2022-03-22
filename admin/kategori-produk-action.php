<?php  
$uploadOk = "";
if(isset($_POST['simpan_kategori'])){

    // folder file foto
    $dir = "assets/images/kategori/";
    
    // tujuan file
    $new = md5(rand()) . "-" . $_POST['nama_kategori'] . "-";
    $target_file = $dir . $new . basename($_FILES["foto_kategori"]["name"]);
    
    if($action == "edit"){
        if($_FILES['foto_kategori']['size'] == 0){
            // check required input
            if(empty(trim($_POST['nama_kategori']))){
                $nameempty = "name is empty";
            }else{
                $nama_kategori = $_POST['nama_kategori'];
            }

            if($nameempty == ""){
                $checkname = $admin->checkCategory($name_kat,"edit",$nama_kategori);
                if($checkname['nums'] > 0){
                    $nameempty = "Sorry, name already exists.";
                }else{
                    $newName = str_replace("-".$name_kat."-", "-".$nama_kategori."-", $foto_kat);
                    $rename = rename($foto_kat, $newName);
                    if($admin->updateCategory("withImg", $nama_kategori, $newName, $name_kat)){
                        $_SESSION['alert2'] = "success";
                        header("Location:kategori-produk");
                        exit();
                    }
                }
            }
        }else{
            // check format image
            $imagetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imagetype != "jpg" && $imagetype != "png" && $imagetype != "jpeg"){
                $uploadOk = "Sorry, only JPG, JPEG & PNG files are allowed.";
            }else{
                // check required input
                if(empty(trim($_POST['nama_kategori']))){
                    $nameempty = "name is empty";
                }else{
                    $nama_kategori = $_POST['nama_kategori'];
                }

                if($nameempty == ""){
                    $checkname = $admin->checkCategory($name_kat,"edit",$nama_kategori);
                    if($checkname['nums'] > 0){
                        $nameempty = "Sorry, name already exists.";
                    }else{
                        if(move_uploaded_file($_FILES["foto_kategori"]["tmp_name"], $target_file)){
                            if($admin->updateCategory("withImg", $nama_kategori, $target_file, $name_kat)){
                                unlink($foto_kat);
                                $_SESSION['alert2'] = "success";
                                header("Location:kategori-produk");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }else{
        // check format image
        $imagetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imagetype != "jpg" && $imagetype != "png" && $imagetype != "jpeg"){
            $uploadOk = "Sorry, only JPG, JPEG & PNG files are allowed.";
        }
    
        // check required input
        if(empty(trim($_POST['nama_kategori']))){
            $nameempty = "name is empty";
        }else{
            $nama_kategori = $_POST['nama_kategori'];
        }
    
        // check error
        if($uploadOk == "" & $nameempty == ""){
            // check name category
            $checkname = $admin->checkCategory($nama_kategori, null, null);
            if($checkname['nums'] > 0){
                $nameempty = "Sorry, name already exists.";
            }else{
                // upload file image
                if(move_uploaded_file($_FILES["foto_kategori"]["tmp_name"], $target_file)){
                    if($admin->InsertCategory($target_file, $nama_kategori)){
                        $_SESSION['alert2'] = "success";
                        header("Location:kategori-produk");
                        exit();
                    }else{
                        $uploadOk = "error.";
                        $nameempty = "error.";
                    }
                }else{
                    $uploadOk = "File is not Uploaded.";
                }
            }
        }
    }




}

?>