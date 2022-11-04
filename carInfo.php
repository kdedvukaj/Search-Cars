<?php
require 'db.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cars = array_filter($db, function($el){
            global $id;
           return $el['id'] == $id; 
        });
        
    }elseif($_GET['search']){
        $search = $_GET['search'];
        $cars = array_filter($db, function($el){
            global $search;
           return $el['brend'] == $search || $el['name'] == $search || $el['price'] == $search;
        });
        if(count($cars) == 0){
            header("Location: index.php?error=1");
        }
    }else{
        header("Location: index.php");
    }

?>
<?php require 'db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <a href="index.php" class="navbar-brand">Cars</a>
    </nav>
    <div class="jumbotron text-center">
        <h2>
            <?php foreach($cars as $car): ?>
                <span><?php echo $car['brend'] ?></span>
            <?php endforeach; ?>
        </h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <?php foreach($cars as $car): ?>
                <div class="col-6">
                    <h3 class="display-4"><?php echo $car['name'] ?></h3>
                    <hr>
                    <p><?php echo $car['info'] ?></p>
                    <hr>
                    <h4><?php echo $car['price']."$" ?></h4>
                </div>
            <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>