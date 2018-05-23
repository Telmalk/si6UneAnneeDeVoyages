var menuImg = document.querySelector('.navbar-toggle-burger');
var modal = document.querySelector('.modal');
var modalOverlay = document.querySelector('.modal-overlay');
menuImg.addEventListener('click', function() {
    console.log("toto");
    modal.classList.add('activeModal');
    modalOverlay.style.display = "block";
});
modalOverlay.addEventListener('click', function() {
    modal.classList.remove('activeModal');
    modalOverlay.style.display = "none";
});
