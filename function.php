<?php

$conn = mysqli_connect("localhost","praktikumbelajar_nasheh","yGzEU3%I7FJ.","praktikumbelajar_nasheh");

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $profile = htmlspecialchars($data["profile"]);
    $user = htmlspecialchars($data["user"]);
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $daerah = htmlspecialchars($data["daerah"]);

    $query = "INSERT INTO DataPengguna VALUES ('$user','$profile','$nama','$umur','$daerah')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function hapus($data){
    global $conn;
    $iduser = $_POST["pengguna"];

    mysqli_query($conn, "DELETE FROM user WHERE pengguna = '$iduser' ");
    return mysqli_affected_rows($conn);
}

function hapusisi($data){
    global $conn;
    $idjudul = $_POST["judul"];

    mysqli_query($conn, "DELETE FROM belajar WHERE judul = '$idjudul' ");
    return mysqli_affected_rows($conn);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username kembar
    $query = mysqli_query($conn, "SELECT pengguna FROM user WHERE pengguna = '$username'");

    if (mysqli_fetch_assoc($query)) {
        echo "
            <script>
                alert ('Username yang dipilih sudah terdaftar!');
                document.location.href = 'login.php';
            </script>
        ";
        return false;
    }

    //cek apakah password sudah benar
    if ($password !== $password2) {
        echo"
        <script>
            alert('konfirmasi password tidak sesuai !');
        </script>
        ";
        return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //masukkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('$username','$password')");

    return mysqli_affected_rows($conn);
    
}

function add($data){
    global $conn;

    $judul = stripcslashes($data["judul"]);
    $deskripsi = stripcslashes($data["deskripsi"]);
    $tingkat = stripcslashes($data["tingkat"]);

    $file = upload();
    if (!$file) {
        return false;
    }


    $input = mysqli_query($conn, "SELECT judul FROM belajar WHERE judul = '$judul'");

    if (mysqli_fetch_assoc($input)) {
        echo "
            <script>
                alert ('Judul materi sudah ada, mohon berikan materi lain nya!');
            </script>
        ";
        return false;
    }

    //masukkan user baru ke database
    mysqli_query($conn, "INSERT INTO belajar VALUES('$judul','$deskripsi','$file','$tingkat')");

    return mysqli_affected_rows($conn);
    
}

function upload(){
    
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $errorFile = $_FILES ['file']['error'];
    $errorFile = $_FILES ['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    //cek gambar
    $ekstensiFileValid = ['pdf'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    //cek ekstensi
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
            <Script>
                alert('Ekstensi file anda bukan pdf !!');
            </Script>
        ";
        return false;
    }

    //cek ukuran
    if ($ukuranFile > 50000000) {
        echo"
        <script>
            alert('ukurang terlalu besar !');
        </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    
    move_uploaded_file($tmpName, "file/".$namaFileBaru);

    return $namaFileBaru;
    
}

function ubah($data){
    global $conn;

    $judul = stripcslashes($data["judul"]);
    $deskripsi = stripcslashes($data["deskripsi"]);
    $tingkat = stripcslashes($data["tingkat"]);

    //masukkan user baru ke database
    mysqli_query($conn, "UPDATE belajar SET deskripsi = '$deskripsi', materi = '$file', kesulitan = '$tingkat' WHERE judul=$judul ");

    return mysqli_affected_rows($conn);
}

function view($data){
    global $conn;
    
    $file = $_POST['fileMateri'];
        header("content-type: application/pdf");
        readfile("file/$file");
}

function cariUser($keyword){
    $query = "SELECT * FROM user WHERE pengguna LIKE '%$keyword%'";

    return query($query);
}

function cariJudul($keyword){
    $query = "SELECT * FROM belajar WHERE judul LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' OR kesulitan LIKE '%$keyword%'";

    return query($query);
}


?>