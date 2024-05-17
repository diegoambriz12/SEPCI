<?php
include("../../php/DBManager/open.php");
if ($sesion) {
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SEPCI</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/DocumentosIndex.css" /> -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">SEPCI</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-8 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../php/DBManager/close.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Denuncias</div>

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"></div>
                            Buzón de denuncias
                        </a>
                        <a class="nav-link" href="complaintAcept.php">
                            <div class="sb-nav-link-icon"></div>
                            Denuncias Aceptadas
                        </a>
                        <a class="nav-link" href="complaintCancel.php">
                            <div class="sb-nav-link-icon"></div>
                            Denuncias Canceladas
                        </a>
                        <div class="sb-sidenav-menu-heading">Inicio</div>
                        <a class="nav-link" href="SliderCRUD.php">
                            <div class="sb-nav-link-icon"></div>
                            Carrusel
                        </a>
                        <a class="nav-link" href="QuienesSomos.php">
                            <div class="sb-nav-link-icon"></div>
                            Editar ¿Quiénes somos?
                        </a>
                        <a class="nav-link" href="Miembros.php">
                            <div class="sb-nav-link-icon"></div>
                            Editar Miembros
                        </a>
                        <a class="nav-link" href="EditarDocumentos.php">
                            <div class="sb-nav-link-icon"></div>
                            Editar Documentos
                        </a>
                        <div class="sb-sidenav-menu-heading">Cursos</div>
                        <a class="nav-link" href="Cursos.php">
                            <div class="sb-nav-link-icon"></div>
                            Editar Cursos
                        </a>
                        <div class="sb-sidenav-menu-heading">Documentos</div>
                        <a class="nav-link" href="Documentos.php">
                            <div class="sb-nav-link-icon"></div>
                            Editar Documentos
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión inicada como:</div>
                    <?php echo $_SESSION['name']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Editar Documentos</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Inicio/Editar Documentos/Editar Documentos</li>
                    </ol>
                    <div class="card mb-4">
                        <h3>Editar documento</h3>
                        <?php 
                        require_once '../../php/DBManager/DBManager.php' ;
                        $db = new DBManager();
                        $data = $db->selectDocName($_REQUEST['idDocument']);
                        $video = $db->selectVideo($_REQUEST['idDocument']);
                        
                        ?>
                        <form action="../../php/DBManager/endPointDocEdit.php"
                            class="d-flex flex-column align-content-center" method="POST" enctype="multipart/form-data"
                            role="form">
                            <div class="d-flex flex-column align-content-center">
                                <div>
                                    <input type="radio" name="tipo" id="url" value="url" onclick="mostrarActivo2()">
                                    <label for="url">Video</label>
                                </div>
                                <div>
                                    <input type="radio" name="tipo" id="documento" value="documento"
                                        onclick="mostrarActivo2()">
                                    <label for="documento">Documento</label>
                                </div>
                                <div class="d-none flex-column" id="input-archivo">
                                    <input type="file" name="archivo" id="file">
                                    <input type="text" placeholder="Nombre" name="titulo" value="<?php echo $data ?>">
                                </div>

                                <div class="d-none flex-column" id="link-video">
                                    <p>Introduzca o edite el link del video</p>
                                    <input type="text" name="video"
                                        value="https://www.youtube.com/watch?v=<?php echo $video  ?>">
                                </div>
                                <input type="hidden" name="idDoc" value="<?php echo $_REQUEST['idDocument'] ?>">
                                <div>
                                    <input type="submit" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
<?php
} else {
    header('Location: ../login.php');
}
?>