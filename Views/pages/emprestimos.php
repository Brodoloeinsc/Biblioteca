<div class="container py-5 text-center">
    <a class="btn btn-success col-sm-10" href="<?php echo INCLUDE_PATH; ?>/emprestimos/cadastrar">
            📚 Emprestar Livro
    </a>
    <br><br><br>
    <h2 class="text-center mb-4">📖 Todos os Empréstimos</h2>

    <?php if (isset($arr['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php echo $arr['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif (isset($arr['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <?php echo $arr['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mt-4">
        <table class="table table-hover table-bordered align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>📘 Livro</th>
                    <th>👤 Pessoa do Empréstimo</th>
                    <th>📅 Data de Término</th>
                    <th>⚙️ Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($arr['loans'])) {
                        usort($arr['loans'], function($a, $b) {
                            return strtotime($a['end_date']) - strtotime($b['end_date']);
                        });

                        foreach ($arr['loans'] as $loan) {
                            echo "<tr>";
                            foreach ($loan as $field => $fieldValue) {
                                if (in_array($field, ["book_name", "person_name", "end_date"])) {
                                    echo "<td>".$fieldValue."</td>";
                                }
                            }
                            echo "<td class='text-center'>
                                    <a class='btn btn-warning btn-sm me-2' href='".INCLUDE_PATH."/emprestimos/extender?id=".$loan['id']."'>
                                        ⏩ Extender
                                    </a>
                                    <a class='btn btn-danger btn-sm me-2' href='".INCLUDE_PATH."/emprestimos/devolucao?id=".$loan['id']."'>
                                        🛑 Receber
                                    </a>
                                    <a class='btn btn-info btn-sm' href='".INCLUDE_PATH."/emprestimos/unidade?id=".$loan['id']."'>
                                        🔍 Visualizar
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-muted py-3'><h4>🚫 Nenhum empréstimo cadastrado ou carregado</h4></td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
