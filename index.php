<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
    integrity="sha512-NZCf0L2aVGRiFW/XR0X9st8YzmMv7vHwqon5r5rzhUNlO/Tgdy/4G22l3LxH2OzNfDgYOKhcSihIpg24OvJ0dA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"
    integrity="sha512-2cc7Vwfuw07US+13vZ8bLcRi9ZxHx1FtKNp8YgP/m5a3HtNCgIvE8NIVW9C9N/HlhOjNHCOv+8kNSYr5r5q3zA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/Index.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Subcomite de Etica y de Prevencion de Conflictos de Interes</title>
    <link rel="icon" href="img/logo-SEPCI.png" />
    <link rel="shortcut icon" href="img/logo-SEPCI.jpg" type="image/x-icon" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <section class="Main_header">
        <header>
            <img src="img/logoEducacion.png" class="img1" />
            <img src="img/Logo-TecNM.png" class="img2" />
            <img src="img/logo-Itmorelia.png" class="img3" />
            <img src="img/logo-SEPCI.png" alt="sepci" class="img4" />
        </header>
        <header class="Menu">
            <div class="contenedor_menu">
                <nav>
                    <a class="active" href="index.php">Inicio</a>
                    <a href="Capacitate.php">Capacitate</a>
                    <a href="Documentos.php">Documentos</a>
                    <a href="Buzon-de-atencion.html">Buzón de Atención</a>
                    <a href="Contacto.html">Contacto</a>
                </nav>
            </div>
        </header>
    </section>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php
            include_once 'php/DBManager/endPointSlider.php';
            while ($row = $data->fetch_assoc()) {
                ?>
            <div class="carousel-item active">
                <img src="<?php echo 'img/Carrusel/' . $row['root_sliderImage']; ?>" class="d-block w-100" alt="..." />
            </div>
            <?php
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="titulo">
        <h2>Subcomite de Etica y de Prevencion de Conflictos de Interes</h2>
    </div>

    <div class="qsomos">
        <div class="qsomos_text">
            <h3>¿Quienes somos?</h3>
            <div class="sub"></div>
            <div class="qsomos_info">
                <?php
                include_once 'php/DBManager/endPointAboutUs.php';
                $row = $data->fetch_row();
                echo $row[1];
                ?>
            </div>
            <div class="qsomos_boton">
                <a href="<?php echo 'pdf/About Us/' . $row[2]; ?>" target="_blank">Ver Mas</a>
            </div>
        </div>
        <div class="qsomos_img">
            <img src="img/logo-SEPCI.png" alt="" />
        </div>
    </div>
    <div class="titulo">
        <h2>Directorio de Miembros SEPCI</h2>
    </div>
    <main>
        <div class="miembrosImpr">
            <div class="container1">
                <?php
                include_once 'php/DBManager/endPointMembersFrom.php';
                while ($row = $data->fetch_assoc()) {
                    $color = '';

                    switch ($row['rol']) {
                        case 'Presidencia':
                            $color = '#1b396a'; // Color para 'Precidencia'
                            break;
                        case 'Presidencia (Suplente)':
                            $color = '#1b396a'; // Color para 'Precidencia'
                            break;
                        case 'Persona Asesora':
                            $color = '#be9650'; // Color para 'Persona Asesora'
                            break;
                        case 'Persona Consejera':
                            $color = '#be9650'; // Color para 'Persona Consejera'
                            break;
                        default:
                            $color = '#741731'; // Color predeterminado para miembros
                    }
                    ?>
                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                    data-nombre="<?php echo $row['names'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']; ?>"
                    data-cargo="<?php echo $row['rol']; ?>" data-correo="<?php echo $row['mail']; ?>"
                    data-imagen="<?php echo "img/Integrantes" . "/" . $row["root_image"]; ?> ">

                    <div class="carta" style="background-color: <?php echo $color; ?>;">
                        <br>
                        <img src="<?php echo "img/Integrantes" . "/" . $row["root_image"]; ?>" alt="">
                        <br>
                        <div class="Nombres">
                            <h3>
                                <?php echo $row['names'];
                                    echo ' ';
                                    echo $row['middle_name'];
                                    echo ' ';
                                    echo $row['last_name']; ?>
                            </h3>
                        </div>
                        <div class="Nombres2">
                            <h5>
                                <?php echo $row['rol']; ?>
                            </h5>
                        </div>
                    </div>
                </a>

                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <div class="titulo">
        <h2>DOCUMENTOS DEL SEPCI</h2>
    </div>

    <div class="contenedor_pdftodo d-flex ">
        <?php
        include_once 'php/DBManager/endPointDocuments.php';
        while ($row = $data->fetch_assoc()) {
            ?>
        <div class="contenedor-pdfs">
            <a href="<?php echo 'pdf/Inicio/' . $row['root']; ?>" class="pdf" target="_blank">
                <img src="img/pdf.png" alt="PDF 1">
                <h3>
                    <?php echo $row['name']; ?>
                </h3>
            </a>
        </div>
        <?php
        }
        ?>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="text">
                <p>
                    <strong>Contacto</strong> <br />Email: <br />
                    cero.tolerancia@itmorelia.edu.mx
                    <br />
                    <br />
                    <strong>Dirección:</strong>
                    <br />
                    Av Morelos Nte 2550, Santiaguito, <br />
                    58110 Morelia, Mich.
                </p>
            </div>
            <div class="text">
                <p>
                    <strong>Enlaces</strong><br />
                    <a href="index.php">Inicio</a><br />
                    <a href="Capacitate.php">Capacitate</a><br />
                    <a href="Documentos.php">Documentos</a><br />
                    <a href="Buzon-de-atencion.html">Buzón de Atención</a><br />
                    <a href="Contacto.html">Contacto</a><br />
                </p>
            </div>
            <div class="contenedor__contac">
                <iframe
                    src="https://maps.google.com/maps?q=Instituto Tecnológico de Morelia&t=&z=16&ie=UTF8&iwloc=&output=embed"
                    width="600" height="200" style="border: 0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div class="texto">
            <p>
                &copy; Copyright 2023 TecNM Campus Morelia - Todos los Derechos
                Reservados
            </p>
        </div>
    </footer>
</body>

<!-- Ventana Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ventana emergente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <img class="imagen-recuadrov" src="img/Omar Aguilar Garcia.jpg" alt="Director">
                    </div>
                </div>
                <br>
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <p id="nombre"></p>
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo:</label>
                        <p id="cargo"></p>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo:</label>
                        <p id="correo"></p>
                    </div>
                    <div class="mb-3">
                        <label for="funcion" class="form-label">Funcion que Ejerce:</label>
                        <div class="button_funcion">
                            <a href="#" id="redireccionarBtn" target="_blank">Función</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>