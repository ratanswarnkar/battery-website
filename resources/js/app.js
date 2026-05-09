import './bootstrap';
import '../css/app.css';

document.documentElement.style.scrollBehavior = 'smooth';

const setupRevealAnimations = () => {
    const revealItems = document.querySelectorAll('.reveal');

    if (!revealItems.length) {
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.14,
        rootMargin: '0px 0px -40px 0px',
    });

    revealItems.forEach((item) => observer.observe(item));
};

const setupMobileNav = () => {
    const toggle = document.querySelector('[data-nav-toggle]');
    const mobileNav = document.querySelector('[data-mobile-nav]');

    if (!toggle || !mobileNav) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isHidden = mobileNav.classList.toggle('hidden');
        toggle.setAttribute('aria-expanded', String(!isHidden));
    });
};

const setupHeroCube = () => {
    const hero = document.querySelector('[data-hero-cube]');

    if (!hero) {
        return;
    }

    const scene = hero.querySelector('[data-cube-scene]');
    const wrap = hero.querySelector('[data-cube-wrap]');

    if (!scene || !wrap) {
        return;
    }

    const media = window.matchMedia('(prefers-reduced-motion: reduce)');
    const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
    const deviceMemory = navigator.deviceMemory || 8;
    const hardwareThreads = navigator.hardwareConcurrency || 8;
    const isLowEnd = media.matches || Boolean(connection?.saveData) || deviceMemory <= 4 || hardwareThreads <= 4;

    const handlePointerMove = (event) => {
        if (isLowEnd) {
            return;
        }

        const bounds = scene.getBoundingClientRect();
        const x = ((event.clientX - bounds.left) / bounds.width - 0.5) * 22;
        const y = ((event.clientY - bounds.top) / bounds.height - 0.5) * 18;

        scene.style.setProperty('--cube-mouse-x', `${x.toFixed(2)}px`);
        scene.style.setProperty('--cube-mouse-y', `${y.toFixed(2)}px`);
    };

    const resetPointer = () => {
        scene.style.setProperty('--cube-mouse-x', '0px');
        scene.style.setProperty('--cube-mouse-y', '0px');
    };

    if (isLowEnd) {
        scene.classList.add('is-static');
        return;
    }

    scene.addEventListener('pointermove', handlePointerMove);
    scene.addEventListener('pointerleave', resetPointer);
};

window.addEventListener('DOMContentLoaded', () => {
    setupRevealAnimations();
    setupMobileNav();
    setupHeroCube();
});
