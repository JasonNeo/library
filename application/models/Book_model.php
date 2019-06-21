<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Book_model (Book Model)
 * Book model class to get to handle book related data
 */
class Book_model extends CI_Model
{
    /**
     * Get the book count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function bookListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.title, BaseTbl.author, BaseTbl.description, BaseTbl.subject, BaseTbl.isDeleted ');
        $this->db->from('tbl_books as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%'
                            OR  BaseTbl.author  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.subject  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the book listing
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function bookListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_books as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%'
                            OR  BaseTbl.author  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%'
                            OR  BaseTbl.subject  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->order_by('BaseTbl.bookId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function is used to add new book to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewBook($bookInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_books', $bookInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get book information by id
     * @param number $bookId : This is book id
     * @return array $result : This is book information
     */
    function getbookInfo($bookId)
    {
        // $this->db->select('bookId, name, email, mobile, roleId');
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('isDeleted', 0);
        $this->db->where('bookId', $bookId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the book information
     * @param array $bookInfo : This is books updated information
     * @param number $bookId : This is book id
     */
    function editBook($bookInfo, $bookId)
    {
        $this->db->where('bookId', $bookId);
        $this->db->update('tbl_books', $bookInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the book information
     * @param number $bookId : This is book id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBook($bookId, $bookInfo)
    {
        $this->db->where('bookId', $bookId);
        $this->db->update('tbl_books', $bookInfo);
        
        return $this->db->affected_rows();
    }

    /**
     * This function is used to return book
     * @param number $bookId : This is book id
     * @return boolean $result : TRUE / FALSE
     */
    function returnBook($bookId)
    {
        $this->db->set('availability', 1);
        $this->db->where('bookId', $bookId);
        $this->db->update('tbl_books');
        
        return TRUE;
    }

    /**
     * This function used to get book information by id
     * @param number $bookId : This is book id
     * @return array $result : This is book information
     */
    function getbookInfoById($bookId)
    {
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('isDeleted', 0);
        $this->db->where('bookId', $bookId);
        $query = $this->db->get();
        
        return $query->row();
    }

}