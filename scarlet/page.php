<?php get_header(); ?>

<div class="mainoutput" id="freshcontent">
	
 <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="sac" style="background-color:#ffffff">
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
        <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </div>
      <div class="ctitle">
		<span><i class="fa fa-calendar">&nbsp;</i> <?php  the_time( 'Y-m-j' ); ?></span>
		<?php _e('/ '); ?>
		<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print ' '; } ?></span>
        <?php _e('/ '); ?>
        <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span>
        <?php edit_post_link('编辑','/ <i class="fa fa-edit"></i> '); ?>
    </div>
  </div>
      <div class="postcontent" id="post-<?php the_ID(); ?>">
            <?php the_content(); ?> 
      </div>
     <section class="comments">
			<h1>评论</h1>
			<div class="content">
			<?php
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
			else 
				echo "<p>评论关闭</p>";
			?>
			</div>
		</section>
</div>
 
<?php endwhile; ?>
 <!-- 上下翻页 -->
<div class="page_navi"><?php par_pagenavi(9); ?></div>
<?php else : ?>

    <div class="nofound">
        <?php _e('Not Found'); ?>
    </div>

<?php endif; ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>

</body>

</html>