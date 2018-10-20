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


<div class="store-page__item group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	
	<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
	<!-- Item Image -->
	<div class="store-page__item-image">
		<?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"><?php endif ;?>
			<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-fluid" />
		<?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?>
	</div>
	<?php endif; ?>
	
	<div class="store-page__item-header">
		<?php if($this->item->params->get('catItemTitle')): ?>
		<div class="store-page__item-header_title">
			<h3><?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?><?php echo $this->item->title; ?><?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?></h3>
		</div>
		<?php endif; ?>
		<div class="store-page__item-header_info">
			<?php if($this->item->params->get('catItemAuthor')): ?>
			<span class="catItemAuthor">
			<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
				Written by <a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
			<?php else: ?>
				<?php echo $this->item->author->name; ?>
			<?php endif; ?>
			</span>
		<?php endif; ?>
		<?php if(($this->item->params->get('catItemAuthor')) && ($this->item->params->get('catItemIntroText'))): ?>
		&nbsp;&nbsp;|&nbsp;&nbsp;
		<?php endif; ?>
		<?php if($this->item->params->get('catItemDateCreated')): ?>
			<span class="catItemDateCreated">
				<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
			</span>
		<?php endif; ?>
		</div>
	</div>
	
	<?php if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
	<div class="catItemVideoBlock">
		<?php if($this->item->videoType=='embedded'): ?>
		<div class="catItemVideoEmbedded">
			<?php echo $this->item->video; ?>
		</div>
		<?php else: ?>
		<span class="catItemVideo"><?php echo $this->item->video; ?></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	<?php if($this->item->params->get('catItemIntroText')): ?>
	<div class="store-page__item_intro">
		<?php echo $this->item->introtext; ?>
	</div>
	<?php endif; ?>
	
	<div class="store-page__item-actions">
		<?php if ($this->item->params->get('catItemReadMore')): ?>
		<span>
			<a class="btn btn-outline-primary btn-sm" href="<?php echo $this->item->link; ?>">
				<?php echo JText::_('K2_READ_MORE'); ?>
			</a>
		</span>
		<?php endif; ?>
		<?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
		<div class="store-page__item-actions_tags">
		    <?php foreach ($this->item->tags as $tag): ?>
		    <span><a href="<?php echo $tag->link; ?>"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a> </span>&nbsp;
		    <?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	
	<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>
	
	<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>
	
</div>

