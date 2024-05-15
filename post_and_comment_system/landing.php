<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Front Page</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="crossorigin="
    anonymous></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');

:root{
  --color-1: #35408E;
  --text-color: #f0f0f0;
}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  padding-top: 100px;
}
html{
  font-size: 12pt;
  font-family: "Noto Sans";
}
nav{
  height: 130px;
  background-color: var(--color-1);
  display: flex;
  justify-content: center;
  align-items: center;
}
#headernav {
  position: fixed;
  width: 100%;
  top: 0px;
  left: 0px;
  display: block;
  color: #eee;
  z-index: 1000;
}
.links-container{
  display: flex;
  flex-direction:row;
  justify-content: space-evenly;
}
.accstatus, .navlink {
  font-size: 1.5em;
  font-weight: 700;
  padding: 0 30px;
}
.accstatus{
  color: black;
  background-color: white;
  border-radius: 50px;
}
nav .navlink{
  height: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  color: var(--text-color);
  margin-right: 10px;
}
#logos {
  width: 50%;
  height: 70%;
  margin-top: 6%;
}
.herosection{
  background-color: #E0FFFF;
  height: 40vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  text-align: center;
  padding: 0px 30px;
}
.h1greet {
  margin-bottom: 0.5em;
}
.h1main {
  font-size: 80px;
  font-weight: 800;
}
.pmain {
  font-weight: 450;
  font-size: 1.2em;
}
.box{
	width: 50%;
	height: 100px;
	background-color: white;
	border-radius: 50px;
	display: flex;
	align-items: center;
  justify-content: center;
	padding: 10px;
}
.box > i {
	font-size: 20px;
	color: #777;
}
.box > input{
	flex: 1;
	height: 100%;
	border: none;
	outline: none;
	font-size: 18px;
	padding-left: 10px;
}
#searchinput::placeholder {
  font-size: 30px;
}
nav .navlink:hover{
  background-color: white;
  color: black;
  border-radius: 50px;
  transition: 0.3s;
}
nav .home-link{
  margin-right: auto;
}
nav svg{
  fill: var(--text-color);
}
.navlogo {
  margin-right: 10px;
}
.checkbtn {
    display: block;
    font-size: 30px;
    color:white;
    float: left;
    margin-left: -5%;
    margin-right: 3%;
    line-height: 100px;
    cursor: pointer;
}
.ask {
  font-weight: 600;
  font-size: 2em;
}
#sidelink {
  background-color: white;
  border-radius: 50px;
  font-size: 1.3em;
  padding: 20px;
  color: black;
  text-decoration: none;
}
.links-hider {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  position: fixed;
  width: 10%;
  height: 100%;
  background-color: var(--color-1);
  top: 100px;
  left: -100%;
  text-align: center;
  transition: all .5s;
  gap: 50px;
}
.listbelow {
  margin-top: 20%;
}
  #check:checked ~ .links-hider{
  left: 0;
}
#check {
  display:none;
}
#hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin-top: 40px;
}
#herogreet {
  font-size: 50px;
}
#heroparagraph {
  font-size: 20px;
}
.wrapper{
  margin-top: 5px;
  width: 420px;
  background: transparent;
  color: black;
  border-radius: 12px;
  padding: 30px 40px;
}
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid black;
  border-radius: 40px;
  font-size: 16px;
  color: black;
  padding: 20px 45px 20px 20px;
  background-color: #ECECEC;
}
.input-box input::placeholder{
  color: black;
}
.input-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;

}
.wrapper .remember-forgot{
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}
.remember-forgot label input{
  accent-color: black;
  margin-right: 3px;

}
.remember-forgot a{
  color: black;
  text-decoration: none;

}
.remember-forgot a:hover{
  text-decoration: underline;
}
.wrapper .btn{
  width: 100%;
  height: 45px;
  background: var(--color-1);;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: white;
  font-weight: 600;
}
.wrapper .register-link{
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;

}
.register-link p a{
  color: black;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover{
  text-decoration: underline;
}
#questions{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 50px;
  margin-top: 3%;
}
.flex-container {
  display: flex;
  width: 50%;
  height: 20vh;
  margin: 0;
  justify-content: center;
  align-items: center;
  border: 2px solid black;
  flex-direction: column;
}
.flex-box {
  width: 300px;
  height: 300px;
  font-size: 21px;
  text-align: center;
  line-height: 100px;
  border-radius: 20px;
  margin-left: 150px;
  border: 8px solid #35408E; 
}
.questionbreaker {
  border-bottom: black solid 1px;
  width: 90%;
}

