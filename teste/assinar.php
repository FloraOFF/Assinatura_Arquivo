<?php
    // Nome do arquivo a ser assinado
    $filename = 'arquivo.txt';

    // Lê o conteúdo do arquivo
    $data = file_get_contents($filename);

    // Gera um par de chaves
    $keyPair = sodium_crypto_sign_keypair();

    // Extrai a chave secreta
    $secretKey = sodium_crypto_sign_secretkey($keyPair);

    // Assina o conteúdo do arquivo com a chave secreta
    $signature = sodium_crypto_sign_detached($data, $secretKey);

    // Salva a assinatura em um arquivo
    file_put_contents('assinatura.txt', $signature);

    // Salva a chave pública em um arquivo (para uso posterior na verificação)
    file_put_contents('chave_publica.txt', sodium_crypto_sign_publickey($keyPair));

    echo "Arquivo assinado e assinatura salva em 'assinatura.txt'.";
?>
