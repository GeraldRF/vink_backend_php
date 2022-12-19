<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endpoint not found</title>
    <style>
        .error {
            color: red;
            width: 100%;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-shrink: 1;
            flex-grow: 1;
        }
        .title {
            font-size: 4rem;
        }
        .text {
            font-size: x-large;
        }
    </style>
</head>
<body>
    <div class="error">
        <div class="title">404</div>
        <div class="text">No se encontro el endpoint.</div>
    </div>
</body>
</html>