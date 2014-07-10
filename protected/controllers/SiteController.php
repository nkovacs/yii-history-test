<?php

class SiteController extends Controller
{
	private static $rawData = array(
		array(
			'field1' => 'Lörém',
		),
		array(
			'field1' => 'ipsűm',
		),
		array(
			'field1' => 'dólőr',
		),
		array(
			'field1' => 'sít',
		),
		array(
			'field1' => 'ámet',
		),
		array(
			'field1' => 'conßectetur',
		),
		array(
			'field1' => 'adipiscing',
		),
		array(
			'field1' => 'elit',
		),
		array(
			'field1' => 'Nunc',
		),
		array(
			'field1' => 'vel',
		),
		array(
			'field1' => 'dignissim',
		),
		array(
			'field1' => 'odio',
		),
		array(
			'field1' => 'Maecenas',
		),
		array(
			'field1' => 'ut',
		),
		array(
			'field1' => 'est',
		),
		array(
			'field1' => 'id',
		),
		array(
			'field1' => 'ligula',
		),
		array(
			'field1' => 'tristique',
		),
		array(
			'field1' => 'hendrerit',
		),
		array(
			'field1' => 'Morbi',
		),
		array(
			'field1' => 'ornare',
		),
		array(
			'field1' => 'tortor',
		),
		array(
			'field1' => 'vel',
		),
		array(
			'field1' => 'hendrerit',
		),
		array(
			'field1' => 'volutpat',
		),
		array(
			'field1' => 'Curabitur',
		),
		array(
			'field1' => 'id',
		),
		array(
			'field1' => 'justo',
		),
		array(
			'field1' => 'vel',
		),
		array(
			'field1' => 'nunc',
		),
		array(
			'field1' => 'tempus',
		),
		array(
			'field1' => 'feugiat',
		),
		array(
			'field1' => 'Lorem',
		),
		array(
			'field1' => 'ipsum',
		),
		array(
			'field1' => 'dolor',
		),
		array(
			'field1' => 'sit',
		),
		array(
			'field1' => 'amet',
		),
		array(
			'field1' => 'consectetur',
		),
		array(
			'field1' => 'adipiscing',
		),
		array(
			'field1' => 'elit',
		),
		array(
			'field1' => 'Vivamus',
		),
		array(
			'field1' => 'sem',
		),
		array(
			'field1' => 'orci',
		),
		array(
			'field1' => 'blandit',
		),
		array(
			'field1' => 'eget',
		),
		array(
			'field1' => 'arcu',
		),
		array(
			'field1' => 'et',
		),
		array(
			'field1' => 'placerat',
		),
		array(
			'field1' => 'bibendum',
		),
		array(
			'field1' => 'ante',
		),
		array(
			'field1' => 'Phasellus',
		),
		array(
			'field1' => 'vestibulum',
		),
		array(
			'field1' => 'massa',
		),
		array(
			'field1' => 'non',
		),
		array(
			'field1' => 'fringilla',
		),
		array(
			'field1' => 'aliquet',
		),
		array(
			'field1' => 'nibh',
		),
		array(
			'field1' => 'dolor',
		),
		array(
			'field1' => 'posuere',
		),
		array(
			'field1' => 'enim',
		),
		array(
			'field1' => 'ut',
		),
		array(
			'field1' => 'vestibulum',
		),
		array(
			'field1' => 'mi',
		),
		array(
			'field1' => 'erat',
		),
		array(
			'field1' => 'vel',
		),
		array(
			'field1' => 'mi',
		),
		array(
			'field1' => 'Vivamus',
		),
		array(
			'field1' => 'tempus',
		),
		array(
			'field1' => 'est',
		),
		array(
			'field1' => 'quis',
		),
		array(
			'field1' => 'massa',
		),
		array(
			'field1' => 'gravida',
		),
		array(
			'field1' => 'eget',
		),
		array(
			'field1' => 'mattis',
		),
		array(
			'field1' => 'urna',
		),
		array(
			'field1' => 'gravida',
		),
		array(
			'field1' => 'Aenean',
		),
		array(
			'field1' => 'et',
		),
		array(
			'field1' => 'ultricies',
		),
		array(
			'field1' => 'lacus',
		),
	);

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionGrid($param)
	{
		if ($param !== 'áűőú++') {
			throw new CHttpException(400, "param must be áűőú++, got: $param");
		}

		$rawData = self::$rawData;

		foreach ($rawData as $i => &$value) {
			$value['id'] = $i;
			$value['field2'] = rand(1,100);
		}

		$filterForm = new FilterForm();

		if (isset($_GET['FilterForm'])) {
			$filterForm->filters=$_GET['FilterForm'];
		}

		$filteredData = $filterForm->filter($rawData);

		$dataProvider = new CArrayDataProvider($filteredData, array(
			'id' => 'test',
			'sort' => array(
				'attributes'=>array(
					'id', 'field1', 'field2',
				),
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));

		$this->render('grid', array(
			'dataProvider' => $dataProvider,
			'filterForm' => $filterForm,
		));
	}

	public function actionList($param)
	{
		if ($param !== 'áűőú++') {
			throw new CHttpException(400, "param must be áűőú++, got: $param");
		}

		$rawData = self::$rawData;

		foreach ($rawData as $i => &$value) {
			$value['id'] = $i;
			$value['field2'] = rand(1,100);
		}

		$dataProvider = new CArrayDataProvider($rawData, array(
			'id' => 'test',
			'sort' => array(
				'attributes'=>array(
					'id', 'field1', 'field2',
				),
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));

		$this->render('list', array(
			'dataProvider' => $dataProvider,
		));
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
