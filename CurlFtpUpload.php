<?php
// vim: sw=4:ts=4:noet:sta:

class CurlFtpUpload extends CurlRequest {
	public $timeout = 30;

	public $isPassive = false;

	private $_fp;

	protected function beforeExec() {
		curl_setopt_array($this->ch, [
			CURLOPT_UPLOAD => true,
			CURLOPT_INFILE => $this->_fp,
		]);
		if (!$this->isPassive) {
			curl_setopt($this->ch, CURLOPT_FTPPORT, '-');
		}
	}

	public function upload($srcFilename) {
		$this->_fp = fopen($srcFilename, 'r');
		$result = $this->exec();
		fclose($this->_fp);
		return $result;
	}
}
