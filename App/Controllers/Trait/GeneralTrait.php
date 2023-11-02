<?php

trait GeneralTrait {
    public function uploadFileWithHash($fileInputName, $uploadDirectory)
    {
        if (isset($_FILES[$fileInputName])) {
            $file = $_FILES[$fileInputName];

            // Verifica se houve algum erro no upload
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Gere um nome de arquivo único com hash
                $originalFileName = $file['name'];
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $hashedFileName = md5(uniqid(rand(), true)) . '.' . $fileExtension;

                // Caminho completo para o arquivo de destino
                $destinationPath = $uploadDirectory . '/' . $hashedFileName;

                // Realiza o upload do arquivo
                if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
                    // Arquivo foi enviado com sucesso, retorne um array com os nomes
                    return [
                        'nome_original' => $originalFileName,
                        'imagem' => $hashedFileName,
                        'status' => 1
                    ];
                } 
                    return null;
            } 
                return null;
        } 
         return null;
    }
}