@extends('generic')

@section('title','Game On')

@section('content')
    <div ng-controller="GameController">


        <div class="row">
        <div class="12u">
        <div class="box special">
        <div id="countdown">
            <svg>
                <circle r="18" cx="20" cy="20" fill="#aeaeae"></circle>
                <div id="countdown-number">@{{latest}}</div>
              </svg>              
        </div>
            <div class="d-flex flex-wrap only-wide">
                <div class="p-1" ng-repeat="n in [].constructor(90) track by $index">
                    <div class="p-1 border rounded border-grey" ng-class="(isNumbersCalled($index+1))?'bg-warning':'bg-light'">@{{("0"+($index+1)).slice(-2)}}</div>
                </div>
            </div>
            </div>
        </div>
        </div>   
   
        <div class="row">
            <div class="6u 12u(narrow)">
                <div class="box special">
                    <table class="border-primary border-left" style="background-image:('https://pngtree.com/free-backgrounds-photos/table');">
                        <tr>
                            <td>02</td>
                            <td>24</td>
                            <td> </td>
                            <td> </td>
                            <td>09</td>
                            <td><span class="p-1 border rounded">24</span></td>
                            <td> </td>
                            <td> </td>
                            <td>09</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>14</td>
                            <td>34</td>
                            <td> </td>
                            <td></td>
                            <td>89</td>
                            <td> </td>
                            <td>22</td>
                            <td>90</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="6u 12u(narrow)">
                <div class="box special"></div>
            </div>
        </div>
        <ul style="display:none;">
            <li ng-repeat="item in winningNumbers">@{{item}}</li>
        </ul>
    </div>
@endsection