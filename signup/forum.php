<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imitation</title>
   <link rel="stylesheet" href="../posting/style.css"/>
   <link rel="stylesheet" href="../repform/responsive.css"/>
   <link rel="stylesheet" href="../repform/layout.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
.Answer-Box-Container{
    height: 40em;
    max-width: 45em;
    margin: 2em auto;
}
.web-title{
    font-variant: small-caps;
}
.span-title{
    color: #0b0345;
}

.answer-box{
    box-shadow: 0 0 4px #0b0345;
    min-height: 100%;
    min-width: 100%;
    border-radius: 2em;
    padding: 1.2em;
}
.answer-box hr{
    height: 1px;
    background-color: #0b0345;
    width: 100% + 1.2em;
    margin: 0;    
}
.answer-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: .8em;
}

.user-profile-container{
    display: flex;
    align-items: center;
}
.user-profile-container .user-details {
    flex: 1; /*Get all the available space and pushes the learnify*/
    margin: .6em 1em; 
}

/* User details */
.user-name {
    font-weight: 600;
    font-size: 16px;
}
.profile-image{
    width: 45px;
    height: 45px; 
    margin-right: 1em; 
    border: #0b0345 transparent 1px;
    background-color: #d6d3d3;  
    border-radius: 25px;
    padding: 3px;
}

.explanation-container h3{
    margin: 2em 0  0 2em;
}
/* answer container */
.explanation-container p {
    margin: 3em 2em;
}

@media screen and (max-width: 430px){
    .star-reviews i{
        font-size: 10px;
    }
}
@media screen and (max-width:675px){
    .card-container,
    .Answer-Box-Container{
        height: auto;
    }
}

/*review container */
.reviews{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* HEART BUTTON */
.like-button .heart-icon{

    height: 100px;
    width: 100px;
    background: url("../IMG/ICONS/heart.png");
    background-position: left;
    cursor: pointer;
    position: absolute;
}

.like-button .heart-icon.liked{
    animation: like-animation 0.7s steps(28) forwards;
}

.like-buton, .star-container{
    flex: 1;
    display: flex;
    align-items: center;
    margin: 0 .8em;
}
@keyframes like-animation{
    to{
        background-position: right;

    }
}

.like-button .heart-bg{
    background-color: rgba(225, 192, 200, 0);
    border-radius: 50%;
    height: 70px;
    width: 70px;
    display: flex;
    align-items: center;
}

.like-button{
    display: flex;
    align-items: center;
}
.like-button .like-amount{
    font-size: 20px;
    color: #888;
    font-weight: 900;
    margin-left: 4px;
}
/* star container */
.star-container{
    width: 100px;
    height: 100px;
    font-size:10px;
}

/* checked stars */
.checked{
    color: orange;
}

/* see more button */
.see-more-comments button{
    margin-top: 1.2em;
    padding: .9em 1.7em;
    border-radius: 2em;
    background-color: #0b0345;
    font-variant: small-caps;
    color: white;
    font-size: .9em;
    outline: none;
    font-weight: bold;
    border: none;
    box-shadow: 0 0 4px #0b0345;
    transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
}
.see-more-comments button:hover{
    background-color: #fff; 
    color: #0b0345; 
    box-shadow: 0 0 8px #0b0345;
}

.see-more-comments button:active{
    background-color: #d6d3d3;
    color: #0b0345;
    box-shadow: 0 0 4px #0b0345; 
    transform: scale(0.95);
}

/* comment section */

.comment-container{
    margin-top: 2em;
}

#testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
}

.testimonial-heading{
    letter-spacing: 1px;
    margin: 30px 0;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.testimonial-heading h2{
    font-size: 2.2rem;
    font-weight: 500;
    background-color: #0b0345;
    color: white;
    padding: 10px 20px;
}

.testimonial-box-container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    min-width: 100%;
}

.testimonials-box{
    max-width: 700px;
    background-color: #ffff;
    box-shadow: 0 0 4px #0b0345;
    border-radius: 2em;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}
.testimonial-image{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}

.testimonial-image img{

    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    padding: 6px;
}
.profile{
    display: flex;
    align-items: center;
}
.name-user{
    display: flex;
    flex-direction: column;
}
.name-user strong{
    color: black;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}

.name-user span{
    color: black;
    font-size: 0.8rem;
}
.star-reviews{
    color: orange;
}

