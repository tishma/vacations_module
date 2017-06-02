<?php


	namespace service;


	use model\VacationRequest;

	class VacationManager {

		/**
		 * VacationManager constructor.
		 */
		public function __construct() {
		}

		public function acceptRequest( VacationRequest $vacationRequest ) {
			$vacationRequest->setStatus(VacationRequest::STATUS_ACCEPTED);
			$vacationRequest->getEmployee()->useDays($vacationRequest->getDays());
		}

		public function rejectRequest( VacationRequest $vacationRequest ) {
			$vacationRequest->setStatus(VacationRequest::STATUS_REJECTED);
		}
	}
