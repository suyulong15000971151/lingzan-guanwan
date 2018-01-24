$(function() {
	var flag = true;
	$(".log .log-box .content .user .user-psd span").click(function() {
		if(flag) {
			$(".log .log-box .content .user .user-psd span").css({
				background: 'url(img/pskai.png) no-repeat',
				backgroundSize: "100% 100%"
			})
			$(".log .log-box .content .user .user-psd input").attr("type", "text")
			flag = false;
		} else {
			$(".log .log-box .content .user .user-psd span").css({
				background: 'url(img/psbi_03.png) no-repeat',
				backgroundSize: "100% 100%"
			})
			$(".log .log-box .content .user .user-psd input").attr("type", "password")
			flag = true;
		}
	})

	//这里是表单验证

	function countTime(num) {
		num--;
		$(".verifical button").text(num + "s");
		if(num <= 60) {
			$(".verifical button").attr("disabled", "disabled")
			var time = setTimeout(function() {
				countTime(num);
				//$(".verifical button").attr("disabled","disabled")
			}, 1000)

		}
		if(num <= 0) {
			console.log(num)
			$(".verifical button").text("发送验证呀");
			$(".verifical button").attr("disabled", false)
			clearTimeout(time)

		}
	}

	$('.verifical button').click(function() {

		var val = $('.mobile').val();
		if(val == "") {
			//					alert('手机号不能为空')
			$(".error").text("手机号不能为空");
			return false;

		} else {
			//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
			var res = /^1\d{10}$/
				//						以1开始后面加10位数字
				//						if(res.test(val) | re.test(val))
			if(res.test(val)) {
				num = 60;
				var time = setTimeout(countTime(num), 1000)

			} else {
				//						alert("手机格式错误！");
				$(".error").text("手机格式错误！")
				return false
			}
		}
	})

	function nickName(nick) {
		if(nick == "") {
			//			alert("昵称不能为空")
			$(".error").text("昵称不能为空")

		} else {
			var reg = /^[a-zA-Z0-9\u4e00-\u9fa5]+$/;
			if(reg.test(nick)) {
				var ps = $('.password').val();
				pss(ps)

			} else {
				//				alert("昵称格式不符")
				$(".error").text("昵称格式不符")

			}
		}
	}

	function pss(str) {
		if(str == '') {
			//					alert("密码不能为空")
			$(".error").text("密码不能为空")

		} else {
			var reg = /^[\w]{6,12}$/
				//						以1开始后面加10位数字
			if(reg.test(str)) {
				var val = $('.mobile').val();
				if(val == "") {
					//					alert('手机号不能为空')
					$(".error").text("手机号不能为空")

				} else {
					//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
					var res = /^1\d{10}$/
						//						以1开始后面加10位数字
						//						if(res.test(val) | re.test(val))
					if(res.test(val)) {
						var vermes = $(".log .log-box .content .user .verifical input").val()
						if(vermes == "") {
							$(".error").text("验证码不能为空")

						}
						//						console.log('正确')

					} else {
						//						alert("手机格式错误！");
						$(".error").text("手机格式错误！")

					}
				}

			} else {
				//						alert("密码格式错误！");
				$(".error").text("密码格式错误，密码为6-12位！")

			}
		}
	}

	$('button.regit').click(function() {
		$(".error").text("")

		var nicks = $(".nick").val()
			//				alert(nicks)
		nickName(nicks);
		if($(".error").text() == "") {
			return true
		} else {
			return false
		}

	})

})