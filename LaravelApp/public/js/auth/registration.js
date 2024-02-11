
function sayHi() {
    alert('Hi');
}
function sayHello() {
    alert('Hello');
}



var email_okay = false;
var username_okay = false;
var password_okay = false;
var repeat_password_okay = false;



// ---------------------------------USERNAME VALIDATION--------------------------------------------

const input = document.getElementById('floatingInputGroup2');
let timeout = null;

function delayedFunction() {
    checkUsername();
    //check if empty
    //other username input validation
}
function resetTimeout() {
    clearTimeout(timeout);
    timeout = setTimeout(delayedFunction, 1000); 
}





function checkUsername() {
    let username = document.getElementById('floatingInputGroup2').value;

    fetch('/check-username', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
        },
        body: JSON.stringify({ username: username })
    })
        .then(
            response => {
                if (!response.ok) {
                    alert('problem connecting to server');
                }
                return response.json();
            }
        )
        .then(data => {
           //alert(typeof data);
           let newdata = JSON.stringify(data);
            if (newdata == "false") 
            {
                setUserNameInputValid();
                checkIfUserNameIsLessThanThree();
            } 
            else 
            {
                setUserNameInputInvalid();
            }
        })
        .catch(error => console.error('Error:', error));
}

function setUserNameInputInvalid()
{
    document.getElementById('floatingInputGroup2').classList.remove('is-valid');
    document.getElementById('floatingInputGroup2Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup2').classList.add('is-invalid');
    document.getElementById('floatingInputGroup2Head').classList.add('is-invalid');
    document.getElementById('floatingInputGroup2Label').innerHTML = 'username not available';
    username_okay = false;
}

function setUserNameInputValid()
{
    document.getElementById('floatingInputGroup2').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup2Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup2').classList.add('is-valid');
    document.getElementById('floatingInputGroup2Head').classList.add('is-valid');
    document.getElementById('floatingInputGroup2Label').innerHTML = 'username available';
    username_okay = true;
}

function setUserNameInputNeutral()
{
    document.getElementById('floatingInputGroup2').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup2Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup2').classList.remove('is-valid');
    document.getElementById('floatingInputGroup2Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup2Label').innerHTML = 'username available';
    username_okay = false;
}


function checkIfUserNameIsLessThanThree()
{
    
    let username_length = document.getElementById('floatingInputGroup2').value.length;

    if(username_length < 3 && username_length > 0)
    {
        //sayHi();
        setUserNameInputInvalid();
        document.getElementById('floatingInputGroup2Label').innerHTML = 'username should be at least 3 characters';

    }
    else if (username_length == 0)
    {
        setUserNameInputNeutral();
    }
    else
    {   
        // field 2 okay variable
        //sayHello();
    }
}

// ------------------------------------USERNAME VALIDATION--------------------------------------------








// ---------------------------------EMAIL VALIDATION--------------------------------------------

const input1 = document.getElementById('floatingInputGroup1');
let timeout1 = null;

function delayedFunction1() {
    checkEmail();
    //check if empty
    //other username input validation
}
function resetTimeout1() {
    clearTimeout(timeout1);
    timeout1 = setTimeout(delayedFunction1, 1000); 
}


function checkEmail() {
    let email = document.getElementById('floatingInputGroup1').value;

    fetch('/check-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
        },
        body: JSON.stringify({ email: email })
    })
        .then(
            response => {
                if (!response.ok) {
                    alert('problem connecting to server');
                }
                return response.json();
            }
        )
        .then(data => {
           //alert(typeof data);
           let newdata = JSON.stringify(data);
            if (newdata == "false") 
            {
                setEmailInputValid();
                //checkIfUserNameIsLessThanThree();
                isValidEmail(email);
            } 
            else 
            {
                setEmailInputInvalid();
            }
        })
        .catch(error => console.error('Error:', error));
}

function setEmailInputInvalid()
{
    document.getElementById('floatingInputGroup1').classList.remove('is-valid');
    document.getElementById('floatingInputGroup1Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup1').classList.add('is-invalid');
    document.getElementById('floatingInputGroup1Head').classList.add('is-invalid');
    document.getElementById('floatingInputGroup1Label').innerHTML = 'email not available';
    email_okay = false;
}

function setEmailInputValid()
{
    document.getElementById('floatingInputGroup1').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup1Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup1').classList.add('is-valid');
    document.getElementById('floatingInputGroup1Head').classList.add('is-valid');
    document.getElementById('floatingInputGroup1Label').innerHTML = 'email available';
    email_okay = true;
}

function setEmailInputNeutral()
{
    document.getElementById('floatingInputGroup1').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup1Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup1').classList.remove('is-valid');
    document.getElementById('floatingInputGroup1Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup1Label').innerHTML = 'email available';
    email_okay = false;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(emailRegex.test(email))
    {
        
    }
    else
    {
        setEmailInputInvalid();
        document.getElementById('floatingInputGroup1Label').innerHTML = 'email format invalid';
    }
    if(email.length == 0)
    {
        setEmailInputNeutral();
    } 
  }

// ------------------------------------EMAIL VALIDATION--------------------------------------------








// ---------------------------------PASSWORD VALIDATION--------------------------------------------


let timeout2 = null;

function delayedFunction2() {
    let input2 = document.getElementById('floatingInputGroup3').value;
    isValidPassword(input2);
    //check if empty
    //other username input validation
}
function resetTimeout2() {
    clearTimeout(timeout2);
    timeout2 = setTimeout(delayedFunction2, 1000); 
}

