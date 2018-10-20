<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 /* NOTE - REQUIRES hero-header.scss file and hero-header position in template 
	If parallex scrolling is required, do the following:
	1) Download library: https://github.com/erensuleymanoglu/parallax-background
	2) Add to js folder and index.php
	3) Add the .parallax class to the __wrap element below, then add this code to that element:
	
	 data-parallax-bg-image="<?php echo $params->get('backgroundimage'); ?>"
	
	4) Uncomment the script element at the bottom of the file
	
	If this template is already setup for parralax, and you want the opposite, reverse these instructions.
	 
 */

defined('_JEXEC') or die;
?>


<div class="hero-header__wrap <?php echo $moduleclass_sfx; ?> parallax" data-parallax-bg-position="center top" data-parallax-bg-image="/<?php echo $params->get('backgroundimage'); ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url('/<?php echo $params->get("backgroundimage"); ?>')"<?php endif; ?>>
	<div class="container">
		<div class="hero-header__wrap-inner">
			<?php echo $module->content; ?>
		</div>
	</div>
</div>

<script>
	/// ADD PARRALAX FUNCTIONALITY. REMOVE IF NOT NEEDED.
    (function ($) {
        $('.parallax').parallaxBackground({
	        parallaxBgPosition: "right center",
	        parallaxDirection: "down",
	        parallaxBgSize: "cover",
	        parallaxSpeed: 0.2
        });
    })(jQuery);

    /// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
    (function($) {
	    $('body').addClass('hasHero')
	    $('body').removeClass('noHero');
	})(jQuery);
</script>