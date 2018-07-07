<?php

class LoginController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','viewassign'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changePassword','assigncreate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','adminassign','deleteassign'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionViewassign($id)
	{
		$this->render('viewassign',array(
			'model'=>$this->loadAssignTableModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Login;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['Login'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionAssigncreate()
	{
		$model=new Assigntable;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assigntable']))
		{
			$model->attributes=$_POST['Assigntable'];
			if($model->save())
				$this->redirect(array('viewassign','id'=>$model->Id));
		}

		$this->render('assigncreate',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['Login'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteassign($id)
	{
		$this->loadAssignTableModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('login/adminassign'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Login');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Login('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Login']))
			$model->attributes=$_GET['Login'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminassign()
	{
		$model=new Assigntable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Assigntable']))
			$model->attributes=$_GET['Assigntable'];

		$this->render('adminassign',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Login the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Login::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadAssignTableModel($id)
	{
		$model=Assigntable::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


    public function actionChangePassword()
    {
        $model = new ChangePassword();

        if (isset($_POST['ChangePassword'])) {
            $model = new ChangePassword();
            $user_id = Yii::app()->user->id;
            $user = Login::model()->findByPk($user_id);
            $model->attributes = $_POST['ChangePassword'];
            if ($user->passOperator === $model->currentPassword) {
                // echo $model->newPassword;exit;
                $user->passOperator = $model->newPassword;
                if ($user->save(false)) {
                    Yii::app()->user->logout();
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }
            } else {
                $model->addError('currentPassword', 'Current password not correct');
            }
        }
        $this->render('changePassword', array('model' => $model));
    }

	/**
	 * Performs the AJAX validation.
	 * @param Login $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
