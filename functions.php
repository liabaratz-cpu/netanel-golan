<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('liaespresso-font', '/wp-content/fonts/fonts.css');
});

// Allow woff2 uploads
add_filter('upload_mimes', function($mimes) {
    $mimes['woff2'] = 'font/woff2';
    $mimes['woff']  = 'font/woff';
    return $mimes;
});

// Allow application passwords over HTTP (temporary - remove after SSL)
add_filter('wp_is_application_passwords_available', '__return_true');

// Google Analytics - G-XG7BEGZLYM (page-home.php injects directly, this covers all other pages)
add_action('wp_head', function() {
    if (is_page_template('page-home.php')) return;
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XG7BEGZLYM"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XG7BEGZLYM');
    </script>
    <?php
}, 1);

// Gallery CPT
add_action('init', function() {
    register_post_type('gallery_item', [
        'labels' => [
            'name'          => 'גלריה',
            'singular_name' => 'פריט גלריה',
            'add_new'       => 'הוסף פריט',
            'add_new_item'  => 'הוסף פריט לגלריה',
            'edit_item'     => 'ערוך פריט',
            'all_items'     => 'כל הפריטים',
            'menu_name'     => 'גלריה',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => ['title', 'thumbnail'],
        'menu_position'       => 5,
        'exclude_from_search' => true,
    ]);
});

// Video URL meta box for gallery_item
add_action('add_meta_boxes', function() {
    add_meta_box(
        'gallery_video_url',
        'קישור סרטון YouTube (אופציונלי)',
        function($post) {
            $val = get_post_meta($post->ID, '_video_url', true);
            echo '<p style="margin-bottom:8px;color:#666;">הדבק קישור YouTube - למשל: https://www.youtube.com/watch?v=xxxxx<br>אם יש קישור סרטון, הסרטון יוצג במקום התמונה. אם ריק - מוצגת התמונה המוצגת.</p>';
            echo '<input type="text" name="gallery_video_url" value="' . esc_attr($val) . '" style="width:100%;padding:6px;" placeholder="https://www.youtube.com/watch?v=..." />';
        },
        'gallery_item',
        'normal',
        'high'
    );
});

add_action('save_post_gallery_item', function($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['gallery_video_url'])) {
        update_post_meta($post_id, '_video_url', sanitize_url($_POST['gallery_video_url']));
    }
});

// Helper: extract YouTube video ID from URL
function extract_youtube_id(string $url): string {
    preg_match('/(?:youtube\.com\/(?:watch\?v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $m);
    return $m[1] ?? '';
}

// Meta Pixel - נתנאל גולן
add_action('wp_head', function() { ?>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1542942850862452');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1542942850862452&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
<?php }, 1);
