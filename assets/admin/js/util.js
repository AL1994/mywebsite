(function(window) {
	window.util = {
		cookie : {
			setCookie : function(key, value, day) {
				var str = key + '=' + value;
				if (day) {
					var now = new Date();
					now.setDate(now.getDate() + day);
					str += '; expires=' + now;
				}
				document.cookie = str;
			},

			getCookie : function(key) {
				var sCookie = document.cookie;
				var arr = sCookie.split('; ');
				for (var i = 0; i < arr.length; i++) {
					var arr2 = arr[i].split('=');
					if (arr2[0] == key) {
						return arr2[1];
					}
				}
			},
			removeCookie : function(key) {
				this.setCookie(key, '', -1);
			}
		}
	};
})(window);
