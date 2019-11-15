<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ORUS </title>

  <link rel="stylesheet" type="text/css" href="res/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="res/lib/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="res/lib/fontawesome/css/all.min.css">
  <script src="res/lib/jquery/jquery.min.js"></script>

</head>
<body >


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
<!--  <a class="navbar-brand" href="./">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./"><i class="fa fa-home"></i> Inicio</a>
      </li>
<?php
$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-th-list"></i> Categorias
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php foreach($cats as $cat):?>
          <a class="dropdown-item" href="index.php?view= empleos&cat=<?php echo $cat->short_name; ?>"><?php echo $cat->name; ?></a>
<?php endforeach; ?>
        </div>
      </li>
    <?php endif; ?>



      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> Mi cuenta
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if(isset($_SESSION["client_id"])):?>
          <a class="dropdown-item" href="index.php?view=client">Mi cuenta</a>
          <a class="dropdown-item" href="logout.php">Salir</a>
            <?php else:?>
          <a class="dropdown-item" href="index.php?view=clientaccess">Iniciar sesion</a>
          <a class="dropdown-item" href="index.php?view=register">Registro</a>
        <?php endif; ?>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
<input type="hidden" name="view" value=" empleos">
<input type="hidden" name="act" value="search">

      <input class="form-control mr-sm-2" name="q" type="search" placeholder="Buscar ..." aria-label="Buscar ...">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
&nbsp;
<a href="index.php?view=mycart" class="btn  btn-primary my-2 my-sm-0"><i class="fas fa-briefcase"></i>
<?php if(isset($_SESSION["cart"])):?>
<span class="badge"><?php echo count($_SESSION["cart"]); ?></span>
<?php endif; ?>
      </a>


    </form>
  </div>
</div>
</nav>



<br>
<?php View::load("index"); ?>
<br><br><br>
<section>
<div class="container">

<!-- - - - -->
<div class="row">
<div class="col-md-12">


</div>
</div>
</div>
</section>
<br>
  <script src="res/lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
  $(".tip").tooltip();
  </script>
</body>
</html>
