@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{__('Client Details')}}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Contact Info</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Id: </dt>
                        <dd class="col-sm-8">{{ $client->id }}</dd>

                        <dt class="col-sm-4">Contact Name: </dt>
                        <dd class="col-sm-8">{{ $client->contact_name }}</dd>

                        <dt class="col-sm-4">Contact Email: </dt>
                        <dd class="col-sm-8">{{ $client->contact_email }}</dd>

                        <dt class="col-sm-4">Contact Phone Number: </dt>
                        <dd class="col-sm-8">{{ $client->contact_phone_number }}</dd>
                    </dl>

                    <h4>Company Info</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Company Name: </dt>
                        <dd class="col-sm-8">{{ $client->company_name }}</dd>

                        <dt class="col-sm-4">Company Address: </dt>
                        <dd class="col-sm-8">{{ $client->company_address }}</dd>

                        <dt class="col-sm-4">Company City: </dt>
                        <dd class="col-sm-8">{{ $client->company_city }}</dd>

                        <dt class="col-sm-4">Company Zip: </dt>
                        <dd class="col-sm-8">{{ $client->company_zip }}</dd>

                        <dt class="col-sm-4">Company Vat: </dt>
                        <dd class="col-sm-8">{{ $client->company_vat }}</dd>
                    </dl>
                </div>
        </div>
    </div>

@endsection