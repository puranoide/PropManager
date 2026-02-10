// Tus fuentes de datos integradas
const statsData = {
  "users": 1240,
  "inquilinos": 87,
  "revenue": 4820,
  "errors": 3
};

const activityData = [
  {
    "type": "user",
    "message": "Nuevo usuario registrado",
    "date": "2026-02-01"
  },
  {
    "type": "inquilino",
    "message": "gestor activo un iquilino",
    "date": "2026-01-31"
  },
  {
    "type": "system",
    "message": "Error 500 en endpoint /appointments",
    "date": "2026-01-30"
  }
];

// Función para cargar estadísticas
async function loadStats() {
    // Cuando conectes tu backend, descomenta la línea de abajo:
    // const res = await fetch('tu-api/stats'); const statsData = await res.json();
    
    document.getElementById('usersCount').innerText = statsData.users.toLocaleString();
    document.getElementById('doctorsCount').innerText = statsData.inquilinos;
    document.getElementById('revenue').innerText = `$${statsData.revenue.toLocaleString()}`;
    document.getElementById('errorsCount').innerText = statsData.errors;
}

// Función para cargar actividad
async function loadActivity() {
    // Cuando conectes tu backend, descomenta la línea de abajo:
    // const res = await fetch('tu-api/activity'); const activityData = await res.json();

    const container = document.getElementById('activityList');
    
    container.innerHTML = activityData.map(a => `
        <div class="py-3 flex justify-between items-center border-b border-gray-100 last:border-0">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-full ${getIconBg(a.type)}">
                     <i class="fas ${getIcon(a.type)} text-xs"></i>
                </div>
                <div>
                    <p class="font-medium text-sm text-gray-800">${a.message}</p>
                    <p class="text-xs text-gray-500">${a.date}</p>
                </div>
            </div>
            <i class="fas fa-circle text-[8px] ${
                a.type === 'system' ? 'text-red-500' :
                a.type === 'doctor' ? 'text-green-500' :
                'text-indigo-500'
            }"></i>
        </div>
    `).join('');
}

// Helpers visuales para iconos (opcional, mejora mucho el look)
function getIcon(type) {
    if (type === 'system') return 'fa-exclamation-triangle';
    if (type === 'doctor') return 'fa-user-md';
    return 'fa-user-plus';
}

function getIconBg(type) {
    if (type === 'system') return 'bg-red-50 text-red-600';
    if (type === 'doctor') return 'bg-green-50 text-green-600';
    return 'bg-indigo-50 text-indigo-600';
}

// Inicializar
loadStats();
loadActivity();