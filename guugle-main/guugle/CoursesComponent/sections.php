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

    <main>
        <div class="row">
            <div id='bookings' class=" col-sm-6 table-responsive-lg box_bookings animate__animated animate__bounceIn bounce1" style='width: fit-content; '>
                <table id='details' class = 'table table-hover table-borderless table-dark'>
                    <thead>
                        <tr style="border-bottom: 2px solid orange;">
                            <th scope="col">#</th>
                            <th scope="col">EngineerId</th>
                            <th scope="col">ClassId</th>
                            <th scope="col">Go to Course</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id= 'search_results'>
                    </tbody>
                </table>
            </div>
        </div>


    </main>



    <script>
        function getClass(){
            const request = new XMLHttpRequest();
            
            value = `<tbody>`;
            request.onreadystatechange = function(){
                if (this.readyState ==   4 && this.status==200){
                    console.log(this.responseText);
                    let data = JSON.parse(this.responseText).classes;
                    console.log(typeof(data));
                    c = data;
                    count = 0;
                    
                    for (classes of c){
                        count += 1;
                        var classid = classes["classId"]
                        var engineerid = classes["engineerId"]
                        // var completed = classes["completed"]
                        // var enrolledDate = classes["enrolledDate"]
                        // var completedDate = classes["completedDate"]
                        // var progress = classes["progress"]

                        value +=
                            `<tr>
                                <th scope="row">${count}</th>
                                <td>${engineerid}</td>
                                <td>${classid}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Button</a>
                                </td>
                            </tr>`;
                        
                    }
                    value += `</tbody>`;
                    document.getElementById("search_results").innerHTML = value;
                }
            }
            request.open("GET", "./server/helper/getEnrollment.php", true);
            request.send();
        }
    getClass();

        </script>
</body>
</html>