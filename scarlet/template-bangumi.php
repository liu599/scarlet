<?php
/**
 * Template Name: 新番列表
 *
 * @package    Scarlet Feather
 * @subpackage Scarlet Feather
 * @since      Scarlet Feather beta
 */
?>

<?php get_header(); ?>

<div id="freshcontent">
<div class="sac mainoutput">
<div class="breadcrumb">
	    <?php 
	    	if(function_exists('bcn_display')) {
	        	echo '<i class="fa fa-home"></i> ';
	        	bcn_display();
	    	}
	    ?>
	</div>
 <div class="articletitle">
      <div class="titleblock">
        <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?> | 绯羽魔法店"><?php the_title(); ?></a>
      </div>
      <div class="ctitle">
		<span><i class="fa fa-calendar">&nbsp;</i> <?php  the_time( 'Y-m-j' ); ?></span>
		<?php _e('/ '); ?>
		<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print ' '; } ?></span>
        <?php _e('/ '); ?>
        <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span>
        <span1><?php edit_post_link('编辑','/ '); ?></span1>
    </div>
  </div>
<p>技术实现参考: http://www.kylen314.com/archives/4679, 特此致谢</p>

<?php
$data = 
file_get_contents("http://api.bgm.tv/user/eclosion/collection?cat=watch");
$data = json_decode($data, true); 
$numb = count($data);
for ($i=0; $i<$numb; $i++) {
  $id = $data[$i]['subject']['id'];
  $bangumiurl = 'http://api.bgm.tv/subject/'.$id;
//  $summary = file_get_contents($bangumiurl);
//  $summary = json_decode($summary, true); 
//  $summary = $summary['summary'];
   
  $weekday = $data[$i]['subject']['air_weekday'];
  $weekday = 
     str_replace(array("1","2","3","4","5","6","7"),
     array("周一","周二","周三","周四","周五","周六","周日",),
     $weekday);
   
  $bankumitype = $data[$i]['subject']['type'];
  $bankumitype = 
  str_replace(array("2","6"),array("二次元","三次元",),$bankumitype);
   
   
  if ($data[$i]['subject']['eps']=="0") {
          $eps = "??";
  } else {
          $eps = $data[$i]['subject']['eps'];
  }
   
   
  echo '
  <a target="_blank" rel="nofollow"
      href="'.$data[$i]['subject']['url'].'"
      class="list-group-item">
  <p class="pull-left" style="margin-right:20px;">
      <img src="'.$data[$i]['subject']['images']['medium'].'"
           alt="'.$data[$i]['subject']['name_cn'].'" height=200 >
  </p>
  <p class="list-group-item-text">
      <strong>'.$data[$i]['name'].'</strong>
      <small class="text-muted">
          '.$data[$i]['subject']['name_cn'].'
      </small><br><br>
  <p class="text-muted">
      <i class="fa fa-info-circle"></i>
         类  型:&nbsp; '.$bankumitype.'.</p>
   <p class="text-muted">
       <i class="fa fa-calendar"></i>
        首播时间:&nbsp;'.$data[$i]['subject']['air_date'].'
   </p>
   <p class="text-muted">
       <i class="fa fa-eye"></i>
       放送日:&nbsp;'.$weekday.'
   </p>
   <p class="text-muted">
        <i class="fa fa-trophy"></i>
        观看进度:&nbsp;'.$data[$i]['ep_status'].'/'.$eps.'
   </p>
   <p class="text-muted">
       <i class="fa fa-users"></i>
    有'.$data[$i]['subject']['collection']['doing'].'人也正在看
   </p>
   <p class="text-muted">
       <i class="fa fa-flag"></i>
       最后更新:&nbsp;
       '.date('Y-m-d',$data[$i]['lasttouch']).'
   </p>
  </p>
</a>';
}
?>
<!--<p class="text-muted">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp简介:  '.$summary.'
   </p>-->
</div>
</div>

<?php get_footer(); ?>
</body>
</html>