<div class="container py-5">
    <h2 class="text-center text-primary mb-4">🔧 Extender Conclusão</h2>
    <form class="form form-horizontal p-4 shadow rounded bg-light" method="post">
        <div class="mb-3">
            <label for="start_date" class="form-label">📅 Data de Início</label>
            <input type="date" disabled class="form-control" name="start_date" value="<?php echo $arr['loan']['start_date']; ?>">
        </div>

        <div class="mb-4">
            <label for="end_date" class="form-label">📅 Nova Data de Término</label>
            <input type="date" class="form-control" name="end_date" value="<?php echo $arr['loan']['end_date']; ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-success w-100">
            Confirmar Extensão
        </button>
    </form>
</div>
