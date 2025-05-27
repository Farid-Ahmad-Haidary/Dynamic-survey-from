<?php
// connection.php
include 'connection.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Survey Form For Doctors</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <h1>Survey Form</h1>
    <p>Please fill out this form with the required information</p>
    <form action='' method='post'>
      <fieldset>
        <label>Enter Your First Name: <input type="text" name="first_name"  /></label>
        <label>Enter Your Last Name: <input type="text" name="last_name"  /></label>
        <label>Enter Your Salary: <input type="number" name="salary"  /></label>
      </fieldset>
      <input type="submit" name='save' value="save" />
    </form>

    <h2>Doctors Surveies Lists.</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Salary</th>
        <th>Delate</th>
        <th>Edit</th>
      </tr>
      <?php
      // Fetching data from the database
      $result = mysqli_query($conn, "SELECT * FROM doctors");
      foreach ($result as $details) {
      ?>
      <tr>
        <td><?php echo $details['id'] ?></td>
        <td><?php echo $details['first_name'] ?></td>
        <td><?php echo $details['last_name'] ?></td>
        <td><?php echo $details['salary'] ?></td>
        <td><a href="delate.php?id=<?php echo $details['id']; ?>"><i class="fas fa-trash" style="color: red;"></i></a></td>
        <td><a href="edit.php?id=<?php echo $details['id']; ?>"><i class="fas fa-pen-to-square" style="color: green; font-size: 20px;"></i></a></td>
      </tr>
      <?php 
      }
      ?>
    </table>
  </body>
</html>



<!-- getting the data from the form -->
<?php
if (isset($_POST['save'])) {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $salary = $_POST['salary'] ?? '';

    // Sending data to the database
    mysqli_query($conn, "INSERT INTO doctors (first_name, last_name, salary) VALUES ('$first_name', '$last_name', '$salary')");
}

?>


