<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <button class="update" onclick="window.location.href='update.html'">
                <img src="imagens/update.png" width="18px" height="18px"> Update
            </button>

            <button class="delete" onclick="window.location.href='update.html'">
                <img src="imagens/delete.png" width="18px" height="18px"> Delete
            </button>
            <div class="overlay" id="overlay"></div>
            <div class="popUp" id="slidingPopupUpdate">
                <span class="close-btn" onclick="togglePopup('slidingPopupUpdate')">&times;</span>
                <form class="alinha-popUp" action="index.php" method="post">
                    <div class="insira">Evento que deseja Excluir:</div>
                    <p>Nome do Evento:</p>
                    <input class="input" type="text" name="evento">
                    <hr>
                    <p>Data do Evento:</p>
                    <input class="input" type="date" name="data">
                    <p>Início do Evento:</p>
                    <input class="input" type="datetime-local" name="inicio">
                    <p>Fim do Evento:</p>
                    <input class="input" type="datetime-local" name="fim">
                    <p>Descrição do Evento:</p>
                    <input class="input" type="text" name="descricao">
                    <p>Local do Evento:</p>
                    <input class="input" type="text" name="local">
                    <p>Responsável Pelo Evento:</p>
                    <input class="input" type="text" name="responsavel">
                    <br />
                    <input class="cadastro" type="submit" value="Atualizar!">
                </form>
            </div>
        </div>
        <div class="navBar">
            <input type="text" class="buscar" placeholder="Procurar">
            <button class="create" onclick="togglePopup('slidingPopupCreate')">+ New Task</button>
            <div class="overlay" id="overlay"></div>
            <div class="popUp" id="slidingPopupCreate">
                <span class="close-btn" onclick="togglePopup('slidingPopupCreate')">&times;</span>
                <form class="alinha-popUp" action="index.php" method="post">
                    <div class="insira">Insira o Evento:</div>
                    <p>Nome do Evento:</p>
                    <input class="input" type="text" name="evento">
                    <p>Data do Evento:</p>
                    <input class="input" type="date" name="data">
                    <p>Início do Evento:</p>
                    <input class="input" type="datetime-local" name="inicio">
                    <p>Fim do Evento:</p>
                    <input class="input" type="datetime-local" name="fim">
                    <p>Descrição do Evento:</p>
                    <input class="input" type="text" name="descricao">
                    <p>Local do Evento:</p>
                    <input class="input" type="text" name="local">
                    <p>Responsável Pelo Evento:</p>
                    <input class="input" type="text" name="responsavel">
                    <br />
                    <input class="cadastro" type="submit" value="Cadastrar!">
                </form>
            </div>
            <script src="script.js"></script>
        </div>
        <div class="banco">
            <?php
            $host = "localhost:3306";
            $user = "root";
            $pass = "";
            $base = "defaultBase"; // Certifique-se de que o nome do banco de dados está correto
            $conn = mysqli_connect($host, $user, $pass, $base);

            if (!$conn) {
                die("Conexão falhou: " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_evento = isset($_POST["id"]) ? $_POST["id"] : "";
                $nome_evento = isset($_POST["evento"]) ? $_POST["evento"] : "";
                $data_evento = isset($_POST["data"]) ? $_POST["data"] : "";
                $inicio_evento = isset($_POST["inicio"]) ? $_POST["inicio"] : "";
                $fim_evento = isset($_POST["fim"]) ? $_POST["fim"] : "";
                $desc_evento = isset($_POST["descricao"]) ? $_POST["descricao"] : "";
                $local_evento = isset($_POST["local"]) ? $_POST["local"] : "";
                $responsavel_evento = isset($_POST["responsavel"]) ? $_POST["responsavel"] : "";

                try {
                    mysqli_query($conn, "INSERT INTO evento (id_evento, nome_evento, data_evento, inicio_evento, fim_evento, desc_evento, local_evento, responsavel_evento) VALUES ('$id_evento', '$nome_evento', '$data_evento', '$inicio_evento', '$fim_evento', '$desc_evento', '$local_evento', '$responsavel_evento')");
                    // Redireciona após a inserção
                    echo "<script>
                        window.location.href = 'index.php';
                      </script>";
                } catch (Exception $e) {
                    echo "<h1>Erro ao cadastrar dados!</h1><h2>Confira se os dados cadastrados estão corretos</h2>";
                }
            }

            echo "<div class='event-container'>";
            $answ = mysqli_query($conn, "SELECT * FROM evento");

            while ($write = mysqli_fetch_array($answ)) {
                echo "<div class='event-card'>
                            <h2>{$write['nome_evento']}</h2>
                            <p><strong>ID:</strong> {$write['id_evento']}</p>
                            <p><strong>Data:</strong> {$write['data_evento']}</p>
                            <p><strong>Horário de Início:</strong> {$write['inicio_evento']}</p>
                            <p><strong>Horário de Término:</strong> {$write['fim_evento']}</p>
                            <p><strong>Descrição:</strong> {$write['desc_evento']}</p>
                            <p><strong>Local:</strong> {$write['local_evento']}</p>
                            <p><strong>Responsável:</strong> {$write['responsavel_evento']}</p>
                        </div>";
            }
            echo "</div>";

            mysqli_close($conn);
            ?>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>