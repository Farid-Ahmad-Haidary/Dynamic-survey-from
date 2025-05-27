<?php
include 'connection.php';
$id = $_GET['id'];

$delate = mysqli_query($conn, "DELETE FROM doctors WHERE id = $id");
if ($delate) {
?>
    <script type="text/javascript">
        alert("Data Deleted Successfully");
        window.location.href = "index.php"; // Redirect to index.php after deletion
    </script>


<?php
}




?>