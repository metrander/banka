<?php
class hash{
	
	//@algo = string('md5','sha1','whirpool','etc' )
	//@data = string(someone veriable to encode)
	//@solt = string(solt for password)
	static function create($algo,$data,$solt){
		$context = hash_init($algo,HASH_HMAC,$solt);
		hash_update($context,$data);
		return hash_final($context);
	}

}

?>