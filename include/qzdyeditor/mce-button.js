(function() {
	tinymce.PluginManager.add('begin_mce_button', function( editor, url ) {
		editor.addButton( 'begin_mce_button', {
			text: false,
			icon: 'editimage',
			title : '短代码',
			type: 'menubutton',
			menu: [
					{
					text: '内容保护',
					menu: [
						{
							text: '密码保护',
							icon: 'lock',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[secret key=密码]'+selected+'[/secret]');
							}
						},


						{
							text: '登陆回复可见',
							icon: 'bubble',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[reply]'+selected+'[/reply]');
							}
						},

						{
							text: '登录可见',
							icon: 'user',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[hide]'+selected+'[/hide]');
							}
						},


					]
				},

				{
					text: '链接按钮',
					menu: [
					    						{
							text: '普通按钮',
							icon: 'newtab',
							onclick: function() {
								editor.insertContent('[link href=' + '链接地址]按钮名称[/link]');
							}
						},
					    
					    
					    
						{
							text: '居中按钮',
							icon: 'nonbreaking',
							onclick: function() {
								editor.insertContent('[jzbut href=' + '下载链接地址]按钮名称[/jzbut]');
							}
						},

					]
				},

				{
					text: '综合功能',
					menu: [



						{
							text: '文字折叠',
							icon: 'pluscircle',
							onclick: function() {
		
								editor.insertContent('[collapse title="标题内容"]' + '[/collapse]');
							
							}
						},



						{
							text: 'iframe标签',
							icon: 'template',
							onclick: function() {
								editor.insertContent('[iframe src="网址"' + ']');
							}
						},


						{
							text: 'MP4视频',
							icon: 'media',
							onclick: function() {
								editor.insertContent('[videos src=视频地址]');
							}
						},
						
	
					]
				},

				{
					text: '彩色背景',
					menu: [
						{
							text: '绿色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_a]'+selected+'[/mark_a]');
							}
						},

						{
							text: '蓝色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_b]'+selected+'[/mark_b]');
							}
						},

						{
							text: '黄色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_c]'+selected+'[/mark_c]');
							}
						},

						{
							text: '红色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_d]'+selected+'[/mark_d]');
							}
						},

					]
				}
			]
		});
	});
})();