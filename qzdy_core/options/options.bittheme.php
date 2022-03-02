<?php
    if( class_exists( 'CSF' ) ) {
    $tips_6_2 = '';
    //// Set a unique slug-like ID
    $prefix = 'my_framework';
    //// Create options
    CSF::createOptions( $prefix, array(
    'menu_title' => 'Qzdy主题设置',
    'menu_slug' => 'my-framework',
    ) );
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
    CSF::createSection( $prefix, array(
		'id'    => 'zero_x',
		'title' => '首页设置',
		'icon'  => 'fa fa-plus-circle',
		
	) );
	CSF::createSection( $prefix, array(
		'parent'      => 'zero_x',
		'title'  => 'banner模式切换',
		'fields' => array(
		    		    array(
      'id'    => 'zero-header-gbqzbjan',
      'type'  => 'switcher',
      'title' => '头部全局图',
      'label' => '默认开启全站头部背景图',
       'subtitle' => '导航栏背后的图片',
       'default' => true,
    ),
		    
		 array(
      'id'      => 'opt-index-banner-moxin',
      'type'    => 'radio',
      'title'   => '头部模型选择',
      'inline'  => 'opt-index-xbanner',
      'options' => array(
        'opt-index-dbanner' => '大图带文字',
        'opt-index-xbanner' => '小图不带文字',
      ),
      'default' => 'opt-index-xbanner',
    ),
    
    
    
    
    		 array(
      'id'      => 'opt-index-header-color-box',
      'type'    => 'radio',
      'title'   => '导航栏颜色选择',
      'inline'  => 'opt-index-xbanner',
      'options' => array(
        'opt-index-header-color-box1' => '默认跟随系统参数',
        'opt-index-header-color-box2' => '白色效果',
        'opt-index-header-color-box3' => '毛玻璃效果效果',
      ),
      'default' => 'opt-index-header-color-box1',
    ),
    			array(
				'id'    => 'zero-header-classification-banner-morenbanner',
				'type'  => 'upload',
				'title' => '大图带文字banner',
                'default' =>  get_template_directory_uri().'/images/bg_pic.jpg',
				
			),
			array(
				'id'    => 'zero-footer-qzbj',
				'type'  => 'upload',
				'title' => '小图不带文字banner',
				'default' =>  get_template_directory_uri().'/images/bg_pic.jpg',
			),
                array(
                    'id'    => 'opt-group-topping-datu-title',
                    'type'  => 'text',
                    'title' => '大图带文字的标题',
                    'default' =>  '标题',
                ),                array(
                    'id'    => 'opt-group-topping-datu-futitle',
                    'type'  => 'text',
                    'title' => '大图带文字的副标题',
                    'default' =>  '副标题',
                ),
	)
	) );
	    
    CSF::createSection( $prefix, array(
    'parent'      => 'zero_x',
    'title' => '排除分类ID',
    'icon'  => 'fas fa-upload',
    'fields' => array(
        			array(
			    'id'    => 'zero-qt-index-paichuid',
				'type'  => 'text',
				'title' => '首页分类排除分类ID',
                'subtitle' => '首页的最新文章里不显示这些分类的文章，多个用半角英文逗号隔开，例如：-1,-3,-12。',
			),
    )
    ) );
	    
    CSF::createSection( $prefix, array(
    'parent'      => 'zero_x',
    'title' => '搜索相关',
    'icon'  => 'fas fa-upload',
    'fields' => array(
			                array(
                  'id'    => 'zero-qt-index-sosuo-redian',
                  'type'     => 'code_editor',
                  'title'    => '搜索页面的热点按钮',
                  'subtitle' => '可以加入自己的html样式',
                  'settings' => array(
                    'theme'  => 'shadowfox',
                     'mode'   => 'htmlmixed',
                  ),
                  'default' =>'<li><a href="#">平台算法</a></li><li><a href="#">平台算法</a></li><li><a href="#">平台算法</a></li>',
                ),
    )
    ) );
    // Q-Q交-流群：9173673-58
// Field: 文章内页设置
//
CSF::createSection($prefix, array(
    'title'  => '分类页筛选',
    'icon'   => 'fa fa-circle',
    'fields' => array(
        array(
            'id'      => 'is_filter_bar',
            'type'    => 'switcher',
            'title'   => '分类内页禁用筛选',
            'label'   => '全站，如需个别分类关闭请到分类编辑单独定制即可',
            'default' => true,
        ),
        array(
            'id'         => 'is_filter_item_cat',
            'type'       => 'switcher',
            'title'      => '启用内页一级分类筛选',
            'label'      => '',
            'default'    => true,
            'dependency' => array('is_filter_bar', '==', 'false'),
        ),
        array(
            'id'          => 'archive_filter_cat_1',
            'type'        => 'select',
            'title'       => '一级主分类筛选配置',
            'desc'        => '排序规则以设置的顺序为准',
            'placeholder' => '选择分类',
            'inline'      => true,
            'chosen'      => true,
            'multiple'    => true,
            'options'     => 'categories',
            'query_args'  => array(
                'orderby' => 'count',
                'order'   => 'DESC',
                'parent'  => 0,
            ),
            'dependency' => array('is_filter_item_cat', '==', 'true'),
        ),
        
        array(
            'id'         => 'is_filter_item_cat2',
            'type'       => 'switcher',
            'title'      => '启用二级分类筛选',
            'label'      => '当前筛选条件分类下如果有二级分类 自动显示二级分类',
            'default'    => true,
            'dependency' => array('is_filter_bar', '==', 'false'),
        ),
        array(
            'id'         => 'is_filter_item_cat3',
            'type'       => 'switcher',
            'title'      => '启用三级分类筛选',
            'label'      => '当前筛选条件分类下的二级分类有三级分类则自动显示三级分类',
            'default'    => true,
            'dependency' => array('is_filter_bar', '==', 'false'),
        ),
        array(
            'id'      => 'is_filter_item_cat_orderby',
            'type'    => 'radio',
            'title'   => '分类筛选排序方式'.$tips_6_2,
            'inline'  => true,
            'options' => array(
                'id'    => esc_html__('分类ID', 'cao'),
                'name' => esc_html__( '分类名称', 'cao' ),
                'count' => esc_html__('文章数量', 'cao'),
            ),
            'default' => 'id',
        ),

        array(
            'id'         => 'is_filter_item_tags',
            'type'       => 'switcher',
            'title'      => '启用相关标签筛选',
            'label'      => '有相关标签 自动显示',
            'default'    => true,
            'dependency' => array('is_filter_bar', '==', 'false'),
        ),
       array(
            'id'      => 'filter_item_tags_num',
            'type'    => 'text',
            'title'   => '相关标签筛选展示数量',
            'default' => '10',
            'dependency' => array('is_filter_item_tags', '==', 'true'),
        ),
        array(
            'id'      => 'is_custom_post_meta_opt',
            'type'    => 'switcher',
            'title'   => '高级自定义文章字段属性',
            'desc'    => '主要用于增强筛选细化资源，高级自定义文章字段属性<b><font color="red">每个字段名称，必须有两个或两个字段选项，否则会报错</font></b>',
            'default' => false,
        ),
        array(
            'id'         => 'custom_post_meta_opt',
            'type'       => 'group',
            'title'      => '自定义字段设置',
            'max'        => '50',
            'fields'     => array(
                
                array(
                    'id'      => 'meta_name',
                    'type'    => 'text',
                    'title'   => '字段名称',
                    'default' => '字段1',
                ),
                array(
                    'id'      => 'meta_ua',
                    'type'    => 'text',
                    'title'   => '字段英文标识',
                    'default' => 'my_meta_1',
                ),
                array(
                    'id'          => 'meta_category',
                    'type'        => 'select',
                    'title'       => '只在该分类下显示高级筛选属性',
                    'placeholder' => '全部显示',
                    'chosen'      => true,
                    'multiple'    => true,
                    'options'     => 'categories',
                ),
                array(
                    'id'     => 'meta_opt',
                    'type'   => 'group',
                    'title'  => '字段选项',
                    'fields' => array(
                        array(
                            'id'      => 'opt_name',
                            'type'    => 'text',
                            'title'   => '选项中文名称',
                            'default' => '字段选项1',
                        ),
                        array(
                            'id'      => 'opt_ua',
                            'type'    => 'text',
                            'title'   => '选项英文标识',
                            'default' => 'opt_1',
                        ),
                    ),
                ),

            ),
            'dependency' => array('is_custom_post_meta_opt', '==', 'true'),
        ),

    ),
));
// 作者博客：https://www.aj0.cn/
        CSF::createSection( $prefix, array(
    'parent'      => 'zero_x',
    'title' => '基础设置',
    'icon'  => 'fas fa-store',
    'fields' => array(
    //// A text fieldarray('id' => 'opt-text','type' => 'text','title' => 'Simple Text',
                   
        array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => '网站图片设置',
    ),

			array(
				'id'    => 'zero-header-favicon',
				'type'  => 'upload',
				'title' => 'favicon图标',
			     'subtitle' => '浏览器窗口上的小图标',
				'default' =>  get_template_directory_uri().'/favicon.ico',
			),
			array(
				'id'    => 'zero-body-background-image',
				'type'  => 'upload',
				'title' => '网站背景图片',
				 'subtitle' => '网站全局背景图-为空默认为乳白色',

			),
		array(
      'id'    => 'zero-index-js-to-footer',
      'type'  => 'switcher',
      'title' => '开启背景特效',
      'label' => '开启背景特效',
       'subtitle' => '默认开启背景特效',
       'default' => true,
         ),

    
        		 array(
      'id'      => 'zero-index-texiao-box',
      'type'    => 'radio',
      'title'   => '选择飘落特效',
      'inline'  => 'opt-index-xbanner',
      'options' => array(
         'zero-index-texiao-guanbi' => '关闭',
        'zero-index-texiao-yinghua' => '樱花',
        'zero-index-texiao-xuehua' => '雪花',
      ),
      'default' => 'zero-index-texiao-guanbi',
    ),
    
    
    
    ),
    )
     );
        CSF::createSection( $prefix, array(
    'parent'      => 'zero_x',
    'title' => '登陆设置',
    'icon'  => 'fas fa-wrench',
    'fields' => array(
			array(
				'id'    => 'zero-login-background-image',
				'type'  => 'upload',
				'title' => '网站后台登录背景图片',
				 'subtitle' => '为空默认为乳白色',

			),
			array(
				'id'    => 'zero-login-background-image-logo',
				'type'  => 'upload',
				'title' => '网站后台登录logo',
		

			),
			array(
      'id'    => 'zero-index-cbl-login',
      'type'  => 'switcher',
      'title' => '手机端侧边栏是否开启登陆状态',
       'default' => false,
    ),
        array(
      'id'      => 'opt-index-lgoin-muban',
      'type'    => 'radio',
      'title'   => '后台注册登录页面模板',
      'inline'  => 'opt-sidebar-right',
      'options' => array(
        'opt-login-yi' => '模板一',
        'opt-login-er' => '模板二',
      ),
      'default' => 'opt-login-yi',
    ),
    
    ),

    )
     );
    // ------------------erji
    
               CSF::createSection( $prefix, array(
    'title' => 'LOGO设置',
    'icon'  => 'far fa-image',
    'fields' => array(
 array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => '网站LOGO设置',
    ),
			array(
				'id'    => 'zero-footer-logo',
				'type'  => 'upload',
				'title' => 'logo图片地址200x60',
				'default' =>  get_template_directory_uri().'/images/logo.png',
			),
			array(
			    'id'    => 'zero-qt-wzlogo',
				'type'  => 'text',
				'title' => '文字logo',
                'default' => 'echo \'秋知德雨\';',
			),
						        array(
      'id'    => 'zero-ht-logokg',
      'type'  => 'checkbox',
      'title' => '开启文字logo',
      'subtitle' => '打钩自动启用文字logo 关闭自动启用图片logo',
      'label' => '开启文字logo',
      'default' => true,
    ),
			
    )
    ) );
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
    CSF::createSection( $prefix, array(
    'title' => '个人设置',
    'icon'  => 'far fa-address-card',
    'fields' => array(
        	array(
				'id'    => 'zero-footer-txurl',
				'type'  => 'upload',
				'title' => '头像地址',
				'default' =>  get_template_directory_uri().'/images/tx.jpg',
			),

            array(
				'id'    => 'zero-footer-txxnc',
				'type'  => 'text',
				'title' => '昵称',
				'default' => '秋之德雨',
			),
			array(
				'id'    => 'zero-footer-txqm',
				'type'  => 'text',
				'title' => '签名',
				'default' => '这里是签名',
			),
			array(
				'id'    => 'zero-footer-qq',
				'type'  => 'text',
				'title' => 'QQ',
				'subtitle' => '用来文章结尾组件的联系方式，不填没事',
				'default' => '858896214',
			),
            array(
				'id'    => 'zero-footer-email',
				'type'  => 'text',
				'title' => '邮箱',
				'subtitle' => '用来文章结尾组件的联系方式，不填没事',
				'default' => '858896214@qq.com',
			),

			array(
				'id'    => 'zero-header-wzyxrq',
				'type'  => 'text',
				'title' => '网站运行日期格式：年-月-日',
				'subtitle' => '请严格按照格式输入，如：2021-01-02',
				'default' => '2021-01-02',
			),
            array(
                'id' => 'zero-footer-txbjt',
                'type' => 'upload',
                'title' => '头像背景图片',
                'default' =>  get_template_directory_uri().'/images/txbj.jpg',
                ),
            array(
                'id' => 'zero-personal-huangguan',
                'type' => 'upload',
                'title' => '移动端头像旁边的皇冠',
                'default' =>  get_template_directory_uri().'/images/qzdy_huangguan.svg',
                ),

    )
    ) );
        CSF::createSection( $prefix, array(
    'title' => '友人帐页面',
    'icon'  => 'fas fa-users-cog',
    'fields' => array(
    array(
      'id'       => 'opt-yrz-title',
      'type'     => 'group',
      'title'    => '友人帐页面设置',
      'subtitle' => '请在前往 ->页面->新建页面->友人帐模板->并添加至导航栏',
      'fields'   => array(
        array(
          'id'    => 'opt-yrz-box',
          'type'  => 'text',
          'title' => '友人帐分类',
             ),
                array(
                  'id'     => 'opt-yrz-box-box',
                  'type'   => 'group',
                  'title'  => '请添加友人',
                                  'fields' => array(
                                                array(
                                                  'id'    => 'opt-yrz-box-box-title',
                                                  'type'  => 'text',
                                                  'title' => '网站名称',
                                                ),
                                                array(
                                                  'id'    => 'opt-yrz-box-box-jianjie',
                                                  'type'  => 'text',
                                                  'title' => '网站简介',
                                                ),
                                                array(
                                                  'id'    => 'opt-yrz-box-box-url',
                                                  'type'  => 'text',
                                                  'title' => '跳转地址',
                                                ),
                                                array(
                                    		    'id'    => 'opt-yrz-box-box-img',
                                    		    'type'  => 'upload',
                                    			'title' => '图片地址',
                                    			'default' => '',
                                    		    	),
                                  )
                ),

      ),
      'default' => array(

        // top level defaults
        array(
          'opt-text' => 'Top Level 1',

          // sub level 1 defaults
          'opt-group-5-sublevel-1' => array(
            array(
              'opt-text' => 'Sub Level 1',

            ),

          ),
        ),


      )
    ),



    )

    ) );
        CSF::createSection( $prefix, array(
    'title' => 'SEO设置',
    'icon'  => 'fas fa-spider',
    'fields' => array(
       									array(
				'id'    => 'zero-footer-wzgjc',
				'type'  => 'text',
				'title' => '网站关键词',
				'default' => '技术博客,资源网,个人博客网站',
			), 
       									array(
				'id'    => 'zero-footer-wzms',
				'type'  => 'text',
				'title' => '网站描述',
				'default' => '定期分享技术教程以及网络资源',
			), 

    )
    ) );
            CSF::createSection( $prefix, array(
    'title' => '文章页面',
    'icon'  => 'fas fa-file-alt',
    'fields' => array(
 array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => '文章结尾UI组件',
    ),
       array(
      'id'    => 'zero-footer-grxx',
      'type'  => 'switcher',
      'title' => '底部个人信息',
      'label' => '',
       'subtitle' => '<img src="'.get_template_directory_uri().'/images/zujian/dbgrxx.png" alt="img-1">',
       'default' => true,
    ),
           array(
      'id'    => 'zero-footer-wzdata',
      'type'  => 'switcher',
      'title' => '底部最后修改时间',
      'label' => '',
       'subtitle' => '<img src="'.get_template_directory_uri().'/images/zujian/dbwzdata.png" alt="img-1">',
       'default' => true,
    ),
           array(
      'id'    => 'zero-footer-dianzan',
      'type'  => 'switcher',
      'title' => '底部点赞',
      'label' => '',
       'subtitle' => '<img src="'.get_template_directory_uri().'/images/zujian/dbdianzan.png" alt="img-1">',
       'default' => true,
    ),
         array(
      'id'    => 'zero-footer-dbxguantuijian',
      'type'  => 'switcher',
      'title' => '底部相关推荐',
      'label' => '',
       'subtitle' => '<img src="'.get_template_directory_uri().'/images/zujian/xgtj.svg" alt="img-1" style="width: 300px;">',
       'default' => true,
    ),
         array(
      'id'    => 'zero-footer-plk',
      'type'  => 'switcher',
      'title' => '文章评论框',
      'label' => '默认开启',
       'default' => true,
    ),
    array(
      'id'    => 'zero-footer-article-author',
      'type'  => 'switcher',
      'title' => '文章标题下的作者名称框',
      'label' => '默认关闭',
       'default' => true,
       	'subtitle' => '由于文章尾部增加了作者UI组件一些不喜欢上面也有作者名字的方便关闭',
    ),
         array(
      'id'    => 'zero-footer-page-comtywkg',
      'type'  => 'switcher',
      'title' => '是否开启无中文评论',
      'label' => '默认关闭',
       'default' => false,
        'subtitle' => '开启之后没有中文的评论会被拦截，这样会有效提升网站安全',
    ),
    )
    ) );
    CSF::createSection( $prefix, array(
    'title' => 'SMTP设置',
    'icon'  => 'fas fa-mail-bulk',
    'fields' => array(
       			array(
				'id'    => 'zero-smtp-fwqdz',
				'type'  => 'text',
				'title' => 'SMTP服务器',
				'subtitle' => '如:smtp.163.com',
			), 
       			array(
				'id'    => 'zero-smtp-dk',
				'type'  => 'text',
				'title' => 'SMTP端口',
				'subtitle' => 'QQ邮箱:465。网易邮箱：465/994',
				'default' => '465',
			), 
       			array(
				'id'    => 'zero-smtp-ssl',
				'type'  => 'text',
				'title' => 'SMTP端口',
				'subtitle' => '一般默认为:ssl',
				'default' => 'ssl',
			), 
       			array(
				'id'    => 'zero-smtp-fjyx',
				'type'  => 'text',
				'title' => '发信邮箱',

			), 
       			array(
				'id'    => 'zero-smtp-ps',
				'type'  => 'text',
				'title' => '授权密码非零时密码',
          'attributes'  => array(
                'type'      => 'password',
                'autocomplete' => 'off',
            ),
			), 

    )
    ) );
      CSF::createSection( $prefix, array(
    'title' => '首页模板切换',
    'icon'  => 'far fa-clone',
    'fields' => array(
    array(
      'id'      => 'opt-index-buju',
      'type'    => 'image_select',
      'title'   => '首页模板切换',
      'inline'  => 'opt_img',
      'options' => array(
        'opt_blog' =>  get_template_directory_uri().'/images/qzdy_buju_1.svg',
        'opt_img' => get_template_directory_uri().'/images/qzdy_buju_2.svg',
      ),
      'default' => 'opt_blog',
    ),
    
    array(
      'id'      => 'opt-index-sidebar-position',
      'type'    => 'radio',
      'title'   => '侧边栏位置',
      'inline'  => 'opt-sidebar-right',
      'options' => array(
        'opt-sidebar-left' => '左侧',
        'opt-sidebar-right' => '右侧',
      ),
      'default' => 'opt-sidebar-right',
    ),
    
    )
    ) );
