<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once '../Includes/Header.php' ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario de Compra</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
</head>

<body>
  <div class="container mt-5 mb-5">
    <form>
      <div class="row justify-content-center">
        <div class="col-8 card shadow">
          <div class="card-header text-center">
            <h4>Realizar Compra</h4>
          </div>
          <div class="card-body">
            <div class="form-floating mb-4">
              <select
                class="form-select"
                id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Selecciona el producto</option>
                <option value="1">IPhone 14</option>
                <option value="2">Mouse Gamer</option>
                <option value="3">Mochila de viaje</option>
              </select>
              <label for="floatingSelect">Producto</label>
            </div>
            <div class="form-floating mb-4">
              <input
                type="text"
                class="form-control"
                placeholder="Seleccione el producto"
                id="floatingInput" />
              <label for="floatingInput">Cantidad de Producto</label>
            </div>
            <div class="form-floating mb-4">
              <input
                type="text"
                class="form-control"
                placeholder="Seleccione el producto"
                id="floatingInput" />
              <label for="floatingInput">Medio de pago</label>
            </div>
            <div class="form-floating mb-4">
              <input
                type="text"
                class="form-control"
                placeholder="Seleccione el producto"
                id="floatingInput" />
              <label for="floatingInput">Dirección de envío</label>
            </div>
            <div class="mb-4">
              <button type="button" class="btn btn-outline-primary w-25">
                Comprar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</body>
<?php require_once '../Includes/Footer.php' ?>

</html>