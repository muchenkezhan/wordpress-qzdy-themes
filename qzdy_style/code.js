		    $(function(){
		        //给每一串代码元素增加复制代码节点
		        let preList = $(".markdown-body pre.pure-highlightjs");
		        for (let pre of preList) {
		            //给每个代码块增加上“复制代码”按钮
		            let btn = $("<span class=\"btn-pre-copy\" onclick='preCopy(this)'>复制代码</span><div class=\"hr\"></div>");
		            btn.prependTo(pre);
		        }
		    });
		    //执行复制代码操作
		    function preCopy(obj) {
		        //执行复制
		        let btn = $(obj);
		        let pre = btn.parent();
		        //为了实现复制功能。新增一个临时的textarea节点。使用他来复制内容
		        let temp = $("<textarea></textarea>");
		        //避免复制内容时把按钮文字也复制进去。先临时置空
		        btn.text("");
		        temp.text(pre.text());
		        temp.appendTo(pre);
		        temp.select();
		        document.execCommand("Copy");
		        temp.remove();
		        //修改按钮名
		        btn.text("复制成功");
		        //一定时间后吧按钮名改回来
		        setTimeout(()=> {
		            btn.text("复制代码");
		        },1500);
		    }
		  //  