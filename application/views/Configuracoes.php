<div class="row">
  <div class="col-xs-12 col-lg-12">
    <?php echo form_open('controller/salvarItem') ?>    

    <?php if (isset($Admin)) {
      foreach ($Admin as $Ad) {
      }
    } ?>           

      <div class="form-group">
        <br>
        <label for="nome"> Nome:</label>
        <input class="form-control" name="nome" id="nome" type="text" value="<?php echo $Ad->nomeAdmin?>"></input>
      </div>

      <div class="form-group">
        <label for="email"></span> E-mail:</label>
        <input class="form-control" name="email" id="email" type="text" value="<?php echo $Ad->Email?>"></input>
      </div>

      <div class="form-group">
        <label for="senha"></span> Senha:</label>
        <input class="form-control" name="senha" id="senha" type="text" value="<?php echo $Ad->Senha?>"></input>
      </div>

      <div class="form-group">
        <label for="salario"> Salario Fixo:</label>
        <input type="text" name="salario" id="salario" value="<?php echo $Ad->SalarioFixo?>">
      </div>

      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Alterar dados</button>
      <a  href="<?= base_url("index.php/controller")?>" type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Voltar</a>

    <?php echo form_close() ?>
  </div>
</div>