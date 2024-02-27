<?php

$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = $_POST['length'];
    $password = generatePassword($length);
}

function generatePassword($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php password-generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-primary">

<h1 class="text-white text-center mt-5">Strong Password Generator</h1>
<h2 class="text-white text-center my-4">Genera una password sicura</h2>

<form class="bg-white w-75 mx-auto mb-5 p-5 row" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label class="col-6" for="length">Lunghezza della password:</label><br>
        <input class="col-6" type="number" id="length" name="length" min="1"><br>
        <input class="btn btn-primary col-2 mt-4" type="submit" value="Invia">
    </form>

    <div class="bg-white w-75 mx-auto my-5 p-5 text-center fw-bold">
        <?php
        if (!empty($password)) {
            echo "Password generata: $password";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>