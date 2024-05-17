/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */

//
// Scripts
//
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

function previewImage(event, querySelector) {
  //Recuperamos el input que desencadeno la acción
  const input = event.target;

  //Recuperamos la etiqueta img donde cargaremos la imagen
  $imgPreview = document.querySelector(querySelector);

  // Verificamos si existe una imagen seleccionada
  if (!input.files.length) return;

  //Recuperamos el archivo subido
  file = input.files[0];

  //Creamos la url
  objectURL = URL.createObjectURL(file);

  //Modificamos el atributo src de la etiqueta img
  $imgPreview.src = objectURL;
}

function mostrarActivo() {
  const url = document.getElementById("url");
  const documento = document.getElementById("documento");
  if (url.checked) {
    document.getElementById("file-input").classList.add("d-none");
    document.getElementById("url-input").classList.add("d-block");
    document.getElementById("url-input").classList.remove("d-none");
  } else if (documento.checked) {
    document.getElementById("url-input").classList.add("d-none");
    document.getElementById("file-input").classList.add("d-block");
    document.getElementById("file-input").classList.remove("d-none");
  }
}

function mostrarActivo2() {
  const url = document.getElementById("url");
  const documento = document.getElementById("documento");
  if (url.checked) {
    document.getElementById("input-archivo").classList.add("d-none");
    document.getElementById("link-video").classList.add("d-flex");
    document.getElementById("link-video").classList.remove("d-none");
  } else if (documento.checked) {
    document.getElementById("input-archivo").classList.remove("d-none");
    document.getElementById("input-archivo").classList.add("d-flex");
    document.getElementById("link-video").classList.add("d-none");
  }
}

function previewImageDocs(event, querySelector) {
  //Recuperamos el input que desencadeno la acción
  const input = event.target;

  //Recuperamos la etiqueta img donde cargaremos la imagen
  $imgPreview = document.querySelector(querySelector);

  // Verificamos si existe una imagen seleccionada
  if (!input.files.length) return;

  //Recuperamos el archivo subido
  file = input.files[0];

  //Creamos la url
  objectURL = URL.createObjectURL(file);

  //Modificamos el atributo src de la etiqueta img
  $imgPreview.src = objectURL;
}
