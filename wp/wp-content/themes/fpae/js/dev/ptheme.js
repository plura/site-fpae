plura.obj('pTheme', function (options) {

	"use strict";

	var resizemanager, _this = this,
	
		THEME_PROCESS	= options.process,
		THEME_LANG		= options.pwp.lang,


		resize = function (data) {

			$('body>.social-icons').width( data.window.width ).height( data.window.height );

		},


		get_module = function ( pwp ) {

			var module, target;

			if ( pwp.front_page ) {

				module = new ptheme.modules.Home();		

			} else if ( pwp.selected.type === 'page') {

				target = $('#content article');

				switch( pwp.selected.id ) {

				case 13: 	//contacts

					module = new ptheme.modules.Contacts({
						lang: 		THEME_LANG, 
						process:	THEME_PROCESS,
						target: 	target
					});

					break;

				case 9: 			//social-bodies grid

					module = new ptheme.modules.SocialBodiesGrid({
						target: 	target
					});

					break;

				}

			} else {

				switch( pwp.selected.type ) {

				case 'fpae_members': //social-bodies grid

					module = new ptheme.modules.SocialBodies({
						target: 	$('#content article .entry-content')
					});

					break;

				}

			}

			return module;

		},



		init_modules = function () {

			var a = [ _this ], pwp = options.pwp, module = get_module( pwp ),

				ui_quotes = $('#modal-contacts');

			if (module) {

				a.push( module );

			}

			a.push( new ptheme.modules.Footer({
					pwp:		pwp,
					process: 	THEME_PROCESS
			}) );


			if ( ui_quotes.length ) {

				/*a.push( new ptheme.modules.Quotes({
					lang:		THEME_LANG,
					process:	THEME_PROCESS,
					target:		ui_quotes
				}));*/

			}

			a.push( new ptheme.layout.Share({
				trigger: 	$('footer.main .social-icons .icon.share'),
				target: 	$('body>.social-icons.pop')
			}));

			return a;

		},



		init = function () {

			var modules		= init_modules();

			resizemanager	= new ptheme.layout.ResizeManager({
				objects:	modules
			});

			$('#qtranslate-chooser').addClass('dropdown-menu');

		};


	_this.resize = resize;


	init();

});



$(function(){ 

	var theme = new pTheme({
		process: 	PWP.template_dir + 'process/process.php',
		pwp: 		PWP
	});

});