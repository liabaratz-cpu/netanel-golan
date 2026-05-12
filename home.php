<?php
/**
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
<title>מגזין היופי | נתנאל גולן</title>
<meta name="description" content="מגזין שיער ויופי של נתנאל גולן - טיפים, טרנדים ומדריכי עיצוב שיער וגבות מקצועי.">
<?php wp_head(); ?>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<style>
@font-face{font-family:'LiaEspresso';font-weight:100 900;font-style:normal;src:url('/wp-content/fonts/LiaEspressoVF.woff2') format('woff2');font-display:swap}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#0a0a0a;--bg2:#0d0d0d;--card:#111;--sage:#a3b18a;--sage-d:#8ba888;--text:#e9edc9;--muted:rgba(233,237,201,.55)}
html{scroll-behavior:smooth}
body{font-family:'LiaEspresso',sans-serif;background:var(--bg);color:var(--text);direction:rtl;font-weight:300;-webkit-font-smoothing:antialiased}
::selection{background:var(--sage);color:#000}
a{color:inherit;text-decoration:none}
button{cursor:pointer;font-family:inherit;border:none;background:none;color:inherit}
img{display:block;width:100%;height:100%;object-fit:cover}

/* layout */
.container{max-width:1280px;margin:0 auto;padding:0 2rem}

