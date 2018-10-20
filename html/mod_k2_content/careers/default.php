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

<div id="careers<?php echo $module->id; ?>" class="careers-block <?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
    <?php foreach ($items as $key=>$item):	?>
    <div class="careers-block__body">
   
		<?php if($params->get('itemTitle')): ?>
		<h3 class="careers-block__body-title"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
		<?php endif; ?>
		
		<?php if($params->get('itemIntroText')): ?>
      	<div class="careers-block__body-intro">
	      	<?php echo $item->introtext; ?>
      	</div>
      	<?php endif; ?>

		<?php if($params->get('itemReadMore') && $item->fulltext): ?>
		<a class="btn btn-outline-primary btn-border-2x" href="<?php echo $item->link; ?>">
			<?php echo JText::_('K2_READ_MORE'); ?>
		</a>
		<?php endif; ?>
    </div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
