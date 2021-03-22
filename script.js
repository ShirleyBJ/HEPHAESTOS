console.log("Début du script");
var textDisplay = document.getElementById("text");
console.log(textDisplay);
var phrases = ["HEPHAESTOS","Plus qu'un garage,","une famille."];
console.log(phrases);
var i = 0 ;
var j = 0 ;
let currentPhrase = [];
let isDeleting = false;
window.addEventListener('onload',decoup);

function decoup(){
    textDisplay.innerHTML = currentPhrase.join('');
    //outer loop(tab)
    if( i <= phrases.length ){
    currentPhrase.push(phrases[i][j]);
    //inner loop (tab el)
    } if( !isDeleting && j <phrases[i].length){
        j++;
        //console.log('add a letter' + j);
        textDisplay.innerHTML = currentPhrase.join('');
    }

    if(isDeleting && j<= phrases[i].length){
        currentPhrase.pop(phrases[i][j]);
        j--;
        //console.log('rmv a letter' + j);
        //console.log(currentPhrase)

        textDisplay.innerHTML = currentPhrase.join('');
    }

    if(j == phrases[i].length){
        isDeleting = true;
    }

    if(isDeleting && j == 0){
        currentPhrase = [];
        isDeleting = false;
        i++;
        //Loop to repeat over and over the typing
        
            if(i == phrases.length){
                i = 0;
            }
    } 

    setTimeout(decoup,100);
}
decoup();