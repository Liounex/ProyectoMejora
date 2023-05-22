<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once __DIR__ . '/../Controllers/UserControllers.php';
require_once __DIR__ . '/../Controllers/ProcedureControllers.php';

$newQuery = false;
if (isset($_POST['codtramite'])) {
  $user = new UserControllers();
  $doc = new ProcedureControllers();
  $arrayURI = $_POST['codtramite'];
  $tramiteDetail = $user->showDetail($arrayURI);
  $docDetail = $doc->showDetails($arrayURI);

  $newQuery = true;
}


?>

<h4 class="font-weight-bolder">Estado de Trámite</h4>
<p class="mb-0">Ingrese su numero de DNI y código de pago</p>
</div>
<div class="card-body">
  <form role="form" action="" method="POST" autocomplete="on">
    <div class="mb-3">
      <input type="text"  onkeypress="return valideKey(event);" class="form-control form-control-lg" placeholder="Numero de DNI" aria-label="username" name="dniusuario" maxlength="8" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Código de trámite" aria-label="Comtraseña" name="codtramite" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Consultar</button>
    </div>
    </form>
</div>
<?php include_once __DIR__ . '/layout/footerlogin.php'; ?>

<?php if ($newQuery): ?>
  <div class="detailContainer">
    <div class="infoContainer">

      <div class="infoDetail">
        <h4>Información Básica</h4>
        <div class="inputContainer">
          TRAMITE ID: <span class="tramiteID"><?=$tramiteDetail['tramite_id']?></span>
        </div>
        <div class="inputContainer">
          <span>PAGO ID: <?=$tramiteDetail['pago_cod']?></span>
        </div>
        <div class="inputContainer">
          <span>TIPO TRAMITE: <?=$tramiteDetail['nombre']?></span>
        </div>
        <div class="inputContainer">
          <span>IDIOMA: <?=$tramiteDetail['idioma']?></span>
        </div>
        <div class="inputContainer">
          <span>NOMBRES: <?=$tramiteDetail['nombres']?></span>
        </div>
        <div class="inputContainer">
          <span>APELLIDOS: <?=$tramiteDetail['apellidos']?></span>
        </div>
        <div class="inputContainer">
          <span>OBSERVACIONES: <?=$tramiteDetail['observacion']?></span>
        </div>
      </div>

      <div class="editDetail">

        <h4>Detalles del Tramite</h4 >
        <!-- <form action=""> -->
          <?php
          $repeticiones = 0;
          foreach ($docDetail as $value):?>

            <div class="mb-3">
              <input type="text" class="valoresentrada" placeholder="Nivel" id ="<?=$value[0]?>" aria-label="username" name="doc<?=$value[0]?>" value="<?=$value[1]?>" maxlength="14" required>
            </div>

          <?php
           $repeticiones += 1;
           endforeach?>



          <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" onclick="infoNivel()">Realizar cambios</button>

        <!-- </form> -->
      </div>

    </div>


    <div class="docsContainer">
      <div class="imagenPago">
        <h4>Voucher de Pago</h4>
        <img class="imgVoucher" src="<?=$tramiteDetail['voucher'] ?>" alt="">

        <!-- <form role="form" action="<?= APP_URL . '/view/content/cambiar.php'?>" method="POST" enctype="multipart/form-data" autocapitalize="off" > -->


          <div class="mb-3">
            <input type="file" name="fileVoucher"  id="fileVoucher" class="form-control form-control-lg" aria-label="fileVoucher" required>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" onclick="cambiarVoucher()">Realizar Cambios</button>
          </div>
        <!-- </form> -->

      </div>

      <div class="imagencopia">
        <h4>Copia de DNI</h4>
          <object data="<?=$tramiteDetail['copia']?>" type="application/pdf" class="filedoc">
          <p>
            You don't have a PDF plugin, but you can
            <a href="mypdf.pdf">download the PDF file. </a>
          </p>
        </object>


          <div class="mb-3">
            <input type="file" name="fileDni"  id="fileDni" class="form-control form-control-lg" aria-label="fileDni" id="imagenVoucher"  required>
          </div>

          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"  onclick="cambiarDoc()">Realizar Cambios</button>
          </div>

      </div>


    </div>


  </div>

<?php endif?>


