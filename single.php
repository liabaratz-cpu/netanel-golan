<?php get_header(); ?>
<?php
$post_id   = get_the_ID();
$img       = get_the_post_thumbnail_url($post_id,'full');
$cats      = wp_get_post_categories($post_id,['fields'=>'names']);
$cat       = !empty($cats) ? $cats[0] : 'כללי';
$author    = get_the_author_meta('display_name');
$date      = get_the_date('j בF, Y');
$wc        = str_word_count(strip_tags(get_the_content()));
$read_time = max(1,round($wc/238));
?><!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc_html(get_the_title()) ?> | נתנאל גולן</title>
<meta name="description" content="<?= esc_attr(wp_trim_words(get_the_excerpt(),25)) ?>">
<?php wp_head(); ?>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<style>
@font-face{font-family:'LiaEspresso';font-weight:100 900;font-style:normal;src:url('/wp-content/fonts/LiaEspressoVF.woff2') format('woff2');font-display:swap}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#0a0a0a;--card:#111;--sage:#a3b18a;--text:#e9edc9;--muted:rgba(233,237,201,.6)}
body{font-family:'LiaEspresso',sans-serif;background:var(--bg);color:var(--text);direction:rtl;font-weight:300;-webkit-font-smoothing:antialiased}
::selection{background:var(--sage);color:#000}
a{color:inherit;text-decoration:none}
/* NAV */
#nav{position:sticky;top:0;width:100%;z-index:100;background:rgba(10,10,10,.95);backdrop-filter:blur(12px);padding:1rem 0;border-bottom:1px solid rgba(255,255,255,.05)}
.nav-inner{max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
.nav-brand-title{font-size:1.2rem;font-weight:700;letter-spacing:.2em;color:var(--sage)}
.nav-brand-sub{font-size:.55rem;letter-spacing:.35em;opacity:.35;text-transform:uppercase}
.nav-back{display:flex;align-items:center;gap:.5rem;color:var(--sage);font-weight:700;font-size:.9rem;transition:opacity .2s}
.nav-back:hover{opacity:.7}
.nav-actions{display:flex;gap:.6rem}
.nav-action{width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:.85rem;cursor:pointer;transition:background .2s;border:none;color:var(--text)}
.nav-action:hover{background:rgba(255,255,255,.1)}
/* HERO */
.post-hero{position:relative;height:65vh;overflow:hidden;margin-bottom:4rem}
.post-hero img{width:100%;height:100%;object-fit:cover;filter:grayscale(60%) brightness(0.5)}
.hero-fade{position:absolute;inset:0;background:linear-gradient(to top,var(--bg) 0%,rgba(0,0,0,.5) 50%,rgba(0,0,0,.3) 100%)}
.hero-content{position:absolute;bottom:3rem;left:0;right:0;max-width:900px;margin:0 auto;padding:0 2rem}
.post-title{text-shadow:0 2px 20px rgba(0,0,0,.8)}
.cat-badge{background:var(--sage);color:#000;display:inline-block;padding:.32rem 1.1rem;border-radius:99px;font-size:.62rem;font-weight:900;letter-spacing:.2em;text-transform:uppercase;margin-bottom:1.1rem}
.post-title{font-size:clamp(2.2rem,6vw,5.5rem);font-weight:700;line-height:1.05;letter-spacing:-.02em}
/* BODY */
.post-body{max-width:780px;margin:0 auto;padding:0 2rem 6rem}
.author-bar{display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,255,255,.07);padding-bottom:2.5rem;margin-bottom:3rem}
.author-info{display:flex;align-items:center;gap:1rem}
.avatar{width:56px;height:56px;border-radius:50%;background:var(--sage);display:flex;align-items:center;justify-content:center;color:#000;font-weight:700;font-size:1.3rem}
.author-name{font-size:1.3rem;font-weight:700}
.author-meta{opacity:.35;font-size:.85rem}
.post-content{font-size:1.15rem;line-height:1.95;color:rgba(233,237,201,.85);font-weight:300}
.post-content h1,.post-content h2{font-weight:700;color:var(--text);margin:2.5rem 0 1rem;line-height:1.25}
.post-content h2{font-size:1.8rem}
.post-content h3{font-size:1.4rem;font-weight:700;color:var(--text);margin:2rem 0 .8rem}
.post-content p{margin-bottom:1.5rem}
.post-content ul,.post-content ol{margin:1rem 0 1.5rem 1.5rem}
.post-content li{margin-bottom:.5rem}
.post-content img{width:100%;border-radius:2rem;margin:2.5rem 0;filter:grayscale(25%);opacity:.85}
.post-content strong{font-weight:700;color:var(--text)}
.post-content a{color:var(--sage);border-bottom:1px solid rgba(163,177,138,.3)}
.post-content blockquote{border-right:3px solid var(--sage);padding:.5rem 1.5rem;margin:2rem 0;color:var(--muted);font-style:italic;font-size:1.2rem}
/* OVERRIDE SEO AGENT INLINE STYLES */
.post-content *{color:inherit !important;background-color:transparent !important}
.post-content p,.post-content li,.post-content span{color:rgba(233,237,201,.85) !important;line-height:1.9 !important}
.post-content h1,.post-content h2{color:var(--text) !important;font-size:1.8rem !important;font-weight:700 !important;margin:2.5rem 0 1rem !important;border-bottom:none !important;background:none !important}
.post-content h3,.post-content h4{color:var(--text) !important;font-weight:700 !important;margin:2rem 0 .8rem !important;background:none !important}
.post-content [style*="background"]{background:rgba(163,177,138,.1) !important;border-color:var(--sage) !important;border-radius:1rem !important}
.post-content a{color:var(--sage) !important}
.post-content td,.post-content th{border:1px solid rgba(255,255,255,.1) !important;padding:.5rem 1rem !important;color:var(--text) !important}

/* CTA BOX */
.post-cta{margin-top:4rem;background:var(--sage);border-radius:3.5rem;padding:3.5rem;text-align:center;color:#000}
.post-cta h3{font-size:2.2rem;font-weight:700;margin-bottom:.8rem}
.post-cta p{font-size:1rem;opacity:.75;margin-bottom:1.8rem}
.cta-btn{background:#000;color:#fff;padding:.9rem 2.2rem;border-radius:99px;font-weight:700;font-size:.95rem;display:inline-block;transition:all .25s}
.cta-btn:hover{background:#222;transform:scale(1.03)}
/* BACK TO BLOG */
.back-section{text-align:center;margin-top:3rem}
.back-btn{display:inline-flex;align-items:center;gap:.6rem;border:1px solid rgba(255,255,255,.1);padding:.8rem 2rem;border-radius:99px;font-size:.88rem;font-weight:600;transition:all .25s;color:var(--muted)}
.back-btn:hover{border-color:var(--sage);color:var(--sage)}
/* FLOAT */
.float-cta{position:fixed;bottom:2.5rem;left:2.5rem;z-index:99;background:var(--sage);color:#000;width:58px;height:58px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;box-shadow:0 6px 24px rgba(163,177,138,.28);transition:transform .25s}
.float-cta:hover{transform:scale(1.1)}
@media(max-width:768px){.post-hero{height:55vh}.post-title{font-size:1.8rem}.post-body{padding:0 1.5rem 4rem}.author-bar{flex-direction:column;align-items:flex-start;gap:1rem}}
</style>
</head>
<body>

<?php include __DIR__.'/inc-nav.php'; ?>

<?php if($img): ?>
<div class="post-hero">
  <img src="<?= esc_url($img) ?>" alt="<?= esc_attr(get_the_title()) ?>">
  <div class="hero-fade"></div>
  <div class="hero-content">
    <div class="cat-badge"><?= esc_html($cat) ?></div>
    <h1 class="post-title"><?= esc_html(get_the_title()) ?></h1>
  </div>
</div>
<?php else: ?>
<div style="height:5rem"></div>
<div class="post-body" style="padding-bottom:0">
  <div class="cat-badge" style="margin-bottom:1rem"><?= esc_html($cat) ?></div>
  <h1 class="post-title" style="margin-bottom:3rem"><?= esc_html(get_the_title()) ?></h1>
</div>
<?php endif; ?>

<div class="post-body">
  <div class="author-bar">
    <div class="author-info">
      <div class="avatar"><?= mb_substr($author,0,1) ?></div>
      <div>
        <div class="author-name"><?= esc_html($author) ?></div>
        <div class="author-meta"><?= esc_html($date) ?> &middot; <?= $read_time ?> דקות קריאה</div>
      </div>
    </div>
  </div>

  <div class="post-content">
    <?php the_content(); ?>
  </div>

  <div class="post-cta">
    <h3>אהבתם את הכתבה?</h3>
    <p>קבעו פגישת ייעוץ והפכו את ההשראה למציאות.</p>
    <a href="https://calmark.io/p/7CgMa" target="_blank" class="cta-btn">להזמנת תור בסטודיו</a>
  </div>

  <div class="back-section">
    <a href="/בלוג/" class="back-btn">← חזרה למגזין היופי</a>
  </div>
</div>

<a href="https://calmark.io/p/7CgMa" target="_blank" class="float-cta" aria-label="קביעת תור">📅</a>

<?php wp_footer(); ?>
</body>
</html>
