function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
 }
 
 //verifica username
 function json_checkUser(json){
    if(json.exists==true){
       document.querySelector('#errore_username').textContent="Username già in uso";
    }
    else{
       document.querySelector('#errore_username').textContent="";
       check[0]=true;
    }
 }
 function checkUsername(event){
    check[0]=false;
    const input = document.querySelector('#username');
    fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(json_checkUser);
    console.log("check_username.php?q="+encodeURIComponent(input.value));
 }
 //______________________________________________
 
 
 
 //verifica email
 function json_checkEmail(json) {
    if(json.exists==true)
       document.querySelector('#errore_mail').textContent="Mail già in uso";
    else{
       document.querySelector('#errore_mail').textContent="";
       check[1]=true;
    }
 }
 
 function checkMail(event) {
    check[1]=false;
    const emailInput = document.querySelector('#mail');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('#errore_mail').textContent = "Email non valida";
    }
    else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(json_checkEmail);
        console.log("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase()));
        document.querySelector('#errore_mail').textContent = "";
    }
 }
 //______________________________________________
 
 
 //verifica password
 function checkPassword(event){
    check[2]=false;
    const password = document.querySelector('#password').value;
    console.log(password);
    const c_speciali = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    if (!c_speciali.test(password)){
       document.querySelector('#errore_password').textContent="La password deve contenere almeno un carattere speciale";
    }
    else{
       if (password.length <= 6) {
          document.querySelector('#errore_password').textContent="La password è troppo corta";
    } else {
          document.querySelector('#errore_password').textContent="";
          check[2]=true;
    }
    }
 }
 
 function checkPasswordV(event){
    check[3]=false;
    const password = document.querySelector('#password').value;
    const password_v = document.querySelector('#password_v').value;
    if(password===password_v){
       document.querySelector('#errore_password_v').textContent="";
       check[3]=true;
    }
    else
       document.querySelector('#errore_password_v').textContent="Le password non corrispondono";
 }
 //______________________________________________
 
 
 
 function controllo(event){
    event.preventDefault();
    if(check[0] && check[1] && check[2] && check[3]){
       const form_data={method: "post", body: new FormData(event.currentTarget) }
       fetch("reg_db.php", form_data).then(window.location.replace("index.php"));
    }
 }
 
 
 
 let check=new Array(false, false, false, false);
 //----MAIN
 document.querySelector('#username').addEventListener('blur', checkUsername);
 document.querySelector('#mail').addEventListener('blur', checkMail);
 document.querySelector('#password').addEventListener('blur', checkPassword);
 document.querySelector('#password_v').addEventListener('blur', checkPasswordV);
 
 const form = document.querySelector('form');
 form.addEventListener('submit', controllo);
 