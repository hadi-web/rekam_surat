<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Nomor Surat</td>
        <td>Pengirim</td>
        <td>Tanggal Surat</td>
        <td>File</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($surat as $data)
        <tr>
            <td>{{ $data->nomor_surat }}</td>
            <td>{{ $data->pengirim }}</td>
            <td>{{ $data->tanggal_surat }}</td>
            <td>{{ $data->data_file }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>