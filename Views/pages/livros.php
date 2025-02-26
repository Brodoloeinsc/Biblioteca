<div class="container text-center">
    <br><br>
    <a class="btn btn-primary col-sm-10" href="<?php echo INCLUDE_PATH; ?>/livros/cadastrar">Cadastrar Livro</a>
    <!-- <a class="btn btn-primary" href="<?php echo INCLUDE_PATH; ?>/livros/editar">Editar Livro</a>
    <a class="btn btn-primary" href="<?php echo INCLUDE_PATH; ?>/livros/deletar">Deletar Livro</a> -->
    <br><br><br>

    <h2>Todos os Livros:</h2>

    <table class="table table-hover">
        <thead>
            <th>Nome</th>
            <th>Editora</th>
            <th>Tradutor</th>
            <th>Pratilheira</th>
            <th>Numero de copias</th>
            <th>X</th>
            <th>X</th>
        </thead>
        <tbody>
            <tr>
                <?php
                    
                    if(@$arr['books']){
                        foreach ($arr['books'] as $key => $book) {
                            echo "<tr>";
                            foreach ($book as $field => $fieldValue) {
                                if ($field != "id") {
                                    echo "<td>".$fieldValue."</td>";
                                }
                            }
                            echo "<td><a class=\"btn btn-primary\" href=\"".INCLUDE_PATH."/livros/editar?id=".$book['id']."\">Editar</a></td>";
                            echo "<td><a class=\"btn btn-danger\" href=\"".INCLUDE_PATH."/livros/deletar?id=".$book['id']."\">Excluir</a></td>";
                            echo "</tr>";
                        }
                    } else{
                        echo "<h2>Nenhum livro cadastrado ou carregado</h2>";
                    }                   
                
                ?>
            </tr>
            
        </tbody>
    </table>
