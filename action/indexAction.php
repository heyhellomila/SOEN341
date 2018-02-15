<?php
	require_once("action/commonAction.php");

	class IndexAction extends commonAction{

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			
		}

	}


	
