let blocks = document.querySelectorAll(".block");
let duration = 0.25;
let stagger = duration;
let repeatDelay = 0.075 * (blocks.length - 1);

gsap.from(".block", 5, {
    opacity: 0,
    transform: "translateZ(-200px)",
    stagger: {
        each: 0.25,
        repeatDelay: repeatDelay,
        repeat: -1,
    }
})

var tl = gsap.timeline();
tl.from('.logo', { opacity: 0, delay: 6, duration: 1, y: -50 })

tl.from(".elmt", { opacity: 0, duration: 1, y: -50, stagger: 0.5 })

tl.from(".img1 img", 1, { y: 500, scale: 1.4, stagger: 0.5, opacity: 0 })
tl.to(".img1 img", 2, { y: -200, stagger: 0.2 })

