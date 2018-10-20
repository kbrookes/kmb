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
$isMediaItem = 0;
$videoID = '';
$videoURL = '';
$videoThumb = '';
$itemType = 'filter-image';
if(!empty($this->item->extraFields->VideoLinkID->value)):
	$isMediaItem = 1;
	$videoID = $this->item->extraFields->VideoLinkID->value;
	$videoURL = 'https://www.youtube.com/embed/'.$videoID;
	$videoThumb = 'http://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg';
	$itemType = 'filter-video';
endif;
?>

<?php if(JRequest::getInt('print')==1): ?>
<!-- Print button at the top of the print page only -->
<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
	<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>

<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="k2Container" class="filtered-item <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">

	<div class="filtered-item__header">
	<?php if($this->item->params->get('itemTitle')): ?>
		<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
	<?php endif; ?>
		<?php if(($this->item->params->get('itemDateCreated')) || ($this->item->params->get('itemAuthor')) || ($this->item->params->get('itemHits'))): ?>
		<div class="filtered-item__header-info">
			<div class="filtered-item__header-info_inner">
				<?php if($this->item->params->get('itemAuthor')): ?>
				<!-- Item Author -->
				<span class="filtered-item__header-info_author">
					<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>
					<?php if(empty($this->item->created_by_alias)): ?>
					<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
					<?php else: ?>
					<?php echo $this->item->author->name; ?>
					<?php endif; ?>
				</span>
				<?php endif; ?>
				<?php if(($this->item->params->get('itemDateCreated')) && ($this->item->params->get('itemAuthor'))): ?>
				<span class="filtered-item__header-info_separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<?php endif; ?>
				<?php if($this->item->params->get('itemDateCreated')): ?>
				<!-- Date created -->
				<span class="filtered-item__header-info_created">
					<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
				</span>
				<?php endif; ?>
				<?php if(($this->item->params->get('itemDateCreated')) && ($this->item->params->get('itemHits'))): ?>
				<span class="filtered-item__header-info_separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<?php endif; ?>
				<?php if($this->item->params->get('itemHits')): ?>
				<span class="itemHits">
					<?php echo JText::_('K2_READ'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('K2_TIMES'); ?>
				</span>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->item->params->get('itemTags') && count($this->item->tags)): ?>
		<div class="filtered-item__header-tags">
			<?php foreach ($this->item->tags as $tag): ?>
			<span><a href="<?php echo $tag->link; ?>"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a></span>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	
	<?php if($isMediaItem):?>
	<div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="<?php echo $videoURL; ?>" allowfullscreen></iframe>
	</div>
	<?php endif; ?>
	

	<?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
	<!-- Item video -->
	<a name="itemVideoAnchor" id="itemVideoAnchor"></a>
	<div class="itemVideoBlock">

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



	<div class="filtered-item__body">
	<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
		<div class="filtered-item__body-image">
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
		<div class="filtered-item__body-content">
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

	<?php if(
		$this->item->params->get('itemTwitterButton',1) ||
		$this->item->params->get('itemFacebookButton',1) ||
		$this->item->params->get('itemGooglePlusOneButton',1)
	): ?>
	<!-- Social sharing -->
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
	<?php endif; ?>

	<?php if(
		$this->item->params->get('itemCategory') ||
		$this->item->params->get('itemTags')
	): ?>
	<div class="filtered-item__actions">
		<?php if($this->item->params->get('itemCategory')): ?>
		<div class="filtered-item__actions-category">
			<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
		</div>
		<?php endif; ?>

		

	</div>
	<?php endif; ?>
	
	<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
	<!-- Item attachments -->
	<div class="filtered-item__attachments">
		<span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
		<ul class="itemAttachments">
			<?php foreach ($this->item->attachments as $attachment): ?>
			<li>
				<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
				<?php if($this->item->params->get('itemAttachmentsCounter')): ?>
				<span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemAuthorBlock') && empty($this->item->created_by_alias)): ?>
	<!-- Author Block -->
	<div class="filtered-item__author">
		<div class="row">
			<?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)): ?>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 filtered-item__author-image">	
				<img class="img-fluid" src="<?php echo $this->item->author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->item->author->name); ?>" />
			</div>
			<?php endif; ?>
			<div class="col-xs-12 <?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)): ?>col-sm-8 col-md-9 col-lg-10<?php endif; ?> filtered-item__author-info">
				<h3 class="itemAuthorName">
					<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
				</h3>

				<?php if($this->item->params->get('itemAuthorDescription') && !empty($this->item->author->profile->description)): ?>
				<p><?php echo $this->item->author->profile->description; ?></p>
				<?php endif; ?>

				<?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url)): ?>
				<span class="itemAuthorUrl"><i class="icon-globe"></i> <a rel="me" href="<?php echo $this->item->author->profile->url; ?>" target="_blank"><?php echo str_replace('http://','',$this->item->author->profile->url); ?></a></span>
				<?php endif; ?>
	
				<?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url) && $this->item->params->get('itemAuthorEmail')): ?>
				<span class="k2HorizontalSep">|</span>
				<?php endif; ?>
	
				<?php if($this->item->params->get('itemAuthorEmail')): ?>
				<span class="itemAuthorEmail"><i class="icon-envelope"></i> <?php echo JHTML::_('Email.cloak', $this->item->author->email); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)): ?>
	<!-- Latest items from author -->
	<div class="filtered-item__authorlatest">
		<h3><?php echo JText::_('K2_LATEST_FROM'); ?> <?php echo $this->item->author->name; ?></h3>
		<ul>
			<?php foreach($this->authorLatestItems as $key=>$item): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">
				<a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
		
	</div>
	<?php endif; ?>

	<?php
	/*
	A note regarding 'Related Items'...
	If you add:
	- the CSS rule 'overflow-x:scroll;' in the element div.itemRelated {…} in the k2.css
	- the class 'k2Scroller' to the ul element below
	- the classes 'k2ScrollerElement' and 'k2EqualHeights' to the li element inside the foreach loop below
	- the style attribute 'style="width:<?php echo $item->imageWidth; ?>px;"' to the li element inside the foreach loop below
	...then your Related Items will be transformed into a vertical-scrolling block, inside which, all items have the same height (equal column heights). This can be very useful if you want to show your related articles or products with title/author/category/image etc., which would take a significant amount of space in the classic list-style display.
	*/
	?>

	<?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
	<!-- Related items by tag -->
	<div class="filtered-item__related">
		<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
		<div class="row">
		<?php foreach($this->relatedItems as $key=>$item): ?>
			<div class="col-xs-12 col-sm-6 col-md-3 <?php echo ($key%2) ? "odd" : "even"; ?>">
				
				<?php if($this->item->params->get('itemRelatedImageSize')): ?>
				<div class="filtered-item__related-image" style="background-image: url(<?php echo $item->image; ?>);">
					<a href="<?php echo $item->link ?>">
					<div class="filtered-item__related-image_inner">
						<span class="read-more">READ MORE</span>
					</div>
					</a>
				</div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedTitle', 1)): ?>
				<h4><a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a></h4>
				<?php endif; ?>
				
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	

	

	<?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
	<!-- Item image gallery -->
	<a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
	<div class="itemImageGallery">
		<h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
		<?php echo $this->item->gallery; ?>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
	<!-- Item navigation -->
	<div class="itemNavigation">
		<span class="itemNavigationTitle"><?php echo JText::_('K2_MORE_IN_THIS_CATEGORY'); ?></span>

		<?php if(isset($this->item->previousLink)): ?>
		<a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">&laquo; <?php echo $this->item->previousTitle; ?></a>
		<?php endif; ?>

		<?php if(isset($this->item->nextLink)): ?>
		<a class="itemNext" href="<?php echo $this->item->nextLink; ?>"><?php echo $this->item->nextTitle; ?> &raquo;</a>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>

	<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>


	
</div>
<!-- End K2 Item Layout -->
