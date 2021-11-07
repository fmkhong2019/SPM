<?php
require "../vendor/autoload.php";
use PHPUnit\Framework\TestCase;
 
class EqualsTest extends TestCase
{
    public function testFailure()
    {
        require '../Learner/server/model/Section.php';
        $section = new Section(1,1,"Cybersecurity","Nice Mod");
        $section->sectionid=1;
        $section->classid=1;
        $section->name= "Cybersecurity";
        $section->description = "Nice Mod";
        $this->assertEquals("Cybersecurity",$section->getname("Cybersecurity"));
    }
 
}
?>