<?php
/**
 * @version    2.8.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2017 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);


?>


<div class="casestudy-page__list-item group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
	<div class="casestudy-page__list-item_image" style="background-image: url(<?php echo $this->item->image; ?>);">
		<?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?>
		<div class="casestudy-page__list-item_image-inner">
			<span class="read-more">READ MORE</span>
		</div>
		<?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if($this->item->params->get('catItemTitle')): ?>
	<div class="casestudy-page__list-item_title d-flex justify-content-center">
		<h3 class="casestudy-page__list-item_name"><?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?><?php echo $this->item->title; ?><?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?></h3>
	</div>
	<?php endif; ?>
	<?php if($this->item->params->get('catItemIntroText')): ?>
	<div class="casestudy-page__list-item_intro">
		<?php echo $this->item->introtext; ?>
	</div>
	<?php endif; ?>
	
</div>

