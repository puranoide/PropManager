const formAddPost = document.getElementById("loginForm");
const horariosSeleccionados = {};
formAddPost.addEventListener("submit", function (event) {
    event.preventDefault();
    console.log("submit");
    const formData = new FormData(this);
    objetoRegistro = {};
    const inputs = document.querySelectorAll(
        "#loginForm input"
    );
    inputs.forEach((input) => {
        console.log(input.name, input.value);
        objetoRegistro[input.name] = input.value;
    });

    login(formData.get("email"), formData.get("password"),);
});

function login(email, password) {
    fetch("controller/auth.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ "action": "login", email, password }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                console.log("respuesta exitosa,sesion creada");
                console.log("respuesta :", data);
                validarestadousuario(data);
            } else {
                console.log("login fallido");
                alert(data.message);
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

function togglePasswordVisibility() {
    const inputpass = document.getElementById("password");
    if (inputpass.type == "password") {
        inputpass.type = "text";
    } else {
        inputpass.type = "password";
    }
}

function validarestadousuario(data) {
    if (data.usuario.estadousuariofk == 1) {
        console.log("usuario activo");
        redireccion(data.usuario.tipoUsuariofk);
    } else {
        console.log("usuario inactivo");
    }

}

function redireccion(tipodeusuario) {
    if (tipodeusuario == 1) {
        console.log("gestor");
        window.location.href = "app/gestor/index.php";
    } else {
        window.location.href = "app/inquilino/index.php";
        console.log("inquilino");
    }

}