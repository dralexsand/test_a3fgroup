<?php

use App\Services\ParserTagService;

require __DIR__ . '/../vendor/autoload.php';

$parserService = new ParserTagService();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parser tag</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">

</head>
<body class="container">

<form
    
    class="mb-3">
    <label for="formGroupExampleInput" class="form-label">
        Enter url to parse
    </label>
    <input
        type="text"
        class="form-control"
        id="formGroupExampleInput"
        placeholder="url">

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">
            Go parser
        </button>
    </div>

</form>

</body>
</html>
