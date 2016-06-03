<div class="instituciones view">
<h2><?php  echo __('Institucione');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institucione['Institucione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($institucione['Institucione']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($institucione['Institucione']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($institucione['Institucione']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Institucione'), array('action' => 'edit', $institucione['Institucione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Institucione'), array('action' => 'delete', $institucione['Institucione']['id']), null, __('Are you sure you want to delete # %s?', $institucione['Institucione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instituciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institucione'), array('action' => 'add')); ?> </li>
	</ul>
</div>
