<?php
//公共模型,和DAO类在同一空间，可以直接实例化DAO类
namespace core;

  class Model{
		//属性：保存到Dao对象
	protected $dao;
	private $fields=array();

  //初始化
	public function __construct(){
		//加载配置文件
		global $config;

		//实例化DAO
		$this->dao=new Dao($config['database'],$config['drivers']);
		$this->getFields(); 

   }

   //写方法
	protected function exec(string $sql)
  	   {
  	   	return $this->dao->dao_exec($sql);
   }

   //获取自增长id
	public function getInsertId()
  	   {
  	   	return $this->dao->dao_getinsert_id();
   }

	//读操作
	protected function  query(string $sql,$all=false)
  	   {
  	   	return  $this->dao->dao_query($sql,$all);
   }

    //构造全表名
    protected function getTable(string $table=''){
          global $config;
          //确定表名字
        	$table=empty($table) ? $this->table:$table;
          //构造表名
        	return $config['database']['prefix'].$table;
    }

    //获取全部数据  表名：当前表
    protected function getAll(){
          //组织SQL
        	$sql="select * from  {$this->getTable()}";
          //执行
        	return $this->query($sql,true);
    }

    //获取表字段
    private function getFields(){
           //通过desc来获取表字段信息
        	$sql="desc  {$this->getTable()}";
        	//执行
        	$rows=$this->query($sql,true);
        	//循环遍历
        	foreach($rows as $row){
        	 //保存到$this的fields属性
        	 $this->fields[]=$row['Field'];
        	 if($row['Key']=='PRI'){
          $this->fields['Key']=$row['Field'];
          //return  $this->fields['Key'];
          //查出来的字段形式是[字段一，字段二，字段三，key=字段名]
        	 }
          }
    }
   
   //通过主键，获取记录
    public function getById($id){
        	//判定当前表是否有主键
        	if(!isset($this->fields['Key']))  return false;

            $sql="select * from {$this->getTable()} where {$this->fields['Key']}='{$id}' ";
            return $this->query($sql);
        }
        //通过主键删除数据
     public function deleteById($id){

        if(!isset($this->fields['Key']))  return false;
         $sql="delete  from {$this->getTable()} where {$this->fields['Key']}='{$id}' ";
         return $this->exec($sql);
    }

    //自动更新数据
    public function autoUpdate($id,$data){
        //确定where条件
          $where="where {$this->fields['Key']}='{$id}'";
        //组织更新指令
          $sql="update {$this->getTable()} set ";
        //循环要遍历所有要更新的内容
          foreach($data as $key =>$value){
            //$key代表字段名，$value代表新值
            $sql.=$key.'="'.$value.'" ,'; 
          }
          //去除最后多余的逗号，拼凑好wheret条件
          $sql=rtrim($sql,',').' '.$where;
          //执行
           //echo $sql;exit;
          return $this->exec($sql);
    }

    //自动插入数据insert
    public function autoInsert($data){
        //构造列表和值列表
          $keys=$values="";
        //通过当前数属性fields保存的所有字段来获取data中对应的数据
          foreach($this->fields as $k=>$v){
            //k代表索引，v代表字段名
            //去除主键
            if($k=='Key') continue;
            //判断当前字段名是否在$data中存在，存在取出数据，不存在不要
            if(array_key_exists($v, $data)){
              //存在就取出
              $keys.=$v.',';
              $values.="'".$data[$v]."',";
            }
          }
          //去除多出来的逗号
          $keys=rtrim($keys,',');
          $values=rtrim($values,',');
          //组织sql指令
          $sql="insert into {$this->getTable()} ({$keys}) values ({$values})";
           //echo $sql;exit;
           return $this->exec($sql);
    }
 }
