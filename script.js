// ==========================
// Purewellness.al Script
// ==========================

// Add to Cart
const cartButtons = document.querySelectorAll(".product-card button");

cartButtons.forEach(button => {

    button.addEventListener("click", () => {

        button.innerHTML = "✔ U shtua";

        button.style.background = "#2d6a4f";

        setTimeout(() => {

            button.innerHTML = "Shto në Shportë";
            button.style.background = "#5fa46b";

        }, 1500);

    });

});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function(e){

        e.preventDefault();

        const target = document.querySelector(this.getAttribute("href"));

        if(target){

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});

// Navbar Shadow
window.addEventListener("scroll", ()=>{

    const navbar = document.querySelector(".navbar");

    if(window.scrollY > 20){

        navbar.style.boxShadow="0 10px 25px rgba(0,0,0,.1)";
        navbar.style.background="#fff";

    }else{

        navbar.style.boxShadow="none";
        navbar.style.background="transparent";

    }

});

// Fade Animation
const observer = new IntersectionObserver(entries=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.style.opacity="1";
            entry.target.style.transform="translateY(0)";

        }

    });

});

document.querySelectorAll(".feature,.category-card,.product-card,.contact-box").forEach(el=>{

    el.style.opacity="0";
    el.style.transform="translateY(40px)";
    el.style.transition=".6s";

    observer.observe(el);

});
