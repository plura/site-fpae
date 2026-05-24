plura.obj('ptheme.Columns', function (options) {

	"use strict";

	var defaults = {
			separator: 'h3',
			columns: {
				xs: 1,
				sm: 2,
				md: 2,
				lg: 2
			},
			classes: {
				content: 'row',
				group: 	 'group',
				columns: 'col-xs-12 col-sm-6',
				skipped: 'col-xs-12'
			}
		},

		opts, groups, nr_columns,

		_this = this, _breakpoints = ptheme.constants.BreakPoints,


		resize = function ( data ) {

			if (objects) {

				fill();

			}

		},



		fill = function() {

			var clss, n = get_nr_columns(), i, o, target = opts.target;

			//if nr_columns is different
			if ( nr_columns !== n ) {

				target.children('c').remove();

				for(i = 0; i < n; i += 1) {

					clss	= opts.classes.columns + ' c' + i;

					o 		= $('<div/>').addClass( clss ).appendTo( target );

				}

				//append groups in each column, sequentially
				for( i=0; i < groups.length; i += 1) {

					opts.target.find('.c' + ( i % n ) ).append( groups[i] );

				}

			}

			nr_columns = n;			

		},


		order = function ( target ) {

			var classes = opts.classes, i, object;

			groups = [];

			//get 'sections'
			target.find( opts.separator ).each( function() {

				groups.push(

					$(this).add( $(this).nextUntil( opts.separator ) )

				);

			});

			//wrap existent content in single column div
			target.addClass( classes.content )

			.children().wrapAll('<div class="' + classes.skipped + '"/>');

			fill();

		},


		get_nr_columns = function () {

			var breakpoints = ['xs'], i, n = 1, w = $(window).width();

			console.log(w+":"+_breakpoints.WIDTH_SM);

			if( w >= _breakpoints.WIDTH_SM  ) {

				breakpoints.push('sm');

			}

			if( w >= _breakpoints.WIDTH_MD ) {

				breakpoints.push('md');

			}

			if ( w >= _breakpoints.WIDTH_LG ) {

				breakpoints.push('lg');

			}

			if ( typeof opts.columns === 'number' ) {

				return opts.columns;

			} else {

				for( i = 0; i < breakpoints.length; i += 1 ) {

					if ( opts.columns[ breakpoints[i] ] ) {

						n = opts.columns[ breakpoints[i] ];

					}

				}

			}

			return n;

		},



		init = function () {

			opts = $.extend( true, {}, defaults, options );

			order( opts.target );

		};


	_this.resize = resize;


	init();

});