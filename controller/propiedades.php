<?php
function selectinmobiliariabyuser($cn, $gestorid)
{
    // 1. Preparar la consulta
    $stmt = mysqli_prepare($cn, "SELECT * FROM propiedadinmobiliaria WHERE gestorid = ?");
    
    // Si la preparación falla, devuelve null o lanza una excepción
    if (!$stmt) {
        // Manejar error de preparación si es necesario
        return null; 
    }
    
    // 2. Vincular parámetros
    mysqli_stmt_bind_param($stmt, "i", $gestorid);
    
    // 3. Ejecutar la consulta
    if (!mysqli_stmt_execute($stmt)) {
        // Manejar error de ejecución si es necesario
        mysqli_stmt_close($stmt);
        return null;
    }
    
    // 4. Obtener el objeto de resultado
    $result = mysqli_stmt_get_result($stmt);

    // 5. ¡AQUÍ ESTÁ EL CAMBIO CLAVE! 
    // Extraer todas las filas como un array asociativo.
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $data; // Devuelve el array de propiedades
    }
    
    mysqli_stmt_close($stmt);
    return []; // Devuelve un array vacío si no hay resultados o si falló la obtención
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
        case 'selectinmobiliariabyuser':
            if (!$conexion) {
                if (!$result) {
                    echo json_encode(['success' => false, 'error' => mysqli_stmt_error($stmt)]);
                    exit;
                }
            }
            try {
                $response = selectinmobiliariabyuser($conexion, $data['iduser']);

                if ($response) {
                    echo json_encode(['success' => true, 'message' => 'peticion exitosa', 'propiedades' => $response]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'peticion fallido']);
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