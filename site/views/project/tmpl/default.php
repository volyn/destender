<?php
/** @var $this ProjectsViewProject */
defined( '_JEXEC' ) or die; // No direct access
?>
<div class="item-page">
	<h1><?php echo $this->item->title; ?></h1>

	<?php echo $this->item->introtext . $this->item->fulltext; ?>
</div>