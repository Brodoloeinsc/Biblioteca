<br>
<div class="container">
    <h2>Cadastro do Livro:</h2><br>
    <form class="form form-horizontal" method="post">
        <label for="name" class="form-label">Nome do Livro</label>
        <input type="text" class="form-control" name="name" value="<?php echo $arr['book']['name'];?>"> <br>
        <label for="name" class="form-label">Editora do Livro</label>
        <input type="text" class="form-control" name="publisher" value="<?php echo $arr['book']['publisher'];?>"> <br>
        <label for="name" class="form-label">Tradutor do Livro</label>
        <input type="text" class="form-control" name="translator" value="<?php echo $arr['book']['translator'];?>"> <br>
        <label for="name" class="form-label">Pratilheira do Livro</label>
        <input type="text" class="form-control" name="bookshelf" value="<?php echo $arr['book']['bookshelf'];?>"> <br>
        <label for="name" class="form-label">Quantidade de Exemplares</label>
        <input type="number" class="form-control" name="quantity" value="<?php echo $arr['book']['quantity'];?>"><br>

        <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Editar">

    </form>
</div>
<div class="container-fluid">