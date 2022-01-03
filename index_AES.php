<?php 
    require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation

    $timer = microtime(true);

    // initialise password & plaintext if not set in post array
    $pw = empty($_POST['pw']) ? 'L0ck it up saf3'              : $_POST['pw'];
    $pt = empty($_POST['pt']) ? '' : $_POST['pt'];
    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];
    $plain  = empty($_POST['plain'])  ? '' : $_POST['plain'];

    // perform encryption/decryption as required
    $encr = empty($_POST['encr']) ? $cipher : AesCtr::encrypt($pt, $pw, 256);
    $decr = empty($_POST['decr']) ? $plain  : AesCtr::decrypt($cipher, $pw, 256);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AES in PHP</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">    
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/frontend.js"></script>
</head>
<body>
    <header id="header">
        <div class="centered-wrapper cf">
            <h1>Enkripsi AES</h1>
        </div>      
    </header>
    </div>
    <div class="centered-wrapper cf">
        <form method="post">

            <h2>Masukka Plaintext :</h2>
            <input type="text" name="pt" size="40" value="<?= htmlspecialchars($pt) ?>" autocomplete="off">

            <br><br>
            <button type="submit" name="encr" value="Encrypt it">Enkripsi</button>
            <input type="text" name="cipher" size="80" value="<?= $encr ?>" autocomplete="off">

            <br><br>
            <button type="submit" name="decr" value="Decrypt it">Dekripsi</button>
            <input type="text" name="plain" size="40" value="<?= htmlspecialchars($decr) ?>" autocomplete="off">
        </form>
    </div>
</body>
</html>