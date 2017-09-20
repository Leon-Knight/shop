//登录的点击事件
$('#login').click(function(){
    // alert(1);
    var user=$('#user').val();
    var password=$('#password').val();
    // alert(user);
    // alert(password);
    $.ajax({
    	url:'login.php?username='+user+'&password='+password,
    	success:function(data){
    		// alert(data);
    		if(data>0){
    			// alert('登录成功');
    			$('#tishi').css('display','block');
    			$('#tishi>div>span').html('欢迎用户'+user+'您的到来，登录成功');

               
    		}else{
    			// alert('登录失败 温馨提示：用户名或密码不正确');
    			$('#false').css('display','block');
    			$('#false>div>span').html('很抱歉登录失败，温馨提示：用户名或密码不正确哦，重新来一次，小编在此候着呢！');
                // location.href='register2.html';
    		}
    	}
    })
    
});

// 登录成功后提示div的关闭按钮点击事件
$('#close').click(function(){
    $('#tishi').css('display','none');
});


//登录成功后自动刷新本页面
$('#guan').click(function(){
    $('#tishi>div').css('display','none');
    location.reload();//注册成功后自动刷新本页面
});

// 登录失败后提示div的关闭按钮点击事件
$('#close1').click(function(){
    $('#false').css('display','none');
});


