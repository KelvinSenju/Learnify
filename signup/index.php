<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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

html{
  font-size: 12pt;
  font-family: "Noto Sans";
  font-weight: 500;
}
.box{
	width: 950px;
	height: 60px;
	background-color: white;
	border-radius: 30px;
	display: flex;
	align-items: center;
	padding: 8px;
  margin-left: -250px;
}

/* Signin */
#signhero {
  display: none;
  margin: 0 40em;
}
.box > i {
	font-size: 20px;
	color: #777;
}
.box > input{
	flex: 1;
	height: 40px;
	border: none;
	outline: none;
	font-size: 18px;
	padding-left: 10px;
}
nav a:hover{
  background-color: var(--accent-color);
}
nav .home-link{
  margin-right: auto;
}
nav svg{
  fill: var(--text-color);
}
.hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin-top: 40px;
}
#welcome {
  font-size: 35px;
}
#reghead {
  margin-top: 35px;
  font-size: 2rem;
  font-weight: 700;
}
.heroparagraph {
  font-size: 15px;
}
.heads {
  font-weight: 500;
  font-size: 20px;
}
#gen {
  font-size: 20px;
  font-weight: 600;
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
  background-color: #ECECEC;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form #createButton {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1.5rem;
  font-weight: 600;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: var(--color-1);
}
.form #createButton:hover {
  background: var(--color-1);
}
#consent {
  font-size: 12px;
  margin-top: 5px;
}
.propertytext {
  color: var(--text-color);
  display: flex;
}
#group {
  text-align: left;
}
#subject {
  text-align: left;
}
.signbottomfooter {
  margin-top: 10em;
  padding: 30px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  gap: 55%;
  background-color: var(--color-1);
  bottom: 0;
  width: 100%;
  position: absolute;
}

@media(max-width: 1280px){
  .links-hider {
    width: 15%;
  }
  .bottomfooter {
    gap: 30%;
  }
}

@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
}

@media(max-width: 700px){
  body {
    width: 80%;
    height: 80%;
    margin: auto;
  }
}

@media(max-width: 500px){
  #birthdateid {
    margin-bottom: 20px;
  }
}

@media(max-width: 300px){
  #create {
    font-size: 16px;
  }
}

/* Login */
:root{
  --color-1: #35408E;
  --text-color: #f0f0f0;
}
#loginhero {
  display: flex;
}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
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
  justify-items: center;
  align-items: center;
}
#logos {
  width: 50%;
  height: 70%;
  margin-top: 7%;
  margin-left: 20%;
}
.box{
	width: 50%;
	height: 60px;
	background-color: white;
	border-radius: 30px;
	display: flex;
	align-items: center;
	padding: 8px;
  margin-left: -250px;
}
.box > i {
	font-size: 20px;
	color: #777;
}
.box > input{
	flex: 1;
	height: 40px;
	border: none;
	outline: none;
	font-size: 18px;
	padding-left: 10px;
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
.checkbtn {
  display: none;
  font-size: 30px;
  color:white;
  float: left;
  margin-left: 40px;
  line-height: 100px;
  cursor: pointer;
}
#check {
  display:none;
}
.hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin-top: 40px;
}
.herogreet {
  font-size: 50px;
}
.heroparagraph {
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
  height: 50%;
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
  background: var(--color-1);
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
  margin: 20px 15px;
  margin-top: 5px;
}
.linkButton {
    color:var(--color-1);
    border:none;
    background-color:transparent;
    font-size:1rem;
    font-weight:bold;
}
.linkButton:hover{
  text-decoration:underline;
  color:black;
  transition: .3s;
}
.loginbottomfooter {
  margin-left: auto;
  margin-right: auto;
  margin-top: 50px;
  padding: 30px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  gap: 55%;
  background-color: var(--color-1);
  bottom: 0;
  width: 100%;
  position: absolute;
}
.propertytext {
  color: var(--text-color);
  display: flex;
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
  #signhero {
    display: none;
    margin: 0 20em;
  }
}

