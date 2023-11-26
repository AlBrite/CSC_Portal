<x-body title="Add Course">

    <form class="form-300" action="{{ route('store.course') }}" method="POST" autocomplete="off">
        <div class="card">
            @csrf
            <div class="card-header">
                Add Course
            </div>
            <div class="card-body">

                <div class="form-group mb-4">
                    <label class="form-check-label small">
                        <input type="checkbox" name="addmorecourse" class="mr-1" checked> Stay on this page
                    </label>
                </div>

                <div class="text-muted">All the fields are required</div>


                @error('name')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Title</i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="eg: Database" />
                </div>

                @error('code')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Code</i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="code" value="{{ old('code') }}"
                        placeholder="eg: CIT 401" />
                </div>

                @error('semester')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Semester</i>
                        </div>
                    </div>
                    <select class="form-control" name="semester">
                        <option>---</option>
                        <option value="harmattan" {{ old('semester') === 'harmattan' ? ' selected' : '' }}>Harmattan
                        </option>
                        <option value="rain" {{ old('semester') === 'rain' ? ' selected' : '' }}>Rain</option>

                    </select>
                </div>

                @error('unit')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Unit</i>
                        </div>
                    </div>
                    @php
                        $selection = old('unit');
                    @endphp
                    <select class="form-control" name="unit">
                        <option>---</option>
                        @for ($i = 1; $i < 7; $i++)
                            <option value="{{ $i }}" {{ $selection == $i ? ' selected' : '' }}>
                                {{ $i }} unit{{ $i > 1 ? 's' : '' }}
                            </option>
                            </option>
                        @endfor
                    </select>
                </div>


                @error('level')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Level</i>
                        </div>
                    </div>
                    @php
                        
                        $levels = [100, 200, 300, 400, 500];
                        $selection = old('level');
                        
                    @endphp
                    <select class="form-control" name="level">
                        <option>---</option>

                        @foreach ($levels as $level)
                            <option value="{{ $level }}" {{ $selection == $level ? ' selected' : '' }}>
                                {{ $level }} Level</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="small">Option</i>
                        </div>
                    </div>
                    @php
                        $selection = old('mandatory');
                        
                    @endphp
                    <select class="form-control" name="mandatory">
                        <option value="1" {{ $selection && $selection == 1 ? ' selected' : '' }}>Mandatory
                        </option>
                        <option value="0" {{ $selection && $selection == 0 ? ' selected' : '' }}>Elective</option>
                    </select>
                </div>



                <div class="form-group mb-3">
                    <label class="form-check-label">
                        <input type="checkbox" name="check" required="required">
                        I accept that all the fields are field correctly
                        @error('check')
                            <div class="text-danger small">
                                <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                            </div>
                        @enderror
                    </label>
                </div>
                @error('check')
                    <div class="text-danger small">
                        <i class="fas fa-exclamation-triangle text-danger"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="card-footer">
                <div class="input-group">

                    <button type="submit" class="form-control btn btn-primary">Submit Course</button>
                </div>
            </div>
        </div>
    </form>

</x-body>
