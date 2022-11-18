<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('form');
	}

    public function form_submitted_successfully(){
		$this->load->view('form_submitted_successfully');
    }

    public function form_loading(){
         
    }
    
    public function get_credit_details(){
        
        
      
        $url = 'https://sandbox.myidentitypass.com/api/v2/biometrics/merchant/data/verification/credit_bureau/consumer/advance';
         
        $curl = curl_init();
        $app_id =  "874158a2-1875-4065-bc48-829d653bc9ce"; 
       
        $api_key = "test_ucc8c5fyl6rl78idn3lqjp:ogINip3R6hrzzARkTI42vv13ybY";
        
        //field data
        
           $fields = [
            
        'mode' => "ID",
    
        'customer_name' => "Test Name",
    
        'number' => "22222222222",
        
        'dob' => "1990-08-01",
        
        'customer_reference' => 'dd118d00-229e-450c-8677-fa2e6f79090e'

  ];
  
  $fields_string = http_build_query($fields);
        
         
        $headr = array();
      
        $headr[] = 'x-api-key: '.$api_key;
        $headr[] = 'app-id: '.$app_id;
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST,true);
        $rest = curl_exec($curl);
        
      
        
        $conv = json_decode($rest);

      
         
        curl_close($curl);
        
        echo $conv->detail;
       
       
   
   
    }
    
     public function get_bvn(){
        
        
      
        $url = 'https://sandbox.myidentitypass.com/api/v2/biometrics/merchant/data/verification/bvn_validation';
         
        $curl = curl_init();
        $app_id =  "874158a2-1875-4065-bc48-829d653bc9ce"; 
       
        $api_key = "test_ucc8c5fyl6rl78idn3lqjp:ogINip3R6hrzzARkTI42vv13ybY";
        
        //field data
        
           $fields = [
            
                "number"=>"54651333604"

  ];
  
  $fields_string = http_build_query($fields);
        
         
        $headr = array();
      
        $headr[] = 'x-api-key: '.$api_key;
        $headr[] = 'app-id: '.$app_id;
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST,true);
        $rest = curl_exec($curl);
        
      
        
        $conv = json_decode($rest);

      
         
        curl_close($curl);
        
        echo $conv->detail;
       
       
   
   
    }
}
