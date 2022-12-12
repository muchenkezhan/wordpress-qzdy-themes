<?php
function wpb_hook_javascript() {
    // 自动获取ico
if(!empty(_qzdy('zero-footer-youqinglink-ico'))){?>
<script type="text/javascript"> $(".linkpage ul li a,.widget_my_link .link div a,.youqing_link a").each(function(e){ $(this).prepend("<img src=<?php bloginfo('template_url'); ?>/grab_ico/get.php?url="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '').replace( 'http://', '' )+">"); });</script>
    <?php }
    // 幻灯片
if(is_home()){?>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  carousel.render({
    elem: '#test1'
    ,width: '100%'
    ,arrow: 'always' 
    //,anim: 'updown'
   ,arrow:'hover'
    ,indicator:'inside'
  });
});
</script>
 <?php }
 
 
 
 
 
 
 
 
 
 
 
if(isset($_COOKIE["HasLoaded"])){
$qzdy_gonggaocookie='1';}
// 弹窗
if(_qzdy('zero-index-gg-notice')&&$qzdy_gonggaocookie!='1'&& _qzdy('qzgg-switch-1') == 'yi'){?>
<?php if(_qzdy('zero-index-gg-zd-gb')){$ckfs='true';}else{$ckfs='false';}?>
	<script type="text/javascript" >
    function Cookie(key,value){
        this.key=key;
        if(value!=null)
        {
            this.value=escape(value);
        }
        this.expiresTime=null;
        this.domain=null;
        this.path="/";
        this.secure=null;
    }
    Cookie.prototype.setValue=function(value){this.value=escape(value);}
    Cookie.prototype.getValue=function(){return (this.value);}
    Cookie.prototype.setExpiresTime=function(time){this.expiresTime=time;}
    Cookie.prototype.getExpiresTime=function(){return this.expiresTime;}
    Cookie.prototype.setDomain=function(domain){this.domain=domain;}
    Cookie.prototype.getDomain=function(){return this.domain;}
    Cookie.prototype.setPath=function(path){this.path=path;}
    Cookie.prototype.getPath=function(){return this.path;}
    Cookie.prototype.Write=function(v){
        if(v!=null){
            this.setValue(v);
        }
        var ck=this.key+"="+this.value;
        if(this.expiresTime!=null){
            try {
                ck+=";expires="+this.expiresTime.toUTCString();;
            }
            catch(err){
            }
        }
        if(this.domain!=null){
            ck+=";domain="+this.domain;
        }
        if(this.path!=null){
            ck+=";path="+this.path;
        }
        if(this.secure!=null){
            ck+=";secure";
        }
        document.cookie=ck;
    }
    Cookie.prototype.Read=function(){
        try{
            var cks=document.cookie.split("; ");
            var i=0;
            for(i=0;i <cks.length;i++){
                var ck=cks[i];
                var fields=ck.split("=");
                if(fields[0]==this.key){
                    this.value=fields[1];
                    return (this.value);
                }
            }
            return null;
        }
        catch(err){
            return null;
        } }
var ck=new Cookie("HasLoaded");
    if(ck.Read()==null){
        setTimeout(function(){
          layui.message.info({
                    content: '<?php echo _qzdy('qzdy-index-gg-notice-content');?>',
                    closeable: true,
                     autoclose: <?php echo $ckfs;?>,
                    title: '<?php echo _qzdy('qzdy-index-gg-notice-title');?>',
                    position: 'right'
                })}, 500);
        var dd = new Date();
        dd = new Date(dd.getYear() + 1900, dd.getMonth(), dd.getDate());
        dd.setDate(dd.getDate() + 365);
        ck.setExpiresTime(dd);
        ck.Write("true"); 
    }
</script>

    <?php }
//页面层-自定义  全站公告
if(_qzdy('zero-index-gg-notice')&&$qzdy_gonggaocookie!='1'&& _qzdy('qzgg-switch-1') == 'er'){
$htmlstr=_qzdy('qzgg-qptc_2');
$str = str_replace(array("\r\n", "\r", "\n"), "", $htmlstr);
?>
	<script type="text/javascript" >
    function Cookie(key,value){
        this.key=key;
        if(value!=null)
        {
            this.value=escape(value);
        }
        this.expiresTime=null;
        this.domain=null;
        this.path="/";
        this.secure=null;
    }
    Cookie.prototype.setValue=function(value){this.value=escape(value);}
    Cookie.prototype.getValue=function(){return (this.value);}
    Cookie.prototype.setExpiresTime=function(time){this.expiresTime=time;}
    Cookie.prototype.getExpiresTime=function(){return this.expiresTime;}
    Cookie.prototype.setDomain=function(domain){this.domain=domain;}
    Cookie.prototype.getDomain=function(){return this.domain;}
    Cookie.prototype.setPath=function(path){this.path=path;}
    Cookie.prototype.getPath=function(){return this.path;}
    Cookie.prototype.Write=function(v){
        if(v!=null){
            this.setValue(v);
        }
        var ck=this.key+"="+this.value;
        if(this.expiresTime!=null){
            try {
                ck+=";expires="+this.expiresTime.toUTCString();;
            }
            catch(err){
            }
        }
        if(this.domain!=null){
            ck+=";domain="+this.domain;
        }
        if(this.path!=null){
            ck+=";path="+this.path;
        }
        if(this.secure!=null){
            ck+=";secure";
        }
        document.cookie=ck;
    }
    Cookie.prototype.Read=function(){
        try{
            var cks=document.cookie.split("; ");
            var i=0;
            for(i=0;i <cks.length;i++){
                var ck=cks[i];
                var fields=ck.split("=");
                if(fields[0]==this.key){
                    this.value=fields[1];
                    return (this.value);
                }
            }
            return null;
        }
        catch(err){
            return null;
        } }
var ck=new Cookie("HasLoaded");
    if(ck.Read()==null){
setTimeout(function(){
layer.open({
  type: 1,
  title: false,
  area: ['calc(100% - 15px)', 'auto'],
  closeBtn: 0,
  shadeClose: true,
  skin: 'qzdy-bomb-body',
  content: '<div class="qzdy-bomb-content"><h3 class="qzdy-bomb-title"><?php echo _qzdy('qzgg-qptc-1'); ?></h3><div><?php echo $str; ?></div></div>'});
}, 500);

        var dd = new Date();
        dd = new Date(dd.getYear() + 1900, dd.getMonth(), dd.getDate());
        dd.setDate(dd.getDate() + 365);
        ck.setExpiresTime(dd);
        ck.Write("true"); 
    }
</script>
    <?php
}
//页面层-自定义  全站公告
}
add_action('wp_footer', 'wpb_hook_javascript');