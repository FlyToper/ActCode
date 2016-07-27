<?php
namespace Home\Model;
use Think\Model;

class ActcodeModel extends Model{
	protected $trueTableName = 'con_actcode';
	
	/**
	 * 验证激活码
	 * 
	 * @access public
	 * @param $actcode	string 	激活码
	 * @param $user_id	string	用户id
	 * @return string	返回验证结果
	 * 
	 */
	public function executeCheckActcode($actcode, $user_id){
		$info = $this->where(array("code" => trim($actcode) )) -> find();
		
		if(!empty($info)){//该激活码存在
			
			if($info['status'] == '0'){//该激活码还没被使用,更新数据
				$data = array(
						"status" => 1,
						"user_id" => $user_id,
						"time" => date("Y-m-d H:i:s",time())
				);
				
				$rst =  $this->where(array("id"=> $info["id"])) -> save($data);
				if($rst === false){
					//数据更新失败：返回 Fail3
					return "Fail3";
				}else{
					//数据更新成功:返回 Succeed
					return "Succeed";
				}
			}else{//该激活码被使用了
				if($info['user_id'] == trim($user_id)){
					//是拥有者，返回 Succeed
					return "Succeed";
				}else{
					//非拥有者：返回 Fail2
					return "Fail2";
				}
			}
		}else{
			//激活码不存在：返回 Fail1
			return "Fail1";
		}
	}
}