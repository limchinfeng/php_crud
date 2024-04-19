<?php

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  require 'config.php'; 

  $sql = "DELETE FROM clients WHERE id=$id";
  $conn->query($sql);

}

header("location: $base_url/index.php");

?>