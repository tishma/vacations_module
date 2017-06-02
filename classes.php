<?php

	//of course - a real PSR class loader is required in a real-world project
	include 'service/EntityManagerInterface.php';
	include 'service/DoNothingEntityManager.php';
	include 'model/Employee.php';
	include 'model/VacationRequest.php';
	include 'model/VacationManager.php';
	include 'repository/RepositoryInterface.php';
	include 'repository/HardCodedEmployeeRepository.php';
	include 'repository/VolatileVacationRequestRepository.php';
	include 'controller/APIController.php';
	include 'controller/VacationRequestController.php';
