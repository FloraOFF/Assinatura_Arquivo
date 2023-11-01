<?php
    // Carregue o arquivo assinado
    $signedFile = file_get_contents('documento_assinado.txt');

    // Separe o conteúdo do arquivo e a assinatura
    $fileContents = substr($signedFile, 0, -64);
    $signature = substr($signedFile, -64);

    // Carregue a chave pública do autor (quem fez a assinatura)
    $authorPublicKey = file_get_contents('author_public_key.key');

    // Verifique a assinatura usando a chave pública
    $isValid = sodium_crypto_sign_verify_detached($signature, $fileContents, $authorPublicKey);

    if ($isValid) {
        echo "A assinatura é válida. O arquivo não foi alterado e foi assinado pelo autor.";
    } else {
        echo "A assinatura é inválida. O arquivo foi alterado ou a chave pública do autor está incorreta.";
    }

?>