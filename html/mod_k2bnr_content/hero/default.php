<?php
/*
// "K2 Content" Module by JoomlaWorks for Joomla! 1.5.x - Version 2.1
// Copyright (c) 2006 - 2009 JoomlaWorks Ltd. All rights reserved.
// Released under the GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
// More info at http://www.joomlaworks.gr and http://k2.joomlaworks.gr
// Designed and developed by the JoomlaWorks team
// *** Last update: September 9th, 2009 ***
*/
/* NOTE - REQUIRES hero-header.scss file and hero-header position in template 
	If parallex scrolling is required, do the following:
	1) Download library: https://github.com/erensuleymanoglu/parallax-background
	2) Add to js folder and index.php
	3) Add the .parallax class to the __wrap element below, then add this code to that element:
	
	 data-parallax-bg-image="<?php echo $params->get('backgroundimage'); ?>"
	
	4) Uncomment the script element at the bottom of the file
	
	If this template is already setup for parralax, and you want the opposite, reverse these instructions.

	THIS IS ONLY FOR USE WITH K2 ITEMS THAT HAVE IMAGES

 */
// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2BNRModuleBox<?php echo $module->id; ?>" class="hero-header__wrap <?php echo $params->get('moduleclass_sfx'); ?> parallax" data-parallax-bg-position="center top" data-parallax-bg-image="<?php echo $item->image; ?>" <?php if ($params->get('bnrItemImage')) : ?> style="background-image:url(<?php echo $item->image; ?>)"<?php endif; ?>>
	<div class="container">
		<div class="hero-header__wrap-inner">
			<?php if(!empty($item->extraFields->AlternateHeroContent->value)):?>
				<?php echo $item->extraFields->AlternateHeroContent->value; ?>
			<?php else: ?>
			<h1><?php echo $item->title; ?></h1>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	/// ADD PARRALAX FUNCTIONALITY. REMOVE IF NOT NEEDED.
    (function ($) {
        $('.parallax').parallaxBackground();
    })(jQuery);

    /// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
    (function($) {
	    $('body').addClass('hasHero')
	    $('body').removeClass('noHero');
	})(jQuery);
</script>