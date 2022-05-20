@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="row">

                <div class="link_page">

                    <h2> Report For Notes Count By Type </h2>

                    <div>
                        <h5>Notes Count With Type Urgent is : [ <i>{{  $countType[0]}}</i> ]</h5>
                    </div>

                    <div>
                        <h5>Notes Count With Type Normal is : [ <i>{{ $countType[1]}}</i> ]</h5>
                    </div>

                    <div>
                        <h5>Notes Count With Type Date is : [ <i>{{$countType[2]}}</i> ]</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        i {
            color: red;
            font-size: 25px;
            /*margin-right: -20px;*/
        }
.link_page h5{
    margin-top: -14px;
    background: #ecbef0;
    margin-left: 400px;
    width: 300px;
}
        .link_page h2 {
            text-align: center;
            color: blue;
            margin-top: 25px;
        }

        .link_page div {
            text-align: center;
            color: darkgreen;
            margin-top: 25px;
        }

        .row {
            text-align: center;
        }
    </style>
@endsection
