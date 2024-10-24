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
                        // Código PHP para preencher o select de eventos
                        ?>
                    </select>
                    <br><br>
                    <label for="campo">Selecione o que deseja atualizar:</label>
                    <select name="campo" id="campo" onchange="showInputField()">
                        <option value='nome_evento'>Nome do Evento</option>
                        <option value="data_evento">Data do Evento</option>
                        <option value="inicio_evento">Início do Evento</option>
                        <option value="fim_evento">Fim do Evento</option>
                        <option value="desc_evento">Descrição do Evento</option>
                        <option value="local_evento">Local do Evento</option>
                        <option value="responsavel_evento">Responsável pelo Evento</option>
                    </select>
                    <br><br>
                    <div id="inputField">
                        <p>Atualização:</p>
                        <input class="input" type="text" name="evento" required>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        function showInputField() {
            var campo = document.getElementById("campo").value;
            var inputField = document.getElementById("inputField");

            if (campo === "data_evento" || campo === "inicio_evento" || campo === "fim_evento") {
                inputField.innerHTML = '<p>Atualização:</p><input class="input" type="date" name="evento" required>';
            } else {
                inputField.innerHTML = '<p>Atualização:</p><input class="input" type="text" name="evento" required>';
            }
        }
    </script>
</body>
</html>
