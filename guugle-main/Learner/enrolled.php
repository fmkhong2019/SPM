
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
            </ul>
        </div>
    </nav>

    <main id="search_results">

    </main>



    <script>
        console.log("nihao")
        function getClass(){
            console.log("hello");
            const request = new XMLHttpRequest();
            
            value = `<table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Enrolled Date</th>
                                <th scope="col">Completed?</th>
                                <th scope="col">Take me to the course</th>
                            </tr>
                        </thead>
                        <tbody>`;
            request.onreadystatechange = function(){
                if (this.readyState ==   4 && this.status==200){
                   // console.log(this.responseText);
                    let data = JSON.parse(this.responseText).classes;
                    //console.log(data1);
                    c = data;
                    // d = data1;
                    // e = data2;
                    // console.log(c)
                     count = 0;
                    // abc = [] // contains all classId the engineer take
                    // def = [] // contains all courseId of the classId
                    // zxc = []
                    // final = []
                    // for (classes of c){
                    //     var classid = classes["classId"]
                    //     var engineerid = classes["engineerId"]
                    //     abc.push(classid)
                    // }
                    // for (classesDetails of d){
                    //     var courseid = classesDetails["courseId"]
                    //     var classid1 = classesDetails["classId"]
                    //     for (x of abc){
                    //         console.log("x",x)
                    //         if (classid1 == x){
                    //             def.push(courseid)
                    //     }
                    //  }
                    // }
                    // console.log("def",def)
                    // // for(courses of e){
                    // //     var courseid1 = courses["courseId"]
                    // //     var courseName = courses["courseName"]
                    // //     for(z of def){
                    // //         if (courseid1 == z){
                    // //             zxc.push(courseName)
                    // //         }
                    // //     }
                    // // }
                    // var course_dict = new Object();
                    // var class_dict = new Object();
                    // for (courses of e) {
                    //     course_dict[courses["courseId"]] = courses["courseName"]
                    // }
                    
                    // // for (classesDetails of d){
                    // //     class_dict[classesDetails[]]
                    // // } 
                    // console.log(course_dict)
                    //console.log(course_dict.length)
                    for (classes of c){
                        count += 1;
                        var classid = classes["classId"]
                        var engineerid = classes["engineerId"]
                        var coursename = classes["courseName"]
                        var enrolleddate = classes["enrolledDate"]
                        var completed = classes["completed"]

                        console.log(c);

                        if(completed ==1 ){
                            var display = 'Completed'
                        }

                        else {
                            var display = "Not Completed"
                        }
   
                        // var completed = classes["completed"]
                        // var enrolledDate = classes["enrolledDate"]
                        // var completedDate = classes["completedDate"]
                        // var progress = classes["progress"]

                        value +=
                            `<tr>
                                <th scope="row">${count}</th>
                                <td>${coursename}</td>
                                <td>${enrolleddate}</td>
                                <td>${display}</td>

                                

                                <td>
                                <input type = "button" value = "View all materials" id = $sectionid = onclick="RedirectFunction(${classid})"></button>
                                </td>
                            </tr>`;
                        
                    }
                    value += `</tbody>
                            </table>`;
                    document.getElementById("search_results").innerHTML = value;
                }
            }
            request.open("GET", "./server/helper/getEnrollment.php", true);
            request.send();
        }
        function RedirectFunction(classid) {
                        var cid = classid
                        //const xmlHttp = new XMLHttpRequest();
                        //xmlHttp.open("GET", `./materials.php?sectionId=${sid}`,true);
                        //xmlHttp.send();
                        //console.log(sid)    

                        window.location.href = "./sections.php?classId=" + cid;
            }

    getClass();

        </script>
</body>
</html>