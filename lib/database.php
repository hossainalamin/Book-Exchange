<?php
class database
{
    public $db_host = host;
    public $db_user = user;
    public $db_pass = pass;
    public $db_name = name;
    public $link;
    public function __construct()
    {
        $this->link = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if(!$this->link)
        {
            echo "Connection Fail..";
            return false;
        }
    }
	public function insert($query)
    {
	$insert_row = $this->link->query($query);
	if($insert_row)
    {
		return $insert_row;
	}
    else
    {
		return false;
	}
    }
    public function select($query)
    {
	$result = $this->link->query($query);
    $select_row = mysqli_num_rows($result);
	if($select_row >0)
    {
		return $result;
	}
    else
    {
		return false;
	}
    }
    public function update($query)
    {
	$result = $this->link->query($query);
	if($result)
    {
		return $result;
	}
    else
    {
		return false;
	}
    }
    public function delete($query)
    {
	$result = $this->link->query($query);
	if($result)
    {
		return $result;
	}
    else
    {
		return false;
	}
	}
}



?>
