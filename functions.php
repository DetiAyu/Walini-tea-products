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

// Fungsi untuk menambahkan data
function add($data){
    $conn = connection();

    $name = htmlspecialchars($data['name']);
    $type = htmlspecialchars($data['type']);
    $price = htmlspecialchars($data['price']);
    $picture = htmlspecialchars($data['picture']);

    $query = "INSERT INTO walini VALUES (null, '$name', '$type', '$price', '$picture');";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);

}

// Fungsi untuk menghapus data
function delete($id) {
    $conn = connection();

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
    $picture = htmlspecialchars($data['picture']);

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