/**
 *
 * @param	hover	if false, social-icons should be triggered by ":hovering" its parent via CSS. In this case the 'trigger' should be a .social-icons' parent
 */
plura.obj('ptheme.layout.Share', function (options) {

	"use strict";

	var defaults = {
			hover: 		false,
			classes: 	{
				active: 	'active',
				trigger: 	'social-icons-trigger'
			}
		},

		id, opts, status, ui_share, ui_trigger, _this = this,


		activate = function ( on ) {

			var clss = opts.classes.active, evt = 'click';

			if (on && !status) {

				if ( !is_share_childof_trigger() ) {

					ui_share.addClass( clss );

				}

				ui_trigger.addClass( clss );

				$(document).on(evt, eventDocumentClickHandler);

			} else if(!on) {

				ui_share.removeClass( clss );

				ui_trigger.removeClass( clss );

				$(document).off(evt, eventDocumentClickHandler);			

			}

			status = on;

		},


		eventTriggerClickHandler = function (event) {

			event.preventDefault();
			
			event.stopImmediatePropagation();

			activate( !status );

		},


		eventDocumentClickHandler = function (event) {
	
			if ( !$(event.target).closest('.' + id + ' a').length ) {

				activate( false );

			}

		},


		is_share_childof_trigger = function () {

			return ui_trigger.find('.' + id).length;

		},


		init = function () {

			var classes_trigger, classes_share;

			opts 			= $.extend(true, {}, defaults, options);


			id				= 'share' + (new Date().getTime());

			classes_share	= [ id ];

			ui_share		= options.target.addClass( classes_share.join(' ') );


			ui_trigger		= options.trigger;

			classes_trigger	= [ opts.classes.trigger ];

			if (!opts.hover) {

				ui_trigger.click( eventTriggerClickHandler );

			}

			ui_trigger.addClass( classes_trigger.join(' ') );

		};


	_this.activate = activate;

	init();

});