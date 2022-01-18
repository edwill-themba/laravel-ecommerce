@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="login">
            <h3>enter new password</h3>
            <div class="row mt-4">
                <div class="col-6 offset-3">
                    <form action="{{ route('update_password.user')}}" method="POST">
                         @csrf
                          <input type="hidden" name="_method" value="PATCH">
                          <input type="hidden" name="user_id" value="{{ $user_id }}">
                          <div class="form-row">
                             <i class="fas fa-lock icons"></i>
                             <input type="password" name="password" class="input" placeholder="enter your new password">
                          </div>
                          <div class="form-row">
                            <button type="submit" class="btn btn-primary">submit</button>   
                         </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div> 
@endsection