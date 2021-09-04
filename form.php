<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */

class Form

{
    public $action = "";
    public $method = "";
    public $fields = array();
    private function __construct($action, &$method = "POST")

    {

        $this->action = $action;
       
        $this->method = $method;

    }

    public function addField(...$fields)

    { 
        array_push($this->fields, $fields);
    }

    public function setMethod($method)
    {
        $this->method = $method; 
    }

    public static function createPostForm($action)

    {
        
        $PostForm = self::createForm($action, "POST"); 

        return $PostForm;
    }

    public static function createGetForm($action)

    {
        
        $GetForm = self::createForm($action, "GET");

        return $GetForm;
    }

    public static function createForm($action, $method)

    {
        $Form = new Form($action, $method); 

        return $Form;
    }

    public function render()

    { 
        echo "<form method='" . $this->method . "' action='" . $this->action . "'>\n";
        foreach ($this->fields as $property) {
            echo "    <label for='" . $property[1] . "'>" . $property[0] . "</label>\n";
            if(isset($property[2])){
                echo "    <input type='text' name='" . $property[1] . "' value='" .$property[2]. "' />\n";
            }else{
                echo "    <input type='text' name='" . $property[1] . "' value='' />\n";
            }
        }
        echo "    <button type='submit'>SEND</button>\n</form>\n";
    }

}
