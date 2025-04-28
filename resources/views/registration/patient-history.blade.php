@extends('layouts.app')

@section('title')
    Patient History
@endsection

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">User Name</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">History</li>
                            @include('components.sweet_alert')
                        </ol>
                    </div>
                </div>
            </div>
        </div>



        <div class="app-content ">
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-3 mb-4">
                    <div class="app-content">
                        <div class="container-fluid">
                            <div class="row mt-2">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-primary shadow-sm">
                                            <i class="bi bi-calendar3"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Session</span>
                                            <span class="info-box-number">
                                                10
                                                <small></small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-primary shadow-sm">
                                            <i class="bi bi-calendar-event"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Running Session</span>
                                            <span class="info-box-number">5</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-success shadow-sm">
                                            <i class="bi bi-cash-stack"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Package</span>
                                            <span class="info-box-number">760</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-warning shadow-sm">
                                            <i class="bi bi-wallet2"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Due Amount</span>
                                            <span class="info-box-number">2,000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title">Patient Report</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="text-center">
                                                        <strong>From : 1 Jan, 2023 - 30 Jul, 2023</strong>
                                                    </p>
                                                    <div id="sales-chart"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-center"><strong>Completion</strong></p>
                                                    <div class="progress-group">
                                                        Patient Feedback
                                                        <span class="float-end"><b>80</b>/100</span>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar text-bg-primary" style="width: 80%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="">
                                                        <div class="info-box mt-3 text-bg-success">
                                                            <span class="info-box-icon"> <i class="bi bi-check-circle"></i>
                                                            </span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-number mt-0"> Consent Sign &nbsp; <i
                                                                        class="bi bi-download"></i></span>
                                                            </div>
                                                        </div>
                                                    </a>

                                                    {{--
                                                    <div class="info-box mt-3 text-bg-danger">
                                                        <span class="info-box-icon"> <i class="bi bi-x-circle"></i>
                                                        </span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-number mt-0">Consent Not Sign</span>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="app-content-header">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="mb-0">Timeline</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="app-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="timeline">
                                                    <div class="time-label"><span class="text-bg-danger">10 Feb. 2023</span>
                                                    </div>

                                                    <div>
                                                        <i class="timeline-icon bi bi-envelope text-bg-primary"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"> <i class="bi bi-clock-fill"></i> 12:05
                                                            </span>
                                                            <h3 class="timeline-header">
                                                                <a href="#">Support Team</a> sent you an email
                                                            </h3>
                                                            <div class="timeline-body">
                                                                Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                                zoodles, weebly ning
                                                                heekya handango imeem plugg dopplr jibjab, movity jajah
                                                                plickers sifteo
                                                                edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo
                                                                ideeli hulu weebly
                                                                balihoo...
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a class="btn btn-primary btn-sm">Read more</a>
                                                                <a class="btn btn-danger btn-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <i class="timeline-icon bi bi-person text-bg-success"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"> <i class="bi bi-clock-fill"></i> 5 mins
                                                                ago </span>
                                                            <h3 class="timeline-header no-border">
                                                                <a href="#">Sarah Young</a> accepted your friend
                                                                request
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="timeline-icon bi bi-chat-text-fill text-bg-warning"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"> <i class="bi bi-clock-fill"></i> 27 mins
                                                                ago </span>
                                                            <h3 class="timeline-header">
                                                                <a href="#">Jay White</a> commented on your post
                                                            </h3>
                                                            <div class="timeline-body">
                                                                Take me to your leader! Switzerland is small and neutral! We
                                                                are more like
                                                                Germany, ambitious and misunderstood!
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a class="btn btn-warning btn-sm">View comment</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label"><span class="text-bg-success">3 Jan.
                                                            2023</span></div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="timeline-icon bi bi-camera text-bg-primary"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"> <i class="bi bi-clock-fill"></i> 2 days
                                                                ago </span>
                                                            <h3 class="timeline-header"><a href="#">Mina Lee</a>
                                                                uploaded new photos</h3>
                                                            <div class="timeline-body">
                                                                <img src="../../../dist/assets/img/user1-128x128.jpg"
                                                                    alt="..." />
                                                                <img src="../../../dist/assets/img/user1-128x128.jpg"
                                                                    alt="..." />
                                                                <img src="../../../dist/assets/img/user1-128x128.jpg"
                                                                    alt="..." />
                                                                <img src="../../../dist/assets/img/user1-128x128.jpg"
                                                                    alt="..." />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="timeline-icon bi bi-camera-film text-bg-info"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"> <i class="bi bi-clock-fill"></i> 5 days
                                                                ago </span>
                                                            <h3 class="timeline-header"><a href="#">Mr. Doe</a>
                                                                shared a video</h3>
                                                            <div class="timeline-body">
                                                                <div class="ratio ratio-16x9">
                                                                    <iframe src="https://www.youtube.com/embed/tMWkeBIohBs"
                                                                        allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a href="#" class="btn btn-sm text-bg-warning"> See
                                                                    comments </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <div><i class="timeline-icon bi bi-clock-fill text-bg-secondary"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!--end::Container-->
                                </div>

                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Container-->
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection


@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
        const sales_chart_options = {
            series: [{
                name: 'From Patient',
                data: [28, 48, 90, 19, 86, 27, 90],
            }, ],
            chart: {
                height: 180,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ['#0d6efd'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
            },
            xaxis: {
                type: 'datetime',
                categories: [
                    '2023-01-01',
                    '2023-02-01',
                    '2023-03-01',
                    '2023-04-01',
                    '2023-05-01',
                    '2023-06-01',
                    '2023-07-01',
                ],
            },
            tooltip: {
                x: {
                    format: 'MMMM yyyy',
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector('#sales-chart'),
            sales_chart_options,
        );
        sales_chart.render();
    </script>
@endsection