CSF::createSection( $prefix, array(
    'title' => '首页置顶文章',
    'icon'  => 'fas fa-sort-amount-up-alt',
    'fields' => array(
        		    array(
      'id'    => 'zero-index-zhidibng',
      'type'  => 'switcher',
      'title' => '开启首页置顶',
      'label' => '开启首页置顶',
       'subtitle' => '轮播图下面的四篇置顶文章',
       'default' => false,
    ),
                    array(
      'id'          => 'zero-index-topping-box',
      'type'        => 'select',
      'title'       => '设置需要置顶的文章',
      'chosen'      => true,
      'multiple'    => true,
      'sortable'    => true,
      'ajax'        => true,
      'options'     => 'posts',
      'placeholder' => '请搜索文章名称两字以上',
    ),



)
) );
CSF::createSection( $prefix, array(
    'title' => '幻灯片设置',
    'icon'  => 'fas fa-upload',
    'fields' => array(
        array(
      'id'    => 'zero-index-bannerkg',
      'type'  => 'switcher',
      'title' => '开启幻灯片',
      'label' => '开启幻灯片',
       'subtitle' => '默认关闭轮播图',
       'default' => false,
        ),
        array(
      'id'    => 'zero-index-bannerkg-wzgn',
      'type'  => 'switcher',
      'title' => '关闭图片文字',
      'label' => '开启图片文字',
       'subtitle' => '默认开启图片文字',
       'default' => true,
        ),
        array(
            'id'     => 'opt-group-topping-zhiding',
            'type'   => 'group',
            'title'  => '首页幻灯片设置',
            'max' => 4,
            'fields' => array(
                array(
                    'id'    => 'opt-group-topping-title',
                    'type'  => 'text',
                    'title' => '标题',
                ),
               array(
		    	    'id'    => 'zero-banner-topping-img',
		    	    'type'  => 'upload',
			       'title' => '图片地址',
			         'default' => '',
		    	),
                array(
                     'id'    => 'opt-text-topping-url',
                     'type'  => 'text',
                     'title' => '跳转地址',
                ),
               )
            ),
    )
    ) );

