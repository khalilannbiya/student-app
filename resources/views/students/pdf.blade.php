<!DOCTYPE html>
<html>

<head>
    <title>Users PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11pt;
        }

        h1 {
            font-size: 14pt;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #eee;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Data Students</h1>
    <table>
        <thead>
            <tr>
                <th style="width:250px">Name</th>
                <th>Photo</th>
                <th>Class</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td style="line-height: 1.3">{{ $student->name }}</td>
                <td>
                    <img width="80" src="{{ asset('storage/' . $student->photo) }}" alt="Photo by {{ $student->name }}">
                </td>
                <td>{{ $student->studentClass->name }}</td>
                <td>{{ $student->phone_number }}</td>
                <td>
                    <address>
                        {{ $student->address }}
                    </address>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>