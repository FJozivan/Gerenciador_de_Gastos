<!-- lista de despesas -->
<div class="col-xs-12 col-lg-12">
  <center><h1><?php
  if (isset($lancamentos)) {
    foreach ($lancamentos  as $lancamento) {
      $data =  date('d/m/Y', strtotime($lancamento->data));
    }
    echo "Despesas: ".$data;
  }?></h1></center>
</div>
<div class="col-xs-12 col-lg-12">
  <h3 align="center" style="color: red;">
  <?php
  if (isset($lancamentos)) {
    $valorT = 0;
    foreach ($lancamentos  as $lancamento) {
      $valorT +=  $lancamento->Valor;
    }
    echo "Gasto do dia: R$ ".$valorT;
  }?> </h3>
</div>

<div class="col-xs-12 col-lg-6">
  <center><h4><span class="glyphicon glyphicon-list-alt"></span> Compras</h4></center>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr bgcolor="#C0C0C0">
        <th>Local</th>
        <th>Valor</th>
        <th>Excluir</th>
        <th>Editar</th>
      </tr>
    </thead> 
    <tbody>
      <?php
      if (isset($lancamentos)) {
        foreach ($lancamentos as $lancamento) {
          ?>
          <tr>

            <td><a href="<?= base_url("index.php/Controller/verItens/$lancamento->idLancamento/0")?>"> <?php echo $lancamento->descricaoL; ?></a></td>
            <td class="valorN">R$ <?php echo $lancamento->Valor; ?></td>
            <td><center><a href="<?= base_url("index.php/controller/deletarLancamento/$lancamento->idLancamento")?>"><span class="glyphicon glyphicon-trash"></span></a></center></td>
            <td><center><a href="<?= base_url("index.php/controller/lancamentos/$lancamento->data/$lancamento->idLancamento")?>"><span class="glyphicon glyphicon-edit"></span><a></center></td>
            </tr>
            <?php
          }
        }
        ?>    
      </tbody>
    </table>
  </div>  

  <div class="col-xs-12 col-lg-6">
    <center><h4><span class="glyphicon glyphicon-edit"></span> Clique em uma compra para editar:</h4></center>
    <?php echo form_open('controller/alterarLancamento');
    if (isset($Editar)) {
      foreach ($Editar as $Edit){
      # code...
      ?>
      <input type="hidden" name="data" value="<?php echo $lancamento->data?>">
      <input type="hidden" name="idLancamento" value="<?php echo $Edit->idLancamento?>">
      <div class="form-group">
        <label for="descricao"><span class="glyphicon glyphicon-pencil"></span> Local:</label>
        <input class="form-control" name="desc" id="descricao" type="text" value="<?php echo $Edit->descricaoL?>" />
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