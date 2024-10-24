<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./update.css">
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
                <img src="imagens/update.png" width="18px" height="18px"> UPDATE
            </button>
    </div>
    <div class="navBar">
            <input type="text" class="buscar" placeholder="Procurar"></input>
            <a>Update</a>
    </div>
    <div class="banco">
        <div class="textUpdate">
            Selecione o evento que deseja atualizar
        </div>
        <div class="form">
            <form action="index.php">
                <label for="cars">Selecione o nome do Evento que deseja atualizar:</label>
                <select name="cars" id="cars">
                  <option value="volvo">Volvo</option>
                  <option value="saab">Saab</option>
                  <option value="opel">Opel</option>
                  <option value="audi">Audi</option>
                </select>
                <br><br>
                <input type="submit" value="Submit">
              </form>
        </div>
        </div>
    </div>
</body>
</html>