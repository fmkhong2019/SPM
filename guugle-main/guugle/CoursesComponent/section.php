<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
#if (!isset($_SESSION["id"]) || !isset($_SESSION["login"])  ){
#  header("Location: ../../../index.html");
#  exit();
#}
?>
<script type='text/javascript'>
const id = '<?php echo $_SESSION["cid"]?>';

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="search_result">

    </div>
    <script>
        console.log("nihao")
        function getSection(){
            console.log("hello");
            const request = new XMLHttpRequest();
            request.onreadystatechange = function(){
            if (this.readyState ==   4 && this.status==200){
                console.log(this.responseText)
                let data = JSON.parse(this.responseText).section;
                console.log(typeof(data))
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
                    search_results.innerHTML += `
                    <tr><td>${classid}</td>
                    <td>${sectionid}</td>
                    <td>${sname}</td>
                    <td>${description}</td>
                    </tr>`
                    
                }
            search_results.innerHTML += `</table>`
            }
            }
            request.open("GET", "../../../server/helper/getSection.php", true);
            request.send();
        }
    getSection();
    </script>
</body>
</html>