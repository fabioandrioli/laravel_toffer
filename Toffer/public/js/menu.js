var mobile__button = document.querySelector(".mobile__button");
var menu__container = document.querySelector(".menu__container");

console.log(mobile__button);
console.log(menu__container);

mobile__button.addEventListener("click", function(){
    menu__container.classList.toggle("mobile-active");
})