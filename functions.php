<?php 
// Koneksi ke DB & pilih DB
function connection(){
    return mysqli_connect('localhost', 'root', '', 'myshop');
}

//Query isi tabel walini
function querydata($query){
    $conn = connection();
    $result = mysqli_query($conn, $query);

    //jika hasilnya hanya 1 data
    if( mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }
    // Jika hasilnya lebih dari 1, ubah data kedalam array
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
return $rows;
}

// Fungsi untuk mengupload picture
function upload() {
    
    // hasil dari var_dump($_FILES)
    $file_name = $_FILES['picture']['name'];
    $file_type = $_FILES['picture']['type'];
    $file_size = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $file_tmp = $_FILES['picture']['tmp_name'];

    // ketika tidak ada gambar yang dipilih
    if($error == 4) {
        return 'nopicture.jpg';
    }

    // cek ekstensi file
    $picture_list = ['jpg', 'jpeg', 'png'];
    $file_extention = explode('.', $file_name);
    $file_extention = strtolower(end($file_extention));
    if(!in_array($file_extention, $picture_list)){
        echo "<script>
                    alert('It is not a picture');
                </script>";
        return false;
    }

    // cek type file -- tidak perlu cek jpg karena jpg typenya adalah jpeg
    if($file_type != 'image/jpeg' && $file_type != 'image/png') {
        echo "<script>
                    alert('It is not a picture');
                </script>";
        return false;
    }

    // cek size file -- maksimal 5Mb == 5000000 byte
    if($file_size > 5000000) {
        echo "<script>
                    alert('The picture size is too large');
                </script>";
        return false;
    }

    // Lolos pengecekan -- siap upload file
    // generate nama file baru
    $new_file_name = uniqid();
    $new_file_name .= '.';
    $new_file_name .= $file_extention;

    move_uploaded_file($file_tmp, 'img/'. $new_file_name);

    return $new_file_name;
}


// Fungsi untuk menambahkan data
function add($data){
    $conn = connection();

    $name = htmlspecialchars($data['name']);
    $type = htmlspecialchars($data['type']);
    $price = htmlspecialchars($data['price']);

    // upload picture
    $picture = upload();
    if(!$picture){
        return false;
    }

    $query = "INSERT INTO walini VALUES (null, '$name', '$type', '$price', '$picture');";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data
function delete($id) {
    $conn = connection();

    // menghapus gambar di folder img
    $prod = querydata("SELECT * FROM walini WHERE id = $id");
    if($prod['picture'] != 'nopicture.jpg') {
    unlink('img/'. $prod['picture']);
    }

    $query = "DELETE FROM walini WHERE id = $id";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengupdate data
function update($data){
    $conn = connection();

    $id = htmlspecialchars($data['id']);
    $name = htmlspecialchars($data['name']);
    $type = htmlspecialchars($data['type']);
    $price = htmlspecialchars($data['price']);
    $old_picture = htmlspecialchars($data['old_picture']);

    $picture = upload();
    if (!$picture) {
        return false;
    }

    if($picture == 'nopicture.jpg') {
        $picture = $old_picture;
    }

    $query = "UPDATE walini 
            SET name='$name', type='$type', price='$price', picture='$picture' 
            WHERE id=$id";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $conn = connection();
    $query = "SELECT * FROM walini WHERE name LIKE '%$keyword%' OR type LIKE '%$keyword%' OR price LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
return $rows;
}



?>