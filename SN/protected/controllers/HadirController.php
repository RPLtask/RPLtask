<?php

class HadirController extends Controller
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
				'actions'=>array('index','view','absen','admin','create','ultah','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
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
	 
	public function actionAbsen()
		{
			$nrp = $_REQUEST['nrp'];
			$model=new Hadir;
			$model->nrp = $nrp;
			$model->WAKTU = date('Y-m-d H:i:s');
			if($model->save())
				echo "sukses";
			else
				print_r($model->getErrors());
				// $this->redirect('index.php?r=site');
			//echo "sukses";
		}	
		
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Hadir;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hadir']))
		{
			$model->attributes=$_POST['Hadir'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
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

		if(isset($_POST['Hadir']))
		{
			$model->attributes=$_POST['Hadir'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			// $this->loadModel($id)->delete();
			Hadir::model()->deleteAll("nrp ='" . $id . "'");
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionAdmin()
	{
		$row = Yii::app()->db->createCommand()
		->select("distinct(peserta.nrp) nrp ,nama, waktu")
		->from('peserta,hadir')
		->where('peserta.nrp=hadir.nrp')
		->group('hadir.nrp')
		->order('waktu asc')
		->queryAll();

		$dataProvider = new CArrayDataProvider($row,array(
			'pagination'=>array(
			'pageSize'=>10000,
						),
		));//dikonfersi ke CArrayDataProvider
		
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionUltah()
	{
		$row = Yii::app()->db->createCommand()
		->select("hadir.nrp ,nama, date_format(tgl_lahir,'%d %M %Y') tgl_lahir")
		->from('peserta,hadir')
		->where("peserta.nrp=hadir.nrp and month(tgl_lahir)=8 and  day(tgl_lahir)=8")
		->queryAll();

		$dataProvider = new CArrayDataProvider($row,array(
			'pagination'=>array(
			'pageSize'=>10000,
						),
		));//dikonfersi ke CArrayDataProvider
		
		$this->render('ultah',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	// public function actionAdmin()
	// {
		// $model=new Hadir('search');
		// $model->unsetAttributes();  // clear any default values
		// if(isset($_GET['Hadir']))
			// $model->attributes=$_GET['Hadir'];

		// $this->render('admin',array(
			// 'model'=>$model,
		// ));
	// }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Hadir::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hadir-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
