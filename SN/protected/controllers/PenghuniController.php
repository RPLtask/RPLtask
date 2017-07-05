<?php

class PenghuniController extends Controller
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
				'actions'=>array('index','view','vpenghuni','ajaxupdate'),
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
	//Viewpenghuni::model()->findAll();
	public function actionVpenghuni(){
		$row = 	
		Yii::app()->db->createCommand()
					->select('penghuni.id_penghuni, pelanggan.nama, lokasi_kost.nama_lokasi, kamar.nomor_kamar, tipe_kamar.nama_tipe, penghuni.tgl_masuk, penghuni.tgl_keluar,	penghuni.jenis_bayar,penghuni.nilai_kontrak')
					->from('penghuni, pelanggan,lokasi_kost, kamar, tipe_kamar')
					//->join('bayar','bayar.id_penghuni=pelanggan.id_pelanggan')
					->where('penghuni.id_pelanggan=pelanggan.id_pelanggan and penghuni.id_kamar=kamar.id_kamar')
					->group('penghuni.id_penghuni')
					->queryAll();
		
		$tunggakan = new CArrayDataProvider($row);//dikonfersi ke CArrayDataProvider
		
		$this->render('tunggakan', array(
			'tunggakan' => $tunggakan,
		));
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
		$model=new Penghuni;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
try {
   if(isset($_POST['Penghuni']))
		{
		// echo 'id penghuni :'.$_POST['Penghuni']['id_penghuni']."<br>";
		// echo $_POST['Penghuni']['id_pelanggan']."<br>";
		// echo $_POST['Penghuni']['id_kamar']."<br>";
		// echo 'tanggal masuk :'.$_POST['Penghuni']['tgl_masuk']."<br>";
		 // echo 'tanggal keluar :'.$_POST['Penghuni']['tgl_keluar']."<br>";
		// echo $_POST['Penghuni']['jenis_bayar']."<br>";
		// echo $_POST['Penghuni']['nilai_kontrak']."<br>";
		// echo $_POST['Penghuni']['status']."<br>";
			 //$model->attributes=$_POST['Penghuni'];
			 $model->id_penghuni=$_POST['Penghuni']['id_penghuni'];
			 $model->id_pelanggan=$_POST['Penghuni']['id_pelanggan'];
			 $model->id_kamar=$_POST['Penghuni']['id_kamar'];
			 $model->tgl_masuk=$_POST['Penghuni']['tgl_masuk'];
			 $model->tgl_keluar=$_POST['Penghuni']['tgl_keluar'];
			 $model->jenis_bayar=$_POST['Penghuni']['jenis_bayar'];
			 $model->nilai_kontrak=$_POST['Penghuni']['nilai_kontrak'];
			 $model->status=$_POST['Penghuni']['status'];
			 
			// echo $model->id_penghuni;
			 $model->save();
			// //if($model->save())
			$id = Penghuni::model()->find(array('order'=>'id_penghuni desc'));
			$this->redirect(array('view','id'=>$id['id_penghuni']));
			
		}
			

} 
catch (Exception $e) {
	$id = Penghuni::model()->find(array('order'=>'id_penghuni desc'));
	$this->redirect(array('view','id'=>$id['id_penghuni']));
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

		if(isset($_POST['Penghuni']))
		{
			$model->attributes=$_POST['Penghuni'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_penghuni));
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
		$dataProvider=new CActiveDataProvider('Penghuni');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new penghuni('search');
		//$model->unsetAttributes();  // clear any default values
		$model->setAttributes($attr);
		
		if(isset($_GET['Penghuni']))
			$model->attributes=$_GET['Penghuni'];

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
		$model=Penghuni::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='penghuni-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
		
	public function actionAjaxupdate()
	{
		$act = $_GET['act'];
		//echo $act;
		if($act=='doSortOrder')
		{
			$sortOrderAll = $_POST['sortOrder'];
			if(count($sortOrderAll)>0)
			{
				foreach($sortOrderAll as $menuId=>$sortOrder)
				{
					$model=$this->loadModel($menuId);
					$model->sortOrder = $sortOrder;
					$model->save();
				}
			}
		}
		else
		{           
			$autoIdAll = $_POST['id'];
			
			if(count($autoIdAll)>0)
			{
				foreach($autoIdAll as $autoId)
				{
					
					$model=$this->loadModel($autoId);
					if($act=='doDelete')
						$model->status = 0;
					if($act=='doActive')
						$model->isActive = '1';
					if($act=='doInactive')
						$model->isActive = '0';                     
					if($model->save())
						echo '';
					else
						throw new Exception("Sorry",500);
						//echo "belum di save";
				
				}
			}
		}
	}

	
}
