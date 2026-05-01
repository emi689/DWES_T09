<?php
$url = "https://restcountries.com/v3.1/all?fields=name,capital,region,population,flags";

$json = file_get_contents($url);

if ($json === FALSE) {
    die("Error al conectar con la API");
}

$paises = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Países</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>🌎 Países del Mundo</h1>
    <a href="index.php" class="volver">⬅ Volver</a>
</header>

<div class="contenedor">

<?php foreach ($paises as $pais): ?>
    <div class="card">
        <img src="<?= $pais['flags']['png'] ?>" alt="Bandera">

        <h2><?= $pais['name']['common'] ?></h2>

        <p><strong>Capital:</strong>
            <?= $pais['capital'][0] ?? 'No disponible' ?>
        </p>

        <p><strong>Región:</strong>
            <?= $pais['region'] ?>
        </p>

        <p><strong>Población:</strong>
            <?= number_format($pais['population']) ?>
        </p>
    </div>
<?php endforeach; ?>

</div>

</body>
</html>