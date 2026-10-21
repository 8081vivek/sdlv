(function () {
  'use strict';
  if (window.AOS) AOS.init({ duration: 800, once: true, offset: 60, disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches });

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const heroSwiperEl = document.querySelector('.hero-swiper .mySwiper');
  if (window.Swiper && heroSwiperEl) {
    new Swiper(heroSwiperEl, { spaceBetween: 30, effect: 'fade', loop: true, autoplay: reducedMotion ? false : { delay: 4500, disableOnInteraction: false }, pagination: { el: '.hero-swiper .swiper-pagination', clickable: true } });
  }
  const studentSwiperEl = document.querySelector('.top-students .mySwiper');
  if (window.Swiper && studentSwiperEl) {
    new Swiper(studentSwiperEl, { spaceBetween: 24, slidesPerView: 1, loop: true, autoplay: reducedMotion ? false : { delay: 4000, disableOnInteraction: false }, pagination: { el: '.top-students .swiper-pagination', clickable: true }, navigation: { nextEl: '.top-students .swiper-button-next', prevEl: '.top-students .swiper-button-prev' }, breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 4 } } });
  }

  const menuBtn = document.getElementById('mobileMenuBtn');
  const navLinks = document.getElementById('navLinks');
  if (menuBtn && navLinks) {
    menuBtn.setAttribute('aria-expanded', 'false');
    menuBtn.addEventListener('click', function () {
      const open = navLinks.classList.toggle('active');
      menuBtn.setAttribute('aria-expanded', String(open));
      menuBtn.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
      menuBtn.innerHTML = open ? '<i class="fas fa-times" aria-hidden="true"></i>' : '<i class="fas fa-bars" aria-hidden="true"></i>';
      document.body.classList.toggle('menu-open', open);
    });
    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        navLinks.classList.remove('active'); document.body.classList.remove('menu-open');
        menuBtn.setAttribute('aria-expanded', 'false');
        menuBtn.setAttribute('aria-label', 'Open navigation menu');
        menuBtn.innerHTML = '<i class="fas fa-bars" aria-hidden="true"></i>';
      });
    });
  }

  const header = document.querySelector('header');
  const backToTop = document.getElementById('backToTop');
  function onScroll() {
    const y = window.scrollY || window.pageYOffset;
    if (header) header.classList.toggle('is-compact', y > 45);
    if (backToTop) backToTop.classList.toggle('active', y > 320);
    const max = document.documentElement.scrollHeight - window.innerHeight;
    if (backToTop && max > 0) backToTop.style.setProperty('--scroll-progress', (y / max * 100) + '%');
  }
  window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
  if (backToTop) backToTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' }); });

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const id = this.getAttribute('href');
      if (!id || id === '#') return;
      const target = document.querySelector(id);
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: reducedMotion ? 'auto' : 'smooth', block: 'start' });
    });
  });

  // Typing effect cycles only the tagline copy; static text remains available without JS.
  const typing = document.getElementById('typingTagline');
  if (typing && !reducedMotion) {
    const phrases = ['Excellence in Education Since 2016', 'Learn with Purpose. Grow with Confidence.', 'A Strong Foundation for a Bright Future.'];
    let phrase = 0, index = phrases[0].length, deleting = false;
    function typeLoop() {
      const text = phrases[phrase];
      if (!deleting) {
        index++; typing.textContent = text.slice(0, index);
        if (index >= text.length) { deleting = true; setTimeout(typeLoop, 1800); return; }
      } else {
        index--; typing.textContent = text.slice(0, index);
        if (index <= 0) { deleting = false; phrase = (phrase + 1) % phrases.length; }
      }
      setTimeout(typeLoop, deleting ? 32 : 52);
    }
    setTimeout(typeLoop, 1500);
  }

  // Count-up numbers when stats enter view.
  const counters = document.querySelectorAll('.stat-number[data-count]');
  function animateCounter(el) {
    if (el.dataset.counted) return;
    el.dataset.counted = 'true';
    const target = Number(el.dataset.count || 0), suffix = el.dataset.suffix || '';
    if (reducedMotion || !('IntersectionObserver' in window)) { el.textContent = target + suffix; return; }
    const duration = 1300, start = performance.now();
    function tick(now) {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.round(target * eased) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) { if (entry.isIntersecting) { animateCounter(entry.target); observer.unobserve(entry.target); } });
    }, { threshold: .35 });
    counters.forEach(function (counter) { observer.observe(counter); });
  } else counters.forEach(animateCounter);


  // Theme toggle: preserve the existing data-theme convention and preference.
  const themeToggle = document.getElementById('themeToggle');
  const savedTheme = (function(){ try { return localStorage.getItem('bsdlv-theme'); } catch(e) { return null; } })();
  if (savedTheme === 'dark') document.documentElement.setAttribute('data-theme','dark');
  if (themeToggle) {
    const updateThemeLabel = function() {
      const dark = document.documentElement.getAttribute('data-theme') === 'dark';
      themeToggle.innerHTML = dark ? '<i class="fas fa-sun" aria-hidden="true"></i><span>Light mode</span>' : '<i class="fas fa-moon" aria-hidden="true"></i><span>Dark mode</span>';
      themeToggle.setAttribute('aria-pressed', String(dark));
    };
    updateThemeLabel();
    themeToggle.addEventListener('click', function() {
      const dark = document.documentElement.getAttribute('data-theme') !== 'dark';
      document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
      try { localStorage.setItem('bsdlv-theme', dark ? 'dark' : 'light'); } catch(e) {}
      updateThemeLabel();
    });
  }
  // Mark the navigation item for the current section.
  const navAnchors = document.querySelectorAll('#navLinks a[href^="#"]');
  if ('IntersectionObserver' in window && navAnchors.length) {
    const sections = Array.from(navAnchors).map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);
    const activeObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        navAnchors.forEach(a => a.classList.toggle('is-active', a.getAttribute('href') === '#' + entry.target.id));
      });
    }, { rootMargin: '-30% 0px -60% 0px' });
    sections.forEach(section => activeObserver.observe(section));
  }

  // Existing dialog API kept compatible with current login buttons.
  window.openDialog = function (type) {
    const dialog = document.getElementById('loginDialog');
    const title = document.getElementById('dialogTitle');
    if (!dialog || !title) return;
    title.textContent = type === 'teacher' ? 'Teacher Login' : 'Student Login';
    const form = dialog.querySelector('form');
    if (form) form.action = type === 'teacher' ? 'TeacherLogin' : 'StudentLogin';
    dialog.style.display = 'flex';
    const firstInput = dialog.querySelector('input');
    if (firstInput) firstInput.focus();
  };
  window.closeDialog = function () { const dialog = document.getElementById('loginDialog'); if (dialog) dialog.style.display = 'none'; };
  window.addEventListener('click', function (e) { const dialog = document.getElementById('loginDialog'); if (dialog && e.target === dialog) window.closeDialog(); });
  window.addEventListener('keydown', function (e) { if (e.key === 'Escape') { window.closeDialog(); if (navLinks) navLinks.classList.remove('active'); document.body.classList.remove('menu-open'); } });
})();