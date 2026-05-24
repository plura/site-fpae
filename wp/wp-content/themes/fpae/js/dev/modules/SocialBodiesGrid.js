plura.obj('ptheme.modules.SocialBodiesGrid', function (options) {

	"use strict";

	var columns, _this = this,



		resize = function () {



		},


		init = function () {

			columns = new ptheme.Columns({

				target: options.target.find('.grid .grid-item:first-child .panel-body .content')

			});

		};


	_this.resize = resize;


	init();

});