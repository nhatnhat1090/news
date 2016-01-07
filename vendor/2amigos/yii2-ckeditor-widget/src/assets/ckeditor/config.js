/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.extraPlugins = 'youtube';
        config.skin = 'office2013';
        // Config using CKFinder
        config.filebrowserBrowseUrl = BaseUrl;
        config.filebrowserImageUrl = BaseUrl+'?type=Images';
        //config.toolbar = [{ name: 'insert', items: ['Image', 'Youtube']}];
};
