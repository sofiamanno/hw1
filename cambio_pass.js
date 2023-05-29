function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
 }
 function checkPassword(event){
    check[0]=false;
    const password = document.querySelector('#password').value;
    const c_speciali = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    if (!c_speciali.test(password)){
       document.querySelector('#errore_password').textContent="La password deve contenere almeno un carattere speciale";
    }
    else{
       if (password.length <= 6) {
          document.querySelector('#errore_password').textContent="La password è troppo corta";
    } else {
          document.querySelector('#errore_password').textContent="";
          check[0]=true;
    }
    }
 }
 
 function checkPassword_c(event){
    check[1]=false;
    const password = document.querySelector('#password').value;
    const password_c = document.querySelector('#password_c').value;
    if(password===password_c){
       document.querySelector('#errore_password_c').textContent="";
       check[1]=true;
    }
    else
       document.querySelector('#errore_password_c').textContent="Le password non corrispondono";
 }

 function onJSON(json){
    if(json[0]){
        alert('password modificata');
        window.location = 'logout.php';
    }
    else{
        alert('impossibile modificare password');
    }
 }

 
 function controllo(event){

    event.preventDefault();

    if(!check[0] || !check[1]){
        alert("DEVI RISPETTARE LE RICHIESTE")  
        return;
    }
        const o=document.querySelector('#vecchia_password').value;
        const p=document.querySelector('#password').value;
        const p_c=document.querySelector('#password_c').value;
        
        if(o==="" || typeof o === 'undefined'){
            document.querySelector('#errore_vecchia_password').textContent="Inserire la vecchia password";
        }
        else{
            if(typeof p === 'undefined' || p===""  ){
                document.querySelector('#errore_password').textContent="Inserire la nuova password";
            }
            else{
                if(typeof p_c === 'undefined' || p_c===""  ){
                    document.querySelector('#errore_password_c').textContent="Confermare la nuova password";
                }
                else{
                    const form_data={method: "post", body: new FormData(event.currentTarget) }
                
                    fetch("cambio_pass_f.php", form_data).then(fetchResponse).then(onJSON);
                    
                }
            }
        }
}

 
 let check=new Array(false, false)
 document.querySelector('#password').addEventListener('blur', checkPassword);
 document.querySelector('#password_c').addEventListener('blur', checkPassword_c);
 const form = document.querySelector('form');
 form.addEventListener('submit', controllo); 