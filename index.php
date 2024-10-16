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
            <div class="dashboard">
                <img src="imagens/dashboard.png" width="18px" height="18px">
                <a> Dashboard </a>
            </div>
            <div class="update">
                <img src="imagens/update.png" width="18px" height="18px">
                <a> Update </a>
            </div>
            <div class="delete">
                <img src="imagens/delete.png" width="18px" height="18px">
                <a> Delete </a>
            </div>
        </div>
        <div class="navBar">
            <input type="text" class="buscar">
            
                <button class="create" onclick="togglePopup()">+ New Task</button>
                <div class="overlay" id="overlay"></div>
                <div class="popUp" id="slidingPopup">
                    <span class="close-btn" onclick="togglePopup()">&times;</span>
                    <form class="alinha-popUp" action="index.php" method="post">
                        <p>Insira novos dados:</p>
                        <p>id do evento:</p>
                        <input class="input" type="number" name="id">
                        <p>nome do evento:</p>
                        <input class="input" type="text" name="evento">
                        <p>data do evento:</p>
                        <input class="input" type="date" name="data">
                        <p>início do evento:</p>
                        <input class="input" type="datetime-local" name="inicio">
                        <p>fim do evento:</p>
                        <input class="input" type="datetime-local" name="fim">
                        <p>descrição do evento:</p>
                        <input class="input" type="text" name="descricao">
                        <p>local do evento:</p>
                        <input class="input" type="text" name="local">
                        <p>responsável pelo evento:</p>
                        <input class="input" type="text" name="responsavel">
                        <br/>
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
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } catch (Exception $e) {
        echo "<h1>Erro ao cadastrar dados!</h1><h2>Confira se os dados cadastrados estão corretos</h2>";
    }
}

$answ = mysqli_query($conn, "SELECT * FROM evento");

echo "<table class='tabela'>
    <tr>
        <th class='header'>Código do evento</th>
        <th class='header'>Nome do evento</th>
        <th class='header'>Data</th>
        <th class='header'>Início</th>
        <th class='header'>Fim</th>
        <th class='header'>Descrição</th>
        <th class='header'>Local</th>
        <th class='header'>Responsável</th>
    </tr>";

while ($write = mysqli_fetch_array($answ)) {
    echo "<tr>
        <td class='conteudo'>{$write['id_evento']}</td>
        <td class='conteudo'>{$write['nome_evento']}</td>
        <td class='conteudo'>{$write['data_evento']}</td>
        <td class='conteudo'>{$write['inicio_evento']}</td>
        <td class='conteudo'>{$write['fim_evento']}</td>
        <td class='conteudo'>{$write['desc_evento']}</td>
        <td class='conteudo'>{$write['local_evento']}</td>
        <td class='conteudo'>{$write['responsavel_evento']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($conn);
?>


        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
