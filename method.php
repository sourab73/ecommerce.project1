<?php
	class phpMethod extends connection
	{

		public function excuteQuery($query)
		{
			$sql=$this->link->query($query);
			if($sql)
			{
				$this->sms="<span style='color:green; font-size:14px;'><center>Successfull</center></span>";
			}
			else
			{
				$this->sms="<span style='color:Red; font-size:14px;'>Unsuccessfull</span>";
			}
		}

		

		public function excuteView($query)
		{
			$sql=$this->link->query($query);
			if($sql)
			{
				return $sql;
			}
			else
			{
				$this->sms="<span style='color:Red; font-size:14px;'>Not Success</span>";
			}
		}
	
	}

?>