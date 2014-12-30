<nav class="navbar navbar-default hidden-xs" 
role="navigation" style="margin-bottom:0;">
<!--
   <div class="navbar-header">
      <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="http://pic.nekohand.moe/1/dm/RPG5/RPG5.png" alt="<?php bloginfo('name'); ?>" height=30 /></a>
   </div>-->
   <div class="navigation">
               <?php 
               $defaults = array(
              'container' => '',
              'menu_class' => 'nav navbar-nav'
               );
               wp_nav_menu( $defaults );?>
<!--
<ul class="tools" id="findmebest">
<li class="sidebaropen"><main class="cd-main-content"><a href="#0" class="cd-btn" title="小工具"><i class="fa fa-paw"></i></i></a></main></li>
<div style="position:fixed;top:160px;">
<li class="qq"><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gru1srCwurayu8Lz86zh7e8" style="text-decoration:none;" title="Mail Me"><i class="fa fa-envelope"></i></a></li>
<li class="admin"><a href="<?php bloginfo('url'); ?>/wp-admin/" target="_blank" title="管理"><i class="fa fa-gears"></i></a></li>
<li class="music"><a href="#" title="页脚音乐"><i class="fa fa-music"></i></a></li>
<li class="diystyle"><a href="#" title="改变背景"><i class="fa fa-smile-o"></i></a></li>
<li class="search"><a href="#" title="搜索"><i class="fa fa-search"></i></a></li>
<li class="rss"><a href="<?php bloginfo('url'); ?>/feed" title="RSS"><i class="fa fa-rss"></i></a></li>
<div class="search-form" style="display: none; z-index:999; position:fixed; top:172px;"><form id="searchform" class="searchform" action="<?php bloginfo('url'); ?>" method="get" role="Search"><input class="box" id="s" type="text" name="s" x-webkit-speech lang="zh-HK" x-webkit-grammar="builtin:search" placeholder="搜索..." ></input>
</form></div>
</div>
</ul>-->
</div>
</nav>