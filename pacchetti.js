fetch('pacchettiapi.php').then(onResponse).then(onJson);


function onJson(json) {
   
    const cont=document.querySelector('#container');
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

function onResponse(response) {
    console.log(response);
    return response.json();
}


function Cart(event) {
    const pacchetti = event.currentTarget.parentNode.querySelector('.hidden').textContent;
    console.log(pacchetti);
    fetch('addcart.php?q='+pacchetti).then(alert("ARTICOLO AGGIUNTO AL CARRELLO!"));
    agg_carrello();
    
}

  
function searchResponse(response)
{
    console.log(response);
    return response.json();
}
  