<?php
/**
 * Template Name: Home - Full Design
 */
?><!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
    <meta charset="UTF-8">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XG7BEGZLYM"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag("js", new Date());
      gtag("config", "G-XG7BEGZLYM");
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": ["HairSalon", "LocalBusiness"],
      "@id": "https://netanelgolan.com/#hairsalon",
      "name": "נתנאל גולן - עיצוב שיער וגבות",
      "description": "סלון שיער ויופי בהוד השרון עם 25 שנות ניסיון. התמחות בהחלקות שיער וקראטין, עיצוב גבות, מיקרובליידינג, תספורות ועוד.",
      "inLanguage": "he",
      "url": "https://netanelgolan.com",
      "telephone": "+972-54-551-1232",
      "image": "https://netanelgolan.com/wp-content/uploads/hero-main.jpg",
      "logo": {
        "@type": "ImageObject",
        "url": "https://netanelgolan.com/wp-content/uploads/logo.png"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "הגאולה 26",
        "addressLocality": "הוד השרון",
        "postalCode": "4524000",
        "addressRegion": "המרכז",
        "addressCountry": "IL"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "32.1490",
        "longitude": "34.8890"
      },
      "hasMap": "https://maps.google.com/?q=הגאולה+26+הוד+השרון",
      "openingHoursSpecification": [
        {"@type":"OpeningHoursSpecification","dayOfWeek":["Sunday","Monday","Tuesday","Wednesday","Thursday"],"opens":"09:00","closes":"20:00"},
        {"@type":"OpeningHoursSpecification","dayOfWeek":"Friday","opens":"09:00","closes":"15:00"}
      ],
      "priceRange": "₪₪",
      "areaServed": [
        {"@type":"City","name":"הוד השרון"},
        {"@type":"City","name":"רעננה"},
        {"@type":"City","name":"כפר סבא"},
        {"@type":"City","name":"רמת השרון"},
        {"@type":"City","name":"הרצליה"}
      ],
      "currenciesAccepted": "ILS",
      "paymentAccepted": "Cash, Credit Card",
      "sameAs": [
        "https://calmark.io/p/7CgMa",
        "https://g.page/r/CaObH7hLlWPrEBM"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "שירותי הסלון",
        "itemListElement": [
          {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "החלקת שיער / קראטין", "description": "טיפול החלקה מקצועי לכל סוגי השיער", "areaServed": "הוד השרון"}, "priceSpecification": {"@type": "PriceSpecification", "priceCurrency": "ILS", "minPrice": "500"}},
          {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "עיצוב גבות ומיקרובליידינג", "areaServed": "הוד השרון"}, "priceSpecification": {"@type": "PriceSpecification", "priceCurrency": "ILS", "minPrice": "60"}},
          {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "צבע וגוונים לשיער", "areaServed": "הוד השרון"}, "priceSpecification": {"@type": "PriceSpecification", "priceCurrency": "ILS", "minPrice": "250"}},
          {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "תספורת לגברים ונשים", "areaServed": "הוד השרון"}, "priceSpecification": {"@type": "PriceSpecification", "priceCurrency": "ILS", "minPrice": "80"}},
          {"@type": "Offer", "itemOffered": {"@type": "Service", "name": "תסרוקות ערב וכלה", "areaServed": "הוד השרון"}, "priceSpecification": {"@type": "PriceSpecification", "priceCurrency": "ILS", "minPrice": "350"}}
        ]
      },
      "founder": {
        "@type": "Person",
        "name": "נתנאל גולן",
        "jobTitle": "מעצב שיער ובעל הסלון",
        "worksFor": {"@id": "https://netanelgolan.com/#hairsalon"}
      }
    }
    </script>
    <?php wp_head(); ?>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <style>
        @font-face {
            font-family: 'LiaEspresso';
            font-weight: 100 900;
            font-style: normal;
            src: url('/wp-content/fonts/LiaEspressoVF.woff2') format('woff2');
            font-display: swap;
        }
    </style>
    <style>
        :root {
            --bg:       #0a0a0a;
            --bg2:      #0d0d0d;
            --card:     #141414;
            --sage:     #a3b18a;
            --sage-d:   #8ba888;
            --text:     #e9edc9;
            --text-m:   rgba(233,237,201,0.65);
            --text-d:   rgba(233,237,201,0.38);
            --border:   rgba(255,255,255,0.06);
            --border-s: rgba(163,177,138,0.22);
            --r-sm: 12px;
            --r-md: 20px;
            --r-lg: 28px;
            --r-xl: 44px;
            --r-pill: 999px;
        }

        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'LiaEspresso', sans-serif;
            direction: rtl;
            overflow-x: hidden;
            line-height: 1.6;
        }

        a { text-decoration: none; color: inherit; }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }



        /* HERO */
        .hero {
            height: 100vh;
            min-height: 700px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hero-bg { position: absolute; inset: 0; }
        .hero-bg img {
            width: 100%; height: 100%;
            object-fit: cover;
            filter: grayscale(30%) brightness(0.32) saturate(0.7);
        }
        .hero-bg-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, rgba(10,10,10,0.25) 0%, rgba(10,10,10,0.15) 40%, rgba(10,10,10,1) 100%);
        }
        .hero-content {
            position: relative; z-index: 1;
            text-align: center; padding: 0 24px; max-width: 820px;
        }
        .hero-badge {
            display: inline-block;
            border: 1px solid rgba(163,177,138,0.45);
            border-radius: var(--r-pill);
            padding: 6px 22px;
            font-size: 10px; letter-spacing: 0.35em;
            color: var(--sage); text-transform: uppercase;
            margin-bottom: 32px;
            opacity: 0; animation: fadeUp 1s ease forwards 0.3s;
        }
        .hero-title {
            font-family: 'LiaEspresso', sans-serif;
            font-size: clamp(52px, 7.5vw, 96px);
            font-weight: 400; line-height: 1.08;
            margin-bottom: 24px;
            opacity: 0; animation: fadeUp 1s ease forwards 0.6s;
        }
        .hero-title .accent { color: var(--sage); font-style: italic; }
        .hero-sub {
            font-size: 18px; font-weight: 300; color: var(--text-m);
            max-width: 520px; margin: 0 auto 52px; line-height: 1.85;
            opacity: 0; animation: fadeUp 1s ease forwards 0.9s;
        }
        .hero-btns {
            display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;
            opacity: 0; animation: fadeUp 1s ease forwards 1.15s;
        }
        .btn-fill {
            display: inline-block; background: var(--sage); color: #0a0a0a;
            padding: 16px 48px; border-radius: var(--r-pill);
            font-weight: 700; font-size: 15px; transition: all 0.3s;
            box-shadow: 0 8px 32px rgba(163,177,138,0.22);
        }
        .btn-fill:hover { background: white; transform: scale(1.04); }
        .btn-outline {
            display: inline-block; border: 1px solid rgba(255,255,255,0.2);
            color: var(--text); padding: 16px 48px; border-radius: var(--r-pill);
            font-weight: 500; font-size: 15px; transition: all 0.3s;
        }
        .btn-outline:hover { border-color: var(--sage); color: var(--sage); }
        .hero-scroll-ind {
            position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%);
            display: flex; flex-direction: column; align-items: center;
            opacity: 0; animation: fadeIn 1s ease forwards 2s;
        }
        .scroll-line {
            width: 1px; height: 56px;
            background: linear-gradient(to bottom, var(--sage), transparent);
            animation: scrollPulse 2.5s ease infinite;
        }

        /* SECTIONS */
        .section { padding: 120px 0; }
        .section-dark { background: var(--bg2); }
        .section-tag {
            display: block; font-size: 10px; letter-spacing: 0.38em;
            text-transform: uppercase; color: var(--sage); font-weight: 400; margin-bottom: 14px;
        }
        .section-h2 {
            font-family: 'LiaEspresso', sans-serif;
            font-size: clamp(34px, 4vw, 54px); font-weight: 700; color: var(--sage);
        }
        .section-divider {
            width: 56px; height: 3px; background: var(--sage);
            border-radius: 2px; margin: 20px 0 28px;
        }

        /* ABOUT */
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 88px; align-items: center; }
        .about-img-wrap { position: relative; }
        .about-img-wrap::after {
            content: ''; position: absolute; top: -14px; right: -14px;
            width: 100%; height: 100%;
            border: 2px solid var(--sage); border-radius: var(--r-lg); z-index: 0;
        }
        .about-img-wrap img {
            position: relative; z-index: 1; width: 100%;
            aspect-ratio: 4/5; object-fit: cover;
            border-radius: var(--r-lg); filter: grayscale(20%); transition: filter 0.7s ease;
        }
        .about-img-wrap:hover img { filter: grayscale(0%); }
        .about-text p { font-size: 16px; font-weight: 300; color: var(--text-m); line-height: 2; margin-bottom: 18px; }
        .about-perks { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-top: 28px; }
        .perk { display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 500; }
        .perk-dot { width: 8px; height: 8px; background: var(--sage); border-radius: 50%; flex-shrink: 0; }

        /* SERVICES */
        .services-top { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px; }
        .services-top p { font-size: 15px; font-style: italic; color: var(--text-m); max-width: 320px; }
        .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .service-card {
            background: var(--card); border: 1px solid var(--border);
            border-radius: var(--r-lg); padding: 36px 28px;
            transition: all 0.45s ease; cursor: pointer;
        }
        .service-card:hover {
            border-color: rgba(163,177,138,0.3);
            transform: translateY(-8px); box-shadow: 0 24px 48px rgba(0,0,0,0.4);
        }
        .s-cat {
            display: inline-block; background: rgba(163,177,138,0.1); color: var(--sage);
            font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase;
            padding: 4px 14px; border-radius: var(--r-pill); margin-bottom: 20px;
        }
        .s-row { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; margin-bottom: 8px; }
        .s-title { font-family: 'LiaEspresso', sans-serif; font-size: 22px; font-weight: 700; transition: color 0.3s; line-height: 1.2; }
        .service-card:hover .s-title { color: var(--sage); }
        .s-price { font-family: 'LiaEspresso', sans-serif; font-size: 19px; font-weight: 700; color: var(--sage); white-space: nowrap; }
        .s-bar { width: 44px; height: 1px; background: var(--border); margin: 20px 0; transition: width 0.6s ease; }
        .service-card:hover .s-bar { width: 100%; background: rgba(163,177,138,0.28); }
        .s-more { font-size: 13px; color: var(--text-d); transition: color 0.3s; }
        .service-card:hover .s-more { color: var(--sage); }

        /* GALLERY */
        .gallery-top { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
        .gallery-ig { display: flex; align-items: center; gap: 8px; color: var(--sage); font-size: 13px; font-weight: 500; transition: opacity 0.3s; }
        .gallery-ig:hover { opacity: 0.7; }
        .gallery-ig svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; }
        .gallery-grid {
            display: grid; grid-template-columns: repeat(4, 1fr);
            grid-template-rows: 280px 280px; gap: 12px;
        }
        .g-item:nth-child(1) { grid-column: span 2; }
        .g-item:nth-child(4) { grid-column: span 2; }
        .g-item { position: relative; overflow: hidden; border-radius: var(--r-md); }
        .g-item img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: all 0.7s ease; }
        .g-item:hover img { filter: grayscale(0%); transform: scale(1.08); }
        .g-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 60%);
            display: flex; align-items: flex-end; padding: 20px;
            opacity: 0; transition: opacity 0.4s;
        }
        .g-item:hover .g-overlay { opacity: 1; }
        .g-overlay p { color: white; font-size: 14px; font-weight: 500; }
        .g-item video { width: 100%; height: 100%; object-fit: cover; filter: grayscale(30%); transition: filter 0.7s ease; }
        .g-item:hover video { filter: grayscale(0%); }
        .g-play { position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 52px; height: 52px; background: rgba(163,177,138,0.85); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: opacity 0.4s; pointer-events: none; }
        .g-item:hover .g-play { opacity: 0; }
        .g-play svg { width: 22px; height: 22px; fill: #0a0a0a; margin-right: -2px; }

        /* BEFORE/AFTER */
        .ba-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 52px; }
        .ba-card { position: relative; overflow: hidden; border-radius: var(--r-lg); }
        .ba-card img { width: 100%; aspect-ratio: 3/4; object-fit: cover; display: block; transition: transform 0.7s ease; }
        .ba-card:hover img { transform: scale(1.04); }
        .ba-footer {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 28px 24px;
            background: linear-gradient(to top, rgba(0,0,0,0.88) 0%, transparent 100%);
        }
        .ba-tags { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .ba-tag { padding: 4px 14px; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; border-radius: var(--r-pill); font-weight: 400; }
        .ba-before { background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); color: rgba(233,237,201,0.8); }
        .ba-arrow { color: var(--sage); font-size: 16px; }
        .ba-after { background: rgba(163,177,138,0.25); border: 1px solid rgba(163,177,138,0.4); color: var(--sage); }
        .ba-title { font-family: 'LiaEspresso', sans-serif; font-size: 20px; font-weight: 700; color: white; font-style: italic; }
        .ba-sub { font-size: 11px; letter-spacing: 0.18em; color: var(--sage); text-transform: uppercase; margin-top: 4px; }

        /* CONTACT */
        .contact-wrap {
            background: var(--card); border-radius: var(--r-xl); padding: 80px;
            position: relative; overflow: hidden;
        }
        .contact-wrap::before {
            content: ''; position: absolute; top: -80px; right: -80px;
            width: 360px; height: 360px; background: var(--sage);
            opacity: 0.05; filter: blur(100px); border-radius: 50%;
        }
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; position: relative; z-index: 1; }
        .contact-info h2 { font-family: 'LiaEspresso', sans-serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
        .contact-info > p { font-size: 15px; color: var(--text-m); margin-bottom: 48px; line-height: 1.8; }
        .c-items { display: flex; flex-direction: column; gap: 28px; }
        .c-item { display: flex; align-items: flex-start; gap: 20px; }
        .c-icon { width: 52px; height: 52px; background: var(--sage); color: #0a0a0a; border-radius: var(--r-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .c-icon svg { width: 24px; height: 24px; fill: none; stroke: currentColor; stroke-width: 2; }
        .c-item h4 { font-family: 'LiaEspresso', sans-serif; font-size: 18px; font-weight: 700; font-style: italic; margin-bottom: 4px; }
        .c-item p { font-size: 14px; color: var(--text-m); line-height: 1.75; }

        /* FOOTER */
        footer { padding: 48px 0; border-top: 1px solid var(--border); }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px; }
        .footer-brand span:first-child { display: block; font-size: 18px; font-weight: 700; letter-spacing: 0.2em; color: var(--sage); }
        .footer-brand span:last-child { font-size: 9px; letter-spacing: 0.3em; opacity: 0.5; text-transform: uppercase; }
        .footer-socials { display: flex; gap: 10px; }
        .f-social { width: 44px; height: 44px; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--text); transition: all 0.3s; }
        .f-social:hover { background: var(--sage); color: #0a0a0a; }
        .f-social svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; }
        .footer-copy { font-size: 12px; color: var(--text-d); }

        /* FLOAT BUTTON */
        .float-call {
            position: fixed; bottom: 24px; left: 24px;
            width: 56px; height: 56px; background: var(--sage); color: #0a0a0a;
            border-radius: 50%; display: none; align-items: center; justify-content: center;
            box-shadow: 0 8px 24px rgba(163,177,138,0.35); z-index: 200;
        }
        .float-call svg { width: 22px; height: 22px; }

        /* REVEAL */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.8s ease, transform 0.8s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .d1 { transition-delay: 0.08s; } .d2 { transition-delay: 0.18s; } .d3 { transition-delay: 0.28s; }
        .d4 { transition-delay: 0.38s; } .d5 { transition-delay: 0.48s; } .d6 { transition-delay: 0.58s; }

        /* ANIMATIONS */
        @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes scrollPulse { 0%,100% { opacity:0.35; transform:scaleY(1); } 50% { opacity:1; transform:scaleY(1.1); } }
        @keyframes pulseRing { 0%,100% { box-shadow: 0 0 0 0 rgba(163,177,138,0.4); } 50% { box-shadow: 0 0 0 12px rgba(163,177,138,0); } }

        /* MOBILE */
        @media (max-width: 900px) {
            .container { padding: 0 24px; }
            .container { padding: 0 24px; }
            .section { padding: 80px 0; }
            .about-grid { grid-template-columns: 1fr; gap: 48px; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .gallery-grid { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
            .g-item:nth-child(1), .g-item:nth-child(4) { grid-column: span 1; }
            .g-item { height: 220px; }
            .ba-grid { grid-template-columns: 1fr; }
            .contact-wrap { padding: 40px 24px; border-radius: 28px; }
            .contact-grid { grid-template-columns: 1fr; gap: 32px; }
            .contact-grid > div:last-child { text-align: center; padding: 40px 24px !important; }
            .float-call { display: flex; animation: pulseRing 2.5s ease infinite; }
        }
        @media (max-width: 480px) {
            .services-grid { grid-template-columns: 1fr; }
            .hero-title { font-size: 42px; }
        }
    </style>
</head>
<body>

<?php include __DIR__.'/inc-nav.php'; ?>

<!-- HERO -->
<section class="hero">
    <div class="hero-bg">
        <img src="/wp-content/uploads/hero-main.jpg" alt="נתנאל גולן - עיצוב שיער מקצועי בסלון בהוד השרון">
        <div class="hero-bg-overlay"></div>
    </div>
    <div class="hero-content">
        <span class="hero-badge">סלון שיער ועיצוב גבות · הוד השרון</span>
        <h1 class="hero-title">
            סלון שיער <span class="accent">הוד השרון</span>
        </h1>
        <p class="hero-sub">נתנאל גולן - 25 שנות ניסיון בעיצוב שיער וגבות ברחוב הגאולה 26, הוד השרון.</p>
        <div class="hero-btns">
            <a href="https://calmark.io/p/7CgMa" target="_blank" class="btn-fill">הזמנת תור עכשיו</a>
            <a href="#services" class="btn-outline">לצפייה בשירותים</a>
        </div>
    </div>
    <div class="hero-scroll-ind">
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ABOUT -->
<section class="section section-dark" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-img-wrap reveal">
                <img src="/wp-content/uploads/20250803_171721.jpg" alt="נתנאל גולן - עבודת שיער">
            </div>
            <div class="about-text reveal d2">
                <span class="section-tag">אודות</span>
                <h2 class="section-h2">25 שנה של אמנות</h2>
                <div class="section-divider"></div>
                <p>נתנאל גולן הוא שם שכולם בשכונה מכירים. כבר 25 שנה, מפה לאוזן, לקוחות חוזרים דור אחר דור - כי פשוט אין כמוהו.</p>
                <p>הסלון הפך לנקודת ציון שכונתית - מקום שבו כל אחד מקבל יחס אישי, עצה כנה, ותוצאה שמדברת בעד עצמה. לא צריך פרסום כשהעבודה מפרסמת את עצמה.</p>
                <div class="about-perks">
                    <div class="perk"><span class="perk-dot"></span>25 שנות ניסיון</div>
                    <div class="perk"><span class="perk-dot"></span>סלון שכונתי אהוב</div>
                    <div class="perk"><span class="perk-dot"></span>המלצות מפה לאוזן</div>
                    <div class="perk"><span class="perk-dot"></span>לקוחות לכל החיים</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="section" id="services">
    <div class="container">
        <div class="services-top reveal">
            <div>
                <span class="section-tag">מה אנחנו עושים</span>
                <h2 class="section-h2">השירותים שלנו</h2>
            </div>
            <p>איכות ללא פשרות,<br>מהמספריים ועד הפינצטה.</p>
        </div>
        <div class="services-grid">
            <div class="service-card reveal d1">
                <span class="s-cat">שיער - התמחות</span>
                <div class="s-row"><h3 class="s-title">החלקה / קראטין</h3><span class="s-price">&#x20AA;500+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d2">
                <span class="s-cat">שיער</span>
                <div class="s-row"><h3 class="s-title">תספורת גברים</h3><span class="s-price">&#x20AA;80&#x2013;&#x20AA;120</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d3">
                <span class="s-cat">שיער</span>
                <div class="s-row"><h3 class="s-title">צבע וגוונים</h3><span class="s-price">&#x20AA;250+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d1">
                <span class="s-cat">שיער</span>
                <div class="s-row"><h3 class="s-title">תסרוקות ערב / כלה</h3><span class="s-price">&#x20AA;350+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d2">
                <span class="s-cat">גבות</span>
                <div class="s-row"><h3 class="s-title">עיצוב גבות</h3><span class="s-price">&#x20AA;60&#x2013;&#x20AA;100</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d3">
                <span class="s-cat">גבות</span>
                <div class="s-row"><h3 class="s-title">מיקרובליידינג</h3><span class="s-price">&#x20AA;800+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d1">
                <span class="s-cat">תספורות</span>
                <div class="s-row"><h3 class="s-title">תספורת נשים וילדים</h3><span class="s-price">&#x20AA;60+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d2">
                <span class="s-cat">ציפורניים</span>
                <div class="s-row"><h3 class="s-title">לק ג&#x05F3;ל</h3><span class="s-price">&#x20AA;80+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
            <div class="service-card reveal d3">
                <span class="s-cat">ציפורניים</span>
                <div class="s-row"><h3 class="s-title">פדיקור</h3><span class="s-price">&#x20AA;100+</span></div>
                <div class="s-bar"></div>
                <a href="https://calmark.io/p/7CgMa" target="_blank" class="s-more">לתיאום שירות &#x2190;</a>
            </div>
        </div>
    </div>
</section>

<!-- BEFORE/AFTER -->
<section class="section section-dark">
    <div class="container">
        <div class="reveal">
            <span class="section-tag">התוצאות מדברות</span>
            <h2 class="section-h2">לפני ואחרי</h2>
        </div>
        <div class="ba-grid">
            <div class="ba-card reveal d1">
                <img src="/wp-content/uploads/20250716_205401.jpg" alt="גבות לפני ואחרי">
                <div class="ba-footer">
                    <div class="ba-tags">
                        <span class="ba-tag ba-before">לפני</span>
                        <span class="ba-arrow">&#x2192;</span>
                        <span class="ba-tag ba-after">אחרי</span>
                    </div>
                    <div class="ba-title">עיצוב גבות מיקרובליידינג</div>
                    <div class="ba-sub">Microblading · Natural Brow Design</div>
                </div>
            </div>
            <div class="ba-card reveal d2">
                <img src="/wp-content/uploads/20260208_162202.jpg" alt="שיער לפני ואחרי">
                <div class="ba-footer">
                    <div class="ba-tags">
                        <span class="ba-tag ba-before">לפני</span>
                        <span class="ba-arrow">&#x2192;</span>
                        <span class="ba-tag ba-after">אחרי</span>
                    </div>
                    <div class="ba-title">החלקת שיער מקצועית</div>
                    <div class="ba-sub">Hair Straightening · Keratin Treatment</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="section" id="gallery">
    <div class="container">
        <div class="gallery-top reveal">
            <div>
                <span class="section-tag">עבודות נבחרות</span>
                <h2 class="section-h2">גלריה</h2>
            </div>
            <a href="#" class="gallery-ig">
                <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                צפו באינסטגרם שלנו
            </a>
        </div>
        <div class="gallery-grid">
            <?php
            $delays = ['d1','d2','d3','d4','d1','d2','d3','d4'];
            $gallery_items = new WP_Query([
                'post_type'      => 'gallery_item',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ]);
            if ($gallery_items->have_posts()):
                $i = 0;
                while ($gallery_items->have_posts()): $gallery_items->the_post();
                    $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                    $img_url   = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$video_url && !$img_url) { $i++; continue; }
                    $caption = get_the_title();
                    $delay   = $delays[$i % count($delays)];
                    $i++;
            ?>
            <div class="g-item reveal <?php echo $delay; ?>">
                <?php if ($video_url): ?>
                <video autoplay muted loop playsinline>
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                </video>
                <div class="g-play"><svg viewBox="0 0 24 24"><polygon points="6,4 20,12 6,20"/></svg></div>
                <?php else: ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($caption); ?>">
                <?php endif; ?>
                <div class="g-overlay"><p><?php echo esc_html($caption); ?></p></div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else:
            ?>
            <div class="g-item reveal d1">
                <img src="/wp-content/uploads/20250701_172615.jpg" alt="תספורת">
                <div class="g-overlay"><p>תספורת</p></div>
            </div>
            <div class="g-item reveal d2">
                <img src="/wp-content/uploads/20260205_120223.jpg" alt="צביעה">
                <div class="g-overlay"><p>צביעה</p></div>
            </div>
            <div class="g-item reveal d3">
                <img src="/wp-content/uploads/20250716_205401.jpg" alt="גבות">
                <div class="g-overlay"><p>מיקרובליידינג</p></div>
            </div>
            <div class="g-item reveal d4">
                <img src="/wp-content/uploads/20251106_195852.jpg" alt="שיער">
                <div class="g-overlay"><p>טיפול שיער</p></div>
            </div>
            <div class="g-item reveal d1">
                <img src="/wp-content/uploads/20260208_162202.jpg" alt="לפני ואחרי">
                <div class="g-overlay"><p>לפני ואחרי</p></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="section section-dark" id="contact">
    <div class="container">
        <div class="contact-wrap reveal">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>צרו קשר</h2>
                    <p>אנחנו מחכים לכם לחוויית טיפוח שעוד לא הכרתם.</p>
                    <div class="c-items">
                        <div class="c-item">
                            <div class="c-icon">
                                <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <h4>כתובתנו</h4>
                                <p>הגאולה 26, הוד השרון</p>
                            </div>
                        </div>
                        <div class="c-item">
                            <div class="c-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                            </div>
                            <div>
                                <h4>טלפון</h4>
                                <p dir="ltr"><a href="tel:0545511232" style="color:var(--sage)">054-551-1232</a></p>
                            </div>
                        </div>
                        <div class="c-item">
                            <div class="c-icon">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <h4>שעות פעילות</h4>
                                <p>א&#x2019;-ה&#x2019;: 10:00 - 20:00<br>ו&#x2019;: 09:00 - 15:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;background:rgba(0,0,0,0.3);border:1px solid rgba(163,177,138,0.22);border-radius:28px;padding:60px 40px;text-align:center;gap:32px;">
                    <div>
                        <p style="font-size:13px;letter-spacing:0.3em;text-transform:uppercase;color:#a3b18a;margin-bottom:16px;">BOOK NOW</p>
                        <h3 style="font-size:32px;font-weight:700;margin-bottom:12px;">קביעת תור אונליין</h3>
                        <p style="color:rgba(233,237,201,0.65);font-size:15px;line-height:1.8;">לחצו על הכפתור לקביעת תור<br>בקלות ובמהירות</p>
                    </div>
                    <a href="https://calmark.io/p/7CgMa" target="_blank"
                       style="background:#a3b18a;color:#0a0a0a;padding:18px 56px;border-radius:999px;font-size:17px;font-weight:700;display:inline-block;box-shadow:0 8px 32px rgba(163,177,138,0.25);">
                        לקביעת תור &#x2190;
                    </a>
                    <p style="font-size:12px;color:rgba(233,237,201,0.38);">או התקשרו: <a href="tel:0545511232" style="color:#a3b18a;">054-551-1232</a></p>
                </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="footer-brand">
                <span>NETANEL GOLAN</span>
                <span>Hair &amp; Eyebrow Design</span>
            </div>
            <div class="footer-socials">
                <a href="https://wa.me/9720545511232" target="_blank" class="f-social" title="WhatsApp">
                    <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.123 1.523 5.857L.057 24l6.305-1.654A11.882 11.882 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.372l-.359-.213-3.723.977.994-3.63-.234-.372A9.818 9.818 0 112 12a9.818 9.818 0 0110 9.818z" fill="currentColor" stroke="none"/></svg>
                </a>
                <a href="tel:0545511232" class="f-social" title="Phone">
                    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                </a>
            </div>
            <p class="footer-copy">&#169; 2026 netanelgolan.com &middot; כל הזכויות שמורות</p>
        </div>
    </div>
</footer>

<!-- Float call (mobile) -->
<a href="tel:0545511232" class="float-call">
    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
</a>

<script>
    const nav = document.getElementById('nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
<?php wp_footer(); ?>
</body>
</html>
