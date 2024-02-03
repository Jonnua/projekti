// Kjo është funksioni JavaScript për validimin e formës së regjistrimit.

function validateFormRegister() {
    var name = document.forms["myForm"]["name"].value;
    var surname = document.forms["myForm"]["surname"].value;
    var email = document.forms["myForm"]["email"].value;
    var password = document.forms["myForm"]["password"].value;
    var isValid = true;

    var nameRegex = /^[a-zA-Z\s]*$/;
    if (name == "") {
        document.getElementById('errorname').innerHTML = "Ju lutem jepni një emër të vlefshëm!";
        isValid = false;
    } else if (!nameRegex.test(name)) {
        document.getElementById('errorname').innerHTML = "Ju lutem jepni një emër të vlefshëm!";
        isValid = false;
    } else {
        document.getElementById('errorname').innerHTML = "";
    }

    var surnameRegex = /^[a-zA-Z\s]*$/;
    if (surname == "") {
        document.getElementById('errorsurname').innerHTML = "Ju lutem jepni një mbiemër të vlefshëm!";
        isValid = false;
    } else if (!surnameRegex.test(surname)) {
        document.getElementById('errorsurname').innerHTML = "Ju lutem jepni një mbiemër të vlefshëm!";
        isValid = false;
    } else {
        document.getElementById('errorsurname').innerHTML = "";
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "") {
        document.getElementById('erroremail').innerHTML = "Ju lutem jepni një adresë email-i të vlefshme!";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById('erroremail').innerHTML = "Ju lutem jepni një adresë email-i të vlefshme!";
        isValid = false;
    } else {
        document.getElementById('erroremail').innerHTML = "";
    }

    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (password == "") {
        document.getElementById('errorpassword').innerHTML = "Ju lutem jepni një fjalëkalim të vlefshëm";
        isValid = false;
    } else if (!passwordRegex.test(password)) {
        document.getElementById('errorpassword').innerHTML = "Ju lutem jepni një fjalëkalim të vlefshëm (të paktën 8 karaktere, një shkronjë të madhe, një shkronjë të vogël dhe një numër).";
        isValid = false;
    } else {
        document.getElementById('errorpassword').innerHTML = "";
    }

    return isValid;
}
