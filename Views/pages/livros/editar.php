<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Informações: "<?php echo $arr['book']['name'];?>"</h2>
    <div class="card shadow">
        <div class="card-body">
            <form class="form" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Livro</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $arr['book']['name'];?>" required>
                </div>

                <div class="mb-3">
                    <label for="publisher" class="form-label">Editora do Livro</label>
                    <input type="text" class="form-control" name="publisher" value="<?php echo $arr['book']['publisher'];?>" required>
                </div>

                <div class="mb-3">
                    <label for="translator" class="form-label">Tradutor do Livro</label>
                    <input type="text" class="form-control" name="translator" value="<?php echo $arr['book']['translator'];?>">
                </div>

                <div class="mb-3">
                    <label for="bookshelf" class="form-label">Prateleira do Livro</label>
                    <input type="text" class="form-control" name="bookshelf" value="<?php echo $arr['book']['bookshelf'];?>" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantidade de Exemplares</label>
                    <input type="number" class="form-control" name="quantity" value="<?php echo $arr['book']['quantity'];?>" min="1" required>
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
