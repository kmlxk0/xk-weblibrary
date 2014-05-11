<?php
 require_once 'PHPUnit.php';

 class MathTest extends PHPUnit_TestCase {
     var $fValue1;
     var $fValue2;

     function MathTest($name) {
       $this->PHPUnit_TestCase($name);
     }

     function setUp() {
       $this->fValue1 = 2;
       $this->fValue2 = 3;
     }

     function testAdd() {
       $this->assertTrue($this->fValue1 + $this->fValue2 == 5);
     }

     function testAdd2() {
       $this->assertTrue($this->fValue1 + $this->fValue2 == 6);
     }
 }

 $suite = new PHPUnit_TestSuite('MathTest');
 $result = PHPUnit::run($suite);
 print $result->toHTML();
 ?>
