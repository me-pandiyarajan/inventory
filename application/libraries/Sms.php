<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * SMS API wrapper (CodeIgniter Library)
 *
 * Sms's application programming interface (API) provides the communication link
 * between your application and Sms’s SMS Gateway.
 *
 * @author   Bo-Yi Wu <apppleboy.tw@gmail.com>
 * @license  http://www.opensource.org/licenses/bsd-license.php New BSD license
 * @link     https://github.com/appleboy/CodeIgniter-Sms-API
 * @date     2012-05-01
 */

class Sms {

    /*
     * API URL
     */
    const http_api_url          = 'http://www.smsintegra.com/smsweb/desktop_sms/desktopsms.asp';
    const http_api_url_balance  = 'http://www.smsintegra.com/smsweb/desktop_sms/chk_credit.asp';

    /**
     * Const for maximum items quantity count in request parameter
     */
    const maximum_ids_per_request = 100;

    /*
     * codeigniter instance
     */
    private $_ci;

    /**
     * Base curl settings
     */
    private $_http_status;
    private $_http_response;
    private $_format = 'text';
    protected $session;
    protected $options = array();
    protected $url;

    /**
     * Base config settings
     *
     * @var array $config
     */
    private $_config = array(
        'max_length' => 7
    );

    /**
     * initial api construct
     * return null
     */
    public function __construct($config = array())
    {
        if (count($config) > 0)
        {
            $this->initialize($config);
        }
        $this->_ci =& get_instance();
        $this->_ci->load->config('sms');
        $this->_config['api_username'] = $this->_ci->config->item("api_username");
        $this->_config['api_password'] = $this->_ci->config->item("api_password");
        $this->_config['api_senderid'] = $this->_ci->config->item("api_senderid");
    }

    /**
     * Initialize preferences
     *
     * @access  public
     * @param   array
     * @return  this
     */
    public function initialize($config = array())
    {
        foreach ($config as $key => $val)
        {
            $this->_config[$key] = $val;
        }

        return $this;
    }

    /**
     * Send text
     *
     * The send command is used to send the SMS message to a mobile phone,
     * or make a scheduled sending.
     *
     * @param string  $text       Text message's content
     * @param array   $phones     Phone numbers array
     * @param integer $send_time  Send time in UNIX timestamp
     *
     */
    public function send($text, $phones = array(), $send_time = false)
    {
        
        $phones = (is_array($phones)) ? implode(',', $phones) : $phones;
        $params = array(
            'uid'           => $this->_config['api_username'],
            'pwd'           => $this->_config['api_password'],
            'mobile'        => $phones,
            'sid'           => $this->_config['api_senderid'],
            'msg'           => $text
        );

        $url = self::http_api_url . ($params ? '?' . http_build_query( $params )  : '');
       
        $connection = curl_init($url);
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($connection);
        curl_close($connection);

        return $response;
    }

   
    /**
     * Get account balance
     *
     * This command is used to check the current SMS credits balance on your account.
     *
     * @return integer
     */
    public function get_balance()
    {
        $params = array(
            'uid'           => $this->_config['api_username'],
            'pwd'           => $this->_config['api_password']
        );

        $options = array(
            CURLOPT_POST => TRUE,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0
        );

        return $this->request('post', self::http_api_url_balance, $params, $options);
    }


    /**
     * request data
     * Connect to API URL
     *
     * @param array
     * return string
     */
    protected function request($method, $url, $params = array(), $options = array())
    {

        if ($method === 'get')
        {
            // If a URL is provided, create new session
            $this->create($url . ($params ? '?' . http_build_query( $params ) : ''));
        }
        else
        {
            $data = $params ? http_build_query( $params ) : '';
            $this->create($url);

            $options[CURLOPT_POSTFIELDS] = $data;

        }
        // TRUE to return the transfer as a string of the return value of curl_exec()
        // instead of outputting it out directly.
        $options[CURLOPT_RETURNTRANSFER] = TRUE;
        $this->options($options);

        return $this->execute();
    }

    protected function options($options = array())
    {
        // Set all options provided
        curl_setopt_array($this->session, $options);

        return $this;
    }

    protected function create($url)
    {
        $this->url = $url;

        $this->session = curl_init($this->url);
        return $this;
    }

    protected function execute()
    {
        // Execute the request & and hide all output
        $this->_http_response = curl_exec($this->session);
        $this->_http_status = curl_getinfo($this->session, CURLINFO_HTTP_CODE);

        curl_close($this->session);

        return $this->response();
    }

    /**
     *
     * set http format (json or xml)
     *
     * @param string
     * @return this
     */
    public function set_format($format = 'json')
    {
        if ($format != 'json' AND $format != 'xml' AND $format != 'text' )
            $format = 'json';

        $this->_format = $format;
        return $this;
    }

    /**
     *
     * get http response (json or xml or text)
     *
     * @return json or xml
     */
    protected function response()
    {
        switch($this->_format)
        {
            case 'xml':
            case 'text':
                $response_obj = $this->_http_response;
            break;
            case 'json':
            default:
                $response_obj = json_decode($this->_http_response);
        }

        return (string) $response_obj;
    }

    /**
     *
     * get http response status
     *
     * @return int
     */
    public function get_http_status()
    {
        return (int) $this->_http_status;
    }
}

/* End of file sms.php */
/* Location: ./application/libraries/sms.php */
 