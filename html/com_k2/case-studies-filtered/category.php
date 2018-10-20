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
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$doc->addScript($this->baseurl . '/templates/bootstrap4/js/mixitup.js');
?>

<!-- Start K2 Category Layout -->
<div id="casestudy-list" class="casestudy-page <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	

	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="casestudy-page__categories category-wrap">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
		<div class="casestudy-page__categories-current category-wrap__main">

			<?php if(isset($this->addLink)): ?>
			<!-- Item add link -->
			<span class="catItemAddLink">
				<a data-k2-modal="edit" href="<?php echo $this->addLink; ?>">
					<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
				</a>
			</span>
			<?php endif; ?>

			<?php if($this->params->get('catImage') && $this->category->image): ?>
			<!-- Category image -->
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>

			<?php if($this->params->get('catTitle')): ?>
			<!-- Category title -->
			<h2 class="category-wrap__main-title"><?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?></h2>
			<?php endif; ?>

			<?php if($this->params->get('catDescription')): ?>
			<!-- Category description -->
			<div class="category-wrap__main-description"><?php echo $this->category->description; ?></div>
			<?php endif; ?>

			<!-- K2 Plugins: K2CategoryDisplay -->
			<?php echo $this->category->event->K2CategoryDisplay; ?>

			
		</div>
		<?php endif; ?>

		<?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
		<div class="casestudy-page__categories-filter">
			<div class="casestudy-page__filter-inner d-flex justify-content-center">
				<button type="button" data-mixitup-control data-filter="all" class="btn btn-outline-primary mixitup-control-active">All</button>
				<?php foreach($this->subCategories as $key=>$subCategory): ?>
				<button type="button" data-mixitup-control data-filter=".<?php echo $subCategory->alias; ?>" class="btn btn-outline-primary"><?php echo $subCategory->name; ?></button>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
	<!-- Item list -->
	<div class="casestudy-page__list">

		<?php if(isset($this->leading) && count($this->leading)): ?>
		<!-- Leading items -->
		<div id="casestudy-page__list-leading">
			<div class="row mix-container">
			<?php foreach($this->leading as $key=>$item): ?>

			<?php
			// Define a CSS class for the last container on each row
			if((($key+1)%($this->params->get('num_leading_columns'))==0) || count($this->leading)<$this->params->get('num_leading_columns'))
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			$bsCols = 'col-xs-12';
			$colNums = number_format($this->params->get('num_leading_columns'), 1);
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

				
					<div class="casestudy-page__list-leading_item casestudy-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
					<?php
						// Load category_item.php by default
						$this->item = $item;
						echo $this->loadTemplate('item');
					?>
					</div>
				

			<?php if(($key+1)%($this->params->get('num_leading_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(isset($this->primary) && count($this->primary)): ?>
		<!-- Primary items -->
		<div id="casestudy-page__list-primary">
			<div class="row mix-container">
			<?php foreach($this->primary as $key=>$item): ?>

			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			$bsCols = 'col-xs-12';
			$colNums = number_format($this->params->get('num_primary_columns'), 1);
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

				
					<div class="casestudy-page__list-primary_item  casestudy-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
					<?php
						// Load category_item.php by default
						$this->item = $item;
						echo $this->loadTemplate('item');
					?>
					</div>
			<?php if(($key+1)%($this->params->get('num_primary_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(isset($this->secondary) && count($this->secondary)): ?>
		<!-- Secondary items -->
		<div id="casestudy-page__list-secondary">
			<div class="row mix-container">
			<?php foreach($this->secondary as $key=>$item): ?>

			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_secondary_columns'))==0) || count($this->secondary)<$this->params->get('num_secondary_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			$bsCols = 'col-xs-12';
			$colNums = number_format($this->params->get('num_secondary_columns'), 1);
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

				
					<div class="casestudy-page__list-secondary_item  casestudy-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
					<?php
						// Load category_item.php by default
						$this->item = $item;
						echo $this->loadTemplate('item');
					?>
					</div>
				
			<?php if(($key+1)%($this->params->get('num_secondary_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(isset($this->links) && count($this->links)): ?>
		<!-- Link items -->
		<div id="casestudy-page__list-links">
			<h4><?php echo JText::_('K2_MORE'); ?></h4>
			<div class="row mix-container">
			<?php foreach($this->links as $key=>$item): ?>

			<?php
			// Define a CSS class for the last container on each row
			if((($key+1)%($this->params->get('num_links_columns'))==0) || count($this->links)<$this->params->get('num_links_columns'))
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			$bsCols = 'col-xs-12';
			$colNums = number_format($this->params->get('num_links_columns'), 1);
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

				
					<div class="casestudy-page__list-links_item  casestudy-page__list-item  mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
				<?php
					// Load category_item.php by default
					$this->item = $item;
					echo $this->loadTemplate('item');
				?>
					</div>
				
			<?php if(($key+1)%($this->params->get('num_links_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		
		<?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>
</div>

<script>
jQuery(document).ready(function ($) {

	var containerEl = document.querySelector('.mix-container');
	//var mixer = mixitup('.mix-container');
	var mixer = mixitup(containerEl, {
		selectors: {
		    control: '[data-mixitup-control]'
		}
	});

	
});
</script>

