console.log("Début du script");
//Récupération élement
var validateForm = document.querySelector('#register');
// console.log(btnValidate);

//Ajout écouteurs
validateForm.addEventListener('submit', function(evt){
    let pass1 = document.getElementById('pswd').value;
    console.log(pass1);
    let pass2 = document.getElementById('pswdValidate').value;
    console.log(pass2);

    if(pass1 !== pass2){
        evt.preventDefault();
        alert("Attention ! Les mot de passe ne correspondent pas.");
    }
});