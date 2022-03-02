<script type="text/javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
<div class="qzdy-comments-tool-box ">
    <span class="qzdy-emoji">
<a class="btnqzdy">emoji表情<i class="layui-icon layui-icon-face-smile" style="font-size: 12px; color: #1E9FFF;"></i>  </a>
<div class="qrcode">
<a href="javascript:grin('😀')">😀</a>
<a href="javascript:grin('😃')">😃</a>
<a href="javascript:grin('😄')">😄</a>
<a href="javascript:grin('😁')">😁</a>
<a href="javascript:grin('😆')">😆</a>
<a href="javascript:grin('😅')">😅</a>
<a href="javascript:grin('😂')">😂</a>
<a href="javascript:grin('🤣')">🤣</a>
<a href="javascript:grin('☺️')">☺️</a>
<a href="javascript:grin('😇')">😇</a>
<a href="javascript:grin('🙂')">🙂</a>
<a href="javascript:grin('🙃')">🙃</a>
<a href="javascript:grin('😉')">😉</a>
<a href="javascript:grin('😌')">😌</a>
<a href="javascript:grin('😍')">😍</a>
<a href="javascript:grin('😘')">😘</a>
<a href="javascript:grin('😗')">😗</a>
<a href="javascript:grin('😙')">😙</a>
<a href="javascript:grin('😚')">😚</a>
<a href="javascript:grin('😋')">😋</a>
<a href="javascript:grin('😜')">😜</a>
<a href="javascript:grin('😝')">😝</a>
<a href="javascript:grin('😛')">😛</a>
<a href="javascript:grin('🤑')">🤑</a>
<a href="javascript:grin('🤓')">🤓</a>
<a href="javascript:grin('😎')">😎</a>
<a href="javascript:grin('🤡')">🤡</a>
<a href="javascript:grin('🤠')">🤠</a>
<a href="javascript:grin('😏')">😏</a>
<a href="javascript:grin('😒')">😒</a>
<a href="javascript:grin('🤗')">🤗</a>
<a href="javascript:grin('😞')">😞</a>
<a href="javascript:grin('😔')">😔</a>
<a href="javascript:grin('😟')">😟</a>
<a href="javascript:grin('😕')">😕</a>
<a href="javascript:grin('🙁')">🙁</a>
<a href="javascript:grin('☹️️')">☹️</a>
<a href="javascript:grin('😣')">😣</a>
<a href="javascript:grin('😖')">😖</a>	
<a href="javascript:grin('😫')">😫</a>	
<a href="javascript:grin('😩')">😩</a>	
<a href="javascript:grin('😤')">😤</a>	
<a href="javascript:grin('😠')">😠</a>	
<a href="javascript:grin('😡')">😡</a>	
<a href="javascript:grin('😶')">😶</a>	
<a href="javascript:grin('😐')">😐</a>	
<a href="javascript:grin('😑')">😑</a>	
<a href="javascript:grin('😯')">😯</a>	
<a href="javascript:grin('😦')">😦</a>	
<a href="javascript:grin('😧')">😧</a>	
<a href="javascript:grin('😮')">😮</a>	
<a href="javascript:grin('😲')">😲</a>	
<a href="javascript:grin('😵')">😵</a>	
<a href="javascript:grin('😳')">😳</a>	
<a href="javascript:grin('😱')">😱</a>	
<a href="javascript:grin('😨')">😨</a>	
<a href="javascript:grin('😰')">😰</a>	
<a href="javascript:grin('😢')">😢</a>	
<a href="javascript:grin('😥')">😥</a>	
<a href="javascript:grin('🤤')">🤤</a>	
<a href="javascript:grin('😭')">😭</a>	
<a href="javascript:grin('😓')">😓</a>	
<a href="javascript:grin('😪')">😪</a>	
<a href="javascript:grin('😴')">😴</a>	
<a href="javascript:grin('🙄')">🙄</a>	
<a href="javascript:grin('🤔')">🤔</a>	
<a href="javascript:grin('🤥')">🤥</a>	
<a href="javascript:grin('😬')">😬</a>	
<a href="javascript:grin('🤐')">🤐</a>	
<a href="javascript:grin('🤢')">🤢</a>	
<a href="javascript:grin('🤧')">🤧</a>	
<a href="javascript:grin('😷')">😷</a>	
<a href="javascript:grin('🤒')">🤒</a>	
<a href="javascript:grin('🤕')">🤕</a>	
<a href="javascript:grin('😣')">😣</a>
<a href="javascript:grin('😖')">😖</a>	
<a href="javascript:grin('😫')">😫</a>	
<a href="javascript:grin('😩')">😩</a>	
<a href="javascript:grin('😤')">😤</a>	
<a href="javascript:grin('😠')">😠</a>	
<a href="javascript:grin('😡')">😡</a>	
<a href="javascript:grin('😶')">😶</a>	
<a href="javascript:grin('😐')">😐</a>	
<a href="javascript:grin('😑')">😑</a>	
<a href="javascript:grin('😯')">😯</a>	
<a href="javascript:grin('😦')">😦</a>	
<a href="javascript:grin('😧')">😧</a>	
<a href="javascript:grin('😮')">😮</a>	
<a href="javascript:grin('😲')">😲</a>	
<a href="javascript:grin('😵')">😵</a>	
<a href="javascript:grin('😳')">😳</a>	
<a href="javascript:grin('😱')">😱</a>	
<a href="javascript:grin('😨')">😨</a>	
<a href="javascript:grin('😰')">😰</a>	
<a href="javascript:grin('😢')">😢</a>	
<a href="javascript:grin('😥')">😥</a>	
<a href="javascript:grin('🤤')">🤤</a>	
<a href="javascript:grin('😭')">😭</a>	
<a href="javascript:grin('😓')">😓</a>	
<a href="javascript:grin('😪')">😪</a>	
<a href="javascript:grin('😴')">😴</a>	
<a href="javascript:grin('🙄')">🙄</a>	
<a href="javascript:grin('🤔')">🤔</a>	
<a href="javascript:grin('🤥')">🤥</a>	
<a href="javascript:grin('😬')">😬</a>	
<a href="javascript:grin('🤐')">🤐</a>	
<a href="javascript:grin('🤢')">🤢</a>	
<a href="javascript:grin('🤧')">🤧</a>	
<a href="javascript:grin('😷')">😷</a>	
<a href="javascript:grin('🤒')">🤒</a>	
<a href="javascript:grin('🤕')">🤕</a>	
<a href="javascript:grin('😈')">😈</a>	
<a href="javascript:grin('👿')">👿</a>	
<a href="javascript:grin('👹')">👹</a>	
<a href="javascript:grin('👺')">👺</a>	
<a href="javascript:grin('💩')">💩</a>	
<a href="javascript:grin('👻')">👻</a>	
<a href="javascript:grin('💀')">💀</a>	
<a href="javascript:grin('☠️')">☠️</a>	
<a href="javascript:grin('👽')">👽</a>	
<a href="javascript:grin('👾')">👾</a>	
<a href="javascript:grin('🤖')">🤖</a>	
<a href="javascript:grin('🎃')">🎃</a>	
<a href="javascript:grin('😺')">😺</a>	
<a href="javascript:grin('😸')">😸</a>	
<a href="javascript:grin('😹')">😹</a>	
<a href="javascript:grin('😻')">😻</a>	
<a href="javascript:grin('😼')">😼</a>	
<a href="javascript:grin('😽')">😽</a>	
<a href="javascript:grin('🙀')">🙀</a>	
<a href="javascript:grin('😿')">😿</a>	
<a href="javascript:grin('😾')">😾</a>	
<a href="javascript:grin('👐🏻')">👐🏻</a>	
<a href="javascript:grin('🙌🏻')">🙌🏻</a>	
<a href="javascript:grin('👏🏻')">👏🏻</a>	
<a href="javascript:grin('🙏🏻')">🙏🏻</a>	
<a href="javascript:grin('🤝')">🤝</a>	
<a href="javascript:grin('👍')">👍</a>	
<a href="javascript:grin('👎🏻')">👎🏻</a>	
<a href="javascript:grin('👊🏻')">👊🏻</a>	
<a href="javascript:grin('✊🏻')">✊🏻</a>	
<a href="javascript:grin('🤛🏻')">🤛🏻</a>	
<a href="javascript:grin('🤜🏻')">🤜🏻</a>	
<a href="javascript:grin('🤞🏻')">🤞🏻</a>	
<a href="javascript:grin('✌🏻')">✌🏻</a>	
<a href="javascript:grin('🤘🏻')">🤘🏻</a>	
<a href="javascript:grin('👌')">👌</a>	
<a href="javascript:grin('👈🏻')">👈🏻</a>	
<a href="javascript:grin('👉🏻')">👉🏻</a>	
<a href="javascript:grin('👆🏻')">👆🏻</a>	
<a href="javascript:grin('👇🏻')">👇🏻</a>	
<a href="javascript:grin('☝🏻')">☝🏻</a>	
<a href="javascript:grin('✋🏻')">✋🏻</a>	
<a href="javascript:grin('🤚🏻')">🤚🏻</a>	
<a href="javascript:grin('🖐🏻')">🖐🏻</a>	
<a href="javascript:grin('🖖🏻')">🖖🏻</a>	
<a href="javascript:grin('👋🏻')">👋🏻</a>	
<a href="javascript:grin('🤙🏻')">🤙🏻</a>	
<a href="javascript:grin('💪🏻')">💪🏻</a>	
<a href="javascript:grin('🖕🏻')">🖕🏻</a>	
<a href="javascript:grin('✍🏻')">✍🏻</a>	
<a href="javascript:grin('🤳🏻')">🤳🏻</a>	
<a href="javascript:grin('💅🏻')">💅🏻</a>	
<a href="javascript:grin('💍')">💍</a>	
<a href="javascript:grin('💄')">💄</a>	
<a href="javascript:grin('💋')">💋</a>	
<a href="javascript:grin('👄')">👄</a>	
<a href="javascript:grin('👅')">👅</a>	
<a href="javascript:grin('👂🏻')">👂🏻</a>	
<a href="javascript:grin('👃🏻')">👃🏻</a>	
<a href="javascript:grin('👣')">👣</a>	
<a href="javascript:grin('👀')">👀</a>	
<a href="javascript:grin('👤')">👤</a>	
<a href="javascript:grin('👥')">👥</a>	
<a href="javascript:grin('👶🏻')">👶🏻</a>	
<a href="javascript:grin('👦🏻')">👦🏻</a>	
<a href="javascript:grin('👧🏻')">👧🏻</a>	
<a href="javascript:grin('👨🏻')">👨🏻</a>	
<a href="javascript:grin('👩🏻')">👩🏻</a>	
<a href="javascript:grin('👱🏻‍♀️')">👱🏻‍♀️</a>	
<a href="javascript:grin('👱🏻')">👱🏻</a>	
<a href="javascript:grin('👴🏻')">👴🏻</a>	
<a href="javascript:grin('👵🏻')">👵🏻</a>	
<a href="javascript:grin('👲🏻')">👲🏻</a>	
<a href="javascript:grin('👳🏻‍♀️')">👳🏻‍♀️</a>	
<a href="javascript:grin('👳🏻')">👳🏻</a>	
<a href="javascript:grin('👮🏻‍♀️')">👮🏻‍♀️</a>	
<a href="javascript:grin('👮🏻')">👮🏻</a>	
<a href="javascript:grin('👷🏻‍♀️')">👷🏻‍♀️</a>	
<a href="javascript:grin('👷🏻')">👷🏻</a>	
<a href="javascript:grin('💂🏻‍♀️')">💂🏻‍♀️</a>	
<a href="javascript:grin('💂🏻')">💂🏻</a>	
<a href="javascript:grin('🕵🏻‍♀️')">🕵🏻‍♀️</a>	
<a href="javascript:grin('🕵🏻')">🕵🏻</a>	
<a href="javascript:grin('👩🏻‍⚕️')">👩🏻‍⚕️</a>	
<a href="javascript:grin('👨🏻‍⚕️')">👨🏻‍⚕️</a>	
<a href="javascript:grin('👩🏻‍🌾')">👩🏻‍🌾</a>	
<a href="javascript:grin('👩🏻‍🍳')">👩🏻‍🍳</a>	
<a href="javascript:grin('👨🏻‍🍳')">👨🏻‍🍳</a>	
<a href="javascript:grin('👩🏻‍🎓')">👩🏻‍🎓</a>
</div></span></div>