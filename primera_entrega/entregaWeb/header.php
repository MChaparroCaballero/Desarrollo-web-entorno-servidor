<?php include 'datos.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="header.css" rel="stylesheet">
</head>
<body>
    
  <header>
  <h1><?php echo htmlspecialchars($titulo); ?></h1>
  <!-- metemos aqui lo de htmlspecialchars por simbolos raros que pueda tener la url, no es necesario pero si mas seguro y rapido o por lo menos mas que poner amp-->
  <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($alt); ?>" title="<?php echo htmlspecialchars($titulo); ?>" class="img-fluid rounded shadow" />
</header>

</body>
</html>