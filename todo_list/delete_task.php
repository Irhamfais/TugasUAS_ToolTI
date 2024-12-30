<?php
include 'db.php';

// Hapus data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM tasks WHERE id = $id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus tugas: " . mysqli_error($conn);
    }
}
?>
