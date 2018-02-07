<!-- lista de despesas -->
<div class="col-xs-12 col-lg-12">
  <center>
    <h1>
      <?php 
      if (isset($lancs)) {
        foreach ($lancs as $lanc) {
          echo $lanc->descricaoL." ".date('d/m/Y', strtotime($lanc->data));
        }
      }else{
        echo "Teste sem Item    12/05/2017";
      }
      ?>
    </h1>
  </center>
</div>
<div class="col-xs-6 col-lg-12">
  <center><h3 align="center" style="color: red;">Valor Total: R$ 
    <?php 
    if(isset($lancs)){
      foreach ($lancs as $lanc) {
        echo $lanc->Valor;
      }
    }else{
      echo "0";
    }
    ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" data-toggle="modal" data-target="#cadItem" data-whatever="<?php 
    if (isset($lancs)) {
      foreach ($lancs as $lanc) {
        echo $lanc->idLancamento;
      }
    }else{
      echo "1";
    }
    ?>"
    data-whateverdesc="<?php 
    if (isset($lancs)) {
      foreach ($lancs as $lanc) {
        echo $lanc->descricaoL;
      }
    }else{
      echo "kkk";
    }
    ?>" class="btn btn-info">Adicionar Item</button>
  </h3></center>
</div>

<div class="col-xs-12 col-lg-6">
  <center><h4><span class="glyphicon glyphicon-list-alt"></span> Lista de Itens</h4></center>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr bgcolor="#C0C0C0">
        <th>#Id</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Excluir</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($itens)) {
        foreach ($itens as $item) {
          ?>
          <tr>
            <td><?php echo $item->idItem; ?></td>
            <td><?php echo $item->descricao;?></td>
            <td class="valor">R$ <?php echo $item->valor; ?></td>
            <td><center><a href="<?= base_url("index.php/controller/deletarItem/$item->idItem")?>"><span class="glyphicon glyphicon-trash"></span></a></center></td>
            <td><center><a href="<?= base_url("index.php/controller/verItens/$lanc->idLancamento/$item->idItem")?>"><span class="glyphicon glyphicon-edit"></span></a></center></td>
          </tr>
          <?php
        }
      }
      ?>    
    </tbody>
  </table>
</div>
<div class="col-xs-12 col-lg-6">
    <center><h4><span class="glyphicon glyphicon-edit"></span> Clique em um Item para editar:</h4></center>
    <?php echo form_open('controller/alterarItem/');
    if (isset($Editar)) {
      foreach ($Editar as $Edit){
      
      ?>
      <input type="hidden" name="idItem" value="<?php echo $Edit->idItem;?>">
      <input type="hidden" name="idLanc" value="<?php echo $lanc->idLancamento?>">
      <div class="form-group">
        <label for="descricao"><span class="glyphicon glyphicon-pencil"></span> Descrição:</label>
        <input class="form-control" name="desc" id="descricao" type="text" value="<?php echo $Edit->descricao?>" />
      </div>

      <div class="form-group">
        <label for="valor">Valor:</label>
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