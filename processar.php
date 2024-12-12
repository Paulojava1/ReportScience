<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = [
        "nome" => $_POST['nome'] ?? "Não informado",
        "participantes" => $_POST['participantes'] ?? "Não informado",
        "importancia" => $_POST['importancia'] ?? "#000000",
        "tipo" => isset($_POST['tipo']) ? implode(", ", $_POST['tipo']) : "Nenhum selecionado",
        "link" => $_POST['link'] ?? "Não informado",
    ];

    // Lida com upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $nomeImagem = basename($_FILES['imagem']['name']);
        $caminhoDestino = 'imagens/' . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
            $dados['imagem'] = $caminhoDestino;
        } else {
            $dados['imagem'] = "Erro ao fazer upload da imagem.";
        }
    } else {
        $dados['imagem'] = "Nenhuma imagem enviada.";
    }

    // Codifica os dados como JSON e redireciona
    $dadosJson = urlencode(json_encode($dados));
    header("Location: dados.html?dados=$dadosJson");
    exit();
}
?>
