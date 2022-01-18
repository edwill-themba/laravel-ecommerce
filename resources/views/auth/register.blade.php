@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="register">
                <h3>enter your details on the form below</h3>
                <div class="row mt-4">
                    <div class="col-6 offset-3">
                         <form action="/register" method="POST">
                            @csrf
                             <div class="form-row">
                                 <i class="fas fa-pen icons"></i>
                                 <input type="text" name="name" class="input" placeholder="enter your full name">
                             </div>
                              <div class="form-row">
                                 <i class="fas fa-envelope icons"></i>
                                 <input type="email" name="email" class="input" placeholder="enter your full email">
                              </div>
                              <div class="form-row">
                                 <i class="fas fa-question icons"></i>
                                 <input type="text" name="query" class="input" placeholder="enter your query">
                              </div>
                              <div class="form-row">
                                <i class="fas fa-lock icons"></i>
                                <input type="password" name="password" class="input" placeholder="enter password">
                             </div>
                             <div class="form-row">
                                <i class="fas fa-lock icons"></i>
                                <input type="password" name="password_confirmation" class="input" placeholder="confrim password">
                             </div>
                             <div class="form-row">
                                <button type="submit" class="btn-register">register</button>   
                             </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection