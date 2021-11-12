<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
#if (!isset($_SESSION["id"]) || !isset($_SESSION["login"])  ){
#  header("Location: ../../../index.html");
#  exit();
// $classId = $_GET["classId"];
#}
?>
<script type='text/javascript'>
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style2.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="main.php" class="navbar-brand">LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="main.php" class="nav-link">Enrolled Courses</a>
                </li>
                <li class="nav-item">
                    <a href="user_profile.php" class="nav-link">Courses</a>
                </li>
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="row">
            <div id='bookings' class=" col-sm-6 table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1" style='width: fit-content; '>
                <table id='details' class = 'table table-hover table-borderless table-dark'>
                    <thead>
                        <tr style="border-bottom: 2px solid orange;">
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id= 'search_results'>
                    </tbody>
                </table>
            </div>
        </div>

        <div class = "row w-25">
        <a href="./enrolled.php" class="btn btn-primary">Back to enrolled class</a>
        </div>


    </main>



    <script>

        console.log("nihao")

        const classId = '<?php echo $_GET['classId'];?>';
        function getSection(){
    
            const request = new XMLHttpRequest();
            var search_results = document.getElementById('search_results');
            request.onreadystatechange = function(){
            if (this.readyState ==   4 && this.status==200){
                console.log(this.responseText)
                let data = JSON.parse(this.responseText).allSections.section;
                let gradedQuizAccess = JSON.parse(this.responseText).gradedQuizAccess;
                console.log(data)
                s = data
                
                for (section of s){
                    var classid = section["classId"]
                    var sectionid = section["sectionId"]
                    var sname = section["name"]
                    var description = section["description"]
                    // var completed = classes["completed"]
                    // var enrolledDate = classes["enrolledDate"]
                    // var completedDate = classes["completedDate"]
                    // var progress = classes["progress"]
                    if(sectionid != 100){
                    search_results.innerHTML += `
                    <tr>
                    
                    <td>${sname}</td>
                    <td>${description}</td>
                    <td><input type = "button" value = "View all materials" id = $sectionid = onclick="myFunction(${sectionid}, ${classId})"></button></td>
                    </tr>
                    </form>`
                    }
                                        
                }
                if(gradedQuizAccess) {
                    search_results.innerHTML += `
                    <tr>
                    
                    <td>Final Quiz</td>
                    <td>Get above the passing mark to attain a badge</td>
                    <td><a href="gradedQuiz.php?classId=${classId}&sectionId=100" class="btn btn-primary">Attempt Now!</a></td>
                    </tr>
                    </form>`
                }

            search_results.innerHTML += `</table>`
            }
            }
            //request.open("GET", "./server/helper/getSection.php", true);
            //request.send();
            request.open("GET", `./server/helper/getSection.php?classId=${classId}`, true);
            request.send();
        }
        function myFunction(section,classId) {
                        var sid = section
                        //const xmlHttp = new XMLHttpRequest();
                        //xmlHttp.open("GET", `./materials.php?sectionId=${sid}`,true);
                        //xmlHttp.send();
                        //console.log(sid)    

                        window.location.href = "./materials.php?sectionId=" + sid + "&classId=" + classId;
            }

    getSection();
    </script>
</body>
</html>