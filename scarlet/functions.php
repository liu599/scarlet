<?php
/**
 * Theme-Functions 主要函数
 *
 * @package 	Scarlet Feather
 * @subpackage  Scarlet Feather
 * @since 		  1.0.0
 * @author      eddie32
 */
define( 'THEME_VERSION', '1.0.0' );
define( 'IMGID','1');

// 设定后台特色图像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 75, 75, true );
add_image_size( 'medium', 400, 240 );
add_image_size( 'large', 750, 450 );

// 开启链接管理（包括友情链接）
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// 去除WordPress版本显示
add_filter( 'the_generator', 'remove_version' );

// 禁用谷歌字体链接
add_filter( 'gettext_with_context', 'disable_open_sans', 888, 4 );

// 隐藏admin bar
add_filter( 'show_admin_bar', '__return_false' );

// 搜索结果只显示文章
add_filter('pre_get_posts','search_filter');

if ( function_exists('register_sidebar') )
    register_sidebar();
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";}
	previous_posts_link(' 上一页 ');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link(' 下一页 ');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";}}
}

/**
 * 禁用谷歌字体链接
 *
 * @since 1.0.0
 * @return string
 */
function disable_open_sans($translations, $text, $context, $domain) {
    if( 'Open Sans font: on or off' == $context && 'on' == $text ) {
        $translations = 'off';
    }
    return $translations;
}

/**
 * 去除WordPress版本信息
 *
 * @since 1.0.0
 * @return string
 */
remove_action('wp_head','wp_generator');
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );


/**
 *Lazyload 改造 img 标签
 *
 * @since 3.0.2
 * @return string

function zan_filter_lazy( $content ) {
  if( is_feed() ) return $content;
  return preg_replace_callback( '/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'zan_filter_lazy_replace', $content );
}
//改造 img 标签
function zan_filter_lazy_replace( $matches ) {
  if( !preg_match( '/class\s*=\s*"/i', $matches[0] ) ) $class_attr = 'class="" ';
  $replacement = $matches[1] . $class_attr . 'src="' . get_bloginfo( 'template_directory' ) . '/grey.gif' . '" data-original' . substr( $matches[2], 3 ) . $matches[3];
  $replacement = preg_replace( '/class\s*=\s*"/i', 'class="lazy ', $replacement );
  $replacement .= '<noscript>' . $matches[0] . '</noscript>';
    return $replacement;
}

//控制缓冲区
function zan_filter_lazy_html() {
  ob_start( 'zan_filter_lazy' );
}
//if( !is_admin() ) add_action( 'wp_loaded', 'zan_filter_lazy_html' );
*/

function get_random_pics($inputid){
$finalid = $inputid + 3;
$img_url[1] = "http://pic.nekohand.moe/1/di/DS21/Konachan.jpg";
$img_url[2] = "http://pic.nekohand.moe/1/di/24QO/Konachan.jpg";
$img_url[3] = "http://pic.nekohand.moe/1/di/U5SM/Konachan.jpg";
$img_url[4] = "http://pic.nekohand.moe/1/di/HSGS/Konachan.jpg";
$img_url[5] = "http://pic.nekohand.moe/1/di/00MJ/Konachan.jpg";
$img_url[6] = "http://pic.nekohand.moe/1/di/ZWO2/Konachan.jpg";
$img_url[7] = "http://pic.nekohand.moe/1/di/FRPY/Konachan.jpg";
$img_url[8] = "http://pic.nekohand.moe/1/di/75Y9/47212616_p0.jpg";
$img_url[9] = "http://pic.nekohand.moe/1/di/W3PU/W3PU.jpg";
$img_url[10] = "http://pic.nekohand.moe/1/di/Y4NO/Y4NO.jpg";
$img_url[11] = "http://pic.nekohand.moe/1/di/V3Y9/V3Y9.jpg";
$img_url[12] = "http://pic.nekohand.moe/1/di/8USF/8USF.jpg";
$theid = rand($inputid,$finalid);
//$img_url = get_bloginfo('template_url').'/banner/ban'.$theid.'.jpg';
$picurl = $img_url[$theid];
return $picurl;
}

