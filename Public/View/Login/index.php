<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saúde Informa</title>
  <link rel="stylesheet" href="<?=ROTA_GERAL?>/Public/Styles/css/login.css">
  <script src="<?=ROTA_GERAL?>/Public/Styles/js/jquery-v3.7.js"></script>
</head>
<body>
  <div class="container">
    <form class="login" id="form-login" method="post">
      <h2>Saude Informa</h2>
      <input type="email" placeholder="Usuário" name="email" required>
      <input type="password" placeholder="Senha" name="senha" required>
      <button type="button" id="enviar">Entrar</button>
      <a href="#" class="esqueci-senha">Esqueci a senha</a>
    </form>
  </div>

  <script>
     $('#enviar').on('click', function(event){
      event.preventDefault();
      
      $.ajax({
        url: '<?=ROTA_GERAL?>/Login/auth',
        method:'POST',
        dataType: 'JSON',
        contentType: false,
	      cache: false,
	      processData:false,
        data: new FormData(document.getElementById("form-login")),
        success: function (res) {
          if (res === "acesso permitido") {
            window.location.href = "<?=ROTA_GERAL?>/Login";
          }
        }
      });        
     })
  </script>
</body>
</html>


