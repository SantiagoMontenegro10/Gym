<?php
// ================= CONEXIÓN =================
$conexion = new mysqli("localhost", "root", "", "gym", 3307);
if ($conexion->connect_error) {
    die("ERROR_BD");
}

// ================= VALIDAR ID =================
if (!isset($_GET['id'])) {
    echo "DENEGADO";
    exit;
}

$huella_id = intval($_GET['id']);

// ================= BUSCAR CLIENTE =================
$sql = "SELECT id_cliente, hasta 
        FROM cliente 
        WHERE huella_id = ? 
        LIMIT 1";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $huella_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "DENEGADO"; // Huella no asociada
    exit;
}

$cliente = $result->fetch_assoc();

// ================= VALIDAR FECHA =================
$hoy = date("Y-m-d");

if ($cliente['hasta'] < $hoy) {
    echo "DENEGADO"; // Membresía vencida
    exit;
}

// ================= REGISTRAR ASISTENCIA =================
$id_cliente = $cliente['id_cliente'];

$insert = "INSERT INTO asistencia (id_cliente, fecha_hora, marcado_por)
           VALUES (?, NOW(), 'huella')";

$stmt2 = $conexion->prepare($insert);
$stmt2->bind_param("i", $id_cliente);
$stmt2->execute();

// ================= RESPUESTA FINAL =================
echo "OK";
