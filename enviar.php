<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

// Criar uma nova instância do PHPMailer
$mail = new PHPMailer();

// Definir o modo de envio como SMTP
$mail->isSMTP();

// Configurações do servidor SMTP
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->Username = 'am.promotoraslz@gmail.com';
$mail->Password = 'loze ntnu mvbz hhzt';

// Configurações do e-mail
$mail->setFrom('am.promotoraslz@gmail.com', 'AM Promotora');
$mail->addReplyTo('am.promotoraslz@gmail.com', 'AM Promotora');
$mail->addAddress('am.promotoraslz@gmail.com', 'AM Promotora');
$mail->Subject = 'Cliente enviou mensagem!';

// Corpo do e-mail (mensagem de texto simples)
$nome = $_POST['name'];
$mensagem = $_POST['message'];
$telefone = $_POST['telefone'];
$email_cliente = $_POST['email'];

// Configurar o corpo do e-mail
$mail->Body = $mensagem . " || Email: " . $email_cliente . " | Contato: " . $telefone . " | Nome: " . $nome;

// Envio do e-mail e tratamento de erros
$response = array('success' => false, 'message' => 'Erro ao enviar o e-mail');

if ($mail->send()) {
    $response = array('success' => true, 'message' => 'Email enviado com sucesso!');
}

// Enviar resposta para o cliente em formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>