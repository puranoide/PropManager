<?php
function getallusers($conexion)
{
    // Corregido: INNER JOIN va antes del WHERE
    $query = "SELECT* FROM usuarios";
              
    $stmt = $conexion->prepare($query);
    
    if (!$stmt) {
        // Esto te ayudará a ver el error real de SQL si algo falla
        die("Error en la preparación: " . $conexion->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $usuarios = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    } else {
        return false;
    }
}

function registeruser($con, $nombre,$email,$rol_id,$estado)
{
    $sql = "INSERT INTO usuarios (nombre_completo,email,rol_id,estado) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssii", $nombre,$email,$rol_id,$estado);
    $result = mysqli_stmt_execute($stmt);
    return $result;
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
        case 'getAllUsers':
            if (!$conexion) {
                if (!$result) {
                    echo json_encode(['success' => false, 'error' => mysqli_stmt_error($stmt)]);
                    exit;
                }
            }
            try {
                $response = getallusers($conexion);

                if ($response) {
                    echo json_encode(['success' => true, 'message' => 'peticion exitosa', 'usuarios' => $response]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'peticion fallido']);
                }
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
            break;
        case 'submitNewUser':
            if (!$conexion) {
                if (!$result) {
                    echo json_encode(['success' => false, 'error' => mysqli_stmt_error($stmt)]);
                    exit;
                }
            }
            try {
                $response = registeruser($conexion, $data['name'], $data['email'], $data['role'], $data['status']);

                if ($response) {
                    echo json_encode(['success' => true, 'message' => 'creacion de usuario exitoso']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'creacion fallida']);
                }
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
            break;
        default:
            echo json_encode(['success' => false]);
            break;
    }
}


?>