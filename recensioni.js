

const form=document.querySelector("#reviewForm");
form.addEventListener('submit', add_commento);

function add_commento(event){
  event.preventDefault();
  const form_data={method: "post", body: new FormData(event.currentTarget)};
  fetch("add_commento.php", form_data).then(addReview);
  event.currentTarget.reset();
}

addReview();

function addReview() {
  fetch('commento.php').then(onCommento).then(onJCommento);
}

function onCommento(response) {
  return response.json();
}

function onJCommento(json) {
  const currentDiv = document.querySelector('.sezioni');
  currentDiv.innerHTML="";
  for(let i=0; i<json.length; i++) {
    const sezione = document.createElement('section');
    currentDiv.appendChild(sezione);
    }
    for(let i=0; i<json.length; i++){
     
      const newDiv = document.createElement("div");
      const newTest = document.querySelectorAll('section');
      
      newTest[i].appendChild(newDiv);
  
      }
      for(let i=0; i<json.length; i++) {
        const utente=document.createElement("h4");
        const nome=document.createTextNode( json[i].utente + " scrive:");
        utente.appendChild(nome);
        const newId = document.createElement("h3");
        const ContentId = document.createTextNode(json[i].id);
        newId.appendChild(ContentId);

        const newH3 = document.createElement("h3");
        const newContent = document.createTextNode(json[i].titolo);
        newH3.appendChild(newContent);
        const votazione = document.createElement("h4");
        const voto = document.createTextNode("Voto: " +json[i].voto);
        votazione.appendChild(voto);
        const newP = document.createElement("p");
        const newDesc = document.createTextNode(json[i].recensione);
        newP.appendChild(newDesc);
        newId.classList.add('hidden');
       

        const newPosition = document.querySelectorAll('section div');
        newPosition[i].appendChild(utente);
        newPosition[i].appendChild(newH3);
        newPosition[i].appendChild(votazione);
        newPosition[i].appendChild(newP);
        newPosition[i].appendChild(newId);
       
      }
    }
    
    function checkReview(event){
        const title = document.querySelector("#title");
        const review = document.querySelector("#review");
        const reviewForm = document.querySelector("#reviewForm");
        
      if(title.value.length > 150 || review.value.length > 2000){
            if(title.classList.contains("inputError")){
                event.preventDefault();
                return;
            }
            event.preventDefault();
            const errorMessage = document.createElement("span");
            errorMessage.classList.add("errormessage");
            errorMessage.textContent = 'Titolo o descrizione troppo lunghe!';
            reviewForm.appendChild(errorMessage);
            title.classList.add("inputError");
            review.classList.add("inputError");
        }
    }
    document.querySelector(".containerForm").addEventListener('submit',checkReview);
   