<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	'enableAjaxValidation'=>true,
	
)); ?>


	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<fieldset>
		<section>
			<?php echo $form->labelEx($model,'event_name'); ?>
			<div class="g4"><?php echo $form->textField($model,'event_name',array('size'=>25,'maxlength'=>25)); ?></div>
			<?php echo $form->error($model,'event_name'); ?>
		</section>

		<section>
			<?php echo $form->labelEx($model,'start_date'); ?>
			<div class="g4"><?php echo $form->textField($model,'start_date',array('size'=>25,'maxlength'=>25)); ?></div>
			<?php echo $form->error($model,'start_date'); ?>
		</section>

		<section>
			<?php echo $form->labelEx($model,'end_date'); ?>
			<div class="g4"><?php echo $form->textField($model,'end_date'); ?></div>
			<?php echo $form->error($model,'end_date'); ?>
		</section>

		<section>
			<?php echo $form->labelEx($model,'details'); ?>
			<div class="g4"><?php echo $form->textArea($model,'details'); ?></div>
			<?php echo $form->error($model,'details'); ?>
		</section>

		<section>
			<?php echo $form->labelEx($model,'customer'); ?>
			<div class="g4"><?php echo $form->dropDownList($model,'customer',CHtml::listData(Customer::model()->findAll(), 'id', 'name' )); ?></div>
			<?php echo $form->error($model,'customer'); ?>
		</section>

	<section>	

	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

	</section>
	<fieldset>
<?php $this->endWidget(); ?>
</div>
