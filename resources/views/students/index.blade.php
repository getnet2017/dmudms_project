<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
    <!-- Make sure this is the correct relative path -->

</head>

<body>
    <h1>Students List</h1>
    <a href="{{ route('students.create') }}">Create New Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Citizenship</th>
                <th>Disability Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ ucfirst($student->gender) }}</td>
                <td>{{ ucfirst($student->status) }}</td>
                <td>{{ $student->citizenship ?? 'N/A' }}</td>
                <td>{{ $student->disability_status ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}">View</a> |
                    <a href="{{ route('students.edit', $student->id) }}">Edit</a> |
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>