<script>
  function valideKey(evt){

    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;

    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
  }

  // get tramite_id
  const tramiteIdentificador = document.querySelector('.tramiteID').innerText;

  function cambiarVoucher() {
    // cambiar voucher


    // Append the file(s) you want to send to the server
    // formData.append('file', fileDni); // 'file' is the name of the file field on the server

    // Get the file input element from the HTML document
    const fileInput = document.getElementById('fileVoucher');

    if (fileInput.value == '') {
      alert("vacio");
    }
    else {
      const formData = new FormData();
      // Get the selected file
      const file = fileInput.files[0];

      // Append the file to the FormData object
      formData.append('fileVoucher', file);
      // console.log(formData);
      formData.append('variable2', tramiteIdentificador);
      console.dir(fileInput);
      console.log("loko", fileInput.value);

      // Send the FormData object using the Fetch API
      fetch('<?= APP_URL . '/view/cambiar.php'?>', {
        method: 'POST',
        body: formData
        // headers: {
          // 'Content-Type': 'application/json'
        // },
        // body: JSON.stringify(data)
      })
        // .then(response => {
        //   // Handle the server response
        //   if (response.ok) {
        //     console.log('File uploaded successfully');
        //     console.log(response.json());

        //   } else {
        //     console.error('Error uploading file');
        //   }
        // })
        .then(response => response.text())
        .then(data => {
          console.log(data); // Log the response body text

          let fileIn = document.querySelector('.imgVoucher');
          fileIn.src = data;
          console.log(fileIn.src);

        })
        .catch(error => {
          console.error('Error:', error);
        });
    }


  }

  function cambiarDoc() {
    // cambiar voucher

    // Append the file(s) you want to send to the server
    // formData.append('file', fileDni); // 'file' is the name of the file field on the server

    // Get the file input element from the HTML document
    const fileInput = document.getElementById('fileDni');

    if (fileInput.value == '') {
      alert("vacio");
    }
    else {

      const formData = new FormData();
      // Get the selected file
      const file = fileInput.files[0];

      // Append the file to the FormData object
      formData.append('fileDni', file);
      formData.append('variable2', tramiteIdentificador);

      console.dir(fileInput);

      // Send the FormData object using the Fetch API
      fetch('<?= APP_URL . '/view/cambiar.php'?>', {
        method: 'POST',
        body: formData
        // headers: {
          // 'Content-Type': 'application/json'
        // },
        // body: JSON.stringify(data)
      })
        // .then(response => {
        //   // Handle the server response
        //   if (response.ok) {
        //     console.log('File uploaded successfully');
        //     console.log(response.json());

        //   } else {
        //     console.error('Error uploading file');
        //   }
        // })
        .then(response => response.text())
        .then(data => {
          console.log(data); // Log the response body text

          let fileIn = document.querySelector('.filedoc');
          fileIn.data = data;
          // console.log(fileIn.src);

        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

  }

  function valoresVacios(cadena) {

    // let longitudCadena = cadena.length;
    let arr = [];

    for (let index = 0; index < cadena.length; index++) {
      // const element = array[index];
      if (cadena[index] == '' || cadena[index] == ' ') {
        arr.push(0);
      }
      else {
        arr.push(1);
      }

    }

    let estado = arr.some((x) => x==1);
    console.log(arr);
    if (estado) {
      return false;
    }
    else {
      return true;
    }
  }

  function esVacio(nodos) {
    let arr = [];
    nodos.forEach(nodo => {
      console.log("BEBE", nodo.value);
      if (nodo.value == ''  || valoresVacios(nodo.value)) {
        console.log("VACIO", nodo.value.length);
        arr.push(0);
      }
      else {
        console.log("LLENO");
        arr.push(1);
      }

    });

    let empty = arr.some((x) => x == 0);

    if(empty) {
      return true
    }
    else {
      return false;
    }

  }

  function infoNivel() {

    let values = document.querySelectorAll(".valoresentrada");

    // es vacio
    let isEmpty = esVacio(values);
    console.log("BOOLEAN", isEmpty);

    if(isEmpty) {
      alert("Campos vacios");
    }
    else {
      let arrprincipal = [];
      values.forEach(value=> {

        let arr = [];
        arr.push( value.value, tramiteIdentificador, value.id);
        console.log(arr);

        arrprincipal.push(arr);
      });
      console.log(arrprincipal);

      fetch('<?= APP_URL . '/view/editar.php'?>', {
        method: 'POST',
        // body: arrprincipal
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(arrprincipal)
      })
        // .then(response => {
        //   // Handle the server response
        //   if (response.ok) {
        //     console.log('File uploaded successfully');
        //     console.log(response.json());

        //   } else {
        //     console.error('Error uploading file');
        //   }
        // })
        .then(response => response.text())
        .then(data => {
          console.log(data); // Log the response body text



        })
        .catch(error => {
          console.error('Error:', error);
        });
    }



  }





</script>