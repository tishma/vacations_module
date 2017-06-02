<?php


	namespace model;


	class Employee {

		/**
		 * @var string
		 */
		private $id;
		/**
		 * @var string
		 */
		private $name;
		/**
		 * @var int
		 */
		private $remainingVacationDays;

		public static function create( $string, $days = 20 ): Employee {
			$employee = new Employee();
			$employee->setName( $string );
			$employee->setRemainingVacationDays( $days );

			return $employee;
		}

		/**
		 * @param string $name
		 */
		public function setName( $name ) {
			$this->name = $name;
		}

		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}

		/**
		 * @param int $days
		 */
		public function setRemainingVacationDays( $days ) {
			$this->remainingVacationDays = $days;
		}

		/**
		 * @return int
		 */
		public function getRemainingVacationDays() {
			return $this->remainingVacationDays;
		}

		/**
		 * @param string $id
		 */
		public function setId( string $id ) {
			$this->id = $id;
		}

		/**
		 * @return string
		 */
		public function getId(): string {
			return $this->id;
		}

		/**
		 * @param int $days
		 */
		public function useDays( $days ) {
			$this->remainingVacationDays -= $days;
		}

	}
