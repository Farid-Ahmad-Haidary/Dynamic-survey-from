<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Edit Doctor Survey</title>
    <link rel="stylesheet" href="styles.css" />
</html>

<?php
// Db connection...
include 'connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM doctors WHERE id = $id";
$std = mysqli_query($conn , $query );
$stdDetails = mysqli_fetch_assoc($std);
if ($stdDetails) {
  ?>
    <form action='' method='post'>
      <fieldset>
        <label>Enter Your First Name: <input type="text" name="first_name" value="<?php echo htmlspecialchars($stdDetails['first_name']) ?>"  /></label>
        <label>Enter Your Last Name: <input type="text" name="last_name" value="<?php echo htmlspecialchars($stdDetails["last_name"]) ?>" /></label>
        <label>Enter Your Salary: <input type="number" name="salary" value="<?php echo htmlspecialchars($stdDetails["salary"]) ?>" /></label>
      </fieldset>
      <input type="submit" name='save' value="save" />
    </form>
  <?php
}
?>
<?php
// getting the data from the formif
if (isset($_POST['save'])) {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $salary = $_POST['salary'] ?? '';

    // Sending data to the database
    mysqli_query($conn, "UPDATE doctors SET first_name='$first_name', last_name='$last_name', salary='$salary' WHERE id=$id");
    
    // Redirecting to index.php after updating
    header("Location: index.php"); 
}

?>