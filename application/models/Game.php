<?php
Class Game extends CI_Model
{
 	function getResults()
 	{
   		$this -> db -> select('player_1,player_2,result,game_play,created');
   		$this -> db -> from('game_results');
   		$this->db->order_by('created', 'DESC');
   		$this -> db -> limit(5);

   		$query = $this -> db -> get();

   		if($query -> num_rows() > 0)
   		{
     			$processed_results=array();
     			$results =$query->result_array();
     			$i=0;
     			foreach($results as $result){
	
				$processed_results[$i]['player_1']=$result['player_1'];
				$processed_results[$i]['player_2']=$result['player_2'];
				$processed_results[$i]['result']=$result['result'];
				$odd = array();
				$even = array();
				foreach (explode(',',$result['game_play']) as $k => $v) {
    				if ($k % 2 == 0) {
        				$even[] = $v;
    				}
    				else {
        				$odd[] = $v;
    				}
			}
			$processed_results[$i]['odd']=$odd;
			$processed_results[$i]['even']=$even;
			$processed_results[$i]['created']=$result['created'];
			$i++;
     		}
     			return $processed_results;     
   		}
   		else
   		{
     			return false;
   		}
 }

function getAllResults()
	{
   		
		$this -> db -> select('player_1,player_2,result,game_play,created');
   		$this -> db -> from('game_results');
   		$this->db->order_by('created', 'DESC');

  		$query = $this -> db -> get();

   		if($query -> num_rows() > 0)
   		{
    			
			$processed_results=array();
     			$results =$query->result_array();
     			$i=0;
     			foreach($results as $result){
	
				$processed_results[$i]['player_1']=$result['player_1'];
				$processed_results[$i]['player_2']=$result['player_2'];
				$processed_results[$i]['result']=$result['result'];
				$odd = array();
				$even = array();
				foreach (explode(',',$result['game_play']) as $k => $v) {
    					if ($k % 2 == 0) {
        					$even[] = $v;
    					}
    					else {
        					$odd[] = $v;
    					}
				}
				$processed_results[$i]['odd']=$odd;
				$processed_results[$i]['even']=$even;
				$processed_results[$i]['created']=$result['created'];
				$i++;
     		}

     		return $processed_results;
     
   		}
   		else
   		{
     		return false;
   		}
 	}
}
?>