/* hero */
.blog-hero{padding:11rem 0 4rem;background:linear-gradient(180deg,#0d0d0d 0%,var(--bg) 100%);position:relative;overflow:hidden;text-align:center}
.blog-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 50% at 50% 0%,rgba(163,177,138,.12) 0%,transparent 70%)}
.hero-badge{display:inline-block;border:1px solid rgba(163,177,138,.3);color:var(--sage);font-size:.75rem;font-weight:500;letter-spacing:.18em;text-transform:uppercase;padding:.45rem 1.2rem;border-radius:100px;margin-bottom:1.5rem}
.blog-hero h1{font-size:clamp(3.5rem,10vw,8rem);font-weight:700;line-height:.9;letter-spacing:-.03em;margin-bottom:1.5rem;background:linear-gradient(135deg,var(--text) 0%,rgba(233,237,201,.55) 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.blog-hero p{font-size:1.15rem;color:var(--muted);max-width:480px;line-height:1.7;margin:0 auto}

/* sticky bar */
.sticky-bar{position:sticky;top:72px;z-index:50;background:rgba(10,10,10,.85);backdrop-filter:blur(20px);border-bottom:1px solid rgba(163,177,138,.12);padding:.85rem 0}
.bar-inner{display:flex;align-items:center;gap:1.5rem}
.search-box{position:relative;flex-shrink:0}
.search-icon{position:absolute;right:.9rem;top:50%;transform:translateY(-50%);font-size:.9rem;pointer-events:none}
.search-box input{background:rgba(255,255,255,.05);border:1px solid rgba(163,177,138,.15);color:var(--text);font-family:inherit;font-size:.9rem;padding:.55rem 2.4rem .55rem 1rem;border-radius:100px;width:220px;outline:none;transition:border-color .2s}
.search-box input::placeholder{color:var(--muted)}
.search-box input:focus{border-color:rgba(163,177,138,.45)}
.cats{display:flex;gap:.5rem;flex-wrap:wrap}
.cat-btn{padding:.45rem 1.1rem;border-radius:100px;border:1px solid rgba(163,177,138,.2);color:var(--muted);font-size:.82rem;font-weight:400;transition:all .2s;white-space:nowrap}
.cat-btn:hover,.cat-btn.active{background:var(--sage);border-color:var(--sage);color:#000;font-weight:500}

/* featured */
main.container{padding-top:3.5rem;padding-bottom:5rem}
.featured{display:block;margin-bottom:4rem;border-radius:1.5rem;overflow:hidden;background:var(--card);border:1px solid rgba(163,177,138,.12);transition:border-color .3s}
.featured:hover{border-color:rgba(163,177,138,.35)}
.featured-inner{display:grid;grid-template-columns:1fr 1fr;min-height:480px}
.feat-img{position:relative;overflow:hidden;background:#0d0d0d}
.feat-img img{transition:transform .6s ease;filter:grayscale(20%)}
.featured:hover .feat-img img{transform:scale(1.04);filter:grayscale(0%)}
.no-img{display:flex;align-items:center;justify-content:center;height:100%;font-size:5rem;color:var(--muted)}
.feat-badge{position:absolute;top:1.5rem;right:1.5rem;background:var(--sage);color:#000;font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:.4rem .9rem;border-radius:100px}
.feat-body{padding:3.5rem;display:flex;flex-direction:column;justify-content:space-between}
.feat-cat{font-size:.8rem;letter-spacing:.14em;color:var(--sage);font-weight:500;text-transform:uppercase;margin-bottom:1.2rem}
.feat-title{font-size:clamp(1.6rem,3vw,2.4rem);font-weight:700;line-height:1.2;letter-spacing:-.02em;margin-bottom:1.2rem}
.feat-excerpt{color:var(--muted);line-height:1.75;font-size:.95rem;flex:1;margin-bottom:2rem}
.feat-meta{display:flex;align-items:center;justify-content:space-between}
.author-row{display:flex;align-items:center;gap:.8rem}
.avatar{width:40px;height:40px;border-radius:50%;background:var(--sage);display:flex;align-items:center;justify-content:center;color:#000;font-weight:700;font-size:1rem;flex-shrink:0}
.author-name{font-size:.88rem;font-weight:500}
.author-date{font-size:.78rem;color:var(--muted);margin-top:.1rem}
.read-more{font-size:.82rem;color:var(--sage);font-weight:500;display:flex;align-items:center;gap:.3rem}

/* posts grid */
.posts-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-bottom:5rem}
.post-card{display:block;background:var(--card);border-radius:1.2rem;overflow:hidden;border:1px solid rgba(163,177,138,.1);transition:transform .3s,border-color .3s}
.post-card:hover{transform:translateY(-4px);border-color:rgba(163,177,138,.3)}
.card-img{position:relative;aspect-ratio:4/3;overflow:hidden;background:#0d0d0d}
.card-img img{transition:transform .5s ease,filter .5s ease;filter:grayscale(40%)}
.post-card:hover .card-img img{transform:scale(1.05);filter:grayscale(0%)}
.card-overlay{position:absolute;inset:0;background:rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .3s}
.post-card:hover .card-overlay{opacity:1}
.card-overlay-btn{width:50px;height:50px;border-radius:50%;background:var(--sage);color:#000;font-size:1.3rem;display:flex;align-items:center;justify-content:center;font-weight:700}
.card-body{padding:1.5rem}
.card-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:.8rem}
.card-cat{font-size:.72rem;color:var(--sage);font-weight:500;letter-spacing:.1em;text-transform:uppercase}
.card-time{font-size:.72rem;color:var(--muted)}
.card-title{font-size:1.1rem;font-weight:600;line-height:1.3;letter-spacing:-.01em;margin-bottom:.7rem}
.card-excerpt{font-size:.85rem;color:var(--muted);line-height:1.65;margin-bottom:.9rem;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.card-date{font-size:.75rem;color:var(--muted)}

/* no posts */
.no-posts{text-align:center;padding:8rem 2rem;color:var(--muted)}
.no-posts h3{font-size:2rem;font-weight:600;color:var(--text);margin-bottom:1rem}

/* AI section */
.ai-sec{position:relative;background:linear-gradient(135deg,#0f1a0d 0%,#0a0a0a 60%,#0d1a10 100%);border:1px solid rgba(163,177,138,.18);border-radius:1.8rem;padding:5rem 4rem;display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center;overflow:hidden;margin-bottom:4rem}
.ai-glow{position:absolute;width:500px;height:500px;background:radial-gradient(circle,rgba(163,177,138,.12) 0%,transparent 70%);top:-200px;left:-200px;pointer-events:none}
.ai-badge{display:inline-block;border:1px solid rgba(163,177,138,.3);color:var(--sage);font-size:.72rem;font-weight:500;letter-spacing:.16em;text-transform:uppercase;padding:.4rem 1rem;border-radius:100px;margin-bottom:1.5rem}
.ai-title{font-size:clamp(2rem,4vw,3rem);font-weight:700;line-height:1.1;letter-spacing:-.025em;margin-bottom:1.2rem}
.ai-desc{color:var(--muted);line-height:1.75;font-size:.95rem;margin-bottom:2rem}
.ai-btn{display:inline-block;background:var(--sage);color:#000;font-family:inherit;font-size:.9rem;font-weight:600;padding:.8rem 2rem;border-radius:100px;cursor:pointer;border:none;transition:background .2s,transform .15s}
.ai-btn:hover{background:var(--sage-d);transform:translateY(-2px)}
.ai-cards{display:flex;flex-direction:column;gap:1rem}
.ai-card{padding:1.4rem 1.6rem;border-radius:1rem;background:rgba(255,255,255,.04);border:1px solid rgba(163,177,138,.12)}
.ai-card p{font-size:.9rem;line-height:1.6;color:var(--muted);font-style:italic}
.ai-card-a p{color:var(--text)}

/* footer */
.site-footer{background:var(--bg2);border-top:1px solid rgba(163,177,138,.1);padding:3rem 2rem;text-align:center}
.footer-brand{font-size:1.1rem;font-weight:700;letter-spacing:.15em;color:var(--text);margin-bottom:.3rem}
.footer-sub{font-size:.8rem;color:var(--muted);letter-spacing:.1em;margin-bottom:1.5rem}
.footer-icons{display:flex;justify-content:center;gap:1.5rem;font-size:1.3rem;margin-bottom:1.5rem}
.footer-icons a{opacity:.7;transition:opacity .2s}.footer-icons a:hover{opacity:1}
.footer-copy{font-size:.78rem;color:var(--muted)}

/* float CTA */
.float-cta{position:fixed;bottom:1.8rem;left:1.8rem;width:56px;height:56px;background:var(--sage);color:#000;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.4rem;box-shadow:0 4px 20px rgba(163,177,138,.35);z-index:100;transition:transform .2s}
.float-cta:hover{transform:scale(1.1)}

/* AI modal */
#ai-modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,.75);backdrop-filter:blur(8px);z-index:200;align-items:center;justify-content:center;padding:1.5rem}
#ai-modal.open{display:flex}
.ai-box{background:#141414;border:1px solid rgba(163,177,138,.2);border-radius:1.5rem;padding:2.5rem;max-width:520px;width:100%;position:relative;max-height:90vh;overflow-y:auto}
.ai-close{position:absolute;top:1.2rem;left:1.2rem;background:rgba(255,255,255,.07);border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;font-size:.9rem;transition:background .2s}
.ai-close:hover{background:rgba(255,255,255,.12)}
.ai-icon{font-size:2.5rem;margin-bottom:1rem;text-align:center}
.ai-modal-title{font-size:1.6rem;font-weight:700;text-align:center;margin-bottom:.6rem}
.ai-modal-desc{color:var(--muted);text-align:center;font-size:.9rem;line-height:1.6;margin-bottom:1.5rem}
.ai-textarea{width:100%;background:rgba(255,255,255,.05);border:1px solid rgba(163,177,138,.2);color:var(--text);font-family:inherit;font-size:.9rem;padding:1rem;border-radius:.8rem;resize:none;height:110px;outline:none;margin-bottom:1.2rem;transition:border-color .2s;direction:rtl}
.ai-textarea:focus{border-color:rgba(163,177,138,.45)}
.ai-btns{display:grid;grid-template-columns:1fr 1fr;gap:.8rem;margin-bottom:1rem}
.btn-primary{background:var(--sage);color:#000;font-family:inherit;font-size:.88rem;font-weight:600;padding:.7rem;border-radius:.7rem;cursor:pointer;border:none;transition:background .2s}
.btn-primary:hover{background:var(--sage-d)}
.btn-primary:disabled{opacity:.55;cursor:not-allowed}
.btn-secondary{background:rgba(255,255,255,.06);color:var(--text);font-family:inherit;font-size:.88rem;padding:.7rem;border-radius:.7rem;cursor:pointer;border:1px solid rgba(163,177,138,.2);transition:background .2s}
.btn-secondary:hover{background:rgba(255,255,255,.1)}
.ai-resp{background:rgba(163,177,138,.08);border-right:3px solid var(--sage);border-radius:.5rem;padding:1rem 1.2rem;font-size:.88rem;line-height:1.7;color:var(--text);display:none}
.ai-resp.show{display:block}

/* responsive */
@media(max-width:900px){
  .featured-inner{grid-template-columns:1fr}
  .feat-img{height:300px}
  .feat-body{padding:2.5rem}
  .posts-grid{grid-template-columns:1fr 1fr;gap:1.5rem}
  .ai-sec{grid-template-columns:1fr;padding:3rem 2rem}
  .ai-cards{display:none}
}
@media(max-width:640px){
  .posts-grid{grid-template-columns:1fr;gap:1.5rem}
  .bar-inner{flex-direction:column;align-items:flex-start}
  .search-box input{width:100%}
  .blog-hero{padding:8.5rem 0 3rem}
  .ai-btns{grid-template-columns:1fr}
}
</style>
</head>
<body>

<?php include __DIR__.'/inc-nav.php'; ?>

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
  btn.disabled=true;btn.innerHTML='⏳ שנייה...';out.classList.remove('show');
  try{
    const fd=new FormData();fd.append('q',txt);
    const r=await fetch('/wp-content/themes/hello-elementor-child/ai-advice.php',{method:'POST',body:fd});
    const d=await r.json();
    if(d.answer){out.textContent=d.answer;out.classList.add('show');}
    else{throw new Error();}
  }catch{
    out.textContent='שאלה מצוינת! לייעוץ מדויק התקשרו לנתנאל ישירות: 054-551-1232 ';
    out.classList.add('show');
  }
  btn.disabled=false;btn.innerHTML='💬 ייעוץ אישי';
}
</script>
<?php wp_footer(); ?>
</body>
</html>
