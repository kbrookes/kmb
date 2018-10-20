<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 /* 
	 
	NOTE - REQUIRES info-blocks.scss file and info-blocks position in template 
	This is an individual column element in a row of info-blocks.
	Each info-block module **must** have a col- attribute set in the module class
	MUST use module layout none
*/

defined('_JEXEC') or die;
?>


<div class="info-block <?php echo $moduleclass_sfx; ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage'); ?>)"<?php endif; ?> >
	<div class="info-block__inner">
		<?php echo $module->content; ?>
	</div>
</div>
