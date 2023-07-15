@if($query->join_url)
{{-- <a href="{{$query->join_url}}" class="btn btn-success">Join</a> --}}
<a href="{{ route('join.session', $query->join_url) }}" class="btn btn-success">Start Session</a>
@endif
