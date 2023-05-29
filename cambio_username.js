function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
 }
 

//verifica username
function json_checkUsername(json){
    check=false;
    if(json.exists==true){
       document.querySelector('#errore_username').textContent="Username già in uso";
    }
    else{
       document.querySelector('#errore_username').textContent="";
       check=true;
    }
 }

 function checkUsername(event){
    const input = document.querySelector('#username');
    fetch("username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(json_checkUsername);
 }

 
 function onJSON(json){
    console.log(json[0]);
    if(json[0]){
        alert('user modificato');
        window.location = 'logout.php';
    }
    else{
        alert('impossibile modifcare usarname');
    }
 }
 //______________________________________________

 function controllo(event){

    event.PreventDefault();

    const u=document.querySelector('#username').value;
    const p=document.querySelector('#password').value;
    
    if(u==="" || typeof u === 'undefined'){
        document.querySelector('#errore_username').textContent="Inserire il nuovo nome";
    }
    else{
        if(typeof p === 'undefined' || p===""  ){
            document.querySelector('#errore_password').textContent="Inserire la password";
        }
        else{
            const form_i = document.querySelector('form');
            const form_data={method: "post", body: new FormData(form_i) }
        
            fetch("cambio_username_f.php", form_data).then(fetchResponse).then(onJSON);

            
        }
    }
 }

document.querySelector('#username').addEventListener('blur', checkUsername);
const form = document.querySelector('form');
form.addEventListener('submit', controllo); 