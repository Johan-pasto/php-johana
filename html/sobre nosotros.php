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

<div class="container pt-2 bg-secondary">
  <div class="row">
<div class="col-6"> <img src="../img/no-te-vas-arrepentir.jpg" alt=""></div>
<div class="col-sm-5  text-white textin"> <h1>HISTORIA</h1>Hace más de 10 años, un joven llamado Martín soñaba con hacer algo que revolucionara la comida rápida: ofrecer platos deliciosos y frescos en un tiempo récord, sin sacrificar la calidad. Desde su adolescencia, siempre había disfrutado de la cocina, pero lo que más le fascinaba era la idea de crear algo rápido, accesible y sabroso para todos. Quería demostrar que la comida rápida no tenía por qué ser sinónimo de comida insípida y poco saludable.

  Después de años de trabajar en distintos restaurantes y aprender el arte de combinar sabores, Martín decidió abrir su propio local. <br> <br> Su objetivo era fusionar lo mejor de la comida rápida tradicional con toques modernos, creando una experiencia única para sus clientes. En su menú, combinó sabores locales e internacionales, ofreciendo hamburguesas gourmet, wraps frescos y batidos de frutas naturales que rápidamente se convirtieron en favoritos de los clientes.
  
  Lo que realmente hizo especial a este lugar fue el compromiso con la calidad: ingredientes frescos,<br><br> pan recién horneado cada mañana y la promesa de servir cada plato en menos de 10 minutos. La idea era sencilla pero poderosa: rapidez, calidad y sabor en un solo lugar.
  
  Con el paso de los años, el restaurante se convirtió en un punto de encuentro para aquellos que buscaban una comida deliciosa y accesible. Miles de personas pasaron por sus puertas, disfrutando de su comida en el local o llevándola a casa para compartirla con sus seres queridos. El sueño de Martín creció, pero su visión seguía siendo la misma: brindar una experiencia rápida, deliciosa y de calidad para todos.</div>


  </div>
  <div class="container-fluid pt-5">
    <div class="row">
      <div class="col"> <img src="../img/restaurante entrada.jpg" alt="" style="height: 200px;width: 408px;"></div>
      <div class="col"><img src="../img/entrada-restaurante-los-amigos.jpg" alt="" style="height: 200px;width: 408px;"></div>
    </div>
  
    <div class="row">
      <div class="col-4"><h3 class="bg-primary text-white" style="border:5px solid black ;">carrera 151 #61b-Bogotá</h3> </div>
      <div class="col-2"></div>
      <div class="col-4"><h3 class="bg-primary text-white" style="border:5px solid black ;"">carrera 242 #44a-Bogotá</h3></div>
    </div>
  
  </div>
</div>
   
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
</html>