<div class="container text-center py-5">
    <h1 class="text-center mb-5">📘 Detalhes do Livro</h1>

    <div class="container bg-light p-4 rounded shadow-sm">
        <div class="row mb-4 justify-content-center">
            <div class="col-auto d-flex align-items-center">
                <h3 class="me-3 text-primary">📚 Nome do Livro:</h3>
                <p class="mb-0 fw-bold text-secondary">
                    <?php echo htmlspecialchars($arr['book']['name']); ?>
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-8">
                <h3 class="text-primary text-center mb-3">📄 Informações do Livro</h3>
                <ul class="list-group list-group-flush bg-transparent">
                    <li class="list-group-item border-0 bg-transparent"><strong>Editora:</strong> <?php echo htmlspecialchars($arr['book']['publisher']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>Tradutor:</strong> <?php echo htmlspecialchars($arr['book']['translator']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>Prateleira:</strong> <?php echo htmlspecialchars($arr['book']['bookshelf']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>Quantidade:</strong> <?php echo htmlspecialchars($arr['book']['quantity']); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br><br><br>
