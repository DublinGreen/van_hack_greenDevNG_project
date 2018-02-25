<?php

class ApplicationModel extends CI_Model {
	
	public $cookieSurveyName = "survey";
	public $cookieSurveyPrefix = "governance_watchers";

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->helper('cookie');
    }

    public function hashHash($password) {
        return hash('sha512', $password);
    }
 
    public function getForumCategories() {
        $resultSet = "";

		$this->db->order_by(' name', 'ASC');
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;
    }
    
	public function getCategoryByName($name){
        $resultSet = "";
		$name = htmlspecialchars($name);
        $query = $this->db->get_where('categories', array('name' => $name));

        if ($query->num_rows() > 0) {
            $resultSet = $query->row();
        }

        return $resultSet;		
	}
    
	public function getForumPosts() {
        $resultSet = "";

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;
    }
    
	public function getUserPosts($userId) {
        $resultSet = "";

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('posts', array('user_id' => $userId));


        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;
    }
    
    public function getForumPostByCategory($categoryName){
        $resultSet = "";

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('posts', array('category' => $categoryName));

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;		
	}

	public function getForumPost($id) {
        $resultSet = "";

		$query = $this->db->get_where('posts', array('id' => $id));
		if ($query->num_rows() > 0){
			$resultSet = $query->row();
		}

        return $resultSet;
    }
    
    
    public function getSurveyById($id){
		$resultSet = "";

		$query = $this->db->get_where('survey', array('id' => $id));

        if ($query->num_rows() > 0) {
            $resultSet = $query->row();
        }

        return $resultSet;		
	}
    
    public function getSurvey(){
		$resultSet = "";

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('survey');

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;
	}
	
	public function getOptionsForSurvey($surveyId){
		$resultSet = "";

		$this->db->order_by('options_slot', 'ASC');
        $query = $this->db->get_where('survey_options', array('survery_id' => $surveyId));

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;		
	}
	
	public function getSurveyAnswers($surveyId){
		$resultSet = "";

		$this->db->order_by('survey_option_choice', 'ASC');
        $query = $this->db->get_where('survey_answers', array('survey_id' => $surveyId));

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;	
	}
	
	public function  authUser() {
			$i = false;

			$logged_in = $this->session->userdata('logged_in');
			if ($logged_in) {
				$i = true;
			}

			return $i;
		}
	
	public function getForumTopicComments($topicId){
		$resultSet = "";

		$this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('comments', array('post_id' => $topicId,'status' => 'PUBLISH'));

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;	
	}
	
	public function getSurveyAnswersOpinion($surveyId){
		$resultSet = "";

		$this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('survey_answers', array('survey_id' => $surveyId));

        if ($query->num_rows() > 0) {
            $resultSet = $query->result();
        }

        return $resultSet;	
	}
	
	public function getSurveyAnswersOptionCount($surveyId,$option){
		$resultSet = "";

        $query = $this->db->query("SELECT COUNT(*) as total FROM van_survey_answers WHERE survey_option_choice = '{$option}' AND survey_id = {$surveyId}");
        if ($query->num_rows() > 0) {
            $resultSet = $query->row();
        }

        return $resultSet;	
	}
	
	public function updateSurveyQAndAResults($survey_id,$survey_question,
	$survey_option_a_per,$survey_option_b_per,$survey_option_c_per,$survey_option_d_per){
		
		$query = $this->db->get_where('survey_q_and_a_results', array('survey_id' => $survey_id));
		if ($query->num_rows() > 0){
			$updateData = array(
               'survey_question' => $survey_question,
               'survey_option_a_per' => $survey_option_a_per,
               'survey_option_b_per' => $survey_option_b_per,
               'survey_option_c_per' => $survey_option_c_per,
               'survey_option_d_per' => $survey_option_d_per,
            );
			$this->db->where('survey_id', $survey_id);
			$this->db->update('survey_q_and_a_results', $updateData); 
			
		}else{
			$insertData = array(
				'survey_id' => $survey_id,
               'survey_question' => $survey_question,
               'survey_option_a_per' => $survey_option_a_per,
               'survey_option_b_per' => $survey_option_b_per,
               'survey_option_c_per' => $survey_option_c_per,
               'survey_option_d_per' => $survey_option_d_per,
			);		
			$this->db->insert('survey_q_and_a_results', $insertData); 	
			
		}
	}
	
	public function addToSurveyCookie($cookieName){
		$cookie = array(
			'name'   => $cookieName,
			'value'  => "true",
			'expire' => '2592000', // 30 days This is a day (86400)
			'domain' => base_url(),
			'path'   => '/',
			'prefix' => $this->cookieSurveyPrefix,
			'secure' => TRUE
		);

		$this->input->set_cookie($cookie);
	}
	
	public function getSurveyCookie($cookieName){
		//$this->input->cookie($cookieName);
		$this->input->cookie($cookieName, TRUE); // with XSS filter
	}
	
	public function deleteSurveyCookie($cookieSurveyName){
		delete_cookie($cookieSurveyName);
	}
	
	public function getIP(){
		return $this->input->ip_address();
	}
    
}
