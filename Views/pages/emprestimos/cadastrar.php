<div class="container py-5">
    <h2 class="text-center mb-4">📚 Cadastro de Empréstimo</h2>
    <form class="form form-horizontal p-4 bg-light rounded shadow-sm" method="post">
        
        <div class="mb-3">
            <label for="book" class="form-label">📖 Livro</label>
            <select class="form-select" name="book">
                <?php foreach($arr['books'] as $key => $book){ ?>
                    <option><?php echo $book['id']." - ".$book['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="person_name" class="form-label">👤 Nome</label>
            <input type="text" class="form-control" name="person_name">
        </div>

        <div class="mb-3">
            <label for="person_cellphone" class="form-label">📞 Telefone</label>
            <input type="text" class="form-control" name="person_cellphone">
        </div>

        <div class="mb-3">
            <label for="person_address" class="form-label">🏠 Endereço</label>
            <input type="text" class="form-control" name="person_address">
        </div>

        <div class="mb-3">
            <label for="person_cpf" class="form-label">🆔 CPF</label>
            <input type="text" class="form-control" name="person_cpf">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">📅 Data de Início</label>
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">📅 Data de Término</label>
                <input type="date" class="form-control" name="end_date">
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-success w-100">Cadastrar Empréstimo</button>
    </form>
</div>
