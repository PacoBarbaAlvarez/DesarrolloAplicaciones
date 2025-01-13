<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Escaping Example</title>
</head>
<body>
    <h1>Escaping User Input</h1>
    <p>Click the link below to send a potentially malicious message:</p>
    <a href="xss.php?msg=<script>alert('XSS Attempt!')</script>">
        Potentially Malicious Link
    </a>
</body>
</html>
<?php include 'includes/footer.php' ?>
