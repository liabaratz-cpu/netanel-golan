<?php /* Shared nav - used in all pages */ ?>
<style>
#nav {
    position: fixed; width: 100%; z-index: 100;
    padding: 24px 40px; transition: all 0.35s ease;
}
#nav.scrolled {
    background: rgba(10,10,10,0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    padding: 16px 40px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.nav-inner {
    max-width: 1200px; margin: 0 auto;
    display: flex; align-items: center; justify-content: space-between;
}
.nav-logo-img { height: 80px; object-fit: contain; }
.nav-links { display: flex; align-items: center; gap: 36px; }
.nav-links a {
    font-family: 'LiaEspresso', sans-serif;
    font-size: 14px; font-weight: 400;
    color: #e9edc9; transition: color 0.3s; text-decoration: none;
}
.nav-links a:hover, .nav-links a.nav-active { color: #a3b18a; }
.nav-cta {
    background: #a3b18a !important; color: #0a0a0a !important;
    padding: 10px 28px !important; border-radius: 999px !important;
    font-weight: 700 !important; font-size: 13px !important;
    transition: all 0.3s !important; font-family: 'LiaEspresso', sans-serif !important;
}
.nav-cta:hover { background: #fff !important; transform: scale(1.05) !important; }
@media (max-width: 900px) {
    #nav { padding: 18px 24px; }
    #nav.scrolled { padding: 12px 24px; }
    .nav-links { display: none; }
    .nav-links.open {
        display: flex; flex-direction: column; align-items: center; gap: 20px;
        position: fixed; inset: 0; background: rgba(10,10,10,0.97);
        backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
        z-index: 99; padding: 120px 40px 60px;
    }
    .nav-links.open a { font-size: 22px; font-weight: 300; }
    .nav-links.open .nav-cta {
        margin-top: 12px; padding: 14px 48px !important; font-size: 16px !important;
    }
    .hamburger {
        display: flex; flex-direction: column; justify-content: center; gap: 6px;
        width: 40px; height: 40px; cursor: pointer; z-index: 200; position: relative;
        background: none; border: none; padding: 4px;
    }
    .hamburger span {
        display: block; width: 26px; height: 2px;
        background: #e9edc9; border-radius: 2px;
        transition: all 0.3s ease; transform-origin: center;
    }
    .hamburger.open span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
    .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .hamburger.open span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
}
@media (min-width: 901px) { .hamburger { display: none; } }
</style>
<nav id="nav">
    <div class="nav-inner">
        <a href="/"><img src="/wp-content/uploads/logo.png" alt="נתנאל גולן" class="nav-logo-img"></a>
        <div class="nav-links" id="nav-links">
            <a href="/#about">אודות</a>
            <a href="/#services">שירותים</a>
            <a href="/#gallery">גלריה</a>
            <a href="/בלוג/" <?php if(is_home()||is_singular('post')) echo 'class="nav-active"'; ?>>בלוג</a>
            <a href="/#contact">צור קשר</a>
            <a href="https://calmark.io/p/7CgMa" target="_blank" class="nav-cta">קביעת תור</a>
        </div>
        <button class="hamburger" id="hamburger" aria-label="תפריט" onclick="toggleNav()">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>
<script>
window.addEventListener('scroll',function(){
    document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 50);
});
function toggleNav(){
    var links = document.getElementById('nav-links');
    var btn = document.getElementById('hamburger');
    links.classList.toggle('open');
    btn.classList.toggle('open');
    document.body.style.overflow = links.classList.contains('open') ? 'hidden' : '';
}
// close on link click
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('#nav-links a').forEach(function(a){
        a.addEventListener('click', function(){
            document.getElementById('nav-links').classList.remove('open');
            document.getElementById('hamburger').classList.remove('open');
            document.body.style.overflow = '';
        });
    });
});
</script>
