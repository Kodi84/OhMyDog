@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() As $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif