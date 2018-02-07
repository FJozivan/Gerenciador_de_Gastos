<body>
  <!-- menu -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button><a class="navbar-brand" href="#">Gestão de Despesas</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?= base_url("index.php/controller")?>">Inicio</a></li>
          <li><a href="<?= base_url("index.php/controller/Receitas/0")?>" >Receitas</a></li>
          <li><a href="#Filtro" data-toggle="modal" >Filtros</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top:50px">
    <div class="row">
      <div class="col-xs-12 col-lg-12">
        <h3 align="center" style="color:green;"> 
          <span class="glyphicon glyphicon-calendar"></span> <?php echo date('d/m/Y', strtotime(date('Y-m-d')));?> 
          
          &nbsp&nbsp&nbsp&nbsp&nbsp
          
          Saldo Atual: R$ 
          
          <?php
          if (isset($Saldo)) {
            foreach ($Saldo  as $Sald) {
              echo $Sald->ValorSaldo;
            }
          }else{
            echo "0";
          }?>

          &nbsp&nbsp&nbsp&nbsp
          
          <button type="button" data-toggle="modal" data-target="#cadDespesa" data-whatever="@mdo" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Compra</button>

          &nbsp&nbsp&nbsp

          <button type="button" data-toggle="modal" data-target="#cadReceita" data-whatever="@mdo" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Receita</button>
          
        </h3>
        
        <!-- fim menu -->
