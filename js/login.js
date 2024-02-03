// Kjo është funksioni që validon formën e hyrjes në panelin e kontrollit të përdoruesve.
function validateLoginForm() {
    // Merr vlerën e email-it dhe fjalëkalimit nga formulari
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;
    var isValid = true;

    // Kontrollon nëse email-i është bosh
    if (email == "") {
        document.getElementById('erroremail').innerHTML = "Ju lutemi vendosni adresën tuaj të email-it";
        isValid = false;
    } 
    // Kontrollon nëse email-i ka karakterin "@"
    else if (email.indexOf("@", 0) < 0) {
        document.getElementById('erroremail').innerHTML = "Ju lutemi vendosni një adresë të vlefshme email-i";
        isValid = false;
    } else {
        document.getElementById('erroremail').innerHTML = "";
    }

    // Kontrollon nëse fjalëkalimi është bosh
    if (password == "") {
        document.getElementById('errorpassword').innerHTML = "Ju lutemi vendosni fjalëkalimin tuaj";
        isValid = false;
    } else {
        document.getElementById('errorpassword').innerHTML = "";
    }

    // Kthe true nëse të gjitha validimet janë kaluar, në të kundërt kthe false
    return isValid;
}
