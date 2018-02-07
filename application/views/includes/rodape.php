<!-- rodapé da página -->
</div>
</div>
</div>

<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="js/scripts.js"></script>

<!--Modal Item-->
<script type="text/javascript">
  $('#cadItem').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var recipientdesc = button.data('data-whateverdesc') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Adicionar Item ' + recipient)
        modal.find('#idL').val(recipient)
      })
    </script>

    <script type="text/javascript">
      function Editar(){
        var id = document.getElementById("idLanca").value;
        var data = document.getElementById("dataa").value;
        var descricao = document.getElementById("descr").value;
         
        document.getElementById("cod").value = id,
        document.getElementById("descricao").value = descricao,
        document.getElementById("data").value = data,
    });

      }
    </script>

    <!-- script type="text/javascript">
      $(function(){
        $("td").dblclick(function(){
          var linha = $(this).parents().index()+1;
          var coluna = $(this).index()+1;         
          var valor = $(this).html();

          alert("linha " +linha+ " coluna " +coluna+ " com o valor " +valor);
        });
      });
    </script -->
    <!--<script type="text/javascript">
      $(function(){
        $('tr').click(function(){
          var x = [];
          $(this).children().each(function(){
           x.push($(this).text());

         });
          alert(x);
        });
      });
    </script>-->

    <!-- script type="text/javascript">
      $(document).ready(function(){
        $('tr').click(function(){
          console.log($(this).children(0).index()+2);
        });
      });
    </script-->
    <!--script type="text/javascript">
      $(document).ready(function(){
        $('tr').click(function(){
          $(this).each(function(){
            console.log($(this).find('td').text());
          });
        });       
      });
    </script-->

    
  </body>
  </html>
  <!-- fim rodape da pagina -->
