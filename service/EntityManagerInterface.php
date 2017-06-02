<?php


	namespace service;


	use repository\RepositoryInterface;

	interface EntityManagerInterface {
		public function getRepository($repositoryName) : RepositoryInterface;
		public function persist($object);
		public function remove($object);
		public function flush();
		public function beginTransaction();
		public function commitTransaction();
		public function rollbackTransaction();
	}
