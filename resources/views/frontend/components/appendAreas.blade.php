@if($areas->count() > 0)
    <option value="">@lang('site.all_areas')</option>
    @foreach($areas as $city)
        @php($selected = $city->name == $custom_city ? 'selected' : '')
        <option {{$selected}} value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
@else
    <option value="">Select Area</option>
@endif
