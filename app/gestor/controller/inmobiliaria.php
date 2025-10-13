<?php
function obtenerPropiedades($conexion, $id)
{
    // Sanitize inputs to prevent SQL injection
    $id = mysqli_real_escape_string($conexion, $id);
    $query = "SELECT * FROM propiedadinmobiliaria WHERE gestorid = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $edificios = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $edificios[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $edificios; // Devuelve el array con los datos del usuario
}
// Verify if receiving POST request with JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Set response header as JSON
    header('Content-Type: application/json');

    // Decode received JSON
    $data = json_decode(file_get_contents("php://input"), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON']);
        exit;
    }

    // Validate received data    

    include_once('db.php');
    switch ($data['action']) {
        case 'listarByUser':
            if (!$conexion) {
                echo json_encode(['error' => 'No se pudo conectar a la base de datos']);
                exit;
            }

            // Resto del código...
            try {
                $response = obtenerPropiedades($conexion, $data['iduser']);
                if ($response) {
                    echo json_encode(['success' => 'extracion de propiedades exitosa','edificios' => $response]);
                } else {
                    echo json_encode(['error' => 'extracion de propiedades fallida', 'message' => "Correo o contraseña incorrectos"]);
                }
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
            break;

        case 'logout':
            $response = logout();
            if ($response) {
                echo json_encode(['success' => 'logout exitoso', 'message' => 'Sesión cerrada correctamente']);
            } else {
                echo json_encode(['error' => 'logout fallido']);
            }
            break;
            default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
            break;
    }
}