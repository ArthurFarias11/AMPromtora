<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o e-mail foi enviado via método POST

    // Captura as informações enviadas pelo formulário
    $email = $_POST["email"];
    $nome = $_POST['name'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['message'];

    // Aqui você pode realizar validações adicionais, por exemplo, verificar se o e-mail é válido.

    // Constrói a mensagem do e-mail com as informações do usuário
    $message = "E-mail recebido de: $email\n";
    $message .= "Nome: $nome\n";
    $message .= "Telefone: $telefone\n";
    $message .= "Mensagem: $mensagem";

    // Envia o e-mail
    $to = "ampromotora@gmail.com"; // Substitua pelo seu endereço de e-mail
    $subject = "Cliente $nome enviou mensagem!";
    $headers = "From: $email"; // Utiliza o e-mail do remetente como cabeçalho "From"

    if (mail($to, $subject, $message, $headers)) {
        echo "E-mail enviado com sucesso!";
        exit();
    } else {
        echo "Erro ao enviar o e-mail. Por favor, tente novamente.";
        exit();
    }
} else {
    // Se não for uma requisição POST, redireciona para a página inicial ou mostra uma mensagem de erro
    header("Location: ../index.html");
    exit();
}

?>
