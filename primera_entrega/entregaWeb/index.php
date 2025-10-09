<?php
// Incluye los datos para título e imagen
include 'datos.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- lo de html special chars es porque si haces el echo directamente y luego hay simbolos especiales la pagina se va a romper, y esta cosita te convierte los especiales en sus expresiones correspondientes--->
  <title><?php echo htmlspecialchars($titulo); ?></title>

  <!-- link de estilo de bootstrap necesario si quieres usar bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- metemos el fragmento de header-->
<?php include 'header.php'; ?>

<!-- container y lead son clases de bootstrap-->
<main class="container">
  <p class="lead">Bienvenido a mi página web creada con PHP y Bootstrap.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</main>

<!-- metemos el fragmento de footer-->
<?php include 'footer.php'; ?>

</body>
</html>