document.addEventListener("DOMContentLoaded", () => {

    const btn = document.getElementById("themeToggle");
    const imgLogo = document.getElementById("logo");
    const imgLogo2 = document.getElementById("logo2");
    imgLogo.src = "img/logo.png";
    imgLogo2.src = "img/logo.png";


    btn.addEventListener("click", () => {


        const icono = btn.querySelector("i");

        if (icono.classList.contains("bi-sun-fill")) {
            imgLogo.src = "img/logo.png";
            imgLogo2.src = "img/logo.png";
            icono.classList.remove("bi-sun-fill");
            icono.classList.add("bi-moon-fill");
        } else {
            imgLogo.src = "img/logoClaro.png";
            imgLogo2.src = "img/logoClaro.png";
            icono.classList.remove("bi-moon-fill");
            icono.classList.add("bi-sun-fill");
        }

    });
});