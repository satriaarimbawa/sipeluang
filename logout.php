<?php

session_start();

session_destroy();

echo "<script>
alert('anda telah keluar dari web');
document.location.href = 'login/index.php';
</script>";

