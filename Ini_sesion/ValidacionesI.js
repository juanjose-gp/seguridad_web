$(document).ready(function(){
    $('#EnviarForm').validate({
        rules: {
            correo: {
                required: true,
                email: true,
            },
            contrasena: {
                required: true,
                minlength: 8,
              }
        },
        messages: {
            contrasena: {
                required: "Por favor ingresa una contraseña.",
                minlength: "Tu contraseña debe ser de al menos de 8 caracteres.",
              },
            correo: {  
            required: "Por favor ingresa un correo.",
            email: "Por favor ingresa un correo valido.",
            },
        },
        
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
          },
    })
})