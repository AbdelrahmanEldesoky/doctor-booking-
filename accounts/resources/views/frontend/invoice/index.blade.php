<!DOCTYPE html>
<html>

<head>
    <style>
        body,
        html {
            color: #000;
            font-family: "Graphik Arabic Web Medium";
            font-weight: 500;
            font-style: normal;
            font-stretch: normal;
        }

        .container {
            min-height: 100vh;
            padding-top: 50px;
            max-width: 1140px;
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto;
        }

        .w-100 {
            width: 100%;
        }


        .text-bold {
            font-weight: bold;
            font-size: 20px;
        }

        .row {
            width: 100%;
            width: 100%;
            /* display: flex; */
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.5);
            margin-left: calc(var(--bs-gutter-x) * -.5);
            /* --bs-gutter-x: 3rem; */
        }

        .col-lg-4 {
            width: 30%;
            float: right;
        }

        .col-lg-8 {
            width: 70%;
            float: left;
        }

        h1 {
            font-size: 2.5rem;
        }

        .text-success {
            color: #198754 !important;
        }

        .col-md-6,
        .col-lg-6 {
            width: 50%;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .table>tbody {
            vertical-align: inherit;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .table> :not(caption)>*>* {
            padding: .5rem .5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-bottom-width: 0px;
        }

        .table {
            text-align: center;
        }

        .custom_table {
            text-align: left;
        }

        .custom_table th,
        .custom_table td {
            padding: 0px;

            border-bottom-width: 0px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        th {
            font-size: 20px;
        }

        .col-lg-12 {
            width: 100%;
        }

        td {
            font-weight: lighter;
            font-size: 17px;
        }

    </style>
</head>

<body>
    <div class="container " style="min-height: 100vh;padding-top:50px">
        <div class="box w-100 ">
            <div class="row g-5 text-success">
                <div class="col-lg-8 d-flex mt-20" style="align-items:center">
                    <h1>{{$date}} Invoice Detail</h1>
                </div>
                <div class="col-lg-4">
                    <img alt="Ipersona" class="mx-2 logo-main w-100" src="https://ipersona.me/logo_main.png">
                </div>
            </div>
            <div style="clear:both"></div>
            <div class="row mt-20">
                <div class="col-lg-6 " style="text-align:left;float:left">
                    <table class="table custom_table mt-20">
                        <tr>
                            <th>Doctor Name:</th>
                            <td>{{$doc->name}}</td>
                        </tr>
                        <tr>
                            <th>Doctor Email:</th>
                            <td>{{$doc->email}}</td>
                        </tr>
                        <tr>
                            <th>Referance Id:</th>
                            <td>Doc-{{$doc->id}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6 " style="float:right;text-align:right">
                    <p>
                        <span class="text-bold">Invoice Date</span>
                        <br>
                        <span>{{$date}}</span>
                    </p>
                </div>
            </div>
            <div style="clear:both"></div>
            <div class="">
                <div style="border-bottom: 1px solid black;
height: 50px;
border-top: 2px solid black;"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:15%">Patient</th>
                                <th style="width:15%">Date</th>
                                <th style="width:15%">Patient Paid</th>
                                <th style="width:15%">Doctor Percentage</th>
                                <th style="width:15%">Doctor Amount </th>
                                <th style="width:15%">Tax %</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach($reports as $rep)
                            <tr>
                                <td>{{$rep->patient->name}}</td>
                                <td>{{customDate($rep->appointment->from,'M ,d y')}}</td>
                                <td>{{$rep->session_amount}}</td>
                                @php($percen = getPersentage($rep,$doc))
                                <td>{{$percen}}</td>
                                @php($amount = ($percen * $rep->session_amount)/100)
                                <!-- <td>{{$amount}}</td> -->
                                @php($total = $total + ($amount - (($amount * 14 )/100)))
                                <td>{{$amount - (($amount * 14 )/100)}}</td>
                                <td>14%</td>
                            </tr>
                            @endforeach


                        </tbody>

                    </table>

                   <div style="width: 100%;
text-align: right;
margin-top: 30px;">
                      Total Amount : {{$total}}
                   </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
