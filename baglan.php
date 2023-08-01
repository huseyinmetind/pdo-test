<?php

try
{
    $baglan =new PDO ('mysql:host=localhost;dbname=dbkutuphane', 'root', '');    
} catch ( PDOException  $e)
{
    echo $e->getMessage();
}
