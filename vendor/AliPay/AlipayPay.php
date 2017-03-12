<?php
include_once 'AlipaySubmit.php';
include_once 'AlipayCore.php';
include_once 'AlipayMD5.php';
include_once 'AlipayNotify.php';
class AlipayPay {

    //�����������������������������������Ļ�����Ϣ������������������������������
    /**
     * @var String ���������id����2088��ͷ��16λ������
     */
    public $partner = '';

    /**
     * @var String �տ�֧�����˺�
     */
    public $seller_email = '';

    /**
     * @var String ��ȫ�����룬�����ֺ���ĸ��ɵ�32λ�ַ�
     */
    public $key = '';

    //�����������������������������������Ļ�����Ϣ������������������������������

    /**
     * @var String ǩ����ʽ �����޸�
     */
    public $sign_type = 'MD5';

    /**
     * @var String �ַ������ʽ Ŀǰ֧�� gbk �� utf-8
     */
    public $input_charset = 'utf-8';

    /**
     * @var String ca֤��·����ַ������curl��sslУ��
     * �뱣֤cacert.pem�ļ��ڵ�ǰ�ļ���Ŀ¼��
     */
    public $cacert = '\cacert.pem';

    /**
     * @var String ����ģʽ,�����Լ��ķ������Ƿ�֧��ssl���ʣ���֧����ѡ��https������֧����ѡ��http
     */
    public $transport = 'http';

    /**
     * @var String �������첽֪ͨҳ��·��
     * ��http://��ʽ������·�������ܼ�?id=123�����Զ������
     */
    public $notify_url = '';

    /**
     * @var String ҳ����תͬ��֪ͨҳ��·��
     * ��http://��ʽ������·�������ܼ�?id=123�����Զ������������д��http://localhost/
     */
    public $return_url = '';
    public $extra_common_param = '';

    /**
     * @name requestPay
     * @desc
     * @param $out_trade_no String �̻������ţ��̻���վ����ϵͳ��Ψһ�����ţ�����
     * @param $subject String ��������
     * @param $total_fee String ������
     * @param $body String ��������
     * @param $show_url String ��Ʒչʾ��ַ
     * @return String ��תHTML
     */
    public function requestPay($out_trade_no, $subject, $total_fee, $body, $show_url) {
        /*         * ************************�������************************* */
        //֧������
        $payment_type = "1";
        //��������޸�
        //������ʱ���
        $anti_phishing_key = "";
        //��Ҫʹ����������ļ�submit�е�query_timestamp����
        //�ͻ��˵�IP��ַ
        $exter_invoke_ip = "";
        //�Ǿ�����������IP��ַ���磺221.0.0.1

        /*         * ********************************************************* */

        //����Ҫ����Ĳ������飬����Ķ�
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => trim($this->partner),
            "seller_email" => trim($this->seller_email),
            "payment_type" => $payment_type,
            "notify_url" => $this->notify_url,
            "return_url" => $this->return_url,
            "out_trade_no" => $out_trade_no.time(),
            "subject" => $subject,
            "total_fee" => $total_fee,
            "body" => $body,
            "show_url" => $show_url,
            "extra_common_param" => $out_trade_no,
            "anti_phishing_key" => $anti_phishing_key,
            "exter_invoke_ip" => $exter_invoke_ip,
            "_input_charset" => trim(strtolower($this->input_charset))
        );

        //��������
        $alipaySubmit = new AlipaySubmit($this->bulidConfig());
        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "ȷ��");
        return $html_text;
    }

    public function verifyNotify() {
        $alipayNotify = new AlipayNotify($this->bulidConfig());
        $verify_result = $alipayNotify->verifyNotify();

        return $verify_result;
    }

    public function verifyReturn() {
        $alipayNotify = new AlipayNotify($this->bulidConfig());
        $verify_result = $alipayNotify->verifyReturn();

        return $verify_result;
    }

    private function bulidConfig() {
        //����Ҫ�������������
        $alipay_config = array(
            'partner' => $this->partner,
            'seller_email' => $this->seller_email,
            'key' => $this->key,
            'sign_type' => $this->sign_type,
            'input_charset' => $this->input_charset,
            'cacert' => $this->cacert,
            'transport' => $this->transport,
        );
        return $alipay_config;
    }

}