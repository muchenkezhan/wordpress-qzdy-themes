<?php 
 
class My_Widget_mbt extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => '模板兔插件');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-模板兔插件',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('随便看看') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
<ul class="widget-container">
	<?php 
		if(is_singular()){
	

			if(MBThemes_check_reply()){
			if(is_user_logged_in() || !_MBT('hide_user_all')){
			if(wp_is_erphpdown_active() && (MBThemes_post_down_position() == 'side' || MBThemes_post_down_position() == 'sidetop' || MBThemes_post_down_position() == 'boxside' || MBThemes_post_down_position() == 'sidebottom')){
				$erphp_down=get_post_meta(get_the_ID(), 'erphp_down', true);
				$start_down=get_post_meta(get_the_ID(), 'start_down', true);
				$start_down2=get_post_meta(get_the_ID(), 'start_down2', true);
				$start_see=get_post_meta(get_the_ID(), 'start_see', true);
				$start_see2=get_post_meta(get_the_ID(), 'start_see2', true);
				$days=get_post_meta(get_the_ID(), 'down_days', true);
				$price=get_post_meta(get_the_ID(), 'down_price', true);
				$price_type=get_post_meta(get_the_ID(), 'down_price_type', true);
				$url=get_post_meta(get_the_ID(), 'down_url', true);
				$urls=get_post_meta(get_the_ID(), 'down_urls', true);
				$url_free=get_post_meta(get_the_ID(), 'down_url_free', true);
				$memberDown=get_post_meta(get_the_ID(), 'member_down',TRUE);
				$hidden=get_post_meta(get_the_ID(), 'hidden_content', true);
				$demo=get_post_meta(get_the_ID(), 'demo', true);
				$demo_title=get_post_meta(get_the_ID(), 'demo_title', true);
				$demo_title = $demo_title?$demo_title:"在线演示";
				$userType=getUsreMemberType();
				$vip = '';$vip2 = '';$vip3 = '';$vip4 = '';$downMsg = '';$downMsgFree = '';$hasfree = 0;$downclass = '';$iframe = '';$down_checkpan = '';$yituan = '';$down_tuan=0; $down_repeat=0;$down_info_repeat=null;$down_info = null;
				$erphp_popdown = get_option('erphp_popdown');
				if($erphp_popdown){
					$downclass = ' erphpdown-down-layui';
					$iframe = '&iframe=1';
				}
				
				$down_repeat = get_post_meta(get_the_ID(), 'down_repeat', true);
				
				if(function_exists('erphpdown_tuan_install')){
					$down_tuan=get_post_meta(get_the_ID(), 'down_tuan', true);
				}

				$erphp_see2_style = get_option('erphp_see2_style');
				$erphp_life_name    = get_option('erphp_life_name')?get_option('erphp_life_name'):'终身VIP';
				$erphp_year_name    = get_option('erphp_year_name')?get_option('erphp_year_name'):'包年VIP';
				$erphp_quarter_name = get_option('erphp_quarter_name')?get_option('erphp_quarter_name'):'包季VIP';
				$erphp_month_name  = get_option('erphp_month_name')?get_option('erphp_month_name'):'包月VIP';
				$erphp_day_name  = get_option('erphp_day_name')?get_option('erphp_day_name'):'体验VIP';
				$erphp_vip_name  = get_option('erphp_vip_name')?get_option('erphp_vip_name'):'VIP';

				$erphp_url_front_vip = add_query_arg('action','vip',get_permalink(MBThemes_page("template/user.php")));
				if(get_option('erphp_url_front_vip')){
					$erphp_url_front_vip = get_option('erphp_url_front_vip');
				}

				$erphp_blank_domains = get_option('erphp_blank_domains')?get_option('erphp_blank_domains'):'pan.baidu.com';
				$erphp_colon_domains = get_option('erphp_colon_domains')?get_option('erphp_colon_domains'):'pan.baidu.com';

				if($down_tuan && is_user_logged_in()){
					global $current_user;
					$yituan = $wpdb->get_var("select ice_status from $wpdb->tuanorder where ice_user_id=".$current_user->ID." and ice_post=".get_the_ID()." and ice_status>0");
				}

				if($url_free){
					$hasfree = 1;
					echo '<div class="widget widget-erphpdown widget-erphpdown2 widget-erphpdown-free"><span class="erphpdown-free-title">免费下载</span>';
					$downList=explode("\r\n",$url_free);
					foreach ($downList as $k=>$v){
						$filepath = $downList[$k];
						if($filepath){

							if($erphp_colon_domains){
								$erphp_colon_domains_arr = explode(',', $erphp_colon_domains);
								foreach ($erphp_colon_domains_arr as $erphp_colon_domain) {
									if(strpos($filepath, $erphp_colon_domain)){
										$filepath = str_replace('：', ': ', $filepath);
										break;
									}
								}
							}

							
							$erphp_blank_domain_is = 0;
							if($erphp_blank_domains){
								$erphp_blank_domains_arr = explode(',', $erphp_blank_domains);
								foreach ($erphp_blank_domains_arr as $erphp_blank_domain) {
									if(strpos($filepath, $erphp_blank_domain)){
										$erphp_blank_domain_is = 1;
										break;
									}
								}
							}
							if(strpos($filepath,',')){
								$filearr = explode(',',$filepath);
								$arrlength = count($filearr);
								if($arrlength == 1){
									$downMsgFree.="<div class='item item2'><a href='".$filepath."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
								}elseif($arrlength == 2){
									$downMsgFree.="<div class='item item2'>".$filearr[0]."<a href='".$filearr[1]."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
								}elseif($arrlength == 3){
									$filearr2 = str_replace('：', ': ', $filearr[2]);
									$downMsgFree.="<div class='item item2'>".$filearr[0]."<a href='".$filearr[1]."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>".$filearr2."<a class='erphpdown-copy' data-clipboard-text='".str_replace('提取码: ', '', $filearr2)."' href='javascript:;'>复制</a></div>";
								}
							}elseif(strpos($filepath,'  ') && $erphp_blank_domain_is){
								$filearr = explode('  ',$filepath);
								$arrlength = count($filearr);
								if($arrlength == 1){
									$downMsgFree.="<div class='item item2'><a href='".$filepath."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
								}elseif($arrlength >= 2){
									$filearr2 = explode(':',$filearr[0]);
									$filearr3 = explode(':',$filearr[1]);
									$downMsgFree.="<div class='item item2'>".$filearr2[0]."<a href='".trim($filearr2[1].':'.$filearr2[2])."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>提取码: ".trim($filearr3[1])."<a class='erphpdown-copy' data-clipboard-text='".trim($filearr3[1])."' href='javascript:;'>复制</a></div>";
								}
							}elseif(strpos($filepath,' ') && $erphp_blank_domain_is){
								$filearr = explode(' ',$filepath);
								$arrlength = count($filearr);
								if($arrlength == 1){
									$downMsgFree.="<div class='item item2'><a href='".$filepath."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
								}elseif($arrlength == 2){
									$downMsgFree.="<div class='item item2'>".$filearr[0]."<a href='".$filearr[1]."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
								}elseif($arrlength >= 3){
									$downMsgFree.="<div class='item item2'>".str_replace(':', '', $filearr[0])."<a href='".$filearr[1]."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>".$filearr[2].' '.$filearr[3]."<a class='erphpdown-copy' data-clipboard-text='".$filearr[3]."' href='javascript:;'>复制</a></div>";
								}
							}else{
								$downMsgFree.="<div class='item item2'><a href='".$filepath."' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
							}
						}
					}
					echo $downMsgFree;
		            
					if(get_option('ice_tips_free')) echo '<div class="tips">'.get_option('ice_tips_free').'</div>';

					if(!$start_see && !$start_see2 && !$start_down && !$start_down2 && $erphp_down != '6'){
						if(function_exists('get_field_objects')){
			                $fields = get_field_objects();
			                if( $fields ){
			                	uasort($fields,'mbt_compare_field');
			                	echo '<div class="custom-metas">';
			                    foreach( $fields as $field_name => $field ){
			                    	if($field['value']){
				                        echo '<div class="meta">';
				                            echo '<span>' . $field['label'] . '：</span>';
				                            if(is_array($field['value'])){
				                            	if($field['type'] == 'link'){
				                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
				                            	}elseif($field['type'] == 'taxonomy'){
				                            		$tax_html = '';
				                            		foreach ($field['value'] as $tax) {
				                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
				                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
				                            		}
				                            		echo rtrim($tax_html, ', ');
				                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
				                            		foreach ($field['value'] as $postr) {
														$field_value = mbt_object_to_array($postr);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
					                            	}
					                            }else{
													echo implode(',', $field['value']);
												}
											}elseif(is_object($field['value'])){
												if($field['type'] == 'post_object'){
													$field_value = mbt_object_to_array($field['value']);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
				                            	}
											}else{
												if($field['type'] == 'radio'){
													$vv = $field['value'];
													echo $field['choices'][$vv];
												}else{
													echo $field['value'].$field['append'];
												}
											}
				                        echo '</div>';
				                    }
			                    }
			                    echo '</div>';
			                }
			            }
					}

					echo '</div>';
				}

				if($start_down){
					echo '<div class="widget widget-erphpdown">';

					if(_MBT('post_price_logged') && !is_user_logged_in() && ( !(!$price && $memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9) || (!$price && $memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9 && get_option('erphp_free_login')) ) ){
						echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
						if(_MBT('post_sidefav')){
							echo '<div class="demos">';
							if($demo){
								echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
								if(is_user_logged_in()){
				            		if(MBThemes_check_collect(get_the_ID())){
										echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
									}else{
										echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
									}
								}else{
									echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
								}
							}else{
								if(is_user_logged_in()){
				            		if(MBThemes_check_collect(get_the_ID())){
										echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
									}else{
										echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
									}
								}else{
									echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
								}
							}
							echo '</div>';
						}

						if(function_exists('get_field_objects')){
			                $fields = get_field_objects();
			                if( $fields ){
			                	uasort($fields,'mbt_compare_field');
			                	echo '<div class="custom-metas">';
			                    foreach( $fields as $field_name => $field ){
			                    	if($field['value']){
				                        echo '<div class="meta">';
				                            echo '<span>' . $field['label'] . '：</span>';
				                            if(is_array($field['value'])){
				                            	if($field['type'] == 'link'){
				                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
				                            	}elseif($field['type'] == 'taxonomy'){
				                            		$tax_html = '';
				                            		foreach ($field['value'] as $tax) {
				                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
				                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
				                            		}
				                            		echo rtrim($tax_html, ', ');
				                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
				                            		foreach ($field['value'] as $postr) {
														$field_value = mbt_object_to_array($postr);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
					                            	}
					                            }else{
													echo implode(',', $field['value']);
												}
											}elseif(is_object($field['value'])){
												if($field['type'] == 'post_object'){
													$field_value = mbt_object_to_array($field['value']);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
				                            	}
											}else{
												if($field['type'] == 'radio'){
													$vv = $field['value'];
													echo $field['choices'][$vv];
												}else{
													echo $field['value'].$field['append'];
												}
											}
				                        echo '</div>';
				                    }
			                    }
			                    echo '</div>';
			                }
			            }
					}else{

						if($down_tuan == '2' && function_exists('erphpdown_tuan_install')){
							$tuanHtml = erphpdown_tuan_modown_html();
							echo $tuanHtml;
							if(_MBT('post_sidefav')){
								echo '<div class="demos">';
								if($demo){
									echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
									if(is_user_logged_in()){
					            		if(MBThemes_check_collect(get_the_ID())){
											echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
										}else{
											echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
										}
									}else{
										echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
									}
								}else{
									if(is_user_logged_in()){
					            		if(MBThemes_check_collect(get_the_ID())){
											echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
										}else{
											echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
										}
									}else{
										echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
									}
								}
								echo '</div>';
							}

							if(function_exists('get_field_objects')){
				                $fields = get_field_objects();
				                if( $fields ){
				                	uasort($fields,'mbt_compare_field');
				                	echo '<div class="custom-metas">';
				                    foreach( $fields as $field_name => $field ){
				                    	if($field['value']){
					                        echo '<div class="meta">';
					                            echo '<span>' . $field['label'] . '：</span>';
					                            if(is_array($field['value'])){
					                            	if($field['type'] == 'link'){
					                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
					                            	}elseif($field['type'] == 'taxonomy'){
					                            		$tax_html = '';
					                            		foreach ($field['value'] as $tax) {
					                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
					                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
					                            		}
					                            		echo rtrim($tax_html, ', ');
					                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
					                            		foreach ($field['value'] as $postr) {
															$field_value = mbt_object_to_array($postr);
						                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
						                            	}
						                            }else{
														echo implode(',', $field['value']);
													}
												}elseif(is_object($field['value'])){
													if($field['type'] == 'post_object'){
														$field_value = mbt_object_to_array($field['value']);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
					                            	}
												}else{
													if($field['type'] == 'radio'){
														$vv = $field['value'];
														echo $field['choices'][$vv];
													}else{
														echo $field['value'].$field['append'];
													}
												}
					                        echo '</div>';
					                    }
				                    }
				                    echo '</div>';
				                }
				            }
						}else{
							if($price_type){
								if($urls){
									$cnt = count($urls['index']);
			            			if($cnt){
			            				for($i=0; $i<$cnt;$i++){
			            					$index = $urls['index'][$i];
			            					$index_name = $urls['name'][$i];
			            					$price = $urls['price'][$i];
			            					$index_url = $urls['url'][$i];
			            					$index_vip = $urls['vip'][$i];

			            					$indexMemberDown = $memberDown;
			            					if($index_vip){
			            						$indexMemberDown = $index_vip;
			            					}

			            					$down_checkpan = '';
			            					if(function_exists('epd_check_pan_callback')){
												if(strpos($index_url,'pan.baidu.com') !== false || (strpos($index_url,'lanzou') !== false && strpos($index_url,'.com') !== false) || strpos($index_url,'cloud.189.cn') !== false){
													$down_checkpan = '<a class="down erphpdown-buy erphpdown-checkpan" href="javascript:;" data-id="'.get_the_ID().'" data-index="'.$index.'" data-buy="'.constant("erphpdown").'buy.php?postid='.get_the_ID().'&index='.$index.'">点击检测网盘有效后购买</a>';
												}
											}

			            					echo '<div class="erphpdown-child"><span class="erphpdown-child-title">'.$index_name.'</span>';
			            					if($price){
												if($indexMemberDown != 4 && $indexMemberDown != 15 && $indexMemberDown != 8 && $indexMemberDown != 9){
													echo '<div class="item price"><span>'.$price.'</span> '.get_option("ice_name_alipay").'</div>';
												}else{
													if($indexMemberDown == 4){
														echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
													}elseif($indexMemberDown == 15){
														echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
													}elseif($indexMemberDown == 8){
														echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
													}elseif($indexMemberDown == 9){
														echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
													}
												}
											}else{
												if($indexMemberDown != 4 && $indexMemberDown != 15 && $indexMemberDown != 8 && $indexMemberDown != 9){
													echo '<div class="item price"><span>免费</span></div>';
												}else{
													if($indexMemberDown == 4){
														echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
													}elseif($indexMemberDown == 15){
														echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
													}elseif($indexMemberDown == 8){
														echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
													}elseif($indexMemberDown == 9){
														echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
													}
												}
											}
											if($price || $indexMemberDown == 4 || $indexMemberDown == 15 || $indexMemberDown == 8 || $indexMemberDown == 9){
												if(is_user_logged_in()){
													$user_info=wp_get_current_user();
													$down_info=$wpdb->get_row("select * from ".$wpdb->icealipay." where ice_post='".get_the_ID()."' and ice_success=1 and ice_index='".$index."' and ice_user_id=".$user_info->ID." order by ice_time desc");
													if($days > 0 && $down_info){
														$lastDownDate = date('Y-m-d H:i:s',strtotime('+'.$days.' day',strtotime($down_info->ice_time)));
														$nowDate = date('Y-m-d H:i:s');
														if(strtotime($nowDate) > strtotime($lastDownDate)){
															$down_info = null;
														}
													}

													if($down_repeat){
														$down_info_repeat = $down_info;
														$down_info = null;
													}

													$buyText = '<i class="icon icon-work"></i> 立即购买';
													if($down_repeat && $down_info_repeat && !$down_info){
														$buyText = '<i class="icon icon-work"></i> 再次购买';
													}

													if(!$down_info){
														if(!$userType){
															$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_vip_name.'</a>';
														}else{
															if(($indexMemberDown == 13 || $indexMemberDown == 14) && $userType < 10){
																$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
															}
														}
														if($userType < 8){
															$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_quarter_name.'</a>';
														}
														if($userType < 9){
															$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_year_name.'</a>';
														}
														if($userType < 10){
															$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
														}
													}else{
														$downclass .= ' bought';
													}

													if( ($userType && ($indexMemberDown==3 || $indexMemberDown==4)) || $down_info || (($indexMemberDown==15 || $indexMemberDown==16) && $userType >= 8) || (($indexMemberDown==6 || $indexMemberDown==8) && $userType >= 9) || (($indexMemberDown==7 || $indexMemberDown==9 || $indexMemberDown==13 || $indexMemberDown==14) && $userType == 10) || (!$price && $indexMemberDown!=4 && $indexMemberDown!=15 && $indexMemberDown!=8 && $indexMemberDown!=9)){

														if($indexMemberDown==3){
															echo '<div class="item vip">'.$erphp_vip_name.'免费</div>';
														}elseif($indexMemberDown==2){
															echo '<div class="item vip">'.$erphp_vip_name.' 5折</div>';
														}elseif($indexMemberDown==13){
															echo '<div class="item vip">'.$erphp_vip_name.' 5折、'.$erphp_life_name.'免费</div>';
														}elseif($indexMemberDown==5){
															echo '<div class="item vip">'.$erphp_vip_name.' 8折</div>';
														}elseif($indexMemberDown==14){
															echo '<div class="item vip">'.$erphp_vip_name.' 8折、'.$erphp_life_name.'免费</div>';
														}elseif($indexMemberDown==16){
															echo '<div class="item vip">'.$erphp_quarter_name.'免费</div>';
														}elseif($indexMemberDown==6){
															echo '<div class="item vip">'.$erphp_year_name.'免费</div>';
														}elseif($indexMemberDown==7){
															echo '<div class="item vip">'.$erphp_life_name.'免费</div>';
														}elseif($indexMemberDown==4){
															echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载</div>';
														}elseif($indexMemberDown==15){
															echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载</div>';
														}elseif($indexMemberDown == 8){
															echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载</div>';
														}elseif($indexMemberDown == 9){
															echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载</div>';
														}elseif ($indexMemberDown==10){
															echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买</div>';
														}elseif ($indexMemberDown==11){
															echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折</div>';
														}elseif ($indexMemberDown==12){
															echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折</div>';
														}

														echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().'&index='.$index.$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';

													}else{

														if($indexMemberDown==3){
															echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span>'.$vip.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==2){
															echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==13){
															echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==5){
															echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==14){
															echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==16){
															echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.$vip4.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==6){
															echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.$vip2.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}elseif($indexMemberDown==7){
															echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
														}

														if($indexMemberDown==4){
															echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载'.$vip.'</div>';
														}elseif($indexMemberDown==8){
															echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载'.$vip2.'</div>';
														}elseif($indexMemberDown==15){
															echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载'.$vip4.'</div>';
														}elseif($indexMemberDown==9){
															echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载'.$vip3.'</div>';
														}elseif($indexMemberDown==10){
															if($userType){
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
																if($down_checkpan) echo $down_checkpan;
																else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().'&index='.$index.' class="down erphpdown-iframe">'.$buyText.'</a>';
															}else{
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
															}
														}elseif($indexMemberDown==11){
															if($userType){
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
																if($down_checkpan) echo $down_checkpan;
																else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().'&index='.$index.' class="down erphpdown-iframe">'.$buyText.'</a>';
															}else{
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
															}
														}elseif($indexMemberDown==12){
															if($userType){
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
																if($down_checkpan) echo $down_checkpan;
																else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().'&index='.$index.' class="down erphpdown-iframe">'.$buyText.'</a>';
															}else{
																echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
															}
														}else{
															
															if($down_checkpan){
																echo $down_checkpan;
															}else{
																echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().'&index='.$index.' class="down erphpdown-iframe">'.$buyText.'</a>';
															}
															
														}
													}
												}else{
													$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_vip_name.'</a>';
													$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_quarter_name.'</a>';
													$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_year_name.'</a>';
													$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';

													if($indexMemberDown==3){
														echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span><span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==2){
														echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span><span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==13){
														echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==5){
														echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span><span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==14){
														echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==16){
														echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.$vip4.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==6){
														echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.$vip2.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==7){
														echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
													}elseif($indexMemberDown==4){
														echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载</div>';
													}elseif($indexMemberDown == 15){
														echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载</div>';
													}elseif($indexMemberDown == 8){
														echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载</div>';
													}elseif($indexMemberDown == 9){
														echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载</div>';
													}elseif ($indexMemberDown==10){
														echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买</div>';
													}elseif ($indexMemberDown==11){
														echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折</div>';
													}elseif ($indexMemberDown==12){
														echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折</div>';
													}

													echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
												}
											}else{
												if(is_user_logged_in()){
													if($indexMemberDown != 4 && $indexMemberDown != 15 && $indexMemberDown != 8 && $indexMemberDown != 9){
														echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().'&index='.$index.$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
													}
												}else{
													echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
												}
											}
											if(get_option('erphp_repeatdown_btn') && $down_repeat && $down_info_repeat && !$down_info){
												echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().'&index='.$index.$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
											}
			            					echo '</div>';
			            				}
			            			}
			            		}
							}else{
								$priceTag = '';
								if(function_exists('erphpdown_tuan_install') && $down_tuan){
									$priceTag = '<font class="xz">下载价</font>';
									echo erphpdown_tuan_modown_html();
								}

								if(function_exists('epd_check_pan_callback')){
									if(strpos($url,'pan.baidu.com') !== false || (strpos($url,'lanzou') !== false && strpos($url,'.com') !== false) || strpos($url,'cloud.189.cn') !== false){
										$down_checkpan = '<a class="down erphpdown-buy erphpdown-checkpan" href="javascript:;" data-id="'.get_the_ID().'" data-index="'.$index.'" data-buy="'.constant("erphpdown").'buy.php?postid='.get_the_ID().'">点击检测网盘有效后购买</a>';
									}
								}

								if($price){
									if($memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9){
										echo '<div class="item price">'.$priceTag.'<span>'.$price.'</span> '.get_option("ice_name_alipay").'</div>';
									}else{
										if($memberDown == 4){
											echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
										}elseif($memberDown == 15){
											echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
										}elseif($memberDown == 8){
											echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
										}elseif($memberDown == 9){
											echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
										}
									}
								}else{
									if($memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9){
										echo '<div class="item price"><span>免费</span></div>';
									}else{
										if($memberDown == 4){
											echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
										}elseif($memberDown == 15){
											echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
										}elseif($memberDown == 8){
											echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
										}elseif($memberDown == 9){
											echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
										}
									}
								}

								if($price || $memberDown == 4 || $memberDown == 15 || $memberDown == 8 || $memberDown == 9){
									if(is_user_logged_in()){
										$user_info=wp_get_current_user();
										$down_info=$wpdb->get_row("select * from ".$wpdb->icealipay." where ice_post='".get_the_ID()."' and ice_success=1 and (ice_index is null or ice_index = '') and ice_user_id=".$user_info->ID." order by ice_time desc");
										if($days > 0 && $down_info){
											$lastDownDate = date('Y-m-d H:i:s',strtotime('+'.$days.' day',strtotime($down_info->ice_time)));
											$nowDate = date('Y-m-d H:i:s');
											if(strtotime($nowDate) > strtotime($lastDownDate)){
												$down_info = null;
											}
										}

										if($down_repeat){
											$down_info_repeat = $down_info;
											$down_info = null;
										}

										$buyText = '<i class="icon icon-work"></i> 立即购买';
										if($down_repeat && $down_info_repeat && !$down_info){
											$buyText = '<i class="icon icon-work"></i> 再次购买';
										}

										if(!$down_info){
											if(!$userType){
												$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_vip_name.'</a>';
											}else{
												if(($memberDown == 13 || $memberDown == 14) && $userType < 10){
													$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
												}
											}
											if($userType < 8){
												$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_quarter_name.'</a>';
											}
											if($userType < 9){
												$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_year_name.'</a>';
											}
											if($userType < 10){
												$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
											}
										}else{
											$downclass .= ' bought';
										}

										$user_id = $user_info->ID;
										$wppay = new EPD(get_the_ID(), $user_id);

										if( ($userType && ($memberDown==3 || $memberDown==4)) || (($wppay->isWppayPaid() || $wppay->isWppayPaidNew()) && !$down_repeat) || $down_info || (($memberDown==15 || $memberDown==16) && $userType >= 8) || (($memberDown==6 || $memberDown==8) && $userType >= 9) || (($memberDown==7 || $memberDown==9 || $memberDown==13 || $memberDown==14) && $userType == 10) || (!$price && $memberDown!=4 && $memberDown!=15 && $memberDown!=8 && $memberDown!=9)){

											if($memberDown==3){
												echo '<div class="item vip">'.$erphp_vip_name.'免费</div>';
											}elseif($memberDown==2){
												echo '<div class="item vip">'.$erphp_vip_name.' 5折</div>';
											}elseif($memberDown==13){
												echo '<div class="item vip">'.$erphp_vip_name.' 5折、'.$erphp_life_name.'免费</div>';
											}elseif($memberDown==5){
												echo '<div class="item vip">'.$erphp_vip_name.' 8折</div>';
											}elseif($memberDown==14){
												echo '<div class="item vip">'.$erphp_vip_name.' 8折、'.$erphp_life_name.'免费</div>';
											}elseif($memberDown==16){
												echo '<div class="item vip">'.$erphp_quarter_name.'免费</div>';
											}elseif($memberDown==6){
												echo '<div class="item vip">'.$erphp_year_name.'免费</div>';
											}elseif($memberDown==7){
												echo '<div class="item vip">'.$erphp_life_name.'免费</div>';
											}elseif($memberDown==4){
												echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载</div>';
											}elseif($memberDown == 15){
												echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载</div>';
											}elseif($memberDown == 8){
												echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载</div>';
											}elseif($memberDown == 9){
												echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载</div>';
											}elseif ($memberDown==10){
												echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买</div>';
											}elseif ($memberDown==11){
												echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折</div>';
											}elseif ($memberDown==12){
												echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折</div>';
											}

											echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';

										}else{

											if($memberDown==3){
												echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span>'.$vip.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==2){
												echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==13){
												echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==5){
												echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==14){
												echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==16){
												echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.$vip4.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==6){
												echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.$vip2.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}elseif($memberDown==7){
												echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
											}

											if($memberDown==4){
												echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载'.$vip.'</div>';
											}elseif($memberDown==15){
												echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载'.$vip4.'</div>';
											}elseif($memberDown==8){
												echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载'.$vip2.'</div>';
											}elseif($memberDown==9){
												echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载'.$vip3.'</div>';
											}elseif($memberDown==10){
												if($userType){
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
													if($down_checkpan) echo $down_checkpan;
													else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe">'.$buyText.'</a>';
												}else{
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
												}
											}elseif($memberDown==11){
												if($userType){
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
													if($down_checkpan) echo $down_checkpan;
													else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe">'.$buyText.'</a>';
												}else{
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
												}
											}elseif($memberDown==12){
												if($userType){
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
													if($down_checkpan) echo $down_checkpan;
													else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe">'.$buyText.'</a>';
												}else{
													echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
												}
											}else{
												
												if($down_checkpan){
													echo $down_checkpan;
												}else{
													echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe">'.$buyText.'</a>';
												}

											}
										}
									}else{

										$isWppayPaid = 0;
										if(get_option('erphp_wppay_down')){
											$user_id = 0;
											$wppay = new EPD(get_the_ID(), $user_id);
											if($wppay->isWppayPaid() || $wppay->isWppayPaidNew()){
												$isWppayPaid = 1;
											}else{
												$isWppayPaid = 2;
											}
										}
										$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_vip_name.'</a>';
										$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_quarter_name.'</a>';
										$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_year_name.'</a>';
										$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_life_name.'</a>';

										if($memberDown==3){
											echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==2){
											echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==13){
											echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.($isWppayPaid != 1?$vip3:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==5){
											echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==14){
											echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.($isWppayPaid != 1?$vip3:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==16){
											echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.($isWppayPaid != 1?$vip4:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==6){
											echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.($isWppayPaid != 1?$vip2:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==7){
											echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.($isWppayPaid != 1?$vip3:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
										}elseif($memberDown==4){
											echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'下载'.$vip.'</div>';
										}elseif($memberDown == 15){
											echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'下载'.$vip4.'</div>';
										}elseif($memberDown == 8){
											echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'下载'.$vip2.'</div>';
										}elseif($memberDown == 9){
											echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'下载'.$vip3.'</div>';
										}elseif ($memberDown==10){
											echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
										}elseif ($memberDown==11){
											echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折'.$vip.'</div>';
										}elseif ($memberDown==12){
											echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折'.$vip.'</div>';
										}

										if(get_option('erphp_wppay_down')){
											if($isWppayPaid == 1){
												echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
											}else{
												if($memberDown == 4 || $memberDown == 15 || $memberDown == 8 || $memberDown == 9 || $memberDown == 10 || $memberDown == 11 || $memberDown == 12){
													//echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
												}else{
													if($down_checkpan) echo $down_checkpan;
													else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
												}
											}
										}else{
											echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
										}

									}
								}else{
									if(is_user_logged_in()){
										echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
									}else{
										if(get_option('erphp_wppay_down') && !get_option('erphp_free_login')){
											echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().$iframe.' target="_blank" class="down'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
										}else{
											echo '<a href="javascript:;" class="down signin-loader"><i class="icon icon-download"></i> 立即下载</a>';
										}
									}

								}
							}

							if(get_option('erphp_repeatdown_btn') && $down_repeat && $down_info_repeat && !$down_info){
								echo '<a href='.constant("erphpdown").'download.php?postid='.get_the_ID().$iframe.' target="_blank" class="down bought'.$downclass.'"><i class="icon icon-download"></i> 立即下载</a>';
							}

							if(_MBT('post_sidefav')){
								echo '<div class="demos">';
								if($demo){
									echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
									if(is_user_logged_in()){
					            		if(MBThemes_check_collect(get_the_ID())){
											echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
										}else{
											echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
										}
									}else{
										echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
									}
								}else{
									if(is_user_logged_in()){
					            		if(MBThemes_check_collect(get_the_ID())){
											echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
										}else{
											echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
										}
									}else{
										echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
									}
								}
								echo '</div>';
							}

							if(function_exists('get_field_objects')){
				                $fields = get_field_objects();
				                if( $fields ){
				                	uasort($fields,'mbt_compare_field');
				                	echo '<div class="custom-metas">';
				                    foreach( $fields as $field_name => $field ){
				                    	if($field['value']){
					                        echo '<div class="meta">';
					                            echo '<span>' . $field['label'] . '：</span>';
					                            if(is_array($field['value'])){
					                            	if($field['type'] == 'link'){
					                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
					                            	}elseif($field['type'] == 'taxonomy'){
					                            		$tax_html = '';
					                            		foreach ($field['value'] as $tax) {
					                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
					                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
					                            		}
					                            		echo rtrim($tax_html, ', ');
					                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
					                            		foreach ($field['value'] as $postr) {
															$field_value = mbt_object_to_array($postr);
						                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
						                            	}
						                            }else{
														echo implode(',', $field['value']);
													}
												}elseif(is_object($field['value'])){
													if($field['type'] == 'post_object'){
														$field_value = mbt_object_to_array($field['value']);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
					                            	}
												}else{
													if($field['type'] == 'radio'){
														$vv = $field['value'];
														echo $field['choices'][$vv];
													}else{
														echo $field['value'].$field['append'];
													}
												}
					                        echo '</div>';
					                    }
				                    }
				                    echo '</div>';
				                }
				            }

				            if($days){
								echo '<div class="tips">此资源购买后'.$days.'天内可下载。';
								if(get_option('ice_tips')){
								 	echo '<br>'.get_option('ice_tips');
								}
								echo '</div>';
							}else{
								if(get_option('ice_tips')){
								 	echo '<div class="tips">'.get_option('ice_tips').'</div>';
								}
							}

						}
					}
					echo '</div>';
				}elseif($start_down2){
					if($url){
						if(function_exists('epd_check_pan_callback')){
							if(strpos($url,'pan.baidu.com') !== false || (strpos($url,'lanzou') !== false && strpos($url,'.com') !== false) || strpos($url,'cloud.189.cn') !== false){
								$down_checkpan = '<a class="down erphpdown-buy erphpdown-checkpan2" href="javascript:;" data-id="'.get_the_ID().'" data-post="'.get_the_ID().'">点击检测网盘有效后购买</a>';
							}
						}

						echo '<div class="widget widget-erphpdown widget-erphpdown2">';
						$user_id = is_user_logged_in() ? wp_get_current_user()->ID : 0;
						$wppay = new EPD(get_the_ID(), $user_id);
						if($wppay->isWppayPaid() || $wppay->isWppayPaidNew() || !$price || ($memberDown == 3 && $userType) || ($memberDown == 16 && $userType >= 8) || ($memberDown == 6 && $userType >= 9) || ($memberDown == 7 && $userType >= 10)){
							if($url){
								$downList=explode("\r\n",$url);
								foreach ($downList as $k=>$v){
									$filepath = $downList[$k];
									if($filepath){

										if($erphp_colon_domains){
											$erphp_colon_domains_arr = explode(',', $erphp_colon_domains);
											foreach ($erphp_colon_domains_arr as $erphp_colon_domain) {
												if(strpos($filepath, $erphp_colon_domain)){
													$filepath = str_replace('：', ': ', $filepath);
													break;
												}
											}
										}

										$erphp_blank_domain_is = 0;
										if($erphp_blank_domains){
											$erphp_blank_domains_arr = explode(',', $erphp_blank_domains);
											foreach ($erphp_blank_domains_arr as $erphp_blank_domain) {
												if(strpos($filepath, $erphp_blank_domain)){
													$erphp_blank_domain_is = 1;
													break;
												}
											}
										}
										if(strpos($filepath,',')){
											$filearr = explode(',',$filepath);
											$arrlength = count($filearr);
											if($arrlength == 1){
												$downMsg.="<div class='item item2'><a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
											}elseif($arrlength == 2){
												$downMsg.="<div class='item item2'>".$filearr[0]."<a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
											}elseif($arrlength == 3){
												$filearr2 = str_replace('：', ': ', $filearr[2]);
												$downMsg.="<div class='item item2'>".$filearr[0]."<a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>（".$filearr2."）<a class='erphpdown-copy' data-clipboard-text='".str_replace('提取码: ', '', $filearr2)."' href='javascript:;'>复制</a></div>";
											}
										}elseif(strpos($filepath,'  ') && $erphp_blank_domain_is){
											$filearr = explode('  ',$filepath);
											$arrlength = count($filearr);
											if($arrlength == 1){
												$downMsg.="<div class='item item2'><a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
											}elseif($arrlength >= 2){
												$filearr2 = explode(':',$filearr[0]);
												$filearr3 = explode(':',$filearr[1]);
												$downMsg.="<div class='item item2'>".$filearr2[0]."<a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>（提取码: ".trim($filearr3[1])."）<a class='erphpdown-copy' data-clipboard-text='".trim($filearr3[1])."' href='javascript:;'>复制</a></div>";
											}
										}elseif(strpos($filepath,' ') && $erphp_blank_domain_is){
											$filearr = explode(' ',$filepath);
											$arrlength = count($filearr);
											if($arrlength == 1){
												$downMsg.="<div class='item item2'><a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
											}elseif($arrlength == 2){
												$downMsg.="<div class='item item2'>".$filearr[0]."<a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
											}elseif($arrlength >= 3){
												$downMsg.="<div class='item item2'>".str_replace(':', '', $filearr[0])."<a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a>（".$filearr[2].' '.$filearr[3]."）<a class='erphpdown-copy' data-clipboard-text='".$filearr[3]."' href='javascript:;'>复制</a></div>";
											}
										}else{
											$downMsg.="<div class='item item2'><a href='".ERPHPDOWN_URL."/download.php?postid=".get_the_ID()."&key=".($k+1)."&nologin=1' target='_blank' class='down'><i class='icon icon-download'></i> 立即下载</a></div>";
										}
									}
								}
								echo $downMsg;
								if($hidden){
									echo '<div class="item item2">提取码：'.$hidden.' <a class="erphpdown-copy" data-clipboard-text="'.$hidden.'" href="javascript:;">复制</a></div>';
								}
							}else{
								echo '<style>.widget-erphpdown{display:none !important;}</style>';
							}
						}else{
							if($memberDown == 3 || $memberDown == 16 || $memberDown == 6 || $memberDown == 7){
								$wppay_vip_name = $erphp_vip_name;
								if($memberDown == 16){
									$wppay_vip_name = $erphp_quarter_name;
								}elseif($memberDown == 6){
									$wppay_vip_name = $erphp_year_name;
								}elseif($memberDown == 7){
									$wppay_vip_name = $erphp_life_name;
								}
								if($down_checkpan){
									echo '<div class="item price"><span>'.$price.'</span> 元</div><div class="item vip">'.$wppay_vip_name.'免费<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$wppay_vip_name.'</a></div>'.$down_checkpan;
								}else{
									echo '<div class="item price"><span>'.$price.'</span> 元</div><div class="item vip">'.$wppay_vip_name.'免费<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$wppay_vip_name.'</a></div><a href="javascript:;" class="down erphp-wppay-loader erphpdown-buy" data-post="'.get_the_ID().'"><i class="icon icon-work"></i> 立即购买</a>';
								}
							}else{
								if($down_checkpan){
									echo '<div class="item price"><span>'.$price.'</span> 元</div>'.$down_checkpan;
								}else{
									echo '<div class="item price"><span>'.$price.'</span> 元</div><a href="javascript:;" class="down erphp-wppay-loader erphpdown-buy" data-post="'.get_the_ID().'"><i class="icon icon-work"></i> 立即购买</a>';
								}
							}
						}

						if(_MBT('post_sidefav')){
							echo '<div class="demos">';
							if($demo){
								echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
								if(is_user_logged_in()){
				            		if(MBThemes_check_collect(get_the_ID())){
										echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
									}else{
										echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
									}
								}else{
									echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
								}
							}else{
								if(is_user_logged_in()){
				            		if(MBThemes_check_collect(get_the_ID())){
										echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
									}else{
										echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
									}
								}else{
									echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
								}
							}
							echo '</div>';
						}

						if(function_exists('get_field_objects')){
			                $fields = get_field_objects();
			                if( $fields ){
			                	uasort($fields,'mbt_compare_field');
			                	echo '<div class="custom-metas">';
			                    foreach( $fields as $field_name => $field ){
			                    	if($field['value']){
				                        echo '<div class="meta">';
				                            echo '<span>' . $field['label'] . '：</span>';
				                            if(is_array($field['value'])){
				                            	if($field['type'] == 'link'){
				                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
				                            	}elseif($field['type'] == 'taxonomy'){
				                            		$tax_html = '';
				                            		foreach ($field['value'] as $tax) {
				                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
				                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
				                            		}
				                            		echo rtrim($tax_html, ', ');
				                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
				                            		foreach ($field['value'] as $postr) {
														$field_value = mbt_object_to_array($postr);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
					                            	}
					                            }else{
													echo implode(',', $field['value']);
												}
											}elseif(is_object($field['value'])){
												if($field['type'] == 'post_object'){
													$field_value = mbt_object_to_array($field['value']);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
				                            	}
											}else{
												if($field['type'] == 'radio'){
													$vv = $field['value'];
													echo $field['choices'][$vv];
												}else{
													echo $field['value'].$field['append'];
												}
											}
				                        echo '</div>';
				                    }
			                    }
			                    echo '</div>';
			                }
			            }
			            
						if(get_option('ice_tips')) echo '<div class="tips">'.get_option('ice_tips').'</div>';
						echo '</div>';
					}
				}elseif($start_see || ($start_see2 && $erphp_see2_style)){
					echo '<div class="widget widget-erphpdown">';
					if($price){
						if($memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9){
							echo '<div class="item price"><span>'.$price.'</span> '.get_option("ice_name_alipay").'</div>';
						}else{
							if($memberDown == 4){
								echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
							}elseif($memberDown == 15){
								echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
							}elseif($memberDown == 8){
								echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
							}elseif($memberDown == 9){
								echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
							}
						}
					}else{
						if($memberDown != 4 && $memberDown != 15 && $memberDown != 8 && $memberDown != 9){
							echo '<div class="item price"><span>免费</span></div>';
						}else{
							if($memberDown == 4){
								echo '<div class="item price"><span>'.$erphp_vip_name.'</span>专享</div>';
							}elseif($memberDown == 15){
								echo '<div class="item price"><span>'.$erphp_quarter_name.'</span>专享</div>';
							}elseif($memberDown == 8){
								echo '<div class="item price"><span>'.$erphp_year_name.'</span>专享</div>';
							}elseif($memberDown == 9){
								echo '<div class="item price"><span>'.$erphp_life_name.'</span>专享</div>';
							}
						}
					}
					if($price || $memberDown == 4 || $memberDown == 15 || $memberDown == 8 || $memberDown == 9){
						if(is_user_logged_in()){
							$user_info=wp_get_current_user();
							$down_info=$wpdb->get_row("select * from ".$wpdb->icealipay." where ice_post='".get_the_ID()."' and ice_success=1 and ice_user_id=".$user_info->ID." order by ice_time desc");
							if($days > 0 && $down_info){
								$lastDownDate = date('Y-m-d H:i:s',strtotime('+'.$days.' day',strtotime($down_info->ice_time)));
								$nowDate = date('Y-m-d H:i:s');
								if(strtotime($nowDate) > strtotime($lastDownDate)){
									$down_info = null;
								}
							}

							if(!$down_info){
								if(!$userType){
									$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_vip_name.'</a>';
								}else{
									if(($memberDown == 13 || $memberDown == 14) && $userType < 10){
										$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
									}
								}
								if($userType < 8){
									$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_quarter_name.'</a>';
								}
								if($userType < 9){
									$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_year_name.'</a>';
								}
								if($userType < 10){
									$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn">升级'.$erphp_life_name.'</a>';
								}
							}

							$user_id = $user_info->ID;
							$wppay = new EPD(get_the_ID(), $user_id);

							if( ($userType && ($memberDown==3 || $memberDown==4)) || $wppay->isWppayPaid() || $wppay->isWppayPaidNew() || $down_info || (($memberDown==15 || $memberDown==16) && $userType >= 8) || (($memberDown==6 || $memberDown==8) && $userType >= 9) || (($memberDown==7 || $memberDown==9 || $memberDown==13 || $memberDown==14) && $userType == 10) || (!$price && $memberDown!=4 && $memberDown!=15 && $memberDown!=8 && $memberDown!=9)){

								echo '<style>.widget-erphpdown{display:none}</style>';

								if($memberDown==3){
									echo '<div class="item vip">'.$erphp_vip_name.'免费</div>';
								}elseif($memberDown==2){
									echo '<div class="item vip">'.$erphp_vip_name.' 5折</div>';
								}elseif($memberDown==13){
									echo '<div class="item vip">'.$erphp_vip_name.' 5折、'.$erphp_life_name.'免费</div>';
								}elseif($memberDown==5){
									echo '<div class="item vip">'.$erphp_vip_name.' 8折</div>';
								}elseif($memberDown==14){
									echo '<div class="item vip">'.$erphp_vip_name.' 8折、'.$erphp_life_name.'免费</div>';
								}elseif($memberDown==16){
									echo '<div class="item vip">'.$erphp_quarter_name.'免费</div>';
								}elseif($memberDown==6){
									echo '<div class="item vip">'.$erphp_year_name.'免费</div>';
								}elseif($memberDown==7){
									echo '<div class="item vip">'.$erphp_life_name.'免费</div>';
								}elseif($memberDown==4){
									echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'查看</div>';
								}elseif($memberDown == 15){
									echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'查看</div>';
								}elseif($memberDown == 8){
									echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'查看</div>';
								}elseif($memberDown == 9){
									echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'查看</div>';
								}elseif ($memberDown==10){
									echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买</div>';
								}elseif ($memberDown==11){
									echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折</div>';
								}elseif ($memberDown==12){
									echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折</div>';
								}

							}else{

								if($memberDown==3){
									echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span>'.$vip.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==2){
									echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==13){
									echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.$vip.'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==5){
									echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==14){
									echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.$vip.'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==16){
									echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.$vip4.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==6){
									echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.$vip2.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}elseif($memberDown==7){
									echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.$vip3.'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
								}

								if($memberDown==4){
									echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'查看'.$vip.'</div>';
								}elseif($memberDown==15){
									echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'查看'.$vip4.'</div>';
								}elseif($memberDown==8){
									echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'查看'.$vip2.'</div>';
								}elseif($memberDown==9){
									echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'查看'.$vip3.'</div>';
								}elseif($memberDown==10){
									if($down_info){
										
									}elseif($userType){
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
										if($down_checkpan) echo $down_checkpan;
										else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
									}else{
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
									}
								}elseif($memberDown==11){
									if($down_info){
										
									}elseif($userType){
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
										if($down_checkpan) echo $down_checkpan;
										else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
									}else{
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 5折'.$vip.'</div>';
									}
								}elseif($memberDown==12){
									if($down_info){
										
									}elseif($userType){
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
										if($down_checkpan) echo $down_checkpan;
										else echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
									}else{
										echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买，'.$erphp_year_name.' 8折'.$vip.'</div>';
									}
								}else{
									if($down_info){
										
									}else{
										if ( ($memberDown==6 || $memberDown==8) && ($userType == 9 || $userType == 10)){
											echo '<span class="erphpdown-icon-vip"><i>享免</i></span>';
										}elseif ( ($memberDown==7 || $memberDown==9 || $memberDown==13 || $memberDown==14) && $userType == 10){
											echo '<span class="erphpdown-icon-vip"><i>享免</i></span>';
										}elseif( ($memberDown==3 || $memberDown==4) && $userType){
											echo '<span class="erphpdown-icon-vip"><i>享免</i></span>';
										}else{
											echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
										}
									}
								}
							}
						}else{

							$isWppayPaid = 0;
							if(get_option('erphp_wppay_down')){
								$user_id = 0;
								$wppay = new EPD(get_the_ID(), $user_id);
								if($wppay->isWppayPaid() || $wppay->isWppayPaidNew()){
									$isWppayPaid = 1;
								}else{
									$isWppayPaid = 2;
								}
							}
							$vip = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_vip_name.'</a>';
							$vip4 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_quarter_name.'</a>';
							$vip2 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_year_name.'</a>';
							$vip3 = '<a href="'.$erphp_url_front_vip.'" target="_blank" class="erphpdown-vip-btn signin-loader">升级'.$erphp_life_name.'</a>';

							if($memberDown==3){
								echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_vip_name.'免费</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==2){
								echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==13){
								echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 5折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.5).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span><span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==5){
								echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==14){
								echo '<div class="item vip vip-text"><div class="vit clearfix"><span class="tit">'.$erphp_vip_name.' 8折</span>'.($isWppayPaid != 1?$vip:'').'<span class="pri"><b>'.($price*0.8).'</b>'.get_option("ice_name_alipay").'</span></div><div class="vit clearfix"><span class="tit">'.$erphp_life_name.'免费</span><span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==16){
								echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_quarter_name.'免费</span>'.($isWppayPaid != 1?$vip4:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==6){
								echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_year_name.'免费</span>'.($isWppayPaid != 1?$vip2:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==7){
								echo '<div class="item vip vip-text"><div class="vit"><span class="tit">'.$erphp_life_name.'免费</span>'.($isWppayPaid != 1?$vip3:'').'<span class="pri"><b>0</b>'.get_option("ice_name_alipay").'</span></div></div>';
							}elseif($memberDown==4){
								echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'查看'.$vip.'</div>';
							}elseif($memberDown == 15){
								echo '<div class="item vip vip-only">仅限'.$erphp_quarter_name.'查看'.$vip4.'</div>';
							}elseif($memberDown == 8){
								echo '<div class="item vip vip-only">仅限'.$erphp_year_name.'查看'.$vip2.'</div>';
							}elseif($memberDown == 9){
								echo '<div class="item vip vip-only">仅限'.$erphp_life_name.'查看'.$vip3.'</div>';
							}elseif ($memberDown==10){
								echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买'.$vip.'</div>';
							}elseif ($memberDown==11){
								echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 5折'.$vip.'</div>';
							}elseif ($memberDown==12){
								echo '<div class="item vip vip-only">仅限'.$erphp_vip_name.'购买、'.$erphp_year_name.' 8折'.$vip.'</div>';
							}

							if(get_option('erphp_wppay_down')){
								if($isWppayPaid == 1){
									echo '<style>.widget-erphpdown{display:none}</style>';
								}else{
									if($memberDown == 4 || $memberDown == 15 || $memberDown == 8 || $memberDown == 9 || $memberDown == 10 || $memberDown == 11 || $memberDown == 12){
										//echo '<a href="javascript:;" class="down signin-loader">请先登录</a>';
									}else{
										echo '<a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
									}
								}
							}else{
								echo '<a href="javascript:;" class="down signin-loader">请先登录</a>';
							}

						}
					}else{
						if(is_user_logged_in()){
							echo '<style>.widget-erphpdown{display:none}</style>';
						}else{
							if(get_option('erphp_wppay_down') && !get_option('erphp_free_login')){
								echo '<style>.widget-erphpdown{display:none}</style>';
							}else{
								echo '<a href="javascript:;" class="down signin-loader">请先登录</a>';
							}
						}
					}

					if(_MBT('post_sidefav')){
						echo '<div class="demos">';
						if($demo){
							echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
							if(is_user_logged_in()){
			            		if(MBThemes_check_collect(get_the_ID())){
									echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
								}else{
									echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
								}
							}else{
								echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
							}
						}else{
							if(is_user_logged_in()){
			            		if(MBThemes_check_collect(get_the_ID())){
									echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
								}else{
									echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
								}
							}else{
								echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
							}
						}
						echo '</div>';
					}

					if(function_exists('get_field_objects')){
		                $fields = get_field_objects();
		                if( $fields ){
		                	uasort($fields,'mbt_compare_field');
		                	echo '<div class="custom-metas">';
		                    foreach( $fields as $field_name => $field ){
		                    	if($field['value']){
			                        echo '<div class="meta">';
			                            echo '<span>' . $field['label'] . '：</span>';
			                            if(is_array($field['value'])){
			                            	if($field['type'] == 'link'){
			                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
			                            	}elseif($field['type'] == 'taxonomy'){
			                            		$tax_html = '';
			                            		foreach ($field['value'] as $tax) {
			                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
			                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
			                            		}
			                            		echo rtrim($tax_html, ', ');
			                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
			                            		foreach ($field['value'] as $postr) {
													$field_value = mbt_object_to_array($postr);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
				                            	}
				                            }else{
												echo implode(',', $field['value']);
											}
										}elseif(is_object($field['value'])){
											if($field['type'] == 'post_object'){
												$field_value = mbt_object_to_array($field['value']);
			                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
			                            	}
										}else{
											if($field['type'] == 'radio'){
												$vv = $field['value'];
												echo $field['choices'][$vv];
											}else{
												echo $field['value'].$field['append'];
											}
										}
			                        echo '</div>';
			                    }
		                    }
		                    echo '</div>';
		                }
		            }

					if($days){
						echo '<div class="tips">此内容购买后'.$days.'天内可查看。';
						if(get_option('ice_tips_see')){
						 	echo '<br>'.get_option('ice_tips_see');
						}
						echo '</div>';
					}else{
						if(get_option('ice_tips_see')){
						 	echo '<div class="tips">'.get_option('ice_tips_see').'</div>';
						}
					}
					echo '</div>';
				}elseif($erphp_down == 6){
					echo '<div class="widget widget-erphpdown widget-erphpdown-faka"><span class="erphpdown-title">自动发卡</span><div class="item price"><span>'.$price.'</span> '.get_option("ice_name_alipay").'</div><a href='.constant("erphpdown").'buy.php?postid='.get_the_ID().' class="down erphpdown-iframe"><i class="icon icon-work"></i> 立即购买</a>';
					if(function_exists('getErphpActLeft')) echo '<div class="left">库存：'.getErphpActLeft(get_the_ID()).'</div>';

					if(_MBT('post_sidefav')){
						echo '<div class="demos">';
						if($demo){
							echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
							if(is_user_logged_in()){
			            		if(MBThemes_check_collect(get_the_ID())){
									echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
								}else{
									echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
								}
							}else{
								echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
							}
						}else{
							if(is_user_logged_in()){
			            		if(MBThemes_check_collect(get_the_ID())){
									echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
								}else{
									echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
								}
							}else{
								echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
							}
						}
						echo '</div>';
					}

					if(function_exists('get_field_objects')){
		                $fields = get_field_objects();
		                if( $fields ){
		                	uasort($fields,'mbt_compare_field');
		                	echo '<div class="custom-metas">';
		                    foreach( $fields as $field_name => $field ){
		                    	if($field['value']){
			                        echo '<div class="meta">';
			                            echo '<span>' . $field['label'] . '：</span>';
			                            if(is_array($field['value'])){
			                            	if($field['type'] == 'link'){
			                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
			                            	}elseif($field['type'] == 'taxonomy'){
			                            		$tax_html = '';
			                            		foreach ($field['value'] as $tax) {
			                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
			                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
			                            		}
			                            		echo rtrim($tax_html, ', ');
			                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
			                            		foreach ($field['value'] as $postr) {
													$field_value = mbt_object_to_array($postr);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
				                            	}
				                            }else{
												echo implode(',', $field['value']);
											}
										}elseif(is_object($field['value'])){
											if($field['type'] == 'post_object'){
												$field_value = mbt_object_to_array($field['value']);
			                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
			                            	}
										}else{
											if($field['type'] == 'radio'){
												$vv = $field['value'];
												echo $field['choices'][$vv];
											}else{
												echo $field['value'].$field['append'];
											}
										}
			                        echo '</div>';
			                    }
		                    }
		                    echo '</div>';
		                }
		            }

					if(get_option('ice_tips_faka')){
					 	echo '<div class="tips">'.get_option('ice_tips_faka').'</div>';
					}
					echo '</div>';
				}else{
					if(!$url_free){
						if(function_exists('get_field_objects')){
			                $fields = get_field_objects();
			                if( $fields ){
			                	uasort($fields,'mbt_compare_field');
			                	echo '<div class="widget widget-erphpdown">';

			                	if(_MBT('post_sidefav')){
									echo '<div class="demos" style="margin-top:0">';
									if($demo){
										echo '<a href="'.$demo.'" target="_blank" rel="nofollow" class="demo-item2 demo-demo">'.$demo_title.'</a>';
										if(is_user_logged_in()){
						            		if(MBThemes_check_collect(get_the_ID())){
												echo '<a href="javascript:;" class="demo-item2 side-collect active" data-id="'.get_the_ID().'">已收藏</a>';
											}else{
												echo '<a href="javascript:;" class="demo-item2 side-collect" data-id="'.get_the_ID().'">收藏</a>';
											}
										}else{
											echo '<a href="javascript:;" class="demo-item2 signin-loader">收藏</a>';
										}
									}else{
										if(is_user_logged_in()){
						            		if(MBThemes_check_collect(get_the_ID())){
												echo '<a href="javascript:;" class="demo-item side-collect active" data-id="'.get_the_ID().'"><i class="icon icon-star-s"></i> 取消收藏</a>';
											}else{
												echo '<a href="javascript:;" class="demo-item side-collect" data-id="'.get_the_ID().'"><i class="icon icon-star"></i> 加入收藏</a>';
											}
										}else{
											echo '<a href="javascript:;" class="demo-item signin-loader"><i class="icon icon-star"></i> 加入收藏</a>';
										}
									}
									echo '</div>';
								}

			                	echo '<div class="custom-metas" style="margin-top:0">';
			                    foreach( $fields as $field_name => $field ){
			                    	if($field['value']){
				                        echo '<div class="meta">';
				                            echo '<span>' . $field['label'] . '：</span>';
				                            if(is_array($field['value'])){
				                            	if($field['type'] == 'link'){
				                            		echo '<a href="'.$field['value']['url'].'" target="'.$field['value']['target'].'">'.$field['value']['title'].'</a>';
				                            	}elseif($field['type'] == 'taxonomy'){
				                            		$tax_html = '';
				                            		foreach ($field['value'] as $tax) {
				                            			$term = get_term_by('term_id',$tax,$field['taxonomy']);
				                            			$tax_html .= '<a href="'.get_term_link($tax).'" target="_blank">'.$term->name.'</a>, ';
				                            		}
				                            		echo rtrim($tax_html, ', ');
				                            	}elseif($field['type'] == 'relationship' || $field['type'] == 'post_object'){
				                            		foreach ($field['value'] as $postr) {
														$field_value = mbt_object_to_array($postr);
					                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a> ';
					                            	}
					                            }else{
													echo implode(',', $field['value']);
												}
											}elseif(is_object($field['value'])){
												if($field['type'] == 'post_object'){
													$field_value = mbt_object_to_array($field['value']);
				                            		echo '<a href="'.get_permalink($field_value['ID']).'" target="_blank">'.$field_value['post_title'].'</a>';
				                            	}
											}else{
												if($field['type'] == 'radio'){
													$vv = $field['value'];
													echo $field['choices'][$vv];
												}else{
													echo $field['value'].$field['append'];
												}
											}
				                        echo '</div>';
				                    }
			                    }
			                    echo '</div></div>';
			                }
			            }
					}
				}
			}
			}
			}else{
				echo '<div class="widget widget-erphpdown"><div class="modown-reply">此隐藏内容 <a href="javascript:scrollTo(\'#respond\',-120);">评论</a> 本文后<span>刷新页面</span>可见！</div></div>';
			}
		}
	?>
</ul>

    
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_mbt');
?>