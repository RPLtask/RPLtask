<?php

class KamarController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{	
		$satu = 1;
		$id =$_POST['Kamar']['id_kamar'];
		if(isset($id)){
		$cek = Kamar::model()->find(array('condition'=>'left(id_kamar,3)="'.$id.'"','order'=>'id_kamar desc'));
		if (count($cek)==0){
		$id_kamar = $id.'-'.$satu;
		}else{
		$angka = SUBSTR($cek['id_kamar'],4,5);
		$angkabaru = $angka + 1;
		$id_kamar = $id.'-'.$angkabaru;
		}
	}

		$model=new Kamar;

		//Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Kamar']))
		{			
			$model->id_kamar=$id_kamar;
			$model->id_tipe=$_POST['Kamar']['id_tipe'];
			$model->id_lokasi=$_POST['Kamar']['id_lokasi'];
			$model->nomor_kamar=substr($id_kamar,4,6);
			$model->ukuran=$_POST['Kamar']['ukuran'];
			$model->tarif=$_POST['Kamar']['tarif'];
			//$model->status_h=$_POST['Kamar']['status_h'];
			
			$model->img_kamar=CUploadedFile::getInstance($model,'img_kamar');
			
			if($model->save())
			{		if ($model->img_kamar!=0)
					$model->img_kamar->saveAs(Yii::app()->basePath.'/../fotokamar/'.$model->id_kamar.'.jpg');  // image will uplode to rootDirectory/foto/
					
					
					
				$this->redirect(array('view','id'=>$model->id_kamar));
			}
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

		if(isset($_POST['Kamar']))
		{
			$model->attributes=$_POST['Kamar'];
			$model->img_kamar=CUploadedFile::getInstance($model,'img_kamar');
			if($model->img_kamar!=""){
				//unlink(Yii::app()->basePath.'/../fotokamar/'.$id.'.jpg');
				if($model->save())
				{
					$model->img_kamar->saveAs(Yii::app()->basePath.'/../fotokamar/'.$model->id_kamar.'.jpg');  // image will uplode to rootDirectory/foto/					
					$this->redirect(array('view','id'=>$model->id_kamar));
				}
			}
			else{
			$model->save();
			$this->redirect(array('view','id'=>$model->id_kamar));
			}
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
			$this->loadModel($id)->delete();

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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Kamar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kamar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kamar']))
			$model->attributes=$_GET['Kamar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Kamar::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kamar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
