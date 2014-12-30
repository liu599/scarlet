<?php
/**
 * Template Name: 视频页
 *
 * @package    Scarlet Feather
 * @subpackage Scarlet Feather
 * @since      Scarlet Feather beta
 */
?>
<!-- id="headingOne"-->


<?php get_header(); ?>
<div id="freshcontent">
<div class="sac">



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
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
 <?php the_content(); ?> 
<?php endwhile; ?>
<div class="page_navi"><?php par_pagenavi(9); ?></div>
<?php else : ?>

    <div class="nofound">
        <?php _e('Not Found'); ?>
    </div>

<?php endif; ?>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
</body>
</html>