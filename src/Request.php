<?php
/**
 * App          : Pyramid PHP Fremework
 * Author       : Nihat Doğan
 * Email        : info@pyramid.com
 * Website      : https://www.pyramid.com
 * Created Date : 01/01/2025
 * License GPL
 *
 */

namespace Pyramid;

class Request {

	protected $all;
	protected $get;
	protected $post;
	protected $file;
	protected $server;
	protected $input;
	private $statusCode;
	private $body;
	private $headers;

	public function __construct( $all = [], $get = [], $post = [], $file = [], $server = [], $input = '', $statusCode = '', $body = '', $headers = [] ) {
		$this->all        = $all ?: $_POST;
		$this->get        = $get ?: $_GET;
		$this->post       = $post ?: $_POST;
		$this->file       = $file ?: $_FILES;
		$this->server     = $server ?: $_SERVER;
		$this->input      = $input ?: file_get_contents( 'php://input' );
		$this->statusCode = $statusCode;
		$this->body       = $body;
		$this->headers    = $headers;
	}

	// HTTP yanıtının durum kodunu döndüren metod
	public function getStatusCode() {
		return $this->statusCode;
	}

	// Yanıt gövdesini döndüren metod
	public function getBody() {

		return $this->body;
	}

	// Yanıt başlıklarını döndüren metod
	public function getHeaders() {
		return $this->headers;
	}

	public function all() {
		$this->all = $_POST;

		return $this->all;
	}

	public function get( $key = null ) {
		if ( $key ) {
			return $this->get[ $key ] ?? null;
		}

		return $this->get;
	}

	public function post( $key = null ) {
		if ( $key ) {
			return $this->post[ $key ] ?? null;
		}

		return $this->post;
	}

	public function input() {
		return $this->input;
	}

	public function file( $key ) {
		if ( $key ) {
			return $this->file[ $key ] ?? null;
		}

		return $this->file;
	}
}
