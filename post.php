<?php

/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */

 //değişkenlerin tanımlı olup olmadığını kontrol ediyoruz.

if(!isset($id)){
    $id = 1;
    $title = 'Default Content';
    $title["type"] = 'urgent';
}
//tanımlı değerlere renk ataması yapıyoruz
$color = match($title["type"]){
'urgent' 	=> 'red',
'warning'	=> 'yellow',
'normal'	=> ''
};

//tanımlı fonksiyonumuzu kullanmak için require ile fonksiyon dosyasını aktarıyoruz

require_once ("functions.php");
$background_color=getBackgroundColor($type);

//div'i ekrana çıktı olarak veriyoruz
echo "<div style='background-color:".$color."'>";
getPostDetails($id,$title["title"]);
echo "</div>";
