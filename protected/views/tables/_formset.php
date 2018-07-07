<?php
/* @var $this TablesController */
/* @var $model Tables */
/* @var $form CActiveForm */
?>
<style type="text/css">
	#TableId input,#TableId label{
		float: left;
		min-width: auto;
	}	
	#TableId label{
		font-size: 18px;
		margin-top: 7px;
	}
	#TableId .col-md-1{
		width: 15%;
		float: left;
		margin:5px;
	}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'Id'); */?>
		<?php /*echo $form->textField($model,'Id'); */?>
		<?php /*echo $form->error($model,'Id'); */?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
		<div class="errorMessage" id="name_msg"></div>
	</div> 	

	<div class="row">
		<?php echo $form->labelEx($model,'Select Table Number'); ?>
		
		<?php 
		  $tableset = CHtml::listData(Tableset::model()->findAll(), 'Id', 'TableId');
		$tablesetdata='';
			foreach ($tableset as $value) {
				$tablesetdata.=$value.',';
			}
			if($tablesetdata!=""){
		  $data = CHtml::listData(Tables::model()->findAll(array(
    				'condition'=>'Id not in('.rtrim($tablesetdata,',').')')), 'Id', 'Id');
			}else{
			  $data = CHtml::listData(Tables::model()->findAll(), 'Id', 'Id');
			}
    	    echo CHtml::checkBoxList('TableId', array_keys(CHtml::listData(Tables::model()->findAll(), 'Id', 'Id'),false), $data,array(
            'separator'=>'',
            'template'=>'<div class="col-md-1">{input}&nbsp;{label}</div>'
            ));
		?>
		

	</div><div class="errorMessage" id="tableId_msg"></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('onclick'=>'return validation()')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	function validation(){
		$("#tableId_msg").html("");
		$("#name_msg").html("");

		var name=$("#Tableset_Name"),
		 tableid = $("input[name='TableId[]']"),
		 pchecked=false;
		 
		for(var i=0; i < tableid.length; i++){
			
			if(tableid[i].checked) {
				pchecked = true;
			}
		}
		console.log(pchecked);
		if(name.val()==""){
			console.log('333');
		$("#name_msg").html("Please enter name");
		name.focus();
		return false;
		}
		else if(!pchecked){
		$("#tableId_msg").html("Please enter name");
		//name.focus();
		return false;
		}else{
			return true;
		}


	}
</script>