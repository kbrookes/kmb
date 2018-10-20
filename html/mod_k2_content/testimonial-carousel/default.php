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
$doc->addScript(JURI::base() . 'templates/kissmytemplate/js/jquery.matchHeight-min.js');
?>

<div id="testimonial-carousel" class="testimonials-carousel carousel slide carousel-fade"  data-ride="carousel" data-interval="8000">
<?php if(count($items)): ?>
<div class="carousel-inner d-flex" role="listbox">
    <?php foreach ($items as $key=>$item):	?>
    <div class="carousel-item <?php if($key==0):?> active<?php endif; ?>" data-mh="carousel-item">
		<blockquote>
			<?php if($params->get('itemIntroText')): ?>
			<div class="blockquote-inner d-flex">
	      		<span class="logo-primary-fill" data-name="Layer 1"><i class="fa fa-quote-left"></i></span> <?php echo $item->introtext; ?>
			</div>
	      	<?php endif; ?>
	      	<footer>
		      	<?php if($params->get('itemTitle')): ?><cite><?php echo $item->title; ?></cite><?php endif; ?>
	      	</footer>
		</blockquote>
    </div>
    <?php endforeach; ?>
	</div>
<?php endif; ?>	
</div>


