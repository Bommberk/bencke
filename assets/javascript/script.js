window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY > 0);
});

function menubar(){
    document.getElementById("xmark").classList.toggle("menubar");
    document.getElementById("bars").classList.toggle("menubar");
}