
//更新基本信息
$('#updatexinxi').click(function(){
								var nicheng=$('.nicheng').val();
								var name=$('.name').val();
								var radio=$('.radio10:checked').val();
								var phone=$('#user-phone').val();
								var email=$('#user-email').val();
								var introduce=$('#introduce').val();
								// alert(phone);
								$.ajax({
									url:'updateInformation.php',
									type:'post',
									data:{
										nicheng:nicheng,
										name:name,
										radio:radio,
										tel:phone,
										email:email,
										qianming:introduce
									},
									success:function(data){
										if(data){
											alert('信息更新成功！您好：'+name);
											location.reload();
										}else{
											alert('信息更新失败，系统维护中！');
										}
									}
								});

							});