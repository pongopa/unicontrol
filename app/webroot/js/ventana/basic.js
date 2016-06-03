/*
 * SimpleModal Basic Modal Dialog
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2010 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: basic.js,v 1.1 2011-06-22 21:18:54 desitec Exp $
 *
 */

jQuery(function ($) {
	$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();
		  return false;
	});
});

/**
jQuery(document).ready(function() {
jQuery("#box_popup").overlay({
	top: 150,
	mask: {color: '#280000',loadSpeed: 200,opacity: 0.5},
	closeOnClick: false,
	load: true
});
});

/**/

