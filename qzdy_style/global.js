
/*!
 * layui 官网
 */

layui.define(['code', 'element', 'table', 'util', 'carousel', 'laytpl'], function(exports){
  var $ = layui.jquery
  ,element = layui.element
  ,layer = layui.layer
  ,form = layui.form
  ,util = layui.util
  ,carousel = layui.carousel
  ,laytpl = layui.laytpl
  ,device = layui.device()

  ,$win = $(window), $body = $('body');


  //阻止 IE7 以下访问
  if(device.ie && device.ie < 8){
    layer.alert('qzdy 最低支持 IE8，而您当前使用的是古老的 IE'+ device.ie + '，体验将会不佳！');
  }

  var home = {
    //获取高级浏览器
    getBrowser: function(){
      var ua = navigator.userAgent.toLocaleLowerCase()
      ,mimeType = function(option, value) {
        var mimeTypes = navigator.mimeTypes;
        for (var key in mimeTypes) {
          if (mimeTypes[key][option] && mimeTypes[key][option].indexOf(value) !== -1) {
            return true;
          }
        }
        return;
      };
      if(ua.match(/chrome/)){
        if(mimeType('type', '360') || mimeType('type', 'sogou')) return;
        if(ua.match(/edg\//)) return 'edge';
        return 'chrome'
      } else if(ua.match(/firefox/)){
        return 'firefox';
      }
      
      return;
    }
  };

  var elemHome = $('#LAY_home');
  var local = layui.data('layui');

  //顶部轮播 TIPS
  var notice = function(options, elemParter){
    var local = layui.data('layui');

    options = options || {};

    if(device.mobile) return;

    //是否不显示 tips
    var keyName = 'notice_topnav_'+ options.key
    ,notParter = local[keyName] && new Date().getTime() - local[keyName] < (options.tipsInterval || 1000*60*30); //默认 30 分钟出现一次

    if(!options.tips) layer.close(layer.tipsIndex);

    if(!notParter && options.tips){
      var tipsIndex = layer.tipsIndex = layer.tips(
        ['<a href="'+ options.url +'" target="_blank" style="display: block; line-height: 30px; padding: 10px; text-align: center; font-size: 14px; background-image: linear-gradient(to right,#8510FF,#D025C2,#FF8B2D,#FF0036); color: #fff; '+ (options.tipsCss || '') +'">' 

          //阿里云经典：background-image: linear-gradient(to right,#8510FF,#D025C2,#FF8B2D,#FF0036);
          //阿里云活动：background-image: linear-gradient(to right,#8510FF,#D025C2,#F64E2C,#FF0036);
          
          //腾讯经典：background-image: linear-gradient(to right,#1242A4,#1746A1,#CFAE71,#1746A1);

          ,options.desc || ''
        ,'</a>'].join('')
        ,elemParter
        ,{
          tips: (options.tipsStyle ? new Function('return '+ options.tipsStyle)() : [3, '#9F17E9'])

          //阿里云经典：[3, '#9F17E9']
          //腾讯云经典：[3, '#1443A3'] //[3, '#803ED9'] 

          ,skin: 'layui-hide-xs'
          ,maxWidth: 320
          ,time: 0
          ,anim: 5
          ,tipeMore: true
          ,success: function(layero, index){
            layero.find('.layui-layer-content').css({
              'padding': 0
            });
            layero.find('a').on('click', function(){
              elemParter.trigger('click');
            });

            //隐藏小箭头
            var tipsG = layero.find('.layui-layer-TipsG');
            if(tipsG.css('left') !== '5px'){
              tipsG.hide();
            }

            //移动端样式
            if(elemParter.parent().css('display') === 'none'){
              layero.css({
                left: '50%'
                ,top: '80px'
                ,'margin-left': -(layero.width()/2)
              });
              tipsG.hide();
            }
          }
        }
      )
      //点击链接
      elemParter.on('click', function(){
        layui.data('layui', {
          key: keyName
          ,value: new Date().getTime()
        });
        layer.close(tipsIndex);
      });
    }

  };


  //Adsense
  ;!function(){
    var len = $('.adsbygoogle').length;
    try {
      for(var i = 0; i < len; i++){
        (adsbygoogle = window.adsbygoogle || []).push({});
      }
    } catch (e){
      console.error(e)
    }
  }();
    

//   //固定Bartop返回顶部
//   util.fixbar({
//     showHeight: 60
//     ,css: function(){
//       if(global.pageType === 'demo'){
//         return {bottom: 75}
//       }
//     }()
//   });
  
  //窗口scroll
  ;!function(){
    var main = $('.site-menu'), scroll = function(){
      var stop = $(window).scrollTop();

      if($(window).width() <= 992) return;
      var bottom = 0;

      if(stop > 60){ //211
        if(!main.hasClass('site-fix')){
          main.addClass('site-fix').css({
            width: main.parent().width()
          });
        }
      }else {     
        if(main.hasClass('site-fix')){
          main.removeClass('site-fix').css({
            width: 'auto'
          });
        }
      }
      stop = null;
    };
    scroll();
    $(window).on('scroll', scroll);
  }();

  //示例页面滚动
  $(window).on('scroll', function(){
    /*
    var elemDate = $('.layui-laydate,.layui-colorpicker-main')
    if(elemDate[0]){
      elemDate.each(function(){
        var othis = $(this);
        if(!othis.hasClass('layui-laydate-static')){
          othis.remove();
        }
      });
      $('input').blur();
    }
    */

    var elemTips = $('.layui-table-tips');
    if(elemTips[0]) elemTips.remove();

    if($('.layui-layer')[0]){
      layer.closeAll('tips');
    }
  });
  
  //代码修饰
//   layui.code({
//     elem: 'pre'
//   });
  
  //目录
  var siteDir = $('.site-dir');
  if(siteDir[0] && $(window).width() > 750){
    layer.ready(function(){
      layer.open({
        type: 1
        ,content: siteDir
        ,skin: 'layui-layer-dir'
        ,area: 'auto'
        ,maxHeight: $(window).height() - 300
        ,title: '目录'
        ,closeBtn: false
        ,offset: 'r'
        ,shade: false
        ,success: function(layero, index){
          layer.style(index, {
            marginLeft: -15
          });
        }
      });
    });
    siteDir.find('li').on('click', function(){
      var othis = $(this);
      othis.find('a').addClass('layui-this');
      othis.siblings().find('a').removeClass('layui-this');
    });
  }

  //在textarea焦点处插入字符
  var focusInsert = function(str){
    var start = this.selectionStart
    ,end = this.selectionEnd
    ,offset = start + str.length

    this.value = this.value.substring(0, start) + str + this.value.substring(end);
    this.setSelectionRange(offset, offset);
  };

  //演示页面
  $('body').on('keydown', '#LAY_editor, .site-demo-text', function(e){
    var key = e.keyCode;
    if(key === 9 && window.getSelection){
      e.preventDefault();
      focusInsert.call(this, '  ');
    }
  });

  var editor = $('#LAY_editor')
  ,iframeElem = $('#LAY_demo')
  ,runCodes = function(){
    if(!iframeElem[0]) return;
    var html = editor.val();

    var iframeDocument = iframeElem.prop('contentWindow').document;
    iframeDocument.open();
    iframeDocument.write(html);
    iframeDocument.close();

  };
  $('#LAY_demo_run').on('click', runCodes), runCodes();

  //让导航在最佳位置
  var setScrollTop = function(thisItem, elemScroll){
    if(thisItem[0]){
      var itemTop = thisItem.offset().top
      ,winHeight = $(window).height();
      if(itemTop > winHeight - 160){
        elemScroll.animate({'scrollTop': itemTop - winHeight/2}, 200);
      }
    }
  }

  //让选中的菜单保持在可视范围内
  util.toVisibleArea({
    scrollElem: $('.layui-side-scroll').eq(0)
    ,thisElem: $('.site-demo-nav').find('dd.layui-this')
  });

  util.toVisibleArea({
    scrollElem: $('.layui-side-scroll').eq(1)
    ,thisElem: $('.site-demo-table-nav').find('li.layui-this')
  });
  





  //手机设备的简单适配
  var treeMobile = $('.site-tree-mobile')
  ,shadeMobile = $('.site-mobile-shade')

  treeMobile.on('click', function(){
    $('body').addClass('site-mobile');
  });

  shadeMobile.on('click', function(){
    $('body').removeClass('site-mobile');
  });




  //获取文档图标数据
  home.getIconData = function(){
    var $ = layui.$
    ,iconData = []
    ,iconListElem = $('.site-doc-icon li');

    iconListElem.each(function(){
      var othis = $(this);
      iconData.push({
        title: $.trim(othis.find('.doc-icon-name').text())
        ,fontclass: $.trim(othis.find('.doc-icon-fontclass').text())
        ,unicode: $.trim(othis.find('.doc-icon-code').html())
      });
    });
    
    $('.site-h1').html('<textarea style="width: 100%; height: 600px;">'+ JSON.stringify(iconData) + '</textarea>');
  };


  exports('global', home);
});