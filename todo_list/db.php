<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'todo_list';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
