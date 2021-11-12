<?php
// Brayden Leo
    // require '../vendor/autoload.php';
    require_once './guugle-main/Learner/server/model/MaterialView.php';
    require_once "./guugle-main/Learner/server/model/ViewingController.php";

    use PHPUnit\Framework\TestCase;
    use function PHPUnit\Framework\assertEquals;
    use function PHPUnit\Framework\setUpBeforeClass;
    use function PHPUnit\Framework\tearDownAfterClass;

class MaterialViewTest extends TestCase
    {
        
        #function obtains material information from a section, 1 of which has been viewed and the other has not
        public function testObtainMaterial()
        {
            $materialView = new MaterialView();
            $materials = $materialView->getMaterials(1,1,1)['materials'];
            var_dump($materials);
            foreach ($materials as $material){
                if($material["materialId"] == 1){
                    assertEquals("1/1/DMscript.pdf", $material["filePath"]);
                }
                else {
                    assertEquals("1/1/xylo.PNG", $material["filePath"]);
                }
            }
        }

        public function testObtainCompletion(){
            $materialView = new MaterialView();
            $materials = $materialView->getMaterials(1,1,1)['materials'];
            foreach ($materials as $material){
                if($material["materialId"] == 1){
                    assertEquals(1, $material["completed"]["viewing"]["completed"]);
                }
                else {
                    assertEquals(0, $material["completed"]["viewing"]["completed"]);
                }
            }
        }

        public function testPreventCompletionBeforeViewing(){
            $viewingController = new ViewingController();
            $viewingController->updateViewingCompletion(1, 1);
            $materialView = new MaterialView();
            $materials = $materialView->getMaterials(1,1,1)['materials'];
            foreach ($materials as $material){
                if($material["materialId"] == 2){
                    assertEquals(0, $material["completed"]["viewing"]["completed"]);
                }
            }


        }

        public function testUpdateCompletionAfterViewing(){
            $materialView = new MaterialView();         
            $materialView->getS3(2, 1);
            $viewingController = new ViewingController();
            $viewingController->updateViewingCompletion(2, 1);
            $materials = $materialView->getMaterials(1,1,1)['materials'];
            foreach ($materials as $material){
                if($material["materialId"] == 2){
                    assertEquals(1, $material["completed"]["viewing"]["completed"]);
                }
            }

        }


        // public function tearDownAfterClass()
        // {
            
        // }


        

    }
    // $test = new MaterialViewTest();
    // $test->obtainMaterial();

?>