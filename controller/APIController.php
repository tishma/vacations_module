<?php


	namespace controller;


	abstract class APIController {

		protected function sendSuccessResponse( $data = null ) {
			//header 200
			//serialize data if any
		}

		protected function sendCreatedResponse() {
			//header 201
		}

		protected function sendUpdatedResponse() {
			//header 200
		}

		protected function send404Response( ) {
			//header 404
		}

		protected function sendForbiddenResponse( ) {
			//header 403
		}

		protected function sendAuthRequiredResponse( ) {
			//header 401
		}

	}
