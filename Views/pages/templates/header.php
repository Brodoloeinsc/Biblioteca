<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arr['title']; ?></title>
</head>
<body>
    <header>
        <div class="center">
            <div class="logo">
                <h2>O Consolador</h2>
            </div>
            <nav class="menu">
                <?php foreach ($this->menuItems as $key => $item) { ?>
    
                    <a href="<?php echo INCLUDE_PATH."\\".strtolower($item);?>"><?php echo $item;?></a>                    

                <?php }?>
            </nav>
        </div>
    </header>