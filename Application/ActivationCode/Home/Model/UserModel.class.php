<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	protected $trueTableName = 'con_user';
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 执行用户登录验证
	 * 
	 * @access public
	 * @param $username string	用户id
	 * @param $password string	密码
	 * @return string 返回验证结果
	 * 
	 */
	public function  executeCheckLogin($username, $password){
		//查询
		$info = $this ->  where("id='%s' && password = '%s'", array($username, md5(PWD_PREFIX.$password))) -> select();
		
		if(!empty($info)){
			return 'Succeed';
		}else{
			return 'Fail';
		}
	}
	
	/**
	 * 执行注册
	 * 
	 * @access public
	 * @param $password string	密码
	 * @param $imer	string 手机唯一标识码
	 * @return string 返回执行结果
	 * 
	 */
	public function executeRegister($password, $imei){
		$info = $this -> where(array("imei"=>trim($imei))) -> find();
		//$info = $this->where("imei='%s'",array($imei))
		

		if(!empty($info)){//imei�Ѿ�����
			return 'Fail1';
		}else{
			$d = array(
					'password' => md5(PWD_PREFIX.$password),	//密码
					'imei' => trim($imei),	//手机标识码
					'avtivation' => 0,	//激活码使用次数
					'created' => time(),//注册时间
					'status' => 0
			);
			
			//执行插入，返回结果
			return $this->add($d);
		}
	}
	
	
	/**
	 * 执行更新激活码使用次数
	 * 
	 * @access public
	 * @param $user_id	string
	 * @return string 返回操作结果
	 */
	public function executeUpdateNumberOfActCode($user_id){
		$rst =  $this->where(array("id" => trim($user_id))) -> setInc('activation');
		if($rst === false){
			return "Fail";
		}else{
			//$number = $this -> where(array("id" => trim($user_id))) -> select();
			$number = $this -> field('activation') -> where(array("id" => trim($user_id))) -> find();
			return $number;
		}
	}
	
	/**
	 * 执行获取用户信息
	 * 
	 * @access public
	 * @param string $user_id	用户id
	 * @return array	用户信息
	 */
	public function executeGetUserInfo($user_id){
		$infos = $this -> where(array('id'=>$user_id))->find();
		return $infos;
	}
	
	
}





