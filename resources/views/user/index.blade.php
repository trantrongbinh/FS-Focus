@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset(mix('css/profile.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/doughnut-chart.css')) }}">
@endsection
@section('content')
<div class="user-profile">
    <div class="profile-header-background" style="height: 180px;">
    </div>
    <div class="container center-content__width mt-4 mb-4">
        <div class="row">
            @include('user.particals.info')
            <div class="col-md-8" style="top: -90px;">
                <div class="row" style="position: relative; min-height: 280px;">
                    <div class="col-sm-6 text-center">
                        <div class="profile__detail-stats">
                            <ul>
                                <li><span class="badge badge-secondary">164</span> posts</li>
                                <li><span class="badge badge-secondary">188</span> followers</li>
                                <li><span class="badge badge-secondary">206</span> following</li>
                            </ul>
                        </div>
                        <div class="tag--v0">
                            <span>Chu de</span>
                            <ul>
                                <li><a href="#">Tinh Yeu</a></li>
                                <li><a href="#">Khoa Hoc Cong Nghe</a></li>
                                <li><a href="#">Giao Duc</a></li>
                                <li><a href="#">Lap Trinh</a></li>
                                <li><a href="#">Giai Tri</a></li>
                                <li><a href="#">Van Hoa</a></li>
                            </ul>
                        </div>
                        <div class="panel-thumbnails">
                            <span>Congty/Tochuc</span>
                            <div class="">
                                <a href="">
                                    <img src="https://avatars.githubusercontent.com/u/1000665?v=3" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                                <a href="">
                                    <img src="https://avatars2.githubusercontent.com/u/37802322?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                                <a href="">
                                    <img src="https://avatars3.githubusercontent.com/u/37947030?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div style="position: relative">
                            <div id="doughnutChart" class="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile-info-right">
                            <profile></profile>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb__100"></div>
@endsection
@section('scripts')
<script>
$(function() {
    $("#doughnutChart").drawDoughnutChart([
        { title: "Tokyo", value: 120, color: "#2C3E50" },
        { title: "San Francisco", value: 80, color: "#FC4349" },
        { title: "New York", value: 70, color: "#6DBCDB" },
        { title: "London", value: 50, color: "#F7E248" },
        { title: "Sydney", value: 40, color: "#D7DADB" },
        { title: "Berlin", value: 20, color: "#FFF" }
    ]);
});
</script>
<script src="{{ asset(mix('js/drawDoughnutChart.js')) }}"></script>
@endsection
