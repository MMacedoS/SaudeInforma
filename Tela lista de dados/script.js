let nav = document.getElementById("nav");
let barrinhas = document.getElementById("barrinhas");
let bar = document.getElementById("sidebar");
let open = false
function test(){
    if (open == false) {
        nav.style.display = "flex";
        bar.style.display = "block"
        open = true;
    }else {
        nav.style.display = "none";
        barrinhas.style.display = "inline";
        bar.style.display = "none";
        open = false;
    }
}