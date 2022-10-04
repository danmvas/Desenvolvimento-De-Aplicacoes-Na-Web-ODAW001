//função que verifica se o formulário está preenchido corretamente
var button = document.getElementById("savechang");
async function save() {
  campos = inputVerify();

  if (campos == null) {
    alert("Todos os inputs estão corretos!");
  } else {
    alert("Verifique seus inputs!");
    campos.forEach((element) => {
      document.getElementById(element).classList.add("campoErrado");
    });
  }
}
button.addEventListener("click", save);

function inputVerify() {
  var camposIncorretos = [];

  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var day = document.getElementById("day").value;
  var month = document.getElementById("month").value;

  var mailRegex = /^[a-zA-Z0-9.-_]+@[a-zA-Z]+(?:.[a-zA-Z]+)$/;
  // var phoneRegex = /[(]^[0-9][)]+@[0-9][-]^[0-9]$/;

  if (firstName.length === 0) {
    camposIncorretos.push("firstName");
  }
  if (lastName.length === 0) {
    camposIncorretos.push("lastName");
  }
  if (!mailRegex.test(email)) {
    camposIncorretos.push("email");
  }
  // if (!phoneRegex.test(phone)) {
  //   camposIncorretos.push("phone");
  // }
  if (month === "February") {
    if (day === 30 || day === 31) {
      camposIncorretos.push("month");
    }
  }
  if (
    month === "April" ||
    month === "June" ||
    month === "September" ||
    month === "November"
  ) {
    if (day === 31) {
      camposIncorretos.push("day");
    }
  }

  console.log(camposIncorretos);
  if (camposIncorretos.length != 0) {
    return camposIncorretos;
  } else return null;
}

//----------------------------------------------

const masks = {
  phone(value) {
    return value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "($1) $2")
      .replace(/(\d{4})(\d)/, "$1-$2")
      .replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3")
      .replace(/(-\d{4})\d+?$/, "$1");
  },
};

document.querySelectorAll("input").forEach(($input) => {
  const field = $input.dataset.js;

  $input.addEventListener(
    "input",
    (e) => {
      e.target.value = masks[field](e.target.value);
    },
    false
  );
});
//----------------------------------------------
