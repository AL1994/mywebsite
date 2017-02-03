;(function($) {
	$.fn.extend({
		'mytag' : function(options) {
			options = $.extend({
				maxLength : 10,
				displaySize : 10,
				height : 24
			}, options);

			var ds = options.dataSource;

			var $tagInput = $('<input type="text"/>'),
			    $tagPrompt = $('<ul class="tag-prompt"></ul>').css('top', options.height),
			    $tagInputWrap = $('<li class="tag-input-wrap"></li>'),
			    $tagHiddeInput = $('<input type="hidden" name="'+options.hiddenInputName+'"/>');

			var iCount = 0;
			this.addClass('tag-container clearfix')
			.css('height', options.height).append($tagInputWrap)
			.on('click', '.tag-prompt li', function() {
				iCount++;
				if (iCount <= options.maxLength) {
					$(this).addClass('tag-item').insertBefore($tagInputWrap);
				} else {
					iCount = options.maxLength;
					alert('允许最大的输入个数为：' + options.maxLength);
				}
				$tagHiddeInput.val($tagHiddeInput.val().length>0?$tagHiddeInput.val() + ',' + $(this).text():$(this).text());
				$tagInput.val("");
			}).on('click', '.tag-item', function() {
				iCount--;
				if(!$(this).data('isNew')){
					$(this).removeClass('tag-item').appendTo($tagPrompt);
					$tagPrompt.show();
				}else{
					$(this).remove();
				}
			});

			$tagInputWrap.append($tagInput).append($tagPrompt).append($tagHiddeInput);

			if (ds && ds.constructor == Array && ds.length > 0) {
				var size = 0;
				if (options.displaySize < 0) {
					size = 0;
				} else if (options.displaySize > ds.length) {
					size = ds.length;
				} else {
					size = options.displaySize;
				}
				for (var i = 0; i < size; i++) {
					$tagPrompt.append('<li>' + ds[i] + '</li>');
				}
				$tagInput.on('focus', function() {
					$tagPrompt.show();
					$tagInput.on('keydown', keydownHandler);
				});

			} else if (ds && typeof ds == 'string') {
				$tagInput.on('keyup', function(e) {
					if(e.which == 40 || e.which == 38 || e.which == 8 || e.which == 13){}
					else{
						if (this.value.length > 0) {
							$.get(ds, {
								keyword : this.value
							}, function(data) {
								$tagPrompt.html("");
								if(data.length > 0){
									for (var i = 0; i < data.length; i++) {
										$tagPrompt.append('<li>' + data[i].tag_name + '</li>');
									}
									$tagPrompt.show();
									//$tagInput.data('tagPromptLi', $tagPrompt.children());
									
								}else{
									$tagPrompt.hide();
								}
							}, 'json');
						}
					}
				});
				$tagInput.on('keydown', keydownHandler);
			}
			
			var index = -1;//标识选中的提示项的索引
			function keydownHandler(e){
				var $tagPromptLi = $tagPrompt.children();//$(this).data('tagPromptLi');
				if(e.which == 40){
					index++;
					if(index >= $tagPromptLi.length){
						index = $tagPromptLi.length - 1;
					}
					$tagPromptLi.eq(index).addClass('selected').siblings().removeClass('selected');
					$(this).val($tagPromptLi.eq(index).text());
					
				}else if(e.which == 38){
					index--;
					if(index == -1){
						index = 0;
					}
					$tagPromptLi.eq(index).addClass('selected').siblings().removeClass('selected');
					$(this).val($tagPromptLi.eq(index).text());
					return false;
				}else if(e.which == 13){
					
					if($tagPromptLi.length == 0){
						if($.trim(this.value).length > 0){
							$('<li class="tag-item">'+this.value+'</li>').insertBefore($tagInputWrap).data('isNew', true);
							$tagHiddeInput.val($tagHiddeInput.val().length>0?$tagHiddeInput.val() + ',' + this.value:this.value);
						}
					}else{
						$tagPromptLi.eq(index).removeClass('selected').addClass('tag-item').insertBefore($tagInputWrap);
						//$tagHiddeInput.val(($tagHiddeInput.val() + ',' + $tagPromptLi.eq(index).text()).substring(1));
						$tagHiddeInput.val($tagHiddeInput.val().length>0?$tagHiddeInput.val() + ',' + $tagPromptLi.eq(index).text():$tagPromptLi.eq(index).text());
					}
					
					$(this).val('');

					return false;
				}
				
			}
			
			
		}
		
	});
})(jQuery); 



















