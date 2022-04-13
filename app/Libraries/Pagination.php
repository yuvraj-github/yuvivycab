<?php
/**
 * Pagination Class
 * @author: Abhishek Verma
 */
namespace App\Libraries;
use CodeIgniter\Model;

class Pagination extends Model{
	var $php_self;
	var $rows_per_page = 10; //Number of records to display per page
	var $total_rows = 0; //Total number of rows returned by the query
	var $links_per_page = 5; //Number of links to display per page
	var $append = ""; //Paremeters to append to pagination links
	var $sql = "";
	var $debug = false;
	var $conn = false;
	var $page = 1;
	var $max_pages = 0;
	var $offset = 0;
	/**
	 * Constructor
	 *
	 * @param resource $connection Mysql connection link
	 * @param string $sql SQL query to paginate. Example : SELECT * FROM users
	 * @param integer $rows_per_page Number of records to display per page. Defaults to 10
	 * @param integer $links_per_page Number of links to display per page. Defaults to 5
	 * @param string $append Parameters to be appended to pagination links 
	 */
	function __construct($sql, $rows_per_page, $links_per_page){
		$this->append = $this->queryString();
		$this->sql = $sql;
		$this->rows_per_page = (int)$rows_per_page;
		if(intval($links_per_page) > 0){
			$this->links_per_page = (int)$links_per_page;
		}
		else{
			$this->links_per_page = 5;
		}
		//$this->php_self = htmlspecialchars($_SERVER['REDIRECT_URL']);
		if(get('page')){
			$this->page = intval(get('page'));
		}
	}
	public function queryString(){
		$q = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';	
		// $q = preg_replace('/('.Load::$current.')&{0,}/', '', strtolower($q)); //pagination problem with encrypt value
		$q = preg_replace('/('.Ion_load::$current.'){0,}/', '', $q);
		if($q != ''){
            $q = preg_replace('/&page=[0-9]+/', '', $q);
			return $q;
		}
		return '';
	}
	/**
	 * Executes the SQL query and initializes internal variables
	 *
	 * @access public
	 * @return resource
	 */
	public function paginate(){
		//Find total number of rows
		$all_rs = $this->db->query($this->sql);
		$this->total_rows = $all_rs->result_id->num_rows;
		//Max number of pages
		$this->max_pages = ceil($this->total_rows / $this->rows_per_page);
		if($this->links_per_page > $this->max_pages){
			$this->links_per_page = $this->max_pages;
		}
		//Check the page value just in case someone is trying to input an aribitrary value
		if($this->page > $this->max_pages || $this->page <= 0){
			$this->page = 1;
		}
		//Calculate Offset
		$this->offset = $this->rows_per_page * ($this->page - 1);
		//Fetch the required result set
		$rs = $this->db->query($this->sql." LIMIT {$this->offset}, {$this->rows_per_page}");
		return $rs;
	}
	public function query($sql){
		$query = $this->db->query($sql);         
		if(!$query){
			pre($sql);
			pre("MySqli Error:".$this->db->error);
			die;
		}
		return $query;
	}
	/**
	 * Display the link to the first page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'First'
	 * @return string
	 */
	public function renderFirst(){
		if($this->max_pages > 1){
			if($this->page == 1){
				return '<li class="active"><a href="#">First</a></li>';
			}
			else{
				return '<li><a href="'.$this->php_self.'?'.$this->append.'&page=1" title="1">First</a></li>';
			}
		}
	}
	/**
	 * Display the link to the last page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'Last'
	 * @return string
	 */
	public function renderLast(){
		if($this->max_pages > 1){
			if($this->page == $this->max_pages){
				return "<li class='active'><a href='#'>Last</a></li>";
			}
			else{
				return '<li><a href="'.$this->php_self.'?'.$this->append.'&page='.$this->max_pages.'" title="'.$this->max_pages.'">Last</a></li>';
			}
		}
	}
	/**
	 * Display the next link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '>>'
	 * @return string
	 */
	public function renderNext(){
		if($this->page < $this->max_pages){
			return '<li><a href="'.$this->php_self.'?'.$this->append.'&page='.($this->page + 1).'" title="'.($this->page + 1).'">Next</a></li>';
		}
	}
	/**
	 * Display the previous link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '<<'
	 * @return string
	 */
	public function renderPrev($tag = 'Previous'){
		if($this->page > 1){
			return '<li><a href="'.$this->php_self.'?'.$this->append.'&page='.($this->page - 1).'" title="'.($this->page - 1).'">Previous</a></li>';
		}
	}
	/**
	 * Display the page links
	 *
	 * @access public
	 * @return string
	 */
	public function renderNav(){
		$batch = @ceil($this->page / $this->links_per_page);
		$end = $batch * $this->links_per_page + 1;
		if($end > $this->max_pages){
			$end = $this->max_pages;
		}
		$start = $end - $this->links_per_page;
		if($start == 0){
			$start = 1;
		}
		$links = '';
		for($i = $start; $i <= $end; $i++){
			if($this->max_pages > 1){
				if($i == $this->page){
					$links .= "<li class='active'><a href='#'>$i</a></li>";
				}
				else{
					$links .= '<li> <a href="'.$this->php_self.'?'.$this->append.'&page='.$i.'" title="'.$i.'">'.$i.'</a></li> ';
				}
			}
		}
		return $links;
	}
	/**
	 * Display full pagination navigation
	 *
	 * @access public
	 * @return string
	 */
	public function renderFullNav(){
		return '<ul class="pagination">'.$this->renderFirst().$this->renderPrev().'&nbsp;'.$this->renderNav().'&nbsp;'.$this->renderNext().$this->renderLast().'</ul>';
	}
	/**
	 * Set debug mode
	 *
	 * @access public
	 * @param bool $debug Set to TRUE to enable debug messages
	 * @return void
	 */
	public function setDebug($debug){
		$this->debug = $debug;
	}
}
?>