<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="<?=ROTA_GERAL?>/Public/Styles/css/style.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div id="container">
        <header id="menu-mobile">
            <div id="logo">
                *
            </div>
            <div id="barrinhas" onclick="test()">
                |||
            </div>
            <div id="sidebar">
                <nav id="nav">
                    <ul>
                        <li><a href="">VACINAS</a></li>
                        <li><a href="">CONSULTA CLÍNICA</a></li>
                        <li><a href="">ACOMPANHAMENTO</a></li>
                        <li><a href="">DENTISTA</a></li>
                        <li><a href="">GESTANTE</a></li>
                        <li><a href="">PUERICULTURA</a></li>
                        <li><a href="">INÍCIO</a></li>
                    </ul>
                </nav>
            </div>
            <h1>
               Saúde Informa 
            </h1>
            <div id="nav-pc">
                <p><a href="index.html">Inicio</a></p>
                <p><a href="../Tela Sobre/tela.html">Sobre</a></p>
                <p><a href="../tela de contato/index.html">Contado</a></p>
            </div>

        </header>
        <div id="apresentacao">
            <p>Acesso aos serviços de unidades básica de saúde.</p>
            <img src="<?=ROTA_GERAL?>/Public/Styles/assets/medica.png" alt="">
        </div>
        <div id="atendimentos">
        <a href="../vacinas/index.html">
            <div class="caixas"><p>VACINAS</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/seringa.svg" alt="">
            </div>
        </a>
            <div class="caixas"><p>CONSULTA CLÍNICA</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/clinica.svg" alt="">
            </div>
            <div class="caixas"><p>DENTISTA</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/dente.svg" alt="">
            </div>
            <div class="caixas"><p>GESTANTE</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/gestante.svg" alt="">
            </div>
        </div>
        <div id="footer">
            <p>Desenvolvido com &#x2665; por Prosub III & Proeja V</p>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>