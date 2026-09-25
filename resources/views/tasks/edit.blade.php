@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 700px;">
    
    <!-- Navigation Back Link -->
    <div class="mb-4">
        <a href="{{ url('/tasks') }}" class="text-decoration-none text-muted fw-semibold d-inline-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <!-- Edit Task Card -->
    <div class="card border-0 shadow-lg rounded-4 bg-white overflow-hidden">
        <div class="p-4 p-md-5 text-white" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-25 p-3 rounded-4">
                    <i class="bi bi-pencil-square fs-3"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-1">Edit Task</h3>
                    <p class="text-white-50 small mb-0">Modify the details of your selected task.</p>
                </div>
            </div>
        </div>

        <div class="p-4 p-md-5">
            <form action="{{ url('/tasks/' . $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Task Name -->
                <div class="mb-4">
                    <label for="task_name" class="form-label fw-bold text-dark small text-uppercase">Task Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted"><i class="bi bi-bookmark"></i></span>
                        <input type="text" class="form-control bg-light border-start-0 py-2.5 @error('task_name') is-invalid @enderror" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}" required>
                    </div>
                    @error('task_name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-bold text-dark small text-uppercase">Description</label>
                    <textarea class="form-control bg-light py-2.5" id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
                </div>

                <!-- Status Selection -->
                <div class="mb-4">
                    <label for="status" class="form-label fw-bold text-dark small text-uppercase">Task Status</label>
                    <select class="form-select bg-light py-2.5" id="status" name="status">
                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending (In Progress)</option>
                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- Due Date -->
                <div class="mb-4">
                    <label for="due_date" class="form-label fw-bold text-dark small text-uppercase">Due Date</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" class="form-control bg-light border-start-0 py-2.5" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ url('/tasks') }}" class="btn btn-light px-4 rounded-pill fw-semibold text-secondary">Cancel</a>
                    <button type="submit" class="btn text-white px-5 rounded-pill fw-bold shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection