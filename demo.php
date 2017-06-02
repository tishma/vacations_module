<?php

	include "classes.php";

	use model\Employee;
	use model\VacationRequest;
	use repository\HardCodedEmployeeRepository;
	use repository\VolatileVacationRequestRepository;
	use service\DoNothingEntityManager;

	$entityManager = new DoNothingEntityManager();

	$entityManager->addRepositories( [
		'employees'        => new HardCodedEmployeeRepository(),
		'vacation_request' => new VolatileVacationRequestRepository(),
	] );

	$vacationManager = new service\VacationManager();

	$employeeRepository = $entityManager->getRepository( 'employees' );

	$employee = $employeeRepository->findById( 0 );

	echo "Scenario 1 - Accepting Request", PHP_EOL;
	echo "BEFORE (expect 20 days)", PHP_EOL;
	dumpEmployee( $employee );
	$vacationRequest = new VacationRequest( $employee, new DateTime( '' ), 5 );
	dumpVacationRequest($vacationRequest);
	$entityManager->beginTransaction();
	try {
		$vacationManager->acceptRequest( $vacationRequest );
		$entityManager->persist($vacationRequest);
		$entityManager->persist($employee);
		$entityManager->flush();
		$entityManager->commitTransaction();
	} catch ( Exception $e ) {
		$entityManager->rollbackTransaction();
		throw $e;
	}
	echo "AFTER (expect 15 days/ACCEPTED)", PHP_EOL;
	dumpEmployee( $employee );
	dumpVacationRequest($vacationRequest);
	echo PHP_EOL;

	echo "Scenario 2 - Rejecting Request", PHP_EOL;
	$employee        = $employeeRepository->findById( 1 );
	$vacationRequest = new VacationRequest( $employee, new DateTime( '' ), 5 );
	echo "BEFORE (expect 20 days)", PHP_EOL;
	dumpEmployee( $employee );
	dumpVacationRequest( $vacationRequest );
	$vacationManager->rejectRequest( $vacationRequest );
	$entityManager->persist($vacationRequest);
	$entityManager->flush();
	echo "AFTER (expect 20 days/REJECTED)", PHP_EOL;
	dumpEmployee( $employee );
	dumpVacationRequest( $vacationRequest );
	echo PHP_EOL;


	function dumpEmployee( Employee $employee ) {
		echo "Employee:\t{$employee->getName()}", PHP_EOL;
		echo "Remaining Vacation:\t{$employee->getRemainingVacationDays()} days", PHP_EOL;
	}


	function dumpVacationRequest( VacationRequest $vacationRequest ) {
		echo "{$vacationRequest->getEmployee()->getName()} requested {$vacationRequest->getDays()} days. Status: {$vacationRequest->getStatus()}", PHP_EOL;
	}
