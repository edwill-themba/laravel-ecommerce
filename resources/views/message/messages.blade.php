@if (count($errors) > 0)
  <ul>
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger mt-5">
          <li>{{ $error }}</li>
        </div>   
      @endforeach
  </ul>  
@endif

@if(session()->has('success_message'))
    <div class="alert alert-success mt-5">
        {{ session()->get('success_message') }}
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger mt-5">
        {{ session()->get('error_message') }}
    </div>
@endif