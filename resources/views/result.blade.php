@extends('layouts.app')
@section('content')
    <div class="container">
        <table style="width: 50%" align="center">
            <tr>
                <td style="text-align:center">{{$batchResult}} % Processed</td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <table style="width: 100%">
                        <tr style="background-color:gray">
                            <td style="@if($batchResult>=10)background-color:green;@endif width: 10%;">&nbsp;</td>
                            <td style="@if($batchResult>=20)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=30)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=40)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=50)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=60)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=70)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=80)background-color:green;@endif width: 10%">&nbsp;</td>
                            <td style="@if($batchResult>=90)background-color:green;@endif width: 7%">&nbsp;</td>
                            <td style="@if($batchResult==100)background-color:green;@endif width: 3%">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align:center"><a href="/user_area/import"><button type="button" class="btn btn-success">Go Back</button></a></td>
            </tr>
        </table>
    </div>
@endsection
