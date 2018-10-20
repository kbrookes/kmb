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

<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="team-solo" class="team-page__item <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<div class="container">
		<?php if($this->item->params->get('itemTitle')): ?>
		<div class="team-page__item-title team-page__item-title_mobile">
			<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
			<?php if(!empty($teamRole)): ?>
			<div class="team-page__item-title_role">
				<?php echo $teamRole; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="row">
			<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
			<div class="col-xs-12 col-sm-3 col-md-4 team-page__item-image">				
				<div class="team-page__item-image_wrap">
					<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-fluid" />
				</div>
			</div>
			<?php endif; ?>
			<div class="col-xs-12 <?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>col-sm-9 col-md-8<?php endif; ?> team-page__item-info">
				<?php if($this->item->params->get('itemTitle')): ?>
				<div class="team-page__item-title team-page__item-title_notMobile team-page__item-info_title">
					<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
					<?php if(!empty($teamRole)): ?>
					<div class="team-page__item-title_role">
						<?php echo $teamRole; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="team-page__item-actions">
					<div class="team-page__item-actions_voice">
						<?php if(!empty($this->item->extraFields->teamPhone->value)):?>
							<span class="contact-detail"><i class="fa fa-phone"></i> <a href="tel:<?php echo $teamPhone; ?>"><?php echo $teamPhone; ?></a></span>
						<?php endif; ?>
						<?php if(!empty($this->item->extraFields->teamPhone->value) && !empty($this->item->extraFields->teamMobile->value)):?><span class="contact-separator"> || </span><?php endif; ?>
						<?php if(!empty($this->item->extraFields->teamMobile->value)):?>
							<span class="contact-detail"><i class="fa fa-mobile"></i> <a href="<?php echo $teamMobile; ?>"><?php echo $teamMobile; ?></a></span>
						<?php endif; ?>
					</div>
					<div class="team-page__item-actions_email">
						<?php if(!empty($this->item->extraFields->teamEmail->value)):?>
							<span class="contact-detail"><i class="fa fa-envelope"></i> <?php echo $teamEmail; ?></span>
						<?php endif; ?>
					</div>
					<?php if(!empty($this->item->extraFields->teamLinkedin->value)):?>
					<div class="team-page__item-actions_linkedin">
						<span class="contact-detail"> <a href="<?php echo $teamLinkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></span>
					</div>
					<?php endif; ?>
				</div>
				<?php if(!empty($this->item->fulltext)): ?>
					<?php if($this->item->params->get('itemIntroText')): ?>
					<div class="team-page__item-info_content introText">
						<?php echo $this->item->introtext; ?>
					</div>
					<?php endif; ?>
		
					<?php if($this->item->params->get('itemFullText')): ?>
					<div class="team-page__item-info_content fullText">
						<?php echo $this->item->fulltext; ?>
					</div>
					<?php endif; ?>
				<?php else: ?>
					<div class="team-page__item-info_content introText">
						<?php echo $this->item->introtext; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

