<?php
    if (extension_loaded('sodium')) {
        echo 'A extensão Libsodium está habilitada no PHP.';
    } else {
        echo 'A extensão Libsodium não está habilitada no PHP.';
    }

    echo "Funciona";

    phpinfo();

?>

