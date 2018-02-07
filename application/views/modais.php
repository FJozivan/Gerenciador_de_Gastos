<!-- janela modal confirmação de exclusao-->
<div class="modal fade" id="modal-container-330872" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Confirmação</h4>
      </div>
      <div class="modal-body">
        Deseja realmente Excluir este lançamento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>
<!-- fim janela modal -->

<!-- janela Modal cadastro de Itens -->
<div class="modal fade" id="cadItem" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Adicionar Item</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('controller/salvarItem') ?>

        <input class="form-control" name="idL" id="idL" type="hidden"></input>                 

        <div class="form-group">
          <label for="desc"><span class="glyphicon glyphicon-pencil"></span> Descrição:</label>
          <input class="form-control" name="desc" id="desc" type="text"></input>
        </div>

        <div class="form-group">
          <label for="valor"> Valor:</label>
          <input class="form-control" name="valor" id="valor" type="number"></input>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Salvar</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<!-- fim janela modal -->

<!-- janela Modal cadastrar local despesa -->
<div class="modal fade" id="cadDespesa" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Cadastro de Despesa</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('controller/salvarlancamento') ?>

        <div class="form-group">
          <label for="descricao"><span class="glyphicon glyphicon-pencil"></span> Local:</label>
          <input class="form-control" name="desc" id="descricao" type="text" />
        </div>

        <div class="form-group">
          <label for="data">Data</label>
          <input class="form-control" name="data" id="data" type="date" />
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Salvar</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>
<!-- fim janela modal -->

<!-- Modal para cadastro de receita-->
<div class="modal fade" id="cadReceita" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Adicionar Receita</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('controller/salvarReceita') ?>

        <div class="form-group">
          <label for="descricao"><span class="glyphicon glyphicon-pencil"></span> Descrição:</label>
          <input class="form-control" name="descReceita" id="descricao" type="text" />
        </div>

        <div class="form-group">
          <label for="valor">Valor: </label>
          <input class="form-control" name="valorReceita" id="valor" type="text" />
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Salvar</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<!-- Janela Modal Filtro por Mês -->
<div class="modal fade" id="Filtro" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Filtro por Mês</h4>
      </div>
      <div class="modal-body">
        <br><br>
        <?php echo form_open('controller/Filtro') ?>
        <center>
          <select class="form-control" name="option">
            <option value="1">Despesas</option>
            <option value="2">Receitas</option>
          </select>
        </center>
        <br>
        <select name="mes" class="form-control">
          <option>Escolha o mês</option>
          <option value="01">Janeiro</option>
          <option value="02">Fevereiro</option>
          <option value="03">Março</option>
          <option value="04">Abril</option>
          <option value="05">Maio</option>
          <option value="06">Junho</option>
          <option value="07">Julho</option>
          <option value="08">Agosto</option>
          <option value="09">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>
        <br>
        <select class="form-control" name="ano">
          <option>Escolha o Ano</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
        </select>
      </div>
    </div>
    <br>
    <div class="" style="background-color: ">
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Filtrar</button>
      <button type="button" class="btn btn-info pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
</div>
<!-- fim janela modal -->


<!-- janela Modal cadastro do Administrador -->
<div class="modal fade" id="cadAdmin" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Faça o Seu Cadastro</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('controller/salvarItem') ?>               
        <div class="col-xs-2 col-lg-2"></div>
        <div class="col-xs-8 col-lg-8">
          <div class="form-group">
            <br>
            <label for="nome"> Nome:</label>
            <input class="form-control" name="nome" id="nome" type="text"></input>
          </div>

          <div class="form-group">
            <label for="email"></span> E-mail:</label>
            <input class="form-control" name="email" id="email" type="text"></input>
          </div>

          <div class="form-group">
            <label for="senha"></span> Senha:</label>
            <input class="form-control" name="senha" id="senha" type="text"></input>
          </div>

        </div>
        <div class="col-xs-2 col-lg-2"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Cadastrar</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon "></span> Cancelar</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<!-- fim janela modal -->


<!-- janela Modal filtro por data -->
<div class="modal fade" id="aplicaFiltro" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Filtrar por Data</h4>
      </div>
      <div class="modal-body">

        <form role="form">
          <div class="form-group">
            <label for="txtdata">Data Inicial</label>
            <input class="form-control" id="txtDataInicial" type="date" />
          </div>

          <div class="form-group">
            <label for="txtdata">Data Final</label>
            <input class="form-control" id="txtDataFinal" type="date" />
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Aplicar Filtro</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim janela modal -->

<!-- janela Modal alterar despesa -->
<div class="modal fade" id="altDespesa" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Alterar Despesa</h4>
      </div>
      <div class="modal-body">

        <form role="form">
          <div class="form-group">
            <label for="txtlcto">Lancamento</label>
            <input class="form-control" id="txtlcto" type="number" disabled="true" />
          </div>

          <div class="form-group">
            <label for="txtdata">Data</label>
            <input class="form-control" id="txtdata" type="date" />
          </div>

          <div class="form-group">
            <label for="txtdescricao">Descrição</label>
            <input class="form-control" id="txtdescricao" type="text" />
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim janela modal -->