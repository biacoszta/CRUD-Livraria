<?php
session_start();
if(isset($_SESSION['mensagem'])):
    echo $_SESSION['mensagem'];
endif;
session_unset();

include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
?>

<div class="row result">
  <div class="col s12 m6 push-m3">
        <h3 class="light">Livros</h3>
          <table class="striped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Autor:</th>
                    <th>Assunto:</th>
                    <th>ID Editora:</th>
                    <th>ISBN:</th>
                    <th>Estoque:</th>
                </tr>
            </thead>  
            <tbody>
                <?php
                $sql = "SELECT livros.idLivro, nomeLivro, autor, assunto, nomeEditora, isbn, estoque FROM livros inner join editoras on editoras.idEditora = livros.idEditora";
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nomeLivro']; ?></td>
                    <td><?php echo $dados['autor']; ?></td>
                    <td><?php echo $dados['assunto']; ?></td>
                    <td><?php echo $dados['nomeEditora']; ?></td>
                    <td><?php echo $dados['isbn']; ?></td>
                    <td><?php echo $dados['estoque']; ?></td>

                    <input type="hidden" name="idLivro" value=""> 

                    <td><button type="button" data-target="modal1" class="btn-floating orange btn modal-trigger" id="btn-edit"  onclick="atualizar(<?php echo $dados['idLivro']; ?>)"><i class="material-icons">edit</i></button></td>

                    <td><button type="button" class="btn-floating red btn-deletar" name="btn-deletar" onclick="deletar(<?php echo $dados['idLivro']; ?>)"><i class="material-icons">delete</i></button></td>
                
                </tr>
                <?php endwhile; ?>
            </tbody>
          </table>
          <br>
          <a href="adicionar.php" class="btn light-green darken-1 btn-adicionar">ADICIONAR LIVRO</a>
  </div>
</div>

<!-- Modal Trigger -->
<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Open Modal 1</a> -->
<!-- Modal Structure - Open click link -->

  



<div id="modal1" class="modal">
  <div class="modal-content">
      <div class="row">
          <div class="col s12 m6 push-m3">
            <h3 class="light">Editar livro</h3>
              <form action="php_action/update.php" method="POST">

                  <input type="hidden" name="idLivro" id="idLivro" value="<?php echo $dados['idLivro'];?>">

                  <div class="input-field col s12">
                  <div class="row"></div>
                      <input type="text" value="<?php echo $dados['nomeLivro'];?>" name="nomeLivro"   id="nomeLivro">
                      <label for="nomeLivro">Nome do livro</label>
                  </div>
                  <div class="input-field col s12">
                  <div class="row"></div>
                      <input type="text" value="<?php echo $dados['autor']; ?>" name="autor"   id="autor">
                      <label for="autor">Autor</label>
                  </div>
                  <div class="input-field col s12">
                  <div class="row"></div>
                      <input type="text" value="<?php echo $dados['assunto'];?>" name="assunto"   id="assunto">
                      <label for="assunto">Assunto</label>
                  </div>
                  <div class="input-field col s12">
                  <div class="row"></div>
                      <select id="idEditora" name="idEditora"></select>
                      <label for="idEditora">ID Editora</label>
                  </div>
                  <div class="input-field col s12">
                  <div class="row"></div>
                      <input type="text" value="<?php echo $dados['isbn'];?>" id="isbn" name="isbn"  >
                      <label for="isbn">ISBN</label>
                  </div>
                  <div class="input-field col s12">
                  <div class="row"></div>
                      <input type="text" value="<?php echo $dados['estoque'];?>" id="estoque" name="estoque"  >
                      <label for="estoque">Estoque</label>
                  </div>
                  <input type="hidden" value="" id="idLivro" name="idLivro"  >
                  <button type="button" name="btn-editar" class="modal-close btn light-green darken-1 btn-editar" onclick="editar()">ATUALIZAR</button>
                  <a href="index.php" type="submit" class="btn btn blue darken-4">LISTA DE CLIENTES</a>
              </form>
          </div>
      </div>
  </div>
</div>

<script>
 


  $( document ).ready(function() {
        $('.modal').modal({
          dismissible: false,
          complete: function(){
            console.log('fechado');
          }
        });
  });

function mostrar(){
  alert("oi");
}
</script>
<?php
include_once 'includes/footer.php';
?>