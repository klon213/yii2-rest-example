<?php
namespace app\api\modules\v1\controllers;

use common\models\User;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;


class ProjectController extends Controller
{
	// We are using the regular web app modules:
	//public $modelClass = 'User';

	public function actionIndex()
	{
		$model = new \app\api\modules\v1\models\User();
		$result = $model->findAll(1);
		//die(var_dump($result));
		return json_encode(ArrayHelper::toArray($result));
	}
}