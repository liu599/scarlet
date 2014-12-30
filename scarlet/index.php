<?php get_header(); ?>



<!--主体分拆-->
<div class="mainoutput" id="freshcontent">
    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
   <div class="sac">
    <div class="articletitle">
      
      <div class="titleblock">
        <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?> | 绯羽魔法店"><?php the_title(); ?></a>
      </div>
      <div class="ctitle">
        <span><i class="fa fa-user"></i>&nbsp;<?php the_author_posts_link(); ?></span>
        <?php _e('/ '); ?>
        <span><i class="fa fa-cube"></i>&nbsp;<?php the_category(',') ?></span>
        <?php _e('/ '); ?>
        <span><i class="fa fa-tags"></i>&nbsp;<?php  echo get_the_tag_list(' ',',');?></span>
        <?php _e('/ '); ?>
		<span><i class="fa fa-calendar">&nbsp;</i> <?php  the_time( 'Y-m-j' ); ?></span>
		<?php _e('/ '); ?>
		<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print ' '; } ?></span>
        <?php _e('/ '); ?>
        <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span>
        <?php edit_post_link('编辑','/ <i class="fa fa-edit"></i> '); ?>
    </div>
  </div>
      <div class="postcontent" id="post-<?php the_ID(); ?>">
          <?php if (is_home() || is_front_page() || is_author() || is_category() || is_search() || is_tag()) { ?>
                <div class="thumbpost hidden-xs" style="float:left;margin-right: 15px; margin-bottom: 15px; margin-left:15px;">
                <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="thumbpost" style="">
                 <?php the_content(); ?> 
                 </div>
                 <div class="clear"></div>
          <?php } else { ?>   
             <?php the_content(); ?> 
          <?php } ?> 
      </div>
    
</div>
 
<?php endwhile; ?>
 <!-- 上下翻页 -->
<div class="page_navi"><?php par_pagenavi(9); ?></div>
<?php else : ?>

    <div class="nofound">
        <?php _e('暂时没有发布任何文章哦。 Not Found'); ?>
    </div>

<?php endif; ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
</body>

</html>
