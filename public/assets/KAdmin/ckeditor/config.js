/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,undo,wsc,autosave,iframedialog,lightbox,lineutils,widget,oembed,youtube';
	config.skin = 'office2013';
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	 //config.language = 'ar';
	 config.uiColor = '#AADC6E';
	 config.extraPlugins = 'imgupload';
	 config.extraPlugins = 'imagebrowser';
	 config.extraPlugins = 'imgbrowse';
	 config.extraPlugins = 'filebrowser';
	 config.extraPlugins = 'popup';
	 config.fullPage = true;
	 config.allowedContent = true;
	 
	
	config.filebrowserBrowseUrl = 'elfinder/elfinder.php?integration=ckeditor';
	config.filebrowserImageBrowseUrl = 'elfinder/elfinder.php?type=Image';
	config.removeDialogTabs = 'link:upload;image:upload';
};

