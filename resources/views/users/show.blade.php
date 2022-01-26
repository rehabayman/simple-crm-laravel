@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{__('User Details')}}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>User Info</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Id: </dt>
                        <dd class="col-sm-8">{{ $user->id }}</dd>

                        <dt class="col-sm-4">Name: </dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>

                        <dt class="col-sm-4">Email: </dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4">Accepted Terms & Conditions?: </dt>
                        <dd class="col-sm-8">{{ $user->terms_accepted ? "Yes" : "No" }}</dd>
                    </dl>

                </div>
        </div>
    </div>

@endsection