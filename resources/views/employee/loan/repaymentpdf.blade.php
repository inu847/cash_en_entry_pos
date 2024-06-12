<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loan Repayment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Loan Repayment</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-warning">
                    <th scope="col"></th>
                    <th scope="col">Loan Name</th>
                    <th scope="col">Payroll Number</th>
                    <th scope="col">Bussiness Name</th>
                    <th scope="col">Repayment Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Source</th>
                    <th scope="col">Is Paid</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $item->loan->loan_number }}</td>
                    <td>{{ $item->pay->payroll_number }}</td>
                    <td>{{ $item->bussiness->name }}</td>
                    <td>{{ $item->repayment_date }}</td>
                    <td>{{ repaymentStatusl($item->status) }}</td>
                    <td>{{ sourceRepayment($item->source) }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->is_paid }}</td>
                    <td>{{ $item->reason }}</td>
                    <td>{{ $item->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