.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.client-comments p{
    font-size: 0.9rem;
    color: black;
}
</style>
</head>
<body>
    <!-- Navigation-bar -->
    <nav>
        <label id="logo">
          <img id="logos" src="images/logo.png">
        </label>
        <div class="box">
          <i class="fa fa-search" aria-hidden="true"></i>
          <input type="text" name="" placeholder="Search here for answers to any question...">
        </div>
        <div class="links-container">
          <a class="home-link" href="index.html">Home</a> <!-- link back to homepage -->
          <a href="about.html">Ask Question</a> 
          <a href="products.html">Join For Free</a>
        </div>
      </nav>
    <div class="card-container">
        <div class="container-1">
            <div class="profile-header">
                <div class="details">
                    <img class="profile-picture" src="images/bird.png"/>
                    <div class="more-details">

                        <p class="user-name">Sample S. Name</p>
                        <span class="date">04.13.2024 · <a class="subject-link" href="#">Math</a>· Senior High School</span>
                    </div>
                    </div>
                    <div class="indicator">
                    <button class="right-button">
                        answered
                    </button>
                </div>
            </div>

            <div class="questions">
                <h2 class="question">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit maxime tempore! A reprehenderit omnis quaerat doloribus? Enim, aperiam voluptatibus?
                </h2>
                <button class="view-ans">
                    SEE ANSWER
                </button>
            </div>
        </div>
    </div>
    <!-- Seee answer layout  -->
    <div class="Answer-Box-Container">
        <div class="answer-box">
            <div class="answer-header">
                <h3>Answer</h3>
                <p class="reviews">15 people found it helpful</p>
            </div>
           <hr/>
            <div class="user-profile-container">
                <img class="profile-image" src="images/bird.png"/>
                <div class="user-details">  
                    <p class="user-name">Sample S. Name</p>
                        <span class="date">04.13.2024 · <a class="subject-link" href="#">Math</a>· Senior High School</span>
                </div>
                <div class="web-title">
                    <h2>Lear<span class="span-title">nify</span></h2>

                </div>
                
            </div>
            <div class="explanation-container">
                <h3 class="explain">Explanation:</h3>
                <p class="explanation-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore architecto facilis ut fugiat? Consequuntur nihil, dicta blanditiis recusandae quod nisi mollitia veniam, soluta, odit odio aperiam ipsum laudantium quasi voluptas nostrum doloribus fuga rerum dolores. Facere inventore velit, cupiditate eaque harum sunt doloremque ab, voluptates quibusdam rerum doloribus eligendi nam?</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea, quos veniam exercitationem nostrum ex quaerat tempora? Similique saepe eligendi deserunt.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem dicta sequi error commodi soluta. Ex!</p>      
            </div>

            <div class="reviews">

                <!-- hearts reaction -->
                <div class="like-button">
                    <div class="heart-bg">
                        <div class="heart-icon"></div>
                    </div>
                <div class="like-amount">8</div>
            </div>
            
            <!-- star reviews -->
            <div class="star-container">
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x checked"></span>
                <span class="fa fa-star fa-2x"></span>
            </div>
            <div class="see-more-comments">
                <button class="see-more">See comments</button>
            </div>

        </div>

        <div class="comment-section">
            <div class="comment-container">
                <hr/>
                <section id="testimonials">
                    <div class="testionial-heading">
                        <h1>Clients say</h1>
                    </div>
                    

                    <div class="testimonials-box-container">
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>

                        <!-- second  comment  -->
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>
                        <!-- third comment -->
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>
                        <!-- fourth comment -->
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>
                        <!-- fifth comment  -->
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>
                        <!-- sixth comment -->
                        <div class="testimonials-box">
                            <div class="box-top">
                                <div class="profile">
                                    <div class="testimonial-image">
                                        <img src="images/bird.png"/>
                                    </div>
                                    <div class="name-user">
                                        <strong>Sample S. Name</strong>
                                        <span>@gmail.com</span>
                                    </div>
                                </div>
                                <div class="star-reviews">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="client-comments">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, officiis illum? Voluptatibus necessitatibus magnam officia, perspiciatis sint reiciendis tempora magni!</p>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
        </div>
    </div>
    <script>
    const heartIcon = document.querySelector(".like-button .heart-icon");
        const likesAmountLabel = document.querySelector(".like-button .like-amount");
        
        let likesAmount = 7;
        heartIcon.addEventListener("click", () =>{
        
            heartIcon.classList.toggle("liked");
            if(heartIcon.classList.contains("liked")){
                likesAmount++;
        
            }else{
                likesAmount--;  
            }
        
            likesAmountLabel.innerHTML = likesAmount;
        });
    </script>
</body>
</html>