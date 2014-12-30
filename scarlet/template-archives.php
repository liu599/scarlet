<?php
/**
 * Template Name: 网站汇总
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
<section class="sitemap-module">
<div class="title"><i class="fa fa-anchor"></i>  快速跳转</div>
<div class="contentlist  widget_tag_cloud" style="z-index:99;position:relative;">
  <a href="#section1" class="btn btn-inverse">所有分类</a> <a href="#section2" class="btn btn-inverse">所有标签</a>
  <a href="#section3" class="btn btn-inverse">独立页面</a> <a href="#section4" class="btn btn-inverse">文章总集</a>     <a href="#section5" class="btn btn-inverse">文章存档</a>
</div>
</section>
<div class="pagefinal">
<div class="whiteclasspage" style="z-index:99;position:relative;">
						<section class="sitemap-module" id="section1">
							<div class="title"><i class="fa fa-folder"></i>  分 类</div>
							<div class="content">
								<?php
									$terms = get_terms('category', 'orderby=name&hide_empty=1' );
									$count = count($terms);
									if($count > 0){
										foreach ($terms as $term) {
											echo '<a href="'.get_term_link($term, $term->slug).'" class="btn btn-info">'.$term->name.'</a>';
										}
									}
								?>
							</div>
						</section>

						<section class="sitemap-module tags tagcloud"  id="section2">
							<div class="title"><i class="fa fa-tags"></i>  标 签</div>
							<div class="content widget_tag_cloud">
								<?php wp_tag_cloud( 'smallest=14&largest=14&orderby=count&unit=px&order=DESC' );?>
							</div>
						</section>

						<section class="sitemap-module" id="section3">
							<div class="title" ><i class="fa fa-file-code-o"></i>  页 面</div>
							<div class="content">
								<?php
									$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC&post_type=page');

									foreach($myposts as $post) :
										setup_postdata($post);
								?>
									<a href="<?php the_permalink(); ?>" class="btn btn-danger"><?php the_title(); ?></a>
								<?php endforeach; ?> 
							</div>
						</section>
</div>
<div class="whiteclassarticle">
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<section class="sitemap-module"   id="section4">
							<div class="title"><i class="fa fa-book"></i>  文 章</div>
							<div class="content">
								<?php
									$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');

									foreach($myposts as $post) :
										setup_postdata($post);
								?>
									<a href="<?php the_permalink(); ?>" class="btn btn-success"><?php the_title(); ?></a>
								<?php endforeach; ?>
							</div>
						</section>

		      <?php endwhile; ?>
		      
</div>
 <!--whiteclassend-->

</div>

<section class="sitemap-module"  id="section5">
<div class="title"><i class="fa fa-archive"></i>  归 档 </div>
<div id="archive_list">
          <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>        
            <?php wp_get_archives('type=monthly'); //zan_archives_list(); ?>
          <?php endwhile; ?>
</div>
<div class="title"><i class="fa fa-plane"></i>  有用的链接 </div>
<div id="link_list">
 <?php wp_list_bookmarks( 'title_li=&categorize=0' ); ?>
</div>
</section>


</div>
</div>
<div class="page_navi"><?php par_pagenavi(9); ?></div>
<div class="clear"></div>
<?php get_footer(); ?>
</body>
</html>