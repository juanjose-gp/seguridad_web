// ValidacionesR.js
// Definir la regla personalizada primero
$.validator.addMethod("passwordStrength", function(value, element) {
  return this.optional(element) || /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+={}\[\]:;"'<>,.?/\\|`~]).+$/.test(value);
}, "La contraseña debe contener al menos una letra, un número y un carácter especial.");


$.validator.addMethod("maxDateToday", function(value, element) {
    const today = new Date().toISOString().split('T')[0];
    return value <= today;
}, "La fecha de nacimiento no puede ser mayor a la fecha actual");

// Configurar jQuery Validation
// $.validator.setDefaults({
//   // submitHandler: function () {
//   //   alert("submitted!");
//   // },
// });

$(document).ready(function () { 
  $("#signupForm").validate({
    rules: { 
      nombre_completo: {
        required: true,
        minlength: 5,
      },
      edad: {
        required: true,
        //=>12
      },
      telefono: {
        required: true,
        minlength: 10,
        maxlength : 15,
      },
      fecha_nacimiento: {
        required: true,
        maxDateToday: true, // <-- Solo true aquí
        //=> 12 años
      },
      contrasena: {
        required: true,
        minlength: 8,
        passwordStrength: true, // <-- Aquí se aplica la regla personalizada
      },
      repetir_contrasena: {
        required: true,
        minlength: 8,
        passwordStrength: true, // <-- Aquí se aplica la regla personalizada
        equalTo: "#contrasena",
        
      },
      correo: {
        required: true,
        email: true,
      },
      
    },
    messages: {
      nombre_completo: {
        required: "Por favor ingresa tu nombre completo",
        minlength: "Tu nombre debe ser de no menos de 5 caracteres",
      },
      edad: {
        required: "Por favor ingresa tu edad",
      },
      telefono: {
        required: "Por favor ingresa tu número de teléfono",
        minlength: "Tu número de teléfono debe ser de no menos de 10 caracteres",
        maxlength: " tu número no puede pasar de 15 caracteres "
      },
      fecha_nacimiento: {
        required: "Por favor ingresa tu fecha de nacimiento",
        maxDateToday: "La fecha de nacimiento no puede ser mayor a la fecha actual",
      },
      contrasena: {
        required: "Por favor ingresa una contraseña",
        minlength: "Tu contraseña debe ser de no menos de 8 caracteres de longitud",
        passwordStrength: "La contraseña debe contener al menos una letra, un número y un carácter especial.",
      },
      repetir_contrasena: {
        required: "Ingresa otra vez tu contraseña",
        minlength: "Tu contraseña debe ser de no menos de 8 caracteres de longitud",
        passwordStrength: "La contraseña debe contener al menos una letra, un número y un carácter especial.",
        equalTo: "Por favor ingresa la misma contraseña de arriba",
      },
      correo: "Por favor ingresa un correo válido",
    },

    errorElement: "em",
    errorPlacement: function (error, element) {
      error.addClass("help-block");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.parent("label"));
      } else {
        error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    },
  });
});
