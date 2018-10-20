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

// MUST have these extraField values to work

$teamLinkedin ='';
$teamRole = '';
$teamPhone = '';
$teamMobile = '';
$teamEmail = '';
if (!empty($this->item->extraFields->teamLinkedin->value)):
	$teamLinkedin = $this->item->extraFields->teamLinkedin->value;
endif;
if(!empty($this->item->extraFields->teamRole->value)):
	$teamRole = $this->item->extraFields->teamRole->value;
endif;
if(!empty($this->item->extraFields->teamPhone->value)):
	$teamPhone = $this->item->extraFields->teamPhone->value;
endif;
if(!empty($this->item->extraFields->teamMobile->value)):
	$teamMobile = $this->item->extraFields->teamMobile->value;
endif;
if(!empty($this->item->extraFields->teamEmail->value)):
	$teamEmail = $this->item->extraFields->teamEmail->value;
endif;
?>


<div class="team-page__categories-subcat_item group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
	<div class="team-page__categories-subcat_item-image">
		<?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?>
			<img src="<?php echo $this->item->image; ?>" class="img-fluid" />
		<?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if($this->item->params->get('catItemTitle')): ?>
	<div class="team-page__categories-subcat_item-title d-flex <?php if(!empty($this->item->extraFields->teamLinkedin->value)):?>justify-content-between<?php endif; ?>">
		<h3 class="team-page__categories-subcat_item-name"><?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?><?php echo $this->item->title; ?><?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?></h3>
		<?php if(!empty($this->item->extraFields->teamLinkedin->value)):?>
			<span class="contact-detail"> <a href="<?php echo $teamLinkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	<div class="team-page__categories-subcat_item-content">
		<?php if(!empty($this->item->extraFields->teamRole->value)):?>
		<h4><?php echo $teamRole; ?></h4>
		<?php endif;?>
		<div class="team-page__categories-subcat_item-content_voice">
			<?php if(!empty($this->item->extraFields->teamPhone->value)):?>
				<span class="contact-detail"><i class="fa fa-phone"></i> <a href="tel:<?php echo $teamPhone; ?>"><?php echo $teamPhone; ?></a></span>
			<?php endif; ?>
			<?php if(!empty($this->item->extraFields->teamPhone->value) && !empty($this->item->extraFields->teamMobile->value)):?><span class="contact-separator"> || </span><?php endif; ?>
			<?php if(!empty($this->item->extraFields->teamMobile->value)):?>
				<span class="contact-detail"><i class="fa fa-mobile"></i> <a href="<?php echo $teamMobile; ?>"><?php echo $teamMobile; ?></a></span>
			<?php endif; ?>
		</div>
		<div class="team-page__categories-subcat_item-content_email">
			<?php if(!empty($this->item->extraFields->teamEmail->value)):?>
				<span class="contact-detail"><i class="fa fa-envelope"></i> <?php echo $teamEmail; ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>

