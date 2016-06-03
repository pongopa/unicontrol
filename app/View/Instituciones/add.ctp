<div class="instituciones form">
<?php echo $this->Form->create('Institucione');?>
	<fieldset>
		<legend><?php echo __('Add Institucione'); ?></legend>
	<?php
		echo $this->Form->input('denominacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Instituciones'), array('action' => 'index'));?></li>
	</ul>
</div>
