<?php 
	require_once '../includes/DbOperation.php';
	
	$response = array(); 
	
	if(isset($_GET['op'])){
		
		switch($_GET['op']){
			
			case 'addheroes':
				if(isset($_POST['name']) && isset($_POST['role'])){
					$db = new DbOperation(); 
					if($db->createHeroes($_POST['name'], $_POST['role'])){
						$response['error'] = false;
						$response['message'] = 'Se ha añadido la cuenta exitosamente';
					}else{
						$response['error'] = true;
						$response['message'] = 'No se ha logrado ingresar la cuenta';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Required Parameters are missing';
				}
			break; 

			case 'getheroes':
				$db = new DbOperation();
				$hero = $db->getHeroes();
				if(count($hero)<=0){
					$response['error'] = true; 
					$response['message'] = 'No se ha encontrado la base de datos';
				}else{
					$response['error'] = false; 
					$response['hero'] = $hero;
				}
			break; 
			
			default:
				$response['error'] = true;
				$response['message'] = 'Ninguna operacion para realizar';
			
		}
		
	}else{
		$response['error'] = false; 
		$response['message'] = 'Invalid Request';
	}
	
	echo json_encode($response);