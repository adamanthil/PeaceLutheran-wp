<?php

date_default_timezone_set('America/Chicago');

class LiturgicalCalendar {
	/**
	 *	Calculates the season of the church year (eg Lent, Advent, Easter, Epiphany, etc)
	 *	
	 *	@param date DateTime (optional)
	 *	@return string
	*/
	public function getSeason($date = null) {
		if(is_null($date)) {
			$date = new \DateTime();
		}
		$year = $date->format('Y');	
		$baptismOfChrist = $this->sundayAfter(new \DateTime($year . '-01-06'));
		$adventBegin = $this->sundayBefore($this->christmas($year))->sub(new \DateInterval('P4W'));
		
		$ashWednesday = $this->easter($year)->sub(new \DateInterval('P46D'));
		
		if($date <= $baptismOfChrist) {
			return 'christmas';
		}
		elseif($date < $ashWednesday) {
			return 'ordinary';
		}
		elseif($date < $this->easter($year)->sub(new \DateInterval('P1D'))) {
			return 'lent';
		}
		elseif($date < $this->pentecost($year)) {
			return 'easter';
		}
		elseif($date < $this->trinity($year)) {
			return 'pentecost';
		}
		elseif($date < $this->reformation($year)) {
			return 'ordinary';
		}
		elseif($date < $this->allSaints($year)) {
			return 'reformation';
		}
		elseif($date < $this->allSaints($year)->add(new \DateInterval('P1W'))) {
			return 'all-saints';
		}
		elseif($date < $adventBegin) {
			return 'ordinary';
		}
		elseif($date < $this->christmas($year)->sub(new \DateInterval('P1D'))) {
			return 'advent';
		}
		else {
			return 'christmas';
		}
	}
	
	/**
	 *	Calculate the date of the nearest Sunday before a given date.  If date is a sunday, it is returned
	 *
	 *	@param DateTime
	 *	@return DateTime
	*/
	private function sundayBefore($date) {
		$day = $date->format('w');
		$date->sub(new \DateInterval('P' . $day . 'D'));
		return $date;
	}
	
	/**
	 *	Calculate the date of the nearest Sunday after a given date.  If date is a sunday, it is returned
	 *
	 *	@param DateTime
	 *	@return DateTime
	*/
	private function sundayAfter($date) {
		$day = $date->format('w');
		$interval = 7 - $day;
		$date->add(new \DateInterval('P' . $interval . 'D'));
		return $date;
	}
	
	/**
	 *	Calculates the date of easter for the given year (won't work correctly past 2099)
	 *	Algorithm copied from http://www.assa.org.au/edm.html#Computer	
	 *
	 *	@param int $year
	 *	@return DateTime
	*/
	private function easter($year) {
		$firstDig = floor($year / 100);
		$remain19 = $year % 19;
		
		// Calculate the PFM date
		$temp = floor(($firstDig - 15) / 2) + 202 - 11 * $remain19;
		$temp = $temp % 30;
		
		
		// $ta, tb, tc are entries for table a, b, and c respectively in the magical tables of easter-calculating-action
		
		$ta = $temp + 21;
		if($temp == 29) {
			$ta--;
		}
		if($temp == 28 && $remain19 > 10) {
			$ta--;
		}
		
		// Find the next Sunday
		$tb = ($ta - 19) % 7;
		$tc = (40 - $firstDig) % 4;
		if($tc == 3) {
			$tc++;
		}
		if($tc > 1) {
			$tc++;
		}
		
		$temp = $year % 100;
		$td = ($temp + floor($temp / 4)) % 7;
		
		$te = ((20 - $tb - $tc - $td) % 7) + 1;
		$d = $ta + $te;
		
		// Calculate date
		if($d > 31) {
			$d -= 31;
			$m = 4;
		}
		else {
			$m = 3;
		}
		
		return new \DateTime($year . '-' . $m . '-' . $d);
	}
	
	private function pentecost($year) {
		return $this->easter($year)->add(new \DateInterval('P7W'));
	}
	
	private function trinity($year) {
		return $this->pentecost($year)->add(new \DateInterval('P1W'));
	}
	
	/**
	 *	Calculates the date of Christmas for the given year
	 *
	 *	@param int $year
	 *	@return DateTime
	*/
	private function christmas($year) {
		return new \DateTime($year . '-12-25');
	}
	
	private function reformation($year) {
		return $this->sundayBefore(new \DateTime($year . '-10-31'));
	}
	
	private function allSaints($year) {
		return $this->sundayAfter(new \DateTime($year . '-11-01'));
	}
}

?>