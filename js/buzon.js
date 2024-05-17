var dropzone = document.getElementById("dropzone");

dropzone.addEventListener("dragover", function (e) {
  e.preventDefault();
  dropzone.classList.add("dragover");
});

dropzone.addEventListener("dragleave", function (e) {
  e.preventDefault();
  dropzone.classList.remove("dragover");
});

dropzone.addEventListener("drop", function (e) {
  e.preventDefault();
  dropzone.classList.remove("dragover");
  var files = e.dataTransfer.files;
  // procesa los archivos subidos
});

// bloquear celda 
function bloquearCelda() {
  var checkbox = document.getElementById("bloquear");
  var celdaTexto = document.getElementById("celdaTexto");
  var celdaTexto2 = document.getElementById("celdaTexto2");
  
  if (checkbox.checked) {
    celdaTexto.disabled = true;
    celdaTexto2.disabled = true;
    celdaTexto.style.backgroundColor = '#e5e5e5';
    celdaTexto2.style.backgroundColor = '#e5e5e5';
  } else {
    celdaTexto.disabled = false;
    celdaTexto2.disabled = false;
    celdaTexto.style.backgroundColor = '';
    celdaTexto2.style.backgroundColor = '';
  }
}

