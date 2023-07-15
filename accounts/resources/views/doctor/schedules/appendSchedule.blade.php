<form method="POST" action="{{route('doctor.schedules.update',$schedule->id)}}" class="submit_form">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">@lang('site.Select_Day')</label>
                <select class="form-control" name="date">
                    @foreach(weeks() as $key => $day)
                    @php($selected = $schedule->date == $day ? 'selected' : '')
                    <option {{$selected}} value="{{$day}}" class="">{{ trans('site.'.$day) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6" id="pick-a-time">
            <div class="form-group">
                <label for="basicInput">@lang('site.Time_From')</label>
                <input type="text" value="{{$schedule->from}}" name="from" id="pt-default"
                    class="form-control pickatime required" placeholder="8:00 AM" />
            </div>
        </div>
        <div class="col-md-6" id="pick-a-time">
            <div class="form-group">
                <label for="basicInput">@lang('site.Time_To')</label>
                <input type="text" value="{{$schedule->to}}" name="to" id="pt-default"
                    class="form-control pickatime required" placeholder="8:00 AM" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">Status</label>
                <select class="form-control" name="status">
                    @foreach(sessionStatus() as $status)
                    @php($selected = $schedule->status == $status ? 'selected' : '')
                    <option {{$selected}} value="{{$status}}" class="text-capitalize">
                        {{$status}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">@lang('site.Schedule_Type')</label>
                <select class="form-control" name="schedule_type">
                    @php($selected = $schedule->schedule_type == 'online' ? 'selected' : '')
                    <option {{$selected}} value="online" class="text-capitalize">
                        @lang('site.Online')</option>
                    @php($selected = $schedule->schedule_type == 'ofline' ? 'selected' : '')
                    <option {{$selected}} value="ofline" class="text-capitalize">
                        @lang('site.Offline')</option>
                </select>
            </div>
        </div>
        @if($schedule->schedule_type == 'ofline')
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">@lang('site.Select_Clinic')</label>
                <select class="form-control " name="clinic_id">
                    @foreach($clinics as $itemm)
                    @php($selected = $schedule->clinic_id == $itemm->id ? 'selected' : '')
                    <option {{$selected}} value="{{$itemm->id}}" class="text-capitalize">
                        {{$itemm->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <button type="button" class="btn btn-primary submit_btn">
                @lang('site.submit')
            </button>
        </div>
    </div>

</form>
