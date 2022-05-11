$(document).ready(function(){
    $('select').formSelect();
    $('select').material_select();
  });
        
function deletar(idLivro){
    $.ajax({
        url: 'php_action/delete.php',
        type: 'post',
        data: {
            'idLivro':idLivro,
            'btn-deletar':idLivro,
        },
        success: function (result) {
            $(".result").html(result);
        }
    });
}

function editar(){
    var idLivro=$("#idLivro").val();
    var dadosajax = {
        'idLivro': idLivro,
        'nomeLivro' : $("#nomeLivro").val(),
        'autor' : $("#autor").val(),
        'assunto' : $("#assunto").val(),
        'idEditora' : $("#idEditora").val(),
        'isbn' : $("#isbn").val(),
        'estoque' : $("#estoque").val()
    };
    pageurl = 'update.php';
    $.ajax({
        url: 'php_action/update.php',
        type: 'post',
        data: dadosajax,
        success: function (result) {
            alert("Livro atualizado com sucesso");
            $(".result").html(result);
        }
    });
}


function add(){
    var dadosajax = {
        'nomeLivro' : $("#nomeLivro").val(),
        'autor' : $("#autor").val(),
        'assunto' : $("#assunto").val(),
        'idEditora' : $("#idEditora").val(),
        'isbn' : $("#isbn").val(),
        'opcao' : $("#opcao").val(),
        'isbn' : $("#isbn").val(),
        'estoque' : $("#estoque").val()
    };
    pageurl = 'create.php';
    $.ajax({
        url: 'php_action/create.php',
        type: 'post',
        data: dadosajax,
        success: function (result) {
            window.location.href = "index.php"
            $(".result").html(result);
        }
    });
}

function atualizar(idLivro){
    $.ajax({
        url: 'editar.php',
        type: 'get',
        datatype: 'json',
        data: {
            'idLivro':idLivro,
        },
        success: function (result) {
            var livro = JSON.parse(result);
            var options = "";
            console.log(livro);

            livro.editoras.forEach(element => {
                console.log(element);
                options+="<option value="+element.idEditora+">"+element.nomeEditora+"</option>"
            });
            $('#nomeLivro').val(livro.nomeLivro);
            $('#autor').val(livro.autor);
            $('#assunto').val(livro.assunto);
            $('#idEditora').html(options);
            $('#isbn').val(livro.isbn);
            $('#estoque').val(livro.estoque);
            $('#idLivro').val(livro.idLivro);
        }
    });
}



function mostrar(){
    alert('oi');
    // $.ajax({
    //     url: 'mostrar.php',
    //     type: 'get',
    //     datatype: 'json',
    //     data: {
    //         'idEditora':idEditora,
    //     },
    //     success: function (result) {
    //         var livro = JSON.parse(result);
    //         $('#nomeEditora').val(livro.nomeEditora);
           
    //     }
    // });
}