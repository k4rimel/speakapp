<?php 

class Utils {
	public static function dateDiff($date1, $date2){
	    $diff = abs($date1 - $date2);
	    $result = array();
	 
	    $tmp = $diff;
	    $result['second'] = $tmp % 60;
	 
	    $tmp = floor( ($tmp - $result['second']) /60 );
	    $result['minute'] = $tmp % 60;
	 
	    $tmp = floor( ($tmp - $result['minute'])/60 );
	    $result['hour'] = $tmp % 24;
	 
	    $tmp = floor( ($tmp - $result['hour'])  /24 );
	    $result['day'] = $tmp;
	 
	    return $result;
	}
	public static function formatDiff($date1, $date2){
		$diff = abs($date1 - $date2);
		$result = array();
		$str;
		
		$tmp = $diff;
		$result['second'] = $tmp % 60;
		
		$tmp = (int)floor( ($tmp - $result['second']) /60 );
		$result['minute'] = $tmp % 60;
		
		$tmp = (int)floor( ($tmp - $result['minute'])/60 );
		$result['hour'] = $tmp % 24;
		
		$tmp = (int)floor( ($tmp - $result['hour'])  /24 );
		$result['day'] = $tmp;

		if($result['day'] > 1) {
			$str = $result['day'].' days';
		}
		else if($result['day'] === 1) {
			$str = $result['day'].' day';
		} else {
			if($result['hour'] > 1) {
				$str = $result['hour'].' hours';
			}
			else if($result['hour'] === 1) {
				$str = $result['hour'].' hour';
			} else {
				if($result['minute'] > 1) {
					$str = $result['minute'].' minutes';
				}
				else if($result['minute'] === 1) {
					$str = $result['minute'].' minute';
				} else {
					if($result['second'] > 1) {
						$str = $result['second'].' seconds';
					} else if($result['second'] === 1) {
						$str = $result['second'].' second';
					}
				
				}
			}
		}
		
		return $str;
	}

}