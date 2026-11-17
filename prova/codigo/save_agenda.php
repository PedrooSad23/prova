<?php
require_once "conexao.php";

$idpaciente = $_POST['idpaciente'];
$idprofissional = $_POST['idprofissional'];
$data_consulta = $_POST['data_consulta'];
$horario = $_POST['horario'];
$motivo = $_POST['motivo'];


$sql = "INSERT INTO agendamento (idpaciente, idprofissional, data_consulta, horario, motivo) VALUES (?, ?, ?, ?, ?)";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "iisss", $idpaciente, $idprofissional, $data_consulta, $horario, $motivo);
mysqli_stmt_execute($comando);

header("Location: index.php");
?>