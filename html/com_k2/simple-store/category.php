<?php
/**
 * @version    2.8.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2017 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

//// THIS IS A SPECIAL OVERRIDE THAT CHANGES THE STANDARD BEHAVIOUR OF K2 CATEGORIES
/// Instead of displaying items from all categories in one big list, it separates it into category sections and can display subcategory
/// titles & descriptions, along with their own subcategory items within its own section. 
/// At the moment this is limited to just using the 'leading items' feature in the category section, but could easily be extended to manage
/// all of those options.
/// It also will create bootstrap cols up to 6 columns just by selecting the number of columns for leading items.
/// THIS REQUIRES THE TEAM SCSS FILES TO FUNCTION PROPERLY



// no direct access
defined('_JEXEC') or die;

?>


<div id="store-categories" class="store-page <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	
	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="category-wrap">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
		<div class="category-wrap__main">

			<?php if(isset($this->addLink)): ?>
			<!-- Item add link -->
			<span class="catItemAddLink">
				<a data-k2-modal="edit" href="<?php echo $this->addLink; ?>">
					<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
				</a>
			</span>
			<?php endif; ?>

			<?php if($this->params->get('catTitle')): ?>
			<!-- Category title -->
			<h2 class="category-wrap__main-title"><?php echo $this->category->name; ?></h2>
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
		<!-- Subcategories -->
		<div class="store-page__categories category-wrap__subcats">

			<?php foreach($this->subCategories as $key=>$subCategory): ?>

			<?php
			// Define a CSS class for the last container on each row
			if((($key+1)%($this->params->get('subCatColumns'))==0))
				$lastContainer= ' subCategoryContainerLast';
			else
				$lastContainer='';
			?>

			<div class="store-page__categories-subcat category-wrap__subcats-category container <?php echo $lastContainer; ?>">

					<?php if($this->params->get('subCatTitle')): ?>
					<h2 class="store-page__categories-subcat_title category-wrap__subcats-category_title"><?php echo $subCategory->name; ?></h2>
					<?php endif; ?>
					<?php if($this->params->get('subCatDescription')): ?>
					<!-- Subcategory description -->
					<div class="store-page__categories-subcat_description category-wrap__subcats-category_description">
						<?php echo $subCategory->description; ?>
					</div>
					<?php endif; ?>
					
					<!-- ADD SUBCAT ITEMS LEADING -->
					<?php if(isset($this->leading) && count($this->leading)): ?>
						<div class="row">
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
							<?php if($item->catid == $subCategory->id): ?>
							<div class="<?php echo $bsCols; ?>">
							<?php
								// Load category_item.php by default
								$this->item = $item;
								echo $this->loadTemplate('item');
							?>							
							</div>
							<?php endif; ?>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<!-- /ADD SUBCAT ITEMS LEADING -->
					
					<!-- ADD SUBCAT ITEMS PRIMARY -->
					<?php if(isset($this->primary) && count($this->primary)): ?>
						<div class="row">
						<?php foreach($this->primary as $key=>$item): ?>
							<?php
							// Define a CSS class for the last container on each row
							if((($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns'))
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
							<?php if($item->catid == $subCategory->id): ?>
							<div class="<?php echo $bsCols; ?>">
							<?php
								// Load category_item.php by default
								$this->item = $item;
								echo $this->loadTemplate('item');
							?>							
							</div>
							<?php endif; ?>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<!-- /ADD SUBCAT ITEMS PRIMARY -->

			</div>
			<?php if(($key+1)%($this->params->get('subCatColumns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>

			
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

</div>


