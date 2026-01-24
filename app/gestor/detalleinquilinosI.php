<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquilinos - Residencial Los Olivos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-xl">
            <div class="p-6 text-2xl font-bold border-b border-slate-800">
                <span class="text-blue-400">Prop</span>Manager
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="index.php" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-chart-line mr-3"></i> Dashboard</a>
                <a href="inmuebles.php" class="flex items-center p-3 bg-blue-600 rounded-lg shadow-lg"><i class="fas fa-building mr-3"></i> Inmuebles</a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-users mr-3"></i> Inquilinos</a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-tools mr-3"></i> Mantenimiento</a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-file-invoice-dollar mr-3"></i> Finanzas</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 z-20 border-b">
                <div class="flex items-center gap-4">
                    <a href="detalle_inmueble.php" class="text-gray-500 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al Detalle
                    </a>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-gray-700">Admin User</p>
                            <p class="text-xs text-gray-500">Administrador</p>
                        </div>
                        <img class="w-10 h-10 rounded-full border-2 border-blue-500 p-0.5" src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Perfil">
                    </button>
                    <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl border hidden group-focus-within:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user-circle mr-2"></i> Mi Perfil</a>
                        <hr class="my-1">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Inquilinos: Residencial Los Olivos</h1>
                        <p class="text-gray-500 text-sm">Gestiona los residentes y el estado de sus unidades.</p>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition shadow-md font-bold">
                        <i class="fas fa-user-plus"></i> Registrar Nuevo Inquilino
                    </button>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border mb-6 flex flex-wrap gap-4 items-center">
                    <div class="relative flex-1 min-w-[200px]">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                        <input type="text" id="tenantSearch" onkeyup="filterTenants()" placeholder="Buscar inquilino..." class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <select id="floorFilter" onchange="filterTenants()" class="border p-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="all">Todos los Pisos</option>
                        <option value="1">Piso 1</option>
                        <option value="2">Piso 2</option>
                        <option value="3">Piso 3</option>
                    </select>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-500 uppercase">Estado:</span>
                        <select id="statusFilter" onchange="filterTenants()" class="border p-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="all">Cualquiera</option>
                            <option value="Al día">Al día</option>
                            <option value="Deuda">Con Deuda</option>
                        </select>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 border-b">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Inquilino</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Ubicación</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Contacto</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Estado Pago</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tenantTableBody" class="divide-y divide-gray-100">
                            </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>

    <script>
        // Datos de ejemplo
        const inquilinos = [
            { id: 101, nombre: "Juan Pérez", piso: 2, depto: "204", email: "juan.p@email.com", telf: "987-654-321", estado: "Al día", avatar: "JP" },
            { id: 102, nombre: "María García", piso: 1, depto: "101", email: "m.garcia@email.com", telf: "912-345-678", estado: "Deuda", avatar: "MG" },
            { id: 103, nombre: "Roberto Gómez", piso: 3, depto: "305", email: "rgomez@email.com", telf: "955-443-221", estado: "Al día", avatar: "RG" },
            { id: 104, nombre: "Elena Rodríguez", piso: 2, depto: "201", email: "elena.r@email.com", telf: "944-111-222", estado: "Al día", avatar: "ER" }
        ];

        function renderTenants(data) {
            const tableBody = document.getElementById('tenantTableBody');
            tableBody.innerHTML = data.map(t => `
                <tr class="hover:bg-blue-50/50 transition duration-150">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs border border-white shadow-sm">
                                ${t.avatar}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">${t.nombre}</p>
                                <p class="text-[10px] text-gray-400 uppercase tracking-tighter">ID: TN-${t.id}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <span class="block font-medium text-gray-700">Piso ${t.piso}</span>
                            <span class="text-xs text-gray-500 italic">Depto. ${t.depto}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <div class="flex flex-col">
                            <span class="flex items-center gap-2"><i class="fas fa-envelope text-[10px] text-blue-400"></i> ${t.email}</span>
                            <span class="flex items-center gap-2"><i class="fas fa-phone text-[10px] text-green-400"></i> ${t.telf}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wide border 
                            ${t.estado === 'Al día' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-red-100 text-red-700 border-red-200'}">
                            ${t.estado}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button onclick="window.location.href='detalle_inquilino.php?id=${t.id}'" 
                                class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded text-xs font-bold transition flex items-center gap-1">
                                <i class="fas fa-external-link-alt text-[10px]"></i> Ver Perfil
                            </button>
                            <button class="p-2 text-gray-400 hover:text-slate-800 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function filterTenants() {
            const searchValue = document.getElementById('tenantSearch').value.toLowerCase();
            const floorValue = document.getElementById('floorFilter').value;
            const statusValue = document.getElementById('statusFilter').value;

            const filtered = inquilinos.filter(t => {
                const matchesSearch = t.nombre.toLowerCase().includes(searchValue) || t.depto.includes(searchValue);
                const matchesFloor = floorValue === 'all' || t.piso.toString() === floorValue;
                const matchesStatus = statusValue === 'all' || t.estado === statusValue;
                
                return matchesSearch && matchesFloor && matchesStatus;
            });

            renderTenants(filtered);
        }

        // Carga Inicial
        renderTenants(inquilinos);
    </script>
</body>
</html>