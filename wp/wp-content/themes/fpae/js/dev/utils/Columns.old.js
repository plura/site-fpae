plura.obj('ptheme.Columns', function (options) {

	"use strict";

	var defaults = {
			separator: 'h3',
			classes: {
				content: 	'row',
				columns: 	'col-xs-12 col-sm-6',
				group: 	 	'group',
				skipped: 	'col-xs-12'
			}
		},

		opts, objects, _this = this,



		resize = function () {




		},


		d = function () {

			var classes = opts.classes;

			//remove holders
			opts.target.children( '.' + classes.columns.join('.') ).remove();

			
			

		}



		order = function ( target ) {

			var classes = opts.classes, cols = [], i, group;

			//get 'sections'
			target.find( opts.separator ).each( function() {

				cols.push(

					$(this).add( $(this).nextUntil( opts.separator ) )

				);

			});

			//place sections
			for( i = 0;  i < cols.length; i += 1) {

				group 	= $('<div/>').append( cols[i] ).addClass( classes.group );

				objects = ( [] || objects ).push( group );

				//objects = !i ? object : objects.add( object );

			}

			//wrap existent content in single column div
			target.children().wrapAll('<div class="' + classes.skipped + '"/>');

			target.append( objects ).addClass( classes.content );

		},



		init = function () {

			opts = $.extend( true, {}, defaults, options );

			order( options.target );

		};


	_this.resize = resize;


	init();

});