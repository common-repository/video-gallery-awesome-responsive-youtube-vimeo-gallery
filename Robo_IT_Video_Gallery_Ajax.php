<?php
	add_action( 'wp_ajax_RITGet_Vimeo_Video_Image_Src', 'RITGet_Vimeo_Video_Image_Src_Callback' );
	add_action( 'wp_ajax_nopriv_RITGet_Vimeo_Video_Image_Src', 'RITGet_Vimeo_Video_Image_Src_Callback' );

	function RITGet_Vimeo_Video_Image_Src_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$RIT_Video_Gallery_Image_Src=explode('video/',$GET_Video_Video_Src);
		$RIT_Video_Gallery_Image_Src_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$RIT_Video_Gallery_Image_Src[1].php"));
		$RIT_Video_Gallery_Image_Src_Real=$RIT_Video_Gallery_Image_Src_Real[0]['thumbnail_large'];

		echo $RIT_Video_Gallery_Image_Src_Real;

		die();
	}

	add_action( 'wp_ajax_Delete_RIT_Video_Gallery_Click', 'Delete_RIT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_RIT_Video_Gallery_Click', 'Delete_RIT_Video_Gallery_Click_Callback' );

	function Delete_RIT_Video_Gallery_Click_Callback()
	{
		$Delete_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 = $wpdb->prefix . "rit_video_manager";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $Delete_gallery_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE gallery_number= %d", $Delete_gallery_id));

		die();
	}

	add_action( 'wp_ajax_Edit_RIT_Video_Gallery_Click', 'Edit_RIT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_RIT_Video_Gallery_Click', 'Edit_RIT_Video_Gallery_Click_Callback' );

	function Edit_RIT_Video_Gallery_Click_Callback()
	{
		$Edit_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  =  $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 =  $wpdb->prefix . "rit_video_manager";

		$RIT_Gallery_title=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id= %d", $Edit_gallery_id));

		$RIT_Video_Gallery_Video_params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number= %d", $RIT_Gallery_title[0]->id));

		echo $RIT_Gallery_title[0]->gallery_title . '^%^' . $RIT_Gallery_title[0]->gallery_type . '^%^' . $RIT_Gallery_title[0]->RIT_Video_Gallery_Show_Video_Type . '^%^' . $RIT_Gallery_title[0]->RIT_Video_Gallery_Videos_Quantity . '^%^' . count($RIT_Video_Gallery_Video_params) . '^%^' . $RIT_Video_params;
		for($i=0;$i<count($RIT_Video_Gallery_Video_params);$i++)
		{
			$u = explode(')*^*(', $RIT_Video_Gallery_Video_params[$i]->video_title);
			$y = implode('"', $u);
			$t = explode(")*&*(", $y);
			$Video_Title = implode("'", $t);

			$w = explode(')*^*(', $RIT_Video_Gallery_Video_params[$i]->video_description);
			$s = implode('"', $w);
			$x = explode(")*&*(", $s);
			$Description_textarea = implode("'", $x);

			$RIT_Video_params = $Video_Title . '$#$' . $Description_textarea . '$#$' . $RIT_Video_Gallery_Video_params[$i]->video_url . '$#$' . $RIT_Video_Gallery_Video_params[$i]->image_url . '$#$' . $RIT_Video_Gallery_Video_params[$i]->video_link . '$#$' . $RIT_Video_Gallery_Video_params[$i]->video_ONT . ')*(';
			echo $RIT_Video_params;
		}
		die();
	}

	add_action( 'wp_ajax_Search_RIT_Video_Gallery_Click', 'Search_RIT_Video_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Search_RIT_Video_Gallery_Click', 'Search_RIT_Video_Gallery_Click_Callback' );

	function Search_RIT_Video_Gallery_Click_Callback()
	{
		$Search_RIT_Video_Gallery = strtolower(sanitize_text_field($_POST['foobar']));
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 =  $wpdb->prefix . "rit_video_manager";

		$Searched_RIT_Gallery=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));

		for($i=0;$i<count($Searched_RIT_Gallery);$i++)
		{
			for($j=1;$j<strlen($Searched_RIT_Gallery[$i]->gallery_title);$j++)
			{
				if($Search_RIT_Video_Gallery==substr(strtolower($Searched_RIT_Gallery[$i]->gallery_title),0,$j))
				{
					$Quantity_Gallery_Videos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%d",$Searched_RIT_Gallery[$i]->id));
					echo $Searched_RIT_Gallery[$i]->id . ')&*&(' . $Searched_RIT_Gallery[$i]->gallery_title . ')&*&('. count($Quantity_Gallery_Videos) . ')*^*(';
				}
				else
				{
					echo "";
				}
			}
		}
		die();
	}

	add_action( 'wp_ajax_Delete_RITVGallery_Effect_Click', 'Delete_RITVGallery_Effect_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_RITVGallery_Effect_Click', 'Delete_RITVGallery_Effect_Click_Callback' );

	function Delete_RITVGallery_Effect_Click_Callback()
	{
		$Delete_RITVGallery = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 = $wpdb->prefix . "rit_video_manager";
		$table_name2 = $wpdb->prefix . "rit_font_family";
		$table_name3 = $wpdb->prefix . "rit_video_effdb";
		$table_name7 = $wpdb->prefix . "rit_video_effect4";
		$table_name8 = $wpdb->prefix . "rit_video_effect5";
		$table_name9 = $wpdb->prefix . "rit_video_effect6";

		$RIT_VGallery_Effect_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d",$Delete_RITVGallery));

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE id= %d", $Delete_RITVGallery));

		if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='Video Slider Playlist')
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name7 WHERE RIT_VGallery_TN_ID=%d", $Delete_RITVGallery));
		}	
		else if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='3D Gallery')
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name8 WHERE RIT_VGallery_TN_ID=%d", $Delete_RITVGallery));
		}
		else if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='Gallery Hover Effects')
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name9 WHERE RIT_VGallery_TN_ID=%d", $Delete_RITVGallery));
		}		
		die();
	}

	add_action( 'wp_ajax_Edit_RITVGallery_Effect_Click', 'Edit_RITVGallery_Effect_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_RITVGallery_Effect_Click', 'Edit_RITVGallery_Effect_Click_Callback' );

	function Edit_RITVGallery_Effect_Click_Callback()
	{
		$Edit_RITVGallery = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 = $wpdb->prefix . "rit_video_manager";
		$table_name2 = $wpdb->prefix . "rit_font_family";
		$table_name3 = $wpdb->prefix . "rit_video_effdb";
		$table_name7 = $wpdb->prefix . "rit_video_effect4";
		$table_name8 = $wpdb->prefix . "rit_video_effect5";
		$table_name9 = $wpdb->prefix . "rit_video_effect6";

		$RIT_VGallery_Effect_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id=%d",$Edit_RITVGallery));

		if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='Video Slider Playlist')
		{
			$RIT_VGallery_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE RIT_VGallery_TN_ID=%d",$Edit_RITVGallery));
			$RIT_Video_Gallery_Edit_Effect=$RIT_VGallery_Effect_Type[0]->rit_effect_name . ')*+*(' . $RIT_VGallery_Effect_Type[0]->rit_effect_type . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_W . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_H . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_AP . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_APS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_Ar . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_ArS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_PT . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_CS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_BgC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_BSC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_BW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_BS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_BC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_TFS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_TC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_TFF . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_TTA . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_DS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_DFF . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_DFS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_DC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NBgC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NHBgC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NBC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_I . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NCols . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NSpac . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_NHei . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_THC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_VSP_DHC;
		}	
		else if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='3D Gallery')
		{
			$RIT_VGallery_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE RIT_VGallery_TN_ID=%d",$Edit_RITVGallery));
			$RIT_Video_Gallery_Edit_Effect=$RIT_VGallery_Effect_Type[0]->rit_effect_name . ')*+*(' . $RIT_VGallery_Effect_Type[0]->rit_effect_type . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_Deg . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_SW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_SH . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_BW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_BS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_BC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_BR . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_BSC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_ST . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TFS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TBgC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TFF . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TO . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TTA . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TTSC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TBW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TBS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TBC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_TBR . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_Icon . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_IS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_IHC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_3D_IC;
		}	
		else if($RIT_VGallery_Effect_Type[0]->rit_effect_type=='Gallery Hover Effects')
		{
			$RIT_VGallery_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE RIT_VGallery_TN_ID=%d",$Edit_RITVGallery));
			$RIT_Video_Gallery_Edit_Effect=$RIT_VGallery_Effect_Type[0]->rit_effect_name . ')*+*(' . $RIT_VGallery_Effect_Type[0]->rit_effect_type . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IH . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IBW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IBS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IBC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IBSC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IPB . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IHB1 . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IHB2 . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IO1 . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IO2 . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_Icon . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_IC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PVW . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PVH . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PBSC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PIcon . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PIS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PIC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PFS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PC . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PIFS . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PICol . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_PIP . ')*+*(' . $RIT_VGallery_Effect[0]->RIT_VG_GHE_HE;
		}
		echo $RIT_Video_Gallery_Edit_Effect;
		die();
	}

	add_action( 'wp_ajax_RIT_Video_Gallery_Type', 'RIT_Video_Gallery_Type_Callback' );
	add_action( 'wp_ajax_nopriv_RIT_Video_Gallery_Type', 'RIT_Video_Gallery_Type_Callback' );

	function RIT_Video_Gallery_Type_Callback()
	{
		$RIT_VG_Name = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name3 = $wpdb->prefix . "rit_video_effdb";

		$RIT_VGallery_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s",$RIT_VG_Name));

		echo $RIT_VGallery_Type[0]->rit_effect_type;
		die();
	}
?>