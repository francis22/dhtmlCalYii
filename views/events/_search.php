<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>	
<fieldset >
	<section>
	<?php echo $form->label($model,'event_id'); ?>
	<div class="g4"><?php echo $form->textField($model,'event_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>
	</section>
	
	<section>
	<?php echo $form->label($model,'event_name'); ?>
	<div class="g4"><?php echo $form->textField($model,'event_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>
	</section>
	
	<section>
	<?php echo $form->label($model,'start_date'); ?>
	<div class="g4"><?php echo $form->textField($model,'start_date',array('size'=>25,'maxlength'=>25)); ?>
	</div>
	</section>
	
	<section>
	<?php echo $form->label($model,'end_date'); ?>
	<div class="g4"><?php echo $form->textField($model,'end_date',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	</section>
	<section>
	<?php echo $form->label($model,'details'); ?>
	<div class="g4"><?php echo $form->textField($model,'details'); ?>
	</div>
	</section>
	<section>

	
	<?php echo $form->label($model,'customer'); ?>
	<div class="g4"><?php echo $form->textField($model,'customer'); ?>
	</div>
	</section>
	
	<section>
	<div>
	<?php echo CHtml::submitButton('Search'); ?>
	</div>
	</section>
	
</fieldset >

<?php $this->endWidget(); ?>

</div><!-- search-form -->


