$(document).ready(function(){
	
	$(".adminsecret").click(function(v){
		v.preventDefault();	
		$(".secretmenu").toggle(200);
		});
		
	$(".adminlogin").click(function(c){
			c.preventDefault();	
			$("#adminlogin").load('admin/index.php');
			$('.login').slideUp();
			$('.register').slideUp();
			$('#logincontent').slideUp();
		});	
	
	$(".adminregister").click(function(d){
			d.preventDefault();	
			$("#adminlogin").load('admin/register.php');
		});	

	});
	