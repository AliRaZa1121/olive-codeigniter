<?php
/**
 * Payoneer API integration
 *
 * @date 27/11/12
 * @name $payoneer
 * @author Panagiotis Moustafellos
 */
class Payoneer
{
	public $url = 'https://api.payoneer.com/Payouts/HttpApi/API.aspx?';
	public $partner_username = 'RevoluzaEURO9990'; // partner username
	public $partner_password = ''; // partner password
	public $program_id = ''; // program id
	public $partner_id = ''; // partner id

	/**
	 * @description Get signup tokenized link
	 * @param string $payee_id
	 * @param string $session_id
	 * @param string $redirect_url
	 * @param string $card_type Mastercard is default
	 * @param int $delay seconds to wait before redirect
	 * @return string the token url for payee signup
	 */
	public function getSignupLink($payee_id, $session_id, $redirect_url, $card_type = "MC", $delay = 1)
	{
		$mname = 'GetToken';
		$data = array();
		$data['p1'] = $this->partner_username;
		$data['p2'] = $this->partner_password;
		$data['p3'] = $this->partner_id;
		$data['p4'] = $payee_id;
		/*$data['p5'] = $session_id;
		$data['p6'] = urlencode($redirect_url);
		$data['p7'] = $card_type;
		$data['p8'] = $delay;*/
		$signup_link = $this->Request($mname, $data);
		return $signup_link;
	}
	/**
	 * System Status
	 *
	 * @description Gets Payoneer system status
	 * @return boolean
	 */
	public function SystemStatus()
	{
		$mname = 'Echo';
		$data = array();
		$data['p1'] = $this->partner_username;
		$data['p2'] = $this->partner_password;
		$data['p3'] = $this->partner_id;
		$data['p4'] = $this->program_id;
		$request = $this->Request($mname, $data);
		$xml = new SimpleXMLElement($request);
		$status = $xml->Status;
		if ($status == '000') {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Performs curl request to Payoneer
	 *
	 * @param string $mname Payoneer action
	 * @param array $data action parameters
	 * @return string
	 */
	private function Request($mname, $data = array())
	{
		$url = $this->url . 'mname=' . $mname;
		foreach ($data as $key => $value) {
			$url = $url . '&' . $key . '=' . $value;
		}
		$this->url = $url;
		$content = Yii::app()->curl->get($url);
		return $content;
	}
	/**
	 * Performs Payout
	 *
	 * @param string $payee_id the payee internal id or email
	 * @param float $amount amount to be payed
	 * @param string $statement_id unique alphanumeric (revoluza payout statement)
	 * @param string $description payment description
	 * @return mixed returns transaction id if successful, false if failure
	 */
	public function Pay($payee_id, $amount, $statement_id, $description)
	{
		$mname = 'PerformPayoutPayment';
		$data = array();
		$data['p1'] = $this->partner_username;
		$data['p2'] = $this->partner_password;
		$data['p3'] = $this->partner_id;
		$data['p4'] = $this->program_id;
		$data['p5'] = urlencode($statement_id);
		$data['p6'] = urlencode($payee_id);
		$data['p7'] = $amount;
		$data['p8'] = urlencode($description);
		$data['p9'] = urlencode(date('m/d/Y H:m:s'));
		$result = $this->Request($mname, $data);
		$xml = new SimpleXMLElement($result);
		if ($xml->Status == "000") {
			return $xml->PaymentID;
		} else {
			echo $xml->Status;
			echo $xml->Description;
			return false;
		}
	}
	/**
	 * Payoneer ICPN - Payee registration notification
	 *
	 * @param string $status
	 * @param string $payee_id
	 * @param string $payoneer_id
	 * @param string $session_id
	 */
	public function RecordPayee($status, $payee_id, $payoneer_id, $session_id = null)
	{
	}
	/**
	 * Payoneer ICPN - Payment recording
	 *
	 * @param string $status
	 * @param string $payee_id
	 * @param float $amount
	 * @param string $payment_id
	 * @param string $partner_payment_id Revoluza Comission Statement ID
	 */
	public function RecordPayment($status, $payee_id, $amount, $payment_id, $partner_payment_id = null)
	{
	}
}

?>