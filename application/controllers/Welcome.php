<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {
		
		var $socialFacebook = "https://facebook.com";
		var $socialTwitter = "https://twitter.com";
		var $socialInstagram = "https://instagram.com";
		var $socialYoutube = "https://youtube.com";
		var $socialGooglePlus = "https://googleplus.com";
		
		var $appName = "Watchers Forum";

        private function __authUser() {
			$i = false;

			$logged_in = $this->session->userdata('logged_in');
			if ($logged_in) {
				$i = true;
			}

			return $i;
		}

		private function __loginFormValidationRules() {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_error_delimiters
					('<div class="alert alert-warning alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			X</button>', '</div>');
		}
		
		private function __destorySession() {
			$array_items = array('id', 'username', 'status', 'logged_in');
			$this->session->unset_userdata($array_items);
		}
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->helper('file');
			$this->load->helper('html');
			$this->load->library('email');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->helper('number');
		}

		public function logout() {
			$this->__destorySession();
			redirect('welcome/', 'To Home page ', 307);
		}

		public function viewTopic($topicId,$categoryName){									
			$data = array();
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$topicId = htmlspecialchars($topicId); // clean topic id 
			$topicId = trim($topicId); //trim the number
			$i = is_numeric($topicId); //check if its numeric
			
			if($i){
				$data['post'] = $this->ApplicationModel->getForumPost($topicId);// forum topic resultSet object
			}
			
			//if post resultSet is empty return back to home page
			if(empty($data['post'])){
				redirect('/index.php/welcome/', 'back to home', 301);	
			}
			$data['title'] = $data['post']->title;
			$data['comments'] =  $this->ApplicationModel->getForumTopicComments($topicId);// topic comments resultSet
						
			$categoryName = htmlspecialchars($categoryName); // clean category string
			$categoryName = trim($categoryName);// trim the category string
			$i = $this->ApplicationModel->getForumPostByCategory($categoryName); // Need to check resultSet 
			if(count($i) > 0){
				$data['relatedTopics'] = $this->ApplicationModel->getForumPostByCategory($categoryName);	
				$data['category'] = $categoryName;
			}
						
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => $data['post']->title
				),
				array(
					'name' => 'keywords',
					'content' => $data['post']->content
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->form_validation->set_rules('comment', 'Comment', 'required');
			$this->form_validation->set_rules('author', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			 if ($this->form_validation->run() == FALSE){
			}else{
				$comment = $this->input->post_get('comment', TRUE);
				$author = $this->input->post_get('author', TRUE);
				$email = $this->input->post_get('email', TRUE);
				$postId = $this->input->post_get('post_id', TRUE);
			
				$insertData = array(
					'post_id' => $postId,
					'status' => "PUBLISH", //Let's just publish the comment 
					'comment' => $comment, 
					'name' => $author,
					'email' => $email
				);
				$this->db->insert('van_comments', $insertData); 			
				$data['message'] = "Thanks, your comment has been submitted.";
			}
			$data['comments'] =  $this->ApplicationModel->getForumTopicComments($topicId);// topic comments resultSet
			//Calling it again because a new comment has been inserted

			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/topic_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		public function category($categoryName){
			$categoryName = htmlspecialchars($categoryName); // clean category string
			$categoryName = trim($categoryName);// trim the category string
			
			$data['posts'] = $this->ApplicationModel->getForumPosts();
			
			$data = array();
			$data['title'] = $categoryName;
			$data['warning'] = "";
			$data['message'] = "";
			$data['category'] = $categoryName;
			$data['posts'] = "";// init posts
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$i = $this->ApplicationModel->getForumPostByCategory($categoryName); // Need to check resultSet 
			if(count($i) > 0){
				$data['posts'] = $this->ApplicationModel->getForumPostByCategory($categoryName);	
			}
			
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "{$this->appName} {$categoryName} topics"
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName}, forum, forum websites,{$categoryName},{$categoryName} topics"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/category_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		public function login (){
			$data = array();
			$data['title'] = "Login";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Login {$this->appName} forum website."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName} forum"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->__loginFormValidationRules();
			 if ($this->form_validation->run() == FALSE) {
				
			}else{
				$username = $this->input->post_get('username', TRUE);
				$password = $this->input->post_get('password', TRUE);
				$hashPassword = $this->ApplicationModel->hashHash($password);
				            
				$this->config->set_item('sess_expiration', '0');// session should expire
				$query = $this->db->get_where('users', array('username' => $username, 'password' => $hashPassword));
				if ($query->num_rows() > 0) {
					$row = $query->row();
					
					 if ($row->status == 'ACTIVE') {
						  $sessionData = array(
							'id' => $row->id,
							'username' => $row->username,
							'status' => $row->status,
							'logged_in' => TRUE
						);
												
						$this->session->set_userdata($sessionData);
						
						redirect('welcome/userTopics', 'To user topics ', 307);
					 }else{
						$data['warning'] = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						X</button>You account is invalid.</div>';
					}
				}else{
						$data['warning'] = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						X</button>Username and password combination incorrect.</div>';
				}
			}
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/login_view', $data);
			$this->load->view('welcome_views/footer', $data);
			
		}
		
		public function editTopics($topicId,$categoryName){
			$data = array();
			$data['title'] =   $this->session->userdata('username') ." topics";
			$data['warning'] = "";
			$data['message'] = "";
			
			$logged_in = $this->__authUser();
			if (!$logged_in) {
				redirect('welcome', 'To home page ', 307);
			}
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$data['categories'] = $this->ApplicationModel->getForumCategories();
			
			$topicId = htmlspecialchars($topicId); // clean topic id 
			$topicId = trim($topicId); //trim the number
			$i = is_numeric($topicId); //check if its numeric
			if($i){
				$data['post'] = $this->ApplicationModel->getForumPost($topicId);// forum topic resultSet object
			}

			$categoryName = htmlspecialchars($categoryName); // clean category string
			$categoryName = trim($categoryName);// trim the category string
			$i = $this->ApplicationModel->getForumPostByCategory($categoryName); // Need to check resultSet 
			if(count($i) > 0){
				$data['relatedTopics'] = $this->ApplicationModel->getForumPostByCategory($categoryName);	
				$data['category'] = $categoryName;
			}

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "{$this->appName}."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName}"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			 if ($this->form_validation->run() == FALSE){
			}else{
				$title = $this->input->post_get('title', TRUE);
				$category = $this->input->post_get('category', TRUE);
				$content = $this->input->post_get('content', TRUE);
				
				$updateData = array(
				   'title' => $title,
				   'content' => $content,
				   'category' => $category
				);
				$this->db->where('id', $topicId);
				$this->db->update('posts', $updateData); 

				$data['message'] = '<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					X</button>Topic updated.</div>';
			
			}
			
			$topicId = htmlspecialchars($topicId); // clean topic id 
			$topicId = trim($topicId); //trim the number
			$i = is_numeric($topicId); //check if its numeric
			if($i){
				$data['post'] = $this->ApplicationModel->getForumPost($topicId);// forum topic resultSet object
			}
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/user_edit_topic_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		public function addTopic(){
			$data = array();
			$data['title'] =   "Add topic";
			$data['warning'] = "";
			$data['message'] = "";
			
			$logged_in = $this->__authUser();
			if (!$logged_in) {
				redirect('welcome', 'To home page ', 307);
			}
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Add {$this->appName} topic."
				),
				array(
					'name' => 'keywords',
					'content' => "Add {$this->appName} topic."
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			 if ($this->form_validation->run() == FALSE){
			}else{
				$title = $this->input->post_get('title', TRUE);
				$category = $this->input->post_get('category', TRUE);
				$content = $this->input->post_get('content', TRUE);
				
				$insertDataCategory = array(
				   'status' => 'ACTIVE',
				   'name' => $category
				);
				$this->db->insert('categories', $insertDataCategory); 
				
				$insertData = array(
				   'title' => $title,
				   'content' => $content,
				   'category' => $category,
				   'user_id' => $this->session->userdata('id')
				);
				$this->db->insert('posts', $insertData); 
				
				$data['message'] = '<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					X</button>Topic has been posted. Thank you.</div>';
			
			}
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/user_add_topic_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		
		
		public function userTopics(){
			$data = array();
			$data['title'] =   $this->session->userdata('username') ." topics";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;

			$logged_in = $this->__authUser();
			if (!$logged_in) {
				redirect('welcome', 'To home page ', 307);
			}
			
			$data['posts'] = $this->ApplicationModel->getUserPosts($this->session->userdata('id'));

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "{$this->appName}."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName}"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/user_topic_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		public function about (){
			$data = array();
			$data['title'] = "About";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "About {$this->appName} forum website."
				),
				array(
					'name' => 'keywords',
					'content' => "About {$this->appName} forum"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/about_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
		
		public function search (){
			$data = array();
			$data['title'] = "Seach {$this->appName}";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Search {$this->appName} forum website."
				),
				array(
					'name' => 'keywords',
					'content' => "Search {$this->appName} forum"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->form_validation->set_rules('q', 'Search Term', 'required');
			$search = $this->input->post_get('q', TRUE);	
			
			 if ($this->form_validation->run() == FALSE){
			}else{
				$this->db->like('content', $search); // USE LIKE TO SEARCH, I HONESTLY PREFER FULL TEXT SEARCHING
				$query = $this->db->get('posts');
				$resultSet = $query->result();
				//$str = $this->db->last_query();
				//echo($str);
				$data['searchResults'] = $resultSet;
				$data['searchTerm'] = $search;
			}
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/search_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}

		public function index(){
			$data = array();
			$data['title'] = "Home";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$data['posts'] = $this->ApplicationModel->getForumPosts();

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "{$this->appName} is a simple forum website."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName}, forum, forum websites"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/index_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}

		public function surveySubmitQANDA($surveyId,$surveyOptionId){
			$ipAddr = $this->ApplicationModel->getIP();
			
			$query = $this->db->get_where('survey_options', array('id' => $surveyOptionId,'survery_id' => $surveyId));
			$row = $query->row();
			
			if ($query->num_rows() > 0){										
				$insertData = array(
				   'user_ip' => $ipAddr,
				   'survey_id' => $surveyId,
				   'survey_options_id' => $row->id,
				   'survey_option_choice' => $row->options_slot
				);
				$this->db->insert('survey_answers', $insertData); 	
				
				// set survey as session data to make the user survey entry
				$a = $surveyId;
				$this->session->set_userdata("governance_watchers_{$a}", "yes");
			}
			
			// with 301 redirect
			redirect('/index.php/welcome/survey', 'survey', 301);
		}
		
		public function surveyOpinion($surveyId){
			$data = array();
			$data['title'] = "Survey Opinion";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			$data['id'] = $surveyId;
			$data['survey'] = $this->ApplicationModel->getSurveyById($surveyId);
			
			if(empty($data['survey'])){
				// with 301 redirect
				redirect('index.php/welcome/survey', 'survey', 301);
			}
			$data['surveyAnswers'] = $this->ApplicationModel->getSurveyAnswersOpinion($surveyId);

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Contact {$this->appName}, we will love to hear from you."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName},governance watchers survey"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;


			$this->form_validation->set_rules('comment', 'Comment', 'required');
			$this->form_validation->set_rules('author', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			 if ($this->form_validation->run() == FALSE){
			}else{
				$comment = $this->input->post_get('comment', TRUE);
				$author = $this->input->post_get('author', TRUE);
				$email = $this->input->post_get('email', TRUE);
				$tel = $this->input->post_get('tel', TRUE);
				
				$insertData = array(
					'survey_id' => $surveyId,
					'answer' => $comment,
					'name' => $author,
					'email' => $email,
					'telephone' => $tel
				);
				$this->db->insert('survey_answers', $insertData); 			
				$data['message'] = "Thanks for your opinion., your comment has been submitted for review.";
				
			}
			$data['surveyAnswers'] = $this->ApplicationModel->getSurveyAnswersOpinion($surveyId);//Get the survey answer again after new option has been inserted
			
			//same view for all form state
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/take_survey_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}

		public function survey() {
			$data = array();
			$data['title'] = "Survey";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;
			
			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Contact {$this->appName}, we will love to hear from you."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName},governance watchers survey"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;
			
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/survey_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}

	public function contact() {
			$data = array();
			$data['title'] = "Contact Us";
			$data['warning'] = "";
			$data['message'] = "";
			
			$data['social_facebook'] = $this->socialFacebook;
			$data['social_twitter'] = $this->socialTwitter;
			$data['social_google'] = $this->socialGooglePlus;
			$data['social_instagram'] = $this->socialInstagram;
			$data['social_youtube'] = $this->socialYoutube;

			$meta = array(
				array(
					'name' => 'robots',
					'content' => 'no-cache'
				),
				array(
					'name' => 'description',
					'content' => "Contact {$this->appName}, we will love to hear from you."
				),
				array(
					'name' => 'keywords',
					'content' => "{$this->appName},contact watchers forum"
				),
				array(
					'name' => 'author',
					'content' => 'greenDevNG'
				),
				array(
					'name' => 'Content-type',
					'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
				), array(
					'name' => 'viewport',
					'content' => 'width=device-width, initial-scale=1'
				)
			);
			$data['meta'] = $meta;

			// form validation
			$this->form_validation->set_rules('comment', 'Comment', 'required');
			$this->form_validation->set_rules('author', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			 if ($this->form_validation->run() == FALSE){
			}else{
				$comment = $this->input->post_get('comment', TRUE);
				$author = $this->input->post_get('author', TRUE);
				$email = $this->input->post_get('email', TRUE);
				$url = $this->input->post_get('url', TRUE);

					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$confir['smtp_host'] = "mail.watchers.org";
					$confir['smtp_user'] = "info@watchers.org";
					$confir['smtp_pass'] = "Steeldubs0077!@#";
					$confir['smtp_port'] = "25";
					$this->email->initialize($config);
					
					$this->email->from($email, $author);
					$this->email->to('info@watchers.org');
					$this->email->subject("Email From {$author}");
					$this->email->message($comment);
					$i = $this->email->send();
					
					if($i){
						$data['message'] = "Message has been sent.";	
					}else{
						$data['warning'] = "Sorry, something went wrong";	
					}
			}
			
			//same view for all form state
			$this->load->view('welcome_views/header', $data);
			$this->load->view('welcome_views/nav', $data);
			$this->load->view('welcome_views/contact_view', $data);
			$this->load->view('welcome_views/footer', $data);
		}
	}

