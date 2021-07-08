//Récuperer elements
var btnDelete = document.getElementById('delete-employe');
var modifyBtn = document.getElementById('modify-employe');
// console.log(btnDelete);
var deleteBlockHidden = document.getElementById('block_delete--hidden');
var modifyBlockHidden = document.getElementById('block_modify--hidden');
// console.log(deleteBlockHidden);
var submitBtn = document.getElementById('validate-btn')
// console.log(submitBtn);
var hasBeenClick = "";

//Ecouteurs sur les évenements
btnDelete.addEventListener('click',deleteBeenCalled);
modifyBtn.addEventListener('click',modifyBeenCalled);

function modifyBeenCalled(){
    if(modifyBlockHidden.style.display === "none") {
        modifyBlockHidden.style.display = "block";
    } else {
        modifyBlockHidden.style.display = "none";
    }
}

function deleteBeenCalled(){
    if(deleteBlockHidden.style.display === "none") {
        deleteBlockHidden.style.display = "block";
    } else {
        deleteBlockHidden.style.display = "none";
    }
}



