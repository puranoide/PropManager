<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gestión Inmobiliaria</title>
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
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-file-invoice-dollar mr-3"></i> Finanzas</a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 z-10">
                <div class="flex items-center gap-4">
                    <label class="font-medium text-gray-600">Vista:</label>
                    <select id="propertyFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="all">General (Todos)</option>
                        <option value="1">Residencial Los Olivos</option>
                        <option value="2">Torre Ejecutiva Central</option>
                    </select>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-700" id="userName">Admin User</p>
                            <p class="text-xs text-gray-500">Administrador</p>
                        </div>
                        <img class="w-10 h-10 rounded-full border border-gray-300" src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Perfil">
                    </button>
                    <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl border hidden group-focus-within:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user-circle mr-2"></i> Mi Perfil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-cog mr-2"></i> Configuración</a>
                        <hr class="my-1">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </header>

            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6" id="viewTitle">Recopilatorio General</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 uppercase font-bold">Ganancias Totales</p>
                                <h3 class="text-3xl font-bold text-gray-800" id="totalEarnings">$0.00</h3>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 uppercase font-bold">Gastos Generales</p>
                                <h3 class="text-3xl font-bold text-gray-800" id="totalExpenses">$0.00</h3>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full text-red-600">
                                <i class="fas fa-receipt fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-amber-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 uppercase font-bold">Pagos Próximos</p>
                                <h3 class="text-3xl font-bold text-gray-800" id="pendingPayments">$0.00</h3>
                            </div>
                            <div class="bg-amber-100 p-3 rounded-full text-amber-600">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-700 mb-4">Últimos Movimientos</h3>
                    <div id="movementList" class="divide-y divide-gray-100">
                        </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Estructura JSON Mockup (Lo que traerías de PHP)
        const dbData = {
            properties: [
                { id: 1, name: "Residencial Los Olivos", earnings: 15000, expenses: 4500, pending: 2000 },
                { id: 2, name: "Torre Ejecutiva Central", earnings: 45000, expenses: 12000, pending: 8500 }
            ],
            movements: [
                { type: 'in', amount: 1200, concept: 'Renta Depto 402', date: '2023-10-25', propertyId: 1 },
                { type: 'out', amount: 350, concept: 'Mantenimiento Elevador', date: '2023-10-24', propertyId: 2 },
                { type: 'in', amount: 2500, concept: 'Alquiler Oficina 10', date: '2023-10-23', propertyId: 2 }
            ]
        };

        const filterSelect = document.getElementById('propertyFilter');
        
        function updateDashboard(propertyId) {
            let filteredEarnings, filteredExpenses, filteredPending, filteredMovements;

            if (propertyId === 'all') {
                document.getElementById('viewTitle').innerText = "Recopilatorio General";
                filteredEarnings = dbData.properties.reduce((acc, p) => acc + p.earnings, 0);
                filteredExpenses = dbData.properties.reduce((acc, p) => acc + p.expenses, 0);
                filteredPending = dbData.properties.reduce((acc, p) => acc + p.pending, 0);
                filteredMovements = dbData.movements;
            } else {
                const prop = dbData.properties.find(p => p.id == propertyId);
                document.getElementById('viewTitle').innerText = prop.name;
                filteredEarnings = prop.earnings;
                filteredExpenses = prop.expenses;
                filteredPending = prop.pending;
                filteredMovements = dbData.movements.filter(m => m.propertyId == propertyId);
            }

            // Actualizar UI
            document.getElementById('totalEarnings').innerText = `$${filteredEarnings.toLocaleString()}`;
            document.getElementById('totalExpenses').innerText = `$${filteredExpenses.toLocaleString()}`;
            document.getElementById('pendingPayments').innerText = `$${filteredPending.toLocaleString()}`;

            // Renderizar Movimientos
            const listContainer = document.getElementById('movementList');
            listContainer.innerHTML = filteredMovements.map(m => `
                <div class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-800">${m.concept}</p>
                        <p class="text-xs text-gray-500">${m.date}</p>
                    </div>
                    <span class="font-bold ${m.type === 'in' ? 'text-green-600' : 'text-red-600'}">
                        ${m.type === 'in' ? '+' : '-'} $${m.amount}
                    </span>
                </div>
            `).join('');
        }

        // Event Listener
        filterSelect.addEventListener('change', (e) => updateDashboard(e.target.value));

        // Carga Inicial
        updateDashboard('all');

    </script>
</body>
</html>