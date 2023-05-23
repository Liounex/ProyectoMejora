const appUrl = "http://localhost/proyectomejora";

async function populate() {
  const requestURL =
    appUrl + "/view/notas.json";
  const request = new Request(requestURL);

  const response = await fetch(request);
  const students = await response.json();

  // populateHeader(superHeroes);
  // console.log(students);
  let consulta = students['70202020'];
  console.log(consulta, typeof(consulta));
  // console.log(students['74202093']);
  // console.log(students['74202093']['ingles']);
  // console.log(students['74202093']['ingles']['nivel 2']);
  // console.log(students['74202093']['ingles']['nivel 3']);
  // populateHeroes(superHeroes);

  // const elementos = students['alumnos'];
  // students.forEach(student => {
    

  //   if (student['dni'] == '74202099') {
  //     console.log(student);
  //   }
  // });

}

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

// populate();

const dataContainer = document.querySelector('.info-notas');

async function consultarNota() {

  const valorDNI = document.querySelector("#numeroInput").value;
  // const valorIdioma = document.querySelector("#idiomaInput").value;
  // const nivelIdioma = document.querySelector("#nivelInput").value;

  if (valorDNI ==''){
    alert("Campos vacios");
  }
  else {

  
    const requestURL =
    appUrl + "/view/notas.json";
    const request = new Request(requestURL);

    const response = await fetch(request);
    const students = await response.json();

    // populateHeader(superHeroes);
    // console.log(students);
    let consulta = students[valorDNI];
    // console.log(consulta, typeof(consulta));
    // console.log(consulta, typeof(consulta['cursos']));
    console.log("BB", consulta, typeof(consulta), typeof(consulta) == 'undefined');
    // console.log(consulta);

    if (typeof(consulta)!='undefined') {
      console.log("pepe");
      console.log(consulta['cursos']);

      // let dniUser = valorDNI;
      let fullname = consulta['nombres'] + " "+ consulta['apellidos'];
      let cursos = consulta['cursos'];

      dataContainer.innerHTML = "";
      cursos.forEach(curso => {
        console.log(valorDNI, fullname, curso['idioma'], curso['nivel'],curso['nota']);

        dataContainer.innerHTML += `<tr> <th scope='row'>${valorDNI} </th> <td>${fullname} </td> <td>${curso['idioma']}</td> <td>${curso['nivel']}</td> <td>${curso['nota']}</td></tr>`;
      });


    }
    else {
      dataContainer.innerHTML = "<td colspan='5' style='text-align: center;'>Registro Vacio</td>";
    }


  

  
  }

}


