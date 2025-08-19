const form = document.getElementById('registerForm');

document.addEventListener('DOMContentLoaded', () => {
// Toggle Password Show
const passwordInput = document.getElementById('pwd');
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', () => {
    // Toggle datatype
    const datatype = passwordInput.getAttribute('type') === 'password' ? 'text': "password";
    passwordInput.setAttribute('type', datatype);

    // toggle icon
    togglePassword.classList.toggle("fa-eye");
    togglePassword.classList.toggle("fa-eye-slash");
});    
// Confirm Password show
const confirmPasswordInput = document.getElementById('cpwd');
const confirmPasswordToggle = document.getElementById('toggleConfirmPassword');

confirmPasswordToggle.addEventListener('click', () => {
    // toggle datatype
const cpDatatype = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
confirmPasswordInput.setAttribute('type', cpDatatype);

// toggle icon
confirmPasswordToggle.classList.toggle("fa-eye");
confirmPasswordToggle.classList.toggle('fa-eye-slash');
})
});


form.addEventListener('submit', (e) => {
       // Get form values
    let username = document.getElementById('username').value.trim();
    // let penName = document.getElementById('penName').value.trim();
    let email = document.getElementById('email').value.trim();
    let pwd = document.getElementById('pwd').value.trim();
    let cpwd = document.getElementById('cpwd').value.trim();

    // Reset Error Messages
    document.getElementById('usernameError').textContent = '';
    // document.getElementById('penNameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('pwdError').textContent = '';
    document.getElementById('cpwdError').textContent = '';

    let hasError = false;

    // Validating feilds
    //Username
    if(username == ''){
        document.getElementById('usernameError').textContent = 'Please enter a username';
        hasError = true;
    }
    // PenName
    // if(penName == ''){
    //     document.getElementById('penNameError').textContent = "Please enter a nickname";
    // }
    // Email
    if(email == ''){
        document.getElementById('emailError').textContent = 'Please enter your email';
        hasError = true;
    }else{
        const emailPattern = /[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z{2,4}$]/;
        if(!emailPattern.test(email)){
            document.getElementById('emailError').textContent = 'Invalid email format';
            hasError = true;
        }
    }
    // Pwd
    if(pwd == ''){
        document.getElementById('pwdError').textContent = 'Password is required';
        hasError = true;
    }else if(pwd.length < 8){
        document.getElementById('pwdError').textContent = 'Password should be at least 8 characters';
        hasError = true;
    }else{
        const pwdPattern = /^^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_.]).{8,}$/;
        if(!pwdPattern.test(pwd)){
            document.getElementById('pwdError').textContent = 'Password is weak';
            hasError = true;
        }
    }
    // Cpwd
    if(cpwd == ''){
        document.getElementById('cpwdError').textContent = 'Please confirm your email';
        hasError = true;
    }else if(pwd !== '' && cpwd !== '' && pwd !== cpwd){
        document.getElementById('cpwdError').textContent = 'Passwords do not match';
        hasError = true;
    }

    if(!hasError){
        e.preventDefault;
        const firstError = document.querySelector('.error:not(:empty)');
        if(firstError) {
            firstError.scrollIntoView({behavior: 'smooth', block: 'center'})
        }

    }
    
    
    

});