<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="img/logo-SEPCI.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Capacitate</title>


    <!-- CSS -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/Capacitate.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/nav.css" />


    <script src="https://kit.fontawesome.com/12dc2fa4a1.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="Main_header">
        <header>
            <img src="img/logoEducacion.png" class="img1" />
            <img src="img/Logo-TecNM.png" class="img2" />
            <img src="img/logo-Itmorelia.png" class="img3" />
            <img src="img/logo-SEPCI.png" class="img4" />
        </header>
        <header class="Menu">
            <div class="contenedor_menu">
                <nav>
                    <a href="index.php">Inicio</a>
                    <a class="active" href="Capacitate.php">Capacitate</a>
                    <a href="Documentos.php">Documentos</a>
                    <a href="Buzon-de-atencion.html">Buzón de Atención</a>
                    <a href="Contacto.html">Contacto</a>
                </nav>
            </div>
        </header>
    </section>

    <div class="cursos">
        <h1>CURSOS SUGERIDOS</h1>
    </div>
    <div class="curso">
        <?php 
          include_once 'php/DBManager/endPointEachCourses.php';
          while ($row = $data->fetch_assoc()) {
        ?>

        <div class="curso_info">
            <div class="imagen">
                <img src="../../pdf/Courses/<?php echo $row['root_course']; ?>" />
            </div>
            <div class="curso_desc">
                <h2><?php echo $row['course_name'] ?></h2>
                <h3>Descripcion</h3>
                <p>
                    <?php echo $row['course_descrip'] ?>
                </p>
                <?php 
                    if($row['tipo'] == 'document'){
                
                ?>
                <a href="<?php echo 'pdf/Courses/'.$row['contenido']?>" class="btn" target="_blank">Ver mas</a>
                <?php 
                    }else{

                ?>
                <a href="<?php echo $row['contenido'] ?>" class="btn" target="_blank">Ver mas</a>
                <?php

                    }
                ?>
            </div>
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

</html>