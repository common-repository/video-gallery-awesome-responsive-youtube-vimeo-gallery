<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">	
	function Search_Button_Clicked()
	{
		setInterval(function(){
			var RIT_Video_Searched_Gallery=jQuery('#search_text_field').val();
			if(RIT_Video_Searched_Gallery!='')
			{
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Search_RIT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: RIT_Video_Searched_Gallery, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(response=='')
					{
						jQuery('#searched_gallery_does_not_exist').html('* Requested Gallery does not exist!');
						jQuery('.Videos_Table1').hide();
						jQuery('.Videos_Table').show();
					}
					else
					{
						jQuery('#searched_gallery_does_not_exist').html('');
						jQuery('.Videos_Table').hide();
						jQuery('.Videos_Table1').show();
						jQuery('.Videos_Table1').empty();

						var searched_params=response.split(')*^*(');
						for(i=0;i<parseInt(searched_params.length-1);i++)
						{
							searched_params_callback=searched_params[i].split(')&*&(');
							
							jQuery('.Videos_Table1').append("<tr><td class='id_item'><B><I>"+parseInt(parseInt(i)+1)+"</I></B></td><td class='title_item'><B><I>"+searched_params_callback[1]+"</I></B></td><td class='quantity_video_item'><B><I>"+searched_params_callback[2]+"</I></B></td><td class='views_item'><B><I>Views</I></B></td><td class='edit_item' onclick='Edit_Video_Gallery("+searched_params_callback[0]+")'><B><I>Edit</I></B></td><td class='delete_item' onclick='Delete_Video_Gallery("+searched_params_callback[0]+")'><B><I>Delete</I></B></td></tr>");
						}
					}
				});
			}
			else
			{
				jQuery('.Videos_Table1').hide();
				jQuery('.Videos_Table').show();
			}
		}, 600);
	}
	function Reset_Button_Clicked()
	{
		jQuery('#search_text_field').val('');
		jQuery('#searched_gallery_does_not_exist').html('');
		jQuery('.Videos_Table1').hide();
		jQuery('.Videos_Table').show();
	}
	function Add_Video_Button_Clicked()
	{
		jQuery('.RIT_VGallery_Sub1D1').fadeOut();
		jQuery('.Add_new_Video_Gallery_Save_button').fadeIn();
		jQuery('.Add_new_Video_Gallery_Update_button').fadeOut();
		jQuery('.Videos_Main_Table').fadeOut();
		jQuery('.Videos_Table').fadeOut();
		jQuery('.Videos_Table1').fadeOut();
		setTimeout(function(){
			jQuery('.RIT_VGallery_Sub1D2').fadeIn(); 
			jQuery('.RIT_Video_Gallery_Sub1_Page3').fadeIn();
			jQuery('.RIT_VGallery_New_V').fadeIn();
		}, 500);
	}
	function Add_new_Video_Gallery_Cancel_button_clicked()
	{
		location.reload();
	}	
	function Edit_RITVideo_Gallery(id)
	{	
		jQuery('.RIT_VGallery_Sub1D1').fadeOut();
		jQuery('.Add_new_Video_Gallery_Save_button').fadeOut();
		jQuery('.Add_new_Video_Gallery_Update_button').fadeIn();
		jQuery('.Videos_Main_Table').fadeOut();
		jQuery('.Videos_Table').fadeOut();
		jQuery('.Videos_Table1').fadeOut();

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Edit_RIT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var Gallery_title=response.split('^%^');

			jQuery('#RIT_Video_Gallery_Hidden_Id_Gallery').val(id);
			jQuery('#Add_new_Video_Gallery_Title_Name').val(Gallery_title[0]);
			jQuery('#RIT_Video_Gallery_HiddenGN').val(Gallery_title[0]);
			jQuery('#RIT_Video_Gallery_Type').val(Gallery_title[1]);
			jQuery('#RIT_Video_Gallery_Show_Video_Type').val(Gallery_title[2]);
			RIT_Video_Gallery_Show_Video_Type_Changed();
			jQuery('#RIT_Video_Gallery_Videos_Quantity').val(Gallery_title[3]);
			RIT_Video_Gallery_Type_Changed();
			jQuery('#RIT_VGallery_Hidden_Count').val(Gallery_title[4]);

			var RITVGallery_VParams=Gallery_title[5].split(')*(');

			for(var y=0;y<Gallery_title[4];y++)
			{
				var RITVGallery_Input_params=RITVGallery_VParams[y].split('$#$');

				if(RITVGallery_Input_params[5]=='Yes')
				{
					RITVGalleryColorY='#0073aa';
					RITVGalleryColorN='#c5c5c5';
				}
				else
				{
					RITVGalleryColorY='#c5c5c5';
					RITVGalleryColorN='#0073aa';
				}

				jQuery('#RIT_Video_Gallery_Ul').append('<li id="RIT_VGallery_Photos_Ul_Li_'+parseInt(parseInt(y)+1)+'"><div class="RIT_VGallery_Photos_Desc_Div"><table class="RIT_VGallery_Photos_Table"><tr><td colspan="2"><i class="roboiticons-style roboiticons-remove" style="cursor:pointer;float:right;font-size: 20px; color:#ff0000" onclick="RIT_VGallery_Remove_U('+parseInt(parseInt(y)+1)+')"></i><i class="roboiticons-style roboiticons-edit" style="cursor:pointer;float:right;margin-right:10px;font-size: 22px; color:#0073aa" onclick="RIT_VGallery_Edit_U('+parseInt(parseInt(y)+1)+')"></i></td></tr><tr><td><label>Title</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Title" id="RITVGallery_Uploaded_Title_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Uploaded_Title_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[0]+'" readonly></td></tr><tr><td><label>Description</label></td><td><textarea class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Desc" rows="3"  id="RITVGallery_Uploaded_Desc_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Uploaded_Desc_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[1]+'" readonly>'+RITVGallery_Input_params[1]+'</textarea></td></tr><tr><td><label>Video URL</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Video" id="RITVGallery_Uploaded_Video_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Uploaded_Video_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[2]+'" readonly></td></tr><tr><td><label>Image URL</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Uploaded_Image" id="RITVGallery_Uploaded_Image_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Uploaded_Image_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[3]+'" readonly></td></tr><tr><td><label>Link</label></td><td><input type="text" class="RIT_VGallery_Upload_Video_Input RITVGallery_Included_Link" id="RITVGallery_Included_Link_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Included_Link_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[4]+'" readonly></td></tr><tr><td><label>New Tab</label></td><td style="text-align: center"><input type="hidden" class="RITVGallery_Uploaded_ONT" id="RITVGallery_Uploaded_ONT_'+parseInt(parseInt(y)+1)+'" name="RITVGallery_Uploaded_ONT_'+parseInt(parseInt(y)+1)+'" value="'+RITVGallery_Input_params[5]+'"><i class="RITVGC roboiticonsdraw roboiticons-style roboiticons-check"  style="margin-right:20px;font-size: 20px; color:'+RITVGalleryColorY+'"></i><i class="RITVGR roboiticonsdraw roboiticons-style roboiticons-remove"  style="font-size: 20px; color:'+RITVGalleryColorN+'"></i></td></tr></table></div><div class="RIT_VGallery_Photos_Div" id="RIT_VGallery_Photos_Div_'+parseInt(parseInt(y)+1)+'"><img class="RIT_VGallery_Photo" id="RIT_VGallery_Photo_'+parseInt(parseInt(y)+1)+'" src="'+RITVGallery_Input_params[3]+'"></div></li>');
			}

			setTimeout(function(){
				jQuery('.RIT_VGallery_Sub1D2').fadeIn(); 
				jQuery('.RIT_Video_Gallery_Sub1_Page3').fadeIn();
				jQuery('.RIT_VGallery_New_V').fadeIn();
				jQuery('.RIT_VGallery_Photos').fadeIn();
			}, 500);
		})
	}
	function Delete_RITVideo_Gallery(id)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Delete_RIT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		});
	}		
	function RIT_Video_Gallery_Show_Video_Type_Changed()
	{
		var RIT_Video_Gallery_Show_Video_Type=jQuery('#RIT_Video_Gallery_Show_Video_Type').val();
		if(RIT_Video_Gallery_Show_Video_Type=='Show All')
		{
			jQuery('#RIT_Video_Gallery_Videos_Quantity').hide(500);
		}
		else
		{
			jQuery('#RIT_Video_Gallery_Videos_Quantity').show(500);
		}
	}
	function RIT_Video_Gallery_Type_Changed()
	{
		var RIT_Video_Gallery_Type=jQuery('#RIT_Video_Gallery_Type').val();

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'RIT_Video_Gallery_Type', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: RIT_Video_Gallery_Type, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			if(response=='Video Slider Playlist' || response=='3D Gallery')
			{
				jQuery('#RIT_Video_Gallery_Show_Video_Type').hide(500);
				jQuery('#RIT_Video_Gallery_Videos_Quantity').hide(500);
			}
			else
			{
				jQuery('#RIT_Video_Gallery_Show_Video_Type').show(500);
				jQuery('#RIT_Video_Gallery_Videos_Quantity').show(500);
			}
		});
	}	
	function RIT_VGallery_ONT(YON)
	{
		jQuery('#RIT_VGallery_YON').val(YON);

		if(YON=='Yes')
		{
			jQuery('.RITVGalleryicon_Yes').css('color','#0073aa');
			jQuery('.RITVGalleryicon_No').css('color','#c5c5c5');
		}
		else
		{
			jQuery('.RITVGalleryicon_No').css('color','#0073aa');
			jQuery('.RITVGalleryicon_Yes').css('color','#c5c5c5');
		}
	}
</script>