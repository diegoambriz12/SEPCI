$(document).ready(function () {
  $('#myModal').on('show.bs.modal', function (event) {
    var enlace = $(event.relatedTarget); // Enlace que activó la ventana modal
    var nombre = enlace.data('nombre');
    var cargo = enlace.data('cargo');
    var correo = enlace.data('correo');
    var imagen = enlace.data('imagen'); // Nueva línea para obtener la ruta de la imagen

    var modal = $(this);
    modal.find('#nombre').text(nombre);
    modal.find('#cargo').text(cargo);
    modal.find('#correo').text(correo);
    // Actualiza el atributo src de la imagen en la ventana modal
    modal.find('.imagen-recuadrov').attr('src', imagen);

    // Agrega un manejador de eventos para el botón de redirección // FuncionAsesora
    modal.find('#redireccionarBtn').on('click', function () {
      // Redirigir según el rol
      if (cargo === "Presidencia" || cargo === "Presidencia (Suplente)") {
        window.location.href = "pdf/Funciones/Precidencia.pdf";
      } else if (cargo === "Miembro Propietario" || cargo === "Miembro (Suplente)") {
        window.location.href = "pdf/Funciones/Miembros.pdf";
      } else if (cargo === "Secretaría Ejecutiva" || cargo === "Secretaría Ejecutiva (Suplente)") {
        window.location.href = "pdf/Funciones/Secretaria Ejecutiva.pdf";
      } else if (cargo === "Secretaría Técnica" || cargo === "Secretaría Técnica (Suplente)") {
        window.location.href = "pdf/Funciones/Secretaria Tecnica.pdf";
      } else if (cargo === "Persona Asesora") {
        window.location.href = "pdf/Funciones/Persona Asesora.pdf";
      } else if (cargo === "Persona Consejera") {
        window.location.href = "pdf/Funciones/Persona Consejera.pdf";
      } else {
        window.location.href = "index.php";
      }
    });
  });
});
