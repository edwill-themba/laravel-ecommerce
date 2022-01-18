@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="login">
            <h3>enter email and query when you register</h3>
            <div class="row mt-4">
                <div class="col-6 offset-3">
                    <form action="{{route('forgot_password.user')}}" method="POST">
                         @csrf
                          <div class="form-row">
                             <i class="fas fa-envelope icons"></i>
                             <input type="email" name="email" class="input" placeholder="enter your full email">
                          </div>
                          <div class="form-row">
                            <i class="fas fa-question icons"></i>
                            <input type="text" name="query" class="input" placeholder="enter your user query">
                         </div>
                         <div class="form-row">
                            <button type="submit" class="btn-login">submit</button>   
                         </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection