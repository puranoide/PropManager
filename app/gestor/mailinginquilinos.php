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
                        <img class="w-10 h-10 rounded-full border-2 border-blue-500 p-0.5"
                            src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Perfil">
                    </button>
                    <div
                        class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl border hidden group-focus-within:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i
                                class="fas fa-user-circle mr-2"></i> Mi Perfil</a>
                        <hr class="my-1">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i
                                class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Mailing y Segmentación</h1>
                        <p class="text-gray-500 text-sm">Crea audiencias basadas en etiquetas para tus comunicados.</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl flex items-center gap-2 transition shadow-lg font-bold">
                            <i class="fas fa-paper-plane"></i> Nueva Campaña
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <aside class="space-y-4">
                        <div class="bg-white p-5 rounded-2xl shadow-sm border">
                            <h3 class="font-bold text-gray-700 mb-4 flex items-center gap-2">
                                <i class="fas fa-filter text-blue-500 text-sm"></i> Filtrar por Grupo
                            </h3>
                            <div class="space-y-2">
                                <label
                                    class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="text-sm text-gray-600">Propietarios</span>
                                    <span
                                        class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full text-gray-500">24</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="text-sm text-gray-600">Inquilinos</span>
                                    <span
                                        class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full text-gray-500">42</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="text-sm text-gray-600 text-red-500 font-medium">Morosos</span>
                                    <span
                                        class="ml-auto text-xs bg-red-100 px-2 py-0.5 rounded-full text-red-600">8</span>
                                </label>
                            </div>
                            <hr class="my-4">
                            <button
                                class="w-full py-2 text-sm font-semibold text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                + Crear Nueva Etiqueta
                            </button>
                        </div>
                    </aside>

                    <div class="lg:col-span-3 space-y-4">
                        <div id="bulkToolbar"
                            class="bg-slate-800 text-white p-4 rounded-2xl shadow-lg flex items-center justify-between hidden">
                            <div class="flex items-center gap-4">
                                <span class="text-sm font-medium"><i class="fas fa-check-double mr-2"></i> <span
                                        id="selectedCount">0</span> seleccionados</span>
                                <div class="h-4 w-px bg-slate-600"></div>
                                <button
                                    class="text-xs bg-slate-700 hover:bg-slate-600 px-3 py-1.5 rounded-lg border border-slate-600 transition">
                                    <i class="fas fa-tag mr-1"></i> Asignar Etiqueta
                                </button>
                                <button
                                    class="text-xs bg-slate-700 hover:bg-slate-600 px-3 py-1.5 rounded-lg border border-slate-600 transition">
                                    <i class="fas fa-envelope mr-1"></i> Enviar Correo
                                </button>
                            </div>
                            <button onclick="deselectAll()"
                                class="text-xs text-slate-400 hover:text-white">Cancelar</button>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-4 w-12 text-center">
                                            <input type="checkbox" id="masterCheck" class="rounded border-gray-300">
                                        </th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">
                                            Inquilino / Unidad</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">
                                            Etiquetas Actuales</th>
                                        <th
                                            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="mailingList" class="divide-y divide-gray-100">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>

    <script>
    // 1. ESTADO GLOBAL
    let inquilinosData = [{
            id: 1,
            nombre: "Juan Pérez",
            depto: "204",
            tags: ["Propietarios", "Directiva"],
            email: "juan@ejemplo.com"
        },
        {
            id: 2,
            nombre: "María García",
            depto: "101",
            tags: ["Inquilinos", "Mascotas"],
            email: "maria@ejemplo.com"
        },
        {
            id: 3,
            nombre: "Carlos Ruiz",
            depto: "305",
            tags: ["Inquilinos", "Morosos"],
            email: "carlos@ejemplo.com"
        },
        {
            id: 4,
            nombre: "Ana López",
            depto: "502",
            tags: ["Propietarios"],
            email: "ana@ejemplo.com"
        },
        {
            id: 5,
            nombre: "Luis Sosa",
            depto: "108",
            tags: ["Inquilinos", "Morosos"],
            email: "luis@ejemplo.com"
        }
    ];

    let activeFilters = [];
    let selectedTagsInModal = new Set();

    // 2. RENDERIZADO DE TABLA Y CONTADORES
    function renderMailingList() {
        const list = document.getElementById('mailingList');
        if (!list) return;

        // Filtrado
        const filteredData = activeFilters.length === 0 ?
            inquilinosData :
            inquilinosData.filter(t => t.tags.some(tag => activeFilters.includes(tag)));

        list.innerHTML = filteredData.map(t => `
        <tr class="group hover:bg-blue-50/30 transition" data-id="${t.id}">
            <td class="px-6 py-4 text-center">
                <input type="checkbox" class="tenant-select rounded border-gray-300 w-4 h-4" onchange="handleSelection()">
            </td>
            <td class="px-6 py-4">
                <div class="text-sm font-bold text-gray-700">${t.nombre}</div>
                <div class="text-[11px] text-gray-400 uppercase font-medium">Depto ${t.depto} • ${t.email}</div>
            </td>
            <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                    ${t.tags.map(tag => {
                        const isMoroso = tag === 'Morosos';
                        const colorClass = isMoroso ? 'bg-red-50 text-red-600 border-red-100' : 'bg-blue-50 text-blue-600 border-blue-100';
                        return `<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border ${colorClass}">${tag}</span>`;
                    }).join('')}
                </div>
            </td>
            <td class="px-6 py-4 text-right">
                <button onclick="alert('Enviando a: ${t.email}')" class="p-2 text-gray-400 hover:text-indigo-600 transition">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </td>
        </tr>`).join('');

        updateSidebarCounters();
        handleSelection();
    }

    // Función para actualizar los numeritos (24, 42, 8) dinámicamente
    function updateSidebarCounters() {
        const counts = {};
        inquilinosData.flatMap(i => i.tags).forEach(tag => {
            counts[tag] = (counts[tag] || 0) + 1;
        });

        document.querySelectorAll('aside label').forEach(label => {
            const tagText = label.querySelector('span:not(.ml-auto)').innerText.trim();
            const badge = label.querySelector('.ml-auto');
            if (badge) badge.innerText = counts[tagText] || 0;
        });
    }

    // 3. GESTIÓN DE SELECCIÓN
    function handleSelection() {
        const selected = document.querySelectorAll('.tenant-select:checked');
        const toolbar = document.getElementById('bulkToolbar');
        const count = document.getElementById('selectedCount');

        if (selected.length > 0) {
            toolbar.classList.remove('hidden');
            count.innerText = selected.length;
        } else {
            toolbar.classList.add('hidden');
        }
    }

    function deselectAll() {
        document.querySelectorAll('.tenant-select').forEach(cb => cb.checked = false);
        if (document.getElementById('masterCheck')) document.getElementById('masterCheck').checked = false;
        handleSelection();
    }

    // 4. LÓGICA DE LA MODAL (ETIQUETAS)
    function getAllUniqueTags() {
        const allTags = inquilinosData.flatMap(i => i.tags);
        return [...new Set(allTags)];
    }

    function openTagModal() {
        const selected = document.querySelectorAll('.tenant-select:checked');
        const modalTitle = document.querySelector('#tagModal h3');
        const modalDesc = document.querySelector('#tagModal p');

        if (selected.length > 0) {
            // Modo: Asignar a seleccionados
            modalTitle.innerText = "Gestionar Etiquetas";
            modalDesc.innerHTML =
                `Seleccionando para <span class="font-bold text-blue-600">${selected.length}</span> contactos.`;
        } else {
            // Modo: Crear etiqueta general (desde el panel lateral)
            modalTitle.innerText = "Crear Nueva Etiqueta";
            modalDesc.innerText = "Agregue etiquetas nuevas a la lista global.";
        }

        selectedTagsInModal.clear();
        renderAvailableTags();
        document.getElementById('tagModal').classList.remove('hidden');
    }

    function closeTagModal() {
        document.getElementById('tagModal').classList.add('hidden');
    }

    function renderAvailableTags() {
        const container = document.getElementById('availableTags');
        const tags = getAllUniqueTags();
        container.innerHTML = tags.map(tag => `
        <button onclick="toggleTagSelection('${tag}')" 
            class="px-3 py-1.5 rounded-full border text-sm font-medium transition-all
            ${selectedTagsInModal.has(tag) ? 'bg-blue-600 border-blue-600 text-white' : 'bg-white border-gray-200 text-gray-600 hover:border-blue-400'}">
            ${tag}
        </button>
    `).join('');
    }

    function toggleTagSelection(tag) {
        if (selectedTagsInModal.has(tag)) selectedTagsInModal.delete(tag);
        else selectedTagsInModal.add(tag);
        renderAvailableTags();
    }

    function addNewTagFromInput() {
        const input = document.getElementById('newTagInput');
        const value = input.value.trim();
        if (value) {
            selectedTagsInModal.add(value);
            input.value = '';
            renderAvailableTags();
        }
    }

    function applyTagsToSelected() {
        const selectedCheckboxes = document.querySelectorAll('.tenant-select:checked');

        // Si hay gente seleccionada, aplicamos las etiquetas a sus perfiles
        if (selectedCheckboxes.length > 0) {
            const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.closest('tr').dataset.id);
            inquilinosData = inquilinosData.map(inquilino => {
                if (selectedIds.includes(inquilino.id.toString())) {
                    const updatedTags = [...new Set([...inquilino.tags, ...selectedTagsInModal])];
                    return {
                        ...inquilino,
                        tags: updatedTags
                    };
                }
                return inquilino;
            });
        }
        // Si no hay nadie seleccionado, solo cerramos (las nuevas etiquetas ya "existen" en la modal)

        closeTagModal();
        renderMailingList();
    }

    // 5. INICIALIZACIÓN
    document.addEventListener('DOMContentLoaded', () => {

        // Filtros Laterales
        document.querySelectorAll('aside input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {
                const label = e.target.parentElement.querySelector('span:not(.ml-auto)')
                    .innerText.trim();
                if (e.target.checked) activeFilters.push(label);
                else activeFilters = activeFilters.filter(f => f !== label);
                renderMailingList();
            });
        });

        // Botón "+ Crear Nueva Etiqueta" (EL DE TU IMAGEN)
        const btnCrearLateral = document.querySelector('aside button.text-blue-600');
        if (btnCrearLateral) {
            btnCrearLateral.addEventListener('click', openTagModal);
        }

        // Botón Asignar Etiqueta del Toolbar Negro
        const btnAsignarToolbar = document.querySelector('#bulkToolbar button:first-of-type');
        if (btnAsignarToolbar) {
            btnAsignarToolbar.addEventListener('click', openTagModal);
        }

        // Master Checkbox
        const masterCheck = document.getElementById('masterCheck');
        if (masterCheck) {
            masterCheck.addEventListener('change', (e) => {
                document.querySelectorAll('.tenant-select').forEach(cb => cb.checked = e.target
                .checked);
                handleSelection();
            });
        }

        renderMailingList();
    });
    </script>
    <div id="tagModal"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Gestionar Etiquetas</h3>
                <button onclick="closeTagModal()" class="text-gray-400 hover:text-gray-600"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-500 mb-4">Selecciona las etiquetas para aplicar a los <span id="modalCount"
                        class="font-bold text-blue-600">0</span> seleccionados:</p>

                <div id="availableTags" class="flex flex-wrap gap-2 mb-6">
                </div>

                <div class="relative">
                    <input type="text" id="newTagInput" placeholder="Crear nueva etiqueta..."
                        class="w-full pl-4 pr-12 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                    <button onclick="addNewTagFromInput()"
                        class="absolute right-2 top-2 bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="p-4 bg-gray-50 flex justify-end gap-3">
                <button onclick="closeTagModal()" class="px-4 py-2 text-gray-600 font-medium">Cancelar</button>
                <button onclick="applyTagsToSelected()"
                    class="px-6 py-2 bg-slate-800 text-white rounded-xl font-bold hover:bg-slate-900 transition shadow-lg">
                    Guardar Cambios
                </button>
            </div>
        </div>
    </div>
</body>

</html>