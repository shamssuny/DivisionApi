@foreach($errors->all() as $error)
    <li class="alert-danger">{{ $error }}</li>
@endforeach
<br>