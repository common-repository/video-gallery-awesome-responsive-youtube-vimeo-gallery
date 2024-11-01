<?php
	class  Robo_IT_Video_Gallery extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Robo_IT_Video_Gallery','description'=>'This is the widget of Robo IT Video Gallery plugin');
			parent::__construct('Robo_IT_Video_Gallery','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$RIT_Video_Gallery_Name=$instance['gallery_title'];
		   	?>
		   	<div>			  
			   	<p>
			   		Gallery Name:
			   		<select name="<?php echo $this->get_field_name('gallery_title'); ?>" class="widefat" > 
				   		<?php
				   			global $wpdb;
				   			$table_name  =  $wpdb->prefix . "rit_video_gallery_manager";
				   			$gallery_name=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));

				   			foreach ($gallery_name as $gallery_title)
				   			{
				   				?><option value="<?php echo $gallery_title->id;?>"><?php echo $gallery_title->gallery_title;?></option><?php 
				   			}
				   		?>			   		
			   		</select>
			   	</p>		   
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$RIT_Video_Gallery_Name=empty($instance['gallery_title']) ? '' : $instance['gallery_title'];
 		 	global $wpdb;

 		 	$table_name  = $wpdb->prefix . "rit_video_gallery_manager";
			$table_name1 = $wpdb->prefix . "rit_video_manager";
			$table_name2 = $wpdb->prefix . "rit_font_family";
			$table_name3 = $wpdb->prefix . "rit_video_effdb";
			$table_name7 = $wpdb->prefix . "rit_video_effect4";
			$table_name8 = $wpdb->prefix . "rit_video_effect5";
			$table_name9 = $wpdb->prefix . "rit_video_effect6";

			$RIT_VG_GP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $RIT_Video_Gallery_Name));

			$RIT_VG_VP1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%s", $RIT_Video_Gallery_Name));

			$RIT_VG_EP_M=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE rit_effect_name=%s", $RIT_VG_GP[0]->gallery_type));

			if($RIT_VG_EP_M[0]->rit_effect_type=='Video Slider Playlist')
			{
				$RIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE RIT_VGallery_TN_ID=%s", $RIT_VG_EP_M[0]->id));
			}
			else if($RIT_VG_EP_M[0]->rit_effect_type=='3D Gallery')
			{
				$RIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE RIT_VGallery_TN_ID=%s", $RIT_VG_EP_M[0]->id));
				$RIT_VG_EIT=$RIT_VG_EP[0]->RIT_VG_3D_Icon;
			}
			else if($RIT_VG_EP_M[0]->rit_effect_type=='Gallery Hover Effects')
			{
				$RIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE RIT_VGallery_TN_ID=%s", $RIT_VG_EP_M[0]->id));
			}
 		 	$RIT_Video_Gallery_Show_Video_Type=$RIT_VG_GP[0]->RIT_Video_Gallery_Show_Video_Type;
 		 	$RIT_Video_Gallery_Videos_Quantity=$RIT_VG_GP[0]->RIT_Video_Gallery_Videos_Quantity;
 		 	$RIT_Video_Gallery_Count_Videos=count($RIT_VG_VP1);

 		 	if($RIT_Video_Gallery_Show_Video_Type=="Show All")
 		 	{
 		 		$RIT_Video_Gallery_Quantity=$RIT_Video_Gallery_Count_Videos;
 		 		$RIT_Video_Gallery_Per_Page_First='';
 		 		$RIT_Video_Gallery_Per_Page_Second='';
 		 		$RIT_Video_Gallery_Hoplo='Show';
 		 		$RIT_Video_Gallery_Load_More='';
	 		 	$RIT_Video_Gallery_Load_More_='';
 		 	}
 		 	else if($RIT_Video_Gallery_Show_Video_Type=="Pageination")
 		 	{
 		 		if($RIT_Video_Gallery_Videos_Quantity>=$RIT_Video_Gallery_Count_Videos)
 		 		{
 		 			$RIT_Video_Gallery_Quantity=$RIT_Video_Gallery_Count_Videos;
	 		 		$RIT_Video_Gallery_Per_Page_First=1;
	 		 		$RIT_Video_Gallery_Per_Page_Second='/1';
	 		 		$RIT_Video_Gallery_Hoplo='none';
	 		 		$RIT_Video_Gallery_Load_More='';
	 		 		$RIT_Video_Gallery_Load_More_hidden='';
 		 		} 	
 		 		else
 		 		{
 		 			$RIT_Video_Gallery_Quantity=$RIT_Video_Gallery_Videos_Quantity;
	 		 		$RIT_Video_Gallery_Per_Page_First=1;
	 		 		$RIT_Video_Gallery_fg=$RIT_Video_Gallery_Count_Videos/$RIT_Video_Gallery_Videos_Quantity;
	 		 		$RIT_Video_Gallery_Per_Page_Second='/'.ceil($RIT_Video_Gallery_fg);
	 		 		$RIT_Video_Gallery_Hoplo='done';
	 		 		$RIT_Video_Gallery_Load_More='';
	 		 		$RIT_Video_Gallery_Load_More_hidden='';
 		 		}	 		
 		 	}
 		 	else if($RIT_Video_Gallery_Show_Video_Type=="Load More")
 		 	{
 		 		if($RIT_Video_Gallery_Videos_Quantity>=$RIT_Video_Gallery_Count_Videos)
 		 		{
 		 			$RIT_Video_Gallery_Quantity=$RIT_Video_Gallery_Count_Videos;
	 		 		$RIT_Video_Gallery_Per_Page_First='';
	 		 		$RIT_Video_Gallery_Per_Page_Second='';
	 		 		$RIT_Video_Gallery_Hoplo='none';
	 		 		$RIT_Video_Gallery_Load_More='';
	 		 		$RIT_Video_Gallery_Load_More_hidden='none';
 		 		} 	
 		 		else
 		 		{
 		 			$RIT_Video_Gallery_Quantity=$RIT_Video_Gallery_Videos_Quantity;
	 		 		$RIT_Video_Gallery_Per_Page_First='';
	 		 		$RIT_Video_Gallery_Per_Page_Second='';
	 		 		$RIT_Video_Gallery_Hoplo='done';
	 		 		$RIT_Video_Gallery_Load_More='Load More...';
	 		 		$RIT_Video_Gallery_Load_More_hidden='done';	 		 		
 		 		}
 		 	}

 		 	for($j=0;$j<count($RIT_VG_VP1);$j++)
 		 	{
 		 		$u = explode(')*^*(', $RIT_VG_VP1[$j]->video_title);
				$y = implode('"', $u);
				$t = explode(")*&*(", $y);
				$RIT_Video_Gallery_Videos_Title[$j] = implode("'", $t);

				$w = explode(')*^*(', $RIT_VG_VP1[$j]->video_description);
				$s = implode('"', $w);
				$x = explode(")*&*(", $s);
				$RIT_Video_Gallery_Videos_Description[$j] = implode("'", $x);

 		 		$RIT_Video_Gallery_Videos_URL[$j]=$RIT_VG_VP1[$j]->video_url;
 		 		$RIT_Video_Gallery_Images_URL[$j]=$RIT_VG_VP1[$j]->image_url;
 		 	}
 		 	
 		 	if($RIT_VG_EIT==1)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-arrow-circle-o-left';
 		 		$RIT_Video_Gallery_Right_Icon='roboiticons-arrow-circle-o-right';
 		 		$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle-o';
 		 		$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==2)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-arrow-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-arrow-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-close';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==3)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-chevron-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-chevron-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-close';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==4)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-toggle-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-toggle-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle-o';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==5)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-chevron-circle-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-chevron-circle-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==6)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-arrow-circle-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-arrow-circle-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==7)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-angle-double-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-angle-double-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle-o';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==8)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-caret-left';
				$RIT_Video_Gallery_Right_Icon='roboiticons-caret-right';
				$RIT_Video_Gallery_Close_Icon='roboiticons-close';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($RIT_VG_EIT==9)
 		 	{
 		 		$RIT_Video_Gallery_Left_Icon='roboiticons-mail-reply';
				$RIT_Video_Gallery_Right_Icon='roboiticons-mail-forward';
				$RIT_Video_Gallery_Close_Icon='roboiticons-times-circle';
				$RIT_Video_Gallery_Load_More_hidden1='';
 		 	}

	 		if($RIT_VG_EP_M[0]->rit_effect_type=='Video Slider Playlist')
	 		{
	 			?>
				    <style>
				        .RIT_VG_VSP_NavL, .RIT_VG_VSP_NavR {
				            display: block;
				            position: absolute;
				            cursor: pointer;
				            overflow: hidden;
				        }
						.RIT_VG_VSP_Thumb .p 
						{    
							position: absolute;    
							top: 0;    
							left: 0;    
							width: 250px;    
							height: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NHei;?>;    
							background: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NBgC?>;
						}
						.RIT_VG_VSP_Thumb .tp {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}
						.RIT_VG_VSP_Thumb .i, .RIT_VG_VSP_Thumb .pav:hover .i 
						{    
							position: absolute;    
							top: 3px;    
							left: 3px;    
							width: 70px;    
							border: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NBC;?> 1px dashed;
						}
						* html .RIT_VG_VSP_Thumb .i {    width /**/: 62px;    height /**/: 32px;}
						.RIT_VG_VSP_Thumb .pav .i {    border: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NBC;?> 1px solid;}
						.RIT_VG_VSP_Thumb .t, .RIT_VG_VSP_Thumb .pav:hover .t 
						{    
							position: absolute;    
							top: 3px;    
							left: 80px;    
							width: 179px;   
							text-align: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_TTA;?>;    
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_TC;?>;    
							font-size: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_TFS;?>;    
							font-family: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_TFF;?>;    
							font-weight: 700; 
						}
						.RIT_VG_VSP_Thumb .pav .t, .RIT_VG_VSP_Thumb .p:hover .t 
						{    
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_THC;?>;
						}
						.RIT_VG_VSP_Thumb .c, .RIT_VG_VSP_Thumb .pav:hover .c 
						{    
							position: absolute;    
							top: 43px;    
							left: 3px;    
							width: 244px;     
							color:  <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_DC;?>;    
							font-size:  <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_DFS;?>;    
							font-family:  <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_DFF;?>;    
							font-weight: 400;    
							overflow: hidden;
							line-height:1.3;
						}
						.RIT_VG_VSP_Thumb .pav .c, .RIT_VG_VSP_Thumb .p:hover .c 
						{    
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_DHC;?>;;
						}
						.RIT_VG_VSP_Thumb .t, .RIT_VG_VSP_Thumb .c 
						{    
							transition: color 2s;    
							-moz-transition: color 2s;   
							-webkit-transition: color 2s;    
							-o-transition: color 2s;
						}
						.RIT_VG_VSP_Thumb .p:hover .t, .RIT_VG_VSP_Thumb .pav:hover .t, .RIT_VG_VSP_Thumb .p:hover .c, .RIT_VG_VSP_Thumb .pav:hover .c 
						{    
							transition: none;    
							-moz-transition: none;    
							-webkit-transition: none;    
							-o-transition: none;
						}
						.RIT_VG_VSP_Thumb .p:hover, .RIT_VG_VSP_Thumb .pav:hover 
						{    
							background: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NHBgC?>;
						}
						.RIT_VG_VSP_Thumb .pav, .RIT_VG_VSP_Thumb .p.pdn 
						{    
							background: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NHBgC?>;
						}
				    </style>
				    <div class="RIT_VG_VSP_Main" id="RIT_VG_VSP_Main_<?php echo $RIT_Video_Gallery_Name;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_W;?>; height: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_H;?>; overflow: hidden; visibility: hidden; background-color: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_BgC;?>; box-shadow: 0px 0px 30px <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_BSC;?>;">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_AP"    value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_AP;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_APS"   value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_APS;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_ArS"   value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_ArS;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_PT"    value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_PT;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_CS"    value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_CS;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_NCols" value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NCols;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_NSpac" value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_NSpac;?>">
				    	<input type="text" style="display: none;" id="RIT_VG_VSP_W"     value="<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_W;?>">

				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo plugins_url("/Images/loading.gif",__FILE__);?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_IW;?>; height: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_H;?>; overflow: hidden; border:<?php echo $RIT_VG_EP[0]->RIT_VG_VSP_BW;?> <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_BS;?> <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_BC;?>">
					        <?php
				 		 		for($j=0;$j<$RIT_Video_Gallery_Count_Videos;$j++)
				 		 		{
				 		 			?>
					 		 			<div data-p="112.50" style="display: none;">
					 		 				<iframe data-u="image" style="height: 99%;width:99%" src="<?php echo $RIT_Video_Gallery_Videos_URL[$j];?>" frameborder="0" allowfullscreen></iframe>
							                <div data-u="thumb">
							                    <img class="i" src="<?php echo $RIT_Video_Gallery_Images_URL[$j];?>" />
							                    <div class="t"><?php echo $RIT_Video_Gallery_Videos_Title[$j];?></div>
							                    <?php if($RIT_VG_EP[0]->RIT_VG_VSP_DS=='Yes') {?>
							                    	<div class="c"><?php echo $RIT_Video_Gallery_Videos_Description[$j];?></div>
							                    <?php }?>
							                </div>
							            </div>
						            <?php
				 		 		}
				 		 	?>
				        </div>
				        <!-- Thumbnail Navigator -->
				        <div data-u="thumbnavigator" class="RIT_VG_VSP_Thumb" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;width:250px;height: <?php echo $RIT_VG_EP[0]->RIT_VG_VSP_H;?>;" data-autocenter="2">
				            <!-- Thumbnail Item Skin Begin -->
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div data-u="thumbnailtemplate" class="tp"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				       <?php if($RIT_VG_EP[0]->RIT_VG_VSP_Ar=='Yes') {?> 
					        <!-- Arrow Navigator -->
					        <span data-u="arrowleft" class="RIT_VG_VSP_NavL" style="top:0px;left:8px;" data-autocenter="2">
					        	<img src="<?php echo plugins_url('/Images/Slider/slider-left-' . $RIT_VG_EP[0]->RIT_VG_VSP_I . '.png',__FILE__);?>">
					        </span>
					        <span data-u="arrowright" class="RIT_VG_VSP_NavR" style="top:0px;right:268px;" data-autocenter="2">
					        	<img src="<?php echo plugins_url('/Images/Slider/slider-right-' . $RIT_VG_EP[0]->RIT_VG_VSP_I . '.png',__FILE__);?>">
					        </span>
					 	<?php }?>
				    </div>
				    <script>
	 				 	var RIT_VG_VSP_AP=jQuery('#RIT_VG_VSP_AP').val();
	 				 	if (RIT_VG_VSP_AP=='true') 
	 				 	{
	 				 		RIT_VG_VSP_APRE=true;
	 				 	}
	 				 	else
	 				 	{
	 				 		RIT_VG_VSP_APRE=false;
	 				 	}
	 				 	var RIT_VG_VSP_APS=parseInt(jQuery('#RIT_VG_VSP_APS').val());
	 				 	var RIT_VG_VSP_ArS=parseInt(jQuery('#RIT_VG_VSP_ArS').val());
	 				 	var RIT_VG_VSP_PT=parseInt(jQuery('#RIT_VG_VSP_PT').val());
	 				 	var RIT_VG_VSP_CS=parseInt(jQuery('#RIT_VG_VSP_CS').val());
	 				 	var RIT_VG_VSP_NCols=parseInt(jQuery('#RIT_VG_VSP_NCols').val());
	 				 	var RIT_VG_VSP_NSpac=parseInt(jQuery('#RIT_VG_VSP_NSpac').val());
	 				 	var RIT_VG_VSP_W=parseInt(jQuery('#RIT_VG_VSP_W').val().split('px')[0]);

				        jQuery(document).ready(function ($) {
				            var RIT_VG_VSP_Main_options = {
				              $AutoPlay: RIT_VG_VSP_APRE,
				              $AutoPlaySteps: RIT_VG_VSP_APS,
				              $Idle: RIT_VG_VSP_PT,
	      					  $SlideDuration: RIT_VG_VSP_CS,
				              $ArrowNavigatorOptions: {
				                $Class: $JssorArrowNavigator$,
				                $Steps: RIT_VG_VSP_ArS
				              },
				              $ThumbnailNavigatorOptions: {
				                $Class: $JssorThumbnailNavigator$,
				                $Cols: RIT_VG_VSP_NCols,
				                $SpacingX: 4,
				                $SpacingY: RIT_VG_VSP_NSpac,
				                $Orientation: 2,
				                $Align: 0
				              }
				            };
				            
				            jQuery('.RIT_VG_VSP_Main').each(function(){
					        	var RIT_VG_VSP_Main_ID=jQuery(this).attr('id');
					            var RIT_VG_VSP_Main_slider = new $JssorSlider$(RIT_VG_VSP_Main_ID, RIT_VG_VSP_Main_options);
					            
					            //responsive code begin
					            //you can remove responsive code if you don't want the slider scales while window resizing
					            function ScaleSlider() {
					                var refSize = RIT_VG_VSP_Main_slider.$Elmt.parentNode.clientWidth;
					                if (refSize) {
					                    refSize = Math.min(refSize, RIT_VG_VSP_W);
					                    RIT_VG_VSP_Main_slider.$ScaleWidth(refSize);
					                }
					                else {
					                    window.setTimeout(ScaleSlider, 30);
					                }
					            }
					            ScaleSlider();
					            $(window).bind("load", ScaleSlider);
					            $(window).bind("resize", ScaleSlider);
					            $(window).bind("orientationchange", ScaleSlider);
					            //responsive code end
					        })
				        });
				    </script>
	 			<?php
	 		}
	 		else if($RIT_VG_EP_M[0]->rit_effect_type=='3D Gallery')
	 		{
	 			$RIT_VG_3D_ContHei=explode('px', $RIT_VG_EP[0]->RIT_VG_3D_SH)[0]+explode('px', $RIT_VG_EP[0]->RIT_VG_3D_IS)[0]+explode('px', $RIT_VG_EP[0]->RIT_VG_3D_TFS)[0]+50;
				$RIT_VG_3D_ADMT=explode('px', $RIT_VG_EP[0]->RIT_VG_3D_IS)[0]+15;
				?>
			        <input type="text" style="display: none;" id="RIT_VG_3D_Deg"  value="<?php echo $RIT_VG_EP[0]->RIT_VG_3D_Deg;?>">
					<input type="text" style="display: none;" id="RIT_VG_E5"      value="<?php echo $RIT_VG_EP[0]->rit_effect_type;?>">
					<style type="text/css">
						.RIT_VG_3DAD_<?php echo $RIT_Video_Gallery_Name;?>
						{
							background-color: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TBgC;?>;
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TC;?>;
							font-size: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TFS;?>;
							font-family: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TFF;?>;
							opacity: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TO;?>;
							text-align: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TTA;?>;
							border:<?php echo $RIT_VG_EP[0]->RIT_VG_3D_TBW;?> <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TBS;?> <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TBC;?>;
							border-radius: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TBR;?>;
							display: <?php if($RIT_VG_EP[0]->RIT_VG_3D_ST=='No'){echo 'none' ;}?>;
    						text-shadow: 1px 1px 1px <?php echo $RIT_VG_EP[0]->RIT_VG_3D_TTSC;?>;
    						margin-top: <?php echo $RIT_VG_3D_ADMT.'px';?>;
						}
						.RIT_VG_3Dwrap_<?php echo $RIT_Video_Gallery_Name;?>
						{
							width: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_SW;?>;
							height: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_SH;?>;
						}
						.RIT_VG_3DCont_<?php echo $RIT_Video_Gallery_Name;?>
						{
							height: <?php echo $RIT_VG_3D_ContHei.'px';?>;
						}
						.RIT_VG_3DAI_<?php echo $RIT_Video_Gallery_Name;?>
						{
							border:<?php echo $RIT_VG_EP[0]->RIT_VG_3D_BW;?> <?php echo $RIT_VG_EP[0]->RIT_VG_3D_BS;?> <?php echo $RIT_VG_EP[0]->RIT_VG_3D_BC;?>;
							border-radius: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_BR;?>;
						}
						.RIT_VG_3DA_<?php echo $RIT_Video_Gallery_Name;?>
						{
   							border-radius: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_BR;?>;
    						box-shadow: 0px 0px 30px <?php echo $RIT_VG_EP[0]->RIT_VG_3D_BSC;?>;
						}
						.RIT_VG_3DNS_<?php echo $RIT_Video_Gallery_Name;?>
						{
							font-size: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_IS;?>;
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_IC;?>;
							margin-top: 10px;
						}
						.RIT_VG_3DNS_<?php echo $RIT_Video_Gallery_Name;?>:hover
						{
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_IHC;?>;
						}
						.RIT_VG_3DNS_<?php echo $RIT_Video_Gallery_Name;?>:active
						{
							color: <?php echo $RIT_VG_EP[0]->RIT_VG_3D_IC;?>;
						}
					</style>
					<section class="RIT_VG_3DCont RIT_VG_3DCont_<?php echo $RIT_Video_Gallery_Name;?>">
						<div class="RIT_VG_3Dwrap RIT_VG_3Dwrap_<?php echo $RIT_Video_Gallery_Name;?>">
			            	<?php for($k=0; $k<$RIT_Video_Gallery_Count_Videos; $k++){
								?>
									<span class="RIT_VG_3DA_<?php echo $RIT_Video_Gallery_Name;?>">
										<iframe class="RIT_VG_3DAI_<?php echo $RIT_Video_Gallery_Name;?>" src="<?php echo $RIT_Video_Gallery_Videos_URL[$k] . '?&showinfo=0';?>" frameborder="0" allowfullscreen></iframe>
										<?php if($RIT_VG_VP1[$k]->video_link!=''){ ?>
											<a class="RIT_VG_3D_A" href="<?php echo $RIT_VG_VP1[$k]->video_link;?>" target="<?php if($RIT_VG_VP1[$k]->video_ONT=='Yes'){echo '_blank';}?>">
												<div class="RIT_VG_3DAD_<?php echo $RIT_Video_Gallery_Name;?>"><?php echo $RIT_Video_Gallery_Videos_Title[$k];?></div>
											</a>
										<?php } else { ?>
											<div class="RIT_VG_3DAD_<?php echo $RIT_Video_Gallery_Name;?>"><?php echo $RIT_Video_Gallery_Videos_Title[$k];?></div>
										<?php } ?>
									</span>
							<?php }?>
						</div>
						<nav>	
							<span class="RIT_VG_3DPrev"><i class="RIT_VG_3DNS_<?php echo $RIT_Video_Gallery_Name;?> roboiticons-style <?php echo $RIT_Video_Gallery_Left_Icon;?>"></i></span>
							<span class="RIT_VG_3DNext"><i class="RIT_VG_3DNS_<?php echo $RIT_Video_Gallery_Name;?> roboiticons-style <?php echo $RIT_Video_Gallery_Right_Icon;?>"></i></span>
						</nav>
					</section>

					<script type="text/javascript">
						jQuery(function(){
							jQuery('.RIT_VG_3DCont').gallery();
						});
						RIT_VG_3D();
					</script>
				<?php
	 		}
	 		else if($RIT_VG_EP_M[0]->rit_effect_type=='Gallery Hover Effects')
 		 	{
 		 		if($RIT_VG_EP[0]->RIT_VG_GHE_Icon=='1')
 		 		{
 		 			$RIT_VG_GHE_Icon='roboiticons-search';
 		 		}
 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_Icon=='2')
 		 		{
 		 			$RIT_VG_GHE_Icon='roboiticons-search-plus';
 		 		}
 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_Icon=='3')
 		 		{
 		 			$RIT_VG_GHE_Icon='roboiticons-eye';
 		 		}
 		 		?>
					<style type="text/css">
						.RIT_VG_GHE_View 
						{
						   width: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHW;?>;
						   height: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IH;?>;
						   margin: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IPB;?>;
						   float: left;
						   border: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IBW;?> <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IBS;?> <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IBC;?>;
						   overflow: hidden;
						   position: relative;
						   text-align: center;
						   box-shadow: 0px 0px 30px <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IBSC;?>;
						   cursor: pointer;
						   display:none;
						}
						.RIT_VG_GHE_View .RIT_VG_GHE_Mask, .RIT_VG_GHE_View .RIT_VG_GHE_Content 
						{
						   width: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IW;?>;
						   height: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IH;?>;
						   position: absolute;
						   overflow: hidden;
						   top: 0;
						   left: 0;
						}
						.RIT_VG_GHE_View .RIT_VG_GHE_Mask
						{
						   background-color: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB2;?>;
						}
						.RIT_VG_GHE_View span.RIT_VG_GHE_Info 
						{
						   display: inline-block;
						   padding:0;
						   width:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IS;?>;
						   margin:0;
						   cursor:pointer;
						}
						.RIT_VG_GHE_Icon
						{
							color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IC;?>;
							font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IS;?>;
							display:block;
						}
					</style>
					<?php 
						if($RIT_VG_EP[0]->RIT_VG_GHE_HE=='effect1')
		 		 		{
		 		 			$RIT_VG_GHE_HE='RIT_VG_GHE_Effect1';
		 		 			?>
		 		 				<style type="text/css">
									.RIT_VG_GHE_Effect1 .RIT_VG_GHE_Mask {
									    border-color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?> transparent transparent transparent; 
									    border-width:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?>;
									}
									.RIT_VG_GHE_Effect1:hover .RIT_VG_GHE_Mask {
									    opacity: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO1;?>;
									}
									.RIT_VG_GHE_Effect1:hover span.RIT_VG_GHE_Info {
										opacity:1;
									    -moz-transform:translateY(<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO2;?>);
									    -webkit-transform:translateY(<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO2;?>);
									    -o-transform:translateY(<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO2;?>);
									    -ms-transform:translateY(<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO2;?>);
									    transform:translateY(<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO2;?>);
									}
		 		 				</style>
		 		 			<?php
		 		 		}
		 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_HE=='effect2')
		 		 		{
		 		 			$RIT_VG_GHE_HE='RIT_VG_GHE_Effect2';
		 		 			?>
		 		 				<style type="text/css">
									.RIT_VG_GHE_Effect2 .RIT_VG_GHE_Mask {
									   border:0px solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?>;
									}
									.RIT_VG_GHE_Effect2 span.RIT_VG_GHE_Info {
										top:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_E2H;?>;
									}
									.RIT_VG_GHE_Effect2:hover .RIT_VG_GHE_Mask {
									   opacity: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO1;?>;
									   border:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?> solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?>;
									}
		 		 				</style>
		 		 			<?php
		 		 		}
		 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_HE=='effect3')
		 		 		{
		 		 			$RIT_VG_GHE_HE='RIT_VG_GHE_Effect3';
		 		 			?>
		 		 				<style type="text/css">
									.RIT_VG_GHE_Effect3 .RIT_VG_GHE_Mask 
									{
									    border:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?> solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?>;
									}
									.RIT_VG_GHE_Effect3 span.RIT_VG_GHE_Info 
									{
									    top:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_E2H;?>;
									}
									.RIT_VG_GHE_Effect3:hover .RIT_VG_GHE_Mask 
									{
									    opacity: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO1;?>;
									    border:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?> solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB2;?>;
									}
		 		 				</style>
		 		 			<?php
		 		 		}
		 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_HE=='effect4')
		 		 		{
		 		 			$RIT_VG_GHE_HE='RIT_VG_GHE_Effect4';
		 		 			?>
		 		 				<style type="text/css">
									.RIT_VG_GHE_Effect4 .RIT_VG_GHE_Mask 
									{
									    border-width: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?>;
										border: <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?> solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?>;
										opacity:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO1;?>;
									}									
									.RIT_VG_GHE_Effect4:hover .RIT_VG_GHE_Mask 
									{
									    border:0px solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB2;?>;
									}
		 		 				</style>
		 		 			<?php
		 		 		}
		 		 		else if($RIT_VG_EP[0]->RIT_VG_GHE_HE=='effect5')
		 		 		{
		 		 			$RIT_VG_GHE_HE='RIT_VG_GHE_Effect5';
		 		 			?>
		 		 				<style type="text/css">
									.RIT_VG_GHE_Effect5 .RIT_VG_GHE_Mask {
									   opacity:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IO1;?>;
									   border:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_BW;?> solid <?php echo $RIT_VG_EP[0]->RIT_VG_GHE_IHB1;?>;
									}
		 		 				</style>
		 		 			<?php
		 		 		}
					?>
					<div class="RIT_VG_GHE_Main">
						<?php for($k=0; $k<$RIT_Video_Gallery_Count_Videos; $k++){
							?>
								<div id="RIT_Video_Gallery_Video_<?php echo $k+1;?>" class="RIT_VG_GHE_View <?php echo $RIT_VG_GHE_HE;?>" onclick="RIT_VG_GHE_Click('<?php echo $RIT_Video_Gallery_Videos_URL[$k];?>');">
							        <img src="<?php echo $RIT_Video_Gallery_Images_URL[$k];?>" />
							        <div class="RIT_VG_GHE_Mask"></div>
							        <div class="RIT_VG_GHE_Content">
							         	<span class="RIT_VG_GHE_Info">
							         		<i class="RIT_VG_GHE_Icon roboiticons-style <?php echo $RIT_VG_GHE_Icon;?>"></i>
							         	</span>
							        </div>
								</div> 
						<?php }
						?>
						<input type='text' style='display:none;' class='RITVGGHEPaginationFontSize' value='<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PFS;?>'>
						<input type='text' style='display:none;' class='RITVGGHEPaginationIconSize' value='<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIFS;?>'>

						<div class='RITpagination5' id="RIT_Video_Gallery_Show_All" style="float:left;font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PFS;?>;color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PC;?>;text-align:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIP;?>;width:100%">
		 		 			<input type="text" style="display: none;" value="<?php echo $RIT_Video_Gallery_Hoplo;?>" id="RIT_Video_Gallery_Hoplo">
		 		 			<input type="text" style="display: none;" value="<?php echo $RIT_Video_Gallery_Count_Videos;?>" id="RIT_Video_Gallery_Count_Videos">
		 		 			<input type="text" style="display: none;" value="<?php echo $RIT_Video_Gallery_Videos_Quantity;?>" id="RIT_Video_Gallery_Videos_Quantity">
		 		 			<input type="text" style="display: none;" value="<?php echo $RIT_Video_Gallery_Videos_Quantity;?>" id="RIT_Video_Gallery_Videos_Quantity_Hidden">
		 		 			<input type="text" style="display: none;" value="<?php echo $RIT_Video_Gallery_Load_More_hidden;?>" id="RIT_Video_Gallery_Load_More_hidden">
    				  		<input type="text" style="display: none;" id="RIT_Video_Gallery_Hidden_Type" value="Gallery Hover Effects">

		 		 			<i class="RITP5 roboiticonsdraw roboiticons-style roboiticons-fast-backward" style="color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PICol;?>; font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIFS;?>;" onclick="RIT_VG_FBack_Clicked()"></i>
		 		 			<i class="RITP5 roboiticonsdraw roboiticons-style roboiticons-chevron-left" style="color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PICol;?>; font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIFS;?>;" onclick="RIT_VG_ChLeft_Clicked()"></i>
		 		 			<span id="RIT_Video_Gallery_First_Page"><?php echo $RIT_Video_Gallery_Per_Page_First;?></span><span id="RIT_Video_Gallery_End_Page"><?php echo $RIT_Video_Gallery_Per_Page_Second;?></span><span id="RIT_Video_Gallery_Load_More" onclick="RIT_VG_LM_Clicked()"><?php echo $RIT_Video_Gallery_Load_More;?></span>
		 		 			<i class="RITP5 roboiticonsdraw roboiticons-style roboiticons-chevron-right" style="color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PICol;?>; font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIFS;?>;" onclick="RIT_VG_ChRight_Clicked()"></i>
		 		 			<i class="RITP5 roboiticonsdraw roboiticons-style roboiticons-fast-forward" style="color:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PICol;?>; font-size:<?php echo $RIT_VG_EP[0]->RIT_VG_GHE_PIFS;?>;" onclick="RIT_VG_FFor_Clicked()"></i>
		 		 		</div>	 	
					</div>
 		 		<?php
 		 	}
 		}
	}
?>
