@extends('layouts.parent')
@section('title', 'Todo List')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Todo List</h3>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todo as $row)
                            @if ($row->status === 'in progress')
                            <tr class="table-warning">
                                @else
                            <tr class="table-success">
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->activity }}</td>
                                <td>{{ $row->status }}</td>
                                <td>{{ $row->deadline }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('todo.destroy', $row->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    @if ($row->status !== 'complete')
                                    <form action="{{ route('todo.update', $row->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success ms-2"><i class="bi bi-check-lg"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">No activity yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        <i class="bi bi-plus-lg"></i> Create Activity
                    </button>
                    @include('todo.create')

                </div>
            </div>

        </div>
    </div>
</section>
@endsection