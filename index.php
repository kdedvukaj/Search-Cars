<?php require 'db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <a href="index.php" class="navbar-brand">Cars</a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <h3 class="display-4">Search cars</h3>
                <form action="carInfo.php" method="get">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="<?php if(isset($_GET['error'])){
                            echo "No match found";
                        }else{
                            echo "Search";
                        } ?>" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" name="subBtn" class="btn btn-info">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <?php foreach($db as $car): ?>
                        <div class="col-3">
                            <a href="carInfo.php?id=<?php echo $car['id'] ?>">
                        <div class="card text-center">
                            <div class="card-header"><?php echo $car['brend'] ?></div>
                            <div class="card-body"><?php echo $car['name'] ?></div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm"><?php echo $car['price']."$" ?></button>
                                <button class="btn btn-<?php if($car['used']){
                                    echo "warning";
                                }else{
                                    echo "success";
                                } ?> btn-sm"><?php if($car['used']){
                                    echo "Used";
                                }else{
                                    echo "New";
                                } ?></button>
                            </div>
                        </div>
                            </a>
                        </div>
                        
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>