<?php namespace App\Http\ViewComposers;

use Illuminate\View\View;

class MemberComposer
{
    public function compose(View $view)
    {
        $ranks = [
            '' => '- Select A Rank-',
            'Assistant Chief' => 'Assistant Chief',
            'Auxillary' => 'Auxillary',
            'Battalion Chief' => 'Battalion Chief',
            'Cadet' => 'Cadet',
            'Captain' => 'Captain',
            'Chief' => 'Chief',
            'Firefighter' => 'Firefighter',
            'Lieutenant' => 'Lieutenant',
            'Medical Officer' => 'Medical Officer',
            'Probationary Firefighter' => 'Probationary Firefighter',
            'Recruit' => 'Recruit',
            'Safety Officer' => 'Safety Officer'
        ];
        
        $carriers = [
            '' => '- Select A Carrier -',
            'message.alltel.com' => 'Alltel',
            'vtext.com' => "Amp'Mobile",
            'txt.att.net' => 'AT&T',
            'myboostmobile.com' => 'Boost Mobile',
            'mms.mycricket.com' => 'Cricket',
            'messaging.nextel.com' => 'Nextel',
            'messaging.sprintpcs.com' => 'Sprint',
            'tmomail.net' => "T'Mobile",
            'email.uscc.net' => 'US Cellular',
            'vtext.com' => 'Verizon',
            'vmobl.com' => 'Virgin Mobile',
        ];

        $view->with('ranks', $ranks);
        $view->with('carriers', $carriers);
    }
}