function isValidPassword(password) {

    // Check if the password is at least 8 characters long
    document.getElementById('floatingInputGroup3Label').innerHTML = '';
    let warn_str = '';
    let passed = true;

    if (password.length < 8) 
    {
        setPasswordInputInvalid();
        warn_str = warn_str + 'must contain at least 8 characters' + '<br>';
        passed = false;
    }
  
    // Check if the password contains at least one uppercase letter
    if (!/[A-Z]/.test(password)) 
    {
        setPasswordInputInvalid();
        warn_str = warn_str + 'at least one uppercase' + '<br>';
        passed = false;
    }
  
    // Check if the password contains at least one lowercase letter
    if (!/[a-z]/.test(password)) 
    {
        setPasswordInputInvalid();
        warn_str = warn_str + 'at least one lowercase' + '<br>';
        passed = false;
    }
  
    // Check if the password contains at least one digit
    if (!/\d/.test(password))
    {
        setPasswordInputInvalid();
        warn_str = warn_str + 'at least one digit' + '<br>';
        passed = false;
    }

    if(passed)
    {
        setPasswordInputValid();
    }
    document.getElementById('floatingInputGroup3Label').innerHTML = warn_str;
    passed = true;
    
    if(password.length == 0)
    {
        setPasswordInputNeutral();
    }
    
    let repeat_pass = document.getElementById('floatingInputGroup4').value;
    if(repeat_pass.length != 0)
    {
        isMatch();
    }
    // Check if the password contains at least one special character
    // if (!/[!@#$%^&*()_+[\]{};':"\\|,.<>/?~-]/.test(password)) {
    //   return false;
    // }
  
    // If all criteria are met, the password is valid
    
}

function setPasswordInputInvalid()
{
    document.getElementById('floatingInputGroup3').classList.remove('is-valid');
    document.getElementById('floatingInputGroup3Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup3').classList.add('is-invalid');
    document.getElementById('floatingInputGroup3Head').classList.add('is-invalid');
    document.getElementById('floatingInputGroup3Label').innerHTML = '';
    password_okay = false;
}

function setPasswordInputValid()
{
    document.getElementById('floatingInputGroup3').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup3Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup3').classList.add('is-valid');
    document.getElementById('floatingInputGroup3Head').classList.add('is-valid');
    document.getElementById('floatingInputGroup3Label').innerHTML = 'good';
    password_okay = true;
}

function setPasswordInputNeutral()
{
    document.getElementById('floatingInputGroup3').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup3Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup3').classList.remove('is-valid');
    document.getElementById('floatingInputGroup3Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup3Label').innerHTML = 'good';
    password_okay = false;
}




// ---------------------------------PASSWORD VALIDATION--------------------------------------------







//----------------------------------REPEAT PASSWORD VALIDATION--------------------------------------

let timeout3 = null;

function delayedFunction3() {
    isMatch();
    //check if empty
    //other username input validation
}
function resetTimeout3() {
    clearTimeout(timeout3);
    timeout3 = setTimeout(delayedFunction3, 1000); 
}

function setRepeatPasswordInputInvalid()
{
    document.getElementById('floatingInputGroup4').classList.remove('is-valid');
    document.getElementById('floatingInputGroup4Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup4').classList.add('is-invalid');
    document.getElementById('floatingInputGroup4Head').classList.add('is-invalid');
    document.getElementById('floatingInputGroup4Label').innerHTML = 'Password does not match';
    repeat_password_okay = false;
}

function setRepeatPasswordInputValid()
{
    document.getElementById('floatingInputGroup4').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup4Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup4').classList.add('is-valid');
    document.getElementById('floatingInputGroup4Head').classList.add('is-valid');
    document.getElementById('floatingInputGroup4Label').innerHTML = 'good';
    repeat_password_okay = true;
}

function setRepeatPasswordInputNeutral()
{
    document.getElementById('floatingInputGroup4').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup4Head').classList.remove('is-invalid');
    document.getElementById('floatingInputGroup4').classList.remove('is-valid');
    document.getElementById('floatingInputGroup4Head').classList.remove('is-valid');
    document.getElementById('floatingInputGroup4Label').innerHTML = 'good';
    repeat_password_okay = false;
}


function isMatch()
{
    let password = document.getElementById('floatingInputGroup3').value;
    let repeat_password = document.getElementById('floatingInputGroup4').value;
    if(password == repeat_password)
    {
        setRepeatPasswordInputValid();
    }
    else
    {
        setRepeatPasswordInputInvalid();
    }
    if(repeat_password.length == 0)
    {
        setRepeatPasswordInputNeutral();
    }
}

//------------------------------------REPEAT PASSWORD VALIDATION--------------------------------------
// add funtion setInputToNeutral if input is value is 0
    // trigger function onblur

function submitForm() {

    if(username_okay == true && email_okay == true && password_okay == true && repeat_password_okay == true)
    {
        //sayHi();
        var form = document.getElementById("registrationForm");
        form.submit();
    }
    else
    {
        alert('error');
    }
    
    
}

function revealPassword()
{
    let input_ = document.getElementById('floatingInputGroup3');
    let icon = document.getElementById('eye_icon');
    if(input_.type == "text")
    {
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
        input_.type = "password";
    }
    else
    {
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
        input_.type = "text";
    }
    //document.getElementById('floatingInputGroup3').type = 'text';
}

function revealPassword2()
{
    let input_ = document.getElementById('floatingInputGroup4');
    let icon = document.getElementById('eye_icon2');
    if(input_.type == "text")
    {
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
        input_.type = "password";
    }
    else
    {
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
        input_.type = "text";
    }
    //document.getElementById('floatingInputGroup3').type = 'text';
}


