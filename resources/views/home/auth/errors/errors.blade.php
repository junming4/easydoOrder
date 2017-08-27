@if (count($errors) > 0)
   {{-- @foreach ($errors->all() as $error)--}}
        <div class="mid_ts" style="color: red;">{{ $errors->all()[0] }}</div>
   {{-- @endforeach--}}
@endif

@if(Session::has('success'))
    <div class="mid_ts">{{ Session::get('success') }}</div>
@endif