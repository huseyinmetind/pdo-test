<?php

        require_once 'baglan.php';

        $sql = 'SELECT * FROM ogrenci WHERE ogr_no = ?';
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute([
            $_GET['ogr_no']
         ]);

$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

?>









<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
 
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center"><br></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                    </div>
                </div>
            </div>
        </div>
 
    </header>
    <main>  
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                    <?=$satir["ogr_ad"]?> <?=$satir["ogr_soyad"]?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$satir["ogr_sinif"]?> ( <?=$satir["ogr_cinsiyet"]?>)</h6>
                    <p class="card-text"><?=$satir["ogr_dtarih"]?></p>
                </div>
            </div>    
            </div>
        </div>
    </div>
    </main>
    <footer></footer>
</body>
</html>