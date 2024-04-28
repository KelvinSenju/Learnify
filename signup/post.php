<?php
    session_start();
    require ('connect.php');
    if(@$_SESSION["username"]) {
    ?>

<?php 
    include('finalpost.php');
    if(isset($_POST['submitquestion'])) {
        $questiontext = $_POST['questiontext'];
        $subject= $_POST['subject'];
        $gradelevel = $_POST['gradelevel'];
        $query = mysqli_query($con, "Insert into userquestion (questiontext, subject, gradelevel) VALUE ('$questiontext', '$subject', '$gradelevel')");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../posting/post.css"/>

    <title>Posting Page</title>
    <style>
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
:root{
  --color-1: #35408E;
  --text-color: #f0f0f0;
}
@font-face {
    font-family: "Proxima-nova";
    src: url(../font/Mark\ Simonson\ \ Proxima\ Nova\ Regular.otf);
}
body{
    font-family: "Proxima-nova";
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
.container{
    min-height: 100vh;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
}

.post-lt{
    display: flex;
    flex-direction: column;
    align-items: start;
    gap: 2em;
    padding: 2em;
    border-radius: 1.5em;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
}

.post-title h2{
    font-weight: 600;
    font-size: 2.2em;
    color: #35408E;
    margin-bottom:.5em ;
}

.post-title h3{
    font-size: 1.5em;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.post-title hr{
    max-width: 36em;
    border: none;
    border-radius: 2em;
    height: .3em;
    background-color: #0b0345;

}

.message_input{
    min-width: 30em;
    min-height: 9em;
    outline:none;
    padding: 0 0 0 1em;
    border-radius: 2em;
    padding-top: 1em;
    resize: none;
    border: gray solid 2px;
    transition: border-color .1s ease-in-out;
}

.message_input:focus{
    border-color: #35408E;
}
/* Dropdown menu design */

.btn{
    background-color: #0b0345 !important;
    transition: 0.2s ease-in-out;
    color: white;
    font-weight: 850;
}
.btn:hover{
    box-shadow: 0 0 4px #0b0345;
    color: white;
}

/* Menu */
.dropdown-menu{
    overflow-y  : scroll;
}

/* Buttons */
.ask_button{
    display: flex;
    align-items: center;
    padding: .7em 3em;
    border-radius: 2em;
    gap: .3em;
    cursor: pointer;
    background-color: #0b0345;
    color: white;
    font-weight: 600;
    font-size: 1em;
    outline: none;
    border: none;
    transition: scale .2s ease-in;
}

.ask_button:focus{
    border: solid 1px #0b0345;
    transform: scale(1);
    box-shadow: 0 0 4px #0b0345;

}

.submit-image {
    filter: brightness(0) invert(1);    
    height: 1.2em;
}

.right_image_container{
    margin: 2em;
}
.right_image_container img{   
    -webkit-mask-image: url(data:image/svg+xml;base64,PCEtLT94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/LS0+CiAgICAgICAgICAgICAgPHN2ZyBpZD0ic3ctanMtYmxvYi1zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSI+CiAgICAgICAgICAgICAgICAgICAgPGRlZnM+IAogICAgICAgICAgICAgICAgICAgICAgICA8bGluZWFyR3JhZGllbnQgaWQ9InN3LWdyYWRpZW50IiB4MT0iMCIgeDI9IjEiIHkxPSIxIiB5Mj0iMCI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3RvcCBpZD0ic3RvcDEiIHN0b3AtY29sb3I9InJnYmEoMjQ4LCAxMTcsIDU1LCAxKSIgb2Zmc2V0PSIwJSI+PC9zdG9wPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPHN0b3AgaWQ9InN0b3AyIiBzdG9wLWNvbG9yPSJyZ2JhKDI1MSwgMTY4LCAzMSwgMSkiIG9mZnNldD0iMTAwJSI+PC9zdG9wPgogICAgICAgICAgICAgICAgICAgICAgICA8L2xpbmVhckdyYWRpZW50PgogICAgICAgICAgICAgICAgICAgIDwvZGVmcz4KICAgICAgICAgICAgICAgIDxwYXRoIGZpbGw9InVybCgjc3ctZ3JhZGllbnQpIiBkPSJNMTcuOCwtMjkuNkMyMy4zLC0yNy42LDI4LjIsLTIzLjQsMzIuNywtMThDMzcuMiwtMTIuNyw0MS40LC02LjQsNDMsMC45QzQ0LjYsOC4yLDQzLjcsMTYuNCwzOC4zLDIwLjRDMzMsMjQuMywyMy4zLDIzLjksMTYuMiwyNi45QzksMjkuOCw0LjUsMzYuMiwtMS41LDM4LjdDLTcuNSw0MS4zLC0xNC45LDQwLC0xOS43LDM1LjdDLTI0LjQsMzEuMywtMjYuNCwyMy45LC0yNi45LDE3LjRDLTI3LjQsMTAuOSwtMjYuNCw1LjUsLTI4LjgsLTEuNEMtMzEuMywtOC4zLC0zNy4zLC0xNi42LC0zNS4xLC0yMC4xQy0zMi45LC0yMy42LC0yMi41LC0yMi4zLC0xNS4zLC0yMy4zQy04LjEsLTI0LjQsLTQsLTI3LjcsMS4xLC0yOS41QzYuMSwtMzEuNCwxMi4zLC0zMS42LDE3LjgsLTI5LjZaIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg1MCA1MCkiIHN0cm9rZS13aWR0aD0iMCIgc3R5bGU9InRyYW5zaXRpb246IGFsbCAwLjNzIGVhc2UgMHM7Ij48L3BhdGg+CiAgICAgICAgICAgICAgPC9zdmc+);
}
.bottomfooter {
  margin-left: auto;
  margin-right: auto;
  margin-top: -5%;
  padding: 30px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  gap: 55%;
  background-color: var(--color-1);
  bottom: 0;
  width: 100%;
  color: var(--text-color)
}

@media screen and (max-width: 739px) {
    .container{
        min-width: 100%;
    }
    .message_input{
        width: 100px;
    }
}



@media screen and (max-width: 890px){
    .container {
        margin-top: 2em;
        display: block;
        width: 80%; /* Adjust the width as needed for smaller screens */
    }

    .post-lt {
        padding: 1em;
    }
    .right_image_container{
        text-align: center;
    }
}

@media screen and (max-width: 1065px){
    .container {
        width: 100%; 
    }

    .post-lt {
        padding: 1em;
        margin-left: 15%;
    }


    .right_image_container{
        text-align: center;
    }
    .message_input{
        min-width: 20em;
    }
    
}

@media screen and (max-width: 1240px){
    .message_input {
        min-width: 30em; 
        min-height: 7em;
    }
}
    </style>
  </head>
  <body>
      <!-- Main Content Posting page -->
    <main>
        <div class="container">
            <form name="questionpost" action="" method="POST" class="post-lt">
                <div class="post-title">
                    <h2>Ask some questions about your assignment</h2>
                    <hr/>   
                    <h3>Please enter your question below</h3>
                </div>
                <textarea name="questiontext" placeholder="Type your question here..." class="message_input" required></textarea>
                <div class=dropdown_btn>
                    <select class="btn" name="subject">
                        <option value=""> --Select--</option>
                        <option value="Filipino"> Filipino</option>
                        <option value="Mathematics"> Mathematics</option>
                        <option value="English"> English</option>
                        <option value="Science"> Science</option>
                        <option value="History"> History</option>
                        <option value="Philosophy"> Philosophy</option>
                        <option value="UCSP"> UCSP</option>
                        <option value="M.I.L"> M.I.L</option>
                        <option value="I.T"> I.T</option>
                        <option value="Arts"> Arts</option>
                        <option value="P.E & Health"> P.E & Health</option>
                        <option value="Music"> Music</option>
                    </select>
                    <select class="btn" name="gradelevel">
                        <option value="">--Select--</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                    </select>
                </div>
                <button name="submitquestion" class="ask_button">Submit question<img class="submit-image" src="images/next.png"></button>
            </form>
            <div class="right_image_container">
                <img class="right_img" src="images/rightImage.webp"/>
            </div>
        </div>
      </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  <footer class="bottomfooter">
    <p id="group" class="propertytext">Property of MAWD 11 A<br>Group 2</p>
    <p id="subject" class="propertytext">Practical Research 1<br>April 2024</p>
  </footer>
</html>
<?php } ?>
