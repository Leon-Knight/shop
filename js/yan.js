var x=0;
$.validator.setDefaults({
    submitHandler:function() {
		var email=$('#email1').val();
		var pwd=$('#password').val();
		$.ajax({
			url:'php/email_register.php',
			type:'post',
			data:{
				email:email,
				pwd:pwd,
				flag:1
			},
			success:function(data){
				if(data==1){
					alert('注册成功');
					location.href='index.php';
				}
			}
		});
    }
});
$.validator.addMethod('yemail',function(v){
	if(/@/.test(v)){
		x=1;
	}else{
		x=0;
	}
	return /@/.test(v);
},'请输入正确的邮箱格式');
$('#email').validate({
	rules:{
		email:{
			required:true,
			email:false,
			yemail:true
		},
		password:{
			required:true
		},
		passwordRepeat:{
			required:true,
			equalTo:'#password'
		},
		agreement:'required'
	},
	messages:{
		email:{
			required:'请输入邮箱'
		},
		password:{
			required:'请输入密码'
		},
		passwordRepeat:{
			required:'请确认密码'
		},
		agreement:'请阅读协议'
	},
	success:function(label){
		label.html('√');
	}
});
$('#email1').blur(function(){
	/*if(x==1){
		var email=$(this).val();
		$.ajax({
			url:'php/checkUser.php',
			type:'post',
			data:{e:email},
			success:function(data){
				alert(data);
			}
		});
	}*/
});