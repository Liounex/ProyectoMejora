<?php

include_once __DIR__ . '/layout/headmenu.php';
include_once __DIR__ . '/layout/nav.php';
?>

<style>
  .view-notes {
    width: 30rem;
    border-radius: 15px;
    background-color: #081975;
    padding: 20px;
  }
  .view-notes .form-label {
    color: #ffffff;
  }
  /* .container-sm{
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 20px;
  }*/
  .container-sm .table {
    background-color: #c8e6e0;
    /* height: 300px;  */
    border-radius: 15px;
    margin-top: 60px;
  } 
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Revisar notas</title>
</head>
<body>
  <div class="container-sm">
    <div class="view-notes ">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI</label>
        <input type="text" onkeypress="return valideKey(event);" class="form-control"  id="numeroInput" aria-describedby="emailHelp" placeholder="Numero de DNI" maxlength="8" required>
        
      </div>

      <!-- <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">IDIOMA</label>
        
        <select class="form-select" aria-label="Default select example" name="idiomaInput" id="idiomaInput">
          <option value="" selected>Todos</option>
          <option value="ingles">Ingles</option>
          <option value="quechua">Quechua</option>
        </select>
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">NIVEL</label>
        
        <select class="form-select" aria-label="Default select example" name="nivelInput" id="nivelInput">
          <option value="" selected>Todos</option>
          <option value="nivel 1">Nivel 1</option>
          <option value="nivel 1">Nivel 2</option>
          <option value="nivel 1">Nivel 3</option>
        </select>
             
      </div> -->

      <button type="submit" onclick="consultarNota()" class="btn btn-primary btn-lg w-100">Consultar</button>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"># DNI</th>
          <th scope="col">Nombres y Apellidos</th>
          <th scope="col">Idioma</th>
          <th scope="col">Nivel</th>
          <th scope="col">Nota</th>
        </tr>
      </thead>
      <tbody class="info-notas">
        
      </tbody>
    </table>
  </div>



  <script src="./notas.js">
    
  </script>
</body>
</html>


