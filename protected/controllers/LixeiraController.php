<?php

class LixeiraController extends Controller
{	
    
           public function filters()
 {
  return array(
   'accessControl', // perform access control for CRUD operations
  );
 }
         
         public function accessRules()
 {
  return array(
  
   array('allow',  // allow all users to perform 'index' and 'view' actions
    //'actions'=>array('index'),
   'expression'=>'isset($user->id_grupos_usuarios)',
   ),
   array('deny',  // deny all users
    'users'=>array('*'),
   ),
  );
 }
    
    
    
	public function actionIndex()
	{
		  $list = Yii::app()->db->createCommand("SELECT `cv2_veiculos_veiculos`.id AS `id_veiculo`,
       `cv2_veiculos_veiculos`.descricao,
       `cv2_veiculos_veiculos`.valor,
        `cv2_veiculos_veiculos`.id,
       `cv2_veiculos_veiculos`.valor_promocional,
       `cv2_veiculos_veiculos`.data_cadastro,
       `cv2_veiculos_veiculos`.status,
       `cv2_veiculos_tipos`.`descricao` AS `tipo`,   
       `cv2_veiculos_marcas`.`descricao` AS `marca`
FROM `cv2_veiculos_veiculos`    
   INNER JOIN `cv2_veiculos_tipos` ON `cv2_veiculos_veiculos`.`id_tipo` = `cv2_veiculos_tipos`.`id`
   INNER JOIN `cv2_veiculos_marcas` ON `cv2_veiculos_veiculos`.`id_marca` = `cv2_veiculos_marcas`.`id`
WHERE cv2_veiculos_veiculos.`status` = 1;")->queryAll();
		$this->render('index', array(
            'list' => $list,
        ));
    }
    
     public function actionRestaurar() {
        $id = $_GET['id'];
        // we only allow deletion via POST request
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('succes', "Restaurado com sucesso.");
            $this->redirect(array('index'));
        }
     }
}
?>