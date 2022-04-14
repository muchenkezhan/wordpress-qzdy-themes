layui.define(function (exports) {
    let $ = layui.$;
    let MODULE_NAME = 'message';

    let MESSAGE = function (opt) {
        this.modal = opt.modal == true ? true : opt.modal || false; 
        this.mask =  opt.mask == false ? false : opt.mask || true; 
        this.btns=opt.btn||['取消','确认'];       
        this.cancelName = this.btns[0] || '取消';    
        this.confirmName =this.btns.length<=1?this.btns[0]:this.btns[1] || '确认';    
        this.cancelEvent= opt.cancelEvent;           
        this.confirmEvent= opt.confirmEvent;        
        this.title = opt.title || '提示';            
        this.content = opt.content || false;         
        this.position = opt.position || 'center';     
        this.closeable = opt.closeable || false;     
        this.type = opt.type || 'info';                
        this.duration = opt.duration || 5;          
        this.autoclose = opt.autoclose == false ? false : opt.autoclose || true;   
    };

    let RightROOT = '<div class="l-message-right"></div>';
    let CenterROOT = '<div class="l-message-center"></div>';

    MESSAGE.isHasRoot = function (cls, dom) {
        if ($(cls).length <= 0) {
            $('body').append(dom);
        }
        return $(cls);
    };

    MESSAGE.prototype.render = function () {
        let icon = this.type == 'info' ? 'iconfont icon-info1' : this.type == 'warning' ? 'iconfont icon-info' : this.type == 'error' ? 'iconfont icon-cuowu' : this.type == 'question' ? 'iconfont icon-xunwen' : 'iconfont icon-chenggong';
        if (this.modal) {
            let id = new Date().getTime() + 'modal';
            let modalHtml = `<div class=" ${this.mask==true?'l-message-confirm-modalwrap':''} confirm-show  ${id}">`;
            modalHtml += '<div class="l-message-confirm-center">';
            modalHtml += `<div class="l-message-center-confirm ">`;
            modalHtml += `<div class="l-message-center-confirm-content confirm-${this.type}">`;
            modalHtml += '<div class="l-message-center-confirm-content-text">';
            modalHtml += `<span class="${icon}"></span><span class="l-message-center-confirm-title">${this.title}</span>`;
            modalHtml += !this.content ? '' : `<div class="l-message-center-confirm-desc">${this.content}</div>`;
            modalHtml += '</div>';
            modalHtml += this.closeable ? '<a class="l-message-confirm-content-x"><span class=" iconfont icon-cuowu"></span></a>' : '';
            modalHtml += '</div>';
            modalHtml += '<div class="l-message-center-confirm-floor">';
            modalHtml += this.btns.length>=2?`<span>${this.cancelName}</span>`:'';
            modalHtml += `<button>${this.confirmName}</button>`;
            modalHtml += '</div>';
            modalHtml += '</div>';
            modalHtml += '</div>';
            modalHtml += '</div>';

            $('body').append(modalHtml);

            let that =this;
            //自动关闭
            if (this.autoclose) {
                setTimeout(function () {
                    $('.' + id).addClass(`l-message-center-confirm-remove`);
                    setTimeout(() => { $('.' + id).remove(); }, 300);
                }, that.duration * 1000);
            }

            //确认框主动关闭
            $('.l-message-confirm-content-x').click(function () {
                $(this).parents(`.${id}`).addClass(`l-message-center-confirm-remove`);
                setTimeout(() => { $(this).parents(`.${id}`).remove(); }, 500);
            });

            //取消函数
            $('.' + id).find('.l-message-center-confirm-floor>span:first').click(function(){
                $(this).parents(`.${id}`).addClass(`l-message-center-confirm-remove`);
                setTimeout(() => { $(this).parents(`.${id}`).remove(); }, 500);
                typeof that.cancelEvent == 'function' ? that.cancelEvent() : '';
            });

            //确认函数
            $('.' + id).find('.l-message-center-confirm-floor>button:first').click(function(){
                $(this).parents(`.${id}`).addClass(`l-message-center-confirm-remove`);
                setTimeout(() => { $(this).parents(`.${id}`).remove(); }, 500);
                typeof that.confirmEvent == 'function' ? that.confirmEvent() : '';
            });
            return;
        }




        let dom = this.position == 'center' ? MESSAGE.isHasRoot('.l-message-center', CenterROOT) : MESSAGE.isHasRoot('.l-message-right', RightROOT);
        let id = new Date().getTime() + this.position;
        let html = `<div class="l-message-${this.position}-notice  ${id}  ${this.position}-show">`
        html += `<div class="l-message-${this.position}-notice-content notice-${this.type}">`;
        html += `<div class="l-message-${this.position}-notice-content-text">`;
        html += `<span class="${icon}"></span>`;
        html += `<span class="l-message-center-notice-title">${this.title}</span>`;
        html += !this.content ? '' : `<div class="l-message-${this.position}-notice-desc">${this.content}</div>`;
        html += '</div>';
        html += this.closeable ? '<a class="l-message-notice-content-x" "><span class="iconfont icon-cuowu"></span></a>' : '';
        html += '</div></div>';


        $(dom).append(html);

        let that = this;
        //自动关闭
        if (this.autoclose) {
            setTimeout(function () {
                $('.' + id).addClass(`l-message-${that.position}-notice-remove`);
                //setTimeout 在动画结束前或者结束后删除元素
                setTimeout(() => { $('.' + id).remove(); }, 300);
            }, that.duration * 1000);
        }

        //移除移入动画
        setTimeout(function () { $('.' + id).removeClass(`${that.position}-show`); }, 501);

        //点击主动关闭
        $('.l-message-notice-content-x').click(function () {
            $(this).parents(`.l-message-${that.position}-notice`).addClass(`l-message-${that.position}-notice-remove`);

            //setTimeout 在动画结束前或者结束后删除元素
            setTimeout(() => {
                $(this).parents(`.l-message-${that.position}-notice`).remove();
            }, 500);
        });
    }


    var obj = (function () {
        return {
            info: function (opt) {
                opt.type = 'info';
                new MESSAGE(opt).render();
            },
            success: function (opt) {
                opt.type = 'success';
                new MESSAGE(opt).render();
            },
            warning: function (opt) {
                opt.type = 'warning';
                new MESSAGE(opt).render();
            },
            error: function (opt) {
                opt.type = 'error';
                new MESSAGE(opt).render();
            },
            modalInfo:function(opt){
                opt.modal == true;
                opt.type = 'info';
                new MESSAGE(opt).render();
            },
            modalSuccess:function(opt){
                opt.type = 'success';
                opt.modal = true;
                new MESSAGE(opt).render();
            },
            modalWarning:function(opt){
                opt.type = 'warning';
                opt.modal = true;
                new MESSAGE(opt).render();
            },
            modalError:function(opt){
                opt.type = 'error';
                opt.modal = true;
                new MESSAGE(opt).render();
            },
            modalQuestion:function(opt){
                opt.type = 'question';
                opt.modal = true;
                new MESSAGE(opt).render();
            },
        }
    }());

    layui.link('module/message/message.css');
    layui.link('icon/iconfont.css');
    exports(MODULE_NAME, obj);
});