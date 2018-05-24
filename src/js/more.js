var dis = document.querySelectorAll(".top-item");
var but = document.querySelector(".top-seeMore");
var button = document.querySelectorAll(".top-seeMoreLink");
let i  = 10;
but.addEventListener("click", function(){
    if (i < 100) {
        let y = i - 10;
        while (y < i) {
            dis[y].classList.remove('hidden');
            y++;
        }
        i += 10;
    } else {
        button.innerHTML = "Plus rien a afficher";
    }

});