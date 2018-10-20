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

//// SWITCH BETWEEN MODAL FUNCTION AND ITEM FUNCTION
/// If you have video content, this will switch the item function to triggering a modal on click
/// CRITICAL - the MEDIA tab CANNOT be used for this, you must create a EXTERNAL VIDEO LINK extraField (YouTube and/or VIMEO)

$isMediaItem = 0;
$videoID = '';
$videoURL = '';
$videoThumb = '';
$videoTitle = '';
$itemType = 'filter-image';
if(!empty($this->item->extraFields->VideoLinkID->value)):
	$isMediaItem = 1;
	$videoID = $this->item->extraFields->VideoLinkID->value;
	$videoURL = 'https://www.youtube.com/embed/'.$videoID;
	$videoTitle = $this->item->title;
	$videoThumb = 'http://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg';
	$itemType = 'filter-video';
endif;


?>


<div class="filtered-page__item group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<?php if($isMediaItem):?>
	<div class="filtered-page__item-image <?php echo $itemType; ?>" style="background-image: url(<?php echo $videoThumb; ?>);">
		<a class="video-btn" data-toggle="modal" data-src="<?php echo $videoURL; ?>" data-title="<?php echo $videoTitle;?>" data-target="#filterModal">
			<div class="filtered-page__item-image_inner">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 145.91 145.91"><defs><clipPath id="clip-path"><rect width="145.91" height="145.91" style="fill:none"/></clipPath></defs><title>play-button</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g style="clip-path:url(#clip-path)"><path d="M108.53,74.76l-54.8,28.67a2,2,0,0,1-3-1.81V44.29a2,2,0,0,1,3-1.81l54.8,28.67a2,2,0,0,1,0,3.61" class="logo-brand-primary"/><path d="M73,5.78A67.18,67.18,0,1,0,140.13,73,67.25,67.25,0,0,0,73,5.78m0,140.13a73,73,0,1,1,73-72.95,73,73,0,0,1-72.95,73" class="logo-brand-primary"/></g></g></g></svg>
				<div class="filtered-page__item-title text-center">
					<h3><?php echo $this->item->title; ?></h3>
					<?php if($this->item->params->get('catItemCategory')): ?>
					<h5><?php echo $this->item->category->name; ?></h5>
					<?php endif; ?>
				</div>
			</div>
		</a>
	</div>
	<?php else: ?>
		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<div class="filtered-page__item-image  <?php echo $itemType; ?>" style="background-image: url(<?php echo $this->item->image; ?>);">
			<?php if ($this->item->params->get('catItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php endif; ?>
			<div class="filtered-page__item-image_inner">
				<span class="read-more">READ MORE</span>
				<div class="filtered-page__item-title text-center">
					<h3><?php echo $this->item->title; ?></h3>
					<?php if($this->item->params->get('catItemCategory')): ?>
					<h5><?php echo $this->item->category->name; ?></h5>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($this->item->params->get('catItemTitleLinked')): ?></a><?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
