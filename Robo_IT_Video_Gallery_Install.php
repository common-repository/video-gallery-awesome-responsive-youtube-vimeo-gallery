<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;

	$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
	$table_name1 = $wpdb->prefix . "rit_video_manager";
	$table_name2 = $wpdb->prefix . "rit_font_family";
	$table_name3 = $wpdb->prefix . "rit_video_effdb";
	$table_name7 = $wpdb->prefix . "rit_video_effect4";
	$table_name8 = $wpdb->prefix . "rit_video_effect5";
	$table_name9 = $wpdb->prefix . "rit_video_effect6";

	if( $wpdb->get_var('SHOW TABLES LIKE' . $table_name) != $table_name )
	{
		$sql = 'CREATE TABLE IF NOT EXISTS ' .$table_name . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			gallery_title VARCHAR(255) NOT NULL,
			gallery_type VARCHAR(255) NOT NULL,
			RIT_Video_Gallery_Show_Video_Type VARCHAR(255) NOT NULL,
			RIT_Video_Gallery_Videos_Quantity INTEGER(10) NOT NULL,
			PRIMARY KEY  (id) )';

		$sql1 = 'CREATE TABLE IF NOT EXISTS ' .$table_name1 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			video_title VARCHAR(255) NOT NULL, 
			video_description LONGTEXT NOT NULL,
			video_url VARCHAR(255) NOT NULL,		
			image_url VARCHAR(255) NOT NULL,
			video_link VARCHAR(255) NOT NULL,
			video_ONT VARCHAR(255) NOT NULL,
			gallery_number INTEGER(10) NOT NULL,
			PRIMARY KEY  (id) )';

		$sql2 = 'CREATE TABLE IF NOT EXISTS ' .$table_name2 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Font_family VARCHAR(255) NOT NULL,
			PRIMARY KEY  (id) )';

		$sql3 = 'CREATE TABLE IF NOT EXISTS ' .$table_name3 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			rit_effect_name VARCHAR(255) NOT NULL, 
			rit_effect_type VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';

		$sql7 = 'CREATE TABLE IF NOT EXISTS ' .$table_name7 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			RIT_VG_VSP_W VARCHAR(255) NOT NULL,
			RIT_VG_VSP_IW VARCHAR(255) NOT NULL,
			RIT_VG_VSP_H VARCHAR(255) NOT NULL,
			RIT_VG_VSP_AP VARCHAR(255) NOT NULL,
			RIT_VG_VSP_APS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_Ar VARCHAR(255) NOT NULL,
			RIT_VG_VSP_ArS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_PT VARCHAR(255) NOT NULL,
			RIT_VG_VSP_CS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_BgC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_BSC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_BW VARCHAR(255) NOT NULL,
			RIT_VG_VSP_BS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_BC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_TFS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_TC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_TFF VARCHAR(255) NOT NULL,
			RIT_VG_VSP_TTA VARCHAR(255) NOT NULL,
			RIT_VG_VSP_DS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_DFF VARCHAR(255) NOT NULL,
			RIT_VG_VSP_DFS VARCHAR(255) NOT NULL,
			RIT_VG_VSP_DC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NBgC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NHBgC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NBC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_I VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NCols VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NSpac VARCHAR(255) NOT NULL,
			RIT_VG_VSP_NHei VARCHAR(255) NOT NULL,
			RIT_VG_VSP_THC VARCHAR(255) NOT NULL,
			RIT_VG_VSP_DHC VARCHAR(255) NOT NULL,
			RIT_VGallery_TN_ID VARCHAR(255) NOT NULL,
			PRIMARY KEY  (id) )';

		$sql8 = 'CREATE TABLE IF NOT EXISTS ' .$table_name8 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			RIT_VG_3D_Deg VARCHAR(255) NOT NULL, 
			RIT_VG_3D_SW VARCHAR(255) NOT NULL, 
			RIT_VG_3D_SH VARCHAR(255) NOT NULL, 
			RIT_VG_3D_BW VARCHAR(255) NOT NULL, 
			RIT_VG_3D_BS VARCHAR(255) NOT NULL, 
			RIT_VG_3D_BC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_BR VARCHAR(255) NOT NULL, 
			RIT_VG_3D_BSC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_ST VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TFS VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TBgC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TFF VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TO VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TTA VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TTSC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TBW VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TBS VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TBC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_TBR VARCHAR(255) NOT NULL, 
			RIT_VG_3D_Icon VARCHAR(255) NOT NULL, 
			RIT_VG_3D_IS VARCHAR(255) NOT NULL, 
			RIT_VG_3D_IHC VARCHAR(255) NOT NULL, 
			RIT_VG_3D_IC VARCHAR(255) NOT NULL,
			RIT_VGallery_TN_ID VARCHAR(255) NOT NULL, 
			PRIMARY KEY  (id) )';

		$sql9 = 'CREATE TABLE IF NOT EXISTS ' .$table_name9 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			RIT_VG_GHE_IW VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IH VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IHW VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IBW VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IBS VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IBC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IBSC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IPB VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IHB1 VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IHB2 VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IO1 VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IO2 VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_Icon VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IS VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_IC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PVW VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PVH VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PBSC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PIcon VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PIS VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PIC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PFS VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PC VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PIFS VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PICol VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_PIP VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_HE VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_BW VARCHAR(255) NOT NULL, 
			RIT_VG_GHE_E2H VARCHAR(255) NOT NULL, 
			RIT_VGallery_TN_ID VARCHAR(255) NOT NULL, 
			PRIMARY KEY  (id) )';

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		dbDelta($sql1);
		dbDelta($sql2);
		dbDelta($sql3);
		dbDelta($sql7);
		dbDelta($sql8);
		dbDelta($sql9);
		
		DefaultData();
	}
	function DefaultData()
	{
		global $wpdb;
		$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
		$table_name1 = $wpdb->prefix . "rit_video_manager";
		$table_name2 = $wpdb->prefix . "rit_font_family";
		$table_name3 = $wpdb->prefix . "rit_video_effdb";
		$table_name7 = $wpdb->prefix . "rit_video_effect4";
		$table_name8 = $wpdb->prefix . "rit_video_effect5";
		$table_name9 = $wpdb->prefix . "rit_video_effect6";

		$family = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New',' AngsanaUPC','AparaRITa','Arabic Typesetting','Arial','Arial Black',
			'Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic','Comic Sans MS','Consolas',
			'Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New','DaunPenh','David','DFKai-SB','DilleniaUPC',
			'DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong','Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola',
			'Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe','Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika',
			'Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee','Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode',
			'Malgun Gothic','Mangal','Manny ITC','Marlett','Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue',
			'Microsoft PhagsPa','Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS',
			'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT','NSimSun','Nyala',
			'Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol','Shonar Bangla','Shruti','SimHei','SimKai',
			'Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic','Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
		$RIT_VGallery_Count_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));
		if(count($RIT_VGallery_Count_Fonts)==0)
		{
			foreach ($family as $font_family) 
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Font_family) VALUES (%d, %s)", '', $font_family));
			}
		}

		$RIT_VGallery_Count_VGN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));	
		if(count($RIT_VGallery_Count_VGN)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, gallery_title, gallery_type, RIT_Video_Gallery_Show_Video_Type, RIT_Video_Gallery_Videos_Quantity) VALUES (%d, %s, %s, %s, %d)", '', 'Video Gallery', '3D Gallery', 'Show All', 6));

			$RIT_VGGID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE gallery_title=%s",'Video Gallery'));
			 			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Dubai City', 'Dubai is the most populous city in the United Arab Emirates (UAE). It is located on the southeast coast of the Persian Gulf and is one of the seven emirates that make up the country. Abu Dhabi and Dubai are the only two emirates to have veto power over critical matters of national importance in the country)*&*(s legislature. The city of Dubai is located on the emirate)*&*(s northern coastline and heads up the Dubai-Sharjah-Ajman metropolitan area. Dubai is to host World Expo 2020', 'https://www.youtube.com/embed/t5vta25jHQI', 'http://img.youtube.com/vi/t5vta25jHQI/mqdefault.jpg', ' ', ' ', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Lamborghini Aventador LP760', 'I have managed to film an extremely loud Lamborghini Aventador LP760-4 Roadster Novitec Torado during the Rallye Germania in the Nürburgring. When the cars enteringt the hotel, this amazing tuned Aventador shooting some very loud and huge flames!', 'https://www.youtube.com/embed/g_YToB10qUs', 'http://img.youtube.com/vi/g_YToB10qUs/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'How to Make a Professional Camera Slider', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/GE37xI14Fyw', 'http://img.youtube.com/vi/GE37xI14Fyw/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Greatest Game Ever Played', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using )*&*(Content here, content here)*&*(, making it look like readable English.', 'https://www.youtube.com/embed/f92yfPFl9NY', 'http://img.youtube.com/vi/f92yfPFl9NY/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Indiana Jones in Real Life! In 4K!', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'https://www.youtube.com/embed/qPKKtvkVAjY', 'http://img.youtube.com/vi/qPKKtvkVAjY/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'World)*&*(s Largest Urban Zipline', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of )*^*(de Finibus Bonorum et Malorum)*^*( (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, )*^*(Lorem ipsum dolor sit amet..)*^*(, comes from a line in section 1.10.32.', 'https://www.youtube.com/embed/YcwrRA2BIlw', 'http://img.youtube.com/vi/YcwrRA2BIlw/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Bike Parkour -Streets of San Francisco!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don)*&*(t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn)*&*(t anything embarrassing hidden in the middle of text.', 'https://www.youtube.com/embed/K9XCKP9KN7A', 'http://img.youtube.com/vi/K9XCKP9KN7A/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'BMX Meets Parkour', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'https://www.youtube.com/embed/5HTZeOkkk7I', 'http://img.youtube.com/vi/5HTZeOkkk7I/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'Steve Spangler)*&*(s Biggest Experiment Yet!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from )*^*(de Finibus Bonorum et Malorum)*^*( by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'https://www.youtube.com/embed/BmqDLMAesck', 'http://img.youtube.com/vi/BmqDLMAesck/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', 'How to make Amazing Cinematic Effects', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/NwN3G6VQ-Fs', 'http://img.youtube.com/vi/NwN3G6VQ-Fs/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, image_url, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %s, %s, %s, %s, %d)", '', '5 BEAUTIFUL WATER TRICKS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry)*&*(s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'https://www.youtube.com/embed/mdMAYqQPLqs', 'http://img.youtube.com/vi/mdMAYqQPLqs/mqdefault.jpg', '', '', $RIT_VGGID[0]->id));			
		}
		$RIT_VGallery_E4=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE id>%d",0));	
		if(count($RIT_VGallery_E4)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, rit_effect_name, rit_effect_type) VALUES (%d, %s, %s)", '', 'Video Slider Playlist', 'Video Slider Playlist'));
			$RIT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s", 'Video Slider Playlist'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, RIT_VG_VSP_W, RIT_VG_VSP_IW, RIT_VG_VSP_H, RIT_VG_VSP_AP, RIT_VG_VSP_APS, RIT_VG_VSP_Ar, RIT_VG_VSP_ArS, RIT_VG_VSP_PT, RIT_VG_VSP_CS, RIT_VG_VSP_BgC, RIT_VG_VSP_BSC, RIT_VG_VSP_BW, RIT_VG_VSP_BS, RIT_VG_VSP_BC, RIT_VG_VSP_TFS, RIT_VG_VSP_TC, RIT_VG_VSP_TFF, RIT_VG_VSP_TTA, RIT_VG_VSP_DS, RIT_VG_VSP_DFF, RIT_VG_VSP_DFS, RIT_VG_VSP_DC, RIT_VG_VSP_NBgC, RIT_VG_VSP_NHBgC, RIT_VG_VSP_NBC, RIT_VG_VSP_I, RIT_VG_VSP_NCols, RIT_VG_VSP_NSpac, RIT_VG_VSP_NHei, RIT_VG_VSP_THC, RIT_VG_VSP_DHC, RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '850px', '590px', '390px', 'true', '1', 'Yes', '1', '1500', '1500', '#dd8500', '#dd8500', '2px', 'solid', '#dd8500', '11px', '#ffffff', 'Arial', 'Center', 'Yes', 'Arial', '10px', '#ffffff', '#000000', '#dd8500', '#dd8500', '7', '4', '3', '88px', '#ededed', '#000000', $RIT_VGallery_EN[0]->id));
		}
		$RIT_VGallery_E5=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE id>%d",0));	
		if(count($RIT_VGallery_E5)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, rit_effect_name, rit_effect_type) VALUES (%d, %s, %s)", '', '3D Gallery', '3D Gallery'));
			$RIT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s", '3D Gallery'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, RIT_VG_3D_Deg, RIT_VG_3D_SW, RIT_VG_3D_SH, RIT_VG_3D_BW, RIT_VG_3D_BS, RIT_VG_3D_BC, RIT_VG_3D_BR, RIT_VG_3D_BSC, RIT_VG_3D_ST, RIT_VG_3D_TC, RIT_VG_3D_TFS, RIT_VG_3D_TBgC, RIT_VG_3D_TFF, RIT_VG_3D_TO, RIT_VG_3D_TTA, RIT_VG_3D_TTSC, RIT_VG_3D_TBW, RIT_VG_3D_TBS, RIT_VG_3D_TBC, RIT_VG_3D_TBR, RIT_VG_3D_Icon, RIT_VG_3D_IS, RIT_VG_3D_IHC, RIT_VG_3D_IC, RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '70deg', '355px', '210px', '5px', 'none', '#ffffff', '2%', '#dd8500', 'Yes', '#000000', '18px', '#dd8500', 'Arial', '0.8', 'Center', '#ffffff', '2px', 'none', '#dd8500', '0%', '8', '30px', '#dd9933', '#dd8500', $RIT_VGallery_EN[0]->id));
		}
		$RIT_VGallery_E6=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE id>%d",0));	
		if(count($RIT_VGallery_E6)==0)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, rit_effect_name, rit_effect_type) VALUES (%d, %s, %s)", '', 'Gallery Hover Effects', 'Gallery Hover Effects'));
			$RIT_VGallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s", 'Gallery Hover Effects'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, RIT_VG_GHE_IW, RIT_VG_GHE_IH, RIT_VG_GHE_IHW, RIT_VG_GHE_IBW, RIT_VG_GHE_IBS, RIT_VG_GHE_IBC, RIT_VG_GHE_IBSC, RIT_VG_GHE_IPB, RIT_VG_GHE_IHB1, RIT_VG_GHE_IHB2, RIT_VG_GHE_IO1, RIT_VG_GHE_IO2, RIT_VG_GHE_Icon, RIT_VG_GHE_IS, RIT_VG_GHE_IC, RIT_VG_GHE_PVW, RIT_VG_GHE_PVH, RIT_VG_GHE_PBSC, RIT_VG_GHE_PIcon, RIT_VG_GHE_PIS, RIT_VG_GHE_PIC, RIT_VG_GHE_PFS, RIT_VG_GHE_PC, RIT_VG_GHE_PIFS, RIT_VG_GHE_PICol, RIT_VG_GHE_PIP, RIT_VG_GHE_HE, RIT_VG_GHE_BW, RIT_VG_GHE_E2H,  RIT_VGallery_TN_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', '220px', '150px', '224px', '2px', 'solid', '#000000', '#000000', '15px', '#dd8500', '#000000', '0.4', '60px', '2', '30px', '#adadad', '850px', '600px', '#000000', '2', '19px', '#dd8500', '18px', '#dd8500', '15px', '#000000', 'Center', 'effect1', '110px', '75px', $RIT_VGallery_EN[0]->id));
		}
	}
?>