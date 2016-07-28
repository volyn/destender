<?php
/** @var $this ProjectsViewProjects */
defined( '_JEXEC' ) or die; // No direct access
?>
<div class="item-page">
	<h1></h1>
	<?php foreach ( $this->items as $item ): ?>
		<p>
			<a href="<?php echo JRoute::_( 'index.php?view=&id=' . $item->id . ':' . $item->alias ); ?>"><?php echo $item->title; ?></a>
		</p>
	<?php endforeach; ?>

	<?php echo $this->pagination->getPagesLinks(); ?>
</div>