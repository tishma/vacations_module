<?php


	namespace model;


	use DateTime;

	class VacationRequest {

		const STATUS_NEW = 'NEW';
		const STATUS_REJECTED = 'REJECTED';
		const STATUS_ACCEPTED = 'ACCEPTED';

		/**
		 * @var Employee
		 */
		private $employee;

		/**
		 * @var DateTime
		 */
		private $startDate;

		/**
		 * @var int
		 */
		private $days;

		private $status;

		function __construct( Employee $employee, DateTime $startDate, $days ) {
			$this->employee  = $employee;
			$this->startDate = $startDate;
			$this->days      = $days;
			$this->status    = VacationRequest::STATUS_NEW;
		}

		public static function createFromRequest( $request ) : VacationRequest{
			$vacationRequest = new VacationRequest($request['employee'],  $request['startDate'], $request['days']);
			return $vacationRequest;
		}

		/**
		 * @return Employee
		 */
		public function getEmployee(): Employee {
			return $this->employee;
		}

		/**
		 * @param Employee $employee
		 */
		public function setEmployee( Employee $employee ) {
			$this->employee = $employee;
		}

		/**
		 * @return DateTime
		 */
		public function getStartDate(): DateTime {
			return $this->startDate;
		}

		/**
		 * @param DateTime $startDate
		 */
		public function setStartDate( DateTime $startDate ) {
			$this->startDate = $startDate;
		}

		/**
		 * @return int
		 */
		public function getDays(): int {
			return $this->days;
		}

		/**
		 * @param int $days
		 */
		public function setDays( int $days ) {
			$this->days = $days;
		}

		/**
		 * @return string
		 */
		public function getStatus(): string {
			return $this->status;
		}

		/**
		 * @param string $status
		 */
		public function setStatus( $status ) {
			$this->status = $status;
		}

		/**
		 * A fluent way to update existing validation request
		 *
		 * @param VacationRequest $newVacationRequest
		 *
		 * @return $this
		 */
		public function updateFrom( VacationRequest $newVacationRequest ) {
			$this->startDate = $newVacationRequest->getStartDate();
			$this->days = $newVacationRequest->getDays();
			$this->status = $newVacationRequest->getStatus();

			return $this;
		}

	}
