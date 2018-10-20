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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="resume-list">
	
	<?php if(count($items)): ?>
	<div class="resume-list__menu ">
    <?php foreach ($items as $key=>$item):	?>
    	<div class="resume-list__item ">
			<div class="resume-list__item-header">
				<?php if($params->get('itemTitle')): ?>
				<div class="resume-list__item-header_title">
					<h3><?php echo $item->title; ?></h3>
				</div>
				<?php endif; ?>
			</div>
			<?php if($params->get('itemIntroText')): ?>
			<div class="resume-list__item-intro">
				<?php echo $item->introtext; ?>
			</div>
			<?php endif; ?>
			
    	</div>
    	<?php if($item->extraFieldsDataSets): ?>
    	<div class="resume-list__items">
	    	<?php foreach(array_reverse($item->extraFieldsDataSets) as $key=>$dataSet): ?>
	    		<?php if($key < 6):?>
			    	<div class="resume-list__items-single item-<?php echo $key; ?>">
				    	<h6><?php echo $dataSet['fields']['eventName']; ?></h6>
				    	<div class="resume-list__items-single_info"><strong><?php echo $dataSet['fields']['year']; ?></strong> <span class="producedBy"><?php echo $dataSet['fields']['producedBy']; ?></span><?php if(!empty($dataSet['fields']['location'])):?>, <span class="location"><?php echo $dataSet['fields']['location']; ?></span><?php endif; ?></div>
			    	</div>
		    	<?php endif; ?>
	    	<?php endforeach; ?>
	    	<?php
		    	$loopCount = 0;
		    	foreach(array_reverse($item->extraFieldsDataSets) as $key=>$dataSet): 
		    		$loopCount++;
		    	endforeach;
		    	if($loopCount > 5):
		    	?>
		    	<div class="collapse" id="resumeList-<?php echo $key; ?>">
			    <?php foreach(array_reverse($item->extraFieldsDataSets) as $key=>$dataSet): ?>
		    		<?php if($key > 5):?>
				    	<div class="resume-list__items-single item-<?php echo $key; ?>">
					    	<h6><?php echo $dataSet['fields']['eventName']; ?></h6>
					    	<div class="resume-list__items-single_info"><strong><?php echo $dataSet['fields']['year']; ?></strong> <span class="producedBy"><?php echo $dataSet['fields']['producedBy']; ?></span><?php if(!empty($dataSet['fields']['location'])):?>, <span class="location"><?php echo $dataSet['fields']['location']; ?></span><?php endif; ?></div>
				    	</div>
			    	<?php endif; ?>
		    	<?php endforeach; ?>
		    	</div>
		    	<div class="text-right">
			    	<a class="collapse-btn-<?php echo $key; ?> text-right" data-toggle="collapse" href="#resumeList-<?php echo $key; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">SHOW MORE <i class="fa fa-chevron-down"></i></a>
		    	</div>
		    <?php endif; ?>
    	</div>
    	<?php endif; ?>
    	<script>
		(function($){
			$('#resumeList-<?php echo $key; ?>').on('hidden.bs.collapse', function () {
			    $('.collapse-btn-<?php echo $key; ?>').html('SHOW MORE <i class="fa fa-chevron-down"></i>');
			});
			$('#resumeList-<?php echo $key; ?>').on('shown.bs.collapse', function () {
			    $('.collapse-btn-<?php echo $key; ?>').html('SHOW LESS <i class="fa fa-chevron-up"></i>');
			});
		})(jQuery);
		</script>
    <?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>

