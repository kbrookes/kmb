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

?>



<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="careerpage" class="careers-item <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">

	<div class="careers-item__header">
		<?php if($this->item->params->get('itemTitle')): ?>
		<h2><?php echo $this->item->title; ?></h2>
		<?php endif; ?>
		<?php if($this->item->params->get('itemDateCreated')): ?>
		<span class="itemDateCreated">
			<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
		</span>
		<?php endif; ?>
	</div>

	<div class="careers-item__content">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 careers-item__content-copy">
				<h3>Role Description</h3>
			<?php if(!empty($this->item->fulltext)): ?>
				<?php if($this->item->params->get('itemIntroText')): ?>
				<div class="itemIntroText">
					<?php echo $this->item->introtext; ?>
				</div>
				<?php endif; ?>
				<?php if($this->item->params->get('itemFullText')): ?>
				<div class="itemFullText">
					<?php echo $this->item->fulltext; ?>
				</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="itemFullText">
					<?php echo $this->item->introtext; ?>
				</div>
			<?php endif; ?>
			</div>
		<?php if(!empty($this->item->extraFields->RoleRequirements->value)): ?>
			<div class="col-xs-12 col-sm-12 col-md-6 careers-item__content-requirements">
				<h3>Role Requirements</h3>
				<?php echo $this->item->extraFields->RoleRequirements->value; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<!-- End K2 Item Layout -->
