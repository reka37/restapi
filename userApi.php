<?php
require_once 'api.php';

class UsersApi extends Api
{
    public $apiName = 'users';

    /**
     * ��⮤ GET
     * �뢮� ᯨ᪠ ��� ����ᥩ
     * http://yor_domain/users
     * @return string
     */
    public function indexAction()
    {
		$list = array(
			'record_one'=>'info', 
			'record_two'=>'info'
		);
		
        return $this->response($list, 200);
    }

    /**
     * ��⮤ GET
     * ��ᬮ�� �⤥�쭮� ����� (�� id)
     * http://yor_domain/users/1
     * @return string
     */
    public function viewAction()
    {
		//id ������ ���� ���� ��ࠬ��஬ ��᫥ /users/x
        $id = array_shift($this->requestUri);
		$list = array('record'=>'you see record = '.$id);
        return $this->response($list, 200);
    
    }

    /**
     * ��⮤ POST
     * �������� ����� �����
     * http://�����/users + ��ࠬ���� ����� name, email
     * @return string
     */
    public function createAction()
    {
		$name = $this->requestParams['name'] ?? '';
		$email = $this->requestParams['email'] ?? '';	
		// $jsonRaw = file_get_contents('php://input');
        //$json = json_decode($jsonRaw);	
		return $this->response($name, 200);
    }

    /**
     * ��⮤ PUT
     * ���������� �⤥�쭮� ����� (�� �� id)
     * http://�����/users/1 + ��ࠬ���� ����� name, email
     * @return string
     */
    public function updateAction()
    {
		$parse_url = parse_url($this->requestUri[0]);
		$userId = $parse_url['path'] ?? null;		
		return $this->response("Update success $userId", 200);
    }

    /**
     * ��⮤ DELETE
     * �������� �⤥�쭮� ����� (�� �� id)
     * http://�����/users/1
     * @return string
     */
    public function deleteAction()
    {
		$parse_url = parse_url($this->requestUri[0]);
        $userId = $parse_url['path'] ?? null;	
		
		if ($userId == 0) {
			  return $this->response("Delete error $userId", 500);
		} else {
			  return $this->response("Delete success $userId", 200);
		} 		     
	}
}
