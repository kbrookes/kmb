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
$csTestimonial = '';
$csCite = '';
if(!empty($this->item->extraFields->Testimonial->value)):
	$csTestimonial = $this->item->extraFields->Testimonial->value;
endif;
if(!empty($this->item->extraFields->TestimonialCite->value)):
	$csCite = $this->item->extraFields->TestimonialCite->value;
endif;
?>

<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="casestudysolo" class="casestudypage__item <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 <?php if(!empty($csTestimonial)): ?>col-md-6 col-lg-7<?php endif; ?> casestudy-page__item-content">
				<?php if(!empty($this->item->fulltext)): ?>
					<?php if($this->item->params->get('itemIntroText')): ?>
					<div class="casestudypage__item-info_content introText">
						<?php echo $this->item->introtext; ?>
					</div>
					<?php endif; ?>
		
					<?php if($this->item->params->get('itemFullText')): ?>
					<div class="casestudypage__item-info_content fullText">
						<?php echo $this->item->fulltext; ?>
					</div>
					<?php endif; ?>
				<?php else: ?>
					<div class="casestudypage__item-info_content introText">
						<?php echo $this->item->introtext; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if(!empty($csTestimonial)): ?>
			<div class="col-xs-12 col-md-6 col-lg-5 casestudy-page__item-testimonial">
				<div class="casestudy-page__item-testimonial_wrap">
					<blockquote class="blockquote">
						<p class="mb-0"><?php echo $csTestimonial; ?></p>
						<footer class="blockquote-footer"><?php echo $csCite; ?></footer>
					</blockquote>
				</div>
			</div>
			<?php endif; ?>
			<?php if((!empty($csTestimonial)) || ($this->item->params->get('itemAttachments') && count($this->item->attachments))): ?>
			<div class="col-xs-12 col-md-6 col-lg-5 casestudy-page__item-testimonial">
				<?php if(!empty($csTestimonial)): ?>
				<div class="casestudy-page__item-testimonial_wrap">
					<blockquote class="blockquote">
						<p class="mb-0"><?php echo $csTestimonial; ?></p>
						<footer class="blockquote-footer"><?php echo $csCite; ?></footer>
					</blockquote>
				</div>
				<?php endif; ?>
				<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
				<!-- Item attachments -->
				<div class="casestudy-page__item__attachments">
						<h5>Download Case Study PDF</h5>
						<?php foreach ($this->item->attachments as $attachment): ?>
						<div class="casestudy-page__item__attachments-item">
							<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><i class="fa fa-cloud-download"></i> <?php echo $attachment->title; ?></a>
						</div>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

