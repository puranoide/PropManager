<?php

session_start();
/*
echo "<pre>";
print_r( $_SESSION);
echo "</pre>";
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Inmobiliario</title>
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>
<body>
  <div class="dashboard">
    <!--aca va el id del usuario para el backend -->
    <span style="display: none;" id="userId"><?php echo $_SESSION['id'];?></span>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
      <h2 class="logo">PropManager</h2>
      <nav>
        <a href="#" class="active"><i class="ri-home-5-line"></i> Propiedades</a>
        <a href="#"><i class="ri-bar-chart-line"></i> Reportes</a>
        <a href="#"><i class="ri-settings-3-line"></i> Configuración</a>
      </nav>
    </aside>
    
    <!-- Contenido principal -->
    <main class="main">
      
      <!-- Header -->
      <header class="header">
        <button class="menu-btn" id="menu-btn"><i class="ri-menu-line"></i></button>
        <h1>Panel de Control</h1>
        <div class="user">
          <span><?php echo $_SESSION['nombre'];?></span>
          <img src="https://i.pravatar.cc/40" alt="Usuario">
        </div>
      </header>
      
      <!-- Cards -->
      <section class="cards">
        <div class="card">
          <h3>Total Propiedades</h3>
          <p id="totalProperties"></p>
        </div>
        <div class="card">
          <h3>Inquilinos Activos</h3>
          <p>89</p>
        </div>
        <div class="card">
          <h3>Recaudacion(mes)</h3>
          <p>32</p>
        </div>
        <div class="card success">
          <h3>Pagos(mes)</h3>
          <p>14</p>
        </div>
      </section>
      
<!-- Tabla -->
<section class="table-section">
  <div class="section-header">
    <h2>Últimas Propiedades</h2>
    <button class="btn-primary" id="addPropertyBtn">
      <i class="ri-add-line"></i> Agregar Propiedad
    </button>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Dirección</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody id="propertyTableBody">
      
    </tbody>
  </table>
</section>

<!-- Modal -->
<div class="modal" id="propertyModal">
  <div class="modal-content">
    <h3>Nueva Propiedad</h3>
    <form id="propertyForm">
      <label for="direccion">Dirección</label>
      <input type="text" id="direccion" required>

      <label for="precio">Precio</label>
      <input type="number" id="precio" required>

      <label for="estado">Estado</label>
      <select id="estado" required>
        <option value="Disponible">Disponible</option>
        <option value="Vendido">Vendido</option>
      </select>

      <div class="modal-actions">
        <button type="button" class="btn-secondary" id="cancelBtn">Cancelar</button>
        <button type="submit" class="btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

    </main>
  </div>

  <!-- JS -->
  <script src="assets/js/index.js"></script>
</body>
</html>
