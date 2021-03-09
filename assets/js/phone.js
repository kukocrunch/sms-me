const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {

 utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const info = document.querySelector(".alert-info");
const error = document.querySelector(".alert-error");
const send = document.getElementById("send");

 function process(event) {
     event.preventDefault();

     const phoneNumber = phoneInput.getNumber();

     info.style.display = "none";
     error.style.display = "none";

     if (phoneInput.isValidNumber()) {
         info.style.display = "";
         info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
         send.disabled = false;
     } else {
         error.style.display = "";
         error.innerHTML = `Invalid phone number.`;
         send.disabled = true;
     }

 }

 function check(event){
     event.preventDefault();
     
    let url = 'send_sms.php';

    const phone = document.getElementById("phone").value
    const msg = document.getElementById("message")


    var formData = new FormData();
    formData.append('phone', phone);
    formData.append('message', msg.value);

    fetch(url, {
        method: 'POST',
        body: formData
    }).then( function(response) {
        return response.text();
    }).then( text => {
        response = JSON.parse(text);

        if(response.message.status === 400){
            error.style.display = "";
            error.innerHTML = `Error <strong>${response.message.status}</strong> ${response.message.message}`
        }
        else{
            info.style.display = "";
            info.innerHTML = "";
            info.innerHTML = `${response.message}`;
        }

    }).catch(function (error){
        console.error(error);
    });
    
 }