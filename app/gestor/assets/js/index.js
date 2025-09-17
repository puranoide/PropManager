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
