
<div id="mplayer" style="padding:10px 10px;width:65%;position:fixed;bottom:5px;left:20%;z-index:998;background:url(http://pic.nekohand.moe/1/di/LCAA/LCAA.jpg) no-repeat;background-color: #f0f0f0;text-align:left;opacity:0.88;height:250px;display:none;">

<div role="tabpanel">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="panelmain">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> 电台-点击右侧图片启动播放器</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">小工具</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">精选</a></li>
 <!--   <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <div id="mp" style="width: 650px; height: 120px; overflow: hidden; border: none; position:relative; margin-left:1%;margin-top:40px;">
<iframe style="position: absolute; top: -175px; left: -45px;opacity:0.5;" scrolling="no" width = "1000 px" height = "1000 px" name="MyName"></iframe></div>
<a href="http://www.xiami.com/radio/play/type/4/oid/3731077" target="MyName"><img src="http://pic.nekohand.moe/1/di/NVL5/NVL5.png" alt="启动电台" class="img-rounded" style="float:right;margin-top:-115px;width:150px;margin-right:40px;"></a>
</div>
    <div role="tabpanel" class="tab-pane" id="profile">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
<?php endif; ?>
    </div>
   <div role="tabpanel" class="tab-pane" id="messages">
  
</div>
   </div>
<!--     <div role="tabpanel" class="tab-pane" id="settings">...</div>-->
  </div>

</div>

</div>