function get_random_verbs($inputid){
$finalid = $inputid + 5;    
$subtitlex[1]="Miracle S.T.A.R.T!!";
$subtitlex[2]="Love Live!!";
$subtitlex[3]="Do not give up!!";
$subtitlex[4]="Ready!!";
$subtitlex[5]="ラブライブ！ 大好きで！";
$subtitlex[6]="μ's，みんなで叶える物語";
$subtitlex[7]="涙は青春のダイヤモンド 君を飾る光";
$subtitlex[8]="Yellow だよ！！！";
$subtitlex[9]="にこにこに～";
$subtitlex[10]="Poi";
$subtitlex[11]="23333333";
$subtitlex[12]="(╯‵□′)╯︵┻━┻";
$verbs = $subtitlex[rand($inputid,$finalid)];
return $verbs;
}

function getlog(){
$logourl = 'http://pic.nekohand.moe/1/di/8XTT/8XTT.png';
return $logourl;
}

function getbanner(){
$banners[1] = "http://kagura.rdy.jp/kamimaho/banner/120_600_yoruko.jpg";
$banners[2] = "http://aokana.net/ouen-banner/asuka01_150x600.jpg";
$bannerid = rand(1,count($banners));
$bannerurl = $banners[$bannerid];
return $bannerurl;
}

/*Remote Adding Pictures*/
add_action('submitpost_box', 'iippcc_thumbnail_meta_box');
add_action('save_post', 'iippcc_publish_post');

function iippcc_thumbnail_meta_box() {
$screen = get_current_screen();
$post_type = $screen->post_type;
if ( current_theme_supports( 'post-thumbnails', $post_type ) && post_type_supports( $post_type, 'thumbnail' ) )
add_meta_box('postimageviaurldiv', __('自定义特色图片'), 'iippcc_thumbnail_meta_box_html', null, 'side', 'low');
}function iippcc_thumbnail_meta_box_html() {
echo '<label for="featured_image_url">';
_e("输入图片地址--图片地址必须带后缀", 'iippcc_textdomain' );
echo '</label> ';
echo '<input type="text" id="featured_image_url" name="featured_image_url" value="" size="30" />';
}function iippcc_check_required_transition($new_status='', $old_status='', $post='') {
global $post_ID;

if ('publish' == $new_status) {
iippcc_publish_post($post_ID);
}
}function iippcc_publish_post($post_id) {

$imageUrl = $_POST['featured_image_url'];

if (get_post_meta($post_id, '_thumbnail_id', true) || get_post_meta($post_id, 'skip_post_thumb', true)) {
return;
}

$thumb_id = iippcc_generate_post_thumb($imageUrl, $post_id);

if ($thumb_id) {
update_post_meta( $post_id, '_thumbnail_id', $thumb_id );
}
}function iippcc_generate_post_thumb ($imageUrl, $post_id) {

$filename = substr($imageUrl, (strrpos($imageUrl, '/'))+1);

if (!(($uploads = wp_upload_dir(current_time('mysql')) ) && false === $uploads['error'])) {
return null;
}

$filename = wp_unique_filename( $uploads['path'], $filename );

$new_file = $uploads['path'] . "/$filename";

if (!ini_get('allow_url_fopen')) {
$file_data = curl_get_file_contents($imageUrl);
} else {
$file_data = @file_get_contents($imageUrl);
}

if (!$file_data) {
return null;
}

file_put_contents($new_file, $file_data);

$stat = stat( dirname( $new_file ));
$perms = $stat['mode'] & 0000666;
@ chmod( $new_file, $perms );

$wp_filetype = wp_check_filetype( $filename, $mimes );

extract( $wp_filetype );

if ( ( !$type || !$ext ) && !current_user_can( 'unfiltered_upload' ) ) {
return null;
}

$url = $uploads['url'] . "/$filename";

$attachment = array(
'post_mime_type' => $type,
'guid' => $url,
'post_parent' => null,
'post_title' => $imageTitle,
'post_content' => '',
);

$thumb_id = wp_insert_attachment($attachment, $file, $post_id);
if ( !is_wp_error($thumb_id) ) {
require_once(ABSPATH . '/wp-admin/includes/image.php');

wp_update_attachment_metadata( $thumb_id, wp_generate_attachment_metadata( $thumb_id, $new_file ) );
update_attached_file( $thumb_id, $new_file );

return $thumb_id;
}

return null;

}

