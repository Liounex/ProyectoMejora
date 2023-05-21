<style>
  .detailContainer {
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-template-rows: 100vh;

  }
  .detailContainer div {
    /* width: 500px; */
  }
  .detailContainer .docsContainer {
    /* display: flex; */
    /* flex-direction: column; */
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 20px;
    padding: 20px;
  }
  .docsContainer .imagenPago img {
    /* display: block; */
    /* width: 90%; */
    width: 100%;
  }
  .docsContainer .imagencopia object{
    /* width: 80%; */
    width: 100%;
    height: 500px;
  }



</style>

<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once __DIR__ . '/../Controllers/UserControllers.php';

$newQuery = false;
if (isset($_POST['codtramite'])) {
  $user = new UserControllers();
  $arrayURI = $_POST['codtramite'];
  $tramiteDetail = $user->showDetail($arrayURI);

  $newQuery = true;
}


?>

<h4 class="font-weight-bolder">Consultar Trámite</h4>
<p class="mb-0">Ingrese su numero de DNI y código de trámite</p>
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

        <div class="inputContainer">
        TRAMITE ID: <span class="tramiteID"><?=$tramiteDetail['tramite_id']?></span>
        </div>
        <div class="inputContainer">
          <span>PAGO ID: <?=$tramiteDetail['pago_id']?></span>
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


    <div class="docsContainer">
      <div class="imagenPago">
        <h4>Voucher de Pago</h4>
        <img class="imgVoucher" src="<?=$tramiteDetail['voucher'] ?>" alt="">
        
        <!-- <form role="form" action="<?= APP_URL . '/view/content/cambiar.php'?>" method="POST" enctype="multipart/form-data" autocapitalize="off" > -->
          

          <div class="mb-3">
            <input type="file" name="fileVoucher"  id="fileVoucher" class="form-control form-control-lg" aria-label="fileVoucher" required>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" onclick="cambiarVoucher()">Solicitar</button>
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
            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"  onclick="cambiarDoc()">Solicitar</button>
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
    const formData = new FormData();

    // Append the file(s) you want to send to the server
    // formData.append('file', fileDni); // 'file' is the name of the file field on the server

    // Get the file input element from the HTML document
    const fileInput = document.getElementById('fileVoucher');

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

  function cambiarDoc() {
    // cambiar voucher
    const formData = new FormData();

    // Append the file(s) you want to send to the server
    // formData.append('file', fileDni); // 'file' is the name of the file field on the server

    // Get the file input element from the HTML document
    const fileInput = document.getElementById('fileDni');

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

  




</script>