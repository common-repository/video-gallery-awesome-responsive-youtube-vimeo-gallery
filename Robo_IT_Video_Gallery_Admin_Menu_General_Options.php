<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	wp_enqueue_media();
	wp_enqueue_script( 'custom-header' );

	$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
	$table_name1 = $wpdb->prefix . "rit_video_manager";
	$table_name2 = $wpdb->prefix . "rit_font_family";
	$table_name3 = $wpdb->prefix . "rit_video_effdb";
	$table_name7 = $wpdb->prefix . "rit_video_effect4";
	$table_name8 = $wpdb->prefix . "rit_video_effect5";
	$table_name9 = $wpdb->prefix . "rit_video_effect6";

	$RIT_VG_VSP_W=sanitize_text_field($_POST['RIT_VG_VSP_W']).'px';
	$RIT_VG_VSP_Wi=sanitize_text_field($_POST['RIT_VG_VSP_W']);
	$RIT_VG_VSP_IW=$RIT_VG_VSP_Wi-260 . 'px';
	$RIT_VG_VSP_H=sanitize_text_field($_POST['RIT_VG_VSP_H']).'px';
	$RIT_VG_VSP_AP=sanitize_text_field($_POST['RIT_VG_VSP_AP']);
	if($RIT_VG_VSP_AP=='on')
	{
		$RIT_VG_VSP_AP='true';
	}
	else
	{
		$RIT_VG_VSP_AP='false';
	}
	$RIT_VG_VSP_APS=sanitize_text_field($_POST['RIT_VG_VSP_APS']);
	$RIT_VG_VSP_Ar=sanitize_text_field($_POST['RIT_VG_VSP_Ar']);
	if($RIT_VG_VSP_Ar=='on')
	{
		$RIT_VG_VSP_Ar='Yes';
	}
	else
	{
		$RIT_VG_VSP_Ar='No';
	}
	$RIT_VG_VSP_ArS=sanitize_text_field($_POST['RIT_VG_VSP_ArS']);
	$RIT_VG_VSP_PT=sanitize_text_field($_POST['RIT_VG_VSP_PT'])*1000;
	$RIT_VG_VSP_CS=sanitize_text_field($_POST['RIT_VG_VSP_CS'])*1000;
	$RIT_VG_VSP_BgC=sanitize_text_field($_POST['RIT_VG_VSP_BgC']);
	$RIT_VG_VSP_BSC=sanitize_text_field($_POST['RIT_VG_VSP_BSC']);
	$RIT_VG_VSP_BW=sanitize_text_field($_POST['RIT_VG_VSP_BW']).'px';
	$RIT_VG_VSP_BS=sanitize_text_field($_POST['RIT_VG_VSP_BS']);
	$RIT_VG_VSP_BC=sanitize_text_field($_POST['RIT_VG_VSP_BC']);
	$RIT_VG_VSP_TFS=sanitize_text_field($_POST['RIT_VG_VSP_TFS']).'px';
	$RIT_VG_VSP_TC=sanitize_text_field($_POST['RIT_VG_VSP_TC']);
	$RIT_VG_VSP_TFF=sanitize_text_field($_POST['RIT_VG_VSP_TFF']);
	$RIT_VG_VSP_TTA=sanitize_text_field($_POST['RIT_VG_VSP_TTA']);
	$RIT_VG_VSP_DS=sanitize_text_field($_POST['RIT_VG_VSP_DS']);
	if($RIT_VG_VSP_DS=='on')
	{
		$RIT_VG_VSP_DS='Yes';
		$RIT_VG_VSP_DFF=sanitize_text_field($_POST['RIT_VG_VSP_DFF']);
		$RIT_VG_VSP_DFS=sanitize_text_field($_POST['RIT_VG_VSP_DFS']).'px';
		$RIT_VG_VSP_DC=sanitize_text_field($_POST['RIT_VG_VSP_DC']);
	}
	else
	{
		$RIT_VG_VSP_DS='No';
		$RIT_VG_VSP_DFF='Arial';
		$RIT_VG_VSP_DFS='14px';
		$RIT_VG_VSP_DC='#000000';
	}
	$RIT_VG_VSP_NBgC=sanitize_text_field($_POST['RIT_VG_VSP_NBgC']);
	$RIT_VG_VSP_NHBgC=sanitize_text_field($_POST['RIT_VG_VSP_NHBgC']);
	$RIT_VG_VSP_NBC=sanitize_text_field($_POST['RIT_VG_VSP_NBC']);
	$RIT_VG_VSP_I=sanitize_text_field($_POST['RIT_VG_VSP_I']);
	$RIT_VG_VSP_NCols=sanitize_text_field($_POST['RIT_VG_VSP_NCols']);	
	$RIT_VG_VSP_NSpac=sanitize_text_field($_POST['RIT_VG_VSP_NSpac']);	
	$RIT_VG_VSP_NHei=sanitize_text_field($_POST['RIT_VG_VSP_NHei']).'px';	
	$RIT_VG_VSP_THC=sanitize_text_field($_POST['RIT_VG_VSP_THC']);	
	$RIT_VG_VSP_DHC=sanitize_text_field($_POST['RIT_VG_VSP_DHC']);	

	$RIT_VG_3D_Deg=sanitize_text_field($_POST['RIT_VG_3D_Deg']).'deg';
	$RIT_VG_3D_SW=sanitize_text_field($_POST['RIT_VG_3D_SW']).'px';
	$RIT_VG_3D_SH=sanitize_text_field($_POST['RIT_VG_3D_SH']).'px';
	$RIT_VG_3D_BW=sanitize_text_field($_POST['RIT_VG_3D_BW']).'px';
	$RIT_VG_3D_BS=sanitize_text_field($_POST['RIT_VG_3D_BS']);
	$RIT_VG_3D_BC=sanitize_text_field($_POST['RIT_VG_3D_BC']);
	$RIT_VG_3D_BR=sanitize_text_field($_POST['RIT_VG_3D_BR']).'%';
	$RIT_VG_3D_BSC=sanitize_text_field($_POST['RIT_VG_3D_BSC']);
	$RIT_VG_3D_ST=sanitize_text_field($_POST['RIT_VG_3D_ST']);
	if($RIT_VG_3D_ST=='on')
	{
		$RIT_VG_3D_ST='Yes';
	}
	else
	{
		$RIT_VG_3D_ST='No';
	}
	$RIT_VG_3D_TC=sanitize_text_field($_POST['RIT_VG_3D_TC']);
	$RIT_VG_3D_TFS=sanitize_text_field($_POST['RIT_VG_3D_TFS']).'px';
	$RIT_VG_3D_TBgC=sanitize_text_field($_POST['RIT_VG_3D_TBgC']);
	$RIT_VG_3D_TFF=sanitize_text_field($_POST['RIT_VG_3D_TFF']);
	$RIT_VG_3D_TO=sanitize_text_field($_POST['RIT_VG_3D_TO'])/100;
	$RIT_VG_3D_TTA=sanitize_text_field($_POST['RIT_VG_3D_TTA']);
	$RIT_VG_3D_TTSC=sanitize_text_field($_POST['RIT_VG_3D_TTSC']);
	$RIT_VG_3D_TBW=sanitize_text_field($_POST['RIT_VG_3D_TBW']).'px';
	$RIT_VG_3D_TBS=sanitize_text_field($_POST['RIT_VG_3D_TBS']);
	$RIT_VG_3D_TBC=sanitize_text_field($_POST['RIT_VG_3D_TBC']);
	$RIT_VG_3D_TBR=sanitize_text_field($_POST['RIT_VG_3D_TBR']).'%';
	$RIT_VG_3D_Icon=sanitize_text_field($_POST['RIT_VG_3D_Icon']);
	$RIT_VG_3D_IS=sanitize_text_field($_POST['RIT_VG_3D_IS']).'px';
	$RIT_VG_3D_IHC=sanitize_text_field($_POST['RIT_VG_3D_IHC']);
	$RIT_VG_3D_IC=sanitize_text_field($_POST['RIT_VG_3D_IC']);

	$RIT_VG_GHE_IW=sanitize_text_field($_POST['RIT_VG_GHE_IW']).'px';
	$RIT_VG_GHE_IH=sanitize_text_field($_POST['RIT_VG_GHE_IH']).'px';
	$RIT_VG_GHE_IBW=sanitize_text_field($_POST['RIT_VG_GHE_IBW']).'px';
	$RIT_VG_GHE_IHW=(sanitize_text_field($_POST['RIT_VG_GHE_IW'])+2*sanitize_text_field($_POST['RIT_VG_GHE_IBW'])).'px';
	$RIT_VG_GHE_IBS=sanitize_text_field($_POST['RIT_VG_GHE_IBS']);
	$RIT_VG_GHE_IBC=sanitize_text_field($_POST['RIT_VG_GHE_IBC']);
	$RIT_VG_GHE_IBSC=sanitize_text_field($_POST['RIT_VG_GHE_IBSC']);
	$RIT_VG_GHE_IPB=sanitize_text_field($_POST['RIT_VG_GHE_IPB']).'px';
	$RIT_VG_GHE_IHB1=sanitize_text_field($_POST['RIT_VG_GHE_IHB1']);
	$RIT_VG_GHE_IHB2=sanitize_text_field($_POST['RIT_VG_GHE_IHB2']);
	$RIT_VG_GHE_IO1=sanitize_text_field($_POST['RIT_VG_GHE_IO1'])/100;
	$RIT_VG_GHE_Icon=sanitize_text_field($_POST['RIT_VG_GHE_Icon']);
	$RIT_VG_GHE_IS=sanitize_text_field($_POST['RIT_VG_GHE_IS']).'px';
	$RIT_VG_GHE_IC=sanitize_text_field($_POST['RIT_VG_GHE_IC']);
	$RIT_VG_GHE_PVW=sanitize_text_field($_POST['RIT_VG_GHE_PVW']).'px';
	$RIT_VG_GHE_PVH=sanitize_text_field($_POST['RIT_VG_GHE_PVH']).'px';
	$RIT_VG_GHE_PBSC=sanitize_text_field($_POST['RIT_VG_GHE_PBSC']);
	$RIT_VG_GHE_PIcon=sanitize_text_field($_POST['RIT_VG_GHE_PIcon']);
	$RIT_VG_GHE_PIS=sanitize_text_field($_POST['RIT_VG_GHE_PIS']).'px';
	$RIT_VG_GHE_PIC=sanitize_text_field($_POST['RIT_VG_GHE_PIC']);
	$RIT_VG_GHE_PFS=sanitize_text_field($_POST['RIT_VG_GHE_PFS']).'px';
	$RIT_VG_GHE_PC=sanitize_text_field($_POST['RIT_VG_GHE_PC']);
	$RIT_VG_GHE_PIFS=sanitize_text_field($_POST['RIT_VG_GHE_PIFS']).'px';
	$RIT_VG_GHE_PICol=sanitize_text_field($_POST['RIT_VG_GHE_PICol']);
	$RIT_VG_GHE_PIP=sanitize_text_field($_POST['RIT_VG_GHE_PIP']);
	$RIT_VG_GHE_HE=sanitize_text_field($_POST['RIT_VG_GHE_HE']);
	$RIT_VG_GHE_BW=sanitize_text_field($_POST['RIT_VG_GHE_IW'])/2;
	$RIT_VG_GHE_E2H=sanitize_text_field($_POST['RIT_VG_GHE_IH'])/2 .'px'; 
	if($RIT_VG_GHE_BW<100)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-50 . 'px';	}
	else if($RIT_VG_GHE_BW<200)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-50 . 'px';	}
	else if($RIT_VG_GHE_BW<300)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-60 . 'px';	}
	else if($RIT_VG_GHE_BW<400)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-70 . 'px';	}
	else if($RIT_VG_GHE_BW<500)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-80 . 'px';	}
	else if($RIT_VG_GHE_BW<600)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-90 . 'px';	}
	else if($RIT_VG_GHE_BW<700)
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-100 . 'px';	}
	else
	{	$RIT_VG_GHE_IO2=$RIT_VG_GHE_BW-110 . 'px';	}
	
	$RIT_VG_GHE_BW=$RIT_VG_GHE_BW . 'px';

	if(isset ($_POST['RIT_Video_Gallery_Prop_Save']))
	{
		$RIT_VGallery_EN=sanitize_text_field($_POST['RIT_VGallery_EN']);

		$RIT_VGallery_EN_Count=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));

		$RITVGcount=0;

		for($i=0;$i<count($RIT_VGallery_EN_Count);$i++)
		{
			$RIT_VGallery_EN_split=explode(' (', $RIT_VGallery_EN_Count[$i]->rit_effect_name);
			if($RIT_VGallery_EN_split[0]==$RIT_VGallery_EN)
			{
				$RITVGcount++;
			}
		}

		if($RITVGcount==0)
		{
			$RIT_VGallery_EN=$RIT_VGallery_EN;
		}
		else
		{
			$RIT_VGallery_EN=$RIT_VGallery_EN .' ('. $RITVGcount .')';
		}

		$RIT_VGallery_ET=sanitize_text_field($_POST['RIT_VGallery_ET']);
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, rit_effect_name, rit_effect_type) VALUES (%d, %s, %s)", '', $RIT_VGallery_EN, $RIT_VGallery_ET));

		$RIT_VGallery_IN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s",$RIT_VGallery_EN));
		
		if($RIT_VGallery_ET=='Video Slider Playlist')
		{			 			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, RIT_VG_VSP_W, RIT_VG_VSP_IW, RIT_VG_VSP_H, RIT_VG_VSP_AP, RIT_VG_VSP_APS, RIT_VG_VSP_Ar, RIT_VG_VSP_ArS, RIT_VG_VSP_PT, RIT_VG_VSP_CS, RIT_VG_VSP_BgC, RIT_VG_VSP_BSC, RIT_VG_VSP_BW, RIT_VG_VSP_BS, RIT_VG_VSP_BC, RIT_VG_VSP_TFS, RIT_VG_VSP_TC, RIT_VG_VSP_TFF, RIT_VG_VSP_TTA, RIT_VG_VSP_DS, RIT_VG_VSP_DFF, RIT_VG_VSP_DFS, RIT_VG_VSP_DC, RIT_VG_VSP_NBgC, RIT_VG_VSP_NHBgC, RIT_VG_VSP_NBC, RIT_VG_VSP_I, RIT_VG_VSP_NCols, RIT_VG_VSP_NSpac, RIT_VG_VSP_NHei, RIT_VG_VSP_THC, RIT_VG_VSP_DHC, RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $RIT_VG_VSP_W, $RIT_VG_VSP_IW, $RIT_VG_VSP_H, $RIT_VG_VSP_AP, $RIT_VG_VSP_APS, $RIT_VG_VSP_Ar, $RIT_VG_VSP_ArS, $RIT_VG_VSP_PT, $RIT_VG_VSP_CS, $RIT_VG_VSP_BgC, $RIT_VG_VSP_BSC, $RIT_VG_VSP_BW, $RIT_VG_VSP_BS, $RIT_VG_VSP_BC, $RIT_VG_VSP_TFS, $RIT_VG_VSP_TC, $RIT_VG_VSP_TFF, $RIT_VG_VSP_TTA, $RIT_VG_VSP_DS, $RIT_VG_VSP_DFF, $RIT_VG_VSP_DFS, $RIT_VG_VSP_DC, $RIT_VG_VSP_NBgC, $RIT_VG_VSP_NHBgC, $RIT_VG_VSP_NBC, $RIT_VG_VSP_I, $RIT_VG_VSP_NCols, $RIT_VG_VSP_NSpac, $RIT_VG_VSP_NHei, $RIT_VG_VSP_THC, $RIT_VG_VSP_THC, $RIT_VGallery_IN[0]->id));
		}
		else if($RIT_VGallery_ET=='3D Gallery')
		{			 			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, RIT_VG_3D_Deg, RIT_VG_3D_SW, RIT_VG_3D_SH, RIT_VG_3D_BW, RIT_VG_3D_BS, RIT_VG_3D_BC, RIT_VG_3D_BR, RIT_VG_3D_BSC, RIT_VG_3D_ST, RIT_VG_3D_TC, RIT_VG_3D_TFS, RIT_VG_3D_TBgC, RIT_VG_3D_TFF, RIT_VG_3D_TO, RIT_VG_3D_TTA, RIT_VG_3D_TTSC, RIT_VG_3D_TBW, RIT_VG_3D_TBS, RIT_VG_3D_TBC, RIT_VG_3D_TBR, RIT_VG_3D_Icon, RIT_VG_3D_IS, RIT_VG_3D_IHC, RIT_VG_3D_IC, RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $RIT_VG_3D_Deg, $RIT_VG_3D_SW, $RIT_VG_3D_SH, $RIT_VG_3D_BW, $RIT_VG_3D_BS, $RIT_VG_3D_BC, $RIT_VG_3D_BR, $RIT_VG_3D_BSC, $RIT_VG_3D_ST, $RIT_VG_3D_TC, $RIT_VG_3D_TFS, $RIT_VG_3D_TBgC, $RIT_VG_3D_TFF, $RIT_VG_3D_TO, $RIT_VG_3D_TTA, $RIT_VG_3D_TTSC, $RIT_VG_3D_TBW, $RIT_VG_3D_TBS, $RIT_VG_3D_TBC, $RIT_VG_3D_TBR, $RIT_VG_3D_Icon, $RIT_VG_3D_IS, $RIT_VG_3D_IHC, $RIT_VG_3D_IC, $RIT_VGallery_IN[0]->id));
		}
		else if($RIT_VGallery_ET=='Gallery Hover Effects')
		{			 			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, RIT_VG_GHE_IW, RIT_VG_GHE_IH, RIT_VG_GHE_IHW, RIT_VG_GHE_IBW, RIT_VG_GHE_IBS, RIT_VG_GHE_IBC, RIT_VG_GHE_IBSC, RIT_VG_GHE_IPB, RIT_VG_GHE_IHB1, RIT_VG_GHE_IHB2, RIT_VG_GHE_IO1, RIT_VG_GHE_IO2, RIT_VG_GHE_Icon, RIT_VG_GHE_IS, RIT_VG_GHE_IC, RIT_VG_GHE_PVW, RIT_VG_GHE_PVH, RIT_VG_GHE_PBSC, RIT_VG_GHE_PIcon, RIT_VG_GHE_PIS, RIT_VG_GHE_PIC, RIT_VG_GHE_PFS, RIT_VG_GHE_PC, RIT_VG_GHE_PIFS, RIT_VG_GHE_PICol, RIT_VG_GHE_PIP, RIT_VG_GHE_HE, RIT_VG_GHE_BW, RIT_VG_GHE_E2H,  RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $RIT_VG_GHE_IW, $RIT_VG_GHE_IH, $RIT_VG_GHE_IHW, $RIT_VG_GHE_IBW, $RIT_VG_GHE_IBS, $RIT_VG_GHE_IBC, $RIT_VG_GHE_IBSC, $RIT_VG_GHE_IPB, $RIT_VG_GHE_IHB1, $RIT_VG_GHE_IHB2, $RIT_VG_GHE_IO1, $RIT_VG_GHE_IO2, $RIT_VG_GHE_Icon, $RIT_VG_GHE_IS, $RIT_VG_GHE_IC, $RIT_VG_GHE_PVW, $RIT_VG_GHE_PVH, $RIT_VG_GHE_PBSC, $RIT_VG_GHE_PIcon, $RIT_VG_GHE_PIS, $RIT_VG_GHE_PIC, $RIT_VG_GHE_PFS, $RIT_VG_GHE_PC, $RIT_VG_GHE_PIFS, $RIT_VG_GHE_PICol, $RIT_VG_GHE_PIP, $RIT_VG_GHE_HE, $RIT_VG_GHE_BW, $RIT_VG_GHE_E2H, $RIT_VGallery_IN[0]->id));
		}
	}
	else if(isset($_POST['RIT_Video_Gallery_Prop_Update']))
	{
		$RIT_VGallery_EN=sanitize_text_field($_POST['RIT_VGallery_EN']);
		$RIT_VGallery_Hidden_EN=sanitize_text_field($_POST['RIT_VGallery_Hidden_EN']);
		$RIT_VGallery_EN_Count=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));

		$RITVGcount=0;
		if($RIT_VGallery_EN!=$RIT_VGallery_Hidden_EN)
		{
			for($i=0;$i<count($RIT_VGallery_EN_Count);$i++)
			{
				$RIT_VGallery_EN_split=explode(' (', $RIT_VGallery_EN_Count[$i]->rit_effect_name);
				if($RIT_VGallery_EN_split[0]==$RIT_VGallery_EN)
				{
					$RITVGcount++;
				}
			}
		}

		if($RITVGcount==0)
		{
			$RIT_VGallery_EN=$RIT_VGallery_EN;
		}
		else
		{
			$RIT_VGallery_EN=$RIT_VGallery_EN .' ('. $RITVGcount .')';
		}

		$RIT_VGallery_ET=sanitize_text_field($_POST['RIT_VGallery_ET']);
		$RIT_VGallery_Hidden_ID=sanitize_text_field($_POST['RIT_VGallery_Hidden_ID']);

		$wpdb->query($wpdb->prepare("UPDATE $table_name3 set rit_effect_name=%s, rit_effect_type=%s WHERE id=%d", $RIT_VGallery_EN, $RIT_VGallery_ET, $RIT_VGallery_Hidden_ID));

		if($RIT_VGallery_ET=='Video Slider Playlist')
		{
			$wpdb->query($wpdb->prepare("UPDATE $table_name7 set RIT_VG_VSP_W=%s, RIT_VG_VSP_IW=%s, RIT_VG_VSP_H=%s, RIT_VG_VSP_AP=%s, RIT_VG_VSP_APS=%s, RIT_VG_VSP_Ar=%s, RIT_VG_VSP_ArS=%s, RIT_VG_VSP_PT=%s, RIT_VG_VSP_CS=%s, RIT_VG_VSP_BgC=%s, RIT_VG_VSP_BSC=%s, RIT_VG_VSP_BW=%s, RIT_VG_VSP_BS=%s, RIT_VG_VSP_BC=%s, RIT_VG_VSP_TFS=%s, RIT_VG_VSP_TC=%s, RIT_VG_VSP_TFF=%s, RIT_VG_VSP_TTA=%s, RIT_VG_VSP_DS=%s, RIT_VG_VSP_DFF=%s, RIT_VG_VSP_DFS=%s, RIT_VG_VSP_DC=%s, RIT_VG_VSP_NBgC=%s, RIT_VG_VSP_NHBgC=%s, RIT_VG_VSP_NBC=%s, RIT_VG_VSP_I=%s, RIT_VG_VSP_NCols=%s, RIT_VG_VSP_NSpac=%s, RIT_VG_VSP_NHei=%s, RIT_VG_VSP_THC=%s, RIT_VG_VSP_DHC=%s WHERE RIT_VGallery_TN_ID=%d", $RIT_VG_VSP_W, $RIT_VG_VSP_IW, $RIT_VG_VSP_H, $RIT_VG_VSP_AP, $RIT_VG_VSP_APS, $RIT_VG_VSP_Ar, $RIT_VG_VSP_ArS, $RIT_VG_VSP_PT, $RIT_VG_VSP_CS, $RIT_VG_VSP_BgC, $RIT_VG_VSP_BSC, $RIT_VG_VSP_BW, $RIT_VG_VSP_BS, $RIT_VG_VSP_BC, $RIT_VG_VSP_TFS, $RIT_VG_VSP_TC, $RIT_VG_VSP_TFF, $RIT_VG_VSP_TTA, $RIT_VG_VSP_DS, $RIT_VG_VSP_DFF, $RIT_VG_VSP_DFS, $RIT_VG_VSP_DC, $RIT_VG_VSP_NBgC, $RIT_VG_VSP_NHBgC, $RIT_VG_VSP_NBC, $RIT_VG_VSP_I, $RIT_VG_VSP_NCols, $RIT_VG_VSP_NSpac, $RIT_VG_VSP_NHei, $RIT_VG_VSP_THC, $RIT_VG_VSP_DHC, $RIT_VGallery_Hidden_ID));
		}	
		else if($RIT_VGallery_ET=='3D Gallery')
		{
			$wpdb->query($wpdb->prepare("UPDATE $table_name8 set RIT_VG_3D_Deg=%s, RIT_VG_3D_SW=%s, RIT_VG_3D_SH=%s, RIT_VG_3D_BW=%s, RIT_VG_3D_BS=%s, RIT_VG_3D_BC=%s, RIT_VG_3D_BR=%s, RIT_VG_3D_BSC=%s, RIT_VG_3D_ST=%s, RIT_VG_3D_TC=%s, RIT_VG_3D_TFS=%s, RIT_VG_3D_TBgC=%s, RIT_VG_3D_TFF=%s, RIT_VG_3D_TO=%s, RIT_VG_3D_TTA=%s, RIT_VG_3D_TTSC=%s, RIT_VG_3D_TBW=%s, RIT_VG_3D_TBS=%s, RIT_VG_3D_TBC=%s, RIT_VG_3D_TBR=%s, RIT_VG_3D_Icon=%s, RIT_VG_3D_IS=%s, RIT_VG_3D_IHC=%s, RIT_VG_3D_IC=%s WHERE RIT_VGallery_TN_ID=%d", $RIT_VG_3D_Deg, $RIT_VG_3D_SW, $RIT_VG_3D_SH, $RIT_VG_3D_BW, $RIT_VG_3D_BS, $RIT_VG_3D_BC, $RIT_VG_3D_BR, $RIT_VG_3D_BSC, $RIT_VG_3D_ST, $RIT_VG_3D_TC, $RIT_VG_3D_TFS, $RIT_VG_3D_TBgC, $RIT_VG_3D_TFF, $RIT_VG_3D_TO, $RIT_VG_3D_TTA, $RIT_VG_3D_TTSC, $RIT_VG_3D_TBW, $RIT_VG_3D_TBS, $RIT_VG_3D_TBC, $RIT_VG_3D_TBR, $RIT_VG_3D_Icon, $RIT_VG_3D_IS, $RIT_VG_3D_IHC, $RIT_VG_3D_IC, $RIT_VGallery_Hidden_ID));
		}
		else if($RIT_VGallery_ET=='Gallery Hover Effects')
		{	
			$wpdb->query($wpdb->prepare("UPDATE $table_name9 set RIT_VG_GHE_IW=%s, RIT_VG_GHE_IH=%s, RIT_VG_GHE_IHW=%s, RIT_VG_GHE_IBW=%s, RIT_VG_GHE_IBS=%s, RIT_VG_GHE_IBC=%s, RIT_VG_GHE_IBSC=%s, RIT_VG_GHE_IPB=%s, RIT_VG_GHE_IHB1=%s, RIT_VG_GHE_IHB2=%s, RIT_VG_GHE_IO1=%s, RIT_VG_GHE_IO2=%s, RIT_VG_GHE_Icon=%s, RIT_VG_GHE_IS=%s, RIT_VG_GHE_IC=%s, RIT_VG_GHE_PVW=%s, RIT_VG_GHE_PVH=%s, RIT_VG_GHE_PBSC=%s, RIT_VG_GHE_PIcon=%s, RIT_VG_GHE_PIS=%s, RIT_VG_GHE_PIC=%s, RIT_VG_GHE_PFS=%s, RIT_VG_GHE_PC=%s, RIT_VG_GHE_PIFS=%s, RIT_VG_GHE_PICol=%s, RIT_VG_GHE_PIP=%s, RIT_VG_GHE_HE=%s, RIT_VG_GHE_BW=%s, RIT_VG_GHE_E2H=%s WHERE RIT_VGallery_TN_ID=%d",  $RIT_VG_GHE_IW, $RIT_VG_GHE_IH, $RIT_VG_GHE_IHW, $RIT_VG_GHE_IBW, $RIT_VG_GHE_IBS, $RIT_VG_GHE_IBC, $RIT_VG_GHE_IBSC, $RIT_VG_GHE_IPB, $RIT_VG_GHE_IHB1, $RIT_VG_GHE_IHB2, $RIT_VG_GHE_IO1, $RIT_VG_GHE_IO2, $RIT_VG_GHE_Icon, $RIT_VG_GHE_IS, $RIT_VG_GHE_IC, $RIT_VG_GHE_PVW, $RIT_VG_GHE_PVH, $RIT_VG_GHE_PBSC, $RIT_VG_GHE_PIcon, $RIT_VG_GHE_PIS, $RIT_VG_GHE_PIC, $RIT_VG_GHE_PFS, $RIT_VG_GHE_PC, $RIT_VG_GHE_PIFS, $RIT_VG_GHE_PICol, $RIT_VG_GHE_PIP, $RIT_VG_GHE_HE, $RIT_VG_GHE_BW, $RIT_VG_GHE_E2H, $RIT_VGallery_Hidden_ID));
		}	
	}

	$RIT_Video_Gallery_Fonts  =$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d",0));
	$RIT_Video_Gallery_Effect4=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE id > %d",0));
	$RIT_Video_Gallery_Effect5=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE id > %d",0));
	$RIT_Video_Gallery_Effect6=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE id > %d",0));

	if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_AP=='true')
	{
		$RIT_Video_Gallery_Checked4="checked";
	}
	if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_Ar=='Yes')
	{
		$RIT_Video_Gallery_Checked5="checked";
	}
	if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DS=='Yes')
	{
		$RIT_Video_Gallery_Checked6="checked";
	}	
	if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_ST=='Yes')
	{
		$RIT_Video_Gallery_Checked7="checked";
	}

	$RIT_VGallery_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id > %d",0));
