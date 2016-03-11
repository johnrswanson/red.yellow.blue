
(function (window) {



	window.addElement = function (pageID){	
		//var elementdata= 
		var elementdata = new FormData($("#addform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
	
		}).done(function(){
			window.loadPage(''+pageID+'');	
			});
			
	}
	
	window.secret= function(){
		
		$(".secretmenu").toggle(200);
		
	}
	
	window.secretmenu = function (pageID) {
		
		var url="admin/userdata.php";
		$.getJSON(url,function(json){
			$.each(json.userinfo,function(i,dat){
				$("#admincontent").html('<a href="#" class="adminsecret" onclick="secret();return false;"><img src="img/ryblogo.png" width="40px"></i></a>'+
				'<div class="secretmenu"> Hello '+dat.shortname + '<br>'+
				
				'<a href="#" class="pop"  onclick="addNewPage(); return false;">'+
					'<i class="fa  fa-file-text-o"></i> New Page</a><br>'+
					
					'<div id = "drafts"><a href="#" class="pop"   onclick="showDrafts(); return false;">'+
					'<i class="fa fa-lock"></i> Drafts</a></div>'+
				
				'<div ID="addText"><a href="#" class="pop"   onclick="addText('+pageID+'); return false;">'+
					'<i class="fa fa-pencil"></i> Add Text</a></div>'+
					
					'<div ID="addPhoto"><a href="#" class="pop"  ID="addPhoto"onclick="addPhoto('+pageID+'); return false;">'+
					'<i class="fa fa-camera"></i> Add Photo</a></div>'+
					
					'<div ID="addBox"><a href="#" class="pop"  ID="addPhoto"onclick="addBox('+pageID+'); return false;">'+
					'<i class="fa fa-th"></i> Add Box</a></div>'+
					

				
				'<div ID = "addBgPhoto"><a href="#" class="pop"  onclick="addBgPhoto('+pageID+'); return false;">'+
					'<i class="fa fa-image"></i> Page Background</a><br></div>'+
					
					'<div ID = "pagedetails"><a href="#" class="pop"  onclick="editpageDetails('+pageID+'); return false;">'+
					'<i class="fa fa-code"></i> Page Details</a><br></div>'+
					
				'<div ID = "addLogo"><a href="#" class="pop"  onclick="addLogo('+pageID+'); return false;">'+
					'<i class="fa fa-list-alt"></i> Site Banner</a><br></div>'+
					
				'<div ID = "addLinkColor"><a href="#" class="pop"  onclick="addLinkColor('+pageID+'); return false;">'+
					'<i class="fa fa-star"></i> Link Style</a><br></div>'+
					
				'<a href="#" class="pop"  onclick="editCss('+pageID+'); return false;">'+
					'<i class="fa fa-paperclip"></i> CSS Editor</a><br>'+
				
				
				'<a href="#" class="deleteOn" onclick="showDeleteButtons(); return false;">'+
					'<i class="fa fa-remove"></i> Delete Pages</a>'+
				'<a href="#" class="deleteOff" onclick="hideDeleteButtons(); return false;">'+
					'<i class="fa fa-remove"></i> Done</a>'+
					
				'<form ID="livesaver"  method="POST" style="height: 0px; overflow:hidden; "> '+	
				'<input type="hidden" ID="elementID" name="elementID" value=""/>'+	
				'top:<input type="text" ID="dragtop" name="dragtop" value="" />px<br>'+	
				'left:<input type="text" ID="dragleft" name="dragleft" value="" /> %'+	
				'<input type="hidden" ID="suxess" name="suxess" value="ready"/>'+	
				'<input type="hidden" ID="mode" name="mode" value="designer"/>'+	
				'<input  type="submit" ID="elementpos" name="elementpos" value="Save Position">'+	
				'</form>'+
				'<form  ID="sizesaver" method="POST"  style="height: 0px; overflow:hidden; "> '+	
				'<input type="hidden" ID="sizeelementID" name="sizeelementID" value="">'+	
				'width : <input type="text" ID="resleft" name="resleft" value="" /> %<br>'+	
				'abs w : <input type="text" ID="absresleft" name="absresleft" value=""/>px<br>'+	
				'height:<input type="text" ID="restop" name="restop" value=""/>px<br>'+	
				'top:<input type="text" ID="respostop" name="dragrestop" value=""/>px<br>'+	
				'left:<input type="text" ID="resposleft" name="dragresleft" value=""/> %'+	
				'<input type="hidden" ID="suxess" name="suxess" value="ready"/>'+	
				'<input type="hidden" ID="mode" name="mode" value="designer"/>'+	
				'<input  type="submit" ID="elementres" name="elementres" value="Save Size">'+	
				'</form>'+
				'<p><a class="logout pop" href="admin/logout.php">'+
					'<i class="fa fa-user"></i> Log out</p></div>');
			});
		});	
		
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
	
	

	window.sortBox = function(){
		
			$(".pagecontents ul").sortable({
			cursor: 'move', 
			handle:".boxmover",  
			tolerance: "pointer",
			forcePlaceholderSize: true,
			forceHelperSize: true,
			placeholder:"sortable-placeholder",
			
			start: function() {
				$("ul#boxlist>li").css("clear","none");	
			},
			update: function() {
				var boxelementorder = $(this).sortable("serialize") + '&action=updateBox'; 
				$.post("navigation/confirm.php", boxelementorder, function(theResponse){	
					window.helperadd();
					$('#lightbox>#content').html('Box Order Saved');
					$('#lightbox').fadeOut(2000);
					$("ul#boxlist>li").css("clear","none");	
					$("ul#boxlist>li:nth-child("+nextline+"n+1)").css("clear","both");
				});
			}
		});
	
	}

	
	window.showPages= function (){
		
		var x = 0;
		var home='';
		var url="navigation/data.php";
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
		});//get
		
	$("#navcontent ul").sortable({ cursorAt:{left: 0},
			opacity: 0.6,  forcePlaceholderSize: true, delay: 20, distance: 20, forceHelperSize: true, cursor: 'move',
			update: function() {
				var pageorder = $(this).sortable("serialize") + '&action=updatePageOrder'; 
				$.post("navigation/confirm.php", pageorder, function(theResponse){	
					window.helperadd();
					$('#lightbox>#content').html('Page Order Saved');
					$('#lightbox').fadeOut(2000);
				});
			}
		});
	}
	

	
	window.showEdit = function(elementID){

					$('.elements>.editbutton').hide(0); 
					$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
					$('.element_'+elementID).css('box-shadow', '0px 0px 1px 1px #00F');
					$('.element_'+elementID).find('.editbutton').show(0);
										
					}
					
						
	window.hideEdit = function() {
		$('.elements>.editbutton').hide(0);
		$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
	}
	
	window.showBoxEdit = function(elementID){

		$('.boxelements>.boxeditbutton').hide(0); 
		$('.boxelement_'+elementID).find('.boxeditbutton').show(0);
		
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

	window.addblogphotoNow= function(contentID){
		var elementdata = new FormData($("#addblogphoto")[0]);
			$.ajax({
				'url' : "navigation/confirm.php",
				'type' : 'post',
				'data'	: elementdata,
				processData: false,
				contentType: false,
				beforeSend: function(XHR){
					
				}
			}).done(function(){
				window.loadContent(''+contentID+'');	
				});

	}


	window.boxback=function(){
		$("#boxitem").fadeOut(100);
		$("#boxitem").html('');
	
	}

	window.loadContent= function(contentID){
		window.hideEdit();
		$("#boxitem").fadeIn(100);
		var url="navigation/boxelements.php?be="+ contentID+'';
		$.getJSON(url,function(json){
			$.each(json.boxiteminfo,function(i,bdat){
				$('body').append('<div class="boxdimmer"><div ID="boxitem"></div></div>');
				$('#boxitem').append('<div class="goback"><a href="#" onclick="boxback(); return false">X</a></div>');
				
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
					
				$('#boxitem').append(''+
				'<form ID="addblogphoto" style="position: relative ; top: auto;  z-index: 10000;"></form>'+
				'');
				
				$('#addblogphoto').html(''+
				'Add More Photos<br>'+
				'<input type="hidden" name="boxphotos" value="add">'+
				'<input type="hidden" name="contentID" value="'+ contentID +'" >'+
				'<input type="file" name="file" accept="image/*;capture=camera"> '+
				'<input type="button" name="submit" value="Add" onclick="addblogphotoNow('+ contentID +');">'+
				'<style>#details{height: 1000px; display: block}</style>');
				
			});

		});
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
				});
			});

		
		var url="navigation/elements.php?l="+ pageID;
		$.getJSON(url,function(json){
			$.each(json.elementinfo,function(i,ldat){
				var padd=.5 * ldat.padding; 
				$("#page").append(''+
				'<style>' +
				'.element_' + ldat.ID +  '{' +
					'position : absolute' + ';' +
					'top: ' + ldat.posx + 'px;' +
					'left:' + ldat.posy + 'px;' +
					'font-size:' + ldat.fontsize + 'px;' +
					'background: ' + ldat.background + ';' +
					
					'line-height:' + ldat.fontsize 	+ 'px;' +
					'letter-spacing: ' + ldat.spacing + 'px;' +
					'color: ' + ldat.color 	+ ';' +
					'font-family: ' + ldat.fontfamily + ';' +
					'font-weight: ' + ldat.fontweight + ';' +
					'float: none; ' +
					'text-align: ' + ldat.textalign+';' +
					'width:	' + ldat.absw + ';' +
					'height: auto;'+
					'border-radius: ' + ldat.radius + 'px;' +
					
					'}'+
					
					'#pagecontent'+ldat.ID+'{' +
					'padding:' + ldat.padding + 'px;' +
					'background: ' + ldat.background + ';' +
					'position:relative;'+
					'height: inherit;' +
					'z-index: ' + ldat.layer + ';' +
					'opacity: ' + ldat.opacity  + ';' +
					'border-radius: ' + ldat.radius + 'px;' +
					'}' +	
				'</style>');
				
				$("#page").append(''+
					'<div class="elements element_'+ldat.ID+'" ID="element_'+ldat.ID+'" onclick=showEdit('+ldat.ID+')></div>'+
					'');
				
				$("#element_"+ldat.ID).append(''+	
					'<div class="editbutton" ID="editbutton'+ldat.ID+'">' +
				//	'<div class="hideedit" style="float:left;"> <a href="#" onclick="hideEdit(); return false;" ><i class="fa fa-minus-circle" style=" width:25px; margin-right:20px"></i></a></div>'+
						'<div class="mover"  style="float:left;"> ' +
							'<i class="fa fa-arrows"></i>'+
						'</div>'+
						'<div class="stacker"  style="float:left;"> ' +
							'<i class="fa fa-arrows-v"></i>'+
						'</div>'+
					'</div>'+
					'<div class="pagecontents pagecontent'+ldat.ID+'" ID="pagecontent'+ldat.ID+'">'+
					'</div>'+
				'');
					
				$("#editbutton"+ldat.ID).append(''+
					'<a class="editelement nodrag" ID="edit'+ldat.ID+' edit" href="#" '+
						'onclick="editElement( '+ ldat.ID + '); return false;">'+
						'<i class="fa fa-pencil"></i>'+
					'</a>'+
				'');
				
			if (ldat.file == ''){
				if (ldat.boxID != ''){
					$("#editbutton"+ldat.ID).append(''+
						'<a class="addboxitem nodrag" href="#" '+
							'onclick="boxItemForm('+ ldat.ID + ', '+ldat.pageID+'); return false;" '+
							'style="font-size: 12px;" > +Add item'+
						'</a>'+
					'');
						
				}
			}
					
			$("#editbutton"+ldat.ID).append(''+
				'<a class="deleteelement nodrag" ID="dlist'+ldat.ID+'" href="#" '+
					'onclick="deleteElement(' + ldat.ID + '); return false;">'+
					'<i class="fa fa-trash"></i>'+
				'</a>'+
				'<div class="newitem"></div>'+
			'');
						
			if (ldat.file != ''){
				$(".pagecontent"+ldat.ID).append('<img src="img/full/'+ldat.file+'" style="width: 100%; ">');					
				$( '.element_'+ldat.ID ).resizable({   
					aspectRatio: "true", 
					containment:"#page",
					start: function( event, ui ) {
						$('.element_'+ldat.ID).css("min-height", "0px");
						},
				 	stop: function( event, ui ) {	
						var width = ui.size.width;
						var height = ui.size.height;
						var boxWidth = $('#page').offsetParent().width();
						var mywidth = 100 * width / boxWidth;
						var safewidth=mywidth.toFixed(3);
						var dragposition = ui.position;
						var myleft=dragposition['left'];
						var sideWidth = $(this).offsetParent().width();
						var leftpct = 100 * myleft / sideWidth;
						var safeleft=leftpct.toFixed(3);
						$('#respostop').val(''+dragposition['top']+'');
						$('#resposleft').val(''+myleft+'');
						$('#absresleft').val(''+width+'');
						$('#resleft').val(''+width+'');
						$('#restop').val(''+height+'');
						var thisID=$(ui.element).attr("ID");
						$('#sizeelementID').val(''+thisID+'');
						var data= $( "#sizesaver" ).serialize();
						$.post('admin/confirm_live.php' , data);
						$('.pagecontent'+ldat.ID).css("height", "auto");	
						$('.element_'+ldat.ID).css("height", "auto");

					}
				});//resize
			}
					
			else {
				$(".pagecontent"+ldat.ID).append('<div class="textcontent">'+ldat.pagecontent+'</div>');
									
				$( '.element_'+ldat.ID ).resizable({   
					containment:"#page",
					start: function( event, ui ) {
						$('.element_'+ldat.ID).css("min-height", "0px");
						
						$('.pagecontent'+ldat.ID).css("min-height", "0px");
						$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
						$(this).css('box-shadow', '0px 0px 1px 1px #00F');
							
					},
				 	stop: function( event, ui ) {	
						var width = ui.size.width;
						var height = ui.size.height;
						var boxWidth = $('#page').offsetParent().width();
						var mywidth = 100 * width / boxWidth;
						var safewidth=mywidth.toFixed(3);
						var dragposition = ui.position;
						var myleft=dragposition['left'];
						var sideWidth = $(this).offsetParent().width();
						var leftpct = 100 * myleft / sideWidth;
						var safeleft=leftpct.toFixed(3);
						$('#respostop').val(''+dragposition['top']+'');
						$('#resposleft').val(''+myleft+'');
						$('#absresleft').val(''+width+'');
						$('#resleft').val(''+width+'');
						$('#restop').val(''+height+'');
						var thisID=$(ui.element).attr("ID");
						$('#sizeelementID').val(''+thisID+'');
						var data= $( "#sizesaver" ).serialize();
						$.post('admin/confirm_live.php' , data);	
						$('.pagecontent'+ldat.ID).css("height", "inherit");	
						$('.element_'+ldat.ID).css("height", "auto");
						$('.pagecontent'+ldat.ID).css("background", ldat.background);
	
					}
				});//resize
			}
															
															
			$('.elements').draggable({  
				handle:".mover",
				containment:"#page",
				cursor: "move",
				distance: 0,
				grid: [ 1, 1 ],
			
				drag:function(b,ui){ 
					dragposition = ui.position;
					var myleft=dragposition['left'];
					var sideWidth = $(this).offsetParent().width();
					var leftpct = 100 * myleft / sideWidth;
					var safeleft=leftpct.toFixed(3);
				    $('#dragtop').val(''+dragposition['top']+'');
				    $('#dragleft').val(''+myleft+'');
				    var thisID=$(this).attr("ID");
				    $('#elementID').val(''+thisID+'');
				   
					}, 
					
				stop: function(c,ui){
			        var data= $( "#livesaver" ).serialize();
			        $.post('admin/confirm_live.php' , data);	
			        }	
			});//draggable
					
					
			$("#page").sortable({
				opacity: 0.6,  forcePlaceholderSize: false, delay: 20, distance: 5, forceHelperSize: true, cursor: 'move', handle:".stacker", items: "> .elements",
				update: function() {
					var elementlist = $(this).sortable("serialize") + '&action=updateElementOrder'; 
					$.post("navigation/confirm.php", elementlist, function(theResponse){	
						window.helperadd();
						$('#lightbox>#content').html('Element Order Saved');
						$('#lightbox').fadeOut(2000);
					});
				}
			});
					
				
				
	if (ldat.boxID != ''){
		var url="navigation/boxelements.php?box="+ldat.boxID+"";
			$( '.pagecontent' +ldat.ID).append('<ul ID="boxlist"></ul>');
		$.getJSON(url,function(json){
			$.each(json.boxiteminfo,function(i,bdat){
				var setter= ldat.columnset * 4;
				var spacers= 100 - setter;
				var colwidth= spacers / ldat.columnset;
			
				$( ".pagecontent"+ldat.ID+" > ul" ).append(''+
					'<li  ID="boxelement_'+bdat.ID+'" class="boxelement_'+bdat.ID+' boxelements" style=" float: left; text-align: inherit; margin:1%; padding:1%;" onclick="showBoxEdit('+bdat.ID+'); return false"></li>'+
				'');
					
				$('.boxelement_'+bdat.ID).append(''+
					'<div class="boxeditbutton" style="width:inherit; position: absolute; top:auto; background: #eee; opacity: 0.8; display:none;">'+
					'<div class="boxmover" style="float:left;font-size: 25px; margin color:#333;"> ' +
						'<i class="fa fa-arrows"></i>'+
					'</div>'+
					'<a href="" onclick="editBoxElement('+bdat.ID+'); return false;"><i class="fa fa-pencil"></i>edit</a>'+
					'<a style="color: #333333; " href="#" onclick="deleteBoxElement('+bdat.ID+'); return false;"><i class="fa fa-trash" style="font-size: 25px; margin-right:20px; float:right;"></i></a></div>'+
				'');
				
				$('.boxelement_'+bdat.ID).append('<div ID="boxitemcontent_'+bdat.ID+'"></div>');
					
				if(bdat.photo!=''){
					$('#boxitemcontent_'+bdat.ID).append(''+
					'<div class="boxphotowrap"><img class="boxphoto" src="img/full/'+bdat.photo+'" ></div>');
				}
					
				if(bdat.title!=''){
					$('#boxitemcontent_'+bdat.ID).append(''+
					'<b><a href="#" onclick="loadContent('+bdat.ID+', '+ldat.ID+'); return false;">'+bdat.title+'</a></b>'+
					'');
				}
					
				if(bdat.mytext!=''){
					$('#boxitemcontent_'+bdat.ID).append(''+
					'<br> '+bdat.mytext+'<br>'+
					'');
				}
		
				$('#element_'+ldat.ID).css("overflow" , "none");
	
				var nextline=ldat.columnset;
				$("ul#boxlist>li").css("width", ""+colwidth+"%"); 
		
				//$("ul#boxlist>li:nth-child("+nextline+"n+1)").before('<div style=" width: 100%; height: 10px; background:#000;"></div>');
				$("ul#boxlist>li:nth-child("+nextline+"n+1)").css("clear","both");
			});
			
		});
	window.sortBox();			
}
							
				});	//each
				
				
					
			});//get
			
			
	
					
			window.secretmenu(''+pageID+'');
			
			$('#page>#bg').click(function(){
			$('.elements>.editbutton').hide(0); 
			$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
			});
			
		/*
		$('.hideEdit').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.elements>.editbutton').hide(0); 
			$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
			});
*/
			
			$('#page>.elements').click(function(){
				$('.elements>.editbutton').hide(0); 
				$('.elements .ui-resizable-handle, .ui-resizable-se, .ui-icon, .ui-icon-gripsmall-diagonal-se').hide(0); 
				$('.elements').css('box-shadow', '0px 0px 0px 0px #fff');
				$(this).css('box-shadow', '0px 0px 1px 0px #00F');
				$(this).find('.editbutton').show(0).zIndex(10000000);
				$(this).find('.ui-resizable-handle, .ui-resizable-se, .ui-icon, .ui-icon-gripsmall-diagonal-se').show(0);
			
			});
					
		}			


	}//loadpage
	
		window.savepageDetails = function (){	
	
		var pagedata = new FormData($("#pageform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: pagedata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
			window.closehelper();
			//$(".links").click();
			window.showPages();	
			});
		
	
		}
	
	window.editpageDetails= function(pageID){
		window.helperadd();
		var url="navigation/data.php?page="+pageID+"";
		$.getJSON(url,function(json){
			$.each(json.navinfo,function(i,ldat){
			$("#lightbox>#content").html('<div class="boxtitle">Page Details</div>'+
				'<form ID="pageform">'+
					'<input type = "hidden" name="pageID" value="'+ldat.ID+'">'+

				'<input type = "hidden" name="pagedetails" value="edit">'+
				'<input type = "text" name="pagetitle" value="'+ldat.title+'"><br>'+
			'Publish Now?<br><input type="radio" name="publish" value="y" checked> Yes<br>'+
'<input type="radio" name="publish" value="n"> No'+
				'<a class="button" href="#" style="float: right;color: #333; background:#eee; padding: 10px; " name="updatepagedetails" value="Save" onclick="savepageDetails('+pageID+'); return false;">Save</a>'+
				
				'');
			});	//each
		});//get
		
			
}
	
	
	
	
	
	window.editboxitemNow = function (boxelementID) {	
		
		var elementdata = new FormData($("#formElement")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
	window.closehelper();

	window.reloadBoxElement(''+boxelementID+'');	
			});


	}//edit boxitem now
	
	
	window.reloadBoxElement= function (boxelementID){
			var url="navigation/boxelements.php?be="+ boxelementID;
		$.getJSON(url,function(json){
		$.each(json.boxiteminfo,function(i,bdat){	
			
			$("#boxitemcontent_"+boxelementID).html('');
			
				if(bdat.photo!=''){
				$('#boxitemcontent_'+bdat.ID).append(''+
				'<div class="boxphotowrap"><img class="boxphoto" src="img/full/'+bdat.photo+'" ></div>');
				}
				
				if(bdat.title!=''){
				$('#boxitemcontent_'+bdat.ID).append(''+
				'<b><a href="#" onclick="loadContent('+bdat.ID+');">'+bdat.title+'</a></b>'+
				'');
				}
				
				if(bdat.mytext!=''){
				$('#boxitemcontent_'+bdat.ID).append(''+
				'<br> '+bdat.mytext+'<br>'+
				'');
				}
			});
			
		});
	}
	
	

	window.editNow = (function () {
		
		var debouncedSave = _.debounce(actuallySave, 300);
		var lastData;
		
		return function() {

			// pull the element data out of the form
			var formPairs = $("#formElement").serializeArray();
			var data = _.chain(formPairs).
				map(function (o) {
					return [o.name, o.value];
				}).
				object().
				value();
			
			// only save if elementdata has changed
			if (_.isEqual(data, lastData)) {
				return;
			}

			// don't count the first time (may change when loadFromJson is responsible for first content load)
			if (!_.isUndefined(lastData)) {
				// always update the dom
				loadFromJson(data);
				// sometimes update the server
				debouncedSave(data);
			}

			// update the last known data
			lastData = data;
		};

		function actuallySave(data) {
			$.ajax({
				'data' : data,
				'url' : "navigation/confirm.php",
				'type' : 'post',
			});
		}
	}());
	
	function loadFromServer(elementID) {
		var login='y';
		var url="navigation/elements.php?e="+ elementID;
		$.getJSON(url, function(json) {
			loadFromJson(json.elementinfo);
		});
	}
	
	function loadFromJson(ldat) {

		$("#element_"+ldat.ID).css("font-family", ldat.fontfamily);
		$("#element_"+ldat.ID).css("font-weight", ldat.fontweight);
		$("#element_"+ldat.ID).css("font-size", ldat.fontsize +'px');
		$("#element_"+ldat.ID).css("line-height", ldat.fontsize +'px');
		$("#element_"+ldat.ID).css("letter-spacing", ldat.spacing +'px');
		$("#element_"+ldat.ID).css("text-align", ldat.textalign +'');
		$("#element_"+ldat.ID).css("color", ldat.color +'');
		$("#pagecontent"+ldat.ID).css("background", ldat.background +'');
		$("#pagecontent"+ldat.ID).css("padding", ldat.padding +'px');
		$("#pagecontent"+ldat.ID).css("opacity", ldat.opacity +'');
		$("#element_"+ldat.ID).css("border-radius", ldat.radius +'px');
		$("#pagecontent"+ldat.ID).css("border-radius", ldat.radius +'px');
		$("#pagecontent"+ldat.ID).css("z-index", ldat.layer);
		$('#pagecontent'+ldat.ID).css("min-height" , "0px");
		
		var newlineToBr = ldat.pagecontent.replace(/(?:\r\n|\r|\n)/g, '<br />');
		
		$("#pagecontent"+ldat.ID+" .textcontent").html(''+newlineToBr+'');
		if (ldat.file != ''){
			//$("#pagecontent"+ldat.ID).append('<img src="img/full/'+ldat.file+'" style="width: 100%; ">');
		}
	
		if (ldat.columset != ''){ 
			
	
			$('#element_'+ldat.ID).css("height" , "auto");
			$('#element_'+ldat.ID).css("overflow" , "none");
			var setter= ldat.columnset * 4;
			var spacers= 100 - setter;
			var colwidth= spacers / ldat.columnset;
			colwidth = ''+colwidth+'%';
			$("#pagecontent"+ldat.ID+" .boxelements").css("width", colwidth);
			$("#pagecontent"+ldat.ID+" ul#boxlist>li").css("clear","none");
			var nextline=ldat.columnset;
			$( "#pagecontent"+ldat.ID+" ul#boxlist>li:eq("+nextline+"n)").css("clear","both");
		}
		
		/*{
			var url="navigation/boxelements.php?box="+ldat.boxID;
			$( '.pagecontent' +ldat.ID).append('<ul></ul>');
			$.getJSON(url, function(json){
				$.each(json.boxiteminfo,function(i,bdat){
					var colwidth= 100.00 / ldat.columnset;
					
					$( ".pagecontent"+ldat.ID+" > ul" ).append(''+
					'<li ID="boxelement_'+bdat.ID+'" style="width:'+colwidth+'%; min-height: 300px; float: left; text-align: inherit;" onclick="showBoxEdit('+bdat.ID+'); return false;"> </li>');
					
					$('#boxelement_'+bdat.ID).append(''+
					
					'<div class="boxeditbutton" style=" display:none; width:inherit; position: absolute; top:auto;background: #eee; opacity: 0.8;"><div class="boxmover" style="float:left;font-size: 25px; margin color:#333;"> ' +
						'<i class="fa fa-arrows"></i>'+
					'</div>'+
					'<a href="" onclick="editBoxElement(); return false;"><i class="fa fa-pencil"></i>edit</a>'+
					
					'<a style="color: #333333; " href="#" onclick="deleteBoxElement('+bdat.ID+'); return false; "><i class="fa fa-trash" style="font-size: 25px; margin-right:20px; float:right;"></i></a></div>'+
					
					'');
					if(bdat.photo!=''){
						$('#boxelement_'+bdat.ID).append(''+
						'<img src="img/full/'+bdat.photo+'" style=" width: 100%; margin: auto; "><br>');
					}
					
					
					if(bdat.title!=''){
						$('#boxelement_'+bdat.ID).append(''+
						'<h4>'+bdat.title+'</h4>'+
						'');
					}
					
					if(bdat.mytext!=''){
						$('#boxelement_'+bdat.ID).append(''+
						'<br> '+bdat.mytext+''+
						'');
					}
				});
			});
			window.sortBox();			
		}
		*/
	}
	
	
	window.usecolor = function(elementID){
		$("#overridebg").html('');
		$("#clearall").html('<input type="button" name="clearbg"'+
							 'value="transparent" onclick="clearall('+elementID+');return false;">');
							 
		$("#color2").html(''+
				'-  Background<br>'+
				'<input type="color" name="background"  ID="pickbg"'+
				'value="#ffffff" onchange="editNow('+elementID+');" onfocus="editNow('+elementID+'); return false" '+
				'style="height: 30px; width: 100px; padding: 0px; margin-right: 3px;">'+
				'');
				
		$("#pickbg").spectrum({
		    showButtons:true,
		    showInput:true,
			showInitial:true,
			preferredFormat: "hex"
		
    	});
	}

	
	
	window.clearall = function(elementID){
	
	$("#overridebg").html('<input type="hidden" name="background"  value="transparent"></div>');
	
	$("#clearall").html('<input type="button" name="clearbg"'+
						 'value="Use BG Color" onclick="usecolor('+elementID+');">');
	$("#color2").html('');
	
	
	
	window.editNow(''+elementID+'');
	}
	
	
	window.editBoxElement = function (boxelementID) {
	window.helperadd();
	$('#lightbox>#content').html('<div class="boxtitle">Edit Box Item</div>');
			var url="navigation/boxelements.php?be="+ boxelementID+'';
		$.getJSON(url,function(json){
			$.each(json.boxiteminfo,function(i,idat){
				
				var str = idat.mytext;
				var safetext= str.replace(/<br>/g, "\r");
			
			
				$("#lightbox>#content").append(''+
				
					'<form  ID="formElement">'+
					'<input type="hidden" name="editboxitem" value="'+boxelementID+'">'+
					//'<input type="hidden" name="pageID" value="'++'"></form>'+
					'');
					
					
		$("#formElement").append(''+
		'<input type="text" name="title" value="'+idat.title+'">'+
			'<textarea style="width: 100%; max-width: 100% ; min-height: 100px; margin: auto;" name="mytext"> '+safetext+'</textarea>'+
			'<span style="font-size: 12px; color: #fff">Replace Photo<br> <input type="file" name="file"  accept="image/*;capture=camera"> </span>'+
			'<input style="  " ID="saveedit" type="button" name="submit" '+
						'value="Save" onclick="editboxitemNow('+boxelementID+'); ">'+
					
				'');
				

	});
	
	});
	
	}
	
	window.editElement = function (itemID) {
		window.helperadd();
			var url="navigation/elements.php?e="+ itemID;
		$.getJSON(url,function(json){
			$.each(json.elementinfo,function(i,idat){
				$('#lightbox>#content').html('<div class="boxtitle">Edit Element</div>');
				var str = idat.pagecontent;
				var safetext= str.replace(/<br>/g, "\r");
			
				
				$("#lightbox>#content").append(''+
				
					'<form  ID="formElement">'+
					'<input type="hidden" name="ID" value="'+idat.ID+'">'+
					'<input type="hidden" name="pageID" value="'+idat.pageID+'"></form>'+
					'');
					
					
		$("#formElement").append(''+'<div class="texttools" style="clear:both;"></div>');
				
				if (idat.boxID != ''){
				$(".texttools").append(''+
					'Box Title<br><input class="titleofbox" type="text" name="pagecontent" placeholder="Enter Box Title" value="'+safetext+'"><br>'+
					'Columns: <select  name="columnset" class="columns'+idat.boxID+' smallselect"></select><br>'+
					'');
					
					
					var i=1;
					for(i=1; i<5; i++){
						$(".columns"+idat.boxID).append(''+
						'<option value="'+i+'">'+i+'</option>'+	
						'');
						if(idat.columnset==i){
							$('select > option[value="'+ i +'"]').prop("selected", "selected");
							}
					}
				}
				
				
				else{
				$(".texttools").append(''+
					'<textarea style="width: 100%; max-width: 100% ; min-height: 100px; margin: auto;" name="pagecontent"'+
					'placeholder="Enter Text Here">'+safetext+'</textarea><br>');
					}
					
					
				$(".texttools").append(''+	
					'<div ID="color1" style=" float: left; " >Text Color<br>'+
						'<input type="color" name="color"   class="pick"  '+
							'value="'+idat.color+'" onfocus="editNow('+idat.ID+');" onchange="editNow('+idat.ID+');"'+
							'style="height: 30px; width: 50px; float: left; padding: 0px; margin-right: 3px;">'+
					'</div>'+
					
					'<div ID ="color2" style=" float: left; " > -  Background<br>'+
						'<input type="color" name="background"  ID="pickbg"'+
						 'value="'+idat.background+'" onfocus="editNow('+idat.ID+');" onchange="editNow('+idat.ID+');"'+
							'style="height: 30px; width: 50px; padding: 0px; margin-right: 3px;">'+
					'</div>'+ 
					
					'<div style=" float: left; " > <br>'+
					
						'<div ID="clearall"><input type="button" name="clearbg" style"width: 50px;" '+
						 'value="Transparent" onclick="clearall('+idat.ID+');"></div>'+
					'</div>'+ 

					
					
					
					'<div style="clear:both;">Font: <input  type="text" name="fontfamily" placeholder="Enter Font Family" '+
						'value="'+idat.fontfamily+'" onkeyup="editNow('+idat.ID+');"><br>'+
						
					'Text Align: <select name="textalign" class="align'+idat.ID+' bigselect"></select><br>'+
				
					'Font Size<input  type="range" data-show-value="true" min="10" max="50" step="2" name="fontsize" '+
						'value="'+idat.fontsize+'"><br>'+		
					
					'Weight :<input  type="range" data-show-value="true" min="0" max="900" step="100" name="fontweight"'+		 					
						'value="'+idat.fontweight+'"><br>'+
					
					'Spacing:<input type="range" data-show-value="true" min="0" max="10" name="spacing" '+
						'value="'+idat.spacing+'" ><br>'+
						
					'Padding:<input type="range" data-show-value="true" min="0" max="50" name="padding" '+
						'value="'+idat.padding+'" ><br></div>'+
						'Radius :<input type="range" data-show-value="true" min="0" max="50" name="radius"  '+
						'value="'+idat.radius+'"><br>');
						
						
						
						$(".align"+idat.ID).append(''+
						'<option class="Left" value="left">Left</option>'+	
						'<option class="center" value="center">Center</option>'+	
						'<option class="right" value="right">Right</option>'+	
						'');
						
						if(idat.textalign=='left'){
						$('.align'+idat.ID+' option.left').prop("selected", "selected");
						}
						
						if(idat.textalign=='center'){
						$('.align'+idat.ID+' option.center').prop("selected", "selected");
						}
						
						if(idat.textalign=='right'){
						$('select.align'+idat.ID+' option.right').prop("selected", "selected");
						}
					
						
										
					
					
				$("#formElement").append(''+
					
					
										'Opacity: <input type="text" style="width: 40px;" name="opacity" value="'+idat.opacity+'">'+
					' Layer: <input  style="width: 40px;" type="text" name="layer" value="'+idat.layer+'">'+
					
					'<input style=" display:none; " ID="saveedit" type="button" name="submit" '+
						'value="Save" onclick="editNow('+idat.ID+'); "><input type="hidden" id="dummy1"><input type="hidden" id="dummy2">'+
						'<div ID="overridebg"></div>'+
						'');
						
						if(idat.file!=''){	$("#formElement .texttools").hide(0);}

				
				if(idat.background==''||idat.background=='transparent' ){
					$("#overridebg").html('<input type="hidden" name="background" ID="overridebg" value="transparent">');
					$("#clearall").html('<input type="button" name="clearbg"'+
						 'value="Use BG Color" onclick="usecolor('+idat.ID+');">'+
						 '');
						 $("#color2").html('');
						 
						 }
						 
						
					
	
				
			
	$(".pick").spectrum({
			
		preferredFormat: "hex",
		showInput:true,
		showInitial:true
		
    });
    
   
    
    
    
    
    
     $("#pickbg").spectrum({
	   
	    showButtons:true,
	    showInput:true,
		showInitial:true,
		preferredFormat: "hex"
		
		
    });
        
	    // bind changes on inputs to editNow        
        var colorChangeEvents = ['input', 'focus', 'blur', 'change'];
        var textChangeEvents = ['input', 'focus', 'blur', 'keyup'];
        var changeEventMapping = {
	        'button.sp-choose': colorChangeEvents,
	        '#formElement input': textChangeEvents,
	        '#formElement textarea': textChangeEvents,
	        '#formElement select': colorChangeEvents 
	    };
	    _(changeEventMapping).each(function(events, selector) {
		    _(events).each(function(event) {
			    $(selector).on(event, function () { editNow(itemID); });
			});
		});
        
		/*		$('button.sp-choose').on('input',function(){
					$('#saveedit').click( );
					}).on('focus', function(){
					$('#saveedit').click( );
					}).on('blur', function() { 
					$('#saveedit').click( );	
					}).on('change', function() {	
					$('#saveedit').click( );
					});
				

				
				$('#formElement>input').on('input',function(){
					$('#saveedit').click( );
					}).on('focus', function(){
					$('#saveedit').click( );
					}).on('blur', function() { 
					$('#saveedit').click( );	
					}).on('keyup', function() {	
					$('#saveedit').click( );
					});
								
				$('#formElement>textarea').on('input',function(){
					$('#saveedit').click( );
					editNow(itemID);
					}).on('focus', function(){
					$('#saveedit').click( );
					}).on('blur', function() { 
					$('#saveedit').click( );	
					}).on('keyup', function() {	
					$('#saveedit').click( );
					});

			*/
			});
		});
	
		
			
	
	}	
	
