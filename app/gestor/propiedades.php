<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inmobiliario</title>
    <link rel="stylesheet" href="assets/css/propiedades.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <div class="dashboard">

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <h2 class="logo">PropManager</h2>
            <nav>
                <a href="index.php"><i class="ri-home-5-line"></i> Inicio</a>
                <a href="propiedades.php" class="active"><i class="ri-home-5-line"></i> propiedades</a>
                <a href="#"><i class="ri-bar-chart-line"></i> Reportes</a>
                <a href="#"><i class="ri-settings-3-line"></i> Configuración</a>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="main">

            <!-- Header -->
            <header class="header">
                <button class="menu-btn" id="menu-btn"><i class="ri-menu-line"></i></button>
                <h1>Administración de propiedades</h1>
                <div class="user">
                    <span>Gabriel</span>
                    <img src="https://i.pravatar.cc/40" alt="Usuario">
                </div>
            </header>


            <!-- Tabla -->
            <section class="table-section">
                <div class="section-header">
                    <h2>Propiedades</h2>
                    <button class="btn-primary" id="addPropertyBtn">
                      <i class="ri-add-line"></i> Agregar Propiedad
                    </button>
                </div>


                <table>
                    <thead>
                        <tr>
                            <th>Nombre Inmueble</th>
                            <th>Dirección</th>
                            <th>estado</th>
                            <th>numero de Inquilinos</th>
                            <th>fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody id="propertyTableBody">
                        <tr onclick="detallesPropiedad(1)">
                            <td>edificio principal</td>
                            <td>av salaverry 123</td>
                            <td><span class="status available">activo</span></td>
                            <td>20</td>
                            <td>2023-06-01</td>
                            <!--<td><span class="status available">Disponible</span></td>-->
                        </tr>
                        <tr onclick="detallesPropiedad(2)">
                            <td>edificio Romath</td>
                            <td>av belen 154</td>
                            <td><span class="status sold">inactivo</span></td>
                            <td>10</td>
                            <td>2023-06-01</td>
                            <!--<td><span class="status sold">Vendido</span></td>-->
                        </tr>
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
    <script src="assets/js/propiedades.js"></script>
</body>

</html>