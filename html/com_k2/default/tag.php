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

<!-- Start K2 Tag Layout -->
<div id="k2Container" class="tag-page <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<!-- Page title -->
	<div class="tag-page__title <?php echo $this->params->get('pageclass_sfx')?>">
		<div class="tag-page__header">
			<h2><?php echo $this->escape($this->params->get('page_title')); ?></h2>
		</div>
	</div>


	<?php if(count($this->items)): ?>
	<div class="tag-page__list">
		<div class="row">
		<?php foreach($this->items as $item): ?>

		<!-- Start K2 Item Layout -->
			<div class="tag-item col-12 col-md-6">
				<?php if($item->params->get('tagItemImage',1) && !empty($item->imageGeneric)): ?>
				<div class="tag-item__image" style="background-image: url(<?php echo $item->imageSmall; ?>);">
					<a href="<?php echo $item->link; ?>">
						<div class="tag-item__image-inner">
							<span class="read-more">READ MORE</span>
						</div>
					</a>
				</div>
				<?php endif; ?>
				
				<div class="tag-item__header">
					<?php if($item->params->get('tagItemTitle')): ?>
					<div class="tag-item__header-title">
						<h3><?php if ($item->params->get('tagItemTitleLinked')): ?><a href="<?php echo $item->link; ?>"><?php endif; ?><?php echo $item->title; ?><?php if ($item->params->get('tagItemTitleLinked')): ?></a><?php endif; ?></h3>
					</div>
					<?php endif; ?>
					<div class="tag-item__header-info">
						<?php if($item->params->get('tagItemAuthor')): ?>
						<span class="tagItemAuthor">
						<?php if(isset($item->author->link) && $item->author->link): ?>
							Written by <a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a>
						<?php else: ?>
							<?php echo $item->author->name; ?>
						<?php endif; ?>
						</span>
					<?php endif; ?>
					<?php if(($item->params->get('tagItemAuthor')) && ($item->params->get('tagItemIntroText'))): ?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<?php endif; ?>
					<?php if($item->params->get('tagItemDateCreated')): ?>
						<span class="tagItemDateCreated">
							<?php echo JHTML::_('date', $item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
						</span>
					<?php endif; ?>
					</div>
				</div>
				
				<?php if($item->params->get('tagItemIntroText')): ?>
				<div class="tag-item__intro">
					<?php echo $item->introtext; ?>
				</div>
				<?php endif; ?>
				
				<div class="tag-item__actions">
					<?php if ($item->params->get('tagItemReadMore')): ?>
					<span>
						<a class="btn btn-outline-primary btn-sm" href="<?php echo $item->link; ?>">
							<?php echo JText::_('K2_READ_MORE'); ?>
						</a>
					</span>
					<?php endif; ?>
					<?php if($item->params->get('tagItemTags') && count($item->tags)): ?>
					<div class="tag-item__actions-tags">
					    <?php foreach ($item->tags as $tag): ?>
					    <span><a href="<?php echo $tag->link; ?>"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a> </span>&nbsp;
					    <?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
				
				
			</div>
			<!-- End K2 Item Layout -->
		<?php endforeach; ?>
		</div>
	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>

</div>
<!-- End K2 Tag Layout -->

