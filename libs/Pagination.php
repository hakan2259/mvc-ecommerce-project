<?php

class Pagination  {

        public $limit,$totalPage,$myPage,$showNumber;

        function PaginationCreate($dataCount,$currentPage,$adet){
       $this->showNumber = $adet;
       $this->totalPage = ceil($dataCount/$this->showNumber);
       $this->myPage = is_numeric($currentPage) ? $this->myPage = $currentPage : $this->myPage=1;
       if($this->myPage<1) $this->myPage =1;
       if($this->myPage > $this->totalPage) $this->myPage = $this->totalPage;
       $this->limit = ($this->myPage-1) * $this->showNumber;


        }


	
	public static function Numbers($totalPage,$link){

        echo '<nav aria-label="Page navigation example ">
                    
                    <ul class="pagination mx-auto border border-dark  bg-gradient-mvc mt-1">';

        for ($s=1; $s<=$totalPage; $s++) :
            echo '<li class="page-item m-1 ">
					<a class="page-link" href="'.URL.$link.$s.'">'.$s.'</a>
					
					</li>';

        endfor;

        echo'</ul>
                    </nav>';
    }

	
}




?>