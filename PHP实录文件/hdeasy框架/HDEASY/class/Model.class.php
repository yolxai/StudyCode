<?php


	/*
	 * 	@author Lxai
	 *     @version 1.0
	 *      .......不会写不会写不会写 使用方法就看usMethod.html咯?
	 * */
	class Model{
		private static $_link; //数据库连接
		private $table_name; //数据库默认操作的表
		private $opation=array();
		private $primary_key; //表的主键字段
		private $resultCount; //query时获得结果集的行数,使用与select中返回一维数组还是二维数组
		public static $Debug = array();
		
		function __construct($table_name){
				$this->connect(); //实例化对象时建立mysql连接
				$this->table_name = $table_name; //设置类的表数据
				$this->opation(); //缓存表字段结构 并设置主键
		}
		
		//缓存表结构
		private function opation(){
			
			$sql = "DESC ".$this->table_name; //构造查询表结构的SQL
			$fields = $this->query($sql); //执行SQL
			$fieldArr = [];
			foreach($fields as $f){
				$fieldArr[] = $f['Field']; //将字段保存在$fieldArr数组
				if($f['Key'] == 'PRI'){ //如果是主键的话
						$this->primary_key = $f['Field']; //将主键赋值给类中的属性
				}
			}
			
			$this->opation[] = $fieldArr; //将表结构赋值给类
			$this->opation['PRI'] = $this->primary_key;
			
		}
		
		//连接数据库
		private function connect(){ 
			if(self::$_link)return true; //如果连接了数据库 就不再进行二次连接 没有连接时类型为NULL
			
			if(!$link = mysql_connect(C('DB_HOST'),C('DB_USER'),C('DB_PASS'))){ //连接mysql
					die("Mysql连接失败!");
			}
			
			 if(!mysql_select_db(C('DB_DATABASE'))){ //选择数据库
					die("数据库不可用");
			 }
			 
			 mysql_query('SET NAMES '.C('DB_CHARSET')); //设置编码
			 
			 self::$_link = $link; //对类中的变量进行赋值
			 
			 return true;
			 
		}
		
		//清除缓存
		private function reset(){
				$this->opation['order']=''; //初始化order
				$this->opation['where']=''; //初始化where
				$this->opation['limit']=''; //初始化limit
		}
		
		
		
		//MYSQL的查询
		public function query($sql){
			$result = mysql_query($sql); 
			$this->reset();
			$resultArr = [];
			if($result){
					while($row = mysql_fetch_assoc($result)){
							$resultArr[] = $row;
					}
			}
			
			$this->resultCount = count($resultArr);
			self::$Debug[] = $sql; //记录SQL
			return $resultArr;
		}
		
		//MYSQL的增删改操作
		public function exe($sql){
			$result = mysql_query($sql);
			$this->reset();
			self::$Debug[] = $sql; //记录SQL
			$row = mysql_affected_rows(); //获得上一条MYSQL所受影响的条数
			if($result){
					return $row;
			}else{
					return false;
			}
		}
		
		//查找主键为$id的数值
		public function find($id){
			if(empty($this->primary_key)){return false;}
			$sql = "select * from {$this->table_name} where {$this->primary_key}=$id"; //构造语句
			return empty($this->query($sql))?null:current($this->query($sql));
		}
		
		//where条件查询
		public function where($where){
				$this->opation['where'] = $where;
				return $this;
		}
		
		//limit
		public function limit($limit){
				$this->opation['limit'] = $limit;
				return $this;
		}
		
		//order by
		public function order($order){
				$this->opation['order'] = $order;
				return $this;
		}
		
		
		//where orderBy limit的关联函数
		public function select(){
			//获取$this->opation中的值
			$where = empty($this->opation['where'])?'':"WHERE {$this->opation['where']}";
			$order = empty($this->opation['order'])?"":"ORDER BY {$this->opation['order']}";
			$limit = empty($this->opation['limit'])?"":"LIMIT {$this->opation['limit']}";
			
			//构造SQL
			$sql = "SELECT * FROM {$this->table_name} {$where} {$order} {$limit}";
			
			//调用此类的方法(执行MYSQL语句)
			$result = $this->query($sql); 
			
			//如果结果过等于空
			if ( empty($result) ){
					return null;
			}else{
				    //如果结果大于1个
					if($this->resultCount>1){
						return $result; //返回二维数组
					}else{
						return current($result);//返回一维数组
					}
			}
		}
		
		//更新数据(必须有条件) 此函数可以使用$obj->where("id=1")->update($array)方式
		public function update($value,$where=''){
			    //如果不是通过fcuntion where()或者形参$where使用此函数的话就return false;
				if(empty($where) && empty($this->opation['where'])){return false;}
				
				//如果形参为空就使用此类中opation['where']的值,优先选择为形参
				$w = empty($where)?$this->opation['where']:$where;
			
				//开始构造SQL
				$sql = "update {$this->table_name} set ";
				foreach($value as $k=>$v){
						//如果字段不存在$this->opation[0]中,就跳出一次foreach(作用是避免未定义的字段赋值导致出错)
						//$this->opation[0]是前面的private function opation(){}中进行字段缓存的数组
						if(!in_array($k,$this->opation[0])){continue;}
						$sql .= $k.'="'.$v.'",';
				}

				//去除foreach连接时最后一个.
				$nSql = substr($sql,0,-1) . " WHERE {$w}";
				
				return $this->exe($nSql); //返回执行结果 结果为[执行语句后影响到的数据的数量]
		}
		
		//删除数据
		public function delete($where=''){
			 //如果不是通过fcuntion where()或者形参$where使用此函数的话就return false;
				if(empty($where) && empty($this->opation['where'])){return false;}
				
				//如果形参为空就使用此类中opation['where']的值,优先选择为形参
				$w = empty($where)?$this->opation['where']:$where;
				
				//构造SQL
				$sql = "delete from {$this->table_name} where {$w}";
				return $result = $this->exe($sql);
		}
		
		//插入数据
		public function insert($data){
				$field = ''; //设置默认字段
				$value = ''; //设置默认值
				foreach($data as $k=>$v){ //遍历$data数组
					    //如果字段不存在$this->opation[0]中,就跳出一次foreach(作用是避免未定义的字段赋值导致出错)
						//$this->opation[0]是前面的private function opation(){}中进行字段缓存的数组
					   if(!in_array($k,$this->opation[0])){continue;}
						$field .= $k.",";
						$value.= "'".$v."',";
				}
				$field = substr($field,0,-1); //截除最后一个逗号
				$value = substr($value,0,-1);//截除最后一个逗号
				
				$sql = "INSERT INTO {$this->table_name}({$field}) values({$value})"; //构造插入的SQL
			    return $this->exe($sql); //调用exe执行SQL语句
		}
		
	}

?>
