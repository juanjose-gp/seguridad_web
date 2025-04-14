# seguridad_web

## 👥 Integrantes del equipo
- Juan José Giraldo Patiño  
- Juan Fernando Grisalez  
- Santiago Marín Marín

## 🛒 Ecommerce con validaciones de seguridad en los formularios

Este sitio web está conformado por dos formularios, ambos con validaciones y protecciones para evitar ataques de **inyección SQL**.

### 📄 Formulario 1: Registro de usuario
- Nombre  
- Edad  
- Correo  
- Contraseña  
- Confirmar contraseña  
- Teléfono  
- Fecha de cumpleaños

### 📄 Formulario 2: Registro de compra
- Dirección de envío  
- Métodos de pago  
- Producto  
- Cantidad de productos

## 🏠 Página de inicio

La página de inicio mostrará los productos del ecommerce. Cada producto incluirá:

- Imagen  
- Precio  
- Nombre del producto  

Al hacer clic en un producto, se abrirá una **ventana exclusiva** con toda la información detallada. En esa vista el usuario podrá:

- Comprar el producto  
- Volver a la página de inicio  

🔒 **Nota**: El usuario no podrá realizar compras sin estar registrado. Si intenta hacerlo sin haberse registrado previamente, será redirigido automáticamente al formulario de registro.

