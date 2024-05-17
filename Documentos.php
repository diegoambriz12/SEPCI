<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subcomite de Etica y de Prevencion de Conflictos de Interes</title>
    <link rel="shortcut icon" href="img/logo-SEPCI.jpg" type="image/x-icon" />
    <link rel="icon" href="img/logo-SEPCI.png" />
    <link rel="shortcut icon" href="img/logo-SEPCI.jpg" type="image/x-icon" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/documentos.css" />
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
                    <a href="index.php">Inicio</a>
                    <a href="Capacitate.php">Capacitate</a>
                    <a class="active" href="Documentos.php">Documentos</a>
                    <a href="Buzon-de-atencion.html">Buzón de Atención</a>
                    <a href="Contacto.html">Contacto</a>
                </nav>
            </div>
        </header>
    </section>

    <div class="tittle">
        <h1>DOCUMENTOS DEL SEPCI</h1>
    </div>

    <div class="documents_sepci">
        <div class="documents">
            <div class="document">
                <h2 class="document_tittle">
                    Prevención de actuación bajo conflictos de interés
                </h2>
                <img src="img/conflictosInt.png" alt="" />
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal1">
                    Ver Mas
                </button>
            </div>
            <div class="document">
                <h2 class="document_tittle">Mecanismo de denuncias</h2>
                <iframe width="450" height="250" src="https://www.youtube.com/embed/psrKfYIZcnA"
                    title="¿Qué hacer en caso de sufrir Hostigamiento Sexual o Acoso Sexual dentro de la APF?"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal2">
                    Ver Mas
                </button>
            </div>
            <div class="document">
                <h2 class="document_tittle">Valor o principio del mes</h2>
                <img src="img/mes.png" alt="" />
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal3">
                    Ver Mas
                </button>
            </div>
            <div class="document">
                <h2 class="document_tittle">Ética Pública</h2>
                <img src="img/codEtics.png" alt="" />
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal4">
                    Ver Mas
                </button>
            </div>
            <div class="document">
                <h2 class="document_tittle">Declaración Patrimonial</h2>
                <iframe width="450" height="250" src="https://www.youtube.com/embed/IrBOkYeotvs"
                    title="¡Yo ya cumplí! Declaración Patrimonial y de Intereses 2022" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal5">
                    Ver Mas
                </button>
            </div>
            <div class="document">
                <h2 class="document_tittle">Codigo de Conducta</h2>
                <img src="img/logo-SEPCI(recortado).png" alt="" />
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal6">
                    Ver Mas
                </button>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <!-- Prevención de actuación bajo conflictos de interés -->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Prevención de actuación bajo conflictos de interés
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionOne.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mecanismo de Denuncias -->
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Mecanismo de Denuncias
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-body" id="exampleModalLabel">
                        Acoso y Hostigamiento Sexual
                    </h5>
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionTwo-A.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
  ?>
                    </div>
                    <h5 class="modal-body" id="exampleModalLabel">
                        Incumplimiento a las Normas Eticas
                    </h5>
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionTwo-B.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Valor o principio del mes -->
    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Valor o principio del mes
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionThree.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Etica Publica -->
    <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Etica Pública</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-body" id="exampleModalLabel">
                        Codigo de Etica de la Administración Pública Federal
                    </h5>
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionFour-A.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
                          ?>
                        ?>
                    </div>
                    <h5 class="modal-body" id="exampleModalLabel">
                        Codigo de etica de la APF
                    </h5>
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionFour-B.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
                                    
                        ?>
                    </div>
                    <h5 class="modal-body" id="exampleModalLabel">
                        Los principios y valores del servicio publico
                    </h5>
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionFour-C.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
                                    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Declaracion patrimonial -->
    <div class="modal fade" id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Declaracion Patrimonial
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionFive.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
                                    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Codigo de conducta -->
    <div class="modal fade" id="modal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Codigo de conducta
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m_documents">
                        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionSix.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
                        <div class="m_document">

                            <?php
                              if ($row['root'] != null) {
                                
                            ?>
                            <img src="img/pdf.png" alt="" />
                            <a href="pdf/Documents/<?php echo $row['root'] ?>"
                                target="_blank"><?php echo $row['name'] ?></a>
                            <?php
                                }else{
                            ?>
                            <iframe width="450" height="250"
                                src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                                title="<?php echo $row['name'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                    }
                                    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tittle">
        <h2>MAS DOCUMENTOS</h2>
    </div>

    <div class="m_documents">
        <?php 
                                    include_once '../SEPCI/php/DBManager/selectDocumentsSectionSeven.php';
                                    while ($row = $data->fetch_assoc()) {
                                ?>
        <div class="m_document">

            <?php
                              if ($row['root'] != null) {
                                
                            ?>
            <img src="img/pdf.png" alt="" />
            <a href="pdf/Documents/<?php echo $row['root'] ?>" target="_blank"><?php echo $row['name'] ?></a>
            <?php
                                }else{
                            ?>
            <iframe width="450" height="250" src="https://www.youtube.com/embed/<?php echo $row['video'] ?>"
                title="<?php echo $row['name'] ?>" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <?php
                                }
                            ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>