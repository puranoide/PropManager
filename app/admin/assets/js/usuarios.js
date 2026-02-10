// --- DATOS INICIALES (Simulando JSON de Backend) ---
const urlbackend = "controller/";
var usersBackend = [];
function getAllUsers() {
    fetch(urlbackend + "usuarios.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "getAllUsers",
        }),
    })
        .then((response) => response.json())
        .then((result) => {

            if (result.error) {
                console.error(result.error);
                return;
            }
            //limpiar el array
            usersBackend = [];
            usersBackend = result.usuarios;
            loadUsers(usersBackend);
            //console.log(usersBackend);
            // Inicializar vista
            //updateDisplay();
            // Inicializar
            //renderRequests();

        })
        .catch((error) => {
            console.error("Error al listar registros:", error);
        });
}

function submitNewUser(user) {
    console.log(user);
    fetch(urlbackend + "usuarios.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "submitNewUser",
            ...user
        }),
    })
        .then((response) => response.json())
        .then((result) => {

            if (result.error) {
                console.error(result.error);
                return;
            }
            //limpiar el array
            /*usersBackend = [];
            usersBackend = result.usuarios;
            console.log(usersBackend);*/
            // Inicializar vista
            //updateDisplay();
            // Inicializar
            //renderRequests();
            alert("Usuario creado exitosamente");
            location.reload();
        })
        .catch((error) => {
            console.error("Error al listar registros:", error);
        });
}

function submitNewUser(iduser) {
    console.log(user);
    fetch(urlbackend + "usuarios.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "updatstatus",
            id:iduser
        }),
    })
        .then((response) => response.json())
        .then((result) => {

            if (result.error) {
                console.error(result.error);
                return;
            }
            //limpiar el array
            /*usersBackend = [];
            usersBackend = result.usuarios;
            console.log(usersBackend);*/
            // Inicializar vista
            //updateDisplay();
            // Inicializar
            //renderRequests();
            alert("Usuario creado exitosamente");
            location.reload();
        })
        .catch((error) => {
            console.error("Error al listar registros:", error);
        });
}

let usersData = [
    { id: 1, name: "Carlos Ruiz", email: "carlos@example.com", role: "Administrador", status: "Activo" },
    { id: 2, name: "Ana Martínez", email: "ana.m@example.com", role: "Editor", status: "Activo" },
    { id: 3, name: "Roberto Gómez", email: "robert@example.com", role: "Usuario", status: "Inactivo" }
];

// --- FUNCIONES DE CARGA ---
function updateStats() {
    document.getElementById('usersCount').innerText = usersBackend.length;
    document.getElementById('activeCount').innerText = usersBackend.filter(u => u.estado === 1).length;
    document.getElementById('adminCount').innerText = usersBackend.filter(u => u.rol_id === 1).length;
}

function loadUsers(users) {
    const tableBody = document.getElementById('usersTableBody');

    tableBody.innerHTML = users.map(u => {
        const initials = u.nombre_completo.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        return `
                <tr class="hover:bg-indigo-50/30 transition group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs">
                                ${initials}
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">${u.nombre_completo}</p>
                                <p class="text-xs text-gray-500">${u.email}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded">${u.rol_id===1?'Administrador':u.rol_id===2?'gestor':'Usuario'}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold ${u.estado === 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
            }">
                            <i class="fas fa-circle text-[6px]"></i> ${u.estado===1?'Activo':'Inactivo'}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button onclick="deleteUser(${u.id})" class="p-2 text-gray-400 hover:text-red-600 transition">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;
    }).join('');
    updateStats();
}

// --- LÓGICA DEL MODAL Y FORMULARIO ---
function toggleModal() {
    const modal = document.getElementById('userModal');
    modal.classList.toggle('hidden');
}

document.getElementById('newUserForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const newUser = {
        //id: Date.now(), // ID temporal único
        name: document.getElementById('userName').value,
        email: document.getElementById('userEmail').value,
        role: document.getElementById('userRole').value,
        status: document.getElementById('userStatus').value
    };

    // Enviar el nuevo usuario al backend
    submitNewUser(newUser);

    //usersData.unshift(newUser); // Agregar al inicio
    //loadUsers();
    //toggleModal();
    //this.reset();
});

function deleteUser(id) {
    if (confirm('¿Estás seguro de eliminar este usuario?')) {
        
        //loadUsers();
    }
}

// Inicializar al cargar la página
window.addEventListener("load", function () {
    getAllUsers();
});