@media(max-width: 1100px){
  #logos{
    width: 45%;
    height: 60%;
    margin-top: 6%;
  }
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 60px;
  }
  .heroparagraph {
    font-size: 25px;
  }
  .wrapper{
    width: 700px;
  }
  .wrapper h1{
    font-size: 56px;
  }
  .input-box input{
    font-size: 26px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 25.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 26.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 40px;
  }
  .heroparagraph {
    font-size: 20px;
  }
  .wrapper{
    width: 600px;
  }
  .wrapper h1{
    font-size: 36px;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 20.5px;
  }
  .wrapper .btn{
    font-size: 20px;
  }
  .wrapper .register-link{
    font-size: 16.5px;
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

@media(min-width: 875px) {
  .links-hider {
    display: none;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 30px;
  }
  .heroparagraph {
    font-size: 20px;
  }
  .wrapper{
    width: 700px;
  }
  .wrapper h1{
    font-size: 56px;
  }
  .input-box input{
    font-size: 23px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 20.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 20.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 20px;
  }
  .heroparagraph {
    font-size: 20px;
  }
  .wrapper{
    width: 700px;
  }
  .wrapper h1{
    font-size: 56px;
  }
  .input-box input{
    font-size: 23px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 20.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 20.5px;
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
  .listbelow {
    margin-top: 20%;
  }
  #check:checked ~ .links-hider{
    left: 0;
  }
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 40px;
  }
  .heroparagraph {
    font-size: 16px;
  }
  .wrapper{
    width: 500px;
  }
  .wrapper h1{
    font-size: 36px;
  }
  .input-box {
    width: 50%;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 20.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 20.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
    width: 90%;
    margin-left: .5em;
  }
  .herogreet {
    font-size: 30px;
  }
  .heroparagraph {
    font-size: 14px;
  }
  .wrapper{
    width: 100%;
  }
  .wrapper h1{
    font-size: 36px;
  }
  .input-box {
    width: 50%;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 13.5px;
  }
  .wrapper .btn{
    font-size: 16px;
  }
  .wrapper .register-link{
    font-size: 16.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
    margin-left: 1em;
  }
  .herogreet {
    font-size: 40px;
  }
  .heroparagraph {
    font-size: 16px;
  }
  .wrapper{
    width: 400px;
  }
  .wrapper h1{
    font-size: 36px;
  }
  .input-box {
    width: 50%;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 13.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 16.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
  }
  .herogreet {
    font-size: 40px;
  }
  .heroparagraph {
    font-size: 16px;
  }
  .wrapper{
    width: 350px;
  }
  .wrapper h1{
    font-size: 36px;
  }
  .input-box {
    width: 50%;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 13.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 15.5px;
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
  .hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 40px;
    margin-left: 1em;
  }
  .herogreet {
    font-size: 40px;
  }
  .heroparagraph {
    font-size: 16px;
  }
  .wrapper{
    width: 250px;
  }
  .wrapper h1{
    font-size: 25px;
  }
  .input-box {
    width: 70%;
  }
  .input-box input{
    font-size: 16px;
  }
  .input-box input::placeholder{
    color: black;
  }
  .wrapper .remember-forgot{
    font-size: 10.5px;
  }
  .wrapper .btn{
    font-size: 26px;
  }
  .wrapper .register-link{
    font-size: 16.5px;
  }
}
  </style>
</head>
  <body>
    <nav>
      <label id="logo">
      <img id="logos" src="images/logo.png">
    </nav>
    <!-- Login -->
    <section class="hero" id="loginhero">
      <h1 id="herogreet">Welcome Back</h1>
      <p id="heroparagraph">Get answers to your wonder and finish your work faster</p>
      <div class="wrapper">
        <form method="post" id="loginForm" action="register.php">
          <h1>Login</h1>
          <div class="input-box">
            <input name="email" type="email" placeholder="Email" required>
            <i class='bx bxs-user'></i>
          </div>
          <div class="input-box">
            <input name="password" id="password" type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
            <a href="#">Forgot your password?</a>
          </div>
          <button name="signIn" type="submit" class="btn" value="Sign In">LOGIN</button>
          <div class="register-link">
            <p>Don't have an account?</p>
            <button class="linkButton" id="signUpBtn">Sign Up</button>
          </div>
        </form>
      </div>
      <footer class="loginbottomfooter">
        <p id="group" class="propertytext">Property of MAWD 11 A<br>Group 2</p>
        <p id="subject" class="propertytext">Practical Research 1<br>April 2024</p>
      </footer>
    </section>
    <!-- Sign Up -->
    <section class="hero" id="signhero">
      <h1 id="welcome">Get verified answers for better grades</h1>
      <p id="heroparagraph">Create an account to get verified answers from a small community of learners</p>
      <header id="reghead">Sign Up</header>
      <form id="signForm" method="post" action="register.php" class="form">
        <div class="input-box">
          <label class="heads">Email Address</label>
          <input id="email" name="email" type="email" placeholder="Enter your email" required />
        </div>
        <div class="column">
          <div class="input-box">
            <label class="heads">Username</label>
            <input id="username" name="username" type="text" placeholder="Create a username" required />
          </div>
          <div class="input-box">
            <label class="heads">Password</label>
            <input id="password" name="password" type="password" placeholder="Create a password" required />
          </div>
        </div>
        <button name="signUp" class="btn" id="createButton" value="Sign Up">CREATE ACCOUNT</button>
        <div class="register-link">
          <p>Already have an account?</p>
          <button class="linkButton" id="LogInBtn">Log In</button>
        </div>
      </form>
      <p id="consent">By creating an account, you consent to the research of Learnify.</p>
    </section>
    <footer class="signbottomfooter">
      <p id="group" class="propertytext">Property of MAWD 11 A<br>Group 2</p>
      <p id="subject" class="propertytext">Practical Research 1<br>April 2024</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
