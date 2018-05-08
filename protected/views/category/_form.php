<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
    'htmlOptions'=>array(
        'enctype'=> 'multipart/form-data'
    ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php if($model->isNewRecord!='1'){ ?>

            <div class="row">
                <?php
                if($model->ImageUrl!=NULL)
                {
                    ?>
                    <?php
                    echo CHtml::image(Yii::app()->request->baseUrl.'/images/category/'.$model->ImageUrl,"image",array("width"=>100));
                }
                //else  echo CHtml::image(Yii::app()->request->baseUrl.'/images/www/no_image.jpg',"image",array("width"=>100));
                ?>
            </div>
	<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'ImageUrl'); ?>
		<?php echo CHtml::activeFileField($model,'ImageUrl'); ?>
		<?php echo $form->error($model,'ImageUrl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->