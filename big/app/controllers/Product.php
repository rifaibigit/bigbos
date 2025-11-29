<?php
class Product extends Controller {
	public function __construct()
	{	
		/* if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
 */
	} 
	public function index()
	{
		$data['title'] = 'Dashboard';

		//$this->view('home/index');

	}

	public function Fridge($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('FridgeModel')->getFridgeById($id);

		$this->view('templates/header_rental_product');
		$this->view('product/fridge', $data);
		$this->view('templates/footer_rental');
	}

	public function Fridge_ID($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('FridgeModel')->getFridgeById($id);

		$this->view('templates/header_rental_product_id');
		$this->view('product/fridge_id', $data);
		$this->view('templates/footer_rental_id');
	}

	public function lord()
	{
		$data['title'] = 'Dashboard';

		$data['item_group'] = $this->model('SkuGroupModel')->getItemGroup_LORD();
		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_LORD();

		$this->view('templates/header_fmcg_product');
		$this->view('product/lord', $data);
		$this->view('templates/footer_rental');
	}

	public function lord_id()
	{
		$data['title'] = 'Dashboard';

		$data['item_group'] = $this->model('SkuGroupModel')->getItemGroup_LORD();
		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_LORD();

		$this->view('templates/header_fmcg_product_id');
		$this->view('product/lord_id', $data);
		$this->view('templates/footer_rental_id');
	}

	public function jordan()
	{
		$data['title'] = 'Dashboard';

		$data['item_group'] = $this->model('SkuGroupModel')->getItemGroup_JORDAN();
		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_JORDAN();

		$this->view('templates/header_fmcg_product');
		$this->view('product/jordan', $data);
		$this->view('templates/footer_rental');
	}

	public function jordan_id()
	{
		$data['title'] = 'Dashboard';

		$data['item_group'] = $this->model('SkuGroupModel')->getItemGroup_JORDAN();
		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_JORDAN();

		$this->view('templates/header_fmcg_product_id');
		$this->view('product/jordan_id', $data);
		$this->view('templates/footer_rental_id');
	}

	public function Detail_Lord($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_ById($id);

		$this->view('templates/header_product_lord');
		$this->view('product/detail_lord', $data);
		$this->view('templates/footer_rental');
	}

	public function Detail_Lord_ID($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_ById($id);

		$this->view('templates/header_product_lord_id');
		$this->view('product/detail_lord_id', $data);
		$this->view('templates/footer_rental_id');
	}

	public function Detail_Jordan($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_ById($id);

		$this->view('templates/header_product_jordan');
		$this->view('product/detail_jordan', $data);
		$this->view('templates/footer_rental');
	}

	public function Detail_Jordan_ID($id)
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_ById($id);

		$this->view('templates/header_product_jordan_id');
		$this->view('product/detail_jordan_id', $data);
		$this->view('templates/footer_rental_id');
	}

    public function l101t()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_product_lord');
		$this->view('product/l101t');
		$this->view('templates/footer_rental');
	}

    public function l100bp()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_product_lord');
		$this->view('product/l100bp');
		$this->view('templates/footer_rental');
	}

	public function l100gb()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_product_lord');
		$this->view('product/l100gb');
		$this->view('templates/footer_rental');
	}

	public function b402()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_product_lord');
		$this->view('product/b402');
		$this->view('templates/footer_rental');
	}

	public function b400()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_product_lord');
		$this->view('product/b400');
		$this->view('templates/footer_rental');
	}

}