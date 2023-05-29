function onResponse(response){
    return response.json();
}


function onJSON(json){
    sezione.innerHTML="";
    for(citta of json){

        const div=document.createElement("div");
        const titolo = document.createElement("p");
        const img = document.createElement("img");
        titolo.textContent=citta.titolo;
        img.src=citta.img;
        div.id=citta.id;

        div.appendChild(img);
        div.appendChild(titolo);

        div.addEventListener('click', on_clicK_citta);

        sezione.appendChild(div);
    }

} 

function Cart(event) {
    const pacchetti = event.currentTarget.parentNode.querySelector('.hidden').textContent;
    console.log(pacchetti);
    fetch('addcart.php?q='+pacchetti).then(alert("ARTICOLO AGGIUNTO AL CARRELLO!"));
    agg_carrello();
}

function onIndietro(event){
    cont.innerHTML="";
    fetch("citta.php").then(onResponse).then(onJSON);
    

}
function onJson_api(json){
    const sez=document.querySelector('#citta');
    console.log(json);
    const h6=document.createElement("h6");
    h6.textContent=json.location.name+" "+json.current.temp_c+"° "+json.current.wind_kph+" km/h "+json.current.wind_dir;
    console.log(h6);
    sez.appendChild(h6);
}

function onJson_pacchetti(json){
    
    sezione.innerHTML="";

    const indietro= document.createElement('button');
    indietro.textContent= 'Torna Indietro';
    indietro.addEventListener('click', onIndietro);
    sezione.appendChild(indietro);
    console.log(json[0].titolo);
    const citta=json[0].titolo;
    const url1="meteoapi.php?q="+citta;
    console.log(url1);
    fetch(url1).then(onResponse).then(onJson_api);
    
    cont.innerHTML="";

    for(j of json) {
        const sez=document.createElement('section');
        const div=document.createElement('div');
        
        const utility=document.createElement('div');
        utility.classList.add('utility');
        
        const pacchettiid=document.createElement('div');
        
        
        
        const day=document.createElement('h5');
        const city=document.createElement('h5');
        
        const button = document.createElement('button');
        const info = document.createElement('div');
        const price = document.createElement('h5');
        info.classList.add('info');
        
        button.innerHTML='SELEZIONA';
        
        city.textContent=""+j.titolo;
        day.textContent = ' ORA: ' + j.ora_partenza + ' DATA:' + j.giorno;
        price.textContent = j.prezzo + '€';
        pacchettiid.textContent= j.id;
        const descrizione=document.createElement('div');
        const destinazione=document.createElement('h3');
        destinazione.textContent=j.destinazione_tour;
        const iter=document.createElement('p');

        iter.textContent=j.descrizione;
        descrizione.appendChild(destinazione);
        descrizione.appendChild(iter);
        
        const foto_city=document.createElement("img");
        foto_city.src=j.img;

 
        info.appendChild(city);
        info.appendChild(day);
        info.appendChild(price);
        utility.appendChild(foto_city);
        utility.appendChild(info);
        div.appendChild(descrizione);
        div.appendChild(utility);
        div.appendChild(button);    
        div.appendChild(pacchettiid); 
        descrizione.classList.add('info');
        sez.appendChild(div);
        cont.appendChild(sez);
        
        
        pacchettiid.classList.add('hidden');

        button.addEventListener('click',Cart);
    }


}


function on_clicK_citta(event){
    const id_citta=event.currentTarget.id;
    const url="pacchettiapi.php?q="+id_citta;
    console.log(url);
    fetch(url).then(onResponse).then(onJson_pacchetti).catch(error => {
                            // Gestisci l'errore e visualizza l'alert
            
                            alert('DEVI ESSERE LOGGATO PER VISUALIZZARE I PACCHETTI');
                        });
}
function on_cerca(event){
    event.preventDefault();
    const form_data={method: "post", body: new FormData(event.currentTarget)};
    fetch("pacchettiapi2.php", form_data).then(onResponse).then(onJson_pacchetti).catch(error => {
        // Gestisci l'errore e visualizza l'alert

        alert('DEVI ESSERE LOGGATO PER VISUALIZZARE I PACCHETTI');
    });
    event.currentTarget.reset();
    form.addEventListener('submit', on_cerca);
}

const cont=document.querySelector('#container');
const sezione=document.querySelector("#citta");

fetch("citta.php").then(onResponse).then(onJSON);

const form=document.querySelector("#cerca");
form.addEventListener('submit', on_cerca);
