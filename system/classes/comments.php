<?php defined('IN_CMS') or die('No direct access allowed.');

class Comments {

	public static function list_all($params = array()) {
		$sql = "select * from comments where 1 = 1";
		$args = array();
		
		if(isset($params['status'])) {
			$sql .= " and status = ?";
			$args[] = $params['status'];
		}

		if(isset($params['post'])) {
			$sql .= " and post = ?";
			$args[] = $params['post'];
		}
		
		if(isset($params['sortby'])) {
			$sql .= " order by " . $params['sortby'];
			
			if(isset($params['sortmode'])) {
				$sql .= " " . $params['sortmode'];
			}
		}
		
		if(isset($params['limit'])) {
			$sql .= " limit " . $params['limit'];
			
			if(isset($params['offset'])) {
				$sql .= " offset " . $params['offset'];
			}
		}

		$result = Db::results($sql, $args);
		
		return new Items($result);
	}

	public static function add($post_id) {
		$post = Input::post(array('name', 'email', 'text'));
		$errors = array();

		if(empty($post['name'])) {
			$errors[] = 'Veuillez spécifier un pseudonyme';
		}
		
		if(filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'S’il vous plait, entrez au moins une adresse valide…';
		}
		
		if(empty($post['text'])) {
			$errors[] = 'Il faudrait peut être écrire quelque chose avant de publier, n’est-ce pas ?';
		}
		
		if(count($errors)) {
			Notifications::set('error', $errors);
			return false;
		}

		$post['date'] = time();
		$post['status'] = Config::get('metadata.auto_published_comments', 0) ? 'published' : 'pending';
		$post['post'] = $post_id;

		// encode any html
		$post['text'] = Html::encode($post['text']);

		Db::insert('comments', $post);
		
		Notifications::set('success', 'Votre avis a été envoyé');
		
		return true;
	}
	
	public static function update() {
		$post = Input::post(array('id', 'text', 'status'));
		$errors = array();
		
		if(empty($post['text'])) {
			$errors[] = 'Écrivez un peu. S’il vous plait.';
		}

		if(count($errors)) {
			$output = json_encode(array('result' => false, 'errors' => $errors));
			Response::content($output);
			return false;
		}
		
		$id = $post['id'];
		unset($post['id']);

		Db::update('comments', $post, array('id' => $id));

		$output = json_encode(array('result' => true));
		Response::content($output);
	}
	
	public static function update_status() {
		$post = Input::post(array('id', 'status'));
		$errors = array();
		
		if(in_array($post['status'], array('published', 'pending', 'spam')) === false) {
			$errors[] = 'Statut de commentaire non valide';
		}

		if(count($errors)) {
			$output = json_encode(array('result' => false, 'errors' => $errors));
			Response::content($output);
			return false;
		}
		
		$id = $post['id'];
		unset($post['id']);
		
		Db::update('comments', $post, array('id' => $id));

		$output = json_encode(array('result' => true));
		Response::content($output);
	}
	
	public static function remove() {
		$id = Input::post('id');

		Db::delete('comments', array('id' => $id));

		$output = json_encode(array('result' => true));
		Response::content($output);
	}

}
