
// document.addEventListener("DOMContentLoaded", function () {
// const form = document.getElementById('form');

// console.log("DOM loaded");

//     if(!form){
//         console.log("Form not found...")
//     }
//     else{
//     form.addEventListener('submit',(event)=> {
//         event.preventDefault();
//         validate();
//         })
//     }
// });

$(document).ready(function () {
    console.log("jQuery loaded!");

    $("#form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        console.log("Form submission intercepted.");

        validate(); // Perform validation

        if ($(".input-container.error").length === 0) {
            console.log("Validation passed. Sending data via AJAX...");

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                type: "POST",
                url: "signup.php",
                data: formData,
                datatype:"json",
                success: function (response) {
                    console.log("Server Response:", response);
                    if (response.success) {
                        alert("Registration successful!");
                        window.location.href = "login.php"; // Redirect on success
                    } else if(response.error) {
                        alert("Error: " + response);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.error("Server Response:", xhr.responseText);
                    alert("An error occurred during form submission.");
                }
            });
        } else {
            console.log("Validation failed. Fix errors before submission.");
        }
    });
});

    




//final data validation



function togglePassword(fieldId, icon) {
    const passwordField = document.getElementById(fieldId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

isEmail=(emailVal)=>{
    //more validating email
    var atsymbol = emailVal.indexOf("@");
    if(atsymbol<1){
        return false;
    }
    var dotposition = emailVal.lastIndexOf(".")
    if(dotposition<atsymbol+2){
return false;
    }
    if(dotposition === emailVal.length -1){
        return false;
    }
    return true;
}
const validate= () =>{
    const username = document.getElementById('username');
const email = document.getElementById('email');
const phone = document.getElementById('phoneNo');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
    //validate function definition
    const usernameVal = username.value.trim();
    const emailVal = email.value.trim();
    const phoneVal = phone.value.trim();
    const passwordVal = password.value.trim();
    const cpasswordVal = cpassword.value.trim();
    // const passwordRegex = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{5,}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{5,}$/;

    
    //validate username
    if(usernameVal ===""){
        setErrorMsg(username,"Username cannot be blank");
    }
    else if(usernameVal.length<=2){
        setErrorMsg(username,"Username of minimum 3 characters");

    }
    else{
        setSuccessMsg(username);
    }
    //validate email
    if(emailVal ===""){
        setErrorMsg(email,"Email cannot be blank");

    }
    else if(!isEmail(emailVal)){
        setErrorMsg(email,"Not a valid Email");

    }
    else{
        setSuccessMsg(email);
    }

    //validate phone
    if(phoneVal ===""){
        setErrorMsg(phone,"Phone cannot be blank");

    }
    else if(phoneVal.length!=10){
        setErrorMsg(phone,"Not a valid Phone Number");

    }
    else{
        setSuccessMsg(phone);
    }
    //validate password
    if(passwordVal ===""){
        setErrorMsg(password,"Password cannot be blank");

    }
    else if(!passwordRegex.test(passwordVal)){
        setErrorMsg(password,"Create a stronger password with special character,lowercase letter,uppercase letter");

    }
    else{
        setSuccessMsg(password);
    }
//validate cpassword
if(cpasswordVal ===""){
    setErrorMsg(cpassword,"Confirm Password cannot be blank");

}
else if(passwordVal!= cpasswordVal){
    setErrorMsg(cpassword,"Passwords do not match");

}
else{
    setSuccessMsg(cpassword);
}
// console.log("Before calling SuccessMsg()");
// SuccessMsg();
}
function setErrorMsg(input,errormsgs){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = "input-container error";
    small.innerText = errormsgs;
    const eyeIcon = formControl.querySelector(".toggle-password");
    if (eyeIcon) {
        eyeIcon.style.right = "30px"; 
    }
    const checkIcon = formControl.querySelector(".fa-circle-check");
    const errorIcon = formControl.querySelector(".fa-circle-exclamation");

    if (errorIcon) errorIcon.style.visibility = "visible";  
    if (checkIcon) checkIcon.style.visibility = "hidden";  
}
function setSuccessMsg(input){
    const formControl = input.parentElement;
    
    formControl.className = "input-container success";
    const eyeIcon = formControl.querySelector(".toggle-password");
    if (eyeIcon) {
        eyeIcon.style.right = "30px"; 
    }
    const checkIcon = formControl.querySelector(".fa-circle-check");
    const errorIcon = formControl.querySelector(".fa-circle-exclamation");

    if (checkIcon) checkIcon.style.visibility = "visible";
    if (errorIcon) errorIcon.style.visibility = "hidden";
}
// const SuccessMsg =()=>{
//     let formCon = document.getElementsByClassName('input-container');
// console.log("here2")
// if (formCon.length === 0) {
//     console.log("No input fields found!");
//     return;
// }
// console.log("Success rate:", sRate, "Total inputs:", formCon.length);

//     var sRate=0;
//     for(var i=0;i<formCon.length;i++){
//         if (formCon[i].classList.contains("success"))  {
//          sRate ++;
//          console.log(sRate)
//     }
// }
// if (sRate === formCon.length) {
//     alert("Register succesful");

//      document.getElementById('form').submit(); 
//     console.log("Form submission..yay")

// }
// };
