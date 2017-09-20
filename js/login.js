$.validator.setDefaults({
	submitHandler:function(){
		var info=$('#user').val();
		var pwd=$('#password').val();
		var code=$('#code').val();
		$.ajax({
			url:'php/login.php',
			type:'post',			
			data:{
				info:info,
				pwd:pwd,
				code:code
			},
			success:function(data){
				if(data>0){
					alert('登录成功');
					location.href='index.php';
				}else{
					alert('账号或密码错误');
				}
			}
		});
	}
});
$.validator.addMethod('info',function(v){
	if(/@/.test(v) || /^1[3-5789]\d{9}$/.test(v)){
		return true;
	}else{
		return false;
	}
	
	
},'格式错误');
$.validator.addMethod('password',function(value){ 
    return /^\w{4,6}$/.test(value);
},'密码应该在4-6位');

$.validator.addMethod('code',function(value){
	var rel=0;
    $.ajax({
		url:'php/verify.php',
		type:'post',
		async:false,
		data:{code:value},
		success:function(d){
			if(d==2){
				rel=0;
			}else{
				rel=1;
			}
		}
	});
	if(rel==0){
		return false;
	}else{
		return true;
	}
},'验证码错误');
$('#login').validate({
	rules:{
		info:{
			required:true,
			info:true
		},
		pwd:{
			required:true,
			password:true
		},
		code:{
			required:true,
			code:true
		}
	},
	messages:{
		info:{
			required:'必填'
		},
		pwd:{
			required:'必填'
		},
		code:{
			required:'请输入验证码'
		}
	},
	success:function(label){
		label.html('√').css({color:'green','font-weight':'bold','font-size':'30px'});
	}
});