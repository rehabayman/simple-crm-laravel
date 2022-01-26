@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{__('Terms & Conditions')}}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>{{__('You should agree to the terms and conditions to continue')}}</p>
                    <dl class="row">
                        <dt class="col-sm-4">1. </dt>
                        <dd class="col-sm-8">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </dd>

                        <dt class="col-sm-4">2. </dt>
                        <dd class="col-sm-8">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </dd>

                        <dt class="col-sm-4">3. </dt>
                        <dd class="col-sm-8">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </dd>

                        <dt class="col-sm-4">4. </dt>
                        <dd class="col-sm-8">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </dd>

                        <dt class="col-sm-4">5. </dt>
                        <dd class="col-sm-8">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </dd>
                    </dl>

                    <form action="{{route('terms.store')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            I Agree
                        </button>
                    </form>

                </div>
        </div>
    </div>

@endsection