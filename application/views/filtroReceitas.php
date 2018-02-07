
<!-- lista de despesas -->

<center><h1><?php
if (isset($data)) {
  $a = date('m', strtotime($data));
  echo "Receitas ";
  if($a == '01'){
    echo "Janeiro";
  }else if ($a == '02') {
    echo "Fevereiro";
  }else if ($a == '03') {
    echo "Março";
  }else if ($a == '04') {
    echo "Abril";
  }else if ($a == '05') {
    echo "Maio";
  }else if ($a == '06') {
    echo "Junho";
  }else if ($a == '07') {
    echo "Julho";
  }else if ($a == '08') {
    echo "Agosto";
  }else if ($a == '09') {
    echo "Setembro";
  }else if ($a == '10') {
    echo "Outubro";
  }else if ($a == '11') {
    echo "Novembro";
  }else if ($a == '12') {
    echo "Dezembro";
  }
echo " / ".date('Y', strtotime($data));;
}?></h1></center>

<div class="col-xs-12 col-lg-12">
  <h3 align="center" style="color:green;">Receita do mês: R$ 
    <?php
    if (isset($receitas)) {
      $a = 0;
      foreach ($receitas as $receita) {
        $a += $receita->valor;
      }
      echo $a;
    }
    ?>
  </h3>

  <center></center>
</div>


<div class="col-xs-12 col-lg-6">
  <center><h4><span class="glyphicon glyphicon-list-alt"></span> Receitas do Mês</h4></center>
  <?php
  if (isset($receitas)) {?>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr bgcolor="#C0C0C0">
        <th>Descrição</th>
        <th>Valor</th>
        <th>Excluir</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($receitas as $receita) {
        ?>
        <tr>
          <td><?php echo $receita->descricaoR; ?></td>
          <td class="valorP">R$ <?php echo $receita->valor; ?></td>
          <td><center><a href="<?= base_url("index.php/controller/deletarReceita/$receita->idReceita")?>"><span class="glyphicon glyphicon-trash"></span></a></center></td>
          <td><center><a href="<?= base_url("index.php/controller/Receitas/$receita->idReceita")?>"><span class="glyphicon glyphicon-edit"></span><a></center></td>
          </tr>
          <?php
        }
      }else{
        echo "Nenhuma Compra Hoje";

      }
      ?>    
    </tbody>
  </table>
</div>

<div class="col-xs-12 col-lg-6">
    <center><h4>Clique em uma receita para editar:</h4></center>
    <?php echo form_open('controller/alterarReceita');
    if (isset($Editar)) {
      foreach ($Editar as $Edit){
      # code...
      ?>
      <input type="hidden" name="idReceita" value="<?php echo $Edit->idReceita?>">
      <div class="form-group">
        <label for="descricao"><span class="glyphicon glyphicon-pencil"></span> Descrição:</label>
        <input class="form-control" name="desc" id="descricao" type="text" value="<?php echo $Edit->descricaoR?>" />
      </div>

      <div class="form-group">
        <label for="valor"> Valor:</label>
        <input class="form-control" name="valor" id="valor" type="text" value="<?php echo $Edit->valor?>" />
      </div>

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Alterar</button>
      <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
    </div>
    <?php 
  }
}else {?>

  <center><h1><span class="glyphicon glyphicon-eye-close"></span></h1><br>
<?php
}
echo form_close(); ?>
</div>
      <!-- fim lista de despesas -->