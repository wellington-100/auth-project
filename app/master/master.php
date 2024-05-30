<?php 
    // Definirea interfetei
    interface LanguageInterface {
        public function setName($name);
        public function getName();
        public function setVersion($version);
        public function getVersion();
        public function getDetails();
    }

    //Implementarea interfetei in clasa Language()
    class Language implements LanguageInterface {
        private $name;
        private $version;

        public function __construct($name, $version){
            $this->name = $name;
            $this->version = $version;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setVersion($version){
            $this->version = $version;
        }

        public function getVersion(){
            return $this->version;
        }

        public function getDetails(){
            return "Language: ".$this->getName().", version: ".$this->getVersion();
        }
    }

    // Implimentarea interfetei in clasa ProgrammingLanguage
    class ProgrammingLanguage extends Language implements LanguageInterface {
        private $type;

        public function __construct($name, $version, $type){
            parent::__construct($name, $version);
        }
        public function setType($type){
            $this->type = $type;
        }

        public function getType(){
            return $this->type;
        }

        public function getDetails(){
            return "Language: ".$this->getName().", version: ".$this->getVersion().", type: ".$this->getType();
        }
    }

$languages = [
    new Language('Python', 3.13),
    new ProgrammingLanguage('PHP', 8.3, 'Scripting'),
    new ProgrammingLanguage('Java', 17, 'Compiled')
];

foreach ($languages as $language) {
    echo $language->getDetails() . '</br>';
}
?>

    <!-- // function even($n) {
    //     return ($n % 2 == 0);
    // }

    // function fibonaci() {
    //     $a = 0;
    //     $b = 1;
    //     $fibo = [$a, $b];
    //     for ($i = 0; $i < 10; $i++) {
    //         $next = $a + $b;
    //         $fibo[] = $next;
    //         $a = $b;
    //         $b = $next;
    //     }
    //     print_r($fibo);
    // } -->

    