CSF::createSection( $prefix, array(
		'id'    => 'zero_w',
		'title' => '拓展功能',
		'icon'  => 'fa fa-plus-circle',
		
	) );

CSF::createSection( $prefix, array(
		'parent'      => 'zero_w',
		'title'  => '友情链接',
		'fields' => array(
		     array(
                  'type'    => 'notice',
                  'style'   => 'info',
                  'content' => '注意：如果是新安装的主题需要在。侧边栏的 外观》小工具》找到：\'Qzdy-友情链接\'工具添加上',
                 ),
            array(
              'id'       => 'opt-cbl-cblyqlj',
              'type'     => 'code_editor',
              'title'    => '<strong>友情链接</strong>',
              'subtitle' => '注意：一行一个',
              'settings' => array(
                'theme'  => 'dracula',
                'mode'   => 'javascript',
                  ),
                  'default' =>'<a target="_blank" href="https://www.aj0.cn/">秋知德雨</a>',
                 ),
	)
	) );

CSF::createSection( $prefix, array(
		'parent'      => 'zero_w',
		'title'  => '后台优化(建议)',
		'description' => '没开启的强烈建议开启，不要安装插件禁用！打钩开启禁用',
		'fields' => array(

array(
      'id'    => 'zero-ht-jyxbxgj',
      'type'  => 'checkbox',
      'title' => '后台小工具',
      'subtitle' => '禁用之后有明显的速度提升',
      'label' => '禁用新版小工具.',
      'default' => true,
    ),
    array(
      'id'    => 'zero-ht-jyxbbjq',
      'type'  => 'checkbox',
      'title' => '后台新版本编辑器',
      'subtitle' => '禁用之后有明显的速度提升',
      'label' => '禁用新版编辑器.',
      'default' => true,
    ),
    array(
      'id'    => 'zero-ht-htkqzdttx',
      'type'  => 'checkbox',
      'title' => '开启自定义头像功能',
      'subtitle' => '开启之后在侧边栏：用户>个人资料>最下方  上传图片',
      'label' => '开启自定义头像功能',
      'default' => true,
    ),

    array(
      'id'    => 'zero-wzl-category',
      'type'  => 'checkbox',
      'title' => '禁用分类链接中category',
    //   'subtitle' => '开启之后在侧边栏：用户>个人资料>最下方  上传图片',
      'label' => '禁用分类链接中category',
      'default' => false,
    ),
        array(
      'id'    => 'zero-bjq-zengqiang',
      'type'  => 'checkbox',
      'title' => '编辑器增强',
      'subtitle' => '一些配置不好的服务器开启可能会感到xu微的卡',
      'label' => '默认开启',
      'default' => true,
    ),
	)
	) );
        CSF::createSection( $prefix, array(
    'parent'      => 'zero_w',
    'title' => '主题伪原创',
    'description' => '搜索引擎有个算法是分析判断模板同质化的。就是说同一套模板，用的人太多…千篇一律，蜘蛛都麻木了懒得动了。<br/>所以主题伪原创诞生<br/>注意只能输入26个英文字母和英文的\'_-\'和数字，不能以数字开头 QQ交流群：91736-7358',
    'fields' => array(
		array(
      'id'    => 'zero-body-tzhkg',
      'type'  => 'switcher',
      'title' => '开启模板防同质化功能',
       'subtitle' => '绿色是开启',
       'default' => false,
            ),
        array(
      'id'    => 'opt-body-tzh1',
      'type'  => 'text',
      'title' => '请输入网站名称首字母',
      'subtitle' => '随便输入也可以8字母之内就行',
      'placeholder' => '如：qzdy'
      
    ),
        array(
      'id'    => 'opt-body-tzh2',
      'type'  => 'text',
      'title' => '请输入自定义样式类名',
      'subtitle' => '每组之间空格隔开4组内就可以了',
      'placeholder' => '如：rzdy_css qzdy-2 qzdy  qzdyqzdy...'
    ),
    )

    ) );
