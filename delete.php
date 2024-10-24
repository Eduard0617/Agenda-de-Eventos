<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./delete.css">
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
            <button class="delete">
                <img src="imagens/delete.png" width="18px" height="18px"> delete
            </button>
    </div>
    <div class="navBar">
        <input type="text" class="buscar" placeholder="Procurar"></input>
            <a>DELETE</a>
    </div>
    <div class="banco">
        <div class="textDelete">
            Selecione o evento que deseja apagar
        </div>
        <div class="form">
            <form action="index.php">
                <label for="cars">Selecione o nome do Evento que deseja apagar:</label>
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