const form = document.querySelector('#form');   
const email = document.querySelector('#email');
const password = document.querySelector('#password');

form.addEventListener('submit',function(e){
    e.preventDefault();
    checkInput();
});

email.addEventListener('keyup',function(){
    const emailValue = email.value.trim();
    if(emailValue === ''){
        setErrorFor(email,'Email cannot be blank');
    }
    else
    {
        setSuccessFor(email)
    }
});
password.addEventListener('keyup',function(){
    const passwordValue = password.value;
    if(passwordValue===''){
        setErrorFor(passwordValue,'Password cannot be blank')
    }
    else{

    }
    setSuccessFor(password);
});

function checkInput(){
    const emailValue = email.value.trim();
    const passwordValue = password.value;
}
if(emailValue === ''){
    setErrorFor(email,'Email cannot be blank');
}
    else if(!isEmail(emailValue)){
        setErrorFor(email,'Email is not valid');
    }
    else{
        setSuccessFor(email);
    }
if(passwordValue === ''){
    setErrorFor(password,'Password cannot be blank');
}
else if(passwordValue.length < 8 ){
    setErrorFor(password,'Password Should be atleast 8 character');
}else{
    setSuccessFor(password);
}
function setSuccessFor(input){
    const formGroup = input.parentElement;
    formGroup.classList.add('success');
    formGroup.classList.remove('error');
}
function setErrorFor(input,message){
    const formGroup = input.parentElement;
    formGroup.classList.remove('success');
    formGroup.classList.add('error');
    const small = formGroup.querySelector('small');
    small.innerHTML = message;
}

function isEmail(email){
    // regular expression
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}