.question-about {
  display: flex;
  flex-direction: row;
  gap: 5px;
}
.about {
  color: var(--color-1);
  font-size: 16px;
}
.question-paragraph {
  font-size: 18px;
  font-weight: 400;
}
.answer-paragraph {
  display: block;
  margin-top: 25px;
  text-decoration: none;
  color: var(--color-1);
  font-weight: 600;
}
.bottomfooter {
  margin-left: auto;
  margin-right: auto;
  margin-top: 5%;
  width: 50%;
  padding: 30px;
  height: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  gap: 55%;
  background-color: var(--color-1);
  bottom: 0;
  width: 100%;
}

.propertytext {
  color: var(--text-color);
  display: flex;
  margin-bottom: -1em;
}
#group {
  text-align: left;
}
#subject {
  text-align: left;
}

@media(max-width: 1280px){
  .links-hider {
    width: 15%;
  }
  .bottomfooter {
    gap: 30%;
  }
}

@media(max-width: 1100px){
  #logos{
    width: 45%;
    height: 60%;
    margin-top: 6%;
  }
  .box {
    width: 30%
  }
  nav a {
    font-size: 20px;
  }
}

@media(max-width: 1100px) and (min-width: 610px) {
  #logos{
    width: 45%;
    height: 60%;
    margin-top: 6%;
  }
  .box {
    width: 35%
  }
  nav a {
    font-size: 16px;
  }
}

@media(max-width: 915px){
  nav a {
    font-size: 18px;
  }
  .box {
    width: 25%;
  }
  .box > input{
    width: 25%;
  }
}

@media(max-width: 875px){
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -15%;
    margin-right: 5%;
  }
  .links-hider {
    position: fixed;
    width: 23%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
    z-index: 1000;
    text-align: center;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
  #logos{
    width: 40%;
    height: 60%;
    margin-top: 6%;
    margin-left: 2%;
  }
  .box {
    margin-right: -14%;
    width: 50%;
  }
  .links-container {
    display: none;
  }
}

@media(max-width: 700px){
  nav {
    width: 100%;
  }
  #logos{
    width: 35%;
    height: 35%;
    margin-top: 6%;
    margin-right: -5em;
  }
  .box {
    width: 40%
  }
  .box > input{
    width: 50%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -33%;
  }
  .links-hider {
    position: fixed;
    width: 23%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}
@media(max-width: 550px){
  nav {
    width: 100%;
  }
  #logos{
    width: 35%;
    height: 35%;
    margin-top: 6%;
    margin-right: -5em;
  }
  .box {
    width: 50%
  }
  .box > input{
    width: 50%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -15%;
  }
  .links-hider {
    position: fixed;
    width: 30%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}
@media(max-width: 440px) {
  nav {
    width: 110%;
  }
  .fas {
    font-size: 20px;
  }
  #logos{
    width: 25%;
    height: 35%;
    margin-top: 6%;
    margin-right: -8em;
  }
  .box {
    width: 40%;
    height: 40%;
  }
  .box > input{
    width: 40%;
    height: 40%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -15%;
  }
  .links-hider {
    position: fixed;
    width: 30%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}

@media(max-width: 395px) {
  nav {
    width: 110%;
  }
  .fas {
    font-size: 20px;
  }
  #logos{
    width: 25%;
    height: 35%;
    margin-top: 6%;
    margin-right: -8em;
  }
  .box {
    width: 40%;
    height: 40%;
  }
  .box > input{
    width: 40%;
    height: 40%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -15%;
  }
  .links-hider {
    position: fixed;
    width: 30%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}

