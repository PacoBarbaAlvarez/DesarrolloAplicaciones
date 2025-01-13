<?php
/* Configuración de validación para direcciones IPv4:
   - FILTER_FLAG_IPV4: Solo se permiten direcciones IPv4.
   - FILTER_FLAG_NO_PRIV_RANGE: Excluye direcciones privadas (192.168.x.x, 10.x.x.x, etc.).
   - FILTER_FLAG_NO_RES_RANGE: Excluye direcciones reservadas (loopback, multicast, etc.).
*/
$settings = FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE;

// Validar entrada usando filtros
$ip_address = filter_input(INPUT_POST, 'ip_address', FILTER_VALIDATE_IP, $settings);

// Si la dirección IP no es válida, se establece el valor por defecto "0.0.0.0"
$ip_address = $ip_address ?: '0.0.0.0';
?>
<?php include 'includes/header.php'; ?>

<h1>Validación de Direcciones IP</h1>
<p>Ingrese una dirección IPv4 válida (no privada ni reservada). Si es inválida, se asignará "0.0.0.0".</p>

<form action="validate-ip.php" method="POST">
  Dirección IP: <input type="text" name="ip_address" value="<?= htmlspecialchars($ip_address) ?>">
  <input type="submit" value="Guardar">
</form>

<pre><?php var_dump($ip_address); ?></pre>

<?php include 'includes/footer.php'; ?>
