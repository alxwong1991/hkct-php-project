const tbtn = document.querySelectorAll(".side-nav ul li");
const tab = document.querySelectorAll(".tabs");

function show(panelIndex) {
  tab.forEach(function (node) {
    node.style.display = "none";
  });
  tab[panelIndex].style.display = "block";
}

show(0);

$(".side-nav ul li").click(function () {
  $(this).addClass("active").siblings().removeClass("active");
});

const bar = document.querySelector(".bars");
const navMob = document.querySelector(".nav-mobile");
bar.addEventListener("click", () => {
  navMob.classList.toggle("show");
});

const mobBar = document.querySelector(".m-bar");
const aside = document.querySelector(".sidebar");
const closeSideBar = document.querySelector(".close");

mobBar.addEventListener("click", () => {
  aside.classList.add("show");
});

closeSideBar.addEventListener("click", () => {
  aside.classList.remove("show");
});
