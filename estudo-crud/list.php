<?php
require '../vendor/autoload.php';
require 'Crud.php';

$db = new Conn();

$personRepo = new Crud($db);
$persons = $personRepo->getAllUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de pessoas</title>
  <?php require 'assets.php' ?>
</head>

<body>
  <div class="container">
  <ul class="list-group mt-5">
    <?php foreach ($persons as $key => $person) { ?>
      <li class="list-group-item">
        <div class="d-flex justify-content-between">
          <div class="col-md-9">
          <?php echo $person['name']; ?>
          </div>
          <div class="col-md-3">
          <button type="button" class="btn btn-primary">Editar</button>
          <button type="button" class="btn btn-danger">Excluir</button>
          </div>
        </div>       
      </li>
    <?php } ?>
    </ul>
  </div>
</body>

</html>