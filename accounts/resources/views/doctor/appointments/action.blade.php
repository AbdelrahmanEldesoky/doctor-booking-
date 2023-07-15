<div class="d-flex">

    <a href="{{ route('doctor.appointments.show', $query->id) }}" class="btn btn-sm btn-primary mr-1 h-100">
        <i class="fa fa-eye"></i>
    </a>

    <a href="{{ route('doctor.appointments.email', $query->id) }}"
        class="h-100 mr-1 btn btn-sm btn-info send_mail_client">
        <i class="fa fa-envelope"></i>
    </a>



    @if ($query->status == 'canceled' || $query->status == 'closed' || $query->status == 'waiting_for_rating')
        <a class="btn btn-sm btn-dark mr-1 h-100 disabled text-capitalize">{{  str_replace('_', ' ', $query->status)  }}</a>
    @else
    <a href="{{ route('doctor.appointments.cancel', $query->id) }}"
        class="btn btn-sm btn-danger delete-btn mr-1 h-100">Cancel</a>

        <a style=" white-space: nowrap;" href="{{ route('doctor.appointments.close', $query->id) }}" class="btn btn-sm btn-success mr-1"
            onclick="return confirm('Are you sure you want to close this appointment? If YES click OK!')">
            @lang('site.done')
        </a>

        @if($query->type == 'online' && $query->payment_status != 'unpaid')
            <a href="{{ route('doctor.create.meeting', [$query->id, $query->doctor_id]) }}" class="btn btn-sm btn-info "
                style=" white-space: nowrap;">
                Start Session
            </a>
        @endif

    @endif

</div>
