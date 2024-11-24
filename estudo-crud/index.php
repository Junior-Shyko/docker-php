<?php
require '../vendor/autoload.php';
require 'Crud.php';

$db = new Conn();

$personRepo = new Crud($db);
$persons = $personRepo->getAllUsers();

require 'header.php';
?>
<div class="container">
<form action="controller.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Idade</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <select name="type" id="" class="form-control">
        <option value="null">--Selecione--</option>
        <option value="pf">Pessoa Fisica</option>
        <option value="pj">Pessoa Juridica</option>
    </select>
    <input type="text" name="action" value="create">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>