window.loadCss = function(){
		var url="admin/userdata.php";
		$("#userCss").html('');
		$.getJSON(url,function(json){
			$.each(json.userinfo,function(i,ldat){
			$("#userCss").html(''+
				'<style>'+ldat.usercss+'</style>'+	
				'');
			});
		});
	}

	

window.saveCss = function(){
		var elementdata= $( "#cssEditor" ).serialize();
		var myresult = $.post("navigation/confirm.php" , elementdata);
		window.loadCss()
	}


	
	window.editCss= function(pageID){
		window.resetMenu(''+ pageID +'');
		var url="admin/userdata.php";
		window.helperadd();
		$("#lightbox>content").html('');
		$.getJSON(url,function(json){
			$.each(json.userinfo,function(i,ldat){
				$("#lightbox>#content").html('<div class="boxtitle">CSS Editor</div>'+
				'<form ID="cssEditor">'+
				'<input type = "hidden" name="css" value="edit">'+
				'<a class="button" href="#" style="float: right;color: #333; background:#eee; padding: 10px; " name="updatecss" value="Save CSS" onclick="saveCss(); return false;">SAVE CSS</a>'+
				'<textarea name="usercss"  style="width:300px; min-height: 400px">'+ldat.usercss+'</textarea>'+
				'');
			});
		});
	}


	
