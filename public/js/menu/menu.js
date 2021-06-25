import {scroll} from "./functions/callback-events.js";
import {toggleMenu} from "./functions/callback-events.js";

window.addEventListener('scroll', scroll);

const menuBtn = document.querySelector('.menu-btn');
const backdrop = document.querySelector('.backdrop');
menuBtn.addEventListener('click', toggleMenu);
backdrop.addEventListener('click', toggleMenu);
