<div class="container text-center">
    <br><br>
    <a class="btn btn-primary col-sm-10" href="<?php echo INCLUDE_PATH; ?>/emprestimos/cadastrar">Emprestar Livro</a>
    <br><br><br>

    <h2>Todos os Emprestimos:</h2>

    <table class="table table-hover">
        <thead>
            <th>Livro</th>
            <th>Pessoa do emprestimo</th>
            <th>Data de Termino</th>
            <th>X</th>
        </thead>
        <tbody>
            <tr>
                <?php
                    
                    if(isset($arr['loans'])){
                        foreach ($arr['loans'] as $key => $loan) {
                            echo "<tr>";
                            foreach ($loan as $field => $fieldValue) {
                                if ($field == "book_name" || $field == "person_name" || $field == "end_date") {
                                    echo "<td>".$fieldValue."</td>";
                                }
                            }
                            echo "<td><a class=\"btn btn-primary\" href=\"".INCLUDE_PATH."/emprestimos/extender?id=".$loan['id']."\">Extender</a><br><a class=\"btn btn-danger\" href=\"".INCLUDE_PATH."/emprestimos/devolucao?id=".$loan['id']."\">Receber</a><br><a class=\"btn btn-primary\" href=\"".INCLUDE_PATH."/emprestimos/unidade?id=".$loan['id']."\">Visualizar</a></td>";
                            echo "</tr>";
                        }
                    }else{
                        echo "<h2>Nenhum emprestimo cadastrado ou carregado</h2>";
                    }                   
                
                ?>
            </tr>
            
        </tbody>
    </table>
