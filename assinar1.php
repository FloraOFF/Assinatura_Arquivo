<?php
    // Gerar um par de chaves
    $authorKeyPair = sodium_crypto_sign_keypair();
    $authorSecretKey = sodium_crypto_sign_secretkey($authorKeyPair);
    $authorPublicKey = sodium_crypto_sign_publickey($authorKeyPair);

    // Assumindo que você tem o arquivo que deseja assinar (por exemplo, "documento.txt")
    $filename = 'documento.txt';
    $fileContents = file_get_contents($filename);

    // Assine o conteúdo do arquivo com a chave secreta do autor
    $signature = sodium_crypto_sign_detached($fileContents, $authorSecretKey);

    // Salve o arquivo assinado em algum lugar
    file_put_contents('documento_assinado.txt', $fileContents . $signature);

    $publicKeyFile = 'author_public_key.key'; // Nome do arquivo onde a chave pública será armazenada
    file_put_contents($publicKeyFile, $authorPublicKey);

    echo "Arquivo assinado com sucesso.";

?>