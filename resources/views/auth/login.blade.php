@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
                <h3>enter valid credentials for login</h3>
                <div class="row mt-4">
                    <div class="col-6 offset-3">
                         <form action="{{route('login.user')}}" method="POST">
                             @csrf
                              <div class="form-row">
                                 <i class="fas fa-envelope icons"></i>
                                 <input type="email" name="email" class="input" placeholder="enter your full email">
                              </div>
                              <div class="form-row">
                                <i class="fas fa-lock icons"></i>
                                <input type="password" name="password" class="input" placeholder="enter password">
                             </div>
                             <div class="form-row">
                                <button type="submit" class="btn-login">login</button>   
                             </div>
                         </form>
                         <div class="form-row">
                           <a href="{{route('forgot_password.view')}}" class="btn btn-default">Forgot Password?</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection