<br>
<div class="container">
    <h2>Cadastro do Livro:</h2><br>
    <form class="form form-horizontal" method="post">
        <label for="name" class="form-label">Livro</label>
        <select class="form-select mt-3" name="book">
            <?php foreach($arr['books'] as $key => $book){ ?>
                <option><?php echo $book['id']." - ".$book['name']; ?></option>
            <?php } ?>
        </select><br>
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" name="person_name"> <br>
        <label for="name" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="person_cellphone"> <br>
        <label for="name" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="person_address"> <br>
        <label for="name" class="form-label">CPF</label>
        <input type="text" class="form-control" name="person_cpf"> <br>
        <label for="name" class="form-label">Data de Inicio</label>
        <input type="date" class="form-control" name="start_date"><br>
        <label for="name" class="form-label">Data de Termino</label>
        <input type="date" class="form-control" name="end_date"><br>

        <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Cadastrar">

    </form>
</div>
<div class="container-fluid">