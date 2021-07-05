//Récuperer elements
var btnDelete = document.getElementById('delete-employe');
console.log(btnDelete);
var blockHidden = document.getElementById('block--hidden');
console.log(blockHidden);
var submitBtn = document.getElementById('validate-btn')
console.log(submitBtn);

//Ecouteurs sur les évenements
btnDelete.addEventListener('click',hideBlock);

function hideBlock(){
    // console.log('Click is working');
    if (blockHidden.style.display === "none") {
        blockHidden.style.display = "block";
    } else {
        blockHidden.style.display = "none";
    }
}