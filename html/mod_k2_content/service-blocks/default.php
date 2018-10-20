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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="service-block">

	<?php if(count($items)): ?>
	<div class="service-block-menu row">
	<?php $loopCount = 0;
		foreach ($items as $key=>$item):
			$loopCount++;
		endforeach; 
		
		$bsCols = 'col-xs-12';
		$colNums = number_format($loopCount, 1);
		switch ($colNums) {
		    case 0:
		    	$bsCols = "col-xs-12";
		        break;
		    case 1:
		    	$bsCols = "col-xs-12";
		        break;
		    case 2:
		        $bsCols = "col-xs-12 col-sm-6";
		        break;
		    case 3:
		    	$bsCols = "col-xs-12 col-sm-4";
		    	break;
		    case 4:
		    	$bsCols = "col-xs-12 col-sm-6 col-md-3";
		    	break;
		    case 6:
		    	$bsCols = "col-xs-12 col-sm-6";
		    	break;
	    	}
		?>
		
    <?php foreach ($items as $key=>$item):	
	    $businessSize = '';
    ?>
    	<div class="service-block__item <?php echo $bsCols; ?>">
	    	<?php if($params->get('itemImage') && isset($item->image)): ?>
			<div class="service-block__item-image" style="background-image: url(<?php echo $item->image; ?>);">
			<a href="<?php echo $item->link; ?>">
				<div class="service-block__item-inner">
					<?php if($params->get('itemTitle')): ?>
					<div class="service-block__item-header_title">
						<h3><?php echo $item->title; ?></h3>
					</div>
					<?php endif; ?>
					<span class="read-more btn">MORE</span>
				</div>
			</a>
			</div>
			<?php else: ?>
			<div class="service-block__item-bgcolor">
			<a href="<?php echo $item->link; ?>">
				<div class="service-block__item-inner text-center">
					<?php if($params->get('itemTitle')): ?>
					<div class="service-block__item-header_title">
						<h3><?php echo $item->title; ?></h3>
					</div>
					<?php endif; ?>
					<span class="read-more btn">MORE</span>
				</div>
			</a>
			</div>
			<?php endif; ?>
    	</div>
    <?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
