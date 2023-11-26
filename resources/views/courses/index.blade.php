<x-body title="Courses">
    @if (!App\Models\User::isStudent())
        <div>
            <a href="{{ route('add.course') }}" class="btn btn-primary">Add Course</a>
        </div>
    @endif

    <table style="width:100%">
        <thead>
            <tr>
                <th>Course Title</th>
                <th>Course Code</th>
                <th>Semester</th>
                <th>Level</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($courses as $course)
                <tr data-course-url="/course/{{ $course->id }}">
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>{{ $course->level }} Level</td>
                    <td>{{ $course->unit }}</td>
                </tr>

            @empty
        </tbody>
    </table>
    <style>
        .open td,
        tr.open {
            background-color: green !important;
            font-weight: bold;
        }
    </style>

    <div class="p-2">No Course Added</div>
    @endforelse
</x-body>
<script>
    $(function() {
        $(document).on('click', 'tr[data-course-url]', function() {
            const open = $(this).hasClass('open');

            $('tr[data-course-url]').removeClass('open');
            if (open) {
                $(this).removeClass('open');
                window.location.href = $(this).attr('course-url');
            } else {
                $(this).addClass('open');
            }
        })
    });
</script>