window.deletePage = function (itemID) {
	$('#pageArray_'+itemID+'').slideUp(300);
	$.post('navigation/confirm.php', { deleteme: itemID },
	function () {
			// 200, it worked; resource deleted
			}, function () {
				// it didn't delete			
				});
	}
	
	
		

	window.deleteElement = function (pageID) {
		$('#element_'+pageID+'').slideUp(300);
		$.post('navigation/confirm.php', { deleteelement: pageID },
		function () {
				// 200, it worked; resource deleted
				}, function () {
					// it didn't delete			
					});
	}	
	
	
		

	window.deleteBoxElement = function (pageID) {
		$('#boxelement_'+pageID+'').slideUp(300);
		$.post('navigation/confirm.php', { deleteboxelement: pageID },
		function () {
				// 200, it worked; resource deleted
				}, function () {
					// it didn't delete			
					});
	}	
	


	
	
		
	window.addPage = function (){	
		//var elementdata= 
		var pagedata = new FormData($("#newpageform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: pagedata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
			//$(".links").click();
			window.showPages();	
			});
		
	
		}
		
		
		
	window.resetMenu= function(pageID){
		$("#addText").html('<a href="#" class="pop"   onclick="addText('+pageID+'); return false;">'+
				'<i class="fa fa-pencil"></i> Add Text</a>').css("background", "none");
		$("#addBox").html('<a href="#" class="pop"   onclick="addBox('+pageID+'); return false;">'+
				'<i class="fa fa-th"></i> Add Box</a>').css("background", "none");
		$("#addPhoto").html('<a href="#" class="pop"   onclick="addPhoto('+pageID+'); return false;">'+
				'<i class="fa fa-camera"></i> Add Photo</a>').css("background", "none");
		$("#addBgPhoto").html('<a href="#" class="pop"   onclick="addBgPhoto('+pageID+'); return false;">'+
				'<i class="fa fa-image"></i> Page Background</a>').css("background", "none");
		$("#addLogo").html('<a href="#" class="pop"   onclick="addLogo('+pageID+'); return false;">'+
				'<i class="fa fa-list-alt"></i> Site Banner</a>').css("background", "none");
		$("#addLinkColor").html('<a href="#" class="pop"   onclick="addLinkColor('+pageID+'); return false;">'+
				'<i class="fa fa-star"></i>Link Colors</a>').css("background", "none");

				$("#drafts").html('<a href="#" class="pop"   onclick="showDrafts(); return false;">'+
					'<i class="fa fa-lock"></i> Drafts</a></div>').css("background", "none");


		}	
		
		window.resetboxMenu= function(pageID){
		$("#addboxPost").html('<a href="#" class="pop"   onclick="addText('+pageID+')">'+
				'<i class="fa fa-pencil"></i> Posts</a>').css("background", "none");
		$("#addboxPhoto").html('<a href="#" class="pop"   onclick="addBox('+pageID+')">'+
				'<i class="fa fa-th"></i> Photos</a>').css("background", "none");
		$("#addboxVideo").html('<a href="#" class="pop"   onclick="addPhoto('+pageID+')">'+
				'<i class="fa fa-film"></i> Videos</a>').css("background", "none");
		/*$("#addboxShop").html('<a href="#" class="pop"   onclick="addBgPhoto('+pageID+')">'+
				'<i class="fa fa-image"></i> Products</a>').css("background", "none");
		$("#addboxShop").html('<a href="#" class="pop"   onclick="addBgPhoto('+pageID+')">'+
			'<i class="fa fa-image"></i> Products</a>').css("background", "none");
		*/

		}	
		
	
	window.addNewPage= function(){
		window.helperadd();
		window.resetMenu();
		$('#lightbox>#content').html('<div class="boxtitle"> Add a New Page</div>');
		$("#lightbox>#content").append(''+
		'<form  ID="newpageform">'+
		'<input type="hidden" name="newpage" value="add">'+
		'<input type="text" name="pagetitle" placeholder="Page Title"><br>'+
		'<input type="button" name="submit" value="Add Page" onclick="addPage();">'+
		'</form>');
	}
		
		
		
		window.showDrafts= function(pageID){	
	window.resetMenu(''+pageID+'');
		$("#drafts").css("background", "#dddddd");
		$("#drafts").html('<i class="fa fa-lock"></i> Drafts<br>'+
		'');
		var url="navigation/drafts.php";
		$.getJSON(url,function(json){
			$.each(json.info,function(i,idat){
				$('#drafts').append('<p> - <a href="#'+idat.title+'" onclick="loadPage('+idat.ID+');">'+idat.title+'</a></p>');
			});
			$('#drafts').append('<p></p>');
		});
		
		
		}
		
	window.addText= function(pageID){
			
					
		window.resetMenu(''+pageID+'');

				
		$("#addText").css("background", "#dddddd");
		$("#addText").html('<i class="fa fa-pencil"></i> Add Text<br>'+
		'<form  ID="addform">'+
		'<input type="hidden" name="newelement" value="add">'+
		'<input type="hidden" name="pageID" value="'+ pageID +'">'+
		'<textarea name="mytext" ID="pagecontent" style="min-width: 80%; min-height: 100px; "  placeholder="Write some words here."></textarea><br>'+
		'<input name="color" class="pick">' +
		'<input name="background" class="pickbg" >' +
'<input type="button" name="submit" value="Add" onclick="addElement('+ pageID +'); ">'+
		'</form>');					
		
	$(".pick").spectrum({
			
		preferredFormat: "hex",
		showInput:true
    });
    
    $(".pickbg").spectrum({
		
			allowEmpty:true,
		preferredFormat: "hex",
		showInput:true
    });
}
		
		
	
		
		window.addPhoto= function(pageID){	
			window.resetMenu(''+pageID+'');
			
			$("#addPhoto").css("background", "#dddddd");
			$("#addPhoto").html('<i class="fa fa-camera"></i> Add Photo<br>'+
			'<form ID="addform">'+
			'<input type="hidden" name="newelement" value="add">'+
			'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
			'<input type="file" name="file"  accept="image/*;capture=camera"> '+
			'<input type="button" name="submit" value="Add" onclick="addElement('+ pageID +');">'+
			'</form>');	
			
							
		}
	
		window.addBox= function(pageID){	
			window.resetMenu(''+pageID+'');

			$("#addBox").css("background", "#dddddd");
			$("#addBox").html('<i class="fa fa-th"></i> Add Box<br>'+
				'<form ID="addform">'+
				'<input type="hidden" name="newelement" value="add">'+
				'<input type="hidden" name="isbox" value="true">'+

				'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
				'<input type="text" name="boxtitle" ID="boxtitle" placeholder="Title for New Box"><br>'+
				'<input type="button" name="submit" value="Add" onclick="addElement('+ pageID +');">'+
			'</form>');						
		}
		
		
		
		window.addBoxItem= function(thisPage){
		
		var elementdata = new FormData($("#addform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
		//$('.element_'+elementID+' .editbutton .newitem').html('Item Added. ');
				loadPage(''+thisPage+'');
			
			});
			

}
				
		
		
		window.boxItemForm= function(elementID, pageID){	
		$('.element .editbutton .newitem').html('');
			$('.elements .editbutton').css("opacity", "0.7");
			$('.element_'+elementID+' .editbutton').css("opacity", "1");
			$('.newitem').css("background", "#fff");
			
			$('.element_'+elementID+' .editbutton .newitem').html('<br>'+
				'<form ID="addform">'+
'<input type="hidden" name="newboxitem" value="add">'+
				'<input type="hidden" name="elementID" value="'+ elementID +'" >'+
				
				'<input type="text" name="title" ID="boxtitle" placeholder="Title for New Post"><br>'+

				'<textarea name="mytext" ID="pagecontent" style="min-width: 80%; min-height: 100px; "  placeholder="Write your post here."></textarea><br>'+
				
				'<span style="font-size: 12px; color: #555">Add Photo<br> <input type="file" name="file"  accept="image/*;capture=camera"> '+
				
				'<input type="button" name="submit" value="Add Item To Box Now" onclick="addBoxItem('+ pageID +');">'+
				
			'</form>');		
						
		}



