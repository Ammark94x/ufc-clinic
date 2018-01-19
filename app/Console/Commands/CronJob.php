<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\NextVisits;
use App\User;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Messages to users a day before next visit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [];
        $visits = NextVisits::get();
        $today = date('m/d/Y');
        //return $today;
        foreach($visits as $value) {
            $newdate = strtotime ( '-1 day' , strtotime ( $value->date ) ) ;
            $newdate = date ( 'm/d/Y' , $newdate );
            if($today==$newdate) {
                $data[] = ['name'=>User::find($value->user_id)['name'],'mobile'=>User::find($value->user_id)['mobile']];
            }

            if(!empty($data)) {
                foreach($data as $val) {
                    $username = "923025557774";
                    $password = "1876";
                    $mobile = $val['mobile'];
                    $sender = "UFC";
                    $message = "Dear ".$val['name']."! You have an appointment of Tomorrow at Ultimate Fitness Cilinic. Thanks";
                    $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
                    $responce = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
        return "success";
    }
}
