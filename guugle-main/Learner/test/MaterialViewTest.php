<?php
    // require '../vendor/autoload.php';
    require '../../server/controller/MaterialView.php';

    use PHPUnit\Framework\TestCase;

    class MaterialViewTest extends TestCase
    {
        public function test()
        {
            
            
            $section = new MaterialView(1,1,"Cybersecurity", "Nice Mod");

            $this->assertEquals("Cybersecurity", $section->getname());

        }
    }

?>