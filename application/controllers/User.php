<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all users (members) related operations.
 * 
 * List of functions:
 * userListing()
 * addNew()
 * checkEmailExists()
 * addNewUser()
 * editOld()
 * editUser()
 * deleteUser()
 * pageNotFound()
 * loginHistoy()
 * profile()
 * profileUpdate()
 * changePassword()
 * emailExists()
 * book()
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('book_model');
        $this->isLoggedIn();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Account Detail';
        
        $this->loadViews("back/user/profile", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);
			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Library : User Listing';
            $this->loadViews("back/user/users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Library : Add New User';

            $this->loadViews("back/user/addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('user/addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('user/userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'Library : Edit User';
            
            $this->loadViews("back/user/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('user/userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Library : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Library : User Login History';
            
            $this->loadViews("back/user/loginHistory", $this->global, $data, NULL);
        }        
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? 'Library : My Profile' : 'Library : Change Password';
        $this->loadViews("back/user/profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('user/profile/'.$active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('user/profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('user/profile/'.$active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }

    /**
     * Loads add new book form
     */
    function newBook()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('book_model');
            $data['subjects'] = $this->book_model->getSubjects();
            $this->global['pageTitle'] = 'Library : Add New Book';
            $this->loadViews("back/book/addBook", $this->global, $data, NULL);
        }
    }

        /**
     * This function is used to add new book to the system
     */
    function addNewBook()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('author','Author','trim|required|max_length[128]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[128]');
            $this->form_validation->set_rules('subject','Subject','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->newBook();
            }
            else
            {
                $title = $this->security->xss_clean($this->input->post('title'));
                $author = $this->security->xss_clean($this->input->post('author'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $subjectId = $this->input->post('subject');
                
                $bookInfo = array('title'=> $title, 'author'=>$author, 'subjectId'=>$subjectId,
                                    'description'=>$description, 'availability'=>1, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('book_model');
                $result = $this->book_model->addNewBook($bookInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Book created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Book creation failed');
                }
                
                redirect('user/bookListing');
            }
        }
    }

    /**
     * Edit book
     */
    function editBook($bookId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($bookId == null)
            {
                redirect('user/bookListing');
            }
            
            $data['bookInfo'] = $this->book_model->getBookInfo($bookId);
            $data['subjects'] = $this->book_model->getSubjects();
            $this->global['pageTitle'] = 'Library : Edit Book';
            $this->loadViews("back/book/editBook", $this->global, $data, NULL);
        }
    }

    function updateBook()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            // hidden field
            $bookId = $this->input->post('bookId');
            
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('author','Author','required');
            $this->form_validation->set_rules('description','Description','required');
            $this->form_validation->set_rules('subjectId','Subject','required');
            
            // check rules
            if($this->form_validation->run() == FALSE)
            {
                $this->editBook($bookId);
            }
            else
            {
                // clean up fields
                $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
                $author = $this->security->xss_clean($this->input->post('author'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $subjectId = $this->input->post('subjectId');
                
                $bookInfo = array();
                
                $bookInfo = array('title'=>$title, 'author'=>$author, 'description'=>$description,
                    'subjectId'=>$subjectId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->book_model->editBook($bookInfo, $bookId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Book updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Book updation failed');
                }
                
                redirect('user/bookListing');
            }
        }
    }

    /**
     * This function is used to delete the user using bookId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBook()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $bookId = $this->input->post('bookId');
            $bookInfo = array('isDeleted'=>1, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->book_model->deleteBook($bookId, $bookInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    /**
     * This function is used to load the book list
     */
    function bookListing()
    {
        $this->load->helper('text');
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        
        $this->load->library('pagination');
        
        $count = $this->book_model->bookListingCount($searchText);
        $returns = $this->paginationCompress ( "bookListing/", $count, 10 );
        $data['bookRecords'] = $this->book_model->bookListing($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Library : Book Listing';
        $this->loadViews("back/book/books", $this->global, $data, NULL);
    }
}

?>