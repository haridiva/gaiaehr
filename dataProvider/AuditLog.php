<?php
/**
 * GaiaEHR (Electronic Health Records)
 * Copyright (C) 2013 Certun, LLC.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

include_once(dirname(__FILE__) . '/../classes/MatchaHelper.php');

class AuditLog extends MatchaHelper {

	/**
	 * Data Object
	 */
	private $Log = NULL;

	function __construct(){
		if($this->Log == NULL)
			$this->Log = MatchaModel::setSenchaModel('App.model.administration.AuditLog');
		return;
	}

	//------------------------------------------------------------------------------------------------------------------
	// Main Sencha Model Getter and Setters
	//------------------------------------------------------------------------------------------------------------------
	public function getLogs(stdClass $params){
		return $this->Log->load($params)->all();
	}

	public function setLog(stdClass $params){
		$params->date = date('Y-m-d H:i:s');
		$params->facility = $_SESSION['user']['facility'];
		$params->user_id = $_SESSION['user']['id'];
		return $this->Log->save($params);
	}

}
