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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="content-module">

	<?php if(count($items)): ?>
	<div class="content-module-menu">
    <?php foreach ($items as $key=>$item):	
	    $businessSize = '';
    ?>
    	<div class="content-module__item <?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">
	    	<?php if($params->get('itemImage') && isset($item->image)): ?>
			<div class="content-module__item-image" style="background-image: url(<?php echo $item->image; ?>);">
			<a href="<?php echo $item->link; ?>">
				<div class="content-module__item-image_inner">
					<span class="read-more">READ MORE</span>
				</div>
			</a>
			</div>
			<?php endif; ?>
			<div class="content-module__item-header">
				<?php if($params->get('itemTitle')): ?>
				<div class="content-module__item-header_title">
					<h3><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
				</div>
				<?php endif; ?>
			</div>
			
			<?php if($params->get('itemIntroText')): ?>
			<div class="content-module__item-intro">
				<?php echo $item->introtext; ?>
			</div>
			<?php endif; ?>
			
			<div class="content-module__item-actions">
				<?php if($params->get('itemReadMore') && $item->fulltext): ?>
				<span>
					<a class="btn btn-outline-primary btn-sm" href="<?php echo $item->link; ?>">
						<?php echo JText::_('K2_READ_MORE'); ?>
					</a>
				</span>
				<?php endif; ?>
			</div>
    	</div>
    <?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
