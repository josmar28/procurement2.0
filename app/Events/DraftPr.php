<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\ProcureMain;

class DraftPr implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $data;

     
    public function __construct($data)
    {
        $this->data = ProcureMain::select('procure_main.*','office.office as office','procurement_mode.mode as mode','procure_status.status as status','category.category as category',
        'procure_type.type as procure_type','requested_by.name as req_name','approved_by.name as app_name','cert_by1.name as cert1_name','cert_by2.name as cert2_name')
        ->leftJoin('office','procure_main.L1_office','=','office.id')
        ->leftJoin('procurement_mode','procure_main.L1_modeproc','=','procurement_mode.id')
        ->leftJoin('procure_status','procure_main.L1_status','=','procure_status.id')
        ->leftJoin('category','procure_main.L1_typeproc','=','category.category_id')
        ->leftJoin('procure_type','procure_main.type_procure','=','procure_type.id')
        ->leftJoin('signatories as requested_by','procure_main.requested_by','=','requested_by.id')
        ->leftJoin('signatories as approved_by','procure_main.approved_by','=','approved_by.id')
        ->leftJoin('signatories as cert_by1','procure_main.cert_by1','=','cert_by1.id')
        ->leftJoin('signatories as cert_by2','procure_main.cert_by2','=','cert_by2.id')
        ->where('procure_main.L1_status','3')
        ->where('procure_main.void',1)
        ->orderby('procure_main.id','desc')
        ->where('procure_main.id',$data)
        ->first();

    }

    public function broadcastAs()
    {
        return 'draftpr_event';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('draftpr_channel');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->data->id,
            'status' => $this->data->status,
            'office' => $this->data->office,
            'L1_title' => $this->data->L1_title,
            'procure_type' => $this->data->procure_type,
            'L1_trackno' => $this->data->L1_trackno,
            'category' => $this->data->category,
            'mode' => $this->data->mode,
            'date_received_pr' => $this->data->date_received_pr,
            'date_forwarded_enduser' => $this->data->date_forwarded_enduser,
            'req_name' => $this->data->req_name,
            'app_name' => $this->data->app_name,
            'cert1_name' => $this->data->cert1_name,
            'cert2_name' => $this->data->cert2_name
        ];
    }
}
