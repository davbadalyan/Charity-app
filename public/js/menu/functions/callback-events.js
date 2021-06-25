export function scroll (event) {
    const menu = document.querySelector('#menu');
    const lWind = document.querySelector('.logotype-window');

    if ( event.currentTarget.scrollY > 300) {
        if (!menu.classList.contains('is-sticky')) {
            menu.classList.add('is-sticky');
            lWind.classList.add('lWind-is-sticky')
        }

    } else {
        if (menu.classList.contains('is-sticky')) {
            menu.classList.remove('is-sticky');
            lWind.classList.remove('lWind-is-sticky')
        }
    }
    // if ( event.currentTarget.scrollY > 1000) {
    //     if (!menu.classList.contains('is-small')) {
    //         menu.classList.add('is-small');
    //     }
    // } else {
    //     if (menu.classList.contains('is-small')) {
    //         menu.classList.remove('is-small');
    //     }
    // }
}

export function toggleMenu() {
    const mobileMenu = document.querySelector('.menu-window');
    const backdrop = document.querySelector('.backdrop');
    if (mobileMenu.classList.contains('menu-window-open')) {
        mobileMenu.classList.remove('menu-window-open');
        backdrop.classList.remove('backdrop-show');
        document.body.style.overflow = ''
    } else {
        mobileMenu.classList.add('menu-window-open');
        backdrop.classList.add('backdrop-show');
        document.body.style.overflow = 'hidden'
    }
}