<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>QR Code Generator</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="en_tete">
        <h1>QR Code Generator</h1>
        <form action="" method="post">
            <label for="data">Texte :</label>
            <input type="text" name="data" required>
            <button type="submit">Générer QR Code</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['data'])) {
            require_once('phpqrcode/qrlib.php');

            $data = $_POST['data'];
            $filename = 'mescodesqr/' . time() . '.png';

            QRcode::png($data, $filename);

            echo '<h2>Code QR généré :</h2>';
            echo '<img src="' . $filename . '" alt="QR Code">';
        } else {
            echo '<p>Veuillez entrer un texte pour générer le code QR.</p>';
        }
    }
    ?>    
</body>
</html>
