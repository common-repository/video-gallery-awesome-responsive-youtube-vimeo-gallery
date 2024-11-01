<?php
	function Robo_IT_Video_Gallery_GET_Shortcode_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Robo_IT_Video_Gallery_Draw_Shortcode($atts['id']);
	}
	add_shortcode('Robo_Video_Gallery', 'Robo_IT_Video_Gallery_GET_Shortcode_ID');
	function Robo_IT_Video_Gallery_Draw_Shortcode($Gid)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'hopar_1','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'1','widget_name'=>'Robo_IT_Video_Gallery'), $atts, 'Robo_IT_Video_Gallery' );
			$Robo_IT_Video_Gallery=new Robo_IT_Video_Gallery;
			$instance=array('gallery_title'=>$Gid);
			$Robo_IT_Video_Gallery->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
?>