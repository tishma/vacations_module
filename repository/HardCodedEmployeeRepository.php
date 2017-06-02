<?php


	namespace repository;


	use model\Employee;


	class HardCodedEmployeeRepository implements RepositoryInterface {

		private $employees;

		function __construct() {

			$mark = Employee::create( "Mark Knopfler", 20 );
			$joe  = Employee::create( "Joe Satriani", 20 );
			$john = Employee::create( "John Petrucci", 20 );
			$eric = Employee::create( "Eric Clapton", 20 );

			$this->employees   = [];
			$this->employees[] = $mark;
			$this->employees[] = $joe;
			$this->employees[] = $john;
			$this->employees[] = $eric;

		}

		public function findById( int $id ) {
			return $this->employees[ $id ];
		}
	}
