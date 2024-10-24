<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/update.css">
    <title>Agenda</title>
</head>

<body>
    <div class="container">
        <div class="menu">
            <div class="containerMenu">
                <div class="logo">
                    <img src="imagens/logoagenda.png" width="75px" height="75px">
                </div>
                <div class="titlelogo">Agenda de eventos</div>
            </div>
            <hr class="separa">
            <button class="update">
                <img src="imagens/update.png" width="18px" height="18px"> Update
            </button>
        </div>
        <div class="navBar">
            <input type="text" class="buscar" placeholder="Procurar">
            <a>Update</a>
        </div>
        <div class="banco">
            <div class="textUpdate">
                Selecione o evento que deseja atualizar
            </div>
            <div class="form">
                <form action="index.php" method="POST">
                    <label for="event">Selecione o ID do Evento que deseja atualizar:</label>
                    <select name="event" id="event">
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $base = "defaultBase"; // Certifique-se de que o nome do banco de dados está correto
                        $conn = mysqli_connect($host, $user, $pass, $base);

                        if (!$conn) {
                            die("Conexão falhou: " . mysqli_connect_error());
                        }

                        $asnw = mysqli_query($conn, "SELECT * FROM evento");
                        if (!$asnw) {
                            die("Erro na consulta: " . mysqli_error($conn));
                        }

                        while ($write = mysqli_fetch_array($asnw)) {
                            echo "<option value='{$write['id_evento']}'>{$write['id_evento']}</option>"; // Mostrando o nome do evento
                        }

                        mysqli_close($conn); // Fecha a conexão com o banco de dados
                        ?>
                    </select>
                    <br><br>
                    <label for="campo">Selecione o que deseja atualizar:</label>
                    <select name="campo" id="$campo">
                        <option value='nome_evento'>Nome do Evento</option>
                        <option value="data_evento">Data do Evento</option>
                        <option value="inicio_evento">Início do Evento</option>
                        <option value="fim_evento">Fim do Evento</option>
                        <option value="desc_evento">Descrição do Evento</option>
                        <option value="local_evento">Local do Evento</option>
                        <option value="responsavel_evento">Responsável pelo Evento</option>
                    </select>
                    <br><br>
                    <form class="updateData" action="index.php" method="post">
                    <p>Atualização:</p>
                    <input class="input" type="text" name="evento">
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event'];
    $campo = $_POST['campo'];


 switch ($campo) {
    case 'nome_evento';

 }

 }
?>
