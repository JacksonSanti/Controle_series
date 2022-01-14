@if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            {{header('Refresh:1')}}
        </ul>
        </div>
@endif