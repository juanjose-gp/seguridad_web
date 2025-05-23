<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once '../Includes/Header.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error con el Servidor</title>
    
    <link  
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous" />

  </head>
  <body class="min-height: 100vh">
      
      <div class="container mt-4 mb-4">
          <div class="row center">
              <div class="col-md-6 offset-md-3">
                  <div class="card card-body shadow">
                      <div class="card-image">
                          <img src="https://media1.tenor.com/m/e0ZdPg8XHukAAAAd/stress-panda.gif" class="img-fluid mx-auto mb-3" alt="Bambueno presentó error en el servidor">
                      </div>
                      <div class="mb-2">
                          <h5 class="card-title text-center">¡Uy, hubo un error en el Servidor!</h5>
                          <p class="card-text mb-2">El servidor no respondió, lo sentimos mucho</p>
                      </div>
                      <div class="card-footer text-center">
                          <a class="btn btn-outline-primary" href="../Registro/Registro.php">Intentar de nuevo</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      
      <?php require_once '../Includes/Footer.html' ?>
  </body>
</html>