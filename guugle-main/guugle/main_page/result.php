<?php
// Ensures that user has successfully logged in and has a full profile with us!
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["login"])  ){
  header("Location: ../../../index.html");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Search Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="search.css">
</head>
<style>
    .animate__fadeIn{
        animation-duration: 1.5s;
    }
    body {
        background-image: url("img/bg_6.jpg");
        background-repeat: repeat;
        background-size: cover;
        width:100%;
    }
    .container{
        width:80%;
    }
    .nxm { 
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    color: black;
    padding: 0;
    font-family: inherit;
    font-size: inherit;
    font-weight: bold;
}

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <!-- Changed link to main.php --> 
        <a href="main.php" class="navbar-brand">
        <!-- <img src="" style="width: 100px; height: auto;"> -->
        Phris Coskitt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
        <!-- Search -->
        <form class="form-inline my-2 my-lg-0 ml-auto" action="result.php" method="POST">
            <input class="form-control form-control-sm" type="text" placeholder="Search" aria-label="Search" name="searchItem" id="searchItem">
            <button class="btn btn-link" id="doSearch" name="doSearch" type="submit"><i class="fas fa-search text-white" aria-hidden="true"></i></button>
        </form>
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="main.php" class="nav-link">Bookings</a>
            </li>
            <li class="nav-item">
                <a href="user_profile.php" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
            <a href="../../../server/helper/logout.php" class="nav-link" onclick="window.open('https://www.linkedin.com/m/logout/')">Log Out</a>  
            </li>
        </ul>
        </div>
    </nav>

    <!-- Search Results -->
    
    <h2 id="search_header" class="animate__animated animate__fadeIn" style="text-transform: uppercase; letter-spacing: .2rem;">Search Results</h2>
    
    <div class=' container-fluid box animate__animated animate__fadeIn'>
        <div id="search_results" style="padding-top: 30px; padding-bottom:30px;">
            


        </div>
    </div>
    
</body>
</html>


<script type='text/javascript'>

    //Retrieve Recommendations
    function getRandom(arr, n) {
        var result = new Array(n),
            len = arr.length,
            taken = new Array(len);
        while (n--) {
            var x = Math.floor(Math.random() * len);
            result[n] = arr[x in taken ? taken[x] : x];
            taken[x] = --len in taken ? taken[len] : len;
        }
        return result;
    }

    function getRecommendations(){
      result = getRandom(interviewers, 3)
      for (item of result){
        var name = item['fname'] + ' ' + item['lname'];
        var img = item['img'];
        var company = item['company'];
        var about = item['about'];
        var id = item['id'];
        var job = item['job'];
        var industry = item['industry'];
        

        search_results.innerHTML += `
        <div class="flex-container row" style="justify-content:center;">
        <form action="profile.php" method="POST">
            <div class="fir-image-figure">
                <img class="fir-author-image fir-clickcircle" src="${img}">

                <figcaption>
                <div class="fig-author-figure-title" style="font-weight:900;"><button class="btn-link nxm" value="${id}" name="interviewer_id">${name}</button></div>
                <div class="fig-author-figure-title">${job}, ${company}</div>
                <div class="fig-author-figure-title">${industry}</div>
                </figcaption>

               
            </div>
        </form>    
        </div>
        <br>
        `;
      }
    }

    let interviewers = {}
    let search = '<?php echo $_POST['searchItem']; ?>'.toLowerCase();
    

    var index = 0;
    function getInterviewers(){
    const request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status==200){
            let data = JSON.parse(this.responseText).interviewers;
            interviewers = data;
            for (interviewer of data){
                var industry = interviewer['industry'].toLowerCase();
                var fname = interviewer['fname'].toLowerCase();
                var lname = interviewer['lname'].toLowerCase();
                if ((fname.includes(search) || lname.includes(search) || industry.includes(search)) && search != ''){

                    var name = interviewer['fname'] + ' ' + interviewer['lname'];
                    var img = interviewer['img'];
                    var company = interviewer['company'];
                    var about = interviewer['about'];
                    var id = interviewer['id'];
                    var job = interviewer['job'];
                    var industry = interviewer['industry'];
                    index ++;
                    
                    search_results.innerHTML += `
                    <form action="profile.php" method="POST">
                    <div class="fir-image-figure">
                        <img class="fir-author-image fir-clickcircle" src="${img}">
                        
                        <figcaption>
                        <div class="fig-author-figure-title" style="font-weight:900;"><button class="btn-link nxm" value="${id}" name="interviewer_id">${name}</button></div>
                        <div class="fig-author-figure-title">${job}, ${company}</div>
                        <div class="fig-author-figure-title">${industry}</div>
                        </figcaption>        
                        
                    </div>
                    </form>
                    
                    
                    </div>
                    
                    <br>
                    `;
                }
            }
            if (index == 0){
                search_results.innerHTML += `
                <div class="text-center">
                    <i class="fas fa-exclamation-circle fa-8x" style="color: #cb1616;"></i>
                    <h4 style="margin: 20px 20px 10px 20px">Sorry, we couldn't find what you were searching for!</h4>
                    <h5 style="margin-bottom: 20px;">How about these <strong style="font-style: italic;">fine</strong> interviewers instead?</h5>
                    <br>
                </div>
                    
                `;
                getRecommendations();
            }
        }
    }
    request.open("GET", "../../../server/helper/getInterviewers.php", true);
    request.send();
    };
    getInterviewers();

</script>
    
