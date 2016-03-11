
(function (window) {

	window.secret= function(){
		
		$(".secretmenu").toggle(300);
	
	}
	

	window.loadHomePage= function (){
		
		
		var url="navigation/data.php";
		var x='1';	
				$.getJSON(url,function(json){
			$.each(json.navinfo,function(i,ldat){
				if( x=='1'){ 
					x='2'; 
					var home = ''+ldat.ID+'';
					
					loadPage(''+ home +'');
				}	

			});	
		});
		
	}
	
	
	window.showPages= function (){
		
		var x = 0;
		var home='';
		var url="navigation/data.php";		
		$("#navcontent").html('');
		$("#navcontent").html('<ul></ul>');
		$.getJSON(url,function(json){
			$.each(json.navinfo,function(i,ldat){
				x=x+1;
				$("#navcontent>ul").append(''+
					'<li class="plist link" ID="pageArray_'+ldat.ID+'" > '+
					'<a class="deletebutton dlist" ID="dlist'+ldat.ID+'" href="#" onclick="deletePage(' + ldat.ID + '); return false;">'+
					'<i class="fa fa-remove"></i></a>'+
					'<a href="#'+ldat.title+'" onclick="">'+ldat.title+'</a> ' + 
					'</li>');	
			});	//each
			var linkwidth= 100/ x;
				
			$("#page").append(''+
				'<style>#navcontent>ul>li{width:'+linkwidth+'%; float:left; text-align:center;}</style>'+
				'');
		});
		
	}
	
	
	window.logo= function(){
		$("#header").html(''+
		'<div id="navactions">'+
		'<a href="#" class="links" onclick="mobileNav(); return false;"><i class="fa fa-bars" style="box-shadow: 1px 1px 5px -3px #fff;"></i></a> '+
		'</div>'+
		'<div ID="logo"></div>'+
		'<div id="nav">'+
		'<div id="navcontent"></div>'+
		
		'<div id="navadd"></div>'+	
		'<div id="usercss"></div>'+
		'</div><div style="clear:both; height:10px; width:100% "></div>');

		var url="navigation/customstyle.php";
		var mybanner='';
		$.getJSON(url,function(json){
			$.each(json.cssinfo,function(i,bdat){
				$('#page').append('<style>'+
				'#header{background:'+bdat.bannercolor+';} .link a{color:'+bdat.linkcolor+'; font-size: '+bdat.linksize+'; font-family: '+bdat.linkfont+';} .link a:hover{color:'+bdat.hovercolor+'}'+
				'</style>');
				$("#logo").html('');
				 mybanner=bdat.bannerphoto;
				if(bdat.bannerphoto!=''){
					$("#logo").html('<a href="index.php"><img src="img/full/'+mybanner+'"></a>');
					
					
					
					
				}
			});
		});
		
	}
	

	window.boxback=function(){
		
		$("#boxitem").fadeOut(100);
		$("#boxitem").html('');
		
	}
	

	window.loadContent= function(contentID){
		
		$("#boxitem").fadeIn(100);
		var url="navigation/boxelements.php?be="+ contentID+'';
		$.getJSON(url,function(json){
			$.each(json.boxiteminfo,function(i,bdat){
				
				$('body').append(''+
					'<div class="boxdimmer"><div ID="boxitem"></div></div>'+
					'');
					
				$('#boxitem').append('<div class="goback"><a href="#" onclick="boxback(); return false;">X</a></div>');
						
				if(bdat.photo!=''){
					$('#boxitem').append(''+
					'<img class="boxfullphoto" src="img/full/'+bdat.photo+'" style="max-width: 1000px; min-height: 500px;  margin: auto;">');
				}
					
				if(bdat.title!=''){
					$('#boxitem').append(''+
					'<h4>'+bdat.title+'</h4>'+
					'');
				}
					
				if(bdat.mytext!=''){
					$('#boxitem').append(''+
					'<br> '+bdat.mytext+''+
					'');
				}
				
				var url="navigation/boxphotos.php?boxitem="+ bdat.ID+'';
				$.getJSON(url,function(json){
					$.each(json.photoinfo,function(i,idat){
	
	
					$('#boxitem').append(''+
					'<img class="boxfullphoto" src="img/full/'+idat.photo+'" style="max-width: 1000px; min-height: 500px;  margin: auto;">');
			
							
					});
	
				});
			});
	
		});
		$('#page').append(''+
		'<style>#details{height: 1000px; display: block}</style>');
		
	}
	
	
	window.loadPage= function (pageID){
		
		if (pageID=='home'){
			window.loadHomePage();		
		}	
		
		else{
			window.logo();
			window.showPages();
			window.loadCss();
			window.closehelper();
			$("#page").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
			var login='y';
			$("#page").html('<div ID="bg"></div> ');
			var url="navigation/data.php?page="+pageID+"";
			$.getJSON(url,function(json){
				$.each(json.navinfo,function(i,ldat){
				if (ldat.photo !='' ){
				$('#page>#bg').html('<img src="img/full/'+ldat.photo+'" style=" max-width: 100%; min-width: 100vw; min-height: 100vh; ">');
				}
				if (ldat.background !='' ){
				$('#page>#bg').css("background-color", ""+ldat.background+"");
				$('#page>#bg').css("width", "100%");
				$('#page>#bg').css("height", "100%");
				}
				});	//each
			});//get

			var url="navigation/elements.php?l="+ pageID;
			$.getJSON(url,function(json){
				$.each(json.elementinfo,function(i,ldat){
					$("#page").append(''+
					'<style>' +
					'.element_' + ldat.ID +  '{' +
						'position : absolute' + ';' +
						'top: ' + ldat.posx + 'px;' +
						'left:' + ldat.posy + 'px;' +
						'font-size:' + ldat.fontsize + 'px;' +
						'background: ' + ldat.background + ';' +
						'border-radius: ' + ldat.radius + 'px;' +
						'padding:' + ldat.padding + 'px;' +
						'line-height:' + ldat.fontsize 	+ 'px;' +
						'letter-spacing: ' + ldat.spacing + 'px;' +
						'color: ' + ldat.color 	+ ';' +
						'font-family: ' + ldat.fontfamily + ';' +
						'font-weight: ' + ldat.fontweight + ';' +
						'float: none; ' +
						'text-align: ' + ldat.textalign+';' +
						'padding-bottom:' + ldat.padding + 'px;' +
						'width:	' + ldat.absw + ';' +
						
						'margin:0px;'+
						'}' +
						'.pagecontent'+ldat.ID+'{' +
						'position:relative;'+
						'z-index: ' + ldat.layer + ';' +
						'opacity: ' + ldat.opacity  + ';' +	
						'border-radius: ' + ldat.radius + 'px;' +
						'}' +
						
					'</style>');
					
					$("#page").append(''+
					'<div class="elements element_'+ldat.ID+'" ID="element_'+ldat.ID+'" ></div>' );
					
					$("#element_"+ldat.ID).append(''+	
						'<div class="editbutton" ID="editbutton'+ldat.ID+'">' +
						'<div class="hideEdit" style="float:left;"><a  href="#" onclick="hideEdit(); return false;"><i class="fa fa-minus-circle" style=" width:25px; margin-right:20px"></i></div>'+
							'<div class="mover"  style="float:left;"> ' +
							'<i class="fa fa-arrows"></i>'+
							'</div>'+
							'<div class="stacker"  style="float:left;"> ' +
							'<i class="fa fa-arrows-v"></i>'+
							'</div>'+
							'</div><div class="pagecontents pagecontent'+ldat.ID+'" ID="pagecontent'+ldat.ID+'"></div>');
							
				
							
					
						$("#editbutton"+ldat.ID).append(''+
							'<a class="editelement nodrag" ID="edit'+ldat.ID+' edit" href="#" '+
								'onclick="editElement( '+ ldat.ID + '); return false;">'+
								'<i class="fa fa-pencil"></i></a>'+
						'');
						
						if (ldat.file == ''){
						if (ldat.boxID != ''){
								$("#editbutton"+ldat.ID).append(''+
								'<a class="addboxitem nodrag" href="#" '+
								'onclick="boxItemForm( '+ ldat.ID + ');return false;" '+
								' style="font-size: 12px;" > +add item</a>'+
								'');
								
						}
					}
						
						$("#editbutton"+ldat.ID).append(''+
							'<a class="deleteelement nodrag" ID="dlist'+ldat.ID+'" href="#" '+
								'onclick="deleteElement(' + ldat.ID + '); return false;">'+
								'<i class="fa fa-trash"></i></a><br><div class="newitem"></div>'+
							'');
							
					
							
					if (ldat.file != ''){
						$(".pagecontent"+ldat.ID).append('<img src="img/full/'+ldat.file+'" style="width: 100%; ">');
												
					}
						
					else {
						$(".pagecontent"+ldat.ID).append(''+ldat.pagecontent+'<br>');	
					}
					if (ldat.boxID != ''){
						var url="navigation/boxelements.php?box="+ldat.boxID+"";
							$( '.pagecontent' +ldat.ID).append('<ul ID="boxlist"></ul>');
						$.getJSON(url,function(json){
							$.each(json.boxiteminfo,function(i,bdat){
								var colwidth= 82 / ldat.columnset;
							
								$( ".pagecontent"+ldat.ID+" > ul" ).append(''+
								'<li ID="boxelement_'+bdat.ID+'" class="boxelements" style="   float:left; margin: 1%; text-align: inherit; padding:1%" onclick=""></li>');
								
								$('#boxelement_'+bdat.ID).append(''+
								
								'<div class="boxeditbutton" style="width:inherit; position: absolute; top:auto;background: #eee; opacity: 0.8;display:none">'+
								
								'<div class="boxmover" style="float:left;font-size: 25px; margin color:#333;"> ' +
									'<i class="fa fa-arrows"></i>'+
								'</div>'+
								
								'<a href="" onclick="editBoxElement('+bdat.ID+'); return false;"><i class="fa fa-pencil"></i>edit</a>'+
							
				
								'<a style="color: #333333; " href="#" onclick="deleteBoxElement('+bdat.ID+'); return false;"><i class="fa fa-trash" style="font-size: 25px; margin-right:20px; float:right;"></i></a></div>'+
								
								'');
								
									if(bdat.photo!=''){
								$('#boxelement_'+bdat.ID).append(''+
								'<div class="boxphotowrap"><a href="#" onclick="loadContent('+bdat.ID+');  return false;"><img class="boxphoto" src="img/full/'+bdat.photo+'" ></a></div>');
								}
								
								if(bdat.title!=''){
								$('#boxelement_'+bdat.ID).append(''+
								'<b><a href="#" onclick="loadContent('+bdat.ID+', '+ldat.ID+' ); return false;">'+bdat.title+'</a></b>'+
								'');
								}
								
								if(bdat.mytext!=''){
								$('#boxelement_'+bdat.ID).append(''+
								'<br> '+bdat.mytext+'<br>'+
								'');
								}				
								$('#element_'+ldat.ID).css("height" , "auto");
								$('#element_'+ldat.ID).css("overflow" , "none");
								$("ul#boxlist>li").css("width", ""+colwidth+"%");
								var nextline=ldat.columnset;
										 
								//$("ul#boxlist>li:nth-child("+nextline+"n+1)").before('<div style=" width: 100%; height: 10px; background:#000;"></div>');
								$("ul#boxlist>li:nth-child("+nextline+"n+1)").css("clear","both");
							});	
						});				
					}							
				});	//each		
			});//get
			$('#page>#bg').click(function(){
				$('.elements>.editbutton').hide(0); 
				$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
			});
			$('#page>.elements').click(function(){
				$('.elements>.editbutton').hide(0); 
				$('.elements .ui-resizable-handle, .ui-resizable-se, .ui-icon, .ui-icon-gripsmall-diagonal-se').hide(0); 
				$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
				$(this).css('box-shadow', '0px 0px 1px 0px #00F');
				$(this).find('.editbutton').show(0).zIndex(10000000);
				$(this).find('.ui-resizable-handle, .ui-resizable-se, .ui-icon, .ui-icon-gripsmall-diagonal-se').show(0);
			});			
		}			
		$("#page").css("min-height","0px");
		$("#page").css("height","auto");
		
	}
	
	window.loadCss = function(){
		
		var url="admin/userdata.php?cssonly=true";
		$("#userCss").html('');
		$.getJSON(url,function(json){
			$.each(json.userinfo,function(i,ldat){
			$("#userCss").html(''+
				'<style>'+ldat.usercss+'</style>'+	
				'');
			});
		});
		
	}
	
	window.mobileNav = function(){
		$("#navcontent").toggle(400);
	}

}(this));

$(document).ready(function(){	
});
