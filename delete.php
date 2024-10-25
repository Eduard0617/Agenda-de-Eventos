<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/delete.css">
    <title>Delete</title>
</head>

<body>
    <div class="container">
        <div class="menu">
            <div class="containerMenu">
                <div class="logo">
                    <img src="imagens/logoagenda.png" width="75px" height="75px">
                </div>
                <div class="titlelogo"><a class= "link" href="index.php">Agenda de eventos</a></div>
            </div>
            <hr class="separa">
            <button class="delete">
                <img src="imagens/delete.png" width="18px" height="18px"> Delete
            </button>
        </div>
        <div class="navBar">
            <input type="text" class="buscar" placeholder="Procurar">
            <a>Delete</a>
        </div>
        <div class="banco">
            <div class="textDelete">
                Selecione o evento que deseja excluir
            </div>
            <div class="form">
                <form action="" method="POST">
                    <label for="event">Selecione o ID do Evento que deseja excluir:</label>
                    <select name="event" id="event" required>
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $base = "defaultBase"; // Nome do banco de dados
                        $conn = mysqli_connect($host, $user, $pass, $base);
                        if (!$conn) {
                            die("Conexão falhou: " . mysqli_connect_error());
                        }
                        $asnw = mysqli_query($conn, "SELECT * FROM evento");
                        if (!$asnw) {
                            die("Erro na consulta: " . mysqli_error($conn));
                        }
                        while ($write = mysqli_fetch_array($asnw)) {
                            echo "<option value='{$write['id_evento']}'>{$write['id_evento']}</option>";
                        }
                    ?>
                    </select>
                    <br><br>
                    <input class="cadastro" type="submit" value="Excluir">
                </form>
            </div>
        </div>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event']; 
    $campo = $_POST['campo']; 
    $novo_valor = mysqli_real_escape_string($conn, $_POST['evento']);

    $conn = mysqli_connect("localhost", "root", "", "defaultBase");
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM evento WHERE id_evento = $event_id";

    if (mysqli_query($conn, $sql)) {
        echo "Evento excluido com sucesso!";
        echo "<script>
                window.location.href = 'index.php';
                </script>";
    } else {
        echo "Erro ao atualizar o evento: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
</body>
</html>
