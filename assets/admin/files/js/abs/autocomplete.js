;(function($){
	$.fn.extend({
		autocomplete: function(){
			$list = $('<ul class="autocomplete-list"></ul>');
			$list.css({
				left: this.offset().left,
				top: this.offset().top + this.hight + 4
			});
			that = this;
			var testData = ['hellow', 'hah', 'heh', 'css', 'dsx'];
			var index = 0;
			this.on('keyup', function(e){
				if($.trim(this.value) != "" && e.which != 13){
					$list.empty().remove();
					var html = "";
					for(var i=0; i<testData.length; i++){
						var re = new RegExp(this.value, 'gi');
						if(re.test(testData[i])){
							html += '<li>'+testData[i]+'</li>';
						}
					}
					if(html){
						$list.append(html).appendTo(that.parent());
						$list.children().eq(index).addClass('selected').siblings().removeClass('selected');
					}
				}else{
					$list.remove();
				}
				
			}).on('keydown', function(e){
				if(e.which == 38){
					index--;
					if(index == -1){
						index = $list.children().length - 1;
					}
				}else if(e.which == 40){
					index++;
					if(index == $list.children().length){
						index = 0;
					}
				}else if(e.which == 13){
					if($list.children().length){
						this.value = $list.children().eq(index).html();
						$list.remove();
					}
				}
			});
		}
	});
})(jQuery);