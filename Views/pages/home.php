<div class="container py-5">
    <h1 class="text-center mb-4 fw-bold">Dashboard da Biblioteca</h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white rounded-4 shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">Total de Livros</h4>
                    <p class="card-text display-4"> <?php echo $arr['totalBooks'] ?? '0'; ?> </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white rounded-4 shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">Livros Disponíveis</h4>
                    <p class="card-text display-4"> <?php echo $arr['availableBooks'] ?? '0'; ?> </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-dark rounded-4 shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">Empréstimos Ativos</h4>
                    <p class="card-text display-4"> <?php echo $arr['totalLoans'] ?? '0'; ?> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3">Livros Mais Populares</h3>
                <div class="card p-3 rounded-4 shadow-sm" style="height: 400px;">
                    <canvas id="loanChart"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="mb-3">Empréstimos por Mês</h3>
                <?php
                    $loanDates = array_column($arr['loans'] ?? [], 'start_date');
                    $monthlyCounts = array_reduce($loanDates, function ($acc, $date) {
                        $month = date('M Y', strtotime($date));
                        $acc[$month] = ($acc[$month] ?? 0) + 1;
                        return $acc;
                    }, []);

                    
                    $colorPalette = ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0', '#FF5722'];
                    $monthlyColors = [];
                    $index = 0;

                    foreach (array_keys($monthlyCounts) as $month) {
                        $monthlyColors[$month] = $colorPalette[$index % count($colorPalette)];
                        $index++;
                    }
                ?>
                
                <div class="row">
                    <div class="col-md-7">
                        <div class="card p-3 rounded-4 shadow-sm">
                            <canvas id="monthlyLoanChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card p-3 rounded-4 shadow-sm">
                            <h4>Detalhes dos Empréstimos</h4>
                            <ul class="list-unstyled">
                                <?php foreach ($monthlyCounts as $month => $count): ?>
                                    <li class="legend-item d-flex align-items-center mb-2">
                                    <span class="legend-color" style="background-color: <?php echo $monthlyColors[$month]; ?>; display: inline-block; width: 20px; height: 20px; border-radius: 50%; margin-right: 5px;"></span>
                                        <strong><?php echo $month; ?>:     </strong> <?php echo $count; ?> empréstimos
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="card p-3 rounded-4 shadow-sm mt-4">
                            <h4>Resumo dos Empréstimos</h4>
                            <?php foreach ($monthlyCounts as $month => $count): ?>
                                <p><strong><?php echo $month; ?>: </strong> <?php echo $count; ?> empréstimos</p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="mb-3">Últimos Empréstimos</h3>
        <?php if (!empty($arr['loans'])): ?>
            <table class="table table-striped table-bordered rounded-3 overflow-hidden shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Livro</th>
                        <th>Pessoa</th>
                        <th>Início</th>
                        <th>Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr['loans'] as $loan): ?>
                        <tr>
                            <td><?php echo $loan['book_name']; ?></td>
                            <td><?php echo $loan['person_name']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($loan['start_date'])); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($loan['end_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Nenhum empréstimo registrado.</p>
        <?php endif; ?>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('loanChart').getContext('2d');
    const monthlyCtx = document.getElementById('monthlyLoanChart').getContext('2d');

    const bookNames = <?php echo json_encode(array_column($arr['loans'] ?? [], 'book_name')); ?>;
    const bookCounts = bookNames.reduce((acc, name) => {
        acc[name] = (acc[name] || 0) + 1;
        return acc;
    }, {});

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(bookCounts),
            datasets: [{
                label: 'Quantidade de Empréstimos por Livro',
                data: Object.values(bookCounts),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: 'rgba(54, 162, 235, 0.9)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            size: 14
                        },
                        color: '#333'
                    }
                },
                title: {
                    display: true,
                    text: 'Livros Mais Populares',
                    font: {
                        size: 22
                    }
                },
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    color: '#333',
                    font: {
                        size: 14
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 14
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });

    const monthlyCounts = <?php echo json_encode($monthlyCounts); ?>;
    new Chart(monthlyCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(monthlyCounts),
            datasets: [{
                label: 'Empréstimos por Mês',
                data: Object.values(monthlyCounts),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0', '#FF5722'],
                hoverOffset: 10,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        font: {
                            size: 14
                        },
                        color: '#333'
                    }
                },
                title: {
                    display: true,
                    text: 'Distribuição de Empréstimos por Mês',
                    font: {
                        size: 22
                    }
                }
            }
        }
    });
</script>

<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border: 2px solidrgb(25, 27, 29);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: #f8f9fa;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
</style>
