//AGGIORNAMENTO CARRELLO
function agg_carrello(){
    fetch("agg_carrello.php").then(onResponse).then(onJSON_carrello)

}
const menu=document.querySelector("#tasti");

function onJSON_carrello(json){
    menu.removeChild(document.querySelector("#carrello"));
    const a=document.createElement("a");
    a.href="carrello.php";
    a.id="carrello";
    if(json.total)
        a.textContent=json.total+".00€";
    else
        a.textContent="0.00€";
    const img=document.createElement("img");
    img.src="images/carti.png";
    a.appendChild(img);
    //menu.appendChild(a); vecchio
    // Get the last child element of 'menu'
    const lastChild = menu.lastElementChild;
    // Insert 'a' before the last child element
    menu.insertBefore(a, lastChild);
}
//___________________