<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	/*input Range*/
	input[type=range] 
	{
		-webkit-appearance: none;
		width: 75%;
		margin: 11px 0;
		background-color: #e4e3e3;
	}	
	input[type=range]::-webkit-slider-runnable-track 
	{
		width: 100%;
		height: 6px;
		cursor: pointer;
		box-shadow: 2.1px 2.1px 15px #c0c0c0, 0px 0px 2.1px #cdcdcd;
		background: #6f6e6e;
		border-radius: 25px;
		border: 0px solid #010101;
	}
	input[type=range]::-webkit-slider-thumb 
	{
	  	box-shadow: 4.4px 4.4px 6px #c0c0c0, 0px 0px 4.4px #cdcdcd;
		border: 0px solid rgba(0, 0, 0, 0);
		height: 20px;
		width: 11px;
		border-radius: 50px;
		background: #ffffff;
		cursor: pointer;
		-webkit-appearance: none;
		margin-top: -7px;
	}	
	/*wpcolorPicker*/
	.wp-picker-clear
	{
		display: none !important;
	}
	.wp-picker-container .iris-picker {
		margin-left: 120px;
		position: absolute;
		z-index: 9999999999;
	}
	.wp-picker-container, .wp-picker-container:active
	{
		margin-top: 5px;
		margin-left: 5px;
	}
	/*wpcolorPicker*/
	/*OnOffSwitch*/
	.onoffswitch 
	{
   		position: relative; 
   		width: 80px;
    	-webkit-user-select:none;
    	-moz-user-select:none; 
    	-ms-user-select: none;
  	}
	.onoffswitch-checkbox 
	{
	    display: none !important;
	}
	.onoffswitch-label 
	{
	    display: block; 
	    overflow: hidden; 
	    cursor: pointer;
	    border: 1px solid #6f6e6e; 
	    border-radius: 15px;
	    height: 25px;
	}
	.onoffswitch-inner 
	{
	    display: block; 
	    width: 200%; 
	    margin-left: -100%;
	    transition: margin 0.3s ease-in 0s;
	}
	.onoffswitch-inner:before, .onoffswitch-inner:after 
	{
	    display: block; 
	    float: left; 
	    width: 50%; 
	    height: 25px; 
	    padding: 0; 
	    line-height: 25px;
	    font-size: 14px; 
	    color: white; 
	    font-family: 
	    Trebuchet, Arial, sans-serif; 
	    font-weight: bold;
	    box-sizing: border-box;
	}
	.onoffswitch-inner:before 
	{
	    content: "Yes";
	    padding-left: 10px;
	    background-color: #6f6e6e; 
	    color: #FFFFFF;
	}
	.onoffswitch-inner:after 
	{
	    content: "No";
	    padding-right: 10px;
	    background-color: #ffffff; 
	    color: #6f6e6e;
	    text-align: right;
	}
	.onoffswitch-switch 
	{
	    display: block; 
	    width: 18px; 
	    margin: 6px;
	    background: #6f6e6e;
	    position: absolute; 
	    top: 0; 
	    bottom: 0;
	    right: 45px;
	    border: 1px solid #999999; 
	    border-radius: 20px;
	    transition: all 0.3s ease-in 0s; 
	}
	.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner 
	{
	    margin-left: 0;
	}
	.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch 
	{
	    right: 0px; 
	    background: #ffffff;
	}
	.RIT_Video_Gallery_Prop_Div_Main
	{
		margin-top: 30px;
		height:120px;
		width:99%;
		border-radius: 10px;
		background-color: #6f6e6e;
		padding: 5px;
	}
	.RIT_Logo_Orange
	{
		float: right;
		height: 70px;
		margin-right: 10px;
	}
	.RIT_Video_Gallery_Prop_Save
	{
		float: right;
		width: 120px;
		background-color: #6f6e6e;
		color: #ffffff;
		border: 1px solid #0073aa;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #ffffff;
		cursor: pointer;
		margin-right: 20px;
	}
	.RIT_Video_Gallery_Setting_Video_Title_Label
	{
		font-family: Gabriola;
		font-size: 25px;
		color: white;
		margin-left: 15px;
	}	
	#RIT_Video_Gallery_Setting_Video_Title
	{
		width: 300px;
		background-color: #6f6e6e;
		border:none;
		color:white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}	
	.RIT_Video_Gallery_Main_Fieldset
	{
		border:1px solid #6f6e6e;
		background:white;
		margin-top: 15px;
		float: left;
		padding: 5px;
		display: none;
		width: 60%;
	}
	.RIT_VG_MenuTable
	{
		width: 100%;
		background-color: #cfcfcf;
	}	
	.RIT_VG_MenuTable td:nth-child(odd)
	{
		width:17%;
		background-color: #f0f0f0;
		text-align: center;
		color:#717171;
		font-size: 14px;
		height: 30px;
	}
	.RIT_VG_MenuTable td:nth-child(even)
	{
		width:33%;
		background-color: #e4e3e3;
		font-size: 14px;
		height: 30px;
	}
	.RIT_VG_Other_Fieldset,.RIT_Video_Gallery_Other_Fieldset
	{
		border:1px solid #6f6e6e;
		background:white;
		padding: 5px;
	}
	.RIT_VGa_Other_Fieldset
	{
		border:1px solid #6f6e6e;
		background:white;
		padding: 5px;
		float: left;
	}
	.RIT_Video_Gallery_label
	{
		margin-left: 10px;
		font-size: 14px;
		color: #6f6e6e;
	}	
	.RIT_Video_Gallery_Select_Menu
	{
		width:150px;
	}	
	.RIT_Video_Gallery_Table1
	{
		width: 100%;
	}
	.RIT_Video_Gallery_Table1 td img
	{
		border:1px solid white;
		background-color: white;
		border-radius: 5px;
		cursor: pointer;
	}
	.RIT_Video_Gallery_Table1 td img:hover
	{
		border:1px solid #6f6e6e !important;
		background-color: #eaeaea !important;
	}
	.RIT_Video_Gallery_Table1 td img:active
	{
		border:1px solid #6f6e6e !important;
		background-color: #c5c5c5 !important;
	}	
	.RIT_VGallery_Main_Fieldset1
	{
		border:1px solid #6f6e6e;
		background-color: #ffffff;
		margin-top: 15px;
		width: 60%;
		padding: 5px;
		display: none;
	}
	.RIT_VGallery_Table_Type
	{
		width: 100%;
	}
	.RIT_VGallery_Table_Type tr:nth-child(odd)
	{
		background-color: #edecec;
		text-align: center;
		font-size: 14px;
		font-family: Consolas;
	}
	.RIT_VGallery_Table_Type tr:nth-child(even)
	{
		background-color: #f5f5f5;
		text-align: center;
	}
	.RIT_VGallery_Table_Type td:nth-child(1)
	{
		width: 50%;
	}
	.RIT_VGallery_Table_Type td:nth-child(2)
	{
		width: 50%;
	}
	.RIT_VGallery_EN
	{
		height: 25px;
		border-radius: 3px;
		width: 200px;
	}
	.RIT_VGallery_Main_Div1,.RIT_VGallery_Main_Div2
	{
		margin-top: 85px;
	}
	.RIT_VGallery_Main_Div2
	{
		display: none;
	}
	.RIT_VGallery_Title_Span
	{
		color: white;
		margin-left: 25px;
		font-size: 25px;
		font-family: Gabriola;
	}
	.RIT_VGallery_search_text
	{
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
	}
	.RIT_VGallery_Reset_text
	{
		width: 100px;
		background-color: #6f6e6e;
		color: white;
		border: 1px solid #6f6e6e;
		border-radius: 3px;
		box-shadow: 0px 0px 30px white;
		margin-left: 5px;
		cursor: pointer;
	}
	.RIT_VGallery_not
	{
		color: white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}
	.RIT_VGallery_Add_Button
	{
		cursor: pointer;
		width: 120px;
		background-color: #6f6e6e;
		color: #ffffff;
		border: 1px solid #0073aa;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #ffffff;
		margin-right: 25px;
		float: right;
	}
	.RIT_VGallery_Main_Table
	{
		width:99.5% ;
		margin:15px 0 0 0; 
		height:40px;
		border:1px solid #6f6e6e;
		padding: 2px;
	}
	.RIT_VGallery_first_row
	{
		background:#6f6e6e !important;
		color:white;
		text-align: center;
		font-family: Gabriola;
		font-size: 20px;
	}

	.RIT_VGallery_Effect_Table tr:nth-child(odd),.RIT_VGallery_Effect_Table1 tr:nth-child(odd)
	{
		background:#f0f0f0 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;	
	}
	.RIT_VGallery_Effect_Table tr:nth-child(even),.RIT_VGallery_Effect_Table1 tr:nth-child(even)
	{
		background:#e4e3e3 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;		
	}
	.RIT_VGallery_Effect_Table,.RIT_VGallery_Effect_Table1
	{
		width:99.5% ;
		padding: 2px;
		border:1px solid #6f6e6e;
		margin-top: 1px;
		background-color: #c0c0c0;
	}	
	.RIT_VGallery_Effect_Table1
	{
		display: none;
	}
	.RIT_VGallery_main_id_item,.RIT_VGallery_id_item
	{
		width:5%;
	}
	.RIT_VGallery_main_title_item,.RIT_VGallery_title_item
	{
		width:35%;
	}
	.RIT_VGallery_main_effect_item,.RIT_VGallery_effect_item
	{
		width:30%;
	}
	.RIT_VGallery_main_actions_item
	{
		width:30%;
	}
	.RIT_VGallery_edit_item,.RIT_VGallery_delete_item
	{
		width:15%;
		text-decoration: underline;
		color: #0073aa;
	}
	.RIT_VGallery_edit_item:hover,.RIT_VGallery_delete_item:hover
	{
		cursor: pointer;
		color: #f68935;
	}	
</style>