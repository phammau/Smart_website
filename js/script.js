let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function moveSlide(direction) {
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    const slidesContainer = document.getElementById('slides');
    slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`; // Dịch chuyển container của slides
}

// Tự động chuyển slide mỗi 3 giây (nếu cần)
setInterval(() => moveSlide(1), 3000);
