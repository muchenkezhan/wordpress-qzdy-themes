// 评论判断
function focusEle(ele){
	$('#' + ele).focus();
}
function updateEle(ele,content){
	$('#' + ele).html(content);
}
function timestamp(){
	return new Date().getTime();
}
function sendinfo(url,node){
	updateEle(node,"<div><span style=\"background-color:#FFFFE5; color:#666666;\">加载中...</span></div>");
	$.ajax({
		method: 'GET',
		url: url,
		data: '',
		success: function (resp) {
			updateEle(node, resp);
		}
	});
}
function loadTwitterReply(url,tid){
	url = url+"&stamp=" + timestamp();
	var r = $("#r_" + tid);
	var rp = $("#rp_" + tid);
	if (!r.is(':hidden')){
		r.fadeOut();
		rp.fadeOut();
	} else {
		r.show();
		r.html('<span style=\"background-color:#FFFFE5;text-align:center;font-size:12px;color:#666666;\">加载中...</span>');
		$.ajax({
			method: 'GET',
			url: url,
			data: '',
			success: function (resp) {
				r.html(resp);
				rp.fadeIn();
			}
		});
	}
}
function reply(url,tid){
	var rtext=document.getElementById("rtext_"+tid).value;
	var rname=document.getElementById("rname_"+tid).value;
	var rcode=document.getElementById("rcode_"+tid).value;
	var rmsg=document.getElementById("rmsg_"+tid);
	var rn=document.getElementById("rn_"+tid);
	var r=document.getElementById("r_"+tid);
	var data = "r="+rtext+"&rname="+rname+"&rcode="+rcode+"&tid="+tid;
	XMLHttp.sendReq('POST',url,data,function(obj){
		if(obj.responseText == 'err1'){rmsg.innerHTML = '(回复长度需在140个字内)';
		}else if(obj.responseText == 'err2'){rmsg.innerHTML = '(昵称不能为空)';
		}else if(obj.responseText == 'err3'){rmsg.innerHTML = '(验证码错误)';
		}else if(obj.responseText == 'err4'){rmsg.innerHTML = '(不允许使用该昵称)';
		}else if(obj.responseText == 'err5'){rmsg.innerHTML = '(已存在该回复)';
		}else if(obj.responseText == 'err0'){rmsg.innerHTML = '(禁止回复)';
		}else if(obj.responseText == 'succ1'){rmsg.innerHTML = '(回复成功，等待管理员审核)';
		}else{r.innerHTML += obj.responseText;rn.innerHTML = Number(rn.innerHTML)+1;rmsg.innerHTML=''}});
}
function re(tid, rp){
	var rtext=document.getElementById("rtext_"+tid).value = rp;
	focusEle("rtext_"+tid);
}
function commentReply(pid,c){
	var response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = pid;
	document.getElementById('cancel-reply').style.display = '';
	c.parentNode.parentNode.appendChild(response);
}
function cancelReply(){
	var commentPlace = document.getElementById('comment-place'),response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = 0;
	document.getElementById('cancel-reply').style.display = 'none';
	commentPlace.appendChild(response);
}
            function copyContent(id){
                var copyCon = document.getElementById(id);
                copyCon.select(); 
                document.execCommand("Copy"); 
                 layer.msg("复制成功！");
            }
    $.fn.postLike = function() {
        if ($(this).hasClass('done')) {
            return false;
        } else {
            $(this).addClass('done');
            var id = $(this).data("id"),
            action = $(this).data('action'),
            rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "bigfa_like",
                um_id: id,
                um_action: action
            };
            $.post("/wp-admin/admin-ajax.php", ajax_data,
            function(data) {
                $(rateHolder).html(data);
            });
            return false;
        }
    };
    $(document).on("click", ".favorite",
    function() {
        $(this).postLike();
    });
    // title
    $(".demoStyle3").mouseover(function(event){
		var _this = $(this);
		_this.justToolsTip({
			events:event,
	        animation:"flipIn",
	        //width:"300px",
	        contents:$(this).text(),
	        gravity:'top'
	    });
	})
  $(function($) {
      $("div.lazy").lazyload({effect: "fadeIn"});
  });
  $(function($) {
      $("img.lazy").lazyload({effect: "fadeIn"});
  });
$(".widget_my_persona:first").addClass("intro");
 $(".widget_my_login:first").addClass("intro");
  $(".widget_my_persona_left:first").addClass("intro");
//   浮动小工具
  $(".sidebar > div:last-child").addClass("tool-float");
window.onload = function(){
    var now = new Date().getTime();
    var page_load_time = now-performance.timing.navigationStart;
    console.clear();
    console.log('%c页面加载完毕消耗了'+Math.round(performance.now()*100)/100+'ms','background:#fff;color:#333;text-shadow:0 0 2px #eee,0 0 3px #eee,0 0 3px #eee,0 0 2px #eee,0 0 3px #eee;');
        let key_style = 'color: #F7B334; background: #000000; font-size: 12px;border-radius:2px 0 0 2px;padding:3px 6px;';
    let value_style = 'border-radius:0 2px 2px 0;padding:3px 6px;color:#fff;background:#3399FF';
    console.log("%c项目托管%chttps://gitee.com/MUCEO/qzdy", key_style, value_style);
};
document.querySelector('#ssanniu').addEventListener('click', function() {
        $('#search-main').fadeIn();
    })
    document.querySelector('#ssannius').addEventListener('click', function() {
        $('#search-main').fadeIn();
    })
    document.querySelector('#head-ssannius').addEventListener('click', function() {
        $('#search-main').fadeIn();
    })
    document.querySelector('#search-main').addEventListener('click', function() {
        $('#search-main').fadeOut();
    })
     document.querySelector('.search-box').addEventListener('click', function() {
         event.stopPropagation();  
    })

//右下角浮动小工具
 // 向上滚动的函数
    $(function () {
        // 全屏代码
        $('#to_full').click(function () {
    var e = document.documentElement;
    $('body').hasClass('full-screen') ? (console.log(document), $('body').removeClass('full-screen'), $('#alarm-fullscreen-toggler').removeClass('active'), document.exitFullscreen ? document.exitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen ? document.webkitCancelFullScreen() : document.msExitFullscreen && document.msExitFullscreen()) : ($('body').addClass('full-screen'), $('#alarm-fullscreen-toggler').addClass('active'), e.requestFullscreen ? e.requestFullscreen() : e.mozRequestFullScreen ? e.mozRequestFullScreen() : e.webkitRequestFullscreen ? e.webkitRequestFullscreen() : e.msRequestFullscreen && e.msRequestFullscreen())
  
        });
// top代码
         $('#to_top').click(function () {
            $('html,body').animate({scrollTop: 0}, 500);
        });
        // 滚动出现
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#BackTop').fadeIn(300);
            } else {
                $('#BackTop').stop().fadeOut(300);
            }
        }).scroll();
    });
$(document).ready(function(){
// 侧边栏导航栏小ico标志
var html = '<i class="layui-icon layui-icon-triangle-d layui-nav-more"></i>';
$("#menu-menu-1 .menu-item-has-children>a").append(html);
}); 