<?php
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <h2>Cadastrar Agenda</h2>

    <form action="save_agenda.php" method="POST">

        Paciente:
        <br>
        <select name="idpaciente">
            <?php
            $sql = "SELECT * FROM paciente";
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultados = mysqli_stmt_get_result($comando);

            while ($linha = mysqli_fetch_array($resultados)) {
                $idpaciente = $linha['idpaciente'];
                $nome = $linha['nome'];

                echo "<option value='$idpaciente'>$nome</option>";
            }
            ?>
        </select>

        <br>

        Profissional:
        <br>
        <select name="idprofissional">
            <?php
            $sql_profissional = "SELECT * FROM profissional";
            $comando_profissional = mysqli_prepare($conexao, $sql_profissional);
            mysqli_stmt_execute($comando_profissional);
            $resultados_profissional = mysqli_stmt_get_result($comando_profissional);

            while ($linha_profissional = mysqli_fetch_array($resultados_profissional)) {
                $idprofissional = $linha_profissional['idprofissional'];
                $nome_profissional = $linha_profissional['nome'];

                echo "<option value='$idprofissional'>$nome_profissional <br>";
            }
            ?>
        </select>

        <br>

        Data da Consulta:
        <br>
        <input type="date" name="data_consulta">

        <br>
        Horário da Consulta:
        <br>
        <input type="time" name="horario">

        <br>

        Motivo da Consulta:
        <br>
        <textarea name="motivo" placeholder="Estou passando mal"></textarea>

        <br>
        <input type="submit" value="Gravar">

    </form>

</body>

</html>