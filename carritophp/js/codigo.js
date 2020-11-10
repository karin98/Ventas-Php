const nombre = document.getElementById("nombre");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

//le decimos al form cuando se envie la accion submit
form.addEventListener("submit", (e) => {
  //prevenimos todo lo que venga por default
  e.preventDefault();

  //expresiones de js
  let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

  console.log(regexEmail.test(email.value));
  //validamos el email
  if (regexEmail.test(email.value)) {
  }
});
