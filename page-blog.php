<?php
/**
 * Template Name: Blog - Magazine Design
 */

$blog_posts = get_posts(['post_status'=>'publish','posts_per_page'=>20,'orderby'=>'date','order'=>'DESC']);
$posts_data = [];
foreach ($blog_posts as $p) {
    $img  = get_the_post_thumbnail_url($p->ID,'large');
    $cats = wp_get_post_categories($p->ID,['fields'=>'names']);
    $wc   = str_word_count(strip_tags($p->post_content));
    $posts_data[] = [
        'id'       => $p->ID,
        'title'    => get_the_title($p->ID),
        'excerpt'  => wp_trim_words($p->post_excerpt ?: $p->post_content, 22),
        'date'     => get_the_date('j בF, Y',$p->ID),
        'author'   => get_the_author_meta('display_name',$p->post_author),
        'image'    => $img ?: '',
        'category' => !empty($cats) ? $cats[0] : 'כללי',
        'read_time'=> max(1,round($wc/238)).' דקות',
        'url'      => get_permalink($p->ID),
    ];
}
$cats_list = get_categories(['hide_empty'=>true]);
?><!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<style>
@font-face{font-family:'LiaEspresso';font-weight:100 900;font-style:normal;src:url('/wp-content/fonts/LiaEspressoVF.woff2') format('woff2');font-display:swap}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#0a0a0a;--bg2:#0d0d0d;--card:#111;--sage:#a3b18a;--text:#e9edc9;--muted:rgba(233,237,201,.55)}
html{scroll-behavior:smooth}
body{font-family:'LiaEspresso',sans-serif;background:var(--bg);color:var(--text);direction:rtl;font-weight:300;-webkit-font-smoothing:antialiased}
::selection{background:var(--sage);color:#000}
a{color:inherit;text-decoration:none}
button{cursor:pointer;font-family:inherit;border:none;background:none;color:inherit}
/* NAV */
#nav{position:fixed;top:0;width:100%;z-index:100;padding:1.5rem 0;transition:all .3s}
#nav.scrolled{background:rgba(10,10,10,.95);backdrop-filter:blur(12px);padding:1rem 0;box-shadow:0 1px 0 rgba(255,255,255,.04)}
.nav-inner{max-width:1400px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
.nav-brand-title{font-size:1.35rem;font-weight:700;letter-spacing:.2em;color:var(--sage);line-height:1}
.nav-brand-sub{font-size:.58rem;letter-spacing:.35em;opacity:.4;text-transform:uppercase}
.nav-links{display:flex;gap:2.5rem;align-items:center;font-weight:500;font-size:.95rem}
.nav-links a{opacity:.7;transition:opacity .2s}
.nav-links a:hover{opacity:1;color:var(--sage)}
.nav-links a.active{opacity:1;color:var(--sage)}
.nav-cta{background:var(--sage)!important;color:#000!important;opacity:1!important;padding:.55rem 1.5rem;border-radius:99px;font-weight:700;font-size:.88rem;transition:all .25s}
.nav-cta:hover{background:var(--text)!important;transform:scale(1.04)}
.hamburger{display:none;font-size:1.5rem;background:none;border:none;cursor:pointer}
.nav-mobile{display:none;flex-direction:column;gap:1.5rem;padding:2rem;background:rgba(10,10,10,.98);border-bottom:1px solid rgba(255,255,255,.05)}
.nav-mobile.open{display:flex}
/* CONTAINER */
.container{max-width:1400px;margin:0 auto;padding:0 2rem}
/* HERO */
.blog-hero{padding:11rem 0 5rem;text-align:center}
.hero-badge{display:inline-block;color:var(--sage);font-weight:700;letter-spacing:.3em;font-size:.68rem;text-transform:uppercase;margin-bottom:1.5rem}
.hero-badge::before,.hero-badge::after{content:' ✦ '}
.blog-hero h1{font-size:clamp(4rem,11vw,9.5rem);font-weight:700;line-height:.93;letter-spacing:-.02em;margin-bottom:1.5rem}
.blog-hero p{color:var(--muted);font-size:1.1rem;max-width:40ch;margin:0 auto;line-height:1.7;font-style:italic}
/* STICKY BAR */
.sticky-bar{position:sticky;top:68px;z-index:40;background:rgba(10,10,10,.88);backdrop-filter:blur(16px);border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05);padding:1.1rem 0;margin-bottom:4.5rem}
.bar-inner{display:flex;justify-content:space-between;align-items:center;gap:1.5rem;flex-wrap:wrap}
.search-box{position:relative}
.search-box input{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:99px;padding:.65rem 2.8rem .65rem 1.4rem;color:var(--text);font-family:inherit;font-size:.88rem;width:250px;outline:none;transition:border-color .2s}
.search-box input:focus{border-color:var(--sage)}
.search-box input::placeholder{opacity:.3}
.search-icon{position:absolute;right:.9rem;top:50%;transform:translateY(-50%);opacity:.3;pointer-events:none;font-size:.8rem}
.cats{display:flex;flex-wrap:wrap;gap:.45rem}
.cat-btn{padding:.4rem 1.1rem;border-radius:99px;font-size:.68rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;border:1px solid rgba(255,255,255,.1);color:rgba(233,237,201,.45);transition:all .2s}
.cat-btn:hover{color:var(--text);background:rgba(255,255,255,.05)}
.cat-btn.active{background:var(--sage);color:#000;border-color:var(--sage)}
/* FEATURED */
.featured{margin-bottom:5rem;cursor:pointer}
.featured-inner{display:grid;grid-template-columns:1fr 1fr;background:var(--card);border-radius:4rem;overflow:hidden;border:1px solid rgba(255,255,255,.05);transition:border-color .5s}
.featured:hover .featured-inner{border-color:rgba(163,177,138,.3)}
.feat-img{position:relative;height:560px;overflow:hidden}
.feat-img img{width:100%;height:100%;object-fit:cover;filter:grayscale(100%);transition:filter .8s,transform .8s}
.featured:hover .feat-img img{filter:grayscale(0%);transform:scale(1.04)}
.feat-badge{position:absolute;top:2rem;right:2rem;background:var(--sage);color:#000;padding:.35rem 1.1rem;border-radius:99px;font-size:.62rem;font-weight:900;letter-spacing:.2em;text-transform:uppercase}
.feat-body{padding:4rem 5rem;display:flex;flex-direction:column;justify-content:center;gap:1.4rem}
.feat-cat{color:var(--sage);font-size:.68rem;font-weight:700;letter-spacing:.25em;text-transform:uppercase}
.feat-title{font-size:clamp(2rem,3.5vw,3.2rem);font-weight:700;line-height:1.15;transition:color .3s}
.featured:hover .feat-title{color:var(--sage)}
.feat-excerpt{color:var(--muted);font-size:1rem;line-height:1.75;font-weight:300}
.feat-meta{display:flex;justify-content:space-between;align-items:center;padding-top:1.4rem;border-top:1px solid rgba(255,255,255,.06);margin-top:auto}
.author-row{display:flex;align-items:center;gap:.8rem}
.avatar{width:42px;height:42px;border-radius:50%;background:rgba(163,177,138,.12);display:flex;align-items:center;justify-content:center;color:var(--sage);font-weight:700;font-size:.9rem}
.author-name{font-weight:700;font-size:.88rem}
.author-date{opacity:.35;font-size:.78rem}
.read-more{color:var(--sage);font-weight:700;font-size:.88rem}
/* GRID */
.posts-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:3.5rem 2.5rem;margin-bottom:5rem}
.post-card{cursor:pointer;display:flex;flex-direction:column;gap:1.1rem}
.card-img{position:relative;aspect-ratio:4/5;overflow:hidden;border-radius:3rem}
.card-img img{height:100%;object-fit:cover;filter:grayscale(100%);transition:filter .7s,transform .7s}
.post-card:hover .card-img img{filter:grayscale(0%);transform:scale(1.07)}
.card-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.7),transparent);opacity:0;display:flex;align-items:flex-end;padding:2rem;transition:opacity .35s}
.post-card:hover .card-overlay{opacity:1}
.card-overlay-btn{background:#fff;color:#000;width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1rem}
.no-img{background:var(--card);display:flex;align-items:center;justify-content:center;font-size:4rem;opacity:.15;height:100%}
.card-body{padding:0 .4rem;display:flex;flex-direction:column;gap:.65rem}
.card-top{display:flex;justify-content:space-between;align-items:center}
.card-cat{color:var(--sage);font-size:.65rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase}
.card-time{opacity:.28;font-size:.62rem;letter-spacing:.12em;text-transform:uppercase}
.card-title{font-size:clamp(1.3rem,2.2vw,1.85rem);font-weight:700;line-height:1.25;transition:color .25s}
.post-card:hover .card-title{color:var(--sage)}
.card-excerpt{color:var(--muted);font-size:.85rem;line-height:1.7;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.card-date{opacity:.28;font-size:.75rem}
/* NO POSTS */
.no-posts{text-align:center;padding:6rem 2rem;color:var(--muted)}
.no-posts h3{font-size:2.2rem;font-weight:700;color:var(--sage);margin-bottom:1rem}
.no-posts p{font-size:1.05rem;opacity:.65;line-height:1.7}
/* AI SECTION */
.ai-sec{margin:3rem 0 5rem;background:var(--card);border-radius:4rem;border:1px solid rgba(163,177,138,.18);padding:4.5rem;display:flex;align-items:center;gap:4rem;position:relative;overflow:hidden}
.ai-glow{position:absolute;top:-40%;left:-10%;width:400px;height:400px;background:var(--sage);border-radius:50%;filter:blur(150px);opacity:.04;pointer-events:none}
.ai-text{flex:1;position:relative;z-index:1}
.ai-badge{display:inline-block;color:var(--sage);font-weight:700;letter-spacing:.25em;font-size:.68rem;text-transform:uppercase;margin-bottom:1.1rem}
.ai-title{font-size:clamp(2.2rem,3.5vw,3.2rem);font-weight:700;line-height:1.15;margin-bottom:1.1rem}
.ai-desc{color:var(--muted);font-size:1rem;line-height:1.7;font-style:italic;margin-bottom:1.8rem}
.ai-btn{background:var(--sage);color:#000;padding:.9rem 2.2rem;border-radius:99px;font-weight:700;font-size:.95rem;transition:all .25s;display:inline-block;cursor:pointer}
.ai-btn:hover{transform:scale(1.04);filter:brightness(1.08)}
.ai-cards{flex:1;display:grid;grid-template-columns:1fr 1fr;gap:1rem;position:relative;z-index:1}
.ai-card{padding:1.8rem;border-radius:1.5rem;display:flex;align-items:center;justify-content:center;text-align:center;min-height:160px}
.ai-card-a{background:rgba(0,0,0,.4);border:1px solid rgba(255,255,255,.05)}
.ai-card-b{background:rgba(163,177,138,.07);border:1px solid rgba(163,177,138,.18);transform:translateY(1.5rem)}
.ai-card p{font-style:italic;font-size:.9rem;line-height:1.6}
.ai-card-a p{color:var(--sage)}
/* AI MODAL */
#ai-modal{position:fixed;inset:0;z-index:300;background:rgba(0,0,0,.94);backdrop-filter:blur(20px);display:none;align-items:center;justify-content:center;padding:1.5rem}
#ai-modal.open{display:flex;animation:fadeIn .25s ease}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
.ai-box{background:var(--card);border-radius:3rem;padding:3.5rem;width:100%;max-width:620px;border:1px solid rgba(163,177,138,.28);position:relative;text-align:center}
.ai-close{position:absolute;top:1.4rem;left:1.4rem;width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--sage);cursor:pointer;transition:background .2s}
.ai-close:hover{background:rgba(255,255,255,.1)}
.ai-icon{width:72px;height:72px;border-radius:50%;background:rgba(163,177,138,.1);display:flex;align-items:center;justify-content:center;margin:0 auto 1.8rem;font-size:2.2rem}
.ai-modal-title{font-size:2rem;font-weight:700;margin-bottom:.7rem}
.ai-modal-desc{color:var(--muted);font-size:.95rem;margin-bottom:1.8rem}
.ai-textarea{width:100%;background:rgba(0,0,0,.5);border:1px solid rgba(255,255,255,.1);border-radius:1.4rem;padding:1.1rem 1.4rem;color:var(--text);font-family:inherit;font-size:.95rem;height:120px;resize:none;outline:none;text-align:right;direction:rtl;transition:border-color .2s;margin-bottom:1.4rem}
.ai-textarea:focus{border-color:var(--sage)}
.ai-textarea::placeholder{opacity:.3}
.ai-btns{display:grid;grid-template-columns:1fr 1fr;gap:.9rem;margin-bottom:1.3rem}
.btn-primary{background:var(--sage);color:#000;padding:.9rem;border-radius:.9rem;font-weight:700;font-size:.95rem;display:flex;align-items:center;justify-content:center;gap:.4rem;cursor:pointer;transition:all .2s}
.btn-primary:hover{filter:brightness(1.1)}
.btn-primary:disabled{opacity:.45;cursor:not-allowed}
.btn-secondary{border:1px solid rgba(163,177,138,.35);color:var(--sage);padding:.9rem;border-radius:.9rem;font-weight:700;font-size:.95rem;display:flex;align-items:center;justify-content:center;gap:.4rem;cursor:pointer;transition:all .2s}
.btn-secondary:hover{background:rgba(163,177,138,.08)}
.ai-resp{background:rgba(255,255,255,.04);border-radius:1.1rem;padding:1.4rem;text-align:right;font-size:.95rem;line-height:1.75;display:none;animation:fadeIn .3s ease}
.ai-resp.show{display:block}
/* FOOTER */
.site-footer{border-top:1px solid rgba(255,255,255,.05);padding:4rem 0;text-align:center}
.footer-brand{color:var(--sage);font-size:1.8rem;font-weight:700;letter-spacing:.2em}
.footer-sub{font-size:.6rem;letter-spacing:.4em;opacity:.28;text-transform:uppercase;margin-bottom:1.8rem}
.footer-icons{display:flex;justify-content:center;gap:2rem;margin-bottom:1.8rem;font-size:1.4rem}
.footer-icons a{opacity:.45;transition:opacity .2s}
.footer-icons a:hover{opacity:1;color:var(--sage)}
.footer-copy{font-size:.62rem;opacity:.2;letter-spacing:.3em;text-transform:uppercase}
/* FLOAT */
.float-cta{position:fixed;bottom:2.5rem;left:2.5rem;z-index:99;background:var(--sage);color:#000;width:60px;height:60px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.4rem;box-shadow:0 8px 28px rgba(163,177,138,.3);transition:transform .25s}
.float-cta:hover{transform:scale(1.1)}
/* RESPONSIVE */
@media(max-width:1024px){.posts-grid{grid-template-columns:repeat(2,1fr)}.ai-sec{flex-direction:column;padding:3rem}.ai-card-b{transform:none}}
@media(max-width:768px){.nav-links{display:none}.hamburger{display:block}.featured-inner{grid-template-columns:1fr}.feat-img{height:300px}.feat-body{padding:2.5rem}.posts-grid{grid-template-columns:1fr;gap:2.5rem}.card-img{aspect-ratio:3/2}.bar-inner{flex-direction:column;align-items:flex-start}.search-box input{width:100%}.blog-hero{padding:8.5rem 0 3rem}.ai-sec{padding:2.5rem}.ai-btns{grid-template-columns:1fr}}
</style>
</head>
<body>

<nav id="nav">
  <div class="nav-inner">
    <a href="/" style="display:block">
      <div class="nav-brand-title">NETANEL GOLAN</div>
      <div class="nav-brand-sub">Journal & Design</div>
    </a>
    <div class="nav-links">
      <a href="/">בית</a>
      <a href="/בלוג/" class="active">מגזין בלוג</a>
      <a href="/#contact">צור קשר</a>
      <a href="https://calmark.io/p/7CgMa" target="_blank" class="nav-cta">קביעת תור</a>
    </div>
    <button class="hamburger" onclick="document.getElementById('nav-mob').classList.toggle('open')">☰</button>
  </div>
  <div class="nav-mobile" id="nav-mob">
    <a href="/">בית</a>
    <a href="/בלוג/" style="color:var(--sage)">מגזין בלוג</a>
    <a href="/#contact">צור קשר</a>
    <a href="https://calmark.io/p/7CgMa" target="_blank" class="nav-cta" style="text-align:center;padding:.8rem">קביעת תור</a>
  </div>
</nav>

<header class="blog-hero">
  <div class="container">
    <div class="hero-badge">The Digital Journal</div>
    <h1>מגזין<br>היופי</h1>
    <p>המקום בו אמנות, טכניקה וסטייל נפגשים.<br>גלו את הטרנדים הכי חמים לעונה הקרובה.</p>
  </div>
</header>

<div class="sticky-bar">
  <div class="container">
    <div class="bar-inner">
      <div class="search-box">
        <span class="search-icon">🔍</span>
        <input type="text" id="s-input" placeholder="חיפוש כתבות..." oninput="filterPosts()">
      </div>
      <div class="cats" id="cats">
        <button class="cat-btn active" data-cat="הכל" onclick="setCat(this,'הכל')">הכל</button>
        <?php foreach($cats_list as $c): ?>
        <button class="cat-btn" data-cat="<?= esc_attr($c->name) ?>" onclick="setCat(this,'<?= esc_attr($c->name) ?>')"><?= esc_html($c->name) ?></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<main class="container">

<?php if(empty($posts_data)): ?>
<div class="no-posts">
  <h3>המאמרים בדרך ✦</h3>
  <p>ה-SEO Agent מייצר עכשיו תוכן מקצועי לסלון.<br>חזרו בקרוב לקרוא טיפים ומדריכי שיער.</p>
</div>
<?php else: ?>

<a href="<?= esc_url($posts_data[0]['url']) ?>" class="featured" id="feat">
  <div class="featured-inner">
    <div class="feat-img">
      <?php if($posts_data[0]['image']): ?>
      <img src="<?= esc_url($posts_data[0]['image']) ?>" alt="<?= esc_attr($posts_data[0]['title']) ?>">
      <?php else: ?>
      <div class="no-img">✂</div>
      <?php endif; ?>
      <div class="feat-badge">MUST READ</div>
    </div>
    <div class="feat-body">
      <div class="feat-cat">✦ <?= esc_html($posts_data[0]['category']) ?></div>
      <h2 class="feat-title"><?= esc_html($posts_data[0]['title']) ?></h2>
      <p class="feat-excerpt"><?= esc_html($posts_data[0]['excerpt']) ?></p>
      <div class="feat-meta">
        <div class="author-row">
          <div class="avatar"><?= mb_substr($posts_data[0]['author'],0,1) ?></div>
          <div>
            <div class="author-name"><?= esc_html($posts_data[0]['author']) ?></div>
            <div class="author-date"><?= esc_html($posts_data[0]['date']) ?></div>
          </div>
        </div>
        <span class="read-more">קראו עוד ←</span>
      </div>
    </div>
  </div>
</a>

<div class="posts-grid" id="grid">
  <?php foreach($posts_data as $post): ?>
  <a href="<?= esc_url($post['url']) ?>"
     class="post-card"
     data-cat="<?= esc_attr($post['category']) ?>"
     data-title="<?= esc_attr(mb_strtolower($post['title'])) ?>">
    <div class="card-img">
      <?php if($post['image']): ?>
      <img src="<?= esc_url($post['image']) ?>" alt="<?= esc_attr($post['title']) ?>" loading="lazy">
      <?php else: ?>
      <div class="no-img">✂</div>
      <?php endif; ?>
      <div class="card-overlay"><div class="card-overlay-btn">↖</div></div>
    </div>
    <div class="card-body">
      <div class="card-top">
        <span class="card-cat"><?= esc_html($post['category']) ?></span>
        <span class="card-time"><?= esc_html($post['read_time']) ?> קריאה</span>
      </div>
      <h3 class="card-title"><?= esc_html($post['title']) ?></h3>
      <p class="card-excerpt"><?= esc_html($post['excerpt']) ?></p>
      <div class="card-date">📅 <?= esc_html($post['date']) ?></div>
    </div>
  </a>
  <?php endforeach; ?>
</div>

<?php endif; ?>

<div class="ai-sec">
  <div class="ai-glow"></div>
  <div class="ai-text">
    <div class="ai-badge">✦ AI Stylist Assistant</div>
    <h2 class="ai-title">צריכים עזרה<br>בבחירת הסטייל?</h2>
    <p class="ai-desc">תארו לנו את המראה שאתם חולמים עליו, ונתנאל הדיגיטלי ינתח את בקשתכם ויתאים לכם את הטיפול המושלם.</p>
    <button class="ai-btn" onclick="openAI()">התייעצות חכמה</button>
  </div>
  <div class="ai-cards">
    <div class="ai-card ai-card-a"><p>"Twinlights מחמיאה מאוד לשיער כהה..."</p></div>
    <div class="ai-card ai-card-b"><p style="color:var(--text)">"המבנה הטבעי של הגבות דורש..."</p></div>
  </div>
</div>

</main>

<footer class="site-footer">
  <div class="footer-brand">NETANEL GOLAN</div>
  <div class="footer-sub">Journal & Excellence</div>
  <div class="footer-icons">
    <a href="https://instagram.com" target="_blank" aria-label="Instagram">📷</a>
    <a href="tel:0545511232" aria-label="Phone">📞</a>
    <a href="https://maps.google.com/?q=הגאולה+26+הוד+השרון" target="_blank" aria-label="Map">📍</a>
  </div>
  <div class="footer-copy">© <?= date('Y') ?> Netanel Golan Boutique</div>
</footer>

<a href="https://calmark.io/p/7CgMa" target="_blank" class="float-cta" aria-label="קביעת תור">📅</a>

<div id="ai-modal">
  <div class="ai-box">
    <button class="ai-close" onclick="closeAI()">✕</button>
    <div class="ai-icon">✨</div>
    <h3 class="ai-modal-title">התאמת סגנון חכמה</h3>
    <p class="ai-modal-desc">ספרו לנו על סוג השיער שלכם ועל המראה שאתם שואפים אליו.</p>
    <textarea id="ai-in" class="ai-textarea" placeholder="למשל: יש לי שיער שטני ורוצה מראה מואר ועדין..."></textarea>
    <div class="ai-btns">
      <button class="btn-primary" id="ai-go" onclick="askAI()">💬 ייעוץ אישי</button>
      <button class="btn-secondary" onclick="window.open('tel:0545511232')">📞 שיחה עם נתנאל</button>
    </div>
    <div class="ai-resp" id="ai-out"></div>
  </div>
</div>

<script>
window.addEventListener('scroll',()=>document.getElementById('nav').classList.toggle('scrolled',scrollY>50));

let curCat='הכל';
function setCat(btn,cat){
  curCat=cat;
  document.querySelectorAll('.cat-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  filterPosts();
}
function filterPosts(){
  const q=document.getElementById('s-input').value.toLowerCase();
  document.querySelectorAll('#grid .post-card').forEach(c=>{
    const ok=(curCat==='הכל'||c.dataset.cat===curCat)&&(!q||c.dataset.title.includes(q));
    c.style.display=ok?'':'none';
  });
  const f=document.getElementById('feat');
  if(f)f.style.display=(curCat==='הכל'||f.querySelector('.feat-cat').textContent.includes(curCat))?'':'none';
}

function openAI(){document.getElementById('ai-modal').classList.add('open');document.body.style.overflow='hidden'}
function closeAI(){document.getElementById('ai-modal').classList.remove('open');document.body.style.overflow=''}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeAI()});

async function askAI(){
  const txt=document.getElementById('ai-in').value.trim();
  if(!txt)return;
  const btn=document.getElementById('ai-go'),out=document.getElementById('ai-out');
  btn.disabled=true;btn.textContent='⏳...';out.classList.remove('show');
  try{
    const fd=new FormData();fd.append('q',txt);
    const r=await fetch('/wp-content/themes/hello-elementor-child/ai-advice.php',{method:'POST',body:fd});
    const d=await r.json();
    const t=d?.answer;
    out.textContent=t||'לייעוץ אישי - התקשרו: 054-551-1232';
  }catch{out.textContent='לייעוץ אישי מדויק - התקשרו לנתנאל: 054-551-1232 📞'}
  out.classList.add('show');
  btn.disabled=false;btn.innerHTML='💬 ייעוץ אישי';
}
</script>
<?php wp_footer(); ?>
</body>
</html>
