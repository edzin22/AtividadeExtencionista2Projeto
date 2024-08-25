<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara e faz a inserção
$sql = "INSERT INTO usuarios (nome, email, telefone, sexo, data_nascimento, endereco)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nome, $email, $telefone, $sexo, $data_nascimento, $endereco);

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$data_nascimento = $_POST['data_nascimento'];
$endereco = $_POST['endereco'];

if ($stmt->execute()) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
