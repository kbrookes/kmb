<?php
/**
 * @version    2.8.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2017 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
 
 //// STYLES FOR A CAREERS TYPE PAGE
/// REQUIRES COM_K2 CAREERS
// REQUIRES EXTRA FIELDS TO BE CREATED TO FUNCTION CORRECTLY

/// FOR SCROLL BUTTONS TO WORK ALSO REQUIRES THE USE OF ADVANCED MODULE MANAGER AND THE ADDITION OF THE FOLLOWING CODE TO HTML BEFORE

/// <a class="scroll-anchor" id="scrollto-application"></a>


// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="career-listing group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<div class="row">
		<div class="col-xs-12 col-md-6 career-listing__title">
		<?php if($this->item->params->get('catItemTitle')): ?>
			<h3>
				<?php if ($this->item->params->get('catItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>">
		  			<?php echo $this->item->title; ?>
		  		</a>
			  	<?php else: ?>
			  	<?php echo $this->item->title; ?>
			  	<?php endif; ?>
			</h3>
		<?php endif; ?>
		<?php if($this->item->params->get('catItemDateCreated')): ?>
		<span class="catItemDateCreated">
			<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
		</span>
		<?php endif; ?>
		</div>
		<div class="col-xs-12 col-md-6 career-listing__content">
			<div class="row">
				<?php if($this->item->params->get('catItemIntroText')): ?>
				<div class="col-xs-12 col-sm-6 col-md-12 career-listing__content-main">
					<h4>Role Description</h4>
					<?php echo $this->item->introtext; ?>
				</div>
				<?php endif; ?>
				<?php if(!empty($this->item->extraFields->RoleRequirements->value)):?>
				<div class="col-xs-12 col-sm-6 col-md-12 career-listing__content-requirements">
					<h4>Role Requirements</h4>
					<?php echo $this->item->extraFields->RoleRequirements->value; ?>
				</div>
				<?php endif; ?>
				<p><a class="btn btn-outline-primary" href="#scrollto-application">APPLY NOW</a></p>
			</div>	
		</div>
	</div>
</div>
<!-- End K2 Item Layout -->
