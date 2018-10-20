<?php
/**
 * @version    2.8.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2017 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

//// THIS IS A SPECIAL OVERRIDE THAT ENABLES FILTERED CONTENT BUT ABSOLUTELY REQUIRES SUBCATEGORIES & THAT ALL ITEMS ARE IN THE SUBCATEGORIES
//// ANYTHING IN THE PARENT CATEGORY WILL NOT BE FILTERED
//// This override can filter either standard content or video content
/// It also will create bootstrap cols up to 6 columns just by selecting the number of columns for leading items.
/// THIS REQUIRES THE FILTERED CONTENT SCSS FILES TO FUNCTION PROPERLY



// no direct access
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$doc->addScript($this->baseurl . '/templates/bootstrap4/js/mixitup.js');


?>


<div id="k2Container" class="filtered-page <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

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
		<div class="filtered-page__categories-filter">
			<div class="filtered-page__filter-inner d-flex justify-content-between">
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
	<div class="filtered-page__list">

		<?php if(isset($this->leading) && count($this->leading)): ?>
		<!-- Leading items -->
		<div id="filtered-page__list-leading">
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
			    case 1:
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

			
			<?php
				// Load category_item.php by default
				$this->item = $item; 
				?>
				<div class="filtered-page__list-leading_item filtered-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
				<?php echo $this->loadTemplate('item'); ?>
				</div>
			<?php if(($key+1)%($this->params->get('num_leading_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(isset($this->primary) && count($this->primary)): ?>
		<!-- Primary items -->
		<div id="filtered-page__list-primary">
			<?php foreach($this->primary as $key=>$item): ?>
			<div class="row">
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
			    case 1:
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

			<div class="filtered-page__list-primary_item  filtered-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
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
		<div id="filtered-page__list-secondary">
			<?php foreach($this->secondary as $key=>$item): ?>
			<div class="row">
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
			    case 1:
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

			<div class="filtered-page__list-secondary_item  filtered-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
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
		<div id="filtered-page__list-links">
			<h4><?php echo JText::_('K2_MORE'); ?></h4>
			<?php foreach($this->links as $key=>$item): ?>
			<div class="row">
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
			    case 1:
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

			<div class="filtered-page__list-links_item  filtered-page__list-item mix <?php echo $this->item->category->alias; ?> <?php echo $bsCols; ?> <?php echo $lastContainer; ?>">
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

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
	    	<div class="modal-header">
		    	<h5 class="modal-title" id="videoTitle">Tutorial Video</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    		<span aria-hidden="true">&times;</span>
		    	</button>     	
	    	</div>
	    	<div class="modal-body">
	    	<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
				    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"></iframe>
				</div>    	
	    	</div>
	    </div>
    </div>
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


// Gets the video src from the data-src on each button

	var $videoSrc;
	var $videoTitle;
	$('.video-btn').click(function() {
	    $videoSrc = $(this).data( "src" );
	    $videoTitle = $(this).data("title");
	});
	
	//console.log($videoSrc);
	
	    
	    
	// when the modal is opened autoplay it 
	$('#filterModal').on('shown.bs.modal', function (e) {
	    
		// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
		$("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1" ); 
		$("#videoTitle").text($videoTitle);
	})
	    
	    
	// stop playing the youtube video when I close the modal
	$('#filterModal').on('hide.bs.modal', function (e) {
	    // a poor man's stop video
	    $("#video").attr('src',$videoSrc);
	     $('.modal-backdrop').remove(); 
	}) 
});
</script>

