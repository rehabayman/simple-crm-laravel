@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('users.create') }}">
                Create user
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Users list</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="d-flex justify-content-end">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="form-group d-flex flex-row" style="width: 200px; height: 40px;">
                        <label for="with_deleted" class="col-form-label" style="width: 50%;">Show deleted:</label>
                        <select class="form-control" style="width: 25%;" name="with_deleted" id="with_deleted" onchange="this.form.submit()">
                            <option value="false" {{ request('with_deleted') == 'false' ? 'selected' : '' }}>No</option>
                            <option value="true" {{ request('with_deleted') == 'true' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </form>
            </div>
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @can('manage users')
                                @if (auth()->user()->id != $user->id)
                                @if (!$user->deleted_at)
                                    <a class="btn btn-xs btn-info" href="{{ route('users.show', $user) }}">
                                        Show
                                    </a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('users.edit', $user) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @else
                                    <form action="{{ route('users.restore', $user->id) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-secondary" value="Restore">
                                    </form>
                                @endif
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $users->withQueryString()->links() }}
        </div>
    </div>

@endsection