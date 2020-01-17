/* traitement des favoris */

let favButtons = document.getElementsByClassName('btn-favorite');
//console.log(favButtons);

function addFavorite(){
    //je souhaite trouver l'id du post liké
    // je cible l'élèment parent qui contient un id unique par post
    let parent = this.parentElement;
    //console.log(parent);

    let xhr = new XMLHttpRequest();

    xhr.open('POST', "data.php", true);

    // Quand on transmet en post, il faut préciser le content type pour s'assurer d'un traitement correct
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    
    // Nous transmettons un nouvel argument afin de transmettre notre demande ajax au serveur dans les meilleures conditions possibles
    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");

    xhr.onreadystatechange = () =>{
        if(xhr.readyState==4 && xhr.status==200){
            let result = xhr.responseText;
            //console.log("résult : "+result);

            // si l'opération est un succès (true), alors on injecte une nouvelle class
            if(result == "true"){
                parent.classList.add("favorite");
            }
        }
    }
    
    xhr.send("id="+ parent.id);

}

// je créée uen boucle pour cibler tous mes éléments
for(let i=0; i<favButtons.length; i++){
    favButtons.item(i).addEventListener("click", addFavorite);
}



/* traitement de la deconnexion */


function deconnectSession(){
    let xhr = new XMLHttpRequest();
    let url = "data.php?a=deconnect";
    //console.log(xhr);

    xhr.open("GET", url, true);
    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");

    xhr.onreadystatechange = () =>{
        if(xhr.readyState==4 && xhr.status==200){
            let result = xhr.responseText;
            //console.log(result);
            if(result == 'true'){
                let objBtnAsFav = document.getElementsByClassName('favorite');
                let btnAsFav = Object.values(objBtnAsFav);
                //console.log(btnAsFav);
                btnAsFav.forEach((item, index) => {
                    item.classList.remove('favorite');
                })
            }

        }
    }

    xhr.send();
    
}

let btnDeconnect = document.getElementById('btn-deconnect');
btnDeconnect.addEventListener("click", deconnectSession);
//console.log(btnDeconnect);




/* traitement des dislike */

function removeFavorite()
{
    // je souhaite retrouver l'id du post
    let parent = this.parentElement.parentElement;
    //console.log(parent);
    let xhr = new XMLHttpRequest();

    xhr.open('POST', "data.php", true);

    // Quand on transmet en post, il faut préciser le content type pour s'assurer d'un traitement correct
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    
    // Nous transmettons un nouvel argument afin de transmettre notre demande ajax au serveur dans les meilleures conditions possibles
    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");

    xhr.onreadystatechange = () =>{
        if(xhr.readyState==4 && xhr.status==200){
            let result = xhr.responseText;
            console.log("résult : "+result);

            // si l'opération est un succès (true), alors on injecte une nouvelle class
            if(result == "true"){
                parent.classList.remove("favorite");
            }
        }
    }
    xhr.send("id="+parent.id + "&a=remove");
    
}

let unfavButtons = document.getElementsByClassName('marker');
//console.log(unfavButtons);
for(i=0; i<unfavButtons.length; i++){
    unfavButtons.item(i).addEventListener("click", removeFavorite);
}