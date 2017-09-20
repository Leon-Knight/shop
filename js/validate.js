// 邮箱注册时的验证
$.validator.setDefaults({

    submitHandler:function() {
       var e=$("#email1").val();
        var password=$("#password").val();
        var p=$(".protocol:checked").eq(0).val();
        var confirm=$('#passwordRepeat').val();
  
        $.ajax({
                url:'register.php?e='+e+'&password='+password+'&p='+p+'&confirm='+confirm,
                beforeSend:function(){
                    // $('#sub').val('注册中');
                    if(!/\w+[@]{1}\w+[.]\w+/.test(e)){

                        alert('注册失败:邮箱格式不正确,重新来过吧！');
                        location.reload();
                        return false;

                    }else if(!/^\w{4,6}$/.test(password)){
                        alert('注册失败:密码格式不正确,重新来过吧！');
                        location.reload();
                        return false;
                    }else if(confirm!=password){
                        alert('注册失败：密码输入不一致！');
                        return false;
                    }
                    else if(p!='on'){
                        alert('没有阅读协议哦！选中它');
                        return false;
                    }
                    
                },
                success:function(data){
                    // alert(data);
                    if(data>0){
                        alert('注册成功哦，你的用户名为'+e);
                        $('#sub').val('注册');
                        $('#success').css('display','block');
                        $('#success>div>span').html('注册成功哦，你的用户名为'+e);
                      


                    }else{
                        alert('注册失败温馨提示：没有选中协议哦^-^或邮箱名已注册');
                        
                    }
                
                    
                }
        });

    }
});

$('#email').validate({
        rules:{
                email:{
                 required:true,
                 // email:true
                },
                password:{
                 required:true,
                 // password:true
                },
                passwordRepeat:{
                 required:true,
                 // passwordRepeat:true,
                 equalTo:"#password"
                }
        },
        messages:{
                email:{
                 required:"邮箱是必填项哦！",
                 // email:"温馨提示：email格式正确^-^"
                },
                password:{
                 required:"密码是必填项哦！",
                 // password:"密码格式正确"
                },
                passwordRepeat:{
                 required:"确认密码必填哦！",
                 // /passwordRepeat:'输入一致',
                 equalTo:"请输入一致"
                }
        },
        success:function(label){
                 label.html('√');
               
        }
});
$.validator.addMethod('email',function(value){
   
return /\w+[@]{1}\w+[.]\w+/.test(value);
},"email格式不正确^-^");
$.validator.addMethod('password',function(value){
       
        return /^\w{4,6}$/.test(value);
},'密码应该在4-6位');





//检测邮箱名是否注册
$('#check').click(function(){
    var email=$('#email1').val();
    $.ajax({
        url:'check.php?e='+email,
        success:function(data){
             // alert(data);
             if(data>0){
                // alert('该email未注册，可以使用！');
                $('#check').html('已注册，换一个吧！');
             }else{
                // alert('email已被注册，换一个更炫的email吧！');
                 $('#check').html('可以使用');
            } 
        }
    });
});


//提交按钮
// $('#sub').click(function(){
//     var e=$("#email1").val();
//     var password=$("#password").val();
//     var p=$(".protocol:checked").eq(0).val();
//     var confirm=$('#passwordRepeat').val();
  
//         $.ajax({
//                 url:'register.php?e='+e+'&password='+password+'&p='+p+'&confirm='+confirm,
//                 beforeSend:function(){
//                     // $('#sub').val('注册中');
//                     if(!/\w+[@]{1}\w+[.]\w+/.test(e)){

//                         alert('注册失败:邮箱格式不正确,重新来过吧！');
//                         location.reload();
//                         return false;

//                     }else if(!/^\w{4,6}$/.test(password)){
//                         alert('注册失败:密码格式不正确,重新来过吧！');
//                         location.reload();
//                         return false;
//                     }else if(confirm!=password){
//                         alert('注册失败：密码输入不一致！');
//                         return false;
//                     }
//                     else if(p!='on'){
//                         alert('没有阅读协议哦！选中它');
//                         return false;
//                     }
                    