/**
 * 获取评论列表
 *
 * @since 2.1.0
 * @return array [评论列表]
 */
function zan_get_commments_list($size) {
  $args = array(
    'walker'            => null,
    'max_depth'         => '',
    'style'             => 'ol',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => '回复',
    'page'              => '',
    'avatar_size'       => $size,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5',
    'short_ping'        => false,
    'echo'              => true 
  );

  return wp_list_comments($args);
}

/**
 * 获取评论分页
 *
 * @since 2.1.0
 * @return array [评论分页]
 */
function zan_comments_pagination() {
  $args = array(
    'prev_text'    => __( '«' ),
    'next_text'    => __( '»' )
  );

  return paginate_comments_links($args);
}
/**
 * 评论表单
 *
 * @since 2.1.0
 * @return array [自定义表单]
 */
function zan_comments_form() {
  $args = array(
    'title_reply'          => '<div class="com_title"><i class="fa fa-pencil"></i> 留言板</div>',
    'title_reply_to'       => __( '回复 %s' ),
    'cancel_reply_link'    => __( '取消回复' ),
    'fields'               => array(
'author' => '<div class="row"><div class="col-md-4">
<div class="input-group input-group-sm">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="author" id="author" placeholder="* 昵称"></div>
</div>',
'email'  => '<div class="col-md-4">
<div class="input-group input-group-sm">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" id="email" placeholder="* 邮箱"></div></div>',
'url'    => '<div class="col-md-4">
<div class="input-group input-group-sm">
<span class="input-group-addon"><i class="fa fa-link"></i></span>
<input type="text" name="url" id="url" placeholder="网站"></div></div></div>'
    ),
    'comment_field'        => '
    <hr /><textarea id="comment" placeholder="^_^欢迎留言" name="comment" cols="45" rows="8" aria-required="true" style="width:600px;"></textarea><br /><br />',
    'comment_notes_before' => '<br><div id="commentform-error" class="alert hidden"></div>',
    'comment_notes_after' => '',
    'class_submit' => 'btn btn-primary'
  );
  return comment_form($args);
}

