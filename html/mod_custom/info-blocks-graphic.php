<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 /* 
	 
	NOTE - REQUIRES info-blocks-graphic.scss file and a position in the template with a parent with the class 'row'
	This is an individual column element in a row of info-blocks.
	The background image in the options tab will be rendered above the image as an in-line element.
	Each info-block module **must** have a col- attribute set in the module class
	MUST use module layout none
	
*/

defined('_JEXEC') or die;
?>


<div class="info-block-graphic <?php echo $moduleclass_sfx; ?>" >
	<div class="info-block-graphic__inner">
		<?php if ($params->get('backgroundimage')) : ?>
		<div class="info-block-graphic__inner-image">
			<img src="<?php echo $params->get('backgroundimage'); ?>" class="img-fluid" />
		</div>
		<?php endif; ?>
		<div class="info-block-graphic__inner-content">
		<?php echo $module->content; ?>
		</div>
	</div>
</div>
