<?php # additional_url_helpers

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function main_site_static_url(){
	return 'http://portfolio.neilgirardi.com/portfolio/common_elements/main_site/';
}

// URL helper for Celsius static content (CSS, JS, images. etc.)
function celsius_static_url(){
	return 'http://portfolio.neilgirardi.com/portfolio/common_elements/portfolio_sites/celsius/';
}
	

// URL helper for Celisus pages
function celsius_page_url(){
	return 'http://portfolio.neilgirardi.com/portfolio/celsius/';
}


// URL helper for jQueryPlugin  static content
function jqueryplugin_static_url(){
	return 'http://portfolio.neilgirardi.com/portfolio/common_elements/portfolio_sites/jqueryplugin/';
}


// URL helper for GamingSiteTemplate
function gamingsitetemplate_static_url(){
	return 'http://portfolio.neilgirardi.com/portfolio/common_elements/portfolio_sites/gamingsitetemplate/';
}


function redirect_url(){
	return '<script type="text/javascript" src="http://portfolio.neilgirardi.com/portfolio/common_elements/portfolio_sites/portfolioredirect/portfolio-redirect.js"></script>';
}