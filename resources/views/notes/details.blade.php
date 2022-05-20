@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="row">

                <div class="link_page">


                    <div style="padding: 0px 150px; 0px;">
                        <h2>
                            It is Note Content: {{$note->content}}
                        </h2>
                    </div>
                    <br/>

                    <div style="text-align: center;">
                        <h3>It is Note: Type: {{ $type}}</h3>
                    </div>
                    <br/>

                    <div style="text-align: center;">
                        <h3>It is Note Photo:</h3>
                        <img style="width: 200px; height: 200px;" src="{{asset($note->image)}}">

                    </div>
                    <br/>

                    <br/>

                </div>
            </div>
        </div>
    </div>
    <style>
        h3{
            margin-top: -14px;
            background: #ecbef0;
            margin-left: 450px;
            width: 250px;
        }

        h2{
            margin-top: -14px;
            background: #ecbef0;
            margin-left: 300px;
            width: 250px;
        }

        .row {
            text-align: center;
        }
    </style>
@endsection