?>	
<form method='POST' id='form_popup_for_video' oninput="RIT_VG_VSP_W_Output.value=parseFloat(RIT_VG_VSP_W.value)+'px';
		RIT_VG_VSP_H_Output.value=parseFloat(RIT_VG_VSP_H.value)+'px';
		RIT_VG_VSP_APS_Output.value=parseFloat(RIT_VG_VSP_APS.value);
		RIT_VG_VSP_ArS_Output.value=parseFloat(RIT_VG_VSP_ArS.value);
		RIT_VG_VSP_PT_Output.value=parseFloat(RIT_VG_VSP_PT.value)+'s';
		RIT_VG_VSP_CS_Output.value=parseFloat(RIT_VG_VSP_CS.value)+'s';
		RIT_VG_VSP_BW_Output.value=parseFloat(RIT_VG_VSP_BW.value)+'px';
		RIT_VG_VSP_TFS_Output.value=parseFloat(RIT_VG_VSP_TFS.value)+'px';
		RIT_VG_VSP_DFS_Output.value=parseFloat(RIT_VG_VSP_DFS.value)+'px';
		RIT_VG_VSP_NCols_Output.value=parseFloat(RIT_VG_VSP_NCols.value);
		RIT_VG_VSP_NSpac_Output.value=parseFloat(RIT_VG_VSP_NSpac.value)+'px';
		RIT_VG_VSP_NHei_Output.value=parseFloat(RIT_VG_VSP_NHei.value)+'px';
		RIT_VG_3D_Deg_Output.value=parseInt(RIT_VG_3D_Deg.value)+'deg';
		RIT_VG_3D_SW_Output.value=parseInt(RIT_VG_3D_SW.value)+'px';
		RIT_VG_3D_SH_Output.value=parseInt(RIT_VG_3D_SH.value)+'px';
		RIT_VG_3D_BW_Output.value=parseInt(RIT_VG_3D_BW.value)+'px';
		RIT_VG_3D_BR_Output.value=parseInt(RIT_VG_3D_BR.value)+'%';
		RIT_VG_3D_TFS_Output.value=parseInt(RIT_VG_3D_TFS.value)+'px';
		RIT_VG_3D_TO_Output.value=parseInt(RIT_VG_3D_TO.value)+'%';
		RIT_VG_3D_TBW_Output.value=parseInt(RIT_VG_3D_TBW.value)+'px';
		RIT_VG_3D_TBR_Output.value=parseInt(RIT_VG_3D_TBR.value)+'%';
		RIT_VG_3D_IS_Output.value=parseInt(RIT_VG_3D_IS.value)+'px';
		RIT_VG_GHE_IW_Output.value=parseInt(RIT_VG_GHE_IW.value)+'px';
		RIT_VG_GHE_IH_Output.value=parseInt(RIT_VG_GHE_IH.value)+'px';
		RIT_VG_GHE_IBW_Output.value=parseInt(RIT_VG_GHE_IBW.value)+'px';
		RIT_VG_GHE_IPB_Output.value=parseInt(RIT_VG_GHE_IPB.value)+'px';
		RIT_VG_GHE_IO1_Output.value=parseInt(RIT_VG_GHE_IO1.value)+'%';
		RIT_VG_GHE_IS_Output.value=parseInt(RIT_VG_GHE_IS.value)+'px';
		RIT_VG_GHE_PVW_Output.value=parseInt(RIT_VG_GHE_PVW.value)+'px';
		RIT_VG_GHE_PVH_Output.value=parseInt(RIT_VG_GHE_PVH.value)+'px';
		RIT_VG_GHE_PIS_Output.value=parseInt(RIT_VG_GHE_PIS.value)+'px';
		RIT_VG_GHE_PFS_Output.value=parseInt(RIT_VG_GHE_PFS.value)+'px';
		RIT_VG_GHE_PIFS_Output.value=parseInt(RIT_VG_GHE_PIFS.value)+'px';">
	<div class="RIT_Video_Gallery_Prop_Div_Main">
		<a href="http://robo-it.esy.es/" target="_blank" title="Click to Visit"><img src="<?php echo plugins_url('/Images/Robo-IT-Logo.png',__FILE__);?>" class="RIT_Logo_Orange"></a>
		
		<div class="RIT_VGallery_Main_Div1">
			<span class="RIT_VGallery_Title_Span">Effect Title:</span> 
			<input type="text"   class="RIT_VGallery_search_text" id="RIT_VGallery_search_text1" onclick="RIT_VGallery_Search()" placeholder="Search">
			<input type="button" class="RIT_VGallery_Reset_text" value="Reset" onclick="RIT_VGallery_Reset()">
			<span class="RIT_VGallery_not" id="RIT_VGallery_not1"></span>
			<input type="button" class="RIT_VGallery_Add_Button" value="Create Effect" onclick="RIT_VGallery_Add_Effect(<?php echo $RIT_VGallery_Effects[0]->id;?>)">
		</div>

		<div class="RIT_VGallery_Main_Div2">
			<label class="RIT_Video_Gallery_Setting_Video_Title_Label">Selected Gallery Type:</label>
			<span id='RIT_Video_Gallery_Setting_Video_Title'>Video Gallery/Content-Popup</span>

			<input type="text" style="display: none;" name="RIT_VG_VSP_I" id="RIT_VG_VSP_Icon" value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I;?>">			
			<input type="text" style="display: none;" name="RIT_VG_3D_Icon" id="RIT_VG_3D_Icon" value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon;?>">

			<input type="text" style="display: none;" name="RIT_VG_GHE_Icon" id="RIT_VG_GHE_Icon" value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_Icon;?>">			
			<input type="text" style="display: none;" name="RIT_VG_GHE_PIcon" id="RIT_VG_GHE_PIcon" value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIcon;?>">			
			<input type="text" style="display: none;" name="RIT_VGallery_Hidden_ID" id="RIT_VGallery_Hidden_ID" value="">
			<input type="text" style="display: none;" name="RIT_VGallery_Hidden_EN" id="RIT_VGallery_Hidden_EN" value="">

			<input type="button" class="RIT_Video_Gallery_Prop_Save" value="Back" onclick="RIT_VGallery_Cancel()">
			<input type="submit" name="RIT_Video_Gallery_Prop_Save"  id="RIT_VGE_Save" class="RIT_Video_Gallery_Prop_Save" value="Save">
			<input type="submit" name="RIT_Video_Gallery_Prop_Update" id="RIT_VGE_Update" class="RIT_Video_Gallery_Prop_Save" value="Update">
		</div>
	</div>
	<table class="RIT_VGallery_Main_Table">
		<tr class="RIT_VGallery_first_row">
			<td class='RIT_VGallery_main_id_item'><B><I>No</I></B></td>
			<td class='RIT_VGallery_main_title_item'><B><I>Effect Name</I></B></td>
			<td class='RIT_VGallery_main_effect_item'><B><I>Effect Type</I></B></td>
			<td class='RIT_VGallery_main_actions_item'><B><I>Actions</I></B></td>
		</tr>
	</table>
	<table class='RIT_VGallery_Effect_Table'>
		<?php for($i=0;$i<count($RIT_VGallery_Effects);$i++) {
			if($i<3){
				?>
				<tr>
					<td class='RIT_VGallery_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='RIT_VGallery_title_item'><B><I><?php echo $RIT_VGallery_Effects[$i]->rit_effect_name;?></I></B></td>
					<td class='RIT_VGallery_effect_item'><B><I><?php echo $RIT_VGallery_Effects[$i]->rit_effect_type;?></I></B></td>
					<td class='RIT_VGallery_edit_item' onclick="Edit_RITVGallery_Effect(<?php echo $RIT_VGallery_Effects[$i]->id;?>)"><B><I>Edit</I></B></td>
					<td><B><I>Delete</I></B></td>
				</tr>
			<?php } else{?>
				<tr>
					<td class='RIT_VGallery_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='RIT_VGallery_title_item'><B><I><?php echo $RIT_VGallery_Effects[$i]->rit_effect_name;?></I></B></td>
					<td class='RIT_VGallery_effect_item'><B><I><?php echo $RIT_VGallery_Effects[$i]->rit_effect_type;?></I></B></td>
					<td class='RIT_VGallery_edit_item' onclick="Edit_RITVGallery_Effect(<?php echo $RIT_VGallery_Effects[$i]->id;?>)"><B><I>Edit</I></B></td>
					<td class='RIT_VGallery_delete_item' onclick="Delete_RITVGallery_Effect(<?php echo $RIT_VGallery_Effects[$i]->id;?>)"><B><I>Delete</I></B></td>
				</tr>			
		<?php }}?>
	</table>
	<table class='RIT_VGallery_Effect_Table1'></table>
	<fieldset class="RIT_VGallery_Main_Fieldset1">
		<table class="RIT_VGallery_Table_Type">
			<tr>
				<td>Effect Name</td>
				<td>Effect Type</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="RIT_VGallery_EN" name="RIT_VGallery_EN" id="RIT_VGallery_EN" placeholder="* Required" required>
				</td>
				<td>
					<select class="RIT_VGallery_EN" name="RIT_VGallery_ET" id="RIT_VGallery_ET" onchange="RIT_Video_Gallery_Buttons_Clicked()">
						<option value="Video Slider Playlist">Video Slider Playlist</option>
						<option value="3D Gallery">3D Gallery</option>
						<option value="Gallery Hover Effects">Gallery Hover Effects</option>
					</select>
				</td>
			</tr>			
		</table>
	</fieldset>
	<fieldset class="RIT_Video_Gallery_Main_Fieldset" id="RIT_Video_Gallery_Main_Fieldset_4">
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">General Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Width:</td>
					<td><input type="range" id='RIT_VG_VSP_W' name="RIT_VG_VSP_W" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_W)[0];?>" min='400' max='1200' step='1'><output name="RIT_VG_VSP_W_Output" id="RIT_VG_VSP_W_Output" for="RIT_VG_VSP_W"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_W;?></output></td>
					<td>Height:</td>
					<td><input type="range" id='RIT_VG_VSP_H' name="RIT_VG_VSP_H" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_H)[0];?>" min='200' max='800' step='1'><output name="RIT_VG_VSP_H_Output" id="RIT_VG_VSP_H_Output" for="RIT_VG_VSP_H"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_H;?></output></td>
				</tr>	
				<tr>
					<td>AutoPlay:</td>
					<td>
						<div class="onoffswitch">
						    <input type="checkbox" name="RIT_VG_VSP_AP" class="onoffswitch-checkbox" id="RIT_VG_VSP_AP" <?php echo $RIT_Video_Gallery_Checked4;?>>
						    <label class="onoffswitch-label" for="RIT_VG_VSP_AP">
						        <span class="onoffswitch-inner"></span>
						        <span class="onoffswitch-switch"></span>
						    </label>
						</div>
					</td>
					<td>AutoPlay Steps:</td>
					<td><input type="range" id='RIT_VG_VSP_APS' name="RIT_VG_VSP_APS" value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_APS;?>" min='1' max='5' step='1'><output name="RIT_VG_VSP_APS_Output" id="RIT_VG_VSP_APS_Output" for="RIT_VG_VSP_APS"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_APS;?></output></td>
				</tr>
				<tr>
					<td>Arrows:</td>
					<td>
						<div class="onoffswitch">
						    <input type="checkbox" name="RIT_VG_VSP_Ar" class="onoffswitch-checkbox" id="RIT_VG_VSP_Ar" <?php echo $RIT_Video_Gallery_Checked5;?>>
						    <label class="onoffswitch-label" for="RIT_VG_VSP_Ar">
						        <span class="onoffswitch-inner"></span>
						        <span class="onoffswitch-switch"></span>
						    </label>
						</div>
					</td>
					<td>Arrows Steps:</td>
					<td><input type="range" id='RIT_VG_VSP_ArS' name="RIT_VG_VSP_ArS" value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_ArS;?>" min='1' max='5' step='1'><output name="RIT_VG_VSP_ArS_Output" id="RIT_VG_VSP_ArS_Output" for="RIT_VG_VSP_ArS"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_ArS;?></output></td>
				</tr>
				<tr>
					<td>Pause Time:</td>
					<td><input type="range" id='RIT_VG_VSP_PT' name="RIT_VG_VSP_PT" value="<?php echo split('s',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_PT)[0];?>" min='0' max='10' step='0.1'>
						<output name="RIT_VG_VSP_PT_Output" id="RIT_VG_VSP_PT_Output" for="RIT_VG_VSP_PT"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_PT;?></output></td>
					<td>Change Speed:</td>
					<td><input type="range" id='RIT_VG_VSP_CS' name="RIT_VG_VSP_CS" value="<?php echo split('s',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_CS)[0];?>" min='0' max='10' step='0.1'>
						<output name="RIT_VG_VSP_CS_Output" id="RIT_VG_VSP_CS_Output" for="RIT_VG_VSP_CS"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_CS;?></output></td>
				</tr>
				<tr>
					<td>Background Color:</td>
					<td><input type='text' id='RIT_VG_VSP_BgC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_BgC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BgC;?>"></td>
					<td>Box Shadow Color:</td>
					<td><input type='text' id='RIT_VG_VSP_BSC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_BSC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BSC;?>"></td>
				</tr>	
				<tr>
					<td>Border Width:</td>
					<td><input type="range" id='RIT_VG_VSP_BW' name="RIT_VG_VSP_BW" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BW)[0];?>" min='0' max='10' step='1'><output name="RIT_VG_VSP_BW_Output" id="RIT_VG_VSP_BW_Output" for="RIT_VG_VSP_BW"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BW;?></output></td>
					<td>Border Style:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_VSP_BS' name='RIT_VG_VSP_BS'>
							<option value='none'   <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BS=='none') {echo 'selected';}?>>   None    </option>
				 			<option value='dotted' <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BS=='dotted'){echo 'selected';}?>>  Dotted  </option>
				 			<option value='dashed' <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BS=='dashed'){echo 'selected';}?>>  Dashed  </option>
				 			<option value='solid'  <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BS=='solid') {echo 'selected';}?>>  Solid   </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type='text' id='RIT_VG_VSP_BC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_BC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_BC;?>"></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Title Style</legend>
			<table class="RIT_VG_MenuTable">	
				<tr>
					<td>Font Size:</td>
					<td><input type="range" id='RIT_VG_VSP_TFS' name="RIT_VG_VSP_TFS" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TFS)[0];?>" min='8' max='36' step='1'><output name="RIT_VG_VSP_TFS_Output" id="RIT_VG_VSP_TFS_Output" for="RIT_VG_VSP_TFS"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TFS;?></output></td>
					<td>Color:</td>
					<td><input type='text' id='RIT_VG_VSP_TC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_TC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TC;?>"></td>
				</tr>				
				<tr>
					<td>Font Family:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_VSP_TFF' name='RIT_VG_VSP_TFF' >
							<?php foreach ($RIT_Video_Gallery_Fonts as $Font_Family) :?>
								<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TFF==$Font_Family->Font_family) {?>
									<option value='<?php echo $Font_Family->Font_family?>' selected="select"><?php echo $Font_Family->Font_family ?></option>
								<?php }else{?><option value='<?php echo $Font_Family->Font_family?>'><?php echo $Font_Family->Font_family ?></option>
							<?php } endforeach ?>
						</select>
					</td>
					<td>Position:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_VSP_TTA' name='RIT_VG_VSP_TTA'>
							<option value="Center" <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TTA=='Center'){echo 'selected';}?>>  Center  </option>
							<option value="Left"   <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TTA=='Left'){echo 'selected';}?>>    Left    </option>
							<option value="Right"  <?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_TTA=='Right'){echo 'selected';}?>>   Right   </option>
						</select>
					</td>										
				</tr>
				<tr>
					<td>Hover Color:</td>
					<td><input type='text' id='RIT_VG_VSP_THC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_THC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_THC;?>"></td>
					<td></td>
					<td></td>
				</tr>	
			</table>
		</fieldset>
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Desrciption Style</legend>
			<table class="RIT_VG_MenuTable">	
				<tr>
					<td>Show:</td>
					<td>
						<div class="onoffswitch">
						    <input type="checkbox" name="RIT_VG_VSP_DS" class="onoffswitch-checkbox" id="RIT_VG_VSP_DS" <?php echo $RIT_Video_Gallery_Checked6;?>>
						    <label class="onoffswitch-label" for="RIT_VG_VSP_DS">
						        <span class="onoffswitch-inner"></span>
						        <span class="onoffswitch-switch"></span>
						    </label>
						</div>
					</td>
					<td>Font Family:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_VSP_DFF' name='RIT_VG_VSP_DFF' >
							<?php foreach ($RIT_Video_Gallery_Fonts as $Font_Family) :?>
								<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DFF==$Font_Family->Font_family) {?>
									<option value='<?php echo $Font_Family->Font_family;?>' selected="select"><?php echo $Font_Family->Font_family ?></option>
								<?php }else{?><option value='<?php echo $Font_Family->Font_family;?>'><?php echo $Font_Family->Font_family ?></option>
							<?php } endforeach ?>
						</select>
					</td>					
				</tr>
				<tr>
					<td>Font Size:</td>
					<td><input type="range" id='RIT_VG_VSP_DFS' name="RIT_VG_VSP_DFS" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DFS)[0];?>" min='8' max='36' step='1'><output name="RIT_VG_VSP_DFS_Output" id="RIT_VG_VSP_DFS_Output" for="RIT_VG_VSP_DFS"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DFS;?></output></td>
					<td>Color:</td>
					<td><input type='text' id='RIT_VG_VSP_DC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_DC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DC;?>"></td>
				</tr>	
				<tr>
					<td>Hover Color:</td>
					<td><input type='text' id='RIT_VG_VSP_DHC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_DHC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_DHC;?>"></td>
					<td></td>
					<td></td>
				</tr>				
			</table>
		</fieldset>
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Navigator Style</legend>
			<table class="RIT_VG_MenuTable">	
				<tr>
					<td>Background Color:</td>
					<td><input type='text' id='RIT_VG_VSP_NBgC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_NBgC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NBgC;?>"></td>
					<td>Hover Background Color:</td>
					<td><input type='text' id='RIT_VG_VSP_NHBgC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_NHBgC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NHBgC;?>"></td>	
				</tr>
				<tr>					
					<td>Border Color:</td>
					<td><input type='text' id='RIT_VG_VSP_NBC' class='RIT_Video_Gallery_Color' name='RIT_VG_VSP_NBC' value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NBC;?>"></td>
					<td>Cols</td>
					<td><input type="range" id='RIT_VG_VSP_NCols' name="RIT_VG_VSP_NCols" value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NCols;?>" min='2' max='12' step='1'><output name="RIT_VG_VSP_NCols_Output" id="RIT_VG_VSP_NCols_Output" for="RIT_VG_VSP_NCols"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NCols;?></output></td>
				</tr>		
				<tr>					
					<td>Spacing:</td>
					<td><input type="range" id='RIT_VG_VSP_NSpac' name="RIT_VG_VSP_NSpac" value="<?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NSpac;?>" min='0' max='15' step='1'><output name="RIT_VG_VSP_NSpac_Output" id="RIT_VG_VSP_NSpac_Output" for="RIT_VG_VSP_NSpac"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NSpac . 'px';?></output></td>
					<td>Height</td>
					<td><input type="range" id='RIT_VG_VSP_NHei' name="RIT_VG_VSP_NHei" value="<?php echo split('px',$RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NHei)[0];?>" min='69' max='200' step='1'><output name="RIT_VG_VSP_NHei_Output" id="RIT_VG_VSP_NHei_Output" for="RIT_VG_VSP_NHei"><?php echo $RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_NHei;?></output></td>
				</tr>			
			</table>
		</fieldset>		
		<fieldset class='RIT_Video_Gallery_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Choose Arrows</legend>
			<table class="RIT_Video_Gallery_Table1">	
				<tr>
					<td style="text-align:center;" onclick="RIT_VG_VSP_I(1)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_1" src="<?php echo plugins_url('/Images/Slider/slider-left-right-1.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==1){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(2)"> 
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_2" src="<?php echo plugins_url('/Images/Slider/slider-left-right-2.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==2){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(3)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_3" src="<?php echo plugins_url('/Images/Slider/slider-left-right-3.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==3){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
				<tr>
					<td style="text-align:center;" onclick="RIT_VG_VSP_I(4)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_4" src="<?php echo plugins_url('/Images/Slider/slider-left-right-4.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==4){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(5)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_5" src="<?php echo plugins_url('/Images/Slider/slider-left-right-5.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==5){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(6)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_6" src="<?php echo plugins_url('/Images/Slider/slider-left-right-6.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==6){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
				<tr>
					<td style="text-align:center;" onclick="RIT_VG_VSP_I(7)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_7" src="<?php echo plugins_url('/Images/Slider/slider-left-right-7.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==7){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(8)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_8" src="<?php echo plugins_url('/Images/Slider/slider-left-right-8.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==8){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(9)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_9" src="<?php echo plugins_url('/Images/Slider/slider-left-right-9.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==9){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>		
				<tr>
					<td style="text-align:center;" onclick="RIT_VG_VSP_I(10)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_10" src="<?php echo plugins_url('/Images/Slider/slider-left-right-10.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==10){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(11)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_11" src="<?php echo plugins_url('/Images/Slider/slider-left-right-11.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==11){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_VG_VSP_I(12)">
						<img class="RIT_VG_VSP_Icon" id="RIT_VG_VSP_Icon_12" src="<?php echo plugins_url('/Images/Slider/slider-left-right-12.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect4[0]->RIT_VG_VSP_I==12){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>			
			</table>
		</fieldset>
	</fieldset>
	<fieldset class="RIT_Video_Gallery_Main_Fieldset" id="RIT_Video_Gallery_Main_Fieldset_5">
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Slider Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Slide Width:</td>
					<td>
						<input type="range" id='RIT_VG_3D_SW' name="RIT_VG_3D_SW" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_SW)[0];?>" min='200' max='1500' step='1'>
						<output name="RIT_VG_3D_SW_Output" id="RIT_VG_3D_SW_Output" for="RIT_VG_3D_SW"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_SW;?></output>
					</td>
					<td>Slide Height:</td>
					<td>
						<input type="range" id='RIT_VG_3D_SH' name="RIT_VG_3D_SH" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_SH)[0];?>" min='200' max='1500' step='1'>
						<output name="RIT_VG_3D_SH_Output" id="RIT_VG_3D_SH_Output" for="RIT_VG_3D_SH"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_SH;?></output>
					</td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td>
						<input type="range" id='RIT_VG_3D_BW' name="RIT_VG_3D_BW" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BW)[0];?>" min='0' max='10' step='1'>
						<output name="RIT_VG_3D_BW_Output" id="RIT_VG_3D_BW_Output" for="RIT_VG_3D_BW"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BW;?></output>
					</td>
					<td>Border Style:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_3D_BS' name='RIT_VG_3D_BS'>
							<option value='none'   <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BS=='none') {echo 'selected';}?>>   None    </option>
				 			<option value='dotted' <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BS=='dotted'){echo 'selected';}?>>  Dotted  </option>
				 			<option value='dashed' <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BS=='dashed'){echo 'selected';}?>>  Dashed  </option>
				 			<option value='solid'  <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BS=='solid') {echo 'selected';}?>>  Solid   </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type='text' id='RIT_VG_3D_BC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_BC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BC;?>"></td>
					<td>Border Radius:</td>
					<td>
						<input type="range" id='RIT_VG_3D_BR' name="RIT_VG_3D_BR" value="<?php echo split('%',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BR)[0];?>" min='0' max='50' step='1'>
						<output name="RIT_VG_3D_BR_Output" id="RIT_VG_3D_BR_Output" for="RIT_VG_3D_BR"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BR;?></output>
					</td>
				</tr>
				<tr>
					<td>Box Shadow Color:</td>
					<td><input type='text' id='RIT_VG_3D_BSC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_BSC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_BSC;?>"></td>
					<td>Video Position:</td>
					<td><input type="range" id='RIT_VG_3D_Deg' name="RIT_VG_3D_Deg" value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Deg;?>" min='0' max='90' step='1'><output name="RIT_VG_3D_Deg_Output" id="RIT_VG_3D_Deg_Output" for="RIT_VG_3D_Deg"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Deg;?></output></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Video Title Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Show Title:</td>
					<td>
						<div class="onoffswitch">
						    <input type="checkbox" name="RIT_VG_3D_ST" class="onoffswitch-checkbox" id="RIT_VG_3D_ST" <?php echo $RIT_Video_Gallery_Checked7;?>>
						    <label class="onoffswitch-label" for="RIT_VG_3D_ST">
						        <span class="onoffswitch-inner"></span>
						        <span class="onoffswitch-switch"></span>
						    </label>
						</div>
					</td>
					<td>Color:</td>
					<td><input type='text' id='RIT_VG_3D_TC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_TC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TC;?>"></td>
				</tr>
				<tr>
					<td>Font Size:</td>
					<td>
						<input type="range" id='RIT_VG_3D_TFS' name="RIT_VG_3D_TFS" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TFS)[0];?>" min='12' max='36' step='1'>
						<output name="RIT_VG_3D_TFS_Output" id="RIT_VG_3D_TFS_Output" for="RIT_VG_3D_TFS"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TFS;?></output>
					</td>
					<td>Background Color:</td>
					<td><input type='text' id='RIT_VG_3D_TBgC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_TBgC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBgC;?>"></td>
				</tr>
				<tr>
					<td>Font Family:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_3D_TFF' name='RIT_VG_3D_TFF' >
							<?php foreach ($RIT_Video_Gallery_Fonts as $Font_Family) :?>
								<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TFF==$Font_Family->Font_family) {?>
									<option value='<?php echo $Font_Family->Font_family?>' selected="select"><?php echo $Font_Family->Font_family ?></option>
								<?php }else{?><option value='<?php echo $Font_Family->Font_family?>'><?php echo $Font_Family->Font_family ?></option>
							<?php } endforeach ?>
						</select>
					</td>
					<td>Opacity:</td>
					<td>
						<input type="range" id='RIT_VG_3D_TO' name="RIT_VG_3D_TO" value="<?php echo split('%',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TO)[0];?>" min='0' max='100' step='1'>
						<output name="RIT_VG_3D_TO_Output" id="RIT_VG_3D_TO_Output" for="RIT_VG_3D_TO"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TO;?></output>
					</td>
				</tr>
				<tr>
					<td>Text Align:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_3D_TTA' name='RIT_VG_3D_TTA'>
							<option value="Center"  <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TTA=='Center'){echo 'selected';}?>>   Center  </option>
							<option value="Left"    <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TTA=='Left'){echo 'selected';}?>>     Left    </option>
							<option value="Right"   <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TTA=='Right'){echo 'selected';}?>>    Right   </option>
						</select>
					</td>
					<td>Text Shadow Color:</td>
					<td><input type='text' id='RIT_VG_3D_TTSC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_TTSC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TTSC;?>"></td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td>
						<input type="range" id='RIT_VG_3D_TBW' name="RIT_VG_3D_TBW" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBW)[0];?>" min='0' max='10' step='1'>
						<output name="RIT_VG_3D_TBW_Output" id="RIT_VG_3D_TBW_Output" for="RIT_VG_3D_TBW"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBW;?></output>
					</td>
					<td>Border Style:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_3D_TBS' name='RIT_VG_3D_TBS'>
							<option value='none'   <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBS=='none') {echo 'selected';}?>>   None    </option>
				 			<option value='dotted' <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBS=='dotted'){echo 'selected';}?>>  Dotted  </option>
				 			<option value='dashed' <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBS=='dashed'){echo 'selected';}?>>  Dashed  </option>
				 			<option value='solid'  <?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBS=='solid') {echo 'selected';}?>>  Solid   </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type='text' id='RIT_VG_3D_TBC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_TBC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBC;?>"></td>
					<td>Border Radius:</td>
					<td>
						<input type="range" id='RIT_VG_3D_TBR' name="RIT_VG_3D_TBR" value="<?php echo split('%',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBR)[0];?>" min='0' max='50' step='1'>
						<output name="RIT_VG_3D_TBR_Output" id="RIT_VG_3D_TBR_Output" for="RIT_VG_3D_TBR"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_TBR;?></output>
					</td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Arrows Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Size:</td>
					<td>
						<input type="range" id='RIT_VG_3D_IS' name="RIT_VG_3D_IS" value="<?php echo split('px',$RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_IS)[0];?>" min='8' max='72' step='1'>
						<output name="RIT_VG_3D_IS_Output" id="RIT_VG_3D_IS_Output" for="RIT_VG_3D_IS"><?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_IS;?></output>
					</td>
					<td>Color:</td>
					<td><input type='text' id='RIT_VG_3D_IC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_IC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_IC;?>"></td>
				</tr>
				<tr>
					<td>Hover Color:</td>
					<td><input type='text' id='RIT_VG_3D_IHC' class='RIT_Video_Gallery_Color' name='RIT_VG_3D_IHC' value="<?php echo $RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_IHC;?>"></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_Video_Gallery_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Choose Icons for Popup</legend>
			<table class="RIT_Video_Gallery_Table1">	
				<tr>
					<td style="text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(1)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_1" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-1.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==1){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(2)"> 
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_2" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-2.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==2){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(3)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_3" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-3.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==3){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
				<tr>
					<td style="text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(4)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_4" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-4.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==4){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(5)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_5" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-5.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==5){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(6)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_6" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-6.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==6){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
				<tr>
					<td style="text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(7)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_7" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-7.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==7){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(8)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_8" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-8.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==8){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_3D_Select_Icons_Type(9)">
						<img class="RIT_Video_Gallery_3D_Icons" id="RIT_VGallery_3D_Icon_9" src="<?php echo plugins_url('/Images/Thumbnail/thumbnails-video-icon-9.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect5[0]->RIT_VG_3D_Icon==9){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>				
			</table>
		</fieldset>		
	</fieldset>
	<fieldset class="RIT_Video_Gallery_Main_Fieldset" id="RIT_Video_Gallery_Main_Fieldset_6">
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Image Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Width:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IW' name="RIT_VG_GHE_IW" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IW)[0];?>" min='150' max='1500' step='1'>
						<output name="RIT_VG_GHE_IW_Output" id="RIT_VG_GHE_IW_Output" for="RIT_VG_GHE_IW"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IW;?></output>
					</td>
					<td>Height:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IH' name="RIT_VG_GHE_IH" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IH)[0];?>" min='150' max='1500' step='1'>
						<output name="RIT_VG_GHE_IH_Output" id="RIT_VG_GHE_IH_Output" for="RIT_VG_GHE_IH"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IH;?></output>
					</td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IBW' name="RIT_VG_GHE_IBW" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBW)[0];?>" min='0' max='10' step='1'>
						<output name="RIT_VG_GHE_IBW_Output" id="RIT_VG_GHE_IBW_Output" for="RIT_VG_GHE_IBW"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBW;?></output>
					</td>
					<td>Border Style:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_GHE_IBS' name='RIT_VG_GHE_IBS'>
							<option value='none'   <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBS=='none') {echo 'selected';}?>>   None    </option>
				 			<option value='dotted' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBS=='dotted'){echo 'selected';}?>>  Dotted  </option>
				 			<option value='dashed' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBS=='dashed'){echo 'selected';}?>>  Dashed  </option>
				 			<option value='solid'  <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBS=='solid') {echo 'selected';}?>>  Solid   </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type='text' id='RIT_VG_GHE_IBC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_IBC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBC;?>"></td>
					<td>Box Shadow Color:</td>
					<td><input type='text' id='RIT_VG_GHE_IBSC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_IBSC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IBSC;?>"></td>
				</tr>
				<tr>				
					<td>Place Between Videos:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IPB' name="RIT_VG_GHE_IPB" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IPB)[0];?>" min='0' max='30' step='1'>
						<output name="RIT_VG_GHE_IPB_Output" id="RIT_VG_GHE_IPB_Output" for="RIT_VG_GHE_IPB"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IPB;?></output>
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Hover Effect Options</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Effect Type:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_GHE_HE' name='RIT_VG_GHE_HE' onchange="RIT_VG_GHE_HE_Changed()">
							<option value='effect1' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_HE=='effect1'){echo 'selected';}?>>  Effect1  </option>
				 			<option value='effect2' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_HE=='effect2'){echo 'selected';}?>>  Effect2  </option>
				 			<option value='effect3' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_HE=='effect3'){echo 'selected';}?>>  Effect3  </option>
				 			<option value='effect4' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_HE=='effect4'){echo 'selected';}?>>  Effect4  </option>
				 			<option value='effect5' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_HE=='effect5'){echo 'selected';}?>>  Effect5  </option>
						</select>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Background Color 1:</td>
					<td><input type='text' id='RIT_VG_GHE_IHB1' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_IHB1' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IHB1;?>"></td>
					<td>Opacity:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IO1' name="RIT_VG_GHE_IO1" value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IO1*100;?>" min='0' max='100' step='1'>
						<output name="RIT_VG_GHE_IO1_Output" id="RIT_VG_GHE_IO1_Output" for="RIT_VG_GHE_IO1"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IO1*100 .'%';?></output>
					</td>
				</tr>
				<tr id="RIT_VG_GHE_2">
					<td>Background Color 2:</td>
					<td><input type='text' id='RIT_VG_GHE_IHB2' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_IHB2' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IHB2;?>"></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Choose Icon For Opening Popup</legend>
			<table class="RIT_Video_Gallery_Table1">	
				<tr>
					<td style="text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_Type(1)">
						<img class="RIT_Video_Gallery_GHE_Icons" id="RIT_Video_Gallery_GHE_Icons_1" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-1.jpg',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_Icon==1){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_Type(2)"> 
						<img class="RIT_Video_Gallery_GHE_Icons" id="RIT_Video_Gallery_GHE_Icons_2" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-2.jpg',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_Icon==2){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_Type(3)">
						<img class="RIT_Video_Gallery_GHE_Icons" id="RIT_Video_Gallery_GHE_Icons_3" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-3.jpg',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_Icon==3){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Icon Settings For Opening Popup</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Icon Size:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_IS' name="RIT_VG_GHE_IS" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IS)[0];?>" min='1' max='48' step='1'>
						<output name="RIT_VG_GHE_IS_Output" id="RIT_VG_GHE_IS_Output" for="RIT_VG_GHE_IS"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IS;?></output>
					</td>
					<td>Icon Color:</td>
					<td><input type='text' id='RIT_VG_GHE_IC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_IC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_IC;?>"></td>
					
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_Video_Gallery_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Choose Icon For Closing Popup</legend>
			<table class="RIT_Video_Gallery_Table1">	
				<tr>
					<td style="text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_1_Type(1)">
						<img class="RIT_Video_Gallery_GHE_Icons_1" id="RIT_Video_Gallery_GHE_Icons1_1" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-4.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIcon==1){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_1_Type(2)"> 
						<img class="RIT_Video_Gallery_GHE_Icons_1" id="RIT_Video_Gallery_GHE_Icons1_2" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-5.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIcon==2){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
					<td style="padding-left:5px;text-align:center;" onclick="RIT_Video_Gallery_GHE_Icons_1_Type(3)">
						<img class="RIT_Video_Gallery_GHE_Icons_1" id="RIT_Video_Gallery_GHE_Icons1_3" src="<?php echo plugins_url('/Images/GalleryHoverEffect/gallery-icon-6.png',__FILE__);?>" style="<?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIcon==3){echo 'border:1px solid #6f6e6e;background-color:#eaeaea';}?>">								
					</td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Icon Settings For Closing Popup</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Icon Size:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_PIS' name="RIT_VG_GHE_PIS" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIS)[0];?>" min='1' max='48' step='1'>
						<output name="RIT_VG_GHE_PIS_Output" id="RIT_VG_GHE_PIS_Output" for="RIT_VG_GHE_PIS"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIS;?></output>
					</td>
					<td>Icon Color:</td>
					<td><input type='text' id='RIT_VG_GHE_PIC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_PIC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIC;?>"></td>
				</tr>
			</table>
		</fieldset>	
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Popup Settings</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Video Width:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_PVW' name="RIT_VG_GHE_PVW" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PVW)[0];?>" min='200' max='1500' step='1'>
						<output name="RIT_VG_GHE_PVW_Output" id="RIT_VG_GHE_PVW_Output" for="RIT_VG_GHE_PVW"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PVW;?></output>
					</td>
					<td>Video Height:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_PVH' name="RIT_VG_GHE_PVH" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PVH)[0];?>" min='200' max='1500' step='1'>
						<output name="RIT_VG_GHE_PVH_Output" id="RIT_VG_GHE_PVH_Output" for="RIT_VG_GHE_PVH"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PVH;?></output>
					</td>
				</tr>
				<tr>
					<td>Box Shadow Color:</td>
					<td><input type='text' id='RIT_VG_GHE_PBSC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_PBSC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PBSC;?>"></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>		
		<fieldset class='RIT_VG_Other_Fieldset'>
		<legend class="RIT_Video_Gallery_label">Pagination</legend>
			<table class="RIT_VG_MenuTable">
				<tr>
					<td>Font Size:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_PFS' name="RIT_VG_GHE_PFS" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PFS)[0];?>" min='8' max='48' step='1'>
						<output name="RIT_VG_GHE_PFS_Output" id="RIT_VG_GHE_PFS_Output" for="RIT_VG_GHE_PFS"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PFS;?></output>
					</td>
					<td>Color:</td>
					<td><input type='text' id='RIT_VG_GHE_PC' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_PC' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PC;?>"></td>
				</tr>
				<tr>
					<td>Icon Font Size:</td>
					<td>
						<input type="range" id='RIT_VG_GHE_PIFS' name="RIT_VG_GHE_PIFS" value="<?php echo split('px',$RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIFS)[0];?>" min='8' max='48' step='1'>
						<output name="RIT_VG_GHE_PIFS_Output" id="RIT_VG_GHE_PIFS_Output" for="RIT_VG_GHE_PIFS"><?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIFS;?></output>
					</td>
					<td>Icon Color:</td>
					<td><input type='text' id='RIT_VG_GHE_PICol' class='RIT_Video_Gallery_Color' name='RIT_VG_GHE_PICol' value="<?php echo $RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PICol;?>"></td>
				</tr>
				<tr>
					<td>Position:</td>
					<td>
						<select class="RIT_Video_Gallery_Select_Menu" id='RIT_VG_GHE_PIP' name='RIT_VG_GHE_PIP'>
							<option value='Left'   <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIP=='Left'){echo 'selected';}?>>   Left   </option>
				 			<option value='Right'  <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIP=='Right'){echo 'selected';}?>>  Right  </option>
				 			<option value='Center' <?php if($RIT_Video_Gallery_Effect6[0]->RIT_VG_GHE_PIP=='Center'){echo 'selected';}?>> Center </option>
						</select>
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</fieldset>		
	</fieldset>
</form>