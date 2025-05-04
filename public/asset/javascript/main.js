
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('mainNavbar');
    const carouselElement = document.getElementById('homeCarousel');

    if (carouselElement) {
        // --- Halaman Home: navbar transparan di top, lalu berubah on scroll ---
        const carouselHeight = carouselElement.offsetHeight;

        function toggleNavbarBackground() {
            if (window.scrollY > carouselHeight) {
                navbar.classList.add('bg-teal', 'shadow');
            } else {
                navbar.classList.remove('bg-teal', 'shadow');
            }
        }

        window.addEventListener('scroll', toggleNavbarBackground);
        toggleNavbarBackground();

        // --- Drag‑to‑slide pada carousel ---
        let startX = 0, isDragging = false;
        carouselElement.addEventListener('mousedown', e => {
            isDragging = true;
            startX = e.pageX;
        });
        carouselElement.addEventListener('mouseup', e => {
            if (!isDragging) return;
            const diffX = e.pageX - startX;
            const carousel = bootstrap.Carousel.getInstance(carouselElement);
            if (diffX > 50) carousel.prev();
            else if (diffX < -50) carousel.next();
            isDragging = false;
        });
        carouselElement.addEventListener('mouseleave', () => {
            isDragging = false;
        });

    } else {
        // --- Halaman lain: navbar selalu berwarna penuh ---
        navbar.classList.add('bg-teal', 'shadow');
    }
});
