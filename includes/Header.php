<?php session_start(); ?>

<header>
  <nav class="navbar navbar-expand-sm" style="background-color: #eeeae2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../Img/logo.png" height="100px" width="100px" /></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav gap-5">
          <li class="nav-item ms-4">
            <a class="nav-link" href="../Inicio/Inicio.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Compra/F_compra.php">Compra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Registro/Registro.php">Registro</a>
          </li>
          <li class="ms-5 me-5">
            <input
              class="form-control rounded-pill"
              style="width: 400px"
              type="search"
              placeholder="Buscar"
              aria-label="Search" />
          </li>
          <li class="nav-item ms-5">
            <a class="nav-link" href="../Ini_sesion/logout.php">Cerrar sesión</a>
          </li>


          <?php if (isset($_SESSION['cliente'])): ?>
            <!-- Si el usuario está logueado, muestra su nombre y opción de cerrar sesión -->
            <li class="nav-item">
              <a class="nav-link"><?php echo $_SESSION['cliente']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Ini_sesion/logout.php">Cerrar sesión</a>
            </li>
          <?php else: ?>
            <!-- Si no está logueado, muestra el enlace de iniciar sesión -->
            <li class="nav-item">
              <a class="nav-link" href="../Ini_sesion/entrar.php">Iniciar sesión</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>