<?php


namespace Varandas\Crlib;


class Http
{
    public $authorization_token;
    protected $ch;
    private $_response_code;

    public function __construct($authorization_token)
    {
        $this->authorization_token = $authorization_token;
    }

    public function getResource($url, $fields = [])
    {
        if (empty($this->ch) || !function_exists('curl_reset')) {
            $this->ch = curl_init();
        } else {
            curl_reset($this->ch);
        }

        curl_setopt($this->ch, CURLOPT_URL, $url . '/?' . http_build_query($fields));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);
        $headers = [
            'Authorization: ' . 'Bearer ' . $this->authorization_token,
        ];

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        $body = curl_exec($this->ch);
        $this->_response_code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        if (curl_errno($this->ch)) {
            $msg = 'Unable to communicate with CR API (
                ' . curl_errno($this->ch) . '): ' . curl_error($this->ch) . '.';
            $this->_unsetHttpCall();
            CrlibClient::exception($msg);
        }

        if (!function_exists('curl_reset')) {
            $this->_unsetHttpCall();
        }
        if ($this->_response_code != 200) {
            CrlibClient::exception(
                'Something wen\'t wrong. We couldn\'t give you an 200 header back - '
                . $this->_response_code
            );
        }
        return $body;
    }

    /**
     * Clears Curl Handler
     *
     * @return void
     */
    private function _unsetHttpCall()
    {
        if (is_resource($this->ch)) {
            curl_close($this->ch);
            $this->ch = null;
        }
    }

    /**
     * Unset httpCall when disposed.
     */
    public function __destruct()
    {
        $this->_unsetHttpCall();
    }
}