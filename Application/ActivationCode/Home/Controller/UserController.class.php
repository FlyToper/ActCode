<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends HomeController{
	protected $model;
	
	
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 登录验证�֤
	 * @access public
	 * @return string 	������֤���
	 * 
	 */
	public function checkLogin(){
		try{
			//��ȡ����Ĳ���
			//$UserName: 用户名
			//$Password: 密码
			extract($_REQUEST);
			
			if(isset($UserName) && !empty($UserName)){
				if(isset($Password) && !empty($Password)){
					//UserModel�ķ���
					$user_model = D('User');
					$rst = $user_model -> executeCheckLogin($UserName, $Password);
					$this -> ajaxReturn(array(StateCode => $rst));
				}
			}	
		}catch (Exception $e){
			$this -> ajaxReturn(array(StateCode=>"Fail"));
		}
	}
	
	
	/**
	 * 注册
	 * 
	 * @access public
	 * @return string ���ؽ��
	 * 
	 */
	public function register(){
		try{
			//提取表单数据
			extract($_REQUEST);
			
			if(isset($Password) && !empty($Password)){
				if(isset($Imei) && !empty($Imei)){
					
					$user_model = D('User');
					
					//Fail1��IMEI�Ѿ�����
					//Id 注册成功返回用户Id
					$rst = $user_model -> executeRegister($Password, $Imei);
					if($rst ===false){
						$this->ajaxReturn(array("SateCode" => "Fail2"));
					}else if($rst == "Fail1"){
						$this->ajaxReturn(array("SateCode" => "Fail1"));
					}else{
						$this->ajaxReturn(array("SateCode" => "Succeed", "Id" => $rst));
					}
					
					
				}
			}
			
		}catch (Exception $e){
			//注册失败
			$this->ajaxReturn(array("StateCode" => "Fail2"));
		}
	}
	
	/**
	 * 根据激活码获取联系人信息
	 * 
	 * @access public 
	 * @return arary	返回联系人信息���Ϣ
	 * 
	 */
	public function getContact(){
		try{
			//提取表单数据
			extract($_REQUEST);
			
			if(isset($JHCode) && !empty($JHCode)){
				/**
				 * 1、 验证激活码是否存在，存在：则更新表con_actcode:status、user_id、time，否则提示错误信息
				 * 2、 在con_user更新用户激活码使用次数，读取当前次数
				 * 3、 在con_contact获取联系人数据
				 * 
				 */
				
				//1、验证激活码
				$actcode_model = D('Actcode');
				$checkRst =  $actcode_model -> executeCheckActcode(trim($JHCode), $this->user_id);

				if($checkRst == "Succeed"){
					//2、更新用户的activation次数，并且获取
					$user_model = D('User');
					$incActcodeRst = $user_model -> executeUpdateNumberOfActCode($this->user_id);
					if($incActcodeRst != "Fail"){ 
						//3、获取联系人信息
// 						var_dump($incActcodeRst);
// 						echo "<br>";
						$cont_model = D('Contact');
						$contactArray = $cont_model -> executeGetContactList($incActcodeRst);
						p(array("Data" => $contactArray));
						//$this->ajaxReturn($contactArray);
					}else{
						$this->ajaxReturn(array("StateCode" => "Fail3"));
					}
				}else if($checkRst == "Fail1"){
					//激活码不正确
					$this->ajaxReturn(array("StateCode" => "Fail1"));
				}else if($checkRst == "Fail2"){
					//该激活码被使用了
					$this->ajaxReturn(array("StateCode" => "Fail2"));
				}else{
					//其他错误原因
					$this->ajaxReturn(array("StateCode" => "Fail3"));
				}
				
				
				
			}
		}catch(Exception $e){
			die('132');
		}
	}
	
	/**
	 * 获取用户信息
	 * 
	 * @access public
	 * @return 返回用户信息
	 * 
	 */
	public function getUserInfo(){
		try{
			//提取表单数据
			extract($_REQUEST);
			if(isset( $UserName) && !empty($UserName) ){
			
				$user_model = D('User');
				$infos = $user_model -> executeGetUserInfo($UserName);
				//var_dump($infos);
				$this -> ajaxReturn(array("Data" => $infos));
			}else{
				//用户名为空
				$this -> ajaxReturn(array("StateCode" => "Fail2"));
			}
			
			
		}catch (Exception $e){
			//获取失败
			$this->ajaxReturn(array("StateCode" => "Fail1"));
		}
	}
	

	public function show (){
 		$this -> display();
 		echo date('Y-m-d H:i:s',time());
 		echo "陈".$this->user_id;
	}
	
	
}






