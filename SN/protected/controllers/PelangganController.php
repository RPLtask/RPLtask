<?php

class PelangganController extends CController
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
				'actions'=>array('create','update','GeneratePdf','GenerateExcel'),
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
		$model= new Pelanggan;
		$model2 = new Pengguna;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pelanggan']) &&  isset($_POST['Pengguna']))
		{
			try{
			$model2->attributes=$_POST['Pengguna'];
			$model2->hak_akses=1; //1 = pelanggan
			$model2->save();
			$model->attributes=$_POST['Pelanggan'];
			$model->username = $model2->username;
			}catch(CDbException $e){
			echo "eror"	;
			}
               
			//try{
			if($model->save() ){
				//$model2->save();
				// $this->redirect(array('view','id'=>$model->id_pelanggan));
				
				$this->redirect(array('site/login'));
			}
				// $this->render('create',array(
				// 'model'=>$model,
				// ));
			// }
			// catch(CDbException $e){
				// $model->isNewRecord = false;
				// //$model->save();
				// echo "eror";
			// }
			
			//else
			//$this->setIsNewRecord(false);
			//echo "eror";
			
		}
		
			// $this->render('create',array(
				// 'model'=>$model,	
				// 'model2'=>$model2,	
			// ));
			$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
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

		if(isset($_POST['Pelanggan']))
		{
			$model->attributes=$_POST['Pelanggan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pelanggan));
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
            $session=new CHttpSession;
            $session->open();		
            $criteria = new CDbCriteria();            

                $model=new Pelanggan('search');
                $model->unsetAttributes();  // clear any default values

                if(isset($_GET['Pelanggan']))
		{
                        $model->attributes=$_GET['Pelanggan'];
			
			
                   	
                       if (!empty($model->id_pelanggan)) $criteria->addCondition('id_pelanggan = "'.$model->id_pelanggan.'"');
                     
                    	
                       if (!empty($model->nama_pelanggan)) $criteria->addCondition('nama_pelanggan = "'.$model->nama_pelanggan.'"');
                     
                    	
                       if (!empty($model->jenis_kelamin)) $criteria->addCondition('jenis_kelamin = "'.$model->jenis_kelamin.'"');
                     
                    	
                       if (!empty($model->alamat)) $criteria->addCondition('alamat = "'.$model->alamat.'"');
                     
                    	
                       if (!empty($model->kelurahan)) $criteria->addCondition('kelurahan = "'.$model->kelurahan.'"');
                     
                    	
                       if (!empty($model->kecamatan)) $criteria->addCondition('kecamatan = "'.$model->kecamatan.'"');
                     
                    	
                       if (!empty($model->kota)) $criteria->addCondition('kota = "'.$model->kota.'"');
                     
                    	
                       if (!empty($model->tanggal_lahir)) $criteria->addCondition('tanggal_lahir = "'.$model->tanggal_lahir.'"');
                     
                    			
		}
                 $session['Pelanggan_records']=Pelanggan::model()->findAll($criteria); 
       

                $this->render('index',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pelanggan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pelanggan']))
			$model->attributes=$_GET['Pelanggan'];

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
		$model=Pelanggan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pelanggan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['Pelanggan_records']))
               {
                $model=$session['Pelanggan_records'];
               }
               else
                 $model = Pelanggan::model()->findAll();

		
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

             if(isset($session['Pelanggan_records']))
               {
                $model=$session['Pelanggan_records'];
               }
               else
                 $model = Pelanggan::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Pelanggan Report');
		$pdf->SetSubject('Pelanggan Report');
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
		$pdf->Output("Pelanggan_002.pdf", "I");
	}
}
