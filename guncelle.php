<?php
 
require_once "baglan.php";
 
        if(isset($_POST['Guncelle'])){
        
            $sql = "UPDATE `ogrenci` SET 
                    `ogr_ad` = ?,
                    `ogr_soyad` = ?,
                    `ogr_dtarih` = ?,
                    `ogr_sinif` = ? 
                WHERE `ogrenci`.`ogr_no` = ?";
            $dizi=[
                $_POST['ogr_ad'],
                $_POST['ogr_soyad'],
                $_POST['ogr_dtarih'],
                $_POST['ogr_sinif'],
                $_POST['ogr_no']
            ];
            $sorgu = $baglan->prepare($sql);
            $sorgu->execute($dizi);
        
            header("Location:index.php");
        }
        
        $sql ="SELECT * FROM ogrenci WHERE ogr_no = ?";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute([
            $_GET['ogr_no']
        ]);
        $satir = $sorgu->fetch(PDO::FETCH_ASSOC);




?>











<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Güncelleme İşlemi</title>
    
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
        <form action="" method="post" class="row mt-4 g-3">
            <input type="hidden" name= "ogr_no" value="<?=$satir['ogr_no']?>">   
            <div class="col-6">
                <label for="ogr_ad" class="form-label">Adınız</label>
                <input type="text" class="form-control" name="ogr_ad">
            </div>
            <div class="col-6">
                <label for="ogr_soyad" class="form-label">Soyadınız</label>
                <input type="text" class="form-control" name="ogr_soyad">
            </div>
            <div class="col-6">
                <label for="ogr_sinif" class="form-label">Sınıf</label>
                <input type="text" class="form-control" name="ogr_sinif">
            </div>
            <div class="col-6">
                <label for="ogr_dtarih" class="form-label">Doğum Tarihi</label>
                <input type="date" class="form-control" name="ogr_dtarih">
            </div>
            <div class="col">
                <label for="" class="form-label">Kız
                    <input type="radio" name="ogr_cinsiyet" value="K">
                </label>
                <label for="" class="form-label">Erkek
                    <input type="radio" name="ogr_cinsiyet" value="E">
                </label>
            </div>
            <button type="submit" name="Guncelle" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>