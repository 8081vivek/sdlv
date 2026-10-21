

<html lang="en">    
    <html>      
        <head>




{{-- ============================================================
     FILE: resources/views/about.blade.php
     B.S.D.L.V. Inter College — About Us (Premium Redesign)
     ============================================================ --}}

@extends('layout.preloader')

@section('title', 'About Us — B.S.D.L.V. Inter College')

{{-- Page-scoped CSS. Prefixed with .bsdlv-about to avoid touching other pages --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* ============================================================
   ROOT TOKENS (EXACT PALETTE — DO NOT CHANGE)
   ============================================================ */
.bsdlv-about{
  --primary:#1e40af;
  --primary-dark:#1e3a8a;
  --secondary:#3b82f6;
  --accent:#f59e0b;
  --accent-light:#fbbf24;
  --light:#f8fafc;
  --light-gray:#f1f5f9;
  --medium-gray:#94a3b8;
  --dark:#0f172a;
  --text:#334155;
  --text-light:#64748b;

  --radius-sm:10px;
  --radius:16px;
  --radius-lg:24px;

  --shadow-sm:0 1px 2px rgba(15,23,42,.06),0 1px 3px rgba(15,23,42,.08);
  --shadow-md:0 10px 25px -8px rgba(15,23,42,.15),0 4px 10px -4px rgba(15,23,42,.08);
  --shadow-lg:0 30px 60px -20px rgba(15,23,42,.28),0 12px 24px -12px rgba(15,23,42,.18);

  --ease:cubic-bezier(.22,.61,.36,1);
  --maxw:1200px;

  color:var(--text);
  font-family:inherit;
  line-height:1.65;
  -webkit-font-smoothing:antialiased;
  overflow-x:hidden;
}
.bsdlv-about *,
.bsdlv-about *::before,
.bsdlv-about *::after{ box-sizing:border-box; }

.bsdlv-about img{ max-width:100%; display:block; }

.bsdlv-about .container{
  width:100%;
  max-width:var(--maxw);
  margin-inline:auto;
  padding-inline:clamp(16px,4vw,40px);
}

/* Section rhythm */
.bsdlv-about .section{ padding-block:clamp(56px,8vw,104px); }
.bsdlv-about .section--tight{ padding-block:clamp(40px,6vw,72px); }
.bsdlv-about .section--gray{ background:var(--light-gray); }

/* Typography helpers */
.bsdlv-about .eyebrow{
  display:inline-flex; align-items:center; gap:8px;
  font-size:.78rem; font-weight:700; letter-spacing:.14em;
  text-transform:uppercase; color:var(--primary);
  background:rgba(30,64,175,.08);
  border:1px solid rgba(30,64,175,.18);
  padding:7px 14px; border-radius:999px;
}
.bsdlv-about .eyebrow i{ color:var(--accent); }

.bsdlv-about h1,.bsdlv-about h2,.bsdlv-about h3{ color:var(--dark); line-height:1.18; margin:0; }
.bsdlv-about .h2{
  font-size:clamp(1.6rem,3.4vw,2.6rem);
  font-weight:800; letter-spacing:-.02em;
}
.bsdlv-about .lead{ color:var(--text-light); font-size:clamp(1rem,1.4vw,1.125rem); }
.bsdlv-about .gold-rule{
  display:inline-block; width:56px; height:4px; border-radius:999px;
  background:linear-gradient(90deg,var(--accent),var(--accent-light));
}

/* Buttons */
.bsdlv-about .btn{
  --btn-bg:var(--primary);
  --btn-fg:#fff;
  display:inline-flex; align-items:center; justify-content:center; gap:.55rem;
  padding:.9rem 1.5rem; border-radius:999px;
  font-weight:700; font-size:.95rem; text-decoration:none;
  background:var(--btn-bg); color:var(--btn-fg);
  border:1px solid transparent;
  transition:transform .25s var(--ease), box-shadow .25s var(--ease), background .25s var(--ease), color .25s var(--ease), border-color .25s var(--ease);
  min-height:48px; cursor:pointer;
}
.bsdlv-about .btn:hover{ transform:translateY(-2px); box-shadow:var(--shadow-md); }
.bsdlv-about .btn:focus-visible{ outline:3px solid var(--accent); outline-offset:3px; }
.bsdlv-about .btn--gold{ --btn-bg:var(--accent); --btn-fg:#1f2937; }
.bsdlv-about .btn--gold:hover{ --btn-bg:var(--accent-light); }
.bsdlv-about .btn--ghost{
  --btn-bg:transparent; --btn-fg:#fff;
  border-color:rgba(255,255,255,.45);
}
.bsdlv-about .btn--ghost:hover{ background:rgba(255,255,255,.12); border-color:rgba(255,255,255,.7); }
.bsdlv-about .btn--outline{
  --btn-bg:transparent; --btn-fg:var(--primary);
  border-color:rgba(30,64,175,.35);
}
.bsdlv-about .btn--outline:hover{ background:rgba(30,64,175,.06); }

/* ============================================================
   HERO
   ============================================================ */
.bsdlv-about .hero{
  position:relative; isolation:isolate;
  color:#fff; text-align:center;
  background:linear-gradient(135deg, var(--primary-dark), var(--primary) 55%, #dcdfe6 100%);
  padding-block:clamp(72px,12vw,140px) clamp(56px,9vw,120px);
  overflow:hidden;
}
.bsdlv-about .hero__bg{
  position:absolute; inset:0; z-index:-1; opacity:.16;
  background-size:cover; background-position:center;
  /* REPLACE below image path with a real campus photo from your project */
  background-image:url('{{ asset('images/about/campus-hero.jpg') }}');
}
.bsdlv-about .hero__veil{
  position:absolute; inset:0; z-index:-1;
  background:
    linear-gradient(180deg, rgba(15,23,42,.55) 0%, rgba(15,23,42,.78) 100%);
}
.bsdlv-about .hero__glow{
  position:absolute; z-index:-1; border-radius:50%; filter:blur(60px);
  pointer-events:none;
}
.bsdlv-about .hero__glow--blue{
  width:460px; height:460px; top:-160px; right:-100px;
  background:radial-gradient(circle, rgba(59,130,246,.5), transparent 70%);
}
.bsdlv-about .hero__glow--gold{
  width:360px; height:360px; bottom:-160px; left:-120px;
  background:radial-gradient(circle, rgba(245,158,11,.35), transparent 70%);
}
.bsdlv-about .hero__inner{ max-width:820px; }
.bsdlv-about .hero__badge{
  display:inline-flex; align-items:center; gap:9px;
  font-size:.74rem; font-weight:800; letter-spacing:.16em; text-transform:uppercase;
  color:var(--accent-light);
  background:rgba(245,158,11,.12);
  border:1px solid rgba(245,158,11,.35);
  padding:8px 16px; border-radius:999px;
  backdrop-filter:blur(6px);
}
.bsdlv-about .hero__badge i{ color:var(--accent); }
.bsdlv-about .hero h1{
  color:#fff;
  font-size:clamp(2rem,5.2vw,3.75rem);
  font-weight:800; letter-spacing:-.025em;
  margin-top:1.15rem;
  text-wrap:balance;
}
.bsdlv-about .hero h1 .gold{ color:var(--accent-light); }
.bsdlv-about .hero p{
  color:#dbe4f3;
  font-size:clamp(1rem,1.6vw,1.18rem);
  margin-top:1.15rem; max-width:64ch;
}
.bsdlv-about .hero__actions{
  display:flex; flex-wrap:wrap; gap:14px; margin-top:2rem;
}
.bsdlv-about .hero__scroll{
  position:absolute; left:50%; bottom:22px; transform:translateX(-50%);
  display:inline-flex; flex-direction:column; align-items:center; gap:6px;
  color:rgba(255,255,255,.7); font-size:.72rem; letter-spacing:.18em; text-transform:uppercase;
  text-decoration:none;
}
.bsdlv-about .hero__scroll i{ animation:bob 2.4s ease-in-out infinite; }
@keyframes bob{ 0%,100%{ transform:translateY(0);} 50%{ transform:translateY(6px);} }

/* ============================================================
   ABOUT / WHO WE ARE
   ============================================================ */
.bsdlv-about .about-grid{
  display:grid; gap:clamp(28px,5vw,64px);
  grid-template-columns:1fr;
  align-items:center;
}
@media (min-width:900px){
  .bsdlv-about .about-grid{ grid-template-columns:1.05fr 1fr; }
}
.bsdlv-about .about-media{
  position:relative;
  border-radius:var(--radius-lg);
  overflow:hidden;
  box-shadow:var(--shadow-lg);
  aspect-ratio:4/3;
  background:linear-gradient(135deg,var(--primary-dark),var(--primary));
}
.bsdlv-about .about-media img{
  width:100%; height:100%; object-fit:cover;
  transition:transform .8s var(--ease);
}
.bsdlv-about .about-media:hover img{ transform:scale(1.06); }
.bsdlv-about .about-media::after{
  content:""; position:absolute; inset:0;
  border:1px solid rgba(255,255,255,.18);
  border-radius:inherit; pointer-events:none;
}
.bsdlv-about .about-media__tag{
  position:absolute; left:18px; bottom:18px;
  display:inline-flex; align-items:center; gap:8px;
  background:rgba(15,23,42,.72); color:#fff;
  padding:9px 14px; border-radius:999px;
  font-size:.8rem; font-weight:700; letter-spacing:.04em;
  backdrop-filter:blur(8px);
  border:1px solid rgba(255,255,255,.18);
}
.bsdlv-about .about-media__tag i{ color:var(--accent-light); }

.bsdlv-about .about-copy p{ margin:.9rem 0 0; color:var(--text); }
.bsdlv-about .about-copy p:first-of-type{ margin-top:1.2rem; }

.bsdlv-about .info-panel{
  margin-top:1.75rem;
  background:#fff;
  border:1px solid #e2e8f0;
  border-radius:var(--radius);
  padding:1.25rem 1.35rem;
  box-shadow:var(--shadow-sm);
  position:relative;
  overflow:hidden;
}
.bsdlv-about .info-panel::before{
  content:""; position:absolute; left:0; top:0; bottom:0; width:4px;
  background:linear-gradient(180deg,var(--accent),var(--accent-light));
}
.bsdlv-about .info-panel dl{
  margin:0; display:grid; gap:.85rem;
  grid-template-columns:1fr;
}
@media (min-width:520px){
  .bsdlv-about .info-panel dl{ grid-template-columns:1fr 1fr; }
}
.bsdlv-about .info-panel .k{
  font-size:.72rem; font-weight:800; letter-spacing:.14em;
  text-transform:uppercase; color:var(--text-light);
  display:flex; align-items:center; gap:6px;
}
.bsdlv-about .info-panel .k i{ color:var(--primary); }
.bsdlv-about .info-panel .v{
  font-weight:700; color:var(--dark); font-size:1rem; line-height:1.4;
}

/* ============================================================
   MISSION / VISION / COMMITMENT
   ============================================================ */
.bsdlv-about .mvc-grid{
  display:grid; gap:22px;
  grid-template-columns:1fr;
  margin-top:clamp(32px,5vw,52px);
}
@media (min-width:760px){ .bsdlv-about .mvc-grid{ grid-template-columns:repeat(3,1fr); } }

.bsdlv-about .card{
  position:relative; background:#fff;
  border:1px solid #e6ebf2; border-radius:var(--radius);
  padding:1.6rem 1.5rem 1.7rem;
  box-shadow:var(--shadow-sm);
  transition:transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
  height:100%;
  display:flex; flex-direction:column;
  overflow:hidden;
}
.bsdlv-about .card::before{
  content:""; position:absolute; top:0; left:0; right:0; height:4px;
  background:linear-gradient(90deg,var(--primary),var(--secondary));
  opacity:.9;
}
.bsdlv-about .card--gold::before{ background:linear-gradient(90deg,var(--accent),var(--accent-light)); }
.bsdlv-about .card:hover{ transform:translateY(-6px); box-shadow:var(--shadow-md); border-color:rgba(30,64,175,.28); }

.bsdlv-about .card__icon{
  width:56px; height:56px; border-radius:14px;
  display:grid; place-items:center;
  color:var(--primary);
  background:linear-gradient(135deg, rgba(30,64,175,.12), rgba(59,130,246,.08));
  border:1px solid rgba(30,64,175,.18);
  font-size:1.35rem;
  margin-bottom:1rem;
  transition:transform .35s var(--ease), background .35s var(--ease), color .35s var(--ease);
}
.bsdlv-about .card--gold .card__icon{
  color:var(--accent);
  background:linear-gradient(135deg, rgba(245,158,11,.14), rgba(251,191,36,.08));
  border-color:rgba(245,158,11,.28);
}
.bsdlv-about .card:hover .card__icon{ transform:translateY(-2px) rotate(-4deg); }
.bsdlv-about .card h3{ font-size:1.15rem; font-weight:800; letter-spacing:-.01em; }
.bsdlv-about .card p{ margin:.6rem 0 0; color:var(--text-light); font-size:.95rem; flex:1; }

/* ============================================================
   CORE VALUES
   ============================================================ */
.bsdlv-about .values-grid{
  display:grid; gap:18px;
  grid-template-columns:1fr;
  margin-top:clamp(32px,5vw,52px);
}
@media (min-width:600px){ .bsdlv-about .values-grid{ grid-template-columns:repeat(2,1fr); } }
@media (min-width:980px){ .bsdlv-about .values-grid{ grid-template-columns:repeat(3,1fr); } }

.bsdlv-about .value{
  background:var(--light);
  border:1px solid #e3e9f1;
  border-radius:var(--radius);
  padding:1.35rem 1.35rem 1.45rem;
  transition:transform .3s var(--ease), box-shadow .3s var(--ease), border-color .3s var(--ease), background .3s var(--ease);
  position:relative;
  overflow:hidden;
}
.bsdlv-about .value::after{
  content:""; position:absolute; inset:0;
  background:radial-gradient(220px 120px at 100% 0%, rgba(245,158,11,.10), transparent 60%);
  opacity:0; transition:opacity .35s var(--ease);
  pointer-events:none;
}
.bsdlv-about .value:hover{
  transform:translateY(-4px);
  background:#fff;
  border-color:rgba(30,64,175,.32);
  box-shadow:var(--shadow-md);
}
.bsdlv-about .value:hover::after{ opacity:1; }
.bsdlv-about .value__icon{
  width:46px; height:46px; border-radius:12px;
  display:grid; place-items:center;
  background:#fff; color:var(--primary);
  border:1px solid rgba(30,64,175,.2);
  font-size:1.1rem;
  margin-bottom:.9rem;
  transition:transform .3s var(--ease), color .3s var(--ease), background .3s var(--ease);
}
.bsdlv-about .value:hover .value__icon{
  transform:translateY(-2px);
  background:linear-gradient(135deg,var(--primary),var(--secondary));
  color:#fff; border-color:transparent;
}
.bsdlv-about .value h3{ font-size:1.05rem; font-weight:800; }
.bsdlv-about .value p{ margin:.45rem 0 0; color:var(--text-light); font-size:.92rem; }

/* ============================================================
   APPROACH (EDITORIAL TIMELINE)
   ============================================================ */
.bsdlv-about .approach{
  display:grid; gap:clamp(28px,5vw,56px);
  grid-template-columns:1fr; align-items:start;
}
@media (min-width:900px){
  .bsdlv-about .approach{ grid-template-columns:.85fr 1.15fr; }
}
.bsdlv-about .approach__intro h2{ margin-top:1rem; }
.bsdlv-about .approach__intro p{ margin-top:1rem; color:var(--text-light); }

.bsdlv-about .timeline{ position:relative; padding-left:34px; }
.bsdlv-about .timeline::before{
  content:""; position:absolute; left:11px; top:6px; bottom:6px; width:2px;
  background:linear-gradient(180deg,var(--primary),var(--accent));
  border-radius:999px; opacity:.55;
}
.bsdlv-about .step{ position:relative; padding:0 0 1.6rem; }
.bsdlv-about .step:last-child{ padding-bottom:0; }
.bsdlv-about .step__dot{
  position:absolute; left:-34px; top:2px;
  width:24px; height:24px; border-radius:50%;
  background:#fff; border:3px solid var(--primary);
  display:grid; place-items:center; color:var(--primary); font-size:.55rem;
}
.bsdlv-about .step:nth-child(2n) .step__dot{ border-color:var(--secondary); color:var(--secondary); }
.bsdlv-about .step:nth-child(3n) .step__dot{ border-color:var(--accent); color:var(--accent); }
.bsdlv-about .step h3{ font-size:1.05rem; font-weight:800; }
.bsdlv-about .step p{ margin:.35rem 0 0; color:var(--text-light); font-size:.95rem; }

/* ============================================================
   GALLERY
   ============================================================ */
.bsdlv-about .gallery{
  display:grid; gap:14px;
  grid-template-columns:repeat(2,1fr);
  margin-top:clamp(28px,4vw,44px);
}
@media (min-width:820px){
  .bsdlv-about .gallery{
    grid-template-columns:repeat(4,1fr);
    grid-auto-rows:180px;
  }
  .bsdlv-about .gallery__item--wide{ grid-column:span 2; }
  .bsdlv-about .gallery__item--tall{ grid-row:span 2; }
}
.bsdlv-about .gallery__item{
  position:relative; overflow:hidden;
  border-radius:var(--radius);
  background:linear-gradient(135deg,var(--primary-dark),var(--primary));
  box-shadow:var(--shadow-sm);
  aspect-ratio:4/3;
}
@media (min-width:820px){ .bsdlv-about .gallery__item{ aspect-ratio:auto; height:100%; } }
.bsdlv-about .gallery__item img{
  width:100%; height:100%; object-fit:cover;
  transition:transform .7s var(--ease);
}
.bsdlv-about .gallery__item:hover img{ transform:scale(1.08); }
.bsdlv-about .gallery__item::after{
  content:""; position:absolute; inset:0;
  background:linear-gradient(180deg, transparent 55%, rgba(15,23,42,.55));
  opacity:0; transition:opacity .35s var(--ease);
}
.bsdlv-about .gallery__item:hover::after{ opacity:1; }
.bsdlv-about .gallery__caption{
  position:absolute; left:14px; right:14px; bottom:12px;
  color:#fff; font-size:.82rem; font-weight:700; letter-spacing:.02em;
  opacity:0; transform:translateY(6px);
  transition:opacity .35s var(--ease), transform .35s var(--ease);
  z-index:1;
}
.bsdlv-about .gallery__item:hover .gallery__caption{ opacity:1; transform:translateY(0); }

/* ============================================================
   LEADERSHIP / COMMUNITY NOTE
   ============================================================ */
.bsdlv-about .note{
  margin-top:clamp(28px,4vw,44px);
  background:#fff; border:1px solid #e6ebf2;
  border-radius:var(--radius-lg);
  padding:clamp(1.5rem,3vw,2.5rem);
  box-shadow:var(--shadow-sm);
  display:grid; gap:1.25rem;
  grid-template-columns:1fr;
  align-items:center;
}
@media (min-width:820px){ .bsdlv-about .note{ grid-template-columns:auto 1fr; } }
.bsdlv-about .note__icon{
  width:72px; height:72px; border-radius:50%;
  display:grid; place-items:center; font-size:1.6rem;
  color:var(--accent);
  background:linear-gradient(135deg, rgba(245,158,11,.16), rgba(251,191,36,.08));
  border:1px solid rgba(245,158,11,.3);
  margin-inline:auto;
}
.bsdlv-about .note h3{ font-size:1.2rem; font-weight:800; }
.bsdlv-about .note p{ margin:.4rem 0 0; color:var(--text-light); }

/* ============================================================
   AT A GLANCE STRIP
   ============================================================ */
.bsdlv-about .glance{
  background:linear-gradient(120deg,var(--primary-dark),var(--primary));
  color:#fff; border-radius:var(--radius-lg);
  padding:clamp(1.5rem,3.5vw,2.5rem);
  box-shadow:var(--shadow-lg);
  display:grid; gap:1.25rem;
  grid-template-columns:1fr;
  position:relative; overflow:hidden;
}
.bsdlv-about .glance::before{
  content:""; position:absolute; right:-60px; top:-60px;
  width:220px; height:220px; border-radius:50%;
  background:radial-gradient(circle, rgba(245,158,11,.35), transparent 70%);
  filter:blur(20px); pointer-events:none;
}
@media (min-width:820px){ .bsdlv-about .glance{ grid-template-columns:repeat(3,1fr); } }
.bsdlv-about .glance__item{
  display:flex; gap:14px; align-items:flex-start;
  padding:1rem 1.1rem;
  border-radius:var(--radius);
  background:rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.14);
}
.bsdlv-about .glance__icon{
  width:44px; height:44px; flex:0 0 44px;
  border-radius:12px; display:grid; place-items:center;
  background:rgba(245,158,11,.18); color:var(--accent-light);
  border:1px solid rgba(245,158,11,.35);
  font-size:1.05rem;
}
.bsdlv-about .glance__k{
  font-size:.7rem; letter-spacing:.14em; text-transform:uppercase;
  color:rgba(255,255,255,.7); font-weight:800;
}
.bsdlv-about .glance__v{ font-weight:700; font-size:.98rem; margin-top:2px; color:#fff; }

/* ============================================================
   FINAL CTA
   ============================================================ */
.bsdlv-about .cta{
  position:relative; overflow:hidden;
  border-radius:var(--radius-lg);
  padding:clamp(2rem,5vw,3.5rem);
  color:#fff; text-align:center;
  background:
    radial-gradient(800px 400px at 50% -20%, rgba(59,130,246,.4), transparent 60%),
    linear-gradient(135deg,var(--primary-dark),var(--primary) 55%, #1b3b7a 100%);
  box-shadow:var(--shadow-lg);
}
.bsdlv-about .cta::before,
.bsdlv-about .cta::after{
  content:""; position:absolute; border-radius:50%;
  filter:blur(40px); pointer-events:none;
}
.bsdlv-about .cta::before{
  width:300px; height:300px; left:-100px; bottom:-120px;
  background:radial-gradient(circle, rgba(245,158,11,.4), transparent 70%);
}
.bsdlv-about .cta::after{
  width:260px; height:260px; right:-80px; top:-100px;
  background:radial-gradient(circle, rgba(59,130,246,.5), transparent 70%);
}
.bsdlv-about .cta > *{ position:relative; z-index:1; }
.bsdlv-about .cta h2{
  color:#fff; font-size:clamp(1.6rem,3.6vw,2.6rem);
  font-weight:800; letter-spacing:-.02em;
}
.bsdlv-about .cta p{
  color:#dbe4f3; max-width:60ch; margin:.9rem auto 0;
  font-size:clamp(.98rem,1.3vw,1.08rem);
}
.bsdlv-about .cta__actions{
  display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-top:1.75rem;
}

/* ============================================================
   REVEAL ON SCROLL
   ============================================================ */
.bsdlv-about .reveal{
  opacity:0; transform:translateY(22px);
  transition:opacity .7s var(--ease), transform .7s var(--ease);
  will-change:opacity, transform;
}
.bsdlv-about .reveal.is-visible{ opacity:1; transform:none; }

/* Fallback if JS disabled / no IO support */
@media (prefers-reduced-motion: reduce){
  .bsdlv-about *{ animation:none !important; transition:none !important; }
  .bsdlv-about .reveal{ opacity:1; transform:none; }
}
.no-js .bsdlv-about .reveal{ opacity:1; transform:none; }
</style>

</head  >

<body>

@include(' header')
    <main class="bsdlv-about" id="about-top">

  {{-- ============================================================
       HERO
       ============================================================ --}}
  <section class="hero" aria-labelledby="hero-title">
    
  

    <div class="container">
      <div class="hero__inner reveal">
        <span class="hero__badge">
          <i class="fa-solid fa-school" aria-hidden="true"></i>
          About B.S.D.L.V. Inter College
        </span>

        <h1 id="hero-title">
          Inspiring Young Minds.<br>
          Building <span class="gold">Brighter Futures.</span>
        </h1>

        <p>
          At B.S.D.L.V. Inter College, we believe that education is more than
          academic success — it is the foundation of character, discipline and
          purpose. Guided by dedicated teachers and a caring community, we
          help students grow into confident, responsible and compassionate
          individuals.
        </p>

        <div class="hero__actions">
          {{-- Links to an on-page section: safe, no route required --}}
          <a href="#who-we-are" class="btn btn--gold">
            <i class="fa-solid fa-compass" aria-hidden="true"></i>
            Discover Our School
          </a>
          {{-- REPLACE route('contact') if your route name differs --}}
          <a href="{{ Route::has('contact') ? route('contact') : url('/contact') }}" class="btn btn--ghost">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
            Contact Us
          </a>
        </div>
      </div>
    </div>

    <a class="hero__scroll" href="#who-we-are" aria-label="Scroll to about section">
      <span>Scroll</span>
      <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
    </a>
  </section>

  {{-- ============================================================
       WHO WE ARE
       ============================================================ --}}
  <section class="section" id="who-we-are" aria-labelledby="who-title">
    <div class="container">
      <div class="about-grid">

        <figure class="about-media reveal">
          {{-- REPLACE: real campus image path in your project --}}
          <img
            src="{{ asset('image/banner_03.jpg') }}"
            alt="Campus view of B.S.D.L.V. Inter College"
            loading="lazy" decoding="async"
            onerror="this.style.display='none';"
          >
          <figcaption class="about-media__tag">
            <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
            Madhoganj, Hardoi
          </figcaption>
        </figure>

        <div class="about-copy reveal">
          <span class="eyebrow">
            <i class="fa-solid fa-seedling" aria-hidden="true"></i>
            Who We Are
          </span>

          <h2 class="h2" id="who-title" style="margin-top:.9rem;">
            A school built on purpose,<br>learning and character.
          </h2>

          <p class="lead">
            B.S.D.L.V. Inter College was established in 2016 with a simple
            yet meaningful aim — to provide quality education that nurtures
            both the mind and the character of every student.
          </p>

          <p>
            Situated in Mohddinpur Naibasti, Madhoganj, Hardoi (Uttar Pradesh),
            our school serves families in the surrounding community by offering
            a learning environment rooted in discipline, respect and academic
            responsibility.
          </p>

          <p>
            We believe that every child carries unique potential. Our role is to
            provide guidance, encouragement and a safe space where that
            potential can be discovered and developed with confidence.
          </p>

          <div class="info-panel">
            <dl>
              <div>
                <dt class="k"><i class="fa-solid fa-school" aria-hidden="true"></i> School</dt>
                <dd class="v">B.S.D.L.V. Inter College</dd>
              </div>
              <div>
                <dt class="k"><i class="fa-solid fa-calendar-days" aria-hidden="true"></i> Established</dt>
                <dd class="v">2016</dd>
              </div>
              <div>
                <dt class="k"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Location</dt>
                <dd class="v">Madhoganj, Hardoi, Uttar Pradesh — 241302</dd>
              </div>
              <div>
                <dt class="k"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i> Focus</dt>
                <dd class="v">Education, discipline &amp; character</dd>
              </div>
            </dl>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ============================================================
       MISSION / VISION / COMMITMENT
       ============================================================ --}}
  <section class="section section--gray" id="mission" aria-labelledby="mvc-title">
    <div class="container">
      <div style="max-width:720px; text-align:center; margin-inline:auto;" class="reveal">
        <span class="eyebrow">
          <i class="fa-solid fa-star" aria-hidden="true"></i>
          Our Purpose
        </span>
        <h2 class="h2" id="mvc-title" style="margin-top:.9rem;">
          Mission, Vision &amp; Commitment
        </h2>
        <p class="lead" style="margin-top:.8rem;">
          Three guiding principles that shape the everyday life of our school.
        </p>
      </div>

      <div class="mvc-grid">
        <article class="card reveal">
          <div class="card__icon"><i class="fa-solid fa-bullseye" aria-hidden="true"></i></div>
          <h3>Our Mission</h3>
          <p>
            To provide quality education in a supportive environment where
            students are encouraged to learn consistently, think independently
            and grow into responsible individuals.
          </p>
        </article>

        <article class="card card--gold reveal">
          <div class="card__icon"><i class="fa-solid fa-eye" aria-hidden="true"></i></div>
          <h3>Our Vision</h3>
          <p>
            To be a school recognised for its values, discipline and the
            all-round development of its students, helping them become confident
            and useful members of society.
          </p>
        </article>

        <article class="card reveal">
          <div class="card__icon"><i class="fa-solid fa-handshake-angle" aria-hidden="true"></i></div>
          <h3>Our Commitment</h3>
          <p>
            To remain dedicated to our students and their families by
            maintaining a learning environment built on respect, fairness,
            consistency and care.
          </p>
        </article>
      </div>
    </div>
  </section>

  {{-- ============================================================
       CORE VALUES
       ============================================================ --}}
  <section class="section" id="values" aria-labelledby="values-title">
    <div class="container">
      <div style="max-width:720px;" class="reveal">
        <span class="eyebrow">
          <i class="fa-solid fa-heart" aria-hidden="true"></i>
          Core Values
        </span>
        <h2 class="h2" id="values-title" style="margin-top:.9rem;">
          The values that guide us
        </h2>
        <p class="lead" style="margin-top:.8rem;">
          Everyday learning at B.S.D.L.V. Inter College is shaped by these six
          values.
        </p>
      </div>

      <div class="values-grid">
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-award" aria-hidden="true"></i></div>
          <h3>Excellence</h3>
          <p>Encouraging students to put genuine effort into their learning and to take pride in doing their best.</p>
        </div>
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i></div>
          <h3>Integrity</h3>
          <p>Building habits of honesty, fairness and accountability in classrooms and beyond.</p>
        </div>
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-lightbulb" aria-hidden="true"></i></div>
          <h3>Innovation</h3>
          <p>Supporting curiosity and a willingness to try, ask questions and explore new ideas.</p>
        </div>
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-people-group" aria-hidden="true"></i></div>
          <h3>Community</h3>
          <p>Fostering respect and a sense of belonging among students, staff and families.</p>
        </div>
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-hands-holding-child" aria-hidden="true"></i></div>
          <h3>Service</h3>
          <p>Encouraging students to be kind, helpful and considerate towards others.</p>
        </div>
        <div class="value reveal">
          <div class="value__icon"><i class="fa-solid fa-leaf" aria-hidden="true"></i></div>
          <h3>Sustainability</h3>
          <p>Instilling a responsible attitude towards the environment and the community we live in.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- ============================================================
       APPROACH
       ============================================================ --}}
  <section class="section section--gray" id="approach" aria-labelledby="approach-title">
    <div class="container">
      <div class="approach">
        <div class="approach__intro reveal">
          <span class="eyebrow">
            <i class="fa-solid fa-chalkboard-user" aria-hidden="true"></i>
            Our Approach
          </span>
          <h2 class="h2" id="approach-title">Learning that shapes<br>the whole student.</h2>
          <p class="lead">
            Education at B.S.D.L.V. Inter College is approached with balance —
            giving equal value to academic learning, discipline, confidence
            and good character.
          </p>
          <span class="gold-rule" style="margin-top:1.4rem;" aria-hidden="true"></span>
        </div>

        <ol class="timeline reveal" style="list-style:none; margin:0;">
          <li class="step">
            <span class="step__dot" aria-hidden="true"><i class="fa-solid fa-book-open"></i></span>
            <h3>Academic Learning</h3>
            <p>Structured lessons, guided practice and encouragement to develop a strong foundation in core subjects.</p>
          </li>
          <li class="step">
            <span class="step__dot" aria-hidden="true"><i class="fa-solid fa-shield-halved"></i></span>
            <h3>Discipline &amp; Responsibility</h3>
            <p>Helping students understand the importance of routine, punctuality and taking ownership of their actions.</p>
          </li>
          <li class="step">
            <span class="step__dot" aria-hidden="true"><i class="fa-solid fa-star"></i></span>
            <h3>Confidence &amp; Creativity</h3>
            <p>Encouraging students to express themselves, participate actively and discover their own strengths.</p>
          </li>
          <li class="step">
            <span class="step__dot" aria-hidden="true"><i class="fa-solid fa-hand-holding-heart"></i></span>
            <h3>Respect &amp; Good Character</h3>
            <p>Building an environment where kindness, honesty and respect for others are practised every day.</p>
          </li>
        </ol>
      </div>
    </div>
  </section>

  {{-- ============================================================
       GALLERY  (edit / remove items as needed)
       ============================================================ --}}
  <section class="section" id="gallery" aria-labelledby="gallery-title">
    <div class="container">
      <div style="max-width:720px;" class="reveal">
        <span class="eyebrow">
          <i class="fa-solid fa-images" aria-hidden="true"></i>
          Campus Life
        </span>
        <h2 class="h2" id="gallery-title" style="margin-top:.9rem;">
          A glimpse of our school
        </h2>
        <p class="lead" style="margin-top:.8rem;">
          Moments from everyday life at B.S.D.L.V. Inter College.
        </p>
      </div>

      {{--
        REPLACE image paths below with real photos from your project.
        If you don't have any gallery photos yet, delete this entire <div class="gallery">.
        Every path is real-and-safe to omit: the layout will simply collapse.
      --}}
      <div class="gallery">
        <figure class="gallery__item gallery__item--wide reveal" style="margin:0;">
          <img src="{{ asset('images/about/gallery-1.jpg') }}" alt="Students in a classroom at B.S.D.L.V. Inter College" loading="lazy" decoding="async" onerror="this.closest('.gallery__item').style.display='none';">
          <figcaption class="gallery__caption">Classroom learning</figcaption>
        </figure>
        <figure class="gallery__item gallery__item--tall reveal" style="margin:0;">
          <img src="{{ asset('images/about/gallery-2.jpg') }}" alt="School assembly at B.S.D.L.V. Inter College" loading="lazy" decoding="async" onerror="this.closest('.gallery__item').style.display='none';">
          <figcaption class="gallery__caption">Morning assembly</figcaption>
        </figure>
        <figure class="gallery__item reveal" style="margin:0;">
          <img src="{{ asset('images/about/gallery-3.jpg') }}" alt="School building at B.S.D.L.V. Inter College" loading="lazy" decoding="async" onerror="this.closest('.gallery__item').style.display='none';">
          <figcaption class="gallery__caption">Our campus</figcaption>
        </figure>
        <figure class="gallery__item reveal" style="margin:0;">
          <img src="{{ asset('images/about/gallery-4.jpg') }}" alt="Students participating in a school activity" loading="lazy" decoding="async" onerror="this.closest('.gallery__item').style.display='none';">
          <figcaption class="gallery__caption">School activities</figcaption>
        </figure>
      </div>
    </div>
  </section>

  {{-- ============================================================
       LEADERSHIP / COMMUNITY NOTE
       (No invented names or quotes — replace with verified info only)
       ============================================================ --}}
  <section class="section section--gray" id="leadership" aria-labelledby="leadership-title">
    <div class="container">
      <div style="max-width:720px;" class="reveal">
        <span class="eyebrow">
          <i class="fa-solid fa-user-group" aria-hidden="true"></i>
          Our Community
        </span>
        <h2 class="h2" id="leadership-title" style="margin-top:.9rem;">
          Led by care, guided by purpose
        </h2>
        <p class="lead" style="margin-top:.8rem;">
          Behind every classroom is a team of teachers and staff who believe in
          the potential of every student.
        </p>
      </div>

      {{--
        VERIFIED DETAILS ONLY.
        Add Principal / Vice-Principal cards here ONLY if you have confirmed
        names, photos and qualifications. Placeholders below are safe defaults.
      --}}
      <div class="note reveal">
        <div class="note__icon" aria-hidden="true">
          <i class="fa-solid fa-school-flag"></i>
        </div>
        <div>
          <h3>A message from our school</h3>
          <p>
            At B.S.D.L.V. Inter College, we remain committed to providing
            students with an environment where learning is encouraged and
            character is built. We are grateful to our teachers, staff, parents
            and students for being part of this journey.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- ============================================================
       AT A GLANCE  (confirmed facts only)
       ============================================================ --}}
  <section class="section section--tight" aria-labelledby="glance-title">
    <div class="container">
      <h2 id="glance-title" class="bsdlv-sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);">School at a glance</h2>
      <div class="glance reveal">
        <div class="glance__item">
          <div class="glance__icon"><i class="fa-solid fa-school" aria-hidden="true"></i></div>
          <div>
            <div class="glance__k">School</div>
            <div class="glance__v">B.S.D.L.V. Inter College</div>
          </div>
        </div>
        <div class="glance__item">
          <div class="glance__icon"><i class="fa-solid fa-calendar-days" aria-hidden="true"></i></div>
          <div>
            <div class="glance__k">Established</div>
            <div class="glance__v">2016</div>
          </div>
        </div>
        <div class="glance__item">
          <div class="glance__icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></div>
          <div>
            <div class="glance__k">Location</div>
            <div class="glance__v">Madhoganj, Hardoi, Uttar Pradesh</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ============================================================
       FINAL CTA
       ============================================================ --}}
  <section class="section section--tight" aria-labelledby="cta-title">
    <div class="container">
      <div class="cta reveal">
        <h2 id="cta-title">Every Great Journey Begins with Learning</h2>
        <p>
          If you would like to know more about B.S.D.L.V. Inter College,
          our admissions process or the everyday life of our school,
          we welcome you to get in touch with us.
        </p>
        <div class="cta__actions">
          {{-- REPLACE route names with the ones used in your project if different --}}
          <a href="{{ Route::has('contact') ? route('contact') : url('/contact') }}" class="btn btn--gold">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
            Contact Us
          </a>
          {{-- "Explore Facilities" — if a facilities page/route exists, use it, else fall back to gallery --}}
          <a href="{{ Route::has('facilities') ? route('facilities') : url('/facilities') }}" class="btn btn--ghost">
            <i class="fa-solid fa-building-columns" aria-hidden="true"></i>
            Explore Facilities
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

@include('footer')
<script>
(function(){
  'use strict';

  // Respect reduced-motion and older browsers
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var root = document.documentElement;
  root.classList.remove('no-js');

  if (reduceMotion || !('IntersectionObserver' in window)) {
    // Reveal everything immediately
    document.querySelectorAll('.bsdlv-about .reveal').forEach(function(el){
      el.classList.add('is-visible');
    });
    return;
  }

  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -8% 0px'
  });

  document.querySelectorAll('.bsdlv-about .reveal').forEach(function(el){
    io.observe(el);
  });

  // Smooth scroll for in-page anchors (respects reduced motion)
  if (!reduceMotion) {
    document.querySelectorAll('.bsdlv-about a[href^="#"]').forEach(function(a){
      a.addEventListener('click', function(e){
        var id = a.getAttribute('href');
        if (id && id.length > 1) {
          var target = document.querySelector(id);
          if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            history.replaceState(null, '', id);
          }
        }
      });
    });
  }
})();
</script>
<body>  
</html> 