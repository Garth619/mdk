<?php


/*  Copyright 2019 Jörn Lund

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
Plugin was generated with Jörn Lund's WP Skelton
https://github.com/mcguffin/wp-skeleton
*/


namespace ACFQuickEdit;

if ( ! defined('ABSPATH') ) {
	die('FU!');
}


if ( is_admin() || wp_doing_ajax() ) {

	require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/autoload.php';

	Core\Core::instance( __FILE__ );

	Admin\Admin::instance();
}
