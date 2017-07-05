<?php

class PemesananController extends CController
{
        public $breadcrumbs;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

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
				'actions'=>array('create','update','GeneratePdf','GenerateExcel','tiket'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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
	 public function actionTiket()
	{
	// echo "tiket";
		$this->render('tiket',array(
			// 'model'=>$this->loadModel($id),
		));
	}
	 
	public function actionView($id)
	{
		$id_rute = $_GET['id'];
		$dpms = Pemesanan::model()->findByPk($id_rute);
		$data = Rute::model()->findByPk($dpms['id_rute']);
		$berangkat = $data['berangkat'];
		$tujuan = $data['tujuan'];
		// echo "<br>";
		// echo "<br>";
		// echo "<br>";
		// echo "<h1>hahaha".$data['tujuan']."</h1>";

		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'berangkat'=>$berangkat,
			'tujuan'=>$tujuan,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pemesanan;
		$id_rute = $_GET['id_rute'];
		// echo "<h1>".$id_rute."<h1>";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pemesanan']))
		{
			$model->attributes=$_POST['Pemesanan'];
			if($model->save())
				// $this->redirect(array('view','id'=>$model->id_pemesanan));
				$this->redirect(array('view','id'=>$model->id_pemesanan));
		}

		$this->render('create',array(
			'model'=>$model,
			'id_rute'=>$id_rute,
		));
		
		// $this->render('table',array(
			// 'model'=>$model,
		// ));
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

		if(isset($_POST['Pemesanan']))
		{
			$model->attributes=$_POST['Pemesanan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pemesanan));
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
			$user = Yii::app()->user->id;
			//$pengguna = Pengguna::model()->find('username=:un',array(':un'=>$user));
			$pelanggan = Pelanggan::model()->find('username=:un',array(':un'=>$user));
			echo "<h1>$pelanggan->id_pelanggan</h1>";
			
			
		   	// $dataProvider=new CActiveDataProvider('Pemesanan', array(
						// 'criteria'=>array(
							// 'with'=>array('')
							// 'condition'=>'id_pelanggan =:id',
							// 'params'=>array("id"=>$pelanggan->id_pelanggan),
						// ),
						// 'pagination'=>array(
							// 'pageSize'=>100,
						// ),
					// ));
			$row = Yii::app()->db->createCommand()
			->select('id_pemesanan,	tgl_pemesanan, waktu, berangkat, tujuan, no_kursi, if(status=0,concat(datediff(DATE_ADD(tgl_pemesanan,INTERVAL 7 DAY),now())," hari"),"-") mb')
			->from('pemesanan , rute')
			->where('
					pemesanan.id_rute = rute.id_rute ')
			->queryAll();

			$dataProvider = new CArrayDataProvider($row,array(
				'pagination'=>array(
				'pageSize'=>1000,
			),
		));//dikonfersi ke CArrayDataProvider
			
            $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pemesanan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pemesanan']))
			$model->attributes=$_GET['Pemesanan'];

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
		$model=Pemesanan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pemesanan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['Pemesanan_records']))
               {
                $model=$session['Pemesanan_records'];
               }
               else
                 $model = Pemesanan::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.modules.admin.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

             if(isset($session['Pemesanan_records']))
               {
                $model=$session['Pemesanan_records'];
               }
               else
                 $model = Pemesanan::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Pemesanan Report');
		$pdf->SetSubject('Pemesanan Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("Pemesanan_002.pdf", "I");
	}
}
