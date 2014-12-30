<?php

if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
  die ('请不要直接加载该页面！');

if ( post_password_required() ) { ?>
  <p class="nocomments"><?php _e( '该评论需要权限查看，请输入密码。', 'contempo' ); ?></p>
<?php
  return;
}

?>
<div id="comments-template">
  <div class="comments-wrap">
    <div id="comments" data-url="<?php echo get_bloginfo("template_url") ?>/comment-ajax.php">
      <?php if ( have_comments() ) : ?>
        <h4 id="comments-title" class="comments-header"><i class="fa fa-comments"></i> 
        <?php comments_number( '现在暂无评论的说', '在本页面下面有 1 条评论<hr>', '在本页面下面有 % 条评论<hr>' );?></h4>
        <div id="loading-comments" style="display:none;"><i class="fa fa-spinner fa-spin"></i></div>
        <ol class="commentlist">
          <?php zan_get_commments_list( 70 ); ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav" class="clearfix">
          <div class='pagination pull-right'>
            <?php zan_comments_pagination(); ?>
          </div>
        </nav>
        <?php endif; ?>
      <?php else : ?>
      <?php if ( pings_open() && !comments_open() ) : ?>
        <p class="comments-closed pings-open"><?php _e( 'Comments are closed, but', 'contempo' ); ?> <a href="%1$s" title="<?php _e('Trackback URL for this post', 'contempo'); ?>"><?php _e( 'trackbacks', 'contempo' ); ?></a> <?php _e( 'and pingbacks are open.', 'contempo' ); ?></p>
      <?php elseif ( !comments_open() ) : ?>
        <p class="nocomments"><?php _e( '评论已经关闭。', 'contempo' ); ?></p>
      <?php endif; ?>
    <?php endif; ?>
    </div>
    <hr />
    <?php zan_comments_form(); ?>
    <?php include('smile.php'); ?>
  </div>
</div>