/* <<小牆>> Anti-Spam v1.82 by Willin Kan. 2010/12/16 最新修改 */
//建立
class anti_spam {
  function anti_spam() {
    if ( !current_user_can('level_0') ) {
      add_action('template_redirect', array($this, 'w_tb'), 1);
      add_action('init', array($this, 'gate'), 1);
      add_action('preprocess_comment', array($this, 'sink'), 1);
    }
  }
  //設欄位
  function w_tb() {
    if ( is_singular() ) {
      ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
      "textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
    }
  }
  //檢查
  function gate() {
    if ( !empty($_POST['w']) && empty($_POST['comment']) ) {
      $_POST['comment'] = $_POST['w'];
    } else {
      $request = $_SERVER['REQUEST_URI'];
      $referer = isset($_SERVER['HTTP_REFERER'])         ? $_SERVER['HTTP_REFERER']         : '隱瞞';
      $IP      = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] . ' (透過代理)' : $_SERVER["REMOTE_ADDR"];
      $way     = isset($_POST['w'])                      ? '手動操作'                       : '未經評論表格';
      $spamcom = isset($_POST['comment'])                ? $_POST['comment']                : null;
      $_POST['spam_confirmed'] = "請求: ". $request. "\n來路: ". $referer. "\nIP: ". $IP. "\n方式: ". $way. "\n內容: ". $spamcom. "\n -- 記錄成功 --";
    }
  }
  //處理
  function sink( $comment ) {
    if ( !empty($_POST['spam_confirmed']) ) {
      if ( in_array( $comment['comment_type'], array('pingback', 'trackback') ) ) return $comment; //不管 Trackbacks/Pingbacks
      //方法一: 直接擋掉, 將 die(); 前面兩斜線刪除即可.
      die();
      //方法二: 標記為 spam, 留在資料庫檢查是否誤判.
      //add_filter('pre_comment_approved', create_function('', 'return "spam";'));
      //$comment['comment_content'] = "[ 小牆判斷這是Spam! ]\n". $_POST['spam_confirmed'];
    }
    return $comment;
  }
}
$anti_spam = new anti_spam();
// -- END ----------------------------------------
/* Ajax firewall */
function comments_spam_refuse($comment) {
	$pattern_comment_author = '机,夜总会,营销, 网';
	$pattern_comment_url = '';
	$pattern_comment_content = 'shoe, cheap, shop, website';
	$pattern_comment_ip = ',183.138.172.102,115.219.26.240';
 
	$pattern_author = "/".str_replace(',','|',preg_quote($pattern_comment_author,'/'))."/u";
	$pattern_url = "/".str_replace(',','|',preg_quote($pattern_comment_url,'/'))."/u";
	$pattern_content = "/".str_replace(',','|',preg_quote($pattern_comment_content,'/'))."/u";
	$pattern_hanzi = '/[一-龥]/u';
 
	if (preg_match($pattern_author,$comment['comment_author'])): 
	err('Danger: 用户名含有禁止关键字');
//	elseif (preg_match($pattern_url,$comment['comment_author_url'])):
//	err('评论内容含有促销类url Filter on!!');
	elseif(preg_match($pattern_content,$comment['comment_content'])):
	err('Content Filter on!!');
	elseif(!preg_match($pattern_hanzi,$comment['comment_content'])):
	err('禁止纯英文回复 Filter on!!');
	elseif(strpos($pattern_comment_ip,$comment['comment_author_IP'])):
	err('您的ip不允许提交评论 Filter on!!');
	endif;
	return $comment;
}
add_filter('preprocess_comment', 'comments_spam_refuse');

/* 邮件通知 by Qiqiboy Not working */
 function comment_mail_notify($comment_id) {
     $comment = get_comment($comment_id);//根据id获取这条评论相关数据
     $content=$comment->comment_content;
     //对评论内容进行匹配
     $match_count=preg_match_all('/<a href="#comment-([0-9]+)?" rel="nofollow">/si',$content,$matchs);
     if($match_count>0){//如果匹配到了
         foreach($matchs[1] as $parent_id){//对每个子匹配都进行邮件发送操作
             SimPaled_send_email($parent_id,$comment);
         }
     }elseif($comment->comment_parent!='0'){//以防万一，有人故意删了@回复，还可以通过查找父级评论id来确定邮件发送对象
         $parent_id=$comment->comment_parent;
         SimPaled_send_email($parent_id,$comment);
     }else return;
 }
 add_action('comment_post', 'comment_mail_notify');
 function SimPaled_send_email($parent_id,$comment){//发送邮件的函数 by Qiqiboy.com
     $admin_email = get_bloginfo ('admin_email');//管理员邮箱
     $parent_comment=get_comment($parent_id);//获取被回复人（或叫父级评论）相关信息
     $author_email=$comment->comment_author_email;//评论人邮箱
     $to = trim($parent_comment->comment_author_email);//被回复人邮箱
     $spam_confirmed = $comment->comment_approved;
     if ($spam_confirmed != 'spam' && $to != $author_email) {
//    && $to != $admin_email     $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
         $wp_email = 'root@nekohand.moe';
         $subject = '您在 [' . get_option("blogname") . '] 的留言有了回應';
         $message = '<div style="background-color:#eef2fa;border:1px solid #d8e3e8;color:#111;padding:0 15px;-moz-border-radius:5px;-webkit-border-radius:5px;-khtml-border-radius:5px;">
             <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
             <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
             . trim(get_comment($parent_id)->comment_content) . '</p>
             <p>' . trim($comment->comment_author) . ' 给你的回复:<br />'
             . trim($comment->comment_content) . '<br /></p>
             <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id,array("type" => "all"))) . '">查看回复的完整內容</a></p>
             <p>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
             <p>(此邮件有系统自动发出, 请勿回复.)</p></div>';
         $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
         $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
         wp_mail( $to, $subject, $message, $headers );
     }
 }
?>