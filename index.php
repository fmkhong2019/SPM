<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="guugle-main/guugle/parallax.js-1.5.0/parallax.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <title>guugle</title>
  <link rel="stylesheet" href="card4.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<style>
  .bounce1 {
    animation-delay: 0.3s;
  }

  .bounce2 {
    animation-delay: 0.5s;
  }

  .bounce3 {
    animation-delay: 0.7s;
  }

  .animation {
    animation-duration: 1s;
  }

  .fadein {
    animation-duration: 1.5s;
  }

  .anime {
    animation-duration: 1.5s;
  }

  .jack {
    animation-duration: 1.2s;
  }

  i {
    margin-bottom: 10px;
  }

  li.faq {
    margin-bottom: 10px;
    text-decoration: none;
  }

  li.faq a {
    color: black;
    text-decoration: none;
  }

  .collapse {
    margin-top: 5px;
  }
</style>

<body data-spy="scroll" data-target="body" data-offset="490">
  <script>
    // Scroll Animation Function
    $(document).ready(function() {
      // Check if element is scrolled into view
      function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return (((elemTop >= docViewTop) && (elemTop <= docViewBottom)) || ((elemBottom >= docViewTop) && (elemBottom <= docViewBottom)));
      }
      // If element is scrolled into view, fade it in
      $(window).scroll(function() {
        $('.animation').each(function() {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass('animate__fadeInLeft');
          }
        });
      });
      $(window).scroll(function() {
        $('.bounce').each(function() {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass('animate__bounceIn');
          }
        });
      });
      $(window).scroll(function() {
        $('.fadein').each(function() {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass('animate__fadeIn');
          }
        });
      });
      $(window).scroll(function() {
        $('.jack').each(function() {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass('animate__jackInTheBox');
          }
        });
      });
    });
  </script>


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
    <a href="index.html" class="navbar-brand"><img src="" style="width: 100px; height: auto;">LMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="hamburger">
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
                    <a href="home.html" class="nav-link">Home</a>
                    
                </li> -->
        <li class="nav-item">
          <a href="./Trainer.php" class="nav-link">Trainer</a>
          <a href="./Learner.php" class="nav-link">Learner</a>
          <a href="./HR.php" class="nav-link">HR</a>
        </li>
        <li class="nav-item">
          <a href="./guugle-main/Trainer/View_Courses.php" class="nav-link">View Courses</a>
        </li>
        <li class="nav-item">
          <a href="./guugle-main/Learner/enrolled.php" class="nav-link">View Enrollment</a>
        </li>
        <li class="nav-item">
          <a href="./guugle-main/Trainer/ViewTaughtCourses.php" class="nav-link">Taught Courses</a>
        </li>
        <li class="nav-item">
          <a href="#faq" class="nav-link">FAQ</a>
        </li>
        <li class="nav-item">
          <a href="./guugle-main/HR/Home.php" class="nav-link">HR Portal</a>
        </li>

        <li class="nav-item">
          <!-- LinkedIn Hidden Inputs -->
          <form method='get' action='https://www.linkedin.com/oauth/v2/authorization' class="form-inline">
            <input type='hidden' name='response_type' value='code'>
            <input type='hidden' name='client_id' value='868ixxuf9za2rx'>
            <input type='hidden' name='redirect_uri' value='http://localhost/dataspm/server/helper/callback.php'>
            <!-- <input type='hidden' name='state' value = 'DCEeFWf45A53sdfKef424'>  -->
            <input type='hidden' name='scope' value='r_liteprofile,r_emailaddress'>

            <button href="#" type='submit' class="nav-link" style="background-color: transparent; border: none; text-transform: uppercase; letter-spacing: .1rem;">Logged In</button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header-->
  <!-- Taken from "https://www.freepik.com" -->
  <div class="parallax-window tint header" data-parallax="scroll" data-image-src="./img/singapore.jpg" style="min-height: 800px; margin-top:0px">
    <div class="headText parallax-text p-text">
      <h1>One stop learning platform</h1>
      <form method='get' action='https://www.linkedin.com/oauth/v2/authorization' class="form-inline">
        <input type='hidden' name='response_type' value='code'>
        <input type='hidden' name='client_id' value='8666gpxcfx4fa8'>
        <input type='hidden' name='redirect_uri' value='http://localhost:8888/app/server/helper/callback.php'>
        <!-- <input type='hidden' name='state' value = 'DCEeFWf45A53sdfKef424'>  -->
        <input type='hidden' name='scope' value='r_liteprofile,r_emailaddress'>

        <button href="#" type='submit' class="btn btn-outline-light mx-auto" style="margin-top:10px;">Enroll now</button>
      </form>
      <!--<button type="button" class="btn btn-outline-light" style="margin-top: 10px;">Let us help you!</button>-->
    </div>
  </div>


  <!-- Industry Experts -->
  <!--<div class="container mx-auto animate__animated" id="interviewers"></div>-->
  <div class="container animation animate__animated" id="interviewers">
    <h2 class="animation animate__animated a">Meet a few of our trainers!</h2>

    <div class="row">
      <div class="card col-sm-4" style="width: 18rem;">
        <img class="card-img-top" src="img/chris.jpg" alt="prof">
        <div class="card-body">
          <h5 class="card-title">Phris Coskitt <a href="https://www.linkedin.com/in/cposkitt/" target="_blank" style="padding-left: 5px;"><i class="fab fa-linkedin fa-md"></i></a></h5>
          <p class="desc">Assistant Professor of Information Systems, SMU</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="desc-review">I am a faculty member in the School of Information Systems at Singapore Management University, where I am part of the Research Lab for Intelligent Software Engineering (RISE).</p>
        </div>
      </div>
      <div class="card col-sm-4" style="width: 18rem;">
        <img class="card-img-top" src="./img/liyin.jpg" alt="xw">
        <div class="card-body">
          <h5 class="card-title">Lin Liyin <a href="https://www.linkedin.com/in/xinweiwong/" target="_blank" style="padding-left: 5px;"><i class="fab fa-linkedin fa-md"></i></a></h5>
          <p class="desc">Tech Lead, Google LLC.</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="desc-review">I am one of the best students in the School of Information Systems, currently assisting 3 modules as a Teaching Assistant.</p>
        </div>
      </div>
      <div class="card col-sm-4" style="width: 18rem;">
        <img class="card-img-top" src="img/hongseng.png" alt="hs">
        <div class="card-body">
          <h5 class="card-title">Ong Hong Seng <a href="https://www.linkedin.com/in/hong-seng-ong-1602851/" target="_blank" style="padding-left: 5px;"><i class="fab fa-linkedin fa-md"></i></a></h5>
          <p class="desc">Senior Instructor of Information Systems, SMU</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half"></i>
          </div>
          <p class="desc-review">I am a faculty member in the School of Information Systems at Singapore Management University, where I teach courses related to Software Engineering!</p>
        </div>
      </div>
    </div>
  </div>


  <!-- About Us Parallax -->
  <!-- <p class="parallax-text">
            <span style="font-size: 35px; letter-spacing: .2rem;">WHAT WE DO</span><br>
            We have curated several professionals across a multitude of industries who have been generous enough to offer their time to help level up the interview skills of others. Through our platform,
            you can simply arrange for either an informational or mock interview with an industry professional and begin the process of upgrading your interviewing skills for that next job on the horizon!
        </p> -->
  <!-- Credits: "https://www.freepik.com/photos/business-card" Business card photo created by katemangostar - www.freepik.com-->
  <div class="parallax-window tint try" id="about" data-parallax="scroll" data-image-src="img/interview2.jpg" style="margin-top: 100px;">
    <div class="outerdiv">
      <div class="row mx-auto text-center fadein animate__animated" id="innerdiv">
        <div style="margin-bottom: 30px;">
          <span style="font-size: 35px; letter-spacing: .2rem; text-align: center;">WHAT WE DO</span><br>
          <p>
            We have curated several professionals across a multitude of industries who have been generous enough to offer their time to help level up the interview skills of others. Through our platform,
            you can simply arrange for either an informational or mock interview with an industry professional and begin the process of upgrading your interviewing skills for that next job on the horizon!
          </p>
        </div>
        <div class="row">
          <div class="col-sm-4 bounce animate__animated bounce1">
            <!-- style="color: rgb(180, 246, 255);" -->
            <i class="far fa-thumbs-up fa-8x"></i>
            <h1>100%</h1>
            <h3>Approval</h3>
          </div>
          <div class="col-sm-4 bounce animate__animated bounce2">
            <!-- style="color: rgb(202, 255, 202);" -->
            <i class="fas fa-chart-line fa-8x"></i>
            <h1>200%</h1>
            <h3>Improvement in Interview Skills</h3>
          </div>
          <div class="col-sm-4 bounce animate__animated bounce3">
            <!-- style="color: rgb(255, 255, 161);" -->
            <i class="fas fa-briefcase fa-8x"></i>
            <h1>101%</h1>
            <h3>Jobs Secured</h3>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Video Walkthrough / Advertisement -->
  <div style="text-align: center;" class="jack animate__animated" id="how">
    <h2 class="a">How it works!</h2>
    <video width="60%" height="auto" controls autoplay>
      <source src="img/site_vid.mov" type="video/mp4">
    </video>
  </div>

  <!-- Reviews -->
  <!-- Adapted from CodingNepal, https://www.codingnepalweb.com/2020/10/responsive-testimonials-section.html -->
  <div class="container reviews mx-auto animation animate__animated" id="reviews">
    <h2 class="animation animate__animated a">Hear what our users have to say!</h2>
    <div class="wrapper animation animate__animated anime">
      <div class="box2">
        <i class="fas fa-quote-left quote"></i>
        <p>Dr. Phris Coskitt is a wonderful professor, when he isn't trying to jumpscare me.</p>
        <div class="content">
          <div class="info">
            <div class="name">Lim Zhi Hao</div>
            <div class="job">Software Engineer</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/zh.jpeg" alt="zhihao">
          </div>
        </div>
      </div>

      <div class="box2">
        <i class="fas fa-quote-left quote"></i>
        <p>Thanks to this platform, I was able to upgrade my interview skills and secure a job!</p>
        <div class="content">
          <div class="info">
            <div class="name">Ambrose Wang</div>
            <div class="job">Tech Consultant</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/ambrose.jpg" alt="ambrose">
          </div>
        </div>
      </div>

      <div class="box2">
        <i class="fas fa-quote-left  quote"></i>
        <p>I would be homeless right now if it weren't for this platform.</p>
        <div class="content">
          <div class="info">
            <div class="name">Goh Wei Jie</div>
            <div class="job">Game Developer</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/weijie2.jpg" alt="weijie">
          </div>
        </div>
      </div>

      <div class="box2">
        <i class="fas fa-quote-left  quote"></i>
        <p>Xin Wei helped me become the second best in SIS. Only second because first is reserved for Xin Wei..</p>
        <div class="content">
          <div class="info">
            <div class="name">Brayden Leo</div>
            <div class="job">Fintech Expert</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/brayden.jpeg" alt="brayden">
          </div>
        </div>
      </div>

      <div class="box2">
        <i class="fas fa-quote-left  quote"></i>
        <p>Thanks to Hong Seng, I now have a job!</p>
        <div class="content">
          <div class="info">
            <div class="name">Benjamin Khong</div>
            <div class="job">Business Analyst</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/ben.jpg" alt="ben">
          </div>
        </div>
      </div>

      <div class="box2">
        <i class="fas fa-quote-left  quote"></i>
        <p>Watch out Batman, I'm coming for you!!</p>
        <div class="content">
          <div class="info">
            <div class="name">Phris Coskitt</div>
            <div class="job">Professional Villain</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="img/chris.jpg" alt="chris">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="card2 col-sm-4" style="width: 18rem;">
                  <div class="card-author">
                    <a class="author-avatar">
                      <img src="img/zh.jpeg"/>
                    </a>
                    <svg class="half-circle" viewBox="0 0 106 57">
                      <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                    </svg>
          
                    <div class="author-name">
                      <div class="author-name-prefix">Developer</div>
                      Lim Zhi Hao
                    </div>
                  </div>
                  <p class="textDate">Jun 24th 2020</p>
                  <p class="card-text reviewDesc">Dr. Phris Coskitt is a wonderful professor, when he isn't trying to jumpscare me.</p>
              
              </div>
              <div class="card2 col-sm-4" style="width: 18rem;">
                <div class="card-author">
                  <a class="author-avatar">
                    <img src="img/brayden.jpeg"/>
                  </a>
                  <svg class="half-circle" viewBox="0 0 106 57">
                    <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                  </svg>
        
                  <div class="author-name">
                    <div class="author-name-prefix">Teacher</div>
                    Brayden Leo
                  </div>
                </div>
                <p class="textDate">July 7th 2020</p>
                <p class="card-text reviewDesc">Xin Wei helped me become the second best in SIS.</p>
            
            </div>

              </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="card2 col-sm-4" style="width: 18rem;">
                <div class="card-author">
                  <a class="author-avatar" href="#">
                    <img src="img/ben.jpg" />
                  </a>
                  <svg class="half-circle" viewBox="0 0 106 57">
                    <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                  </svg>
        
                  <div class="author-name">
                    <div class="author-name-prefix">Security Analyst</div>
                    Benjamin Khong
                  </div>
                </div>
                  <p class="textDate">Aug 9th 2020</p>
                  <p class="reviewDesc">Thanks to Hong Seng, I now have a job!<p>
              </div>
              <div class="card2 col-sm-4" style="width: 18rem;">
                <div class="card-author">
                  <a class="author-avatar" href="#">
                    <img src="img/weijie.jpg" />
                  </a>
                  <svg class="half-circle" viewBox="0 0 106 57">
                    <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                  </svg>
        
                  <div class="author-name">
                    <div class="author-name-prefix">Game Developer</div>
                    Goh Wei Jie
                  </div>
                </div>
                  <p class="textDate">Sep 14th 2020</p>
                  <p class="reviewDesc">I would be homeless right now if it weren't for this platform.<p>
              </div>
        
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <div class="card2 col-sm-4 mx-auto" style="width: 18rem;">
              <div class="card-author">
                <a class="author-avatar" href="#">
                  <img src="img/ambrose.jpg" />
                </a>
                <svg class="half-circle" viewBox="0 0 106 57">
                  <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                </svg>
      
                <div class="author-name">
                  <div class="author-name-prefix">Tech Consultant</div>
                  Ambrose Wang
                </div>
              </div>
                <p class="textDate">Oct 11th 2020</p>
                <p class="reviewDesc">Thanks to this platform, I was able to upgrade my interview skills and secure a job!<p>
            </div>
          </div>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> -->

  <!-- FAQ Section -->
  <div class="container animation animate__animated" style="margin-top: 100px;" id="faq">
    <h1 style="text-align: center; margin-bottom: 40px;">FAQ</h1>
    <ol style="display: table; margin: 0 auto;">
      <li class="faq">
        <a href="#faq1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq1">
          What is the difference between an <strong>Informational</strong> & <strong>Mock</strong> interview?
        </a>
        <ul class="collapse" id="faq1" style="color: #17a2b8;">
          <li><strong>Informational Interview</strong> is a conversation in which
            a person <br> seeks insights on a career path, an industry, a company and/or <br>
            general career advice from someone with experience and <br> knowledge in the
            areas of interest.
          </li>
          <li>
            <strong>Mock Interview</strong> is an emulation of a job interview used for <br>
            training purposes. The conversational exercise usually <br> resembles a real
            interview as closely as possible, for the <br> purpose of providing experience
            for a candidate.
          </li>
        </ul>
      </li>
      <li class="faq">
        <a href="#faq2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq2">
          How much does an interview cost?
        </a>
        <p class="collapse" id="faq2" style="color: #17a2b8;">
          It's absolutely <strong style="color: rgb(4, 181, 4);">FREE!</strong>
        </p>
      </li>
      <li class="faq">
        <a href="#faq3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq3">
          Can I choose my interviewer?
        </a>
        <p class="collapse" id="faq3" style="color: #17a2b8;">
          <strong>Definitely!</strong> You are able to choose whomever you prefer from <br> our wide selection of professional interviewers!
        </p>
      </li>
      <li class="faq">
        <a href="#faq4" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq4">
          Can I book an interview at my own convenience?
        </a>
        <p class="collapse" id="faq4" style="color: #17a2b8;">
          <strong>Unfortunately no.</strong> Our interviewers are all busy with their own jobs <br> as well and only have so much time to make
          for helping <br> the community out with their interviews!
        </p>
      </li>
      <li class="faq">
        <a href="#faq5" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq5">
          Can I do the interview online?
        </a>
        <p class="collapse" id="faq5" style="color: #17a2b8;">
          <strong>Yes you can!</strong> Simply drop the interviewer an email to indicate <br> your preference.
        </p>
      </li>
      <li class="faq">
        <a href="#faq6" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq6">
          Why must I sign up using LinkedIn?
        </a>
        <p class="collapse" id="faq6" style="color: #17a2b8;">
          This is to ensure that all interviewees and interviewers have <br> professional credentials!
        </p>
      </li>
      <li class="faq">
        <a href="#faq7" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq7">
          What should I do if I can't make it for my interview?
        </a>
        <p class="collapse" id="faq7" style="color: #17a2b8;">
          Simply cancel your booking on the main dashboard but do <br> make sure you cancel it <strong style="color: red;">at least 48 hours</strong>
          in advance so that the <br> interviewer can be notified in time!
        </p>
      </li>
      <li class="faq">
        <a href="#faq8" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq8">
          Is there a penalty for missing an interview?
        </a>
        <p class="collapse" id="faq8" style="color: #17a2b8;">
          <strong>No there isn't</strong>, but please do not abuse this as our interviewers are <br> generously sacrificing their own free time
          to help the community.
        </p>
      </li>
      <li class="faq">
        <a href="#faq9" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq9">
          Am I able to cancel my interview?
        </a>
        <p class="collapse" id="faq9" style="color: #17a2b8;">
          <strong>Yes of course!</strong> Just be sure to do it <strong style="color: red;">at least 48 hours</strong> before <br>
          your interview out of courtesy for the interviewer!
        </p>
      </li>
      <li class="faq">
        <a href="#faq10" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="faq10">
          Is Phris Coskitt the evil twin brother of Chris Poskitt?
        </a>
        <p class="collapse" id="faq10" style="color: #17a2b8;">
          <strong style="color: rgb(143, 1, 1); font-family: Georgia, 'Times New Roman', Times, serif;">We do not speak of this here...</strong>
        </p>
      </li>
    </ol>
  </div>

  <!-- Footer -->
  <div class="text-center py-2" style="background-color: black; color: white; margin-top: 300px; font-size: small;">?? 2020 Copyright:
    <a href="https://www.linkedin.com/in/zhi-hao-lim/" target="blank">Guugle</a>
  </div>

</body>

</html>