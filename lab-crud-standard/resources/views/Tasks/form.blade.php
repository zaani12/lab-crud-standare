<form method="POST" class="container pt-2" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @if (isset($task))
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="name" class="form-label">Projet</label>
            <select name="projetId" id="projetId" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ request()->route('id')? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
            @error('projetId')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name"
                value="{{ old('name', isset($task) ? $task->name : '') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="Description">Description</label>
            <textarea name="description" id="inputDescription" class="form-control" oninput="setCustomValidity('')">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <input name="projetId" type="hidden" class="form-control" value="{{ $project->id }}"> --}}
    </div>
    <div class="card-footer">
        <a href="{{ route('tasks.index', $project->id) }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary mx-2">{{ isset($task) ? 'modifer ' : 'Ajouter' }}</button>
    </div>
</form>