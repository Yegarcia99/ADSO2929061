<?php
$title       = '25-Challenge-dates';
$description = '';

include 'template/header.php';
echo "<section>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de Edad</title>
</head>

<body>
    <h1>Verifiquemos tu edad </h1>

    <form method="POST" action="">
        <label for="fecha_nacimiento">Introduce tu Fecha de Nacimiento:</label> <br>  
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required style="margin-left: 120px;">
        <br><br>
        <button type="submit" name="calcular" style="margin-left: 160px;color:Red;">Ingresar</button>
    </form>

    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fecha_nacimiento'])) {
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        if (empty($fechaNacimiento)) {
            echo "<p style='color: red;'> introduce una fecha válida.</p>";
        } else {
            try {
                $fecha_nac = new DateTime($fechaNacimiento);
                $hoy = new DateTime();
                $diferencia = $fecha_nac->diff($hoy);
                $edad = $diferencia->y;

                echo "<h2 style='color:red;'>Actualmente tienes  {$edad} años </h2>";
            } catch (Exception $e) {
                echo "<p style='color:blue;'>¡ No se puede obtener la fecha: " . $e->getMessage() . "</p>";
            }
        }
    }
    ?>
    <?php include 'template/footer.php' ?>
</body>

</html>