CSF::createSection( $prefix, array(
    'parent'=> 'zero_w',
    'title' => 'Server酱接口',
    'description' => 'Server酱是站点评论微信推送消息，Server与主题没有关系，只是提供这样一个接口，用不用取决于你们,由于Server酱收费颇高不建议使用.',
    'fields' => array(
         		array(
      'id'    => 'zero-htai-wxts',
      'type'  => 'switcher',
      'title' => '开启Server酱',
       'subtitle' => '绿色是开启',
       'default' => false,
            ),
						array(
				'id'    => 'zero-footer-serverjiang',
				'type'  => 'text',
				'title' => '开通Server酱接口',
				'subtitle' => '<p>打开<a rel="external nofollow" target="_blank" href="https://sct.ftqq.com/upgrade?fr=sc" aria-label="server酱 (opens in a new tab)">server酱</a>的官网登录并获取SendKey</p>',
				 'default' =>'',
			),
    )
    ) );
    // 二级二级二级二级二级二级二级二级v
CSF::createSection( $prefix, array(
    'title' => '底部设置',
      'icon'        => 'fas fa-code-branch',
    'fields' => array(
		    array(
      'id'    => 'zero-footer-youqinglink',
      'type'  => 'switcher',
      'title' => '底部友情链接开启功能',
      'label' => '默认开底部友情链接',
       'subtitle' => '可选择使用侧边栏友情链接功能还是底部功能，如需使用侧边栏友情链接，请前往-》外观-》小工具-》选择友情链接工具即可',
       'default' => true,
    ),
				array(
				'id'    => 'zero-footer-gxbba',
				'type'  => 'text',
				'title' => '工信部备案号',
			
			),
				array(
				'id'    => 'zero-footer-gaba',
				'type'  => 'text',
				'title' => '公安备案号',
				'default' => '备案号0000000-1',
			),
                array(
                  'id'       => 'opt-code-dibuzdyhtml',
                  'type'     => 'code_editor',
                  'title'    => '<strong>如果需要换行用&lt;br></strong>',
                  'subtitle' => '可以加入自己的html样式',
                  'settings' => array(
                    'theme'  => 'shadowfox',
                     'mode'   => 'htmlmixed',
                  ),
                  'default' =>'<a href="https://aj0.cn/youren">友人帐</a> | <a href="https://aj0.cn/guanyu">关于</a> | <a href="https://aj0.cn/guanyu">申明</a> | <a href="https://gitee.com/MUCEO/qzdy">请在设置底部更改</a>',
                ),
                array(
                  'id'       => 'opt-code-dibutjs',
                  'type'     => 'code_editor',
                  'title'    => '底部统计如cnzz',
                  'subtitle' => '<strong>注意</strong>支持js',
                  'settings' => array(
                    'theme'  => 'dracula',
                    'mode'   => 'javascript',
                                     ),

                    ),
              	array(
				'id'    => 'zero-footer-dibubq',
				'type'  => 'textarea',
				'title' => '底部自定义文字',
				'subtitle' => '最底部自定义文字等等',
			),
    )
    ) );
    //
