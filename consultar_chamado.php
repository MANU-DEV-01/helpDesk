<?php
  require_once "validador_acesso.php"
  echo "string";
?>
<?php
  $chamados = array();

  echo $_SESSION['perfil_id'];

  //abrir arquivo.hd
  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');

  //enquanto houver registro a serem recuperados
  while(!feof($arquivo)){//testa pelo fim do arquivo

    //pegando as linhas
    $registro = fgets($arquivo);

    //explode dos detalhes do registro para verificar o id do usuario
    $registro_detalhes = explode('-', $registro);

    //perfil_id == 2 o chamado só exibe se for criada pelo usuario que o fez
    if ($_SESSION['perfil_id' == 2]) {
      //se o usuario autenticado não for p usuario de abertura do chamado entao nao faz nada
      if ($_SESSION['id'] != $registro_detalhes[0]) {
        continue;
        //nao faz nada
      }else{
        //adiciona os registro do arquivo ao array
         $chamados[] = $registro;
      }
    }else {
      $chamados[] = $registro;  
    }
   
  }

  fclose($arquivo);
  
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php foreach($chamados as $chamado){ ?>
                 <?php 
                  $chamado_dados = explode('-', $chamado);

                  //nao existe detalhes do chamado se ele não estiver aberto

                  if (count($chamado_dados) < 3) {
                    continue;
                  }
                 ?>

                <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>

                </div>
              </div>
              <?php } ?>


              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">Título do chamado...</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                  <p class="card-text">Descrição do chamado...</p>

                </div>
              </div>

              

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block"  href="call.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>