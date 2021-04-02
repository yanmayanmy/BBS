<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bbs_index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('index_model');
		date_default_timezone_set('Asia/Tokyo');
	}

	//掲示板ページ
	public function index()
	{
		if (!empty($_SESSION['member_data'])) {
			//書き込み履歴取得
			$unsanitized = $this->index_model->get_messages();

			//サニタイズ
			foreach ($unsanitized as $key => $values) {
				foreach ($values as $column => $value) {
					$data['past_messages'][$key][$column] = htmlspecialchars($value);
				}
			}
			$this->load->view('templates/header');
			$this->load->view('body/bbs_index', $data);
			$this->load->view('templates/footer');
		} else {
			redirect($uri = base_url("bbs_index/login"));
		}
	}

	//掲示板への書き込み
	public function add_bbs()
	{
		if (!empty($_POST['btn_submit']) && !empty($_SESSION['member_data'])) {
			if ($this->form_validation->run('add_message') === false) {
				$this->index();
			} else {
				$posted_data = [
					"view_name" => $this->input->post('view_name'),
					"message" => $this->input->post('message'),
					"post_date" => date('Y-m-d H:i:s')
				];

				if ($this->index_model->add_to_db("message", $posted_data)) {
					$this->session->set_userdata($posted_data);

					redirect($uri = base_url('bbs_index/success'));
				} else {
					$data['error_messages'] = '書き込みに失敗しました。';
					$this->index();
				}
			}
		} else {
			redirect($uri = base_url());
		}
	}

	//多重投稿を防ぐ目的も兼ねて、post_successページを設ける
	public function success()
	{
		if (!empty($_SESSION['view_name']) && !empty($_SESSION['member_data'])) {
			//サニタイズ
			$data = [
				"view_name" => htmlspecialchars($_SESSION['view_name']),
				"post_date" => $_SESSION['post_date'],
				"message" => htmlspecialchars($_SESSION['message'])
			];
			$this->load->view('templates/header');
			$this->load->view('body/post_success', $data);
			$this->load->view('templates/footer');

			unset($_SESSION['post_data']);
		} else {
			redirect($uri = base_url());
		}
	}

	//会員登録ページ
	public function registeration_page()
	{
		$this->load->view('body/register');
		$this->load->view('templates/footer');
	}

	//会員情報のバリデーション
	public function register()
	{
		if (!empty($_POST['btn_submit'])) {
			if ($this->form_validation->run('register') !== false) {
				$_SESSION = array();
				foreach ($_POST as $key => $value) {
					if (preg_match("/^member_/", $key)) {
						$key = str_replace("member_", "", $key);

						//セッションに保存
						switch ($key) {
							case "password":
								//"member_dataは"データベース挿入用
								$_SESSION["member_data"][$key] = password_hash($value, PASSWORD_DEFAULT);

								//パスワードを非表示にするための値
								$_SESSION['asterisk'] = str_repeat("*", strlen($value));
								break;
							case "birth":
								$_SESSION["member_data"][$key] = (int)$value;
								break;
							case "gender":
								$_SESSION["member_data"][$key] = (int)$value;

								//確認画面出力用
								if ($value === '1') {
									$_SESSION['gender'] = "男性";
								} else {
									$_SESSION['gender'] = "女性";
								}
								break;
							case "subscribe":
								$_SESSION["member_data"][$key] = (int)$value;
								if ($value === '1') {
									$_SESSION['subscribe'] = "希望する";
								} else {
									$_SESSION['subscribe'] = "希望しない";
								}
								break;
							default:
								$_SESSION["member_data"][$key] = $value;
								break;
						}
					}
				}
				$this->confirm();
			} else {
				$this->registeration_page();
			}
		} else {
			$this->registeration_page();
		}
	}

	//確認画面
	public function confirm()
	{
		if (!empty($_POST['btn_submit']) && !empty($_SESSION['member_data'])) {
			$this->load->view('body/confirm');
			$this->load->view('templates/footer');
		} else{
			session_destroy();
			redirect($uri = base_url("bbs_index/login"));
		}
	}

	//会員登録完了画面
	public function register_completed()
	{
		if (!empty($_SESSION['member_data']['name'])) {
			//データベースに保存
			if ($this->index_model->add_to_db("member", $_SESSION["member_data"])) {
				$data = [
					"title" => "登録完了",
					"message" => "会員登録が完了致しました。"
				];

				session_destroy();
			} else {
				$data['error_message'] = ["登録に失敗しました。"];
			}
			$this->load->view('body/register_completed', $data);
			$this->load->view('templates/footer');
		} else {
			redirect($uri = base_url("bbs_index/login"));
		}
	}
	//セッションがある状態で無理やり"/register_completed"にアクセスするとデータベースエラーが出るのがまだ解決できてない

	public function login()
	{
		$data = null;
		//ログイン済みか確認
		if (empty($_SESSION['member_data'])) {
			if (!empty($_POST['btn_login'])) {
				if ($this->form_validation->run('login') !== false) {
					$_SESSION['member_data'] = $this->index_model->get_password($_POST['email']);
					//パスワード照合
					if (password_verify($_POST['password'], $_SESSION['member_data']['password'])) {
						foreach ($_SESSION as $key => $array) {
							if ($key === "member_data") {
								foreach ($array as $key => $value) {
									$_SESSION["member_data"][$key] = htmlspecialchars($value);
								}
							}
						}
						$this->index();
						return;
					} else {
						$data['error_message'] = ['認証に失敗しました。'];
					}
				}
			}
		} else {
			redirect($uri = base_url());
			return;
		}
		$this->load->view('body/login', $data);
		$this->load->view('templates/footer');
	}

	//会員情報ページ
	public function mypage()
	{
		if (!empty($_SESSION['member_data'])) {
			$this->load->view('templates/header');
			$this->load->view('body/mypage');
			$this->load->view('templates/footer');
		} else {
			redirect($uri = base_url('bbs_index/login'));
		}
	}

	public function logout()
	{
		session_destroy();
		redirect($uri = base_url('bbs_index/login'));
	}

	public function admin_page()
	{
	}
}
