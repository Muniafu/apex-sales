<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <h1>Report</h1>
    <table>
        <thead>
            <tr>
                <th> Name </th>
                <th> Value </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportData as $data)
            <tr>
                <td> {{ $data->name }}</td>
                <td> {{ $data->value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if ($reportData->count() == 0)
        <p> Showing {{ $reportData->count() }} results </p>
    @else
        <p> No results found </p>
    @endif
</body>
</html>
