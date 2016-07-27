<?php
namespace Home\Model;
use Think\Model;


class ContactModel extends Model{
	protected  $trueTableName = 'con_contact';
	
	/**
	 * 获取联系人信息
	 * 
	 * @access public
	 * @param $number string �������
	 * @return array	返回联系人数组
	 * 
	 */
	public function executeGetContactList($number){
		$num = 100*((int)$number['activation'] - 1);
	
		$info = $this-> limit($num, 100) -> select();
		return $info;
	}
}






