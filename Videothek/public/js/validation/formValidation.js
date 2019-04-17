console.log("hoi ärde");

var inputForm = document.querySelector('#formular');

inputForm.addEventListener("submit", function(e) {
    console.log('In Event');
    var errors = [];
    var emailRegex = RegExp("/^[^\s@]+@[^\s@]+\.[^\s@]+$/");
    var phoneRegex = RegExp('[a-z]');
    
    if (document.querySelector('#name').value.trim() == '') {
        errors.push('Das Namen-Feld ist ein Pflichtfeld und darf nicht leer sein!');
    }
    if (document.querySelector('#firstname').value.trim() == '') {
        errors.push('Das Vornamen-Feld ist ein Pflichtfeld und darf nicht leer sein!');
    }
    if(document.querySelector('#email').value.trim() == '') {
        errors.push('Das Email-Feld ist ein Pflichtfeld und darf nicht leer sein!');
    } else if(!emailRegex.test(document.querySelector('#email').value.toLowerCase())) {
        errors.push('Es muss eine gültige Email eingegeben werden!');
    }
    if(phoneRegex.test(document.querySelector('#phone').value)) {
        errors.push('Telefonnummer darf keine Alphabetischen Zeichen enthalten!');
    }
    
    console.log(errors);
    var errorList = document.querySelector('#errorList');
    if(errors.length != 0) {
        errorList.className = "alert alert-danger padding-left2";
    } else {
        errorList.className = "";
    }
    errorList.innerText = "";
    
    errors.forEach(function (error) {
        var li = document.createElement('li');
        li.innerText = error;
        li.className = "padding-left2";
        errorList.appendChild(li);
    });

    if(errors.length != 0) {
        e.preventDefault();
    }
});