<br>
<div class="container">
    <h2>Extender Conclusao:</h2><br>
    <form class="form form-horizontal" method="post">
        <label for="name" class="form-label">Data de Inicio</label>
        <input type="date" disabled class="form-control" name="start_date" value="<?php echo $arr['loan']['start_date']; ?>"><br>
        <label for="name" class="form-label">Data de Termino</label>
        <input type="date" class="form-control" name="end_date" value="<?php echo $arr['loan']['end_date']; ?>"><br>

        <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Editar">

    </form>
</div>
<div class="container-fluid">