// Field: backup
//Q-Q交-流群：9173673-58
CSF::createSection( $prefix, array(
  'title'       => '备份',
  'icon'        => 'fas fa-shield-alt',
  'fields'      => array(

    array(
      'type' => 'backup',
    ),

  )
) );
CSF::createSection( $prefix, array(
    'title' => '关于',
    'icon'  => 'fas fa-upload',
    'fields' => array(
    array(
      'type'    => 'content',
    //   哥哥你倒卖可以但是留个群或者博客吧，不然用户就算买了不会用还不是找你，我做你的免费售后Q-Q交-流群：9173673-58
      'content' => 'Qzdy主题 简约 极致 <hr>关于：开发不易，请留个版权，QQ交流群：917367358(主题交流，更新建议)<hr>Theme Qzdy v4.7 | <span class="layui-badge"><a href="https://aj0.cn/?p=51" style="color: #fff;"  target="_blank">主题说明</a></span> | <span class="layui-badge layui-bg-black"><a href="https://gitee.com/MUCEO/qzdy" style="color: #fff;"  target="_blank">源码Gitee</a></span><hr class="layui-border-orange">当前版本 v4.7：<span class="layui-badge layui-bg-blue"><a href="https://gitee.com/MUCEO/qzdy" style="color: #fff;"  target="_blank">最新版本更新地址</a></span>',
    ),
    )
    ) );
    }
?>