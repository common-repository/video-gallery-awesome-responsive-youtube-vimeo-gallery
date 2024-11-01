function RIT_VGallery_sort()
{
	jQuery('#RIT_Video_Gallery_Ul').sortable({
      	update: function() {
        	jQuery("#RIT_Video_Gallery_Ul > li").each(function(){
        		jQuery(this).find('.RITVGallery_Uploaded_Title').attr('id','RITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.RITVGallery_Uploaded_Title').attr('name','RITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.RITVGallery_Uploaded_Desc').attr('id','RITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.RITVGallery_Uploaded_Desc').attr('name','RITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.RITVGallery_Uploaded_Video').attr('id','RITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.RITVGallery_Uploaded_Video').attr('name','RITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.RITVGallery_Uploaded_Image').attr('id','RITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.RITVGallery_Uploaded_Image').attr('name','RITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
			});         
       	}
    });	
}
function RIT_VGallery_Main_Big_Clicked()
{
	setTimeout(function(){
		jQuery('#RIT_VGallery_Upload_Title').val('');
		jQuery('#RIT_VGallery_Upload_Desc').val('');
		jQuery('#RIT_VGallery_Upload_Video_2').val('');
		jQuery('#RIT_VGallery_Upload_Image_2').val('');
		jQuery('#RIT_VGallery_Upload_Link').val('');
		jQuery('.RITVGalleryicon_No').css('color','#0073aa');
		jQuery('.RITVGalleryicon_Yes').css('color','#c5c5c5');
		jQuery('.RIT_VGallery_Span').fadeOut();

		jQuery('#RIT_VGallery_Button_S').fadeIn();
		jQuery('#RIT_VGallery_Button_U').fadeOut();
	},300)
}
function RIT_VGallery_Upload_Video_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#RIT_VGallery_Upload_Video_1').val();
		if(code.indexOf("uploads")>0)
		{
			if(code.indexOf("mp4")>0)
			{
				var s=code.split('mp4="'); 
				var src=s[1].split('"');				
				jQuery('#RIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf("flv")>0)
			{
				var s=code.split('flv="'); 
				var src=s[1].split('"');				
				jQuery('#RIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf("3gp")>0)
			{
				var s=code.split('href="'); 
				var src=s[1].split('"');				
				jQuery('#RIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
		}
		else if(code.indexOf('https://www.youtube.com/')>0)
		{

			var s1 = code.split('<a href="https://www.youtube.com/'); 
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				var s2= s1[1].split("=");
				var src = s2[1].split('&');

				jQuery('#RIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
				jQuery('#RIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
				if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]');
				var s2=s1[1].split('[/embed]');
				if(s2[0].indexOf('watch?')>0)
				{
					var s3=s2[0].split('=');
					
					jQuery('#RIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+s3[1]);
					jQuery('#RIT_VGallery_Upload_Video_2').val('http://img.youtube.com/vi/'+s3[1]+'/mqdefault.jpg');
					if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
				else
				{
					var src=s2[0];
					var Imsrc=src.split('embed/');

					jQuery('#RIT_VGallery_Upload_Video_2').val(src);
					jQuery('#RIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+Imsrc[1]+'/mqdefault.jpg');
					if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
			}
			else
			{
				var s2= s1[1].split('=');
				var src = s2[1].split('">https://');

				jQuery('#RIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
				jQuery('#RIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
				if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}	
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			var s1 = code.split('<a href="https://youtu.be/'); 
			var src = s1[1].split('">https://');

			jQuery('#RIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
			jQuery('#RIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
			if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#RIT_VGallery_Upload_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'RITet_Vimeo_Video_Image_Src', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response){
					jQuery('#RIT_VGallery_Upload_Image_2').val(response);
					if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
   			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#RIT_VGallery_Upload_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'RITGet_Vimeo_Video_Image_Src', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#RIT_VGallery_Upload_Image_2').val(response);
					if(jQuery('#RIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
			}		
		}
	},600)
}
function RIT_VGallery_Upload_Image_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#RIT_VGallery_Upload_Image_1').val();			
		if(code.indexOf('img')>0){
			var s=code.split('src="'); 
			var src=s[1].split('"');				
			jQuery('#RIT_VGallery_Upload_Image_2').val(src[0]);
			if(jQuery('#RIT_VGallery_Upload_Image_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}
	},100)
}
function RIT_VGallery_Save_Clicked()
{
	var RITVGalleryUT=jQuery('#RIT_VGallery_Upload_Title').val();
	var RITVGalleryUD=jQuery('#RIT_VGallery_Upload_Desc').val();

	var RITVGalleryUV=jQuery('#RIT_VGallery_Upload_Video_2').val();
	var RITVGalleryUI=jQuery('#RIT_VGallery_Upload_Image_2').val();

	var RIT_VGallery_Upload_Link=jQuery('#RIT_VGallery_Upload_Link').val();
	var RIT_VGallery_YON=jQuery('#RIT_VGallery_YON').val();

	if(RIT_VGallery_YON=='Yes')
	{
		RITVGalleryColorY='#0073aa';
		RITVGalleryColorN='#c5c5c5';
	}
	else
	{
		RITVGalleryColorY='#c5c5c5';
		RITVGalleryColorN='#0073aa';
	}

	var RITVGalleryHC=jQuery('#RIT_VGallery_Hidden_Count').val();

	jQuery('#RIT_VGallery_Upload_Video_1').val('');
	jQuery('#RIT_VGallery_Upload_Image_1').val('');

	var RITVGalleryNHC=parseInt(parseInt(RITVGalleryHC)+1);

	if(RITVGalleryUT=='' || RITVGalleryUV=='' || RITVGalleryUI=='')
	{
		if(RITVGalleryUT=='')
		{
			jQuery('#RIT_VGallery_Span_1').fadeIn();
			return false;
		}
		if (RITVGalleryUV=='') 
		{
			jQuery('#RIT_VGallery_Span_2').fadeIn();
			return false;
		}
		if(RITVGalleryUI=='')
		{
			jQuery('#RIT_VGallery_Span_3').fadeIn();
			return false;
		}			
	}
	else
	{
		jQuery('#RIT_Video_Gallery_Ul').append('<li id="RIT_VGallery_Photos_Ul_Li_'+RITVGalleryNHC+'"><div class="RIT_VGallery_Photos_Desc_Div"><table class="RIT_VGallery_Photos_Table"><tr><td colspan="2"><i class="roboiticons-style roboiticons-remove" style="cursor:pointer;float:right;font-size: 20px; color:#ff0000" onclick="RIT_VGallery_Remove_U('+RITVGalleryNHC+')"></i><i class="roboiticons-style roboiticons-edit" style="cursor:pointer;float:right;margin-right:10px;font-size: 22px; color:#0073aa" onclick="RIT_VGallery_Edit_U('+RITVGalleryNHC+')"></i></td></tr><tr><td><label>Title</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Title" id="RITVGallery_Uploaded_Title_'+RITVGalleryNHC+'" name="RITVGallery_Uploaded_Title_'+RITVGalleryNHC+'" value="'+RITVGalleryUT+'" readonly></td></tr><tr><td><label>Description</label></td><td><textarea class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Desc" rows="3"  id="RITVGallery_Uploaded_Desc_'+RITVGalleryNHC+'" name="RITVGallery_Uploaded_Desc_'+RITVGalleryNHC+'" value="'+RITVGalleryUD+'" readonly>'+RITVGalleryUD+'</textarea></td></tr><tr><td><label>Video URL</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Video" id="RITVGallery_Uploaded_Video_'+RITVGalleryNHC+'" name="RITVGallery_Uploaded_Video_'+RITVGalleryNHC+'" value="'+RITVGalleryUV+'" readonly></td></tr><tr><td><label>Image URL</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Image" id="RITVGallery_Uploaded_Image_'+RITVGalleryNHC+'" name="RITVGallery_Uploaded_Image_'+RITVGalleryNHC+'" value="'+RITVGalleryUI+'" readonly></td></tr><tr><td><label>Link</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Included_Link" id="RITVGallery_Included_Link_'+RITVGalleryNHC+'" name="RITVGallery_Included_Link_'+RITVGalleryNHC+'" value="'+RIT_VGallery_Upload_Link+'" readonly></td></tr><tr><td><label>New Tab</label></td><td style="text-align: center"><input type="hidden" class="RITVGallery_Uploaded_ONT" id="RITVGallery_Uploaded_ONT_'+RITVGalleryNHC+'" name="RITVGallery_Uploaded_ONT_'+RITVGalleryNHC+'" value="'+RIT_VGallery_YON+'"><i class="RITVGC roboiticonsdraw roboiticons-style roboiticons-check"  style="margin-right:20px;font-size: 20px; color:'+RITVGalleryColorY+'"></i><i class="RITVGR roboiticonsdraw roboiticons-style roboiticons-remove"  style="font-size: 20px; color:'+RITVGalleryColorN+'"></i></td></tr></table></div><div class="RIT_VGallery_Photos_Div" id="RIT_VGallery_Photos_Div_'+RITVGalleryNHC+'"><img class="RIT_VGallery_Photo" id="RIT_VGallery_Photo_'+RITVGalleryNHC+'" src="'+RITVGalleryUI+'"></div></li>');

		jQuery('#RIT_VGallery_Hidden_Count').val(RITVGalleryNHC);

		jQuery('.RIT_VGallery_Photos').fadeIn();
		RIT_VGallery_Main_Big_Clicked();
	}
}
function RIT_VGallery_Remove_U(Removed_ID)
{
	jQuery('#RIT_VGallery_Photos_Ul_Li_'+Removed_ID).remove();

	jQuery('#RIT_VGallery_Hidden_Count').val(jQuery('#RIT_VGallery_Hidden_Count').val()-1);

	jQuery("#RIT_Video_Gallery_Ul > li").each(function(){
		jQuery(this).find('.RITVGallery_Uploaded_Title').attr('id','RITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.RITVGallery_Uploaded_Title').attr('name','RITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.RITVGallery_Uploaded_Desc').attr('id','RITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.RITVGallery_Uploaded_Desc').attr('name','RITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.RITVGallery_Uploaded_Video').attr('id','RITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.RITVGallery_Uploaded_Video').attr('name','RITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.RITVGallery_Uploaded_Image').attr('id','RITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.RITVGallery_Uploaded_Image').attr('name','RITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
	});  
	if(jQuery("#RIT_Video_Gallery_Ul > li").length==0)
	{
		jQuery('#RIT_VGallery_Photos').fadeOut();
	}
	else
	{
		jQuery('#RIT_VGallery_Photos').fadeIn();
	}
}
function RIT_VGallery_Edit_U(Edited_ID)
{
	var Edited_Video_Title=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Uploaded_Title').val();
	var Edited_Video_Desc=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Uploaded_Desc').val();
	var Edited_Video_VL=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Uploaded_Video').val();
	var Edited_Video_IL=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Uploaded_Image').val();
	var Edited_Video_Link=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Included_Link').val();
	var Edited_Video_ONT=jQuery('#RIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.RITVGallery_Uploaded_ONT').val();

	jQuery('#RIT_VGallery_Lindex').val(Edited_ID);

	jQuery('#RIT_VGallery_Upload_Title').val(Edited_Video_Title);
	jQuery('#RIT_VGallery_Upload_Desc').val(Edited_Video_Desc);
	jQuery('#RIT_VGallery_Upload_Video_2').val(Edited_Video_VL);
	jQuery('#RIT_VGallery_Upload_Image_2').val(Edited_Video_IL);
	jQuery('#RIT_VGallery_Upload_Link').val(Edited_Video_Link);
	jQuery('#RIT_VGallery_YON').val(Edited_Video_ONT);

	if(Edited_Video_ONT=='Yes')
	{
		jQuery('.RITVGalleryicon_Yes').css('color','#0073aa');
		jQuery('.RITVGalleryicon_No').css('color','#c5c5c5');
	}
	else
	{
		jQuery('.RITVGalleryicon_No').css('color','#0073aa');
		jQuery('.RITVGalleryicon_Yes').css('color','#c5c5c5');
	}
	
	jQuery('#RIT_VGallery_Button_S').fadeOut();
	jQuery('.RIT_VGallery_Span').fadeOut();

	setTimeout(function(){
		jQuery('#RIT_VGallery_Button_U').fadeIn();
	},300)	
}
function RIT_VGallery_Up_Clicked()
{
	var RIT_VGallery_Lindex=jQuery('#RIT_VGallery_Lindex').val();

	var RITVGalleryUT=jQuery('#RIT_VGallery_Upload_Title').val();
	var RITVGalleryUD=jQuery('#RIT_VGallery_Upload_Desc').val();

	var RITVGalleryUV=jQuery('#RIT_VGallery_Upload_Video_2').val();
	var RITVGalleryUI=jQuery('#RIT_VGallery_Upload_Image_2').val();

	var RITVGllery_Link=jQuery('#RIT_VGallery_Upload_Link').val();
	var RITVGallery_ONT=jQuery('#RIT_VGallery_YON').val();

	jQuery('#RIT_VGallery_Upload_Video_1').val('');
	jQuery('#RIT_VGallery_Upload_Image_1').val('');

	if(RITVGalleryUT=='' || RITVGalleryUV=='' || RITVGalleryUI=='')
	{
		if(RITVGalleryUT=='')
		{
			jQuery('#RIT_VGallery_Span_1').fadeIn();
			return false;
		}
		if (RITVGalleryUV=='') 
		{
			jQuery('#RIT_VGallery_Span_2').fadeIn();
			return false;
		}
		if(RITVGalleryUI=='')
		{
			jQuery('#RIT_VGallery_Span_3').fadeIn();
			return false;
		}			
	}
	else
	{
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Uploaded_Title').val(RITVGalleryUT);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Uploaded_Desc').val(RITVGalleryUD);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Uploaded_Video').val(RITVGalleryUV);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Uploaded_Image').val(RITVGalleryUI);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RIT_VGallery_Photo').attr('src',RITVGalleryUI);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Included_Link').val(RITVGllery_Link);
		jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGallery_Uploaded_ONT').val(RITVGallery_ONT);

		if(RITVGallery_ONT=='Yes')
		{
			jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGC').css('color','#0073aa');
			jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGR').css('color','#c5c5c5');
		}
		else
		{
			jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGR').css('color','#0073aa');
			jQuery('#RIT_VGallery_Photos_Ul_Li_'+RIT_VGallery_Lindex).find('.RITVGC').css('color','#c5c5c5');
		}
		
		jQuery('#RIT_VGallery_Button_U').fadeOut();
		RIT_VGallery_Main_Big_Clicked();

		setTimeout(function(){
			jQuery('#RIT_VGallery_Button_S').fadeIn();
		},300)	
	}
}