<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=  , initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline:opsz,wght@10..72,100..900&display=swap');
  </style>
</head>
<title>Retaurante don pollo</title>

<body>

  <!--barra de navegacion-->

 <?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    
    <!-- Usuario y logout a la izquierda -->
    <?php if ($usuario): ?>
      <div class="d-flex align-items-center me-auto">
        <span class="navbar-text text-white me-3">
          Bienvenido, <?= htmlspecialchars($usuario['Nombre']) ?>
        </span>
        <a href="../Controller/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
      </div>
    <?php endif; ?>

    <!-- Marca -->
    <a class="navbar-brand ms-auto" href="#" style="font-size: 30px;">
      Pollo Eats
      <img src="../img/pixelcut-export.jpeg" alt="Logo" style="width: 40px;" class="rounded-pill">
    </a>

    <!-- Botón para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú -->
    <div class="collapse navbar-collapse" id="menuNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="./menu.php">Menú</a></li>
        <li class="nav-item"><a class="nav-link" href="./sobre nosotros.php">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="./indexP.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="./contacto.php">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
        <?php if (!$usuario): ?>
          <li class="nav-item"><a class="nav-link" href="./login.php">Inicio/Registro</a></li>
        <?php endif; ?>
      </ul>
    </div>

  </div>
</nav>


  <!-- fin carrito -->
 

 <!--fin de barra-->



   
<!--  body -->



<div class="container">
      
  <div class="row">
<div class="">
<h3 style="font-family:Big Shoulders Inline, sans-serif; color:red;font-size:80px">POLLITO EATS</h3>
    <p id="slogan"><h3>Sabor que te abraza, momentos que te enamoran</h3></p>

</div>    
<H1>PLATILLO DEL DIA</H1>


<div class="container mt-3 container2-items">
  <div class="row">
    <!-- Tarjeta 1 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/comida.jpg" alt="Ensaladas" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Ensalada de la casa.</h2>
            <p class="price">$12</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/comida2.png" alt="Hamburguesa" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Hamburguesa doble carne</h2>
            <p class="price">$24</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 3 -->
     
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/4f5bf99e-7911-4821-a0e6-c8b8218d729f.jpg" alt="Pollo" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
          <h2 class="h5">Pollo</h2>
          <p class="price">$34</p>
          <button class="brn btn-add-cart">Añadir al carrito</button>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>






    <!-- slider -->
<div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1" ></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2" ></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3" ></button>
   
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
    <img src="../img/restauranteimg.jpg" alt="imagen1" data-bs-interval="2000" class="d-block w-100">
  </div>
  
  <div class="carousel-item">
    <img src="../img/restaurante3.jpg" alt="imagen1" data-bs-interval="2000" class="d-block w-100">
  </div>
  
  <div class="carousel-item">
    <img src="../img/restaurante2.jpg" alt="imagen1" data-bs-interval="2000" class="d-block w-100">
  </div>
  
  <div class="carousel-item">
    <img src="../img/img-20190812-185301-largejpg.jpg" alt="imagen1" data-bs-interval="2000" class="d-block w-100">
  </div>
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
  </button>
</div>





    <!-- fin slide -->
     

<!-- inicio footer -->
<footer class="footer extend text-center ">

 
  <div class="container p-7 my-7 bg-dark text-white">
      <div class="row">
      <div class="col-lg-4 col-md-4">
      <h3>carrera 43 #542 7A</h3>
      <h3>carrera 34 #415 12</h3>
      <h3>carrera 24 #424 3b</h3>
    </div>
      <div class="col-md-6 col-lg-4" id="redes">
      <img src="../img/red1.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red2.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red3.png" alt="" height="30px"><h5>@pollo_restaurant34</h5>
      <img src="../img/red4.jpg" alt="" height="30px"><h5>313151517</h5>
    </div>
   
    <div class="col-md-6 col-lg-4">
    <h4>telefono</h4>
    <h3>Tel:321441515</h3>
    </div>
    
  </div>
   
  </footer>

</body>
<script src="../js/carrito.js"></script>
</html>
