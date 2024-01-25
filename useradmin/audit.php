<?php
    function audit($usuario_audit, $accion_audit, $entorno_audit){
        $conn_audit = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
        if ($entorno_audit == 'admin'){
            $query = $conn_audit->query("SELECT * FROM `admin` WHERE `admin_id` = '$usuario_audit'") or die(mysqli_error());
            $fetch = $query->fetch_array();
            $usuario_audit=$fetch['username'];
        }

         // Crear el registro de auditoría
        $fecha = date('Y-m-d H:i:s');
        $query = "INSERT INTO auditoria (usuario, accion, fecha) VALUES ('$usuario_audit', '$accion_audit', '$fecha')";
        mysqli_query($conn_audit, $query);
        $conn_audit->close();
    }
?>