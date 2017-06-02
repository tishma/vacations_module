<?php


	namespace service;


	use repository\RepositoryInterface;

	class DoNothingEntityManager implements EntityManagerInterface {
		private $repositories;

		/**
		 * DoNothingEntityManager constructor.
		 */
		public function __construct( ) {
			$this->repositories = [];
		}

		public function getRepository( $repositoryName ) : RepositoryInterface{
			return $this->repositories[ $repositoryName ];
		}

		public function persist( $object ) {
			// do nothing
		}

		public function remove( $object ) {
			// do nothing
		}

		public function flush() {
			// do nothing
		}

		public function addRepositories( $repositories ) {
			$this->repositories = array_merge( $this->repositories, $repositories );
		}

		public function beginTransaction() {
			// do nothing
		}

		public function commitTransaction() {
			// do nothing
		}

		public function rollbackTransaction() {
			// do nothing
		}
	}
