<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Models\SubsEmail;
use App\Models\SubsGroup;
use App\Models\MakeSubMail;
use App\Models\GroupInMail;

use App\Mail\SubsSent;


use Mail;

class SubsSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subs:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск рассылки';

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

        // SubsEmail::truncate();
        // SubsGroup::truncate();
        // MakeSubMail::truncate();
        // GroupInMail::truncate();
        
        // $makeSubMail = MakeSubMail::all();
        $makeSubMail = MakeSubMail::where('done', false)->get();
        // var_dump(MakeSubMail::all());
        foreach ($makeSubMail as $key => $value) {
            # code...
            var_dump($value->name);
            var_dump($value->subject);
            var_dump($value->text);

            foreach ($value->group_in_mails as $key2 => $value2) {
                var_dump( $value2->subs_group_id );
                
                $n = SubsGroup::find($value2->subs_group_id);

                if (isset($n->name)) {
                    # code...
                    var_dump( $n->name );
                }
                    // 'make_sub_mail_id',
                    // 'subs_group_id'
                    if (!empty($n->emails)) {
                        foreach ($n->emails as $key3 => $value3) {
                            var_dump($value3->email);

                            // Mail::to($value3->email)
                                // ->queue($n->text);
                                // ->cc($moreUsers)
                                // ->bcc($evenMoreUsers)
                                
                                // $contactEmail = $value3->email;

                                Mail::to('mltefive@gmail.com')->send(new SubsSent('$text'));

                                // Mail::raw('Текст письма', function ($message) {
                                //     $message->to('mltefive@gmail.com');
                                //     $message->subject('тест темы');

                                // });


                                // $contactName = $value3->email;

                        //  Mail::send(['text'=>'check_subs'], '$data', function($message) use ($contactEmail) {
                        //            $message->to($contactEmail, '')->subject('Заказ');
                        //            $message->from(env('MAIL_USERNAME', 'mcfzavod@gmail.com'),'Подписан?');
                        // });
                    }
                }
            }
        }
    }
}
