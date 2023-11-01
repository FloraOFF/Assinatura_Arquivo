<?php
    // Nome do arquivo a ser verificado
    $filename = 'arquivo.txt';

    // Lê o conteúdo do arquivo
    $data = file_get_contents($filename);

    // Lê a assinatura do arquivo
    $signature = file_get_contents('assinatura.txt');

    // Lê a chave pública do arquivo
    $publicKey = file_get_contents('chave_publica.txt');

    // Verifica a assinatura
    if (sodium_crypto_sign_verify_detached($signature, $data, $publicKey)) {
        echo "A assinatura é válida. O arquivo não foi alterado.";
    } else {
        echo "A assinatura é inválida. O arquivo pode ter sido alterado.";
    }
?>
