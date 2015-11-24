<?php

class SiteController extends Controller
{
	public $layout='column1';

	private $_model;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
//			'captcha'=>array(
//				'class'=>'CCaptchaAction',
//				'backColor'=>0xFFFFFF,
//			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	public function actionIndex()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm']))
		{
			$model->attributes = $_POST['ContactForm'];
			if($model->validate())
			{
				$emails = explode(',', $model->getAttributes()['email']);

				foreach($emails as $key=>$value) {
					$model_email = $this->loadUpdateEmail();
					$model_email->email = htmlspecialchars(trim($value));
					$model_email->save();
				}

				Yii::app()->user->setFlash('formEmail','Your email save in DB.');
				$this->refresh();
			}
		}
		$this->render('form-email', ['model' => $model]);
	}

	public function actionFormEmail() {
		Yii::app()->runController('site/index');
	}

	/**
	 * Displays the list emails page
	 */
	public function actionListEmails()
	{
		$model= Emails::model();
		$this->render('list-emails',array('model'=> $model->findAll())); // $model
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadUpdateEmail()
	{
		if($this->_model===null)
		{
			if(isset($_POST['ContactForm']['email']))
			{
				$condition= "email='".$_POST['ContactForm']['email']."'";
				$this->_model=Emails::model()->find($condition);
			}
			if($this->_model === null) $this->_model= new Emails;
		}
		return $this->_model;
	}

}
