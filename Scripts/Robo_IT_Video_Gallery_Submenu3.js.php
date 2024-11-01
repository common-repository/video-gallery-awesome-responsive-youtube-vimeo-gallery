<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function RIT_VG_VSP_I(number)
	{
		jQuery('#RIT_VG_VSP_Icon').val(number);
		jQuery('.RIT_VG_VSP_Icon').css('border','1px solid white');
		jQuery('.RIT_VG_VSP_Icon').css('background-color','white');
		jQuery('#RIT_VG_VSP_Icon_'+number).css('border','1px solid #6f6e6e');
		jQuery('#RIT_VG_VSP_Icon_'+number).css('background-color','#eaeaea');
	}
	function RIT_Video_Gallery_3D_Select_Icons_Type(number)
	{
		jQuery('#RIT_VG_3D_Icon').val(number);
		jQuery('.RIT_Video_Gallery_3D_Icons').css('border','1px solid white');
		jQuery('.RIT_Video_Gallery_3D_Icons').css('background-color','white');
		jQuery('#RIT_VGallery_3D_Icon_'+number).css('border','1px solid #6f6e6e');
		jQuery('#RIT_VGallery_3D_Icon_'+number).css('background-color','#eaeaea');
	}
	function RIT_Video_Gallery_GHE_Icons_Type(number)
	{
		jQuery('#RIT_VG_GHE_Icon').val(number);
		jQuery('.RIT_Video_Gallery_GHE_Icons').css('border','1px solid white');
		jQuery('.RIT_Video_Gallery_GHE_Icons').css('background-color','white');
		jQuery('#RIT_Video_Gallery_GHE_Icons_'+number).css('border','1px solid #6f6e6e');
		jQuery('#RIT_Video_Gallery_GHE_Icons_'+number).css('background-color','#eaeaea');
	}
	function RIT_Video_Gallery_GHE_Icons_1_Type(number)
	{
		jQuery('#RIT_VG_GHE_PIcon').val(number);
		jQuery('.RIT_Video_Gallery_GHE_Icons_1').css('border','1px solid white');
		jQuery('.RIT_Video_Gallery_GHE_Icons_1').css('background-color','white');
		jQuery('#RIT_Video_Gallery_GHE_Icons1_'+number).css('border','1px solid #6f6e6e');
		jQuery('#RIT_Video_Gallery_GHE_Icons1_'+number).css('background-color','#eaeaea');
	}
	function RIT_VG_GHE_HE_Changed()
	{
		var RIT_VG_GHE_HE=jQuery('#RIT_VG_GHE_HE').val();
		if(RIT_VG_GHE_HE=='effect5')
		{
			jQuery('#RIT_VG_GHE_2').hide(500);
		}
		else
		{
			jQuery('#RIT_VG_GHE_2').show(500);
		}
	}
	function RIT_Video_Gallery_Buttons_Clicked()
	{
		var RIT_VGallery_ET=jQuery('#RIT_VGallery_ET').val();
		jQuery('#RIT_Video_Gallery_Setting_Video_Title').text(RIT_VGallery_ET);
		jQuery('.RIT_Video_Gallery_Main_Fieldset').fadeOut();
		setTimeout(function(){
			if(RIT_VGallery_ET=='Video Slider Playlist')
			{
				jQuery('#RIT_Video_Gallery_Main_Fieldset_4').fadeIn();
			}
			else if(RIT_VGallery_ET=='3D Gallery')
			{
				jQuery('#RIT_Video_Gallery_Main_Fieldset_5').fadeIn();
			}
			else if(RIT_VGallery_ET=='Gallery Hover Effects')
			{
				jQuery('#RIT_Video_Gallery_Main_Fieldset_6').fadeIn();
				RIT_VG_GHE_HE_Changed();
			}
		},500)
	}
	function Edit_RITVGallery_Effect(Edit_ID)
	{
		jQuery('.RIT_VGallery_Main_Div1').fadeOut();
		jQuery('.RIT_VGallery_Main_Table').fadeOut();
		jQuery('.RIT_VGallery_Effect_Table').fadeOut();
		jQuery('.RIT_VGallery_Effect_Table1').fadeOut();
		jQuery('#RIT_VGE_Save').fadeOut();
		jQuery('#RIT_VGE_Update').fadeIn();

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Edit_RITVGallery_Effect_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Edit_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var RIT_VGallery_Edit_Params=response.split(')*+*(');
			jQuery('#RIT_VGallery_EN').val(RIT_VGallery_Edit_Params[0]);
			jQuery('#RIT_VGallery_ET').val(RIT_VGallery_Edit_Params[1]);
			jQuery('#RIT_VGallery_ET').hide();
			jQuery('#RIT_Video_Gallery_Setting_Video_Title').text(RIT_VGallery_Edit_Params[1]);
			jQuery('#RIT_VGallery_Hidden_ID').val(Edit_ID);
			jQuery('#RIT_VGallery_Hidden_EN').val(RIT_VGallery_Edit_Params[0]);

			setTimeout(function(){
				jQuery('.RIT_VGallery_Main_Div2').fadeIn();
				jQuery('.RIT_VGallery_Main_Fieldset1').fadeIn();
				if(RIT_VGallery_Edit_Params[1]=='Video Slider Playlist')
				{
					jQuery('#RIT_Video_Gallery_Main_Fieldset_4').fadeIn();
					jQuery('#RIT_VG_VSP_W_Output').val(RIT_VGallery_Edit_Params[2]);
						jQuery('#RIT_VG_VSP_W').val(RIT_VGallery_Edit_Params[2].split('px')[0]);
					jQuery('#RIT_VG_VSP_H_Output').val(RIT_VGallery_Edit_Params[3]);
						jQuery('#RIT_VG_VSP_H').val(RIT_VGallery_Edit_Params[3].split('px')[0]);
					if(RIT_VGallery_Edit_Params[4]=='false')
					{
						jQuery('#RIT_VG_VSP_AP').attr('checked',false);
					}
					else
					{
						jQuery('#RIT_VG_VSP_AP').attr('checked',true);
					}
					jQuery('#RIT_VG_VSP_APS_Output').val(RIT_VGallery_Edit_Params[5]);
						jQuery('#RIT_VG_VSP_APS').val(RIT_VGallery_Edit_Params[5]);
					if(RIT_VGallery_Edit_Params[6]=='No')
					{
						jQuery('#RIT_VG_VSP_Ar').attr('checked',false);
					}
					else
					{
						jQuery('#RIT_VG_VSP_Ar').attr('checked',true);
					}
					jQuery('#RIT_VG_VSP_ArS_Output').val(RIT_VGallery_Edit_Params[7]);
						jQuery('#RIT_VG_VSP_ArS').val(RIT_VGallery_Edit_Params[7]);
					jQuery('#RIT_VG_VSP_PT_Output').val(RIT_VGallery_Edit_Params[8]/1000 + 's');
						jQuery('#RIT_VG_VSP_PT').val(RIT_VGallery_Edit_Params[8]/1000);
					jQuery('#RIT_VG_VSP_CS_Output').val(RIT_VGallery_Edit_Params[9]/1000 + 's');
						jQuery('#RIT_VG_VSP_CS').val(RIT_VGallery_Edit_Params[9]/1000);
					jQuery('#RIT_VG_VSP_BgC').val(RIT_VGallery_Edit_Params[10]);
					jQuery('#RIT_VG_VSP_BSC').val(RIT_VGallery_Edit_Params[11]);
					jQuery('#RIT_VG_VSP_BW_Output').val(RIT_VGallery_Edit_Params[12]);
						jQuery('#RIT_VG_VSP_BW').val(RIT_VGallery_Edit_Params[12].split('px')[0]);
					jQuery('#RIT_VG_VSP_BS').val(RIT_VGallery_Edit_Params[13]);
					jQuery('#RIT_VG_VSP_BC').val(RIT_VGallery_Edit_Params[14]);
					jQuery('#RIT_VG_VSP_TFS_Output').val(RIT_VGallery_Edit_Params[15]);
						jQuery('#RIT_VG_VSP_TFS').val(RIT_VGallery_Edit_Params[15].split('px')[0]);
					jQuery('#RIT_VG_VSP_TC').val(RIT_VGallery_Edit_Params[16]);
					jQuery('#RIT_VG_VSP_TFF').val(RIT_VGallery_Edit_Params[17]);
					jQuery('#RIT_VG_VSP_TTA').val(RIT_VGallery_Edit_Params[18]);
					if(RIT_VGallery_Edit_Params[19]=='No')
					{
						jQuery('#RIT_VG_VSP_DS').attr('checked',false);
					}
					else
					{
						jQuery('#RIT_VG_VSP_DS').attr('checked',true);
					}
					jQuery('#RIT_VG_VSP_DFF').val(RIT_VGallery_Edit_Params[20]);
					jQuery('#RIT_VG_VSP_DFS_Output').val(RIT_VGallery_Edit_Params[21]);
						jQuery('#RIT_VG_VSP_DFS').val(RIT_VGallery_Edit_Params[21].split('px')[0]);
					jQuery('#RIT_VG_VSP_DC').val(RIT_VGallery_Edit_Params[22]);
					jQuery('#RIT_VG_VSP_NBgC').val(RIT_VGallery_Edit_Params[23]);
					jQuery('#RIT_VG_VSP_NHBgC').val(RIT_VGallery_Edit_Params[24]);
					jQuery('#RIT_VG_VSP_NBC').val(RIT_VGallery_Edit_Params[25]);
					jQuery('#RIT_VG_VSP_Icon').val(RIT_VGallery_Edit_Params[26]);
					jQuery('#RIT_VG_VSP_Icon_'+RIT_VGallery_Edit_Params[26]).css({'border':'1px solid #6f6e6e','background-color':'#eaeaea'});
					
					jQuery('#RIT_VG_VSP_NCols_Output').val(RIT_VGallery_Edit_Params[27]);
						jQuery('#RIT_VG_VSP_NCols').val(RIT_VGallery_Edit_Params[27]);
					jQuery('#RIT_VG_VSP_NSpac_Output').val(RIT_VGallery_Edit_Params[28]+'px');
						jQuery('#RIT_VG_VSP_NSpac').val(RIT_VGallery_Edit_Params[28]);
					jQuery('#RIT_VG_VSP_NHei_Output').val(RIT_VGallery_Edit_Params[29]);
						jQuery('#RIT_VG_VSP_NHei').val(RIT_VGallery_Edit_Params[29].split('px')[0]);
					jQuery('#RIT_VG_VSP_THC').val(RIT_VGallery_Edit_Params[30]);
					jQuery('#RIT_VG_VSP_DHC').val(RIT_VGallery_Edit_Params[31]);
				}
				else if(RIT_VGallery_Edit_Params[1]=='3D Gallery')
				{
					jQuery('#RIT_Video_Gallery_Main_Fieldset_5').fadeIn();
					jQuery('#RIT_VG_3D_Deg_Output').val(RIT_VGallery_Edit_Params[2]);
						jQuery('#RIT_VG_3D_Deg').val(RIT_VGallery_Edit_Params[2].split('deg')[0]);
					jQuery('#RIT_VG_3D_SW_Output').val(RIT_VGallery_Edit_Params[3]);
						jQuery('#RIT_VG_3D_SW').val(RIT_VGallery_Edit_Params[3].split('px')[0]);
					jQuery('#RIT_VG_3D_SH_Output').val(RIT_VGallery_Edit_Params[4]);
						jQuery('#RIT_VG_3D_SH').val(RIT_VGallery_Edit_Params[4].split('px')[0]);
					jQuery('#RIT_VG_3D_BW_Output').val(RIT_VGallery_Edit_Params[5]);
						jQuery('#RIT_VG_3D_BW').val(RIT_VGallery_Edit_Params[5].split('px')[0]);
					jQuery('#RIT_VG_3D_BS').val(RIT_VGallery_Edit_Params[6]);
					jQuery('#RIT_VG_3D_BC').val(RIT_VGallery_Edit_Params[7]);
					jQuery('#RIT_VG_3D_BR_Output').val(RIT_VGallery_Edit_Params[8]);
						jQuery('#RIT_VG_3D_BR').val(RIT_VGallery_Edit_Params[8].split('%')[0]);
					jQuery('#RIT_VG_3D_BSC').val(RIT_VGallery_Edit_Params[9]);
					if(RIT_VGallery_Edit_Params[10]=='Yes')
					{
						jQuery('#RIT_VG_3D_ST').attr('checked',true);
					}
					else
					{
						jQuery('#RIT_VG_3D_ST').attr('checked',false);
					}
					jQuery('#RIT_VG_3D_TC').val(RIT_VGallery_Edit_Params[11]);
					jQuery('#RIT_VG_3D_TFS_Output').val(RIT_VGallery_Edit_Params[12]);
						jQuery('#RIT_VG_3D_TFS').val(RIT_VGallery_Edit_Params[12].split('px')[0]);
					jQuery('#RIT_VG_3D_TBgC').val(RIT_VGallery_Edit_Params[13]);
					jQuery('#RIT_VG_3D_TFF').val(RIT_VGallery_Edit_Params[14]);
					jQuery('#RIT_VG_3D_TO_Output').val(RIT_VGallery_Edit_Params[15]*100+'%');
						jQuery('#RIT_VG_3D_TO').val(RIT_VGallery_Edit_Params[15]*100);
					jQuery('#RIT_VG_3D_TTA').val(RIT_VGallery_Edit_Params[16]);
					jQuery('#RIT_VG_3D_TTSC').val(RIT_VGallery_Edit_Params[17]);
					jQuery('#RIT_VG_3D_TBW_Output').val(RIT_VGallery_Edit_Params[18]);
						jQuery('#RIT_VG_3D_TBW').val(RIT_VGallery_Edit_Params[18].split('px')[0]);
					jQuery('#RIT_VG_3D_TBS').val(RIT_VGallery_Edit_Params[19]);
					jQuery('#RIT_VG_3D_TBC').val(RIT_VGallery_Edit_Params[20]);
					jQuery('#RIT_VG_3D_TBR_Output').val(RIT_VGallery_Edit_Params[21]);
						jQuery('#RIT_VG_3D_TBR').val(RIT_VGallery_Edit_Params[21].split('%')[0]);
					jQuery('#RIT_VG_3D_Icon').val(RIT_VGallery_Edit_Params[22]);
					jQuery('#RIT_VGallery_3D_Icon_'+RIT_VGallery_Edit_Params[22]).css({'border':'1px solid #6f6e6e','background-color':'#eaeaea'});
					jQuery('#RIT_VG_3D_IS_Output').val(RIT_VGallery_Edit_Params[23]);
						jQuery('#RIT_VG_3D_IS').val(RIT_VGallery_Edit_Params[23].split('px')[0]);
					jQuery('#RIT_VG_3D_IHC').val(RIT_VGallery_Edit_Params[24]);
					jQuery('#RIT_VG_3D_IC').val(RIT_VGallery_Edit_Params[25]);
				}
				else if(RIT_VGallery_Edit_Params[1]=='Gallery Hover Effects')
				{
					jQuery('#RIT_Video_Gallery_Main_Fieldset_6').fadeIn();
					jQuery('#RIT_VG_GHE_IW_Output').val(RIT_VGallery_Edit_Params[2]);
						jQuery('#RIT_VG_GHE_IW').val(RIT_VGallery_Edit_Params[2].split('px')[0]);						
					jQuery('#RIT_VG_GHE_IH_Output').val(RIT_VGallery_Edit_Params[3]);
						jQuery('#RIT_VG_GHE_IH').val(RIT_VGallery_Edit_Params[3].split('px')[0]);						
					jQuery('#RIT_VG_GHE_IBW_Output').val(RIT_VGallery_Edit_Params[4]);
						jQuery('#RIT_VG_GHE_IBW').val(RIT_VGallery_Edit_Params[4].split('px')[0]);
					jQuery('#RIT_VG_GHE_IBS').val(RIT_VGallery_Edit_Params[5]);
					jQuery('#RIT_VG_GHE_IBC').val(RIT_VGallery_Edit_Params[6]);
					jQuery('#RIT_VG_GHE_IBSC').val(RIT_VGallery_Edit_Params[7]);
					jQuery('#RIT_VG_GHE_IPB_Output').val(RIT_VGallery_Edit_Params[8]);
						jQuery('#RIT_VG_GHE_IPB').val(RIT_VGallery_Edit_Params[8].split('px')[0]);
					jQuery('#RIT_VG_GHE_IHB1').val(RIT_VGallery_Edit_Params[9]);
					jQuery('#RIT_VG_GHE_IHB2').val(RIT_VGallery_Edit_Params[10]);
					jQuery('#RIT_VG_GHE_IO1_Output').val(RIT_VGallery_Edit_Params[11]*100+'%');
						jQuery('#RIT_VG_GHE_IO1').val(RIT_VGallery_Edit_Params[11]*100);
					jQuery('#RIT_VG_GHE_Icon').val(RIT_VGallery_Edit_Params[13]);
					jQuery('.RIT_Video_Gallery_GHE_Icons').css({'border':'1px solid white','background-color':'white'});
					jQuery('#RIT_Video_Gallery_GHE_Icons_'+RIT_VGallery_Edit_Params[13]).css({'border':'1px solid #6f6e6e','background-color':'#eaeaea'});
					jQuery('#RIT_VG_GHE_IS_Output').val(RIT_VGallery_Edit_Params[14]);
						jQuery('#RIT_VG_GHE_IS').val(RIT_VGallery_Edit_Params[14].split('px')[0]);
					jQuery('#RIT_VG_GHE_IC').val(RIT_VGallery_Edit_Params[15]);
					jQuery('#RIT_VG_GHE_PVW_Output').val(RIT_VGallery_Edit_Params[16]);
						jQuery('#RIT_VG_GHE_PVW').val(RIT_VGallery_Edit_Params[16].split('px')[0]);
					jQuery('#RIT_VG_GHE_PVH_Output').val(RIT_VGallery_Edit_Params[17]);
						jQuery('#RIT_VG_GHE_PVH').val(RIT_VGallery_Edit_Params[17].split('px')[0]);
					jQuery('#RIT_VG_GHE_PBSC').val(RIT_VGallery_Edit_Params[18]);
					jQuery('#RIT_VG_GHE_PIcon').val(RIT_VGallery_Edit_Params[19]);
					jQuery('.RIT_Video_Gallery_GHE_Icons_1').css({'border':'1px solid white','background-color':'white'});
					jQuery('#RIT_Video_Gallery_GHE_Icons1_'+RIT_VGallery_Edit_Params[19]).css({'border':'1px solid #6f6e6e','background-color':'#eaeaea'});
					jQuery('#RIT_VG_GHE_PIS_Output').val(RIT_VGallery_Edit_Params[20]);
						jQuery('#RIT_VG_GHE_PIS').val(RIT_VGallery_Edit_Params[20].split('px')[0]);
					jQuery('#RIT_VG_GHE_PIC').val(RIT_VGallery_Edit_Params[21]);
					jQuery('#RIT_VG_GHE_PFS_Output').val(RIT_VGallery_Edit_Params[22]);
						jQuery('#RIT_VG_GHE_PFS').val(RIT_VGallery_Edit_Params[22].split('px')[0]);
					jQuery('#RIT_VG_GHE_PC').val(RIT_VGallery_Edit_Params[23]);
					jQuery('#RIT_VG_GHE_PIFS_Output').val(RIT_VGallery_Edit_Params[24]);
						jQuery('#RIT_VG_GHE_PIFS').val(RIT_VGallery_Edit_Params[24].split('px')[0]);
					jQuery('#RIT_VG_GHE_PICol').val(RIT_VGallery_Edit_Params[25]);
					jQuery('#RIT_VG_GHE_PIP').val(RIT_VGallery_Edit_Params[26]);
					jQuery('#RIT_VG_GHE_HE').val(RIT_VGallery_Edit_Params[27]);
					RIT_VG_GHE_HE_Changed();
				}
				jQuery('.RIT_Video_Gallery_Color').wpColorPicker();
			},500)
		});
	}
	function Delete_RITVGallery_Effect(Delete_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Delete_RITVGallery_Effect_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Delete_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		});
	}
	function RIT_VGallery_Add_Effect(Create_ID)
	{
		jQuery('.RIT_VGallery_Main_Div1').fadeOut();
		jQuery('.RIT_VGallery_Main_Table').fadeOut();
		jQuery('.RIT_VGallery_Effect_Table').fadeOut();
		jQuery('.RIT_VGallery_Effect_Table1').fadeOut();
		jQuery('#RIT_VGE_Update').fadeOut();
		jQuery('#RIT_VGE_Save').fadeIn();
		jQuery('#RIT_VGallery_EN').val('');
		jQuery('#RIT_VGallery_ET').val('Video Slider Playlist');
		jQuery('.RIT_Video_Gallery_Color').wpColorPicker();

		setTimeout(function(){
			jQuery('.RIT_VGallery_Main_Div2').fadeIn();
			jQuery('.RIT_VGallery_Main_Fieldset1').fadeIn();
			jQuery('#RIT_Video_Gallery_Main_Fieldset_4').fadeIn();
		},500)
	}
	function RIT_VGallery_Search()
	{

	}
	function RIT_VGallery_Reset()
	{

	}
	function RIT_VGallery_Cancel()
	{
		location.reload();
	}
</script>