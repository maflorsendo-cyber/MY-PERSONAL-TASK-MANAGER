@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <!-- Welcome Banner -->
    <div class="p-4 p-md-5 rounded-4 text-white mb-5 position-relative overflow-hidden shadow-sm" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="position-relative z-1">
            <span class="badge bg-white bg-opacity-10 text-info px-3 py-1.5 rounded-pill fw-semibold small mb-2">CONTROL CENTER</span>
            <h1 class="fw-bold display-6 mb-2">Manage your tasks with precision.</h1>
            <p class="text-white-50 mb-4 max-w-sm">Track your progress, finish your goals, and stay organized effortlessly.</p>
            <a href="{{ url('/tasks/create') }}" class="btn btn-light px-4 py-2.5 rounded-pill fw-bold text-dark shadow-sm">
                <i class="bi bi-plus-lg me-2"></i> Create Task Now
            </a>
        </div>
    </div>

    <!-- Task List Section -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">Task Directory</h4>
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                {{ count($tasks ?? []) }} Total Tasks
            </span>
        </div>

        @if(isset($tasks) && count($tasks) > 0)
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light text-uppercase fs-7 text-muted">
                        <tr>
                            <th class="py-3 rounded-start">Task Details</th>
                            <th class="py-3">Due Date</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td class="py-3">
                                <div class="fw-bold text-dark">{{ $task->task_name }}</div>
                                <div class="text-muted small text-truncate" style="max-width: 300px;">{{ $task->description }}</div>
                            </td>
                            <td>
                                <span class="text-secondary small fw-semibold"><i class="bi bi-clock me-1"></i> {{ $task->due_date ?? 'No due date' }}</span>
                            </td>
                            <td>
                                @if($task->status == 'Completed')
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-1.5 rounded-pill">Completed</span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1.5 rounded-pill">Pending</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn btn-sm btn-light border text-primary me-1 rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ url('/tasks/' . $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light border text-danger rounded-2" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <div class="bg-light d-inline-block p-4 rounded-circle text-muted mb-3">
                    <i class="bi bi-clipboard-x fs-1"></i>
                </div>
                <h5 class="fw-bold text-dark">No tasks found</h5>
                <p class="text-muted small mb-4">Your task list is currently empty. Start adding your goals!</p>
                <a href="{{ url('/tasks/create') }}" class="btn btn-dark px-4 py-2 rounded-pill fw-semibold shadow-sm">
                    Add Your First Task
                </a>
            </div>
        @endif
    </div>

</div>
@endsection