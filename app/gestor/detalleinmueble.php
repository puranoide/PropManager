<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Inmueble - PropManager</title>
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
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition"><i class="fas fa-file-invoice-dollar mr-3"></i> Finanzas</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 z-20">
                <div class="flex items-center gap-4">
                    <a href="inmuebles.php" class="text-gray-500 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-arrow-left mr-2"></i> Volver a Inmuebles
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
                
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border-l-8 border-blue-600">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div>
                            <span class="text-blue-600 font-bold uppercase text-xs tracking-widest" id="propType">Edificio Residencial</span>
                            <h1 class="text-3xl font-bold text-gray-800" id="propName">Residencial Los Olivos</h1>
                            <p class="text-gray-500 mb-2"><i class="fas fa-map-marker-alt text-red-400 mr-2"></i>Av. Principal 123, Ciudad Capital</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-1 rounded">Propietario Principal:</span>
                                <span class="text-sm font-bold text-gray-700">Inversiones Bolívar S.A.</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <button onclick="window.location.href='propietarios.php'" class="bg-white border-2 border-slate-700 text-slate-700 hover:bg-slate-700 hover:text-white px-5 py-2.5 rounded-lg flex items-center gap-2 transition font-bold shadow-sm">
                                <i class="fas fa-user-tie"></i> Administrar Propietarios
                            </button>
                            
                            <div class="flex gap-2">
                                <div class="bg-blue-50 px-4 py-2 rounded-lg text-center border border-blue-100">
                                    <p class="text-[10px] text-blue-600 font-black uppercase">Pisos</p>
                                    <p class="text-xl font-bold text-gray-800" id="propFloors">12</p>
                                </div>
                                <div class="bg-blue-50 px-4 py-2 rounded-lg text-center border border-blue-100">
                                    <p class="text-[10px] text-blue-600 font-black uppercase">Unidades</p>
                                    <p class="text-xl font-bold text-gray-800" id="propUnits">48</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="bg-gray-50 p-4 border-b flex justify-between items-center">
                            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                                <i class="fas fa-file-invoice text-amber-500"></i> Servicios a Pagar
                            </h3>
                            <button class="bg-blue-50 text-blue-600 px-3 py-1 rounded-md text-xs font-bold hover:bg-blue-100 transition">DETALLES</button>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-4" id="servicesList"></ul>
                            <div class="mt-6 pt-4 border-t flex justify-between items-center">
                                <span class="text-gray-500 font-medium">Subtotal Servicios:</span>
                                <span class="text-xl font-black text-gray-800" id="totalServices">$0.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="bg-gray-50 p-4 border-b flex justify-between items-center">
                            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                                <i class="fas fa-users-cog text-blue-500"></i> Sueldos de Personal
                            </h3>
                            <button class="bg-blue-50 text-blue-600 px-3 py-1 rounded-md text-xs font-bold hover:bg-blue-100 transition">DETALLES</button>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-4" id="salariesList"></ul>
                            <div class="mt-6 pt-4 border-t flex justify-between items-center">
                                <span class="text-gray-500 font-medium">Subtotal Sueldos:</span>
                                <span class="text-xl font-black text-gray-800" id="totalSalaries">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl border-b-4 border-red-500 shadow-sm">
                        <p class="text-gray-400 font-bold text-xs uppercase mb-1">Total Egresos</p>
                        <h2 class="text-3xl font-black text-red-600" id="finalTotalExpense">$0.00</h2>
                        <div class="flex items-center gap-1 text-[10px] text-gray-400 mt-2">
                            <i class="fas fa-info-circle"></i> SERVICIOS + SUELDOS
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl border-b-4 border-green-500 shadow-sm">
                        <p class="text-gray-400 font-bold text-xs uppercase mb-1">Total Recaudado</p>
                        <h2 class="text-3xl font-black text-green-600" id="totalCollected">$0.00</h2>
                        <div class="flex items-center gap-1 text-[10px] text-gray-400 mt-2">
                            <i class="fas fa-check-circle"></i> PAGOS CONFIRMADOS
                        </div>
                    </div>

                    <div class="bg-slate-900 p-6 rounded-xl text-white shadow-lg flex flex-col justify-center">
                        <p class="text-slate-400 font-bold text-xs uppercase mb-1">Utilidad Operativa</p>
                        <h2 class="text-4xl font-black text-blue-400" id="netProfit">$0.00</h2>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const propertyDetail = {
            nombre: "Residencial Los Olivos",
            tipo: "Edificio de Apartamentos",
            pisos: 12,
            unidades: 48,
            recaudado: 45000,
            servicios: [
                { nombre: "Energía Eléctrica", monto: 850, icono: "fa-lightbulb" },
                { nombre: "Agua y Alcantarillado", monto: 420, icono: "fa-tint" },
                { nombre: "Mantenimiento Ascensores", monto: 1200, icono: "fa-tools" },
                { nombre: "Servicio de Limpieza (Externo)", monto: 600, icono: "fa-hand-sparkles" }
            ],
            sueldos: [
                { cargo: "Conserje Diurno", monto: 1800, icono: "fa-user-clock" },
                { cargo: "Seguridad Nocturna", monto: 2200, icono: "fa-user-shield" },
                { cargo: "Administrador", monto: 2500, icono: "fa-user-tie" }
            ]
        };

        function initDetailView() {
            document.getElementById('propName').innerText = propertyDetail.nombre;
            document.getElementById('propType').innerText = propertyDetail.tipo;
            document.getElementById('propFloors').innerText = propertyDetail.pisos;
            document.getElementById('propUnits').innerText = propertyDetail.unidades;
            document.getElementById('totalCollected').innerText = `$${propertyDetail.recaudado.toLocaleString()}`;

            // Render Servicios
            let sumServ = 0;
            document.getElementById('servicesList').innerHTML = propertyDetail.servicios.map(s => {
                sumServ += s.monto;
                return `<li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-transparent hover:border-amber-200 transition">
                            <div class="flex items-center gap-3">
                                <i class="fas ${s.icono} text-amber-500 w-5 text-center"></i>
                                <span class="text-gray-700 text-sm font-semibold">${s.nombre}</span>
                            </div>
                            <span class="font-bold text-gray-800">$${s.monto.toLocaleString()}</span>
                        </li>`;
            }).join('');
            document.getElementById('totalServices').innerText = `$${sumServ.toLocaleString()}`;

            // Render Sueldos
            let sumSuel = 0;
            document.getElementById('salariesList').innerHTML = propertyDetail.sueldos.map(s => {
                sumSuel += s.monto;
                return `<li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-transparent hover:border-blue-200 transition">
                            <div class="flex items-center gap-3">
                                <i class="fas ${s.icono} text-blue-500 w-5 text-center"></i>
                                <span class="text-gray-700 text-sm font-semibold">${s.cargo}</span>
                            </div>
                            <span class="font-bold text-gray-800">$${s.monto.toLocaleString()}</span>
                        </li>`;
            }).join('');
            document.getElementById('totalSalaries').innerText = `$${sumSuel.toLocaleString()}`;

            // Cálculos Finales
            const totalExp = sumServ + sumSuel;
            document.getElementById('finalTotalExpense').innerText = `$${totalExp.toLocaleString()}`;
            document.getElementById('netProfit').innerText = `$${(propertyDetail.recaudado - totalExp).toLocaleString()}`;
        }

        initDetailView();
    </script>
</body>
</html>