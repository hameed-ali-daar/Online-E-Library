<?php
include '../DBconnect.php';



session_start();

if(empty($_SESSION['username']))
{
	header('location:../index.php');
}
if(!empty($_SESSION['username']))
{
$username = $_SESSION['username'];
}

$bid = $_GET['bid'];
$sql = "SELECT * FROM books WHERE bid=$bid";
$result=mysqli_query($conn, $sql);

if ($result) {
// sql to delete a record
    $sql = "DELETE FROM books WHERE bid=$bid";
    $result=mysqli_query($conn, $sql);

    if ($result) {
        ?>
       <script>
       alert ("This book has been deleted successfully")
       </script>
   <?php
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Error selecting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<a href="../admin/admin.php">Back to the List</a>