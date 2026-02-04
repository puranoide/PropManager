<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inmuebles - PropManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-slate-800">
                <span class="text-blue-400">Prop</span>Manager
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="index.php" class="flex items-center p-3 bg-blue-600 rounded-lg"><i class="fas fa-chart-line mr-3"></i> Dashboard</a>
                <a href="inmuebles.php" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-building mr-3"></i> Inmuebles</a>
                <a href="mailinginquilinos.php" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-envelope mr-1"></i> Mailing</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 z-20">
                <div class="flex items-center gap-4">
                    <!--
                    <label class="font-medium text-gray-600 italic">Vista:</label>
                    <select id="propertyFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none">
                        <option value="all">General (Todos)</option>
                        <option value="1">Residencial Los Olivos</option>
                        <option value="2">Torre Ejecutiva Central</option>
                    </select>
                    -->
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-gray-700" id="userName">Admin User</p>
                            <p class="text-xs text-gray-500">Administrador</p>
                        </div>
                        <img class="w-10 h-10 rounded-full border-2 border-blue-500 p-0.5" src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Perfil">
                    </button>
                    <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl border hidden group-focus-within:block animate-in fade-in slide-in-from-top-2 duration-200">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user-circle mr-2 text-blue-500"></i> Mi Perfil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-cog mr-2 text-blue-500"></i> Configuración</a>
                        <hr class="my-1">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Mis Inmuebles</h1>
                        <p class="text-gray-500">Administra y supervisa tus propiedades registradas.</p>
                    </div>
                    
                    <div class="flex gap-3">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fas fa-search text-gray-400"></i>
                            </span>
                            <input type="text" id="searchInput" onkeyup="filterInmuebles()" 
                                class="pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none w-64 shadow-sm" 
                                placeholder="Buscar por nombre...">
                        </div>
                        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition shadow-md">
                            <i class="fas fa-plus"></i> Nuevo Inmueble
                        </button>
                    </div>
                </div>

                <div id="inmueblesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    </div>
            </main>
        </div>
    </div>

    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-in fade-in zoom-in duration-200">
            <div class="bg-blue-600 px-6 py-4 flex justify-between items-center text-white">
                <h3 class="font-bold text-lg">Registrar Nuevo Inmueble</h3>
                <button onclick="closeModal('createModal')" class="text-white opacity-70 hover:opacity-100 text-2xl">&times;</button>
            </div>
            <form id="createForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Inmueble</label>
                    <input type="text" id="addNombre" required class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input type="text" id="addDireccion" required class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                        <select id="addEstado" class="w-full border p-2 rounded-lg outline-none cursor-pointer">
                            <option value="Disponible">Disponible</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Precio sugerido</label>
                        <input type="number" id="addPrecio" required class="w-full border p-2 rounded-lg outline-none">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal('createModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md">Guardar Inmueble</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="bg-gray-100 px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-gray-700 text-lg">Editar Inmueble</h3>
                <button onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            <form id="editForm" class="p-6 space-y-4">
                <input type="hidden" id="editId">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" id="editNombre" class="w-full border p-2 rounded-lg focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input type="text" id="editDireccion" class="w-full border p-2 rounded-lg focus:ring-blue-500 outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                        <select id="editEstado" class="w-full border p-2 rounded-lg">
                            <option value="Disponible">Disponible</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                        <input type="number" id="editPrecio" class="w-full border p-2 rounded-lg">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Datos Mockup
        let inmuebles = [
            { id: 1, nombre: "Residencial Los Olivos", direccion: "Av. Principal 123", estado: "Ocupado", gestor: "Admin", precio: 1200, img: "https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&w=500&q=80" },
            { id: 2, nombre: "Torre Ejecutiva Central", direccion: "Calle Finanzas 500", estado: "Disponible", gestor: "Admin", precio: 3500, img: "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=500&q=80" },
            { id: 3, nombre: "Apartamentos Sol y Mar", direccion: "Costanera Norte 45", estado: "Mantenimiento", gestor: "Admin", precio: 950, img: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=500&q=80" }
        ];

        function renderInmuebles(data) {
            const grid = document.getElementById('inmueblesGrid');
            grid.innerHTML = data.map(inm => `
                <div class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-lg transition duration-300 group">
                    <div class="relative">
                        <img src="${inm.img}" class="h-40 w-full object-cover group-hover:scale-105 transition duration-500" alt="Propiedad">
                        <div class="absolute top-2 right-2">
                             <span class="px-2 py-1 text-xs font-semibold rounded-full shadow-sm ${getStatusClass(inm.estado)}">
                                ${inm.estado}
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-1">${inm.nombre}</h3>
                        <p class="text-sm text-gray-500 mb-4 flex items-center"><i class="fas fa-map-marker-alt mr-2 text-red-400"></i> ${inm.direccion}</p>
                        <div class="flex items-center justify-between border-t pt-4">
                            <span class="font-bold text-blue-600 text-lg">$${inm.precio}</span>
                            <div class="flex gap-2">
                                <button onclick="openEditModal(${inm.id})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Editar"><i class="fas fa-edit"></i></button>
                                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Ver Detalles"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function getStatusClass(status) {
            switch(status) {
                case 'Disponible': return 'bg-green-100 text-green-700 border border-green-200';
                case 'Ocupado': return 'bg-blue-100 text-blue-700 border border-blue-200';
                case 'Mantenimiento': return 'bg-orange-100 text-orange-700 border border-orange-200';
                default: return 'bg-gray-100 text-gray-700';
            }
        }

        // Modales
        function openCreateModal() {
            document.getElementById('createForm').reset();
            document.getElementById('createModal').classList.remove('hidden');
        }
        function openEditModal(id) {
            const inm = inmuebles.find(i => i.id === id);
            document.getElementById('editId').value = inm.id;
            document.getElementById('editNombre').value = inm.nombre;
            document.getElementById('editDireccion').value = inm.direccion;
            document.getElementById('editEstado').value = inm.estado;
            document.getElementById('editPrecio').value = inm.precio;
            document.getElementById('editModal').classList.remove('hidden');
        }
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // CRUD Local
        document.getElementById('createForm').onsubmit = (e) => {
            e.preventDefault();
            const nuevo = {
                id: Date.now(),
                nombre: document.getElementById('addNombre').value,
                direccion: document.getElementById('addDireccion').value,
                estado: document.getElementById('addEstado').value,
                precio: document.getElementById('addPrecio').value,
                img: "https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=500&q=80"
            };
            inmuebles.push(nuevo);
            renderInmuebles(inmuebles);
            closeModal('createModal');
        };

        document.getElementById('editForm').onsubmit = (e) => {
            e.preventDefault();
            const id = parseInt(document.getElementById('editId').value);
            const index = inmuebles.findIndex(i => i.id === id);
            inmuebles[index].nombre = document.getElementById('editNombre').value;
            inmuebles[index].direccion = document.getElementById('editDireccion').value;
            inmuebles[index].estado = document.getElementById('editEstado').value;
            inmuebles[index].precio = document.getElementById('editPrecio').value;
            renderInmuebles(inmuebles);
            closeModal('editModal');
        };

        function filterInmuebles() {
            const text = document.getElementById('searchInput').value.toLowerCase();
            const filtered = inmuebles.filter(inm => 
                inm.nombre.toLowerCase().includes(text) || 
                inm.direccion.toLowerCase().includes(text)
            );
            renderInmuebles(filtered);
        }

        renderInmuebles(inmuebles);
    </script>
</body>
</html>