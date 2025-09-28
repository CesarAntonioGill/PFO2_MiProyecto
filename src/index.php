<?php
$host = 'db-test';   // nombre del contenedor MySQL
$db   = 'demo';
$user = 'demo';
$pass = 'demo';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h1>Listado de personas</h1>";
    $stmt = $pdo->query("SELECT * FROM personas");
    echo "<ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>" . $row['id'] . " - " . $row['nombre'] . "</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
