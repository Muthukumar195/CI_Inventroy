<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_details extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('product_details_model');
	}

	//start sales report detailsq
	function sales_report_details()
	{
		$data['sales_report_details'] = $this->report_model->sales_report_details();
		$this->load->view('sales_report_details',$data);
	}
	function search_sales_report(){
		
		$data['sales_report_details'] = $this->report_model->search_sales_report();
		$this->load->view('sales_report_details',$data);
	}
	//End sales report details
	
	//start Product report detailsq
	function product_report_details()
	{
		$data['product_name_list']=$this->product_details_model->product_name_list();
		$data['product_report_details'] = $this->report_model->product_report_details();
		$this->load->view('product_report_details',$data);
	}
	function search_product_report(){
		
		$data['product_name_list']=$this->product_details_model->product_name_list();
		$data['product_report_details'] = $this->report_model->search_product_report();
		$this->load->view('product_report_details',$data);
	}
	//End Product report details
}
