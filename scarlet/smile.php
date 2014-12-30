<!-- 从此处开始是自定义表情 -->
<script type="text/javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
/*        if (document.getElementById('') && document.getElementById('message').type == 'textarea') {
    		myField = document.getElementById('message');
    	} else {
    		return false;
    	} */
        if (document.getElementById('comment')) {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag.replace('</a>',' ');
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag.replace('</a>',' ')
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag.replace('</a>',' ');
    		myField.focus();
    	}
    }
/* ]]> */
</script>



<div class="well" style="margin-top:5px;">
<h4>自定义表情</h4>
<a href="javascript:grin('(´・ω・｀)')"><img src="" alt="(´・ω・｀)" /></a>
<a href="javascript:grin('（・8・）')"> <img src="" alt="（・8・）" /></a>
<a href="javascript:grin('(°Д°)')"><img src="" alt="(°Д°)" /></a>
<a href="javascript:grin('хорошо!')"><img src="" alt="хорошо!" /></a>
<a href="javascript:grin('＼(^o^)／')"> <img src="" alt="＼(^o^)／" /></a>
<a href="javascript:grin('(￣3￣)')"> <img src="" alt="(￣3￣)" /></a>
<a href="javascript:grin(' (ノ=Д=)ノ┻━┻   ')"> <img src="" alt="  (ノ=Д=)ノ┻━┻  " /></a>
<a href="javascript:grin(' (｡◕∀◕｡)    ')"> <img src="" alt="    (｡◕∀◕｡)      "   /></a>
<br />
</div>
<!-- 结束 -->




