$('.next-page > a').on('click',function(){
var next_url = $(this).attr("href");
var next_text = $(this).text();
if(next_text == '加载更多'){
$(this).text('加载中...');
$.ajax({
type: 'get',
url: next_url + '#paging-aa',
success: function(data){
result = $(data).find(".paging-aa .excerpt-sticky");
next_link = $(data).find(".next-page > a").attr("href");
//$(this).attr("href", next_url);
if (next_link != undefined){
$('.next-page > a').attr("href", next_link);
$('.next-page > a').text('加载更多');
}else{
$(".next-page").remove();
}

$(function() {
if (next_url.indexOf("page") < 1) {
$(".paging-aa").html('');
}
$(".paging-aa").append(result.fadeIn(200));
});
}
});
}
return false;
});
$('.next-page > a').on('click',function(){
let handle = setInterval(function (){$("img.lazy").lazyload();$("div.lazy").lazyload();},500)
setTimeout(() => clearInterval(handle),10000)
});