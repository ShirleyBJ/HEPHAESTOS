console.log("Start of script");
const textDisplay = document.getElementById('text');
//console.log(textDisplay);
const phrases = ['HEPHAESTOS'];
//console.log(phrases);
let i=0;
let j=0;
let currentPhrase = [];
let isDeleting = false;
let isEnd = false;

function loop (){
    isEnd=false;
    textDisplay.innerHTML = currentPhrase.join('');
    //console.log("Function loop");
    //First element of the array
    if (i<phrases.length){
        //console.log(phrases[i]);
        if (!isDeleting && j<phrases[i].length){
            //console.log(phrases[i][j]);
            currentPhrase.push(phrases[i][j]);
            j++
            textDisplay.innerHTML = currentPhrase.join('');
        }

        if(isDeleting && j<=phrases[i].length){
            currentPhrase.pop(phrases[i][j]);
            j--;
            textDisplay.innerHTML = currentPhrase.join('');
        }

        if ( j==phrases[i].length){
            idEnd=true;
            isDeleting= true;
        } 
//If J=0, move on into the next element of the array
        if(isDeleting && j == 0){
            currentPhrase = [];
//isDeleting is false cause we don't delete but adding letters again
            isDeleting = false;
            i++;
//Looping again at end of the array
            if( i == phrases.length){
                i = 0;
            }
        }
    }
    setTimeout(loop,500);
}
loop();

console.log("Fonctionnalités 2");

document.addEventListener("DOMContentLoaded",function(){
    const progressbarInner = document.querySelector(".progress-bar-inner");

    window.addEventListener('scroll', function(){
        let h = document.documentElement;
        //To know how far the scroll going
        let st = h.scrollTop || document.body.scrollTop;
        //sh : Equal to the page height(height of all page)
        let sh = h.scrollHeight || document.body.scrollHeight;
        //Client Height = height of the window /sh = height of the all page

        //Calculating what max scroll page is 
        let percent = st / (sh - h.clientHeight) * 100;
        //console.log(percent);
        let roundedPercent = Math.round(percent);
        progressbarInner.style.width = percent + "%";
        progressbarInner.innerText = roundedPercent + "%";
    })
})