// Initialize Hero Swiper
var heroSwiper = new Swiper(".hero-swiper .mySwiper", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".hero-swiper .swiper-pagination",
        clickable: true,
    },
});

// Initialize Student Achievements Swiper (if uncommented)
var studentSwiper = new Swiper(".top-students .mySwiper", {
    spaceBetween: 30,
    slidesPerView: 1,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".top-students .swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".top-students .swiper-button-next",
        prevEl: ".top-students .swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});

// Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navLinks = document.getElementById('navLinks');

if (mobileMenuBtn && navLinks) {
    mobileMenuBtn.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        mobileMenuBtn.innerHTML = navLinks.classList.contains('active') ? 
            '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
    });
}

// Back to Top Button
const backToTopBtn = document.getElementById('backToTop');

if (backToTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('active');
        } else {
            backToTopBtn.classList.remove('active');
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if(targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
            
            // Close mobile menu if open
            if (navLinks && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }
    });
});

// Dialog Functions
function openDialog(type) {
    const dialog = document.getElementById('loginDialog');
    const title = document.getElementById('dialogTitle');
    
    if (dialog && title) {
        if (type === 'teacher') {
            title.textContent = 'Teacher Login';
            // Update form action if form exists
            const form = dialog.querySelector('form');
            if (form) form.action = 'TeacherLogin';
        } else {
            title.textContent = 'Student Login';
            const form = dialog.querySelector('form');
            if (form) form.action = 'StudentLogin';
        }
        
        dialog.style.display = 'flex';
    }
}

function closeDialog() {
    const dialog = document.getElementById('loginDialog');
    if (dialog) {
        dialog.style.display = 'none';
    }
}

// Close dialog when clicking outside
window.addEventListener('click', function(e) {
    const dialog = document.getElementById('loginDialog');
    if (e.target === dialog) {
        dialog.style.display = 'none';
    }
});