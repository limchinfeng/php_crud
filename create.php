<?php

require 'config.php'; 

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];

  do {
    if( empty($name) || empty($email) || empty($phone) || empty($address)) {
      $errorMessage = "All the fields are required";
      break;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMessage = "Invalid email format.";
      break;
    }

    //insert to db using sql
    $sql = "INSERT INTO clients (name, email, phone, address) " .
           "VALUES ('$name', '$email', '$phone', '$address' )";
    $result = $conn->query($sql);

    if(!$result) {
      $errorMessage = "Invalid query: " . $conn->error;
      break;
    }

    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $successMessage = "Client added successfully";

    header("location: $base_url/index.php");
    exit;

  } while(false);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>PHP CRUD</title>
</head>

<body>
  <div class="container my-5">
    <h2>New Client</h2>

    <?php 
      if(!empty($errorMessage)) {
        echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
        ";
      }
    ?>


    <form method="post">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="name">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="email@test.com">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="+01012344556">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Sungai Petani, Kedah">
        </div>
      </div>

      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a href="<?php echo $base_url; ?>/index.php" class="btn btn-outline-primary" >Cancel</a>
        </div>
      </div>

      <?php 
        if(!empty($successMessage)) {
          echo "
          <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
            </div>
          </div>
          ";
        }
      ?>
    </form>
  
</body>


</html>