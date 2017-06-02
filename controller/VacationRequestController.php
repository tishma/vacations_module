<?php


	namespace controller;

	use model\VacationRequest;
	use service\EntityManagerInterface;

	class VacationRequestController extends APIController {

		/**
		 * @var EntityManagerInterface
		 */
		private $entityManager;

		public function create( $request ) {
			$vacationRequest = VacationRequest::createFromRequest( $request );
			$this->entityManager->persist( $vacationRequest );
			$this->entityManager->flush();
			$this->sendCreatedResponse();
		}

		public function get( $request ) {
			$vacationRequest = $this->entityManager->getRepository( 'vacation_request' )->findById( $request['id'] );
			$this->sendSuccessResponse( $vacationRequest );
		}

		public function update( $request ) {

			/** @var VacationRequest $vacationRequest */
			$vacationRequest    = $this->entityManager->getRepository( 'vacation_request' )->findById( $request['id'] );
			$newVacationRequest = VacationRequest::createFromRequest( $request );
			$vacationRequest->updateFrom( $newVacationRequest );
			$this->entityManager->persist( $vacationRequest );
			$this->entityManager->flush();
			$this->sendUpdatedResponse();
		}

		public function remove( $request ) {
			$vacationRequest = $this->entityManager->getRepository( 'vacation_request' )->findById( $request['id'] );
			$this->entityManager->remove( $vacationRequest );
			$this->entityManager->flush();
			$this->sendSuccessResponse();
		}

		public function validateRequest( $request ) {
			// do nothing
		}
	}
