<?php 
// og协议关键词
function og_tag() {
global $post;
global $tags;
$gettags = get_the_tags($post->ID);
if ($gettags) {
foreach ($gettags as $tag) {
$posttag[] = $tag->name;
}
$tags = implode( ',', $posttag );
}
		$seo_keywords = get_post_meta( get_the_ID(), 'opt-textseogjc', true );
		if(!empty($seo_keywords)){
		$description = $seo_keywords;
		} else{
		$description = $tags;
		}
		echo $description;
}
// og协议描述
function og_description() {
    global $post; 
    $my_content = strip_tags(get_the_excerpt(), $post->post_content);
    $my_content = str_replace(array("/r/n","/rn", "/r", "/n", " ", "&nbsp", "/t", "&#160;", "/x0B", "&nbsp;","[&hellip;]"),"",$my_content);
    $my_content = mb_strimwidth($my_content,0,240,"..." );
    $my_content = ltrim($my_content);
    $my_content = preg_replace("/(\s|\ \;|　|\xc2\xa0)/","",$my_content);
    // str_replace($search, $replace, $my_content);
		$seo_descriptions = get_post_meta( get_the_ID(), 'opt-textseoms', true );
		if(!empty($seo_descriptions)){
		$description = $seo_descriptions;
		} else{
		$description = $my_content;
		}
		echo $description;
}