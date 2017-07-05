<?php

class RuteController extends CController
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
		$model=new Rute;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rute']))
		{
			$model->attributes=$_POST['Rute'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_rute));
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

		if(isset($_POST['Rute']))
		{
			$model->attributes=$_POST['Rute'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_rute));
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
			
			$model = new Rute;
			$berangkat = $_REQUEST['Rute']['berangkat'];
			$tujuan = $_REQUEST['Rute']['tujuan'];
			$waktu= $_REQUEST['Rute']['waktu'];
			$kelas= $_REQUEST['Rute']['kelas'];
			//$waktu = $waktu + '00';
				
			if ($berangkat!='' &&  $tujuan!=''  &&   $waktu !=''  &&  $kelas!=''      ){
			$data=new CActiveDataProvider('Rute', array(
						'criteria'=>array(
							'condition'=>'berangkat = :b  and tujuan=:t and date(waktu) = :w and kelas= :k',
							'params'=>array(':b'=>$berangkat,':t'=>$tujuan,':w'=>$waktu,'k'=>$kelas),
						),
						'pagination'=>array(
							'pageSize'=>100,
						),
					));
			}
			else
			{
			$data=new CActiveDataProvider('Rute', array(
					'criteria'=>array(
							'condition'=>' date(waktu) = :w ',
							'params'=>array(':w'=>date('Y-m-d')),
						),
					'pagination'=>array(
							'pageSize'=>100,
						),
					));
			}
			
			
			
		$this->render('index',array(
			'model'=>$model,
			'data'=>$data,
			'berangkat'=>$berangkat,
			'tujuan'=>$tujuan,
			'waktu'=>$waktu,
			'kelas'=>$kelas,
		));

			// else
			//print_r($model);
            // $session=new CHttpSession;
            // $session->open();		
            // $criteria = new CDbCriteria();            

                // $model=new Rute('search');
                // $model->unsetAttributes();  // clear any default values

                // if(isset($_GET['Rute']))
		// {
                        // $model->attributes=$_GET['Rute'];
			
			
                   	
                       // if (!empty($model->id_rute)) $criteria->addCondition('id_rute = "'.$model->id_rute.'"');
                     
                    	
                       // if (!empty($model->berangkat)) $criteria->addCondition('berangkat = "'.$model->berangkat.'"');
                     
                    	
                       // if (!empty($model->tujuan)) $criteria->addCondition('tujuan = "'.$model->tujuan.'"');
                     
                    	
                       // if (!empty($model->waktu)) $criteria->addCondition('waktu = "'.$model->waktu.'"');
                     
                    	
                       // if (!empty($model->harga)) $criteria->addCondition('harga = "'.$model->harga.'"');
                     
                    	
                       // if (!empty($model->kelas)) $criteria->addCondition('kelas = "'.$model->kelas.'"');
                     
                    	
                       // if (!empty($model->id_bus)) $criteria->addCondition('id_bus = "'.$model->id_bus.'"');
                     
                    			
		// }
                 // $session['Rute_records']=Rute::model()->findAll($criteria); 
       

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rute('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rute']))
			$model->attributes=$_GET['Rute'];

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
		$model=Rute::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='rute-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['Rute_records']))
               {
                $model=$session['Rute_records'];
               }
               else
                 $model = Rute::model()->findAll();

		
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

             if(isset($session['Rute_records']))
               {
                $model=$session['Rute_records'];
               }
               else
                 $model = Rute::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Rute Report');
		$pdf->SetSubject('Rute Report');
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
		$pdf->Output("Rute_002.pdf", "I");
	}
}
