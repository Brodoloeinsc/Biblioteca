<div class="container text-center">
    <br><br>
    <a class="btn btn-success col-sm-10" href="<?php echo INCLUDE_PATH; ?>/livros/cadastrar">
        <i class="bi bi-book"></i> Cadastrar Livro
    </a>
    <br><br><br>

    <h2 class="mb-4">📚 Todos os Livros</h2>

    <div class="table-responsive mt-4">
        <table class="table table-hover table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>📖 Nome</th>
                    <th>🏷️ Editora</th>
                    <th>🗣️ Tradutor</th>
                    <th>📚 Prateleira</th>
                    <th>🔢 Número de Cópias</th>
                    <th>⚙️ Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (@$arr['books']) {
                        foreach ($arr['books'] as $key => $book) {
                            echo "<tr onclick=\"window.location.href='".INCLUDE_PATH."/livros/unidade?id=".$book['id']."'\" style='cursor:pointer;'>";

                            foreach ($book as $field => $fieldValue) {
                                if ($field != "id") {
                                    echo "<td>".$fieldValue."</td>";
                                }
                            }

                            echo "<td class='text-center'>
                                    <a class=\"btn btn-warning btn-sm me-2\" href=\"".INCLUDE_PATH."/livros/editar?id=".$book['id']."\">
                                        <i class=\"bi bi-pencil-square\"></i> Editar
                                    </a>
                                    <a class=\"btn btn-danger btn-sm\" href=\"".INCLUDE_PATH."/livros/deletar?id=".$book['id']."\">
                                        <i class=\"bi bi-trash\"></i> Excluir
                                    </a>
                                  </td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'><h2 class='text-danger'>❌ Nenhum livro cadastrado ou carregado</h2></td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
