<?php
$message = '';
$moved   = false;

// Verifica si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === 0) {
        $directory = '/var/www/images/';
        
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $temp = $_FILES['image']['tmp_name'];
        $path = $directory . basename($_FILES['image']['name']);

        if (move_uploaded_file($temp, $path)) {
            $moved = true;
            $message = '<p>Imagen subida con éxito:</p>';
            $message .= '<img src="/images/' . htmlspecialchars($_FILES['image']['name']) . '" width="300">';
        } else {
            $message = '<p style="color:red;">Error: No se pudo guardar la imagen.</p>';
        }
    } else {
        $message = '<p style="color:red;">Error: No se seleccionó ningún archivo o hubo un problema con la subida.</p>';
    }
}
?>

<?php include 'includes/header.php'; ?>
<?= $message ?>

<form method="POST" action="move-file.php" enctype="multipart/form-data">
  <label for="image"><b>Subir imagen de perfil:</b></label>
  <input type="file" name="image" accept="image/*" id="image"><br>
  <input type="submit" value="Subir imagen">
</form>

<?php include 'includes/footer.php'; ?>
