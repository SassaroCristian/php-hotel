<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Pagina di ricerca Hotel</h1>
   
    <h2>Filtra per voto:</h2>
    <form action="alberghi.php" method="get">
        <div class="mb-3">
            <label for="voto" class="form-label">Inserici un numero da 1 a 5...</label>
            <input type="number" class="form-control" id="voto" name="voto" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary">Cerca</button>
    </form>
</div>
</body>
</html>