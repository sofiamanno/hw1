function menu_close(event){
    menu_icon.removeEventListener('click', menu_close);
    menu_mobile.classList.remove("open");
    menu_icon.addEventListener('click', menu_open);
}
function menu_open(event){
    menu_icon.removeEventListener('click', menu_open);
    menu_mobile.classList.toggle("open");
    menu_icon.addEventListener('click', menu_close);
}
const menu_mobile=document.querySelector("#menu_mobile");
const menu_icon=document.querySelector("#menu_icon");
menu_icon.addEventListener('click', menu_open);