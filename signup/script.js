const signUpButton=document.getElementById('signUpBtn');
const signInButton=document.getElementById('LogInBtn');
const signInForm=document.getElementById('signhero');
const signUpForm=document.getElementById('loginhero');

signUpBtn.addEventListener('click',function(){
    loginhero.style.display="none";
    signhero.style.display="block";
})
LogInBtn.addEventListener('click', function(){
    loginhero.style.display="flex";
    signhero.style.display="none";
})