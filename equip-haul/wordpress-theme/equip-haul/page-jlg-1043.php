<?php
/**
 * Template Name: JLG 1043
 *
 * Named per-unit template so this machine is selectable by name in the
 * WordPress Page Attributes → Template dropdown. The actual rendering
 * logic lives in one shared file so there's nothing to duplicate or
 * fall out of sync across units — see BUILD-PLAN.md §23.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require __DIR__ . '/template-parts/equipment-unit-render.php';
