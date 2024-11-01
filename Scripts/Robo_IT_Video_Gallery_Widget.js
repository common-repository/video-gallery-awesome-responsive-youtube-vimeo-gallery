jQuery(document).ready(function(){

	var RITVGGHEPaginationFontSize = parseInt(jQuery('.RITVGGHEPaginationFontSize').val());
	var RITVGGHEPaginationIconSize = parseInt(jQuery('.RITVGGHEPaginationIconSize').val());
	
	function RIT_VG_Responsive(){
		jQuery('.RITpagination5').css('font-size',RITVGGHEPaginationFontSize*parseInt(jQuery('.RITpagination5').width())/800+'px');
		jQuery('.RITP5').css('font-size',RITVGGHEPaginationIconSize*parseInt(jQuery('.RITpagination5').width())/800+'px');
		if(parseInt(jQuery('.RITpagination5').width())<=600){
			jQuery('.RITpagination5').css('font-size',RITVGGHEPaginationFontSize*parseInt(jQuery('.RITpagination5').width())/400+'px');
			jQuery('.RITP5').css('font-size',RITVGGHEPaginationIconSize*parseInt(jQuery('.RITpagination5').width())/400+'px');
		}
	}
	setTimeout(function(){
		RIT_VG_Responsive();
	},1000);
	jQuery(window).resize(function(){
		RIT_VG_Responsive();
	})
	
	var RIT_Video_Gallery_Hidden_Type=jQuery('#RIT_Video_Gallery_Hidden_Type').val();
	
	var RIT_Video_Gallery_Hoplo=jQuery('#RIT_Video_Gallery_Hoplo').val();
	var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
	var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();
	var RIT_Video_Gallery_Load_More=jQuery('#RIT_Video_Gallery_Load_More_hidden').val();
	var RIT_Video_Gallery_Load_More1=jQuery('#RIT_Video_Gallery_Load_More_hidden1').val();
	if(RIT_Video_Gallery_Load_More!='')
	{
		jQuery('.roboiticonsdraw').hide();
	}
	else
	{
		jQuery('.roboiticonsdraw').show('!important');
	}
	if(RIT_Video_Gallery_Load_More1!='')
	{
		jQuery('.roboiticonsclass1').hide();
	}
	else
	{
		jQuery('.roboiticonsclass1').show();
	}
	if(RIT_Video_Gallery_Hoplo=='none')
	{
		for(var i=1;i<=RIT_Video_Gallery_Count_Videos;i++)
		{
			jQuery('#RIT_Video_Gallery_Video_'+i).show();
		}
	}
	else if(RIT_Video_Gallery_Hoplo=='done')
	{
		for(var i=1;i<=RIT_Video_Gallery_Videos_Quantity;i++)
		{
			jQuery('#RIT_Video_Gallery_Video_'+i).show();
		}
	}
	else if(RIT_Video_Gallery_Hoplo=='Show')
	{
		for(var i=1;i<=RIT_Video_Gallery_Count_Videos;i++)
		{
			jQuery('#RIT_Video_Gallery_Video_'+i).show();
		}
		jQuery('#RIT_Video_Gallery_Show_All').hide();
	}		
})
function RIT_VG_FBack_Clicked()
{
	var RIT_Video_Gallery_First_Page=jQuery('#RIT_Video_Gallery_First_Page').html();
	var RIT_Video_Gallery_End_Page=jQuery('#RIT_Video_Gallery_End_Page').html();
	if(parseInt(RIT_Video_Gallery_First_Page)>1)
	{
		var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
		var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();

		setTimeout(function(){
			for(var i=1;i<=RIT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).hide(500);
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=RIT_Video_Gallery_Videos_Quantity;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).show(500);
			}
			jQuery('#RIT_Video_Gallery_First_Page').html(1);
		},1000);
	}
}
function RIT_VG_ChLeft_Clicked()
{
	var RIT_Video_Gallery_First_Page=jQuery('#RIT_Video_Gallery_First_Page').html();
	var RIT_Video_Gallery_End_Page=jQuery('#RIT_Video_Gallery_End_Page').html();
	if(parseInt(RIT_Video_Gallery_First_Page)>1)
	{
		var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
		var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();

		var RIT_Video_Gallery_Videos_Quantity_After=parseInt(RIT_Video_Gallery_Videos_Quantity)*(parseInt(RIT_Video_Gallery_First_Page)-1);
		var RIT_Video_Gallery_Videos_Quantity_Before=parseInt(RIT_Video_Gallery_Videos_Quantity)*(parseInt(RIT_Video_Gallery_First_Page)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=RIT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).hide(500);
			}
		},500);
		setTimeout(function(){
			for(var i=RIT_Video_Gallery_Videos_Quantity_Before;i<=RIT_Video_Gallery_Videos_Quantity_After;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).show(500);
			}
			var RIT_Video_Gallery_First_Page1=parseInt(RIT_Video_Gallery_First_Page)-1;
			jQuery('#RIT_Video_Gallery_First_Page').html(RIT_Video_Gallery_First_Page1);
		},1000);
	}
}
function RIT_VG_ChRight_Clicked()
{
	var RIT_Video_Gallery_First_Page=jQuery('#RIT_Video_Gallery_First_Page').html();
	var RIT_Video_Gallery_End_Page=jQuery('#RIT_Video_Gallery_End_Page').html();
	if(parseInt(RIT_Video_Gallery_First_Page)<parseInt(RIT_Video_Gallery_End_Page.substr(1)))
	{
		var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
		var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();

		var RIT_Video_Gallery_Videos_Quantity_After=parseInt(RIT_Video_Gallery_Videos_Quantity)*(parseInt(RIT_Video_Gallery_First_Page)+1);
		var RIT_Video_Gallery_Videos_Quantity_Before=parseInt(RIT_Video_Gallery_Videos_Quantity)*parseInt(RIT_Video_Gallery_First_Page)+1;
		setTimeout(function(){
			for(var i=1;i<RIT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).hide(500);
			}
		},500);
		setTimeout(function(){
			for(var i=RIT_Video_Gallery_Videos_Quantity_Before;i<=RIT_Video_Gallery_Videos_Quantity_After;i++)
			{
				if(i<=RIT_Video_Gallery_Count_Videos)
				{
					jQuery('#RIT_Video_Gallery_Video_'+i).show(500);
				}
			}
			var RIT_Video_Gallery_First_Page1=parseInt(RIT_Video_Gallery_First_Page)+1;
			jQuery('#RIT_Video_Gallery_First_Page').html(RIT_Video_Gallery_First_Page1);
		},1000);
	}	
}
function RIT_VG_FFor_Clicked()
{
	var RIT_Video_Gallery_First_Page=jQuery('#RIT_Video_Gallery_First_Page').html();
	var RIT_Video_Gallery_End_Page=jQuery('#RIT_Video_Gallery_End_Page').html();

	if(parseInt(RIT_Video_Gallery_First_Page)<parseInt(RIT_Video_Gallery_End_Page.substr(1)))
	{
		var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
		var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();

		var RIT_Video_Gallery_Videos_Quantity_Before=parseInt(RIT_Video_Gallery_Videos_Quantity)*(parseInt(RIT_Video_Gallery_End_Page.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<RIT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).hide(500);
			}
		},500);
		setTimeout(function(){
			for(var i=RIT_Video_Gallery_Videos_Quantity_Before;i<=RIT_Video_Gallery_Count_Videos;i++)
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).show(500);
			}
			var RIT_Video_Gallery_First_Page1=parseInt(RIT_Video_Gallery_End_Page.substr(1));
			jQuery('#RIT_Video_Gallery_First_Page').html(RIT_Video_Gallery_First_Page1);
		},1000);
	}
}
function RIT_VG_LM_Clicked()
{
	var RIT_Video_Gallery_Count_Videos=jQuery('#RIT_Video_Gallery_Count_Videos').val();
	var RIT_Video_Gallery_Videos_Quantity=jQuery('#RIT_Video_Gallery_Videos_Quantity').val();
	var RIT_Video_Gallery_Videos_Quantity_Hidden=jQuery('#RIT_Video_Gallery_Videos_Quantity_Hidden').val();

	var RIT_Video_Gallery_Videos_Quantity_Hidden1=parseInt(RIT_Video_Gallery_Videos_Quantity_Hidden)+1;
	var RIT_Video_Gallery_Videos_Quantity_Hidden2=parseInt(RIT_Video_Gallery_Videos_Quantity_Hidden)+parseInt(RIT_Video_Gallery_Videos_Quantity);
	setTimeout(function(){
		for(var i=RIT_Video_Gallery_Videos_Quantity_Hidden1;i<=RIT_Video_Gallery_Videos_Quantity_Hidden2;i++)
		{
			if(i<=parseInt(RIT_Video_Gallery_Count_Videos))
			{
				jQuery('#RIT_Video_Gallery_Video_'+i).show(500);
			}			
		}
		jQuery('#RIT_Video_Gallery_Videos_Quantity_Hidden').val(RIT_Video_Gallery_Videos_Quantity_Hidden2);	
		if(RIT_Video_Gallery_Videos_Quantity_Hidden2>=parseInt(RIT_Video_Gallery_Count_Videos))
		{
			jQuery('#RIT_Video_Gallery_Load_More').hide(500);
		}
		else
		{
			jQuery('#RIT_Video_Gallery_Load_More').show();
		}
	},1000);	
}
function RIT_VG_3D()
{
	var RIT_VG_3D_Deg=jQuery('#RIT_VG_3D_Deg').val();

	(function( $, undefined) {
		$.Gallery 				= function( options, element ) {
			this.$el	= $( element );
			this._init( options );
		};

		$.Gallery.defaults 		= {
				current		: 0,	// index of current item
				autoplay	: false,// slideshow on / off
				interval	: 2000  // time between transitions
		    };
		
		$.Gallery.prototype 	= {
			_init 				: function( options ) {
				this.options 		= $.extend( true, {}, $.Gallery.defaults, options );
				// support for 3d / 2d transforms and transitions
				this.support3d		= Modernizr.csstransforms3d;
				this.support2d		= Modernizr.csstransforms;
				this.supportTrans	= Modernizr.csstransitions;
				
				this.$wrapper		= this.$el.find('.RIT_VG_3Dwrap');
				
				this.$items			= this.$wrapper.children();
				this.itemsCount		= this.$items.length;
				
				this.$nav			= this.$el.find('nav');
				this.$navPrev		= this.$nav.find('.RIT_VG_3DPrev');
				this.$navNext		= this.$nav.find('.RIT_VG_3DNext');
				// minimum of 3 items
				if( this.itemsCount < 3 ) {
					this.$nav.remove();
					return false;
				}	
				this.current		= this.options.current;
				this.isAnim			= false;
				this.$items.css({
					'opacity'	: 0,
					'visibility': 'hidden'
				});
				this._validate();
				this._layout();
				// load the events
				this._loadEvents();
				// slideshow
				if( this.options.autoplay ) {
					this._startSlideshow();
				}
			},
			_validate			: function() {
				if( this.options.current < 0 || this.options.current > this.itemsCount - 1 ) {
					this.current = 0;
				}	
			},
			_layout				: function() {
				// current, left and right items
				this._setItems();
				// current item is not changed
				// left and right one are rotated and translated
				var leftCSS, rightCSS, currentCSS;
				if( this.support3d && this.supportTrans ) {
					leftCSS 	= {
						'-webkit-transform'	: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
						'-moz-transform'	: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
						'-o-transform'		: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
						'-ms-transform'		: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
						'transform'			: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')'
					};
					rightCSS	= {
						'-webkit-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
						'-moz-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
						'-o-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
						'-ms-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
						'transform'			: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')'
					};
					leftCSS.opacity		= 1;
					leftCSS.visibility	= 'visible';
					rightCSS.opacity	= 1;
					rightCSS.visibility	= 'visible';
				}
				else if( this.support2d && this.supportTrans ) {
					leftCSS 	= {
						'-webkit-transform'	: 'translate(-350px) scale(0.8)',
						'-moz-transform'	: 'translate(-350px) scale(0.8)',
						'-o-transform'		: 'translate(-350px) scale(0.8)',
						'-ms-transform'		: 'translate(-350px) scale(0.8)',
						'transform'			: 'translate(-350px) scale(0.8)'
					};
					rightCSS	= {
						'-webkit-transform'	: 'translate(350px) scale(0.8)',
						'-moz-transform'	: 'translate(350px) scale(0.8)',
						'-o-transform'		: 'translate(350px) scale(0.8)',
						'-ms-transform'		: 'translate(350px) scale(0.8)',
						'transform'			: 'translate(350px) scale(0.8)'
					};
					currentCSS	= {
						'z-index'			: 999
					};
					leftCSS.opacity		= 1;
					leftCSS.visibility	= 'visible';
					rightCSS.opacity	= 1;
					rightCSS.visibility	= 'visible';
				}
				this.$leftItm.css( leftCSS || {} );
				this.$rightItm.css( rightCSS || {} );
				this.$currentItm.css( currentCSS || {} ).css({
					'opacity'	: 1,
					'visibility': 'visible'
				}).addClass('dg-center');
			},
			_setItems			: function() {
				this.$items.removeClass('dg-center');
				this.$currentItm	= this.$items.eq( this.current );
				this.$leftItm		= ( this.current === 0 ) ? this.$items.eq( this.itemsCount - 1 ) : this.$items.eq( this.current - 1 );
				this.$rightItm		= ( this.current === this.itemsCount - 1 ) ? this.$items.eq( 0 ) : this.$items.eq( this.current + 1 );
				if( !this.support3d && this.support2d && this.supportTrans ) {
					this.$items.css( 'z-index', 1 );
					this.$currentItm.css( 'z-index', 999 );
				}
				// next & previous items
				if( this.itemsCount > 3 ) {
					// next item
					this.$nextItm		= ( this.$rightItm.index() === this.itemsCount - 1 ) ? this.$items.eq( 0 ) : this.$rightItm.next();
					this.$nextItm.css( this._getCoordinates('outright') );
					// previous item
					this.$prevItm		= ( this.$leftItm.index() === 0 ) ? this.$items.eq( this.itemsCount - 1 ) : this.$leftItm.prev();
					this.$prevItm.css( this._getCoordinates('outleft') );
				}
			},
			_loadEvents			: function() {
				var _self	= this;
				this.$navPrev.on( 'click.gallery', function( event ) {
					if( _self.options.autoplay ) {
						clearTimeout( _self.slideshow );
						_self.options.autoplay	= false;
					}
					_self._navigate('prev');
					return false;
				});
				this.$navNext.on( 'click.gallery', function( event ) {
					if( _self.options.autoplay ) {
						clearTimeout( _self.slideshow );
						_self.options.autoplay	= false;
					}
					_self._navigate('next');
					return false;
				});
				this.$wrapper.on( 'webkitTransitionEnd.gallery transitionend.gallery OTransitionEnd.gallery', function( event ) {
					_self.$currentItm.addClass('dg-center');
					_self.$items.removeClass('dg-transition');
					_self.isAnim	= false;
				});
			},
			_getCoordinates		: function( position ) {
				if( this.support3d && this.supportTrans ) {
					switch( position ) {
						case 'outleft':
							return {
								'-webkit-transform'	: 'translateX(-450px) translateZ(-300px) rotateY('+RIT_VG_3D_Deg+')',
								'-moz-transform'	: 'translateX(-450px) translateZ(-300px) rotateY('+RIT_VG_3D_Deg+')',
								'-o-transform'		: 'translateX(-450px) translateZ(-300px) rotateY('+RIT_VG_3D_Deg+')',
								'-ms-transform'		: 'translateX(-450px) translateZ(-300px) rotateY('+RIT_VG_3D_Deg+')',
								'transform'			: 'translateX(-450px) translateZ(-300px) rotateY('+RIT_VG_3D_Deg+')',
								'opacity'			: 0,
								'visibility'		: 'hidden'
							};
							break;
						case 'outright':
							return {
								'-webkit-transform'	: 'translateX(450px) translateZ(-300px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-moz-transform'	: 'translateX(450px) translateZ(-300px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-o-transform'		: 'translateX(450px) translateZ(-300px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-ms-transform'		: 'translateX(450px) translateZ(-300px) rotateY(-'+RIT_VG_3D_Deg+')',
								'transform'			: 'translateX(450px) translateZ(-300px) rotateY(-'+RIT_VG_3D_Deg+')',
								'opacity'			: 0,
								'visibility'		: 'hidden'
							};
							break;
						case 'left':
							return {
								'-webkit-transform'	: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
								'-moz-transform'	: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
								'-o-transform'		: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
								'-ms-transform'		: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
								'transform'			: 'translateX(-350px) translateZ(-200px) rotateY('+RIT_VG_3D_Deg+')',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
						case 'right':
							return {
								'-webkit-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-moz-transform'	: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-o-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
								'-ms-transform'		: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
								'transform'			: 'translateX(350px) translateZ(-200px) rotateY(-'+RIT_VG_3D_Deg+')',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
						case 'center':
							return {
								'-webkit-transform'	: 'translateX(0px) translateZ(0px) rotateY(0deg)',
								'-moz-transform'	: 'translateX(0px) translateZ(0px) rotateY(0deg)',
								'-o-transform'		: 'translateX(0px) translateZ(0px) rotateY(0deg)',
								'-ms-transform'		: 'translateX(0px) translateZ(0px) rotateY(0deg)',
								'transform'			: 'translateX(0px) translateZ(0px) rotateY(0deg)',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
					};
				}
				else if( this.support2d && this.supportTrans ) {
					switch( position ) {
						case 'outleft':
							return {
								'-webkit-transform'	: 'translate(-450px) scale(0.7)',
								'-moz-transform'	: 'translate(-450px) scale(0.7)',
								'-o-transform'		: 'translate(-450px) scale(0.7)',
								'-ms-transform'		: 'translate(-450px) scale(0.7)',
								'transform'			: 'translate(-450px) scale(0.7)',
								'opacity'			: 0,
								'visibility'		: 'hidden'
							};
							break;
						case 'outright':
							return {
								'-webkit-transform'	: 'translate(450px) scale(0.7)',
								'-moz-transform'	: 'translate(450px) scale(0.7)',
								'-o-transform'		: 'translate(450px) scale(0.7)',
								'-ms-transform'		: 'translate(450px) scale(0.7)',
								'transform'			: 'translate(450px) scale(0.7)',
								'opacity'			: 0,
								'visibility'		: 'hidden'
							};
							break;
						case 'left':
							return {
								'-webkit-transform'	: 'translate(-350px) scale(0.8)',
								'-moz-transform'	: 'translate(-350px) scale(0.8)',
								'-o-transform'		: 'translate(-350px) scale(0.8)',
								'-ms-transform'		: 'translate(-350px) scale(0.8)',
								'transform'			: 'translate(-350px) scale(0.8)',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
						case 'right':
							return {
								'-webkit-transform'	: 'translate(350px) scale(0.8)',
								'-moz-transform'	: 'translate(350px) scale(0.8)',
								'-o-transform'		: 'translate(350px) scale(0.8)',
								'-ms-transform'		: 'translate(350px) scale(0.8)',
								'transform'			: 'translate(350px) scale(0.8)',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
						case 'center':
							return {
								'-webkit-transform'	: 'translate(0px) scale(1)',
								'-moz-transform'	: 'translate(0px) scale(1)',
								'-o-transform'		: 'translate(0px) scale(1)',
								'-ms-transform'		: 'translate(0px) scale(1)',
								'transform'			: 'translate(0px) scale(1)',
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
					};
				}
				else {
					switch( position ) {
						case 'outleft'	: 
						case 'outright'	: 
						case 'left'		: 
						case 'right'	:
							return {
								'opacity'			: 0,
								'visibility'		: 'hidden'
							};
							break;
						case 'center'	:
							return {
								'opacity'			: 1,
								'visibility'		: 'visible'
							};
							break;
					};
				}
			},
			_navigate			: function( dir ) {
				if( this.supportTrans && this.isAnim )
					return false;
				this.isAnim	= true;
				switch( dir ) {
					case 'next' :
						this.current	= this.$rightItm.index();
						// current item moves left
						this.$currentItm.addClass('dg-transition').css( this._getCoordinates('left') );
						// right item moves to the center
						this.$rightItm.addClass('dg-transition').css( this._getCoordinates('center') );	
						// next item moves to the right
						if( this.$nextItm ) {
							// left item moves out
							this.$leftItm.addClass('dg-transition').css( this._getCoordinates('outleft') );
							this.$nextItm.addClass('dg-transition').css( this._getCoordinates('right') );
						}
						else {
							// left item moves right
							this.$leftItm.addClass('dg-transition').css( this._getCoordinates('right') );
						}
						break;
					case 'prev' :
						this.current	= this.$leftItm.index();
						// current item moves right
						this.$currentItm.addClass('dg-transition').css( this._getCoordinates('right') );
						// left item moves to the center
						this.$leftItm.addClass('dg-transition').css( this._getCoordinates('center') );
						// prev item moves to the left
						if( this.$prevItm ) {
							// right item moves out
							this.$rightItm.addClass('dg-transition').css( this._getCoordinates('outright') );
							this.$prevItm.addClass('dg-transition').css( this._getCoordinates('left') );
						}
						else {
							// right item moves left
							this.$rightItm.addClass('dg-transition').css( this._getCoordinates('left') );
						}
						break;	
				};
				this._setItems();
				if( !this.supportTrans )
					this.$currentItm.addClass('dg-center');
			},
			_startSlideshow		: function() {
				var _self	= this;
				this.slideshow	= setTimeout( function() {
					_self._navigate( 'next' );
					if( _self.options.autoplay ) {
						_self._startSlideshow();
					}
				}, this.options.interval );
			},
			destroy				: function() {
				this.$navPrev.off('.gallery');
				this.$navNext.off('.gallery');
				this.$wrapper.off('.gallery');
			}
		};
		var logError 			= function( message ) {
			if ( this.console ) {
				console.error( message );
			}
		};
		$.fn.gallery			= function( options ) {
			if ( typeof options === 'string' ) {
				var args = Array.prototype.slice.call( arguments, 1 );
				this.each(function() {
					var instance = $.data( this, 'gallery' );
					if ( !instance ) {
						logError( "cannot call methods on gallery prior to initialization; " +
						"attempted to call method '" + options + "'" );
						return;
					}
					if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
						logError( "no such method '" + options + "' for gallery instance" );
						return;
					}
					instance[ options ].apply( instance, args );
				});
			} 
			else {
				this.each(function() {
					var instance = $.data( this, 'gallery' );
					if ( !instance ) {
						$.data( this, 'gallery', new $.Gallery( options, this ) );
					}
				});
			}
			return this;
		};
	})( jQuery );
}
function RIT_VG_GHE_Click(RIT_Video_SRC)
{
	alert(RIT_Video_SRC);
}