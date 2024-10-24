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
                    <label for="cars">Selecione o ID do Evento que deseja atualizar:</label>
                    <select name="cars" id="cars">
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
                            echo "<option value='{$write['id_evento']}'>{$write['id_evento']}</option>"; // Mostrando o ID
                        }

                        mysqli_close($conn); // Fecha a conexão com o banco de dados

                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>