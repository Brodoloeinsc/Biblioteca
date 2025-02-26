<div class="container text-center">
<h1 class="text-center mb-4">Empréstimo</h1>

<div class="container">
    <div class="row mb-3 justify-content-center">
        <div class="col-auto d-flex align-items-center">
            <h3 class="me-2">Nome do Livro:</h3>
            <p class="mb-0"><?php echo htmlspecialchars($arr['loan']['book_name']); ?></p>
        </div>
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="col-auto d-flex align-items-center">
            <h3 class="me-2">Dados da pessoa:</h3>
            <p class="mb-0">
                <?php 
                echo htmlspecialchars($arr['loan']['person_name']) . " | " .
                     htmlspecialchars($arr['loan']['person_cellphone']) . " | " .
                     htmlspecialchars($arr['loan']['person_address']) . " | " .
                     htmlspecialchars($arr['loan']['cpf']);
                ?>
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto d-flex align-items-center">
            <h3 class="me-2">Devolução:</h3>
            <p class="mb-0">
                <?php 
                echo isset($arr['loan']['end_date']) ? date('d/m/Y', strtotime($arr['loan']['end_date'])) : "Data não definida";
                ?>
            </p>
        </div>
    </div>
</div>
<br><br><br>