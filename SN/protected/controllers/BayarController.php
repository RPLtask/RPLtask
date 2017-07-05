<?php

class BayarController extends Controller
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
				'actions'=>array('index','view','DetailTunggakan','Bayar_penghuni','GetId','Bayarlangsung'),
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
	
	public function actionGetid($id)
	{
		$nilai = Penghuni::model()->findByPk($id);
		echo $nilai['nilai_kontrak'];
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Bayar;
		//echo $_POST['Bayar']['tgl_bayar']
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bayar']))
		{
			$model->attributes=$_POST['Bayar'];
			$model->tgl_bayar = $_POST['Bayar']['tgl_bayar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_bayar));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionDetailTunggakan($id){
		//echo"nama aku budi sudarsono";
		$model = new Bayar;
		$criteria = new CDbCriteria;
		$criteria->addCondition("id_penghuni = $id");
		$bayar = Bayar::model()->find($criteria);
		
		
		// foreach($bayar as $row){
			// echo $row['nilai_bayar'].'<br>';
		// }
		
		// $this->render('_form',array(
			// 'model'=>$this->loadModel($id),
		// ));
		$model=$this->loadModel($id);
		$this->render('form_bayar', array(
			'model' => $model,
		));
	}
	
	
	public function actionBayarlangsung(){
		//echo"nama aku budi sudarsono";
		 $model = new Bayar;
		// $criteria = new CDbCriteria;
		// $criteria->addCondition("id_penghuni = $id");
		// $bayar = Bayar::model()->find($criteria);
		
		
		// foreach($bayar as $row){
			// echo $row['nilai_bayar'].'<br>';
		// }
		
		// $this->render('_form',array(
			// 'model'=>$this->loadModel($id),
		// ));
		//$model=$this->loadModel($id);
		$this->render('create', array(
			'model' => $model,
		));
	}
	
	
	
	public function actionBayar_penghuni(){
		$tgldibayar = $_POST['Bayar']['tgl_dibayar'];
		$nilaibayar = $_POST['Bayar']['nilai_bayar'];
		$sisabayar = $_POST['Bayar']['sisa_bayar'];
		$statusbayar = $_POST['Bayar']['status'];
		$tgl_bayar = $_POST['Bayar']['tgl_bayar'];
		$idpenghuni = $_POST['Bayar']['id_penghuni'];
		$id = $_POST['Bayar']['id_bayar'];
		//$kolor = $_POST['nkk'];
			
		
		 // echo 'tanggal dibayar:'.$tgldibayar;
		// echo "<br>";
		 // echo 'nilai bayar:'.$nilaibayar;
		// echo "<br>";
		 // echo 'sisa bayar:'.$sisabayar;
		// echo "<br>";
		 // echo 'status bayar:'.$statusbayar;
		// echo "<br>";
		// echo 'tgl bayar:'.$tgl_bayar;
		// echo "<br>";
		// echo 'id_penghuni:'.$idpenghuni;
		// echo "<br>";
		// echo 'id bayar:'.$id;
		// echo "<br>";
		
		$char = preg_split('/,/', $tgl_bayar, -1, PREG_SPLIT_NO_EMPTY);
		// echo "nilai baru dari tgl bayar".print_r($char);
		
		//echo 'haha'.$char[0];
		$jumlah = count($char);
		$a = 0;
		$nilai_kontrakAll = Penghuni::model()->find('id_penghuni=:ip',array(':ip'=>$idpenghuni));
		$nilai_kontrakAll = $nilai_kontrakAll->nilai_kontrak*$jumlah;
	
		$nilai_kontrak = $nilai_kontrakAll/$jumlah ;
		$b = $nilaibayar ;
		while ($a<$jumlah-1):
		$b-=$nilai_kontrak;
		$a++;
		endwhile;
		if(isset($idpenghuni) && isset($tgl_bayar)){
		//mulai pengulangan
			//$arr = array("one", "two", "three");

			foreach ($char as $key => $value) {
			// echo "Key: $key; Value: $value<br />\n";
			// $model = Bayar::model()->findByPk($id);
			//$model = SalesItems::model()->findAll('sale_id=:id',array(':id'=>$_GET['id']));
			$model = Bayar::model()->find('id_penghuni=:ip and tgl_bayar=:tb and status=:s',array(':ip'=>$idpenghuni,'tb'=>$value,'s'=>0));
			$model->tgl_bayar = $value;
			$model->tgl_dibayar = $_POST['Bayar']['tgl_dibayar'];
			if ($jumlah>1){
				if ($nilaibayar < $nilai_kontrakAll ){ #jika nilai bayar lebih kecil dari nilai kontrak
					if ($key != $jumlah-1){
						$model->nilai_bayar = $nilai_kontrak;
						$model->status = 1;
					}
					else{
						$model->nilai_bayar = $b;
						$model->status = 0;
						$model->sisa_bayar = $nilai_kontrak-$b;
					}
				}
				else{
					$model->nilai_bayar = $nilai_kontrak;
					$model->status = 1;
				}
			}
			else{
				if ($nilaibayar >= $nilai_kontrakAll){
					$model->nilai_bayar = $nilai_kontrak;
					$model->status = 1;
					$model->sisa_bayar = $sisabayar;
				}
				else{
					$model->nilai_bayar = $b;
					$model->status = 0;
					$model->sisa_bayar = $nilai_kontrak-$b;
				}
			}
			$model->update();
			}
		//akhir pengulangan	
			$this->redirect(array('pelanggan/tunggakan'));
		}
	
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

		if(isset($_POST['Bayar']))
		{
			$model->attributes=$_POST['Bayar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_bayar));
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
		$dataProvider=new CActiveDataProvider('Bayar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Bayar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bayar']))
			$model->attributes=$_GET['Bayar'];

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
		$model=Bayar::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='bayar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
