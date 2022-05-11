<?php
include_once 'includes/header.php';

include_once 'php_action/db_connect.php';
?>

<div class="row add">
    <div class="col s12 m6 push-m3 ">
        <h3 class="light">Novo livro</h3>
        <form action="php_action/create.php" method="POST">
        <input type="hidden" name="idLivro" id="idLivro" value="<?php echo $dados['idLivro'];?>">
                <div class="input-field col s12 ">
                <div class="row"></div>
                    <input id="nomeLivro" type="text" name="nomeLivro">
                    <label for="nomeLivro">Nome do livro</label>
                </div>
                <div class="input-field col s12">
                <div class="row"></div>
                    <input id="autor" type="text" name="autor">
                    <label for="autor">Autor</label>
                </div>
                <div class="input-field col s12">
                <div class="row"></div>
                    <input type="text" name="assunto" id="assunto">
                    <label for="assunto">Assunto</label>
                </div>
                <div class="input-field col s12">
                <div class="row"></div>
                <div class="input-field col s12">
                  <select id="opcao">
                    <option value="" disabled selected>Escolha a editora</option>
                        
                    <?php
                        $sql = "SELECT * FROM editoras";
                        // $id = mysqli_escape_string($connect, $_GET['idEditar']);
                        // $resultado = mysqli_query($connect, $sql);
                        // while($row=mysqli_fetch_assoc($resultado)):
                        // echo json_encode($row);
                        $resultado = mysqli_query($connect, $sql);
                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                    <option value="<?php echo $dados['idEditora'];?>" name="idEditora" id="idEditora"><?php echo $dados['nomeEditora'];?></option>
                    <?php endwhile; ?>
                </select>
                  
                </div>
                    <label for="idEditora">ID Editora</label>
                </div>
                <div class="input-field col s12">
                <div class="row"></div>
                    <input type="text" name="isbn" id="isbn">
                    <label for="isbn">ISBN</label>
                </div>
                <div class="input-field col s12">
                <div class="row"></div>
                    <input type="text" name="estoque" id="estoque">
                    <label for="estoque">Estoque</label>
                </div>
                <button type="button" class="btn light-green darken-1 btn-cadastrar" name="btn-cadastrar" id="btn-cadastrar" onclick="add()">CADASTRAR</button>
                
                <a href="index.php" type="submit" class=" btn light-blue darken-1">LISTA DE LIVROS</a>
        </form>
    </div>
</div>


<?php
include_once 'includes/footer.php';
?>