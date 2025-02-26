<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arr['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <h2 class="navbar-brand">O Consolador</h2>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <?php 
                        foreach ($this->menuItems as $key => $item) {

                            if(strtolower($item) == @$arr['active']){
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link active' href='".INCLUDE_PATH."\\".strtolower($item)."'>$item</a>";
                                echo "</li>";
                            }else{
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='".INCLUDE_PATH."\\".strtolower($item)."'>$item</a>";
                                echo "</li>";    
                            }

                        }   
                    ?>
                </ul>
            </div>
        </nav>
    </header>