window.changeBgNow= function(pageID){
	//var elementdata= 
		var elementdata = new FormData($("#addform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
			window.loadPage(''+pageID+'');	
			});
			

}

	window.addBgColor= function(pageID){	
		
		$("#bgtoggle").html('<a href="#" onclick="addBgPhoto('+pageID+')">Use Photo</a>');
		
		$("#addBgPhoto").html('<i class="fa fa-image"></i> Page Background<br>'+
		'<form ID="addform">'+
		'<input type="hidden" name="bgcolor" value="new">'+
		'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
		'<input type="color" name="color" ID="bgcolorpick" ><br>'+
		'<input type="button" name="submit" value="Save" onclick="changeBgNow('+ pageID +');">'+
		'</form><div ID="bgtoggle"><a href="#" onclick="addBgPhoto('+ pageID +')">Use Photo</a></div>');
		
		  $("#bgcolorpick").spectrum({
		
			allowEmpty:true,
		preferredFormat: "hex",
		showInput:true
    });

		
	}



	window.addBgPhoto= function(pageID){	
	window.resetMenu(''+pageID+'');
		
		$("#addBgPhoto").css("background", "#dddddd");
		$("#addBgPhoto").html('<i class="fa fa-image"></i> Page Background<br>'+
		'<form ID="addform">'+
		'<input type="hidden" name="bgphoto" value="new">'+
		'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
		'<input type="file" name="file"  accept="image/*;capture=camera"> <br>'+
		'<input type="button" name="submit" value="Save" onclick="changeBgNow('+ pageID +');">'+
		'</form><div ID="bgtoggle"><a href="#" onclick="addBgColor('+ pageID +'); return false;">Use Solid Color</a></div>');	
		
						
	}
	
	
	
	
	window.addLogoNow= function(pageID){
				var elementdata = new FormData($("#addform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
			window.loadPage(''+pageID+'');	
			});
			

}
		
		
			window.addBannerColor= function(pageID){	
		
		$("#bannertoggle").html('<a href="#" onclick="addLogo('+pageID+')">Use Photo</a>');
		
		$("#addLogo").html('<i class="fa fa-list-alt"></i> Site Banner<br>'+
		'<form ID="addform">'+
		'<input type="hidden" name="bannercolor" value="new">'+
		'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
		'<input type="color" name="color" ID="bannercolorpick" ><br>'+
		'<input type="button" name="submit" value="Save" onclick="addLogoNow('+ pageID +');">'+
		'</form><div ID="bannertoggle"><a href="#" onclick="addLogo('+ pageID +')">Use Photo</a></div>');
		
		  $("#bannercolorpick").spectrum({
		
			allowEmpty:true,
		preferredFormat: "hex",
		showInput:true
    });

		
	}

	
	
	
		window.addLogo= function(pageID){	
	window.resetMenu(''+pageID+'');
		
		$("#addLogo").css("background", "#dddddd");
		$("#addLogo").html('<i class="fa fa-list-alt"></i> Site Banner<br>'+
		'<form ID="addform">'+
		'<input type="hidden" name="bannerphoto" value="new">'+
		'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
		'<input type="file" name="file"  accept="image/*;capture=camera"> '+
		'<input type="button" name="submit" value="Save" onclick="addLogoNow('+ pageID +');">'+
		'</form><div ID="bannertoggle"><a href="#" onclick="addBannerColor('+ pageID +'); return false;">Use Solid Color</a></div>');	
		
						
	}




	
	window.addLinkColorNow= function(pageID){
		
				var elementdata = new FormData($("#addform")[0]);
		$.ajax({
			'url' : "navigation/confirm.php",
			'type' : 'post',
			'data'	: elementdata,
			processData: false,
			contentType: false,
			beforeSend: function(XHR){
				
			}
		}).done(function(){
			window.loadPage(''+pageID+'');	
			});
			
	
	}
	
	
	
	
	window.addLinkColor= function(pageID){	
		window.resetMenu(''+pageID+'');		
		$("#addLinkColor").css("background", "#dddddd");
		$("#addLinkColor").html('<i class="fa fa-star"></i>Link Style<br>'+
			'<form ID="addform">'+
			'<input type="hidden" name="linkcolors" value="new">'+
			'<input type="hidden" name="pageID" value="'+ pageID +'" >'+
			'Color: <input name="linkpick" class="linkpick"><br>' +
			'Hover: <input name="hoverpick" class="hoverpick" ><br>' +
			'Size : <input type="text" name="linksize" ID="linksize" value="18px" style="width: 50px"><br>'+
			'Font : <input type="text" name="linkfont" ID="linkfont" value="helvetica">'+
			'<input type="button" name="submit" value="Save" onclick="addLinkColorNow('+ pageID +'); return false; ">'+
			'</form>'+
		'');					
			
		$(".linkpick").spectrum({
				
			preferredFormat: "hex",
			showInput:true
	    });
	    
	    $(".hoverpick").spectrum({
			
				allowEmpty:true,
			preferredFormat: "hex",
			showInput:true
	    });
	    
	}
		
		
		
						
	

	
	
	window.hideAddNew= function(){
		
		$("#navadd").slideUp(500);
		$(".addPageOff").hide(0);
		$(".addPageOn").show(0);
		
		}

	window.showDeleteButtons= function(){
		
		$(".deletebutton").show(0);
		$(".deleteOn").hide(0);
		$(".deleteOff").show(0);
		window.helperdelete();
		$(".secretmenu").toggle(200);
		
		}
		
	window.hideDeleteButtons= function(){
		
		$(".deletebutton").hide(0);
		$(".deleteOn").show(0);
		$(".deleteOff").hide(0);
		$(".secretmenu").toggle(200);
		
		}	
		
		
	window.mobileNav = function(){
		
		$("#navcontent").toggle(400);
		
	}

}(this));

$(document).ready(function(){
	$('a.back').click(function(){
		parent.history.back();
		return false;
	});
			
});
