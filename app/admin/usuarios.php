<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropManager - Administración de Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Suavizar transiciones */
        .modal-transition { transition: opacity 0.3s ease, transform 0.3s ease; }
    </style>
</head>

<body class="bg-gray-100 font-sans text-gray-900">

<div class="flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shrink-0">
        <div class="p-6 text-2xl font-bold border-b border-slate-800">
            <span class="text-indigo-400">Prop</span>Manager
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="index.php" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition group">
                <i class="fas fa-chart-pie mr-3 w-5 text-slate-400 group-hover:text-indigo-400"></i> Dashboard
            </a>
            <a href="#" class="flex items-center p-3 bg-indigo-600 rounded-lg shadow-lg shadow-indigo-900/20">
                <i class="fas fa-users mr-3 w-5"></i> Usuarios
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition group">
                <i class="fas fa-user-tie mr-3 w-5 text-slate-400 group-hover:text-indigo-400"></i> Inquilinos
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition group">
                <i class="fas fa-server mr-3 w-5 text-slate-400 group-hover:text-indigo-400"></i> Sistema
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">

        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 sticky top-0 z-10">
            <h2 class="text-lg font-bold text-gray-700">Gestión de Usuarios</h2>
            <div class="flex items-center gap-3">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-gray-800 leading-none">Admin Dev</p>
                    <p class="text-xs text-gray-500">Developer</p>
                </div>
                <img class="w-10 h-10 rounded-full border-2 border-indigo-100"
                     src="https://ui-avatars.com/api/?name=Admin+Dev&background=6366F1&color=fff">
            </div>
        </header>

        <div class="p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Usuarios</p>
                        <h3 id="usersCount" class="text-2xl font-bold text-gray-800">0</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-lg flex items-center justify-center text-xl">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Activos Ahora</p>
                        <h3 id="activeCount" class="text-2xl font-bold text-gray-800">0</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-xl">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Administradores</p>
                        <h3 id="adminCount" class="text-2xl font-bold text-gray-800">0</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="relative w-full md:w-96">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Filtrar por nombre o email..." 
                               class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    </div>
                    <button onclick="toggleModal()" class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-semibold flex items-center justify-center transition shadow-md">
                        <i class="fas fa-plus mr-2"></i> Nuevo Usuario
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody" class="divide-y divide-gray-100">
                            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

<div id="userModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden transform transition-all">
            <div class="bg-indigo-600 p-6 text-white flex justify-between items-center">
                <h3 class="text-xl font-bold">Nuevo Perfil de Usuario</h3>
                <button onclick="toggleModal()" class="hover:rotate-90 transition-transform">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form id="newUserForm" class="p-6 space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nombre Completo</label>
                    <input type="text" id="userName" required class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition" placeholder="Nombre Apellido">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Email Corporativo</label>
                    <input type="email" id="userEmail" required class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition" placeholder="email@propmanager.com">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Asignar Rol</label>
                        <select id="userRole" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="1">Developer</option>
                            <option value="2">Gestor</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Estado</label>
                        <select id="userStatus" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="pt-4 flex gap-3">
                    <button type="button" onclick="toggleModal()" class="flex-1 px-4 py-2.5 text-gray-500 font-bold hover:bg-gray-100 rounded-lg transition">Cancelar</button>
                    <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/usuarios.js"></script>

</body>
</html>