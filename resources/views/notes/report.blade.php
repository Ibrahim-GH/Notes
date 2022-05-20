@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="row">

                <div class="link_page">


                    <div style="padding: 0px 150px; 0px;">
                        <h3>
                            It is Note Content: {{$note->content}}
                        </h3>
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


        .row {
            text-align: center;
        }
    </style>
@endsection
