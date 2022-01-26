@extends('layouts.app')

@section('content')
    {{-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('users.create') }}">
                Create user
            </a>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header">Projects list</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Project Deadline</th>
                    <th>Project Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->deadline }}</td>
                        <td>{{ $project->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No projects yet.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $projects->withQueryString()->links() }}
        </div>
    </div>

@endsection