@media(max-width: 376px) {
  nav {
    width: 120%;
  }
  .fas {
    font-size: 20px;
  }
  #logos{
    width: 25%;
    height: 35%;
    margin-top: 6%;
    margin-right: -8em;
  }
  .box {
    width: 40%;
    height: 40%;
  }
  .box > input{
    width: 40%;
    height: 40%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -30%;
  }
  .links-hider {
    position: fixed;
    width: 30%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}

@media(max-width: 285px) {
  nav {
    width: 110%;
  }
  .fas {
    font-size: 20px;
  }
  #logos{
    width: 25%;
    height: 35%;
    margin-top: 6%;
    margin-right: -10em;
  }
  .box {
    width: 40%;
    height: 40%;
  }
  .box > input{
    width: 40%;
    height: 40%;
  }
  .checkbtn{
    display:block;
    line-height: 70px;
    margin-left: -15%;
  }
  .links-hider {
    position: fixed;
    width: 30%;
    height: 100%;
    background-color: var(--color-1);
    top: 100px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
}
</style>
</head>
<body>
  <header id="headernav">
    <nav>
      <input type="checkbox" id="check" />
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label id="logo">
        <img id="logos" src="images/logo.png" />
      </label>
      <div class="links-container">
        <a class="navlink" href="post.php">Ask Question</a>
        <a class="navlink" href="logout.php">Logout</a>
        <p class="accstatus"><?php 
       if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        $query=mysqli_query($conn, "SELECT peeps.* FROM `peeps` WHERE peeps.username='$username'");
        while($row=mysqli_fetch_array($query)){
            echo $row['username'];
        }
       }
       ?></p>
      </div>
      <div class="links-hider">
        <p class="ask">Can't find your question in the search feature?</p>
        <a id="sidelink" class="ask" href="post.php">Ask Question</a>
        <p class="ask">Make a question for all to answer!</p>
      </div>
    </nav>
  </header>
  <section class="herosection">
    <div class="h1greet">
      <h1 class="h1main">From wondering to understanding</h1>
      <p class="pmain">Learnify is a co-assistive where a small community of students come together to put their heads together to crack the toughest academic questions.</p>
    </div>
    <div class="box">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input id="searchinput" type="text" name="" placeholder="What is your question?" />
    </div>
  </section>
  <section id="questions">
    <h2>Recent Questions</h2>
    <div class="flex-container">
      <div class="questionbreaker">
      <div class="question-about">
        <p class="about user">• Sample S. Name</p>
        <p class="about subject">• Earth & Life Science</h3>
        <p class="about date">• 04.13.2024</p>
        <p class="about level">• Grade 11</p>
      </div>
      <p class="question-paragraph">What is the definition of algorithm?</p>
      </div>
      <div>
        <a href="../Randell/repform/index.html" class="answer-paragraph">See Answer</a>
      </div>
    </div>
    <div class="flex-container">
      <div class="questionbreaker">
      <div class="question-about">
        <p class="about user">• Sample S. Name</p>
        <p class="about subject">• Practical Research</h3>
        <p class="about date">• 04.13.2024</p>
        <p class="about level">• Grade 12</p>
      </div>
      <p class="question-paragraph">What is qualitative research?</p>
      </div>
      <div>
        <a href="../Randell/repform/index.html" class="answer-paragraph">See Answer</a>
      </div>
    </div>
    <div class="flex-container">
      <div class="questionbreaker">
      <div class="question-about">
        <p class="about user">• Sample S. Name</p>
        <p class="about subject">• Programming</h3>
        <p class="about date">• 04.13.2024</p>
        <p class="about level">• Grade 11</p>
      </div>
      <p class="question-paragraph">What is the definition of algorithm?</p>
      </div>
      <div>
        <a href="../Randell/repform/index.html" class="answer-paragraph">See Answer</a>
      </div>
    </div>
  </section>
  <footer class="bottomfooter">
  <p id="group" class="propertytext">Property of MAWD 11 A<br>Group 2</p>
  <p id="subject" class="propertytext">Practical Research 1<br>April 2024</p>
</footer>
</body>
</html>