@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        label #btn,label #cancel{
        top: 0;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 70%;
            }

        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <table style="margin-top: 80px;">
        <tr>
            <th>Task Name</th>
            <th>Assignee</th>
            <th>Due Date</th>
        </tr>
        <tr>
            <td colspan="3">To-Do</td>
        </tr>
        <tr>
            <td>Module</td>
            <td>Name</td>
            <td>Date</td>
        </tr>
        <tr>
            <td>Module</td>
            <td>Name</td>
            <td>Date</td>
        </tr>
        <tr>
            <td colspan="3">In Progress</td>
        </tr>
        <tr>
            <td>Module</td>
            <td>Name</td>
            <td>Date</td>
        </tr>
        <tr>
            <td>Module</td>
            <td>Name</td>
            <td>Date</td>
        </tr>
        <tr>
            <td colspan="3">Completed</td>
        </tr>
    </table>
</body>
</html>
