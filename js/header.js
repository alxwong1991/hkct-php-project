const bar = document.querySelector(".bars");
const navMob = document.querySelector(".nav-mobile");
bar.addEventListener("click", () => {
    navMob.classList.toggle("show");
})