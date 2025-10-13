/*
document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.getElementById("menu-btn");
  const sidebar = document.getElementById("sidebar");

  // Menú lateral
  menuBtn.addEventListener("click", () => {
    sidebar.classList.toggle("active");
  });

  // Cierra sidebar en móvil al elegir opción
  document.querySelectorAll(".sidebar nav a").forEach(link => {
    link.addEventListener("click", () => {
      if (window.innerWidth <= 768) {
        sidebar.classList.remove("active");
      }
    });
  });

  // --- Modal Propiedad ---
  const addPropertyBtn = document.getElementById("addPropertyBtn");
  const propertyModal = document.getElementById("propertyModal");
  const cancelBtn = document.getElementById("cancelBtn");
  const propertyForm = document.getElementById("propertyForm");
  const propertyTableBody = document.getElementById("propertyTableBody");

  addPropertyBtn.addEventListener("click", () => {
    propertyModal.classList.add("active");
  });

  cancelBtn.addEventListener("click", () => {
    propertyModal.classList.remove("active");
  });

  propertyForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const direccion = document.getElementById("direccion").value;
    const precio = document.getElementById("precio").value;
    const estado = document.getElementById("estado").value;

    // Generar ID simple
    const id = "#00" + (propertyTableBody.rows.length + 1);

    // Crear fila nueva
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${id}</td>
      <td>${direccion}</td>
      <td>$${precio}</td>
      <td><span class="status ${estado === "Disponible" ? "available" : "sold"}">${estado}</span></td>
    `;

    propertyTableBody.appendChild(tr);

    // Cerrar modal
    propertyModal.classList.remove("active");
    propertyForm.reset();
  });
});
 */

const iduser = document.getElementById("userId").textContent;

function listarPropiedades(iduser) {
  fetch("controller/inmobiliaria.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ "action": "listarByUser", "iduser": iduser }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        //console.log("respuesta exitosa,sesion creada");
        //console.log("respuesta funcion listarPropiedades :", data);
        mostrarPropiedades(data.edificios);

        console.log("cantidad de propiedades:", conteoPropiedades(data.edificios));
        mostrarConteoEdificios(conteoPropiedades(data.edificios));
      } else {
        console.log("extracion de propiedades fallido");
        alert(data.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
}
function mostrarPropiedades(edificios) {
  console.log(edificios);
  for (let i = 0; i < edificios.length; i++) {
    var tr = document.createElement("tr");
    tr.innerHTML = `
    <td>${edificios[i].id}</td>
    <td>${edificios[i].direccionPropiedad}</td>
    <td><span class="status ${edificios[i].estadopropiedadfk === 1 ? "available" : "sold"}">${edificios[i].estadopropiedadfk === 1 ? "activo" : "inactivo"}</span></td>
    `;
    document.getElementById("propertyTableBody").appendChild(tr);
    tr.onclick = function () {
      //window.location.href = "propiedad.php?id=" + edificios[i].id;
      alert(edificios[i].id);
    }
  }

}
function conteoPropiedades(edificios) {
  return edificios.length;
}
function mostrarConteoEdificios(cantidadEdificios){
  document.getElementById("totalProperties").textContent = cantidadEdificios;
}

listarPropiedades(iduser);
