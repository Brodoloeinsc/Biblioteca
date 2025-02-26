<div class="container py-5">
    <h2 class="text-primary text-center">📚 Cadastro do Livro</h2>
    <p class="text-muted text-center">Preencha os campos abaixo para adicionar um novo livro à biblioteca.</p>
    <br>
    <div class="card shadow-sm p-4">
        <form class="form" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">📘 Nome do Livro</label>
                <input type="text" class="form-control" name="name" placeholder="Digite o nome do livro" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">🏢 Editora</label>
                <input type="text" class="form-control" name="publisher" placeholder="Digite o nome da editora">
            </div>

            <div class="mb-3">
                <label for="translator" class="form-label">🌍 Tradutor</label>
                <input type="text" class="form-control" name="translator" placeholder="Nome do tradutor (opcional)">
            </div>

            <div class="mb-3">
                <label for="bookshelf" class="form-label">📚 Prateleira</label>
                <input type="text" class="form-control" name="bookshelf" placeholder="Informe a prateleira onde o livro será armazenado">
            </div>

            <div class="mb-4">
                <label for="quantity" class="form-label">🔢 Quantidade de Exemplares</label>
                <input type="number" class="form-control" name="quantity" placeholder="Número de exemplares disponíveis" min="1" required>
            </div>

            <div class="d-grid">
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Cadastrar Livro">
            </div>
        </form>
    </div>
</div>
