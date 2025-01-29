<?php
$message = ''; // Initialize message

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form is submitted
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) { // If no errors
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Define allowed file types and size limit
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $maxFileSize = 5 * 1024 * 1024; // 5 MB

        if (in_array($fileExtension, $allowedfileExtensions)) {
            if ($fileSize <= $maxFileSize) {
                $uploadFileDir = './uploads/';
                $dest_path = $uploadFileDir . $fileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $message = '<b>File:</b> ' . $fileName . '<br>';
                    $message .= '<b>Size:</b> ' . $fileSize . ' bytes<br>';
                    $message .= '<b>Type:</b> ' . $fileType . '<br>';
                    $message .= 'File uploaded successfully.';
                } else {
                    $message = 'A ocurrido un error al mover el archivo';
                }
            } else {
                $message = 'El archivo es mayor a 5 MB.';
            }
        } else {
            $message = 'Solo se admiten los siguientes tipos: ' . implode(', ', $allowedfileExtensions);
        }
    } else {
        $message = 'El archivo no se puede subir. Error code: ' . $_FILES['image']['error'];
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
  <label for="image"><b>Upload file:</b></label>
  <input type="file" name="image" accept="image/*" id="image"><br>
  <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php'; ?>