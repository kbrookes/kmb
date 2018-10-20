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
	<div class="row">	
		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<div class="col-12 col-sm-4 col-md-3">
				<div class="store-page__item-image">
				<?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"><?php endif ;?>
					<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-fluid" />
				<?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="col-12 <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>col-sm-8 col-md-9<?php endif; ?>">
			<div class="store-page__item-header">
				<?php if($this->item->params->get('catItemTitle')): ?>
				<div class="store-page__item-header_title">
					<h3><?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?><?php echo $this->item->title; ?><?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?></h3>
				</div>
				<?php endif; ?>
				<?php if(!empty($this->item->extraFields->AddOnType->value)):?>
				<div class="store-page__item-type">
					<?php echo $this->item->extraFields->AddOnType->value; ?>
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
			
			<?php if($this->item->params->get('catItemIntroText')): ?>
			<div class="store-page__item-intro">
				<?php echo $this->item->introtext; ?>
			</div>
			<?php endif; ?>
			
			<div class="store-page__item-actions">
				<?php if ($this->item->params->get('catItemReadMore')): ?>
				<div class="store-item__actions-readmore">
					<a class="btn btn-outline-primary btn-sm" href="<?php echo $this->item->link; ?>">
						<?php echo JText::_('K2_READ_MORE'); ?>
					</a>
				</div>
				<?php endif; ?>
				<?php if(!empty($this->item->extraFields->StoreFreeTrial->value)): ?>
				<div class="store-item__actions-trial">
					<a href="<?php echo $this->item->extraFields->StoreFreeTrial->value; ?>" class="btn btn-primary btn-sm">Free Trial</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		
	</div>
</div>

