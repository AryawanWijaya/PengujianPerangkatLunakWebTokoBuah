<?php

class Testing4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        $test_name = 'tes if else1';
        $this->unit->run($this->ifelse(null,null),'Something wrong. Please contact US',$test_name);
        
        $test_name = 'tes if else1_2';
        $this->unit->run($this->ifelse('aryawan',null),'aryawan',$test_name);

        $test_name = 'tes if else1_3';
        $this->unit->run($this->ifelse(null,'aryawan'),'aryawan',$test_name);

        $test_name = 'tes if else1_4';
        $this->unit->run($this->ifelse('aryawan','wijaya'),'aryawan',$test_name);

        $test_name = 'tes if else1_5';
        $this->unit->run($this->ifelse('aryawan'),'aryawan',$test_name);


        $test_name ='tes if else 2_1';
        $this->unit->run($this->ifelse2('andi'),'dia adalah teman saya',$test_name);

        $test_name ='tes if else 2_2';
        $this->unit->run($this->ifelse2('babi'),'dia bukan teman saya',$test_name);

        // $test_name ='tes if else 2_3';
        // $this->unit->run($this->ifelse2(),'dia bukan teman saya',$test_name);

        $test_name ='tes if else 3_1';
        $this->unit->run($this->ifelse3(null,null,null),'Something wrong. Please contact US',$test_name);

        $test_name ='tes if else 3_2';
        $this->unit->run($this->ifelse3(null,null,'wijaya'),'wijaya',$test_name);

        $test_name ='tes if else 3_3';
        $this->unit->run($this->ifelse3('aryawan',null,null),'aryawan',$test_name);

        $test_name ='tes if else 3_4';
        $this->unit->run($this->ifelse3(null,'ravato',null),'ravato',$test_name);

        $test_name ='tes if else 3_5';
        $this->unit->run($this->ifelse3('aryawan','ravato','wijaya'),'aryawan',$test_name);

        $test_name ='tes if else 3_6';
        $this->unit->run($this->ifelse3(null,'ravato','wijaya'),'ravato',$test_name);

        $test_name ='tes if else 3_7';
        $this->unit->run($this->ifelse3('aryawan',null,'wijaya'),'aryawan',$test_name);

        $test_name ='tes if else 3_8';
        $this->unit->run($this->ifelse3('aryawan','ravato',null),'aryawan',$test_name);

        // $test_name ='tes if else 3_9';
        // $this->unit->run($this->ifelse3('aaa'),'aaa',$test_name);

        $test_name ='tes if else 4_1';
        $this->unit->run($this->ifelse4('D'),'Have a nice Tuesday!',$test_name);

        $test_name ='tes if else 4_2';
        $this->unit->run($this->ifelse4(),'Have a nice Tuesday!',$test_name);

        $test_name ='tes if else 4_3';
        $this->unit->run($this->ifelse4('d'),'',$test_name);

        $test_name ='tes if else 4_4';
        $this->unit->run($this->ifelse4('TUE'),'',$test_name);

        $test_name ='tes if else 4_5';
        $this->unit->run($this->ifelse4(null),'',$test_name);

        $test_name ='tes loop 1';
        $this->unit->run($this->loop1(1),2048,$test_name);

        $test_name ='tes loop 1_2';
        $this->unit->run($this->loop1(null),null,$test_name);

        $test_name = 'tes loop 2_1';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        $test_name = 'tes loop 2_2';
        $arr =array(null);
        $this->unit->run($this->loop2($arr),0,$test_name);

        $test_name = 'tes loop 2_3';
        $arr = array(1,1,1,1,1);
        $this->unit->run($this->loop2($arr),3,$test_name);

        $test_name = 'tes loop 2_4';
        $arr = array();
        $this->unit->run($this->loop2($arr),0,$test_name);

        // $test_name = 'tes loop 2_5';
        // $this->unit->run($this->loop2(),0,$test_name);

        $test_name = 'tes loop 4';
        $this->unit->run($this->loop3(1),2048,$test_name);

        $test_name = 'tes loop 4_1';
        $this->unit->run($this->loop3(null),0,$test_name);
        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var;
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
