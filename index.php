<meta charset="UTF-8">
<?php


$dersler=array(
    "ADI"=>"Ülkem",
    "soyad"=>"ERTEN",
    "yas"=>"25",
    "meslek"=>"Yazılımcı",
    "sehir"=>"Ankara"
);

$glob =  json_encode($dersler,JSON_UNESCAPED_UNICODE);

echo $dersler["Ülkem"]."<br>";


$derslewr=array("ders-1"=>"php","ders-2"=>"javascript","ders-3"=>"css");



$json=json_encode($derslewr);
echo $json."<br><br>";





?>


<html>
<body>
<form name="yukleme" method="post" action="" enctype="multipart/form-data">
    Yüklenecek Dosyayı seçiniz: <input type="file" name="dosya"><br>
    <input type="submit" name="yukle" value="Yükle">
</form>
</body>
</html>


<html>
<body>
<?php
echo "<b>Yüklenen dosyanın adı:</b> ",$_FILES["dosya"]["name"],"<br>";
echo "<b>Yüklenen dosyanın geçici adı:</b> ",$_FILES["dosya"]["tmp_name"],"<br>";
echo "<b>Yüklenen dosyanın türü:</b> ",$_FILES["dosya"]["type"],"<br>";
echo "<b>Yüklenen dosyanın boyutu:</b> ",$_FILES["dosya"]["size"],"<br>";
echo "<b>Varsa yüklerken oluşan hata:</b> ",$_FILES["dosya"]["error"],"<br>";
?>
</body>
</html>

<html>
<body>
<?php

$gecici_ad=$_FILES["dosya"]["tmp_name"];
$kalici_yol_ad = $_FILES["dosya"]["name"]; // dosya kendi adıyla upload dizinine kaydedilecek
$gercekad = "UlkemYuklemeler".rand(0,10000).substr($kalici_yol_ad,-4);
if($_POST['yukle']) {
    if (move_uploaded_file($gecici_ad, $gercekad)) // eğer dosya kaydedilirse
        echo "Dosya başarı ile yüklendi.";
    else
        echo "Yükleme başarısız!";
}
?>
</body>
</html>


