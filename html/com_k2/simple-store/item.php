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
<?php if(JRequest::getInt('print')==1): ?>
<!-- Print button at the top of the print page only -->
<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
	<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>


<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="k2Container" class="store-item <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-8">
			<div class="store-item__header">
			<?php if($this->item->params->get('itemTitle')): ?>
				<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
			<?php endif; ?>
			</div>

			<div class="store-item__body">
			<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
				<div class="store-item__body-image">
					<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-fluid" />
	
					<?php if($this->item->params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
					<!-- Image caption -->
					<span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
					<?php endif; ?>
		
					<?php if($this->item->params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
					<!-- Image credits -->
					<span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
					<?php endif; ?>
				
				</div>
			<?php endif; ?>
				<div class="store-item__body-content">
				<?php if(!empty($this->item->fulltext)): ?>
				
					<?php if($this->item->params->get('itemIntroText')): ?>
					<div class="itemIntroText">
						<?php echo $this->item->introtext; ?>
					</div>
					<?php endif; ?>
	
					<?php if($this->item->params->get('itemFullText')): ?>
					<div class="itemFullText">
						<?php echo $this->item->fulltext; ?>
					</div>
					<?php endif; ?>
	
				<?php else: ?>
	
					<div class="itemFullText">
						<?php echo $this->item->introtext; ?>
					</div>
			
				<?php endif; ?>
				</div>
			</div>
	
			
			<div class="store-item__body-purchase">
				<div class="store-item__body-purchase_cart">
					<!-- Plugins: AfterDisplay -->
					<?php echo $this->item->event->AfterDisplay; ?>
				
					<!-- K2 Plugins: K2AfterDisplay -->
					<?php echo $this->item->event->K2AfterDisplay; ?>
				</div>
				<?php if(!empty($this->item->extraFields->StoreFreeTrial->value)): ?>
				<div class="store-item__body-purchase_trial">
					<a href="<?php echo $this->item->extraFields->StoreFreeTrial->value; ?>" class="btn btn-outline-primary">Free Trial</a>
				</div>
				<?php endif; ?>
			</div>
			<?php if(!empty($this->item->extraFields->StoreAltPrice->value)):?>
			<div class="store-item__body-alt-price">	
				<?php echo $this->item->extraFields->StoreAltPrice->value; ?>
			</div>
			<?php endif; ?>
			<?php if(!empty($this->item->extraFields->StoreMoreInfo->value)): ?>
			<div class="store-item__body-moreinfo">
				<a href="<?php echo $this->item->extraFields->StoreMoreInfo->value; ?>" class="btn-link">Find out more about <?php echo $this->item->title; ?> <i class="fa fa-external-link"></i></a>
			</div>
			<?php endif; ?>
			
			<?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
			<div class="store-item__body-gallery">
				<a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
				<div class="itemImageGallery">
					<h4>Product Gallery</h4>
					<?php echo $this->item->gallery; ?>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
			<div class="store-item__body-video">
		
				<?php if($this->item->videoType=='embedded'): ?>
				<div class="itemVideoEmbedded">
					<?php echo $this->item->video; ?>
				</div>
				<?php else: ?>
				<span class="itemVideo"><?php echo $this->item->video; ?></span>
				<?php endif; ?>
		
				<?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
				<span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
				<?php endif; ?>
		
				<?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
				<span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
				<?php endif; ?>
		
				
			</div>
			<?php endif; ?>
			
			
		</div>
		<div class="col-12 col-sm-6 col-md-4 store-item__sidebar">
			<?php if(!empty($this->item->extraFields->ProductLogo->value)): ?>
			<div class="store-item__sidebar-block">
				<div class="store-item__sidebar-block_logo">
					<?php echo $this->item->extraFields->ProductLogo->value; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(
					$this->item->params->get('itemTwitterButton',1) ||
					$this->item->params->get('itemFacebookButton',1) ||
					$this->item->params->get('itemGooglePlusOneButton',1)
				): ?>
			<div class="store-item__sidebar-block">
				<div class="itemSocialSharing">
			
					<?php if($this->item->params->get('itemTwitterButton',1)): ?>
					<!-- Twitter Button -->
					<div class="itemTwitterButton">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="<?php echo $this->item->langTagForTW; ?>" data-via="<?php if($this->item->params->get('twitterUsername')) echo $this->item->params->get('twitterUsername'); ?>"><?php echo JText::_('K2_TWEET'); ?></a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
					<?php endif; ?>
			
					<?php if($this->item->params->get('itemFacebookButton',1)): ?>
					<!-- Facebook Button -->
					<div class="itemFacebookButton">
						<div id="fb-root"></div>
						<script>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)) return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/<?php echo $this->item->langTagForFB; ?>/sdk.js#xfbml=1&version=v2.5";fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>
						<div class="fb-like" data-width="200" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</div>
					<?php endif; ?>
			
					<?php if($this->item->params->get('itemGooglePlusOneButton',1)): ?>
					<!-- Google +1 Button -->
					<div class="itemGooglePlusOneButton">
						<div class="g-plusone" data-size="medium"></div>
						<script>window.___gcfg={lang:'<?php echo $this->item->langTagForGP; ?>'};(function(){var po=document.createElement('script');po.type='text/javascript';po.async=true;po.src='https://apis.google.com/js/platform.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po,s);})();</script>
					</div>
					<?php endif; ?>
			
					
			
				</div>
			</div>
			<?php endif; ?>
			<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
			<div class="store-item__sidebar-block">
				<div class="store-item__sidebar-block_attachments">
					<h4>Downloads</h4>
					<div class="itemAttachments">
						<?php foreach ($this->item->attachments as $attachment): ?>
						<div>
							<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><i class="fa fa-cloud-download"></i> <?php echo $attachment->title; ?></a>
							<?php if($this->item->params->get('itemAttachmentsCounter')): ?>
							<span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if($this->item->params->get('itemCategory')): ?>
			<div class="store-item__sidebar-block">
				<div class="store-item__sidebar-block_category">
					<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
					<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($this->item->extraFields->StoreDisclaimer->value)): ?>
			<div class="store-item__sidebar-block">
				<div class="store-item__sidebar-block_disclaimer">
					<?php echo $this->item->extraFields->StoreDisclaimer->value; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	

	<?php if($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
	<!-- Item navigation -->
	<div class="itemNavigation d-flex justify-content-between">

		<?php if(isset($this->item->previousLink)): ?>
		<a class="btn btn-sm btn-outline-primary" href="<?php echo $this->item->previousLink; ?>"><i class="fa fa-angle-left"></i> <?php echo $this->item->previousTitle; ?></a>
		<?php endif; ?>
		
		<span class="itemNavigationTitle">More in <?php echo $this->item->category->name; ?></span>

		<?php if(isset($this->item->nextLink)): ?>
		<a class="btn btn-sm btn-outline-primary" href="<?php echo $this->item->nextLink; ?>"><?php echo $this->item->nextTitle; ?> <i class="fa fa-angle-right"></i></a>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	


	
</div>
<!-- End K2 Item Layout -->
