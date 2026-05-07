// Smart Sports - Main JS

document.addEventListener('DOMContentLoaded', function () {

    // ---- Mobile Menu Toggle ----
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav    = document.querySelector('.main-nav');
    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function () {
            mainNav.classList.toggle('is-open');
            menuToggle.classList.toggle('is-active');
        });
    }

    // ---- Sticky Header shadow ----
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            header.style.boxShadow = window.scrollY > 10
                ? '0 4px 20px rgba(0,0,0,0.12)'
                : '0 2px 12px rgba(0,0,0,0.08)';
        });
    }

    // ---- Testimonials Swiper ----
    if (typeof Swiper !== 'undefined') {
        new Swiper('.testimonials-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1, spaceBetween: 20 },
                768: { slidesPerView: 2, spaceBetween: 24 },
                1024: { slidesPerView: 3, spaceBetween: 24 },
            },
        });
    }

    // ---- Scroll Reveal Animation ----
    const revealEls = document.querySelectorAll(
        '.hiw-card, .stat-card, .wm-card, .success-content, .success-img-wrap'
    );
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.style.opacity    = '1';
                    entry.target.style.transform  = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealEls.forEach(function (el) {
            el.style.opacity   = '0';
            el.style.transform = 'translateY(28px)';
            el.style.transition = 'opacity 0.55s ease, transform 0.55s ease';
            observer.observe(el);
        });
    }
});
