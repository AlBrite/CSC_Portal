<x-body>

    <div class="row">
        <x-advisors-card :advisors="$advisors" :countCourses="$countCourses" />
    </div>




    <div class="row">





        <div class="col-4">

            <form method="POST" action="{{ route('add.academic_set') }}" class="card">
                @csrf
                <div class="card-header">
                    Add Academic Set
                </div>
                <div class="card-body">
                    Department:<br>
                    <div class="input-group">
                        <select name="department" class="form-control">
                            <option value="CSC">Computer Science</option>
                        </select>
                    </div>

                    @error('department')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                    <br>

                    @if ($unassignedAdvisors && count($unassignedAdvisors) > 0)

                        Course Advisor:<br>
                        <div class="input-group">
                            <select name="advisor_id" class="form-control">
                                <option>Choose</option>

                                @foreach ($unassignedAdvisors as $advisor)
                                    <option value="{{ $advisor->id }}">{{ $advisor->user->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    @endif


                    <div class="row">
                        <div class="col">
                            Start Year:<br>
                            <div class="input-group">

                                <select name="start_year" class="form-control">
                                    <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                </select>
                            </div>
                            @error('start_year')
                                <div style='color:red'>{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="col">
                            End Year:<br>
                            <div class="input-group">
                                <select name="end_year" class="form-control">
                                    @for ($year = 3; $year < 7; $year++)
                                        <option value="{{ $year + date('Y') }}" {{ $year === 5 ? 'selected' : '' }}>
                                            {{ $year + date('Y') }}
                                        </option>
                                    @endfor
                                </select>
                                @error('end_year')
                                    <div style='color:red'>{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Class</button>
                </div>

            </form>

        </div>
    </div>


</x-body>
