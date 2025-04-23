document.getElementById("registroForm").addEventListener("submit", (event) => {
  const producto = cleanInput(
    document.querySelector("#id_producto").value.trim()
  );
  const cantidad = cleanInput(
    document.querySelector("#cantidad_producto").value.trim()
  );
  const medio_pago = cleanInput(
    document.querySelector("#medio_pago").value.trim()
  );
  const direccion = document.querySelector("#direccion").value.trim();

  if (!producto || !cantidad || !medio_pago || !direccion) {
    alert("Todos los campos son obligatorios");
    event.preventDefault();
  }
});

function cleanInput(input) {
  return input.replace(/['@\s]/g, "");
}
