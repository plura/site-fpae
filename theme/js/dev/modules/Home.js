plura.obj('ptheme.modules.Home', function (options) {

	"use strict";

	var _this = this, _breakpoints = ptheme.constants.BreakPoints,



		resize = function ( data ) {

			var news_btn_holder = $('.module.news .btn-holder'), news_btn_holder_h = '';/*,

				banner_logo		= $('banner')*/

			if ( data.window.width >= _breakpoints.WIDTH_SM) {

				news_btn_holder_h = news_btn_holder.parent().height();

			}

			news_btn_holder.height( news_btn_holder_h );

			//position();

		},



		init = function () {



		};


	_this.resize = resize;


	init();

});