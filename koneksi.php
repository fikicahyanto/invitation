<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "undangan_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kehadiran = $_POST['kehadiran'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO guestbook (nama, kehadiran, pesan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $kehadiran, $pesan);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>