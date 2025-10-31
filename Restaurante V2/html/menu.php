<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=  , initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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


 <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-bottom">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#section1">Entradas</a></li>
        <li class="nav-item"><a class="nav-link" href="#section2">Postres</a></li>
        <li class="nav-item"><a class="nav-link" href="#section3">Platos principales</a></li>
        <li class="nav-item"><a class="nav-link" href="#section4">Bebidas</a></li>
      </ul>
    </div>
  </div>
</nav>

  
<div class="container mt-3 container2-items">
  <div class="row">
    <H1 class="titu">Entradas</H1>
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
    <!-- Tarjeta 1 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/flautas-transformed.jpeg" alt="Ensaladas" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Flautas.</h2>
            <p class="price">$12</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/comida-mexicana.jpg" alt="Hamburguesa" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Bandeja mexicana</h2>
            <p class="price">$24</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 3 -->
     
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/images.jpg" alt="Pollo" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
          <h2 class="h5">Perrito</h2>
          <p class="price">$34</p>
          <button class="brn btn-add-cart">Añadir al carrito</button>
        </div>
      </div>
      </div>
    </div>
    <h1 class="titu">Postres</h1>
    <!-- Tarjeta 1 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre1.jpg" alt="Ensaladas" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Flan cholate.</h2>
            <p class="price">$12</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre2.jpg" alt="Hamburguesa" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Fresitas Chocolatosas.</h2>
            <p class="price">$24</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 3 -->
     
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre3.jpg" alt="Pollo" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
          <h2 class="h5">Flan maracuya.</h2>
          <p class="price">$34</p>
          <button class="brn btn-add-cart">Añadir al carrito</button>
        </div>
      </div>
      </div>
    </div>
    <!-- Tarjeta 1 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre4.jpg" alt="Ensaladas" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Torta de chocolate.</h2>
            <p class="price">$12</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre5.jpg" alt="Hamburguesa" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
            <h2 class="h5">Helados</h2>
            <p class="price">$24</p>
            <button class="brn btn-add-cart">Añadir al carrito</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta 3 -->
     
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <img class="card-img-top" src="../img/postre6.jpg" alt="Pollo" style="height: 350px; object-fit: cover;">
        <div class="card-body text-center">
          <div class="info-product">
          <h2 class="h5">Malvavisco chocolate</h2>
          <p class="price">$34</p>
          <button class="brn btn-add-cart">Añadir al carrito</button>
        </div>
      </div>
      </div>
    </div>
    
  </div>
</div>
    
  
     
<!-- inicio footer -->
</div>
</div>
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