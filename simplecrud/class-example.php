<?php
    class ParentCl {

        public $var1 = 1;
        protected $var2 = 2;
        private $var3 = 3;
        public function __construct() {
            echo 111;
        }
        public function test($test1 = 1) {
            echo '-222-';
            echo $this->var2;
        }
    }

    class ChildCl extends ParentCl {
        public function test($test1 = 1) {
            echo '-333-';
            // echo $this->var3;
            echo $test1;
        }
    }

    $test = new ParentCl();
    $test->test();

    echo "<br><br><br>";

    $chl = new ChildCl();
    echo $chl->var1;

    echo "<br><br>";
    echo $chl->test(11);

    /**
     * DB // connect database
     *  // create insert function
     *  // create update function  
     */

?>