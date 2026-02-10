<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Platform Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-slate-800">
            <span class="text-indigo-400">Prop</span>Manager
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="flex items-center p-3 bg-indigo-600 rounded-lg">
                <i class="fas fa-chart-pie mr-3"></i> Dashboard
            </a>
            <a href="usuarios.php" class="flex items-center p-3 hover:bg-slate-800 rounded-lg">
                <i class="fas fa-users mr-3"></i> Usuarios
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg">
                <i class="fas fa-user-md mr-3"></i> inquilinos
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg">
                <i class="fas fa-server mr-3"></i> Sistema
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 flex flex-col overflow-y-auto">

        <!-- Header -->
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">
            <h2 class="text-lg font-bold text-gray-700">Panel de Administración</h2>

            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-600">Developer</span>
                <img class="w-9 h-9 rounded-full"
                     src="https://ui-avatars.com/api/?name=Admin+Dev&background=6366F1&color=fff">
            </div>
        </header>

        <!-- Content -->
        <div class="p-8">

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500 font-bold">Usuarios Registrados</p>
                    <h3 id="usersCount" class="text-3xl font-bold">0</h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500">
                    <p class="text-sm text-gray-500 font-bold">inquilinos Activos</p>
                    <h3 id="doctorsCount" class="text-3xl font-bold">0</h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-amber-500">
                    <p class="text-sm text-gray-500 font-bold">Ingresos Mensuales</p>
                    <h3 id="revenue" class="text-3xl font-bold">$0</h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border-l-4 border-red-500">
                    <p class="text-sm text-gray-500 font-bold">Errores Sistema</p>
                    <h3 id="errorsCount" class="text-3xl font-bold">0</h3>
                </div>

            </div>

            <!-- Activity -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">
                    Actividad Reciente
                </h3>

                <div id="activityList" class="divide-y divide-gray-100"></div>
            </div>

        </div>
    </main>
</div>

<script src="assets/js/dashboard.js"></script>
</body>
</html>
