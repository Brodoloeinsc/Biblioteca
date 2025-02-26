<div class="container text-center py-5">
    <h1 class="text-center mb-5">📚 Detalhes do Empréstimo</h1>

    <div class="container bg-light p-4 rounded shadow-sm">
        <div class="row mb-4 justify-content-center">
            <div class="col-auto d-flex align-items-center">
                <h3 class="me-3 text-primary">📖 Nome do Livro:</h3>
                <p class="mb-0 fw-bold text-secondary">
                    <?php echo htmlspecialchars($arr['loan']['book_name']); ?>
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-8">
                <h3 class="text-primary text-center mb-3">👤 Dados da Pessoa</h3>
                <ul class="list-group list-group-flush bg-transparent">
                    <li class="list-group-item border-0 bg-transparent"><strong>Nome:</strong> <?php echo htmlspecialchars($arr['loan']['person_name']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>Telefone:</strong> <?php echo htmlspecialchars($arr['loan']['person_cellphone']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>Endereço:</strong> <?php echo htmlspecialchars($arr['loan']['person_address']); ?></li>
                    <li class="list-group-item border-0 bg-transparent"><strong>CPF:</strong> <?php echo htmlspecialchars($arr['loan']['cpf']); ?></li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto d-flex align-items-center">
                <h3 class="me-3 text-primary">📅 Data de Devolução:</h3>
                <p class="mb-0 fw-bold text-danger">
                    <?php 
                    echo isset($arr['loan']['end_date']) ? date('d/m/Y', strtotime($arr['loan']['end_date'])) : "Data não definida";
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<br><br><br>
