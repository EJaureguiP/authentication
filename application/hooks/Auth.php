<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  

class Auth   {  


    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        //echo "enbter hook constr";
    }

    public function check()  
    {  
         
        echo json_encode( $this->CI );
     
    }  

}  
?>  