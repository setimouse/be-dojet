<?php
class MJsonRespond
{
	protected $result = array('status'=>null, 'msg'=>null, 'data'=>null);
	
	const SUCCESS = 0;
    const FAIL = 1;

    /**
     * json respond工厂方法
     *
     * @param unknown_type $status
     * @param unknown_type $msg
     * @param unknown_type $data
     * @return MJsonRespond
     */
	public static function respond($status, $msg = null, $data = null)
	{
	    $respond = new MJsonRespond($status, $msg, $data);
	    
		return $respond;
	}

	public function __construct($status, $msg, $data)
	{
		$this->status = $status;
		$this->msg = $msg;
		$this->data = $data;
	}

	public function toJson()
	{
		return json_encode($this->result);
	}
	
	public function __set($key, $value)
	{
		assert(array_key_exists($key, $this->result));
		if ('status' === $key) {
    	    $errorMessage = Config::configForKeyPath('error');
    	    if (key_exists($value, $errorMessage)) {
    	    	$this->msg = $errorMessage[$value];
    	    }
		} elseif ('msg' === $key) {
		    if (null === $value) {
		        return ;
		    }
		}
		$this->result[$key] = $value;
	}
	
	public function __get($key)
	{
		assert(array_key_exists($key, $this->result));
		return $this->result[$key];	
	}
}
