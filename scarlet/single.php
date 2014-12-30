<?php get_header(); ?>

<div class="mainoutput" id="freshcontent">

	
 <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<div class="sac">
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
         <?php edit_post_link('编辑','/ <i class="fa fa-edit"></i> '); ?>
    </div>
  </div>
      <div class="postcontent" id="post-<?php the_ID(); ?>">
            <?php the_content(); ?> 
      </div>
<!-- 上下翻页 -->
<!-- 分页 -->
		<div class="zan-page bs-example">
      <ul class="pager">
				<li class="previous"><span><?php previous_post_link('%link', '上一篇', TRUE); ?></span></li>
				<li class="next"><span><?php next_post_link('%link', '下一篇', TRUE); ?></span></li>
			</ul>
    </div>
    <!-- 分页 -->
		
		<!-- 文章版权信息 -->
		<div class="copyright alert alert-success">
			<p>
				版权属于:
				<?php
					if( get_post_meta( $post->ID, "版权属于", true ) ) {
						echo get_post_meta( $post->ID, "版权属于", true );
					}else {
						echo '<a href="';
						bloginfo('url');
						echo '">';
						bloginfo('name');
						echo '</a>';
					}
				?>
			</p>
			<p>
				原文地址:
				<?php
					if( get_post_meta( $post->ID, "原文地址", true ) ) {
						echo get_post_meta( $post->ID, "原文地址", true );
					} else {
						echo '<a href="';
						echo the_permalink().'">';
						echo the_permalink().'</a>';
					}
				?>
			</p>
			<p>转载时必须以链接形式注明原始出处及本声明。</p>
		</div>
		<!-- 文章版权信息结束 -->
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


<!-- 相关文章 -->
<div class="visible-md visible-lg" id="post-related">
	<div class="row">
		<div class="alert alert-danger related-title text-center"><i class="fa fa-rocket"></i> 相关文章 :</div>
			<?php 
			global $post;
			$cats = wp_get_post_categories( $post->ID );

			if ( $cats ) {
				$args = array(
								'category__in' => array( $cats[0] ),
								'post__not_in' => array( $post->ID ),
								'showposts' => 3,
				);
				query_posts( $args );

	    if ( have_posts()  ) {
						while ( have_posts() ) {
							the_post(); update_post_caches( $posts ); ?>				            
	            <div class="col-md-4">
	            <div class="thumbnail">
	              <div class="caption clearfix">
										<p class="post-related-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
										<p class="post-related-content"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?></p>
										<p><span><a class="btn btn-danger pull-right read-more" href="<?php the_permalink() ?>"  title="详细阅读 <?php the_title(); ?>">阅读全文</a></span></p>							
									</div>
	            </div>					                
	            </div>
	            <?php
	          }
	        }
			wp_reset_query(); } ?>
	</div>
</div>
<!-- 相关文章结束 -->
</div>

</div>
 
<?php endwhile; ?>
 
<?php else : ?>

    <div class="nofound">
        <?php _e('Not Found'); ?>
    </div>

<?php endif; ?>



<div class="clear"></div>
<?php get_footer(); ?>

</body>

</html>