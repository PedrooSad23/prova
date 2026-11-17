<?php
require_once "conexao.php";

$idagendamento = $_POST['idagendamento'];
$idpaciente = $_POST['idpaciente'];
$data_consulta = $_POST['data_consulta'];
$horario = $_POST['horario'];

$sql = "SELECT * FROM agendamento";
$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "iss", $horario);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 1) {
    $paciente = mysqli_fetch_array($resultado);
    $consulta_data = $paciente['data_consulta'];
    $consulta_horario = $paciente['horario'];

    if (password_verify($data_consulta, $consulta_data)) {
        session_start();
        $_SESSION['idpaciente'] = $paciente['idpaciente'];
        $_SESSION['data_consulta'] = $paciente['data_consulta'];
        $_SESSION['horario'] = $paciente['horario'];

        header("Location: save_agendamento.php");
    } else {
        header("Location: erro.html");
    }
} else {
    header("Location: erro2.html");
}
?>


<?php
require_once "conexao.php";

$idagendamento = $_POST['idagendamento'];
$idprofissional = $_POST['idprofissional'];
$data_consulta = $_POST['data_consulta'];
$horario = $_POST['horario'];

$sql2 = "SELECT * FROM agendamento";
$comando2 = mysqli_prepare($conexao, $sql2);

mysqli_stmt_bind_param($comando, "iss", $horario);
mysqli_stmt_execute($comando);

$resultado2 = mysqli_stmt_get_result($comando2);

$quantidade2 = mysqli_num_rows($resultado2);

if ($quantidade2 == 1) {
    $profissional = mysqli_fetch_array($resultado);
    $consulta_data2 = $profissional['data_consulta'];
    $consulta_horario = $profissional['horario'];

    if (password_verify($data_consulta, $consulta_data2)) {
        session_start();
        $_SESSION['idprofissional'] = $profissional['idprofissional'];
        $_SESSION['data_consulta'] = $profissional['data_consulta'];
        $_SESSION['horario'] = $profissional['horario'];

        header("Location: save_agendamento.php");
    } else {
        header("Location: erro.html");
    }
} else {
    header("Location: erro2.html");
}
?>