//                 },
//                 success:function(data){
//                     // alert(data);
//                     if(data>0){
//                         alert('注册成功哦，你的用户名为'+e);
//                         $('#sub').val('注册');
//                         $('#success').css('display','block');
//                         $('#success>div>span').html('注册成功哦，你的用户名为'+e);
                      


//                     }else{
//                         alert('注册失败温馨提示：没有选中协议哦^-^或邮箱名已注册');
                        
//                     }
                
                    
//                 }
//         });

//         return false;
// });

// 注册成功后提示div的关闭按钮点击事件
$('#close').click(function(){
    $('#success').css('display','none');
});



//注册成功后自动刷新本页面
$('#guan').click(function(){
    $('#success').css('display','none');
    location.reload();//注册成功后自动刷新本页面
});





//电话注册时的验证

$.validator.setDefaults({
    submitHandler: function() {
      // alert("提交事件!");
        var phone=$('#phone').val();
        var telpwd=$('.telpwd').val();
        var confirm=$('.confirm').val();
        var p=$(".telregirst:checked").eq(0).val();
        // alert(phone);
        $.ajax({
            url:'tel_register.php',
            type:'post',
            data:{
                phone:phone,
                telpwd:telpwd,
                confirm:confirm,
                p:p
            },
            beforeSend:function(){
                if(!/^1(3|4|5|7|8)\d{9}$/.test(phone)){
                    alert('手机格式输入错误');
                    return false;
                }else if(!/^\w{4,6}$/.test(telpwd)){
                    alert('密码格式不正确');
                    return false;
                }else if(confirm!=telpwd){
                    alert('两次密码输入不一致');
                    return false;
                }
                else if(p!='on'){
                    alert('没有阅读协议哦！选中它');
                    return false;
                }
            },
            success:function(data){
                // alert(data);
                if(data){
                    alert('手机号注册成功！');
                    $('#success1').css('display','block');
                    $('#success1>div>span').html('注册成功哦，你的用户名为'+phone);
                     
                }else{
                    alert('手机号注册失败');

                }
            }

        });
    }
});




$('#tel').validate({
        rules:{
                phone:{
                 required:true,
                 p:true
                
                },
                password1:{
                 required:true,
               
                },
                passwordRepeat1:{
                 required:true,
                 
                 equalTo:"#pwd"
                }
        },
        messages:{
                phone:{
                 required:"电话是必填项哦！",
               
                 
                },
                password1:{
                 required:"密码是必填项哦！",
              
                },
                passwordRepeat1:{
                 required:"确认密码必填哦！",
                
                 equalTo:"请输入一致"
                }
        },
        success:function(label){
                 label.html('ok');
               
        }
});
$.validator.addMethod('p',function(value){
   
return /^1[3-578]\d{9}$/.test(value);
},"电话格式不正确^-^");
$.validator.addMethod('pass',function(value){
       
        return /^\w{4,6}$/.test(value);
},'密码应该在4-6位');

//电话注册提交按钮
// $('#sub1').click(function(){
//     // alert(1111);
//     var phone=$('#phone').val();
//     var telpwd=$('.telpwd').val();
//     var confirm=$('.confirm').val();
//     var p=$(".telregirst:checked").eq(0).val();
//     alert(phone);
//     $.ajax({
//         url:'tel_register.php',
//         type:'post',
//         data:{
//             phone:phone,
//             telpwd:telpwd,
//             confirm:confirm,
//             p:p
//         },
//         beforeSend:function(){
//             if(!/^1(3|4|5|7|8)\d{9}$/.test(phone)){
//                 alert('手机格式输入错误');
//                 return false;
//             }else if(!/^\w{4,6}$/.test(telpwd)){
//                 alert('密码格式不正确');
//                 return false;
//             }else if(confirm!=telpwd){
//                 alert('两次密码输入不一致');
//                 return false;
//             }
//             else if(p!='on'){
//                 alert('没有阅读协议哦！选中它');
//                 return false;
//             }
//         },
//         success:function(data){
//             // alert(data);
//             if(data){
//                 alert('手机号注册成功！');
                 
//             }else{
//                 alert('手机号注册失败');
//             }
//         }

//     });
//     return false;
// });