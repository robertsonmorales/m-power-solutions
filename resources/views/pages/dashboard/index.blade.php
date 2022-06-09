@extends('layouts.app')
@section('title', $title)

@section('content')
<div class="">
    <div class="d-grid">
        {{-- Cards --}}
        <div class="grid-card-group">
            <h3 class="font-weight-600">Knowledge Base</h3>

            <div class="grid-items">
                <x-molecules.dashboard-card 
                    class="card d-cards bg-cards-primary"
                    text="Student"
                    textClass="text-primary"
                    mode="primary" />

                <x-molecules.dashboard-card 
                    class="card d-cards bg-cards-danger"
                    text="Drop Out"
                    textClass="text-danger"
                    mode="danger" />
                    
                <x-molecules.dashboard-card 
                    class="card d-cards bg-cards-warning"
                    text="Pending"
                    textClass="text-warning"
                    mode="warning" />

                <x-molecules.dashboard-card 
                    class="card d-cards bg-cards-success"
                    text="Audit files"
                    textClass="text-success"
                    mode="success" />

                <div class="blur-end"></div>
            </div>
        </div>

        {{-- User Profile --}}

        <div class="d-flex flex-column justify-content-start">
            <div class="d-flex justify-content-between align-items-start">
                <h3>User Profile</h3>
                <span><em data-feather="chevron-right"></em></span>
            </div>

            <div class="user-profile bg-light border-radius px-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/profile.png') }}"
                        alt="profile"
                        width="48"
                        height="48">
                    <div class="ml-2 d-flex flex-column">
                        <h4 class="font-16 font-weight-600 mb-0">Maharrm Hasanli</h4>
                        <span class="text-muted font-light font-12">maga.hesenli@gmail.com</span>
                    </div>
                </div>
                <div class="user-layout">
                    <div class="items">
                        <span class="font-14">Terms:</span>
                        <span class="h4 font-weight-600 mb-0">5</span>
                    </div>
                    <div class="divider"></div>
                    <div class="items">
                        <span class="font-14">Lessons:</span>
                        <span class="h4 font-weight-600 mb-0">98</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistic --}}
        <div class="grid-statistic border-radius">
            <div class="title-with-filter px-4 pt-4">
                <h3 class="mb-0">Statistic</h3>
                <div class="navigator">
                    <em data-feather="chevron-left"></em>
                    <span class="font-14">Aug 2021</span>
                    <em data-feather="chevron-right"></em>
                </div>
            </div>

            <div class="chart p-3">
                <div id="revenue-chart" 
                    class="revenue-chart" 
                    style="width: 100%; height: 100%;"></div>
            </div>
        </div>

        {{-- Quarterly Exam --}}
        <div class="grid-quarterly-exam">
            <h3>Quarterly Exam</h3>

            <div class="grid-exams">

                <div class="d-flex align-items-start justify-content-between p-4 border-radius border">
                    <div class="exam-details">
                        <div class="img-wrapper img-wrapper-warning">
                            <img src="{{ asset('images/dashboard/exams/headphones.svg') }}"
                                alt="headphones"
                                width="24"
                                height="23">
                        </div>
                    
                        <div class="h4 font-weight-600">
                            <div class="rate font-16">15%</div>
                            <div class="rate font-14">Listening</div>
                        </div>
    
                        <div class="h4 font-12">20 Student</div>
                    </div>

                    <div class="more-vertical">
                        <img src="{{ asset('images/dashboard/exams/more-vertical.svg') }}" 
                            alt="more vertical"
                            height="18"
                            width="4">
                    </div>
                </div>
                
                <div class="d-flex align-items-start justify-content-between p-4 border-radius border">
                    <div class="exam-details">
                        <div class="img-wrapper img-wrapper-danger">
                            <img src="{{ asset('images/dashboard/exams/ruler&pen.svg') }}"
                                alt="ruler&pen"
                                width="24"
                                height="23">
                        </div>
                    
                        <div class="h4 font-weight-600">
                            <div class="rate font-16">32%</div>
                            <div class="rate font-14">Grammar</div>
                        </div>
    
                        <div class="h4 font-12">80 Student</div>
                    </div>

                    <div class="more-vertical">
                        <img src="{{ asset('images/dashboard/exams/more-vertical.svg') }}" 
                            alt="more vertical"
                            height="18"
                            width="4">
                    </div>
                </div>

                <div class="d-flex align-items-start justify-content-between p-4 border-radius border">
                    <div class="exam-details">
                        <div class="img-wrapper img-wrapper-info">
                            <img src="{{ asset('images/dashboard/exams/microphone.svg') }}"
                                alt="microphone"
                                width="24"
                                height="23">
                        </div>
                    
                        <div class="h4 font-weight-600">
                            <div class="rate font-16">21%</div>
                            <div class="rate font-14">Pronunciation</div>
                        </div>
    
                        <div class="h4 font-12">20 Student</div>
                    </div>

                    <div class="more-vertical">
                        <img src="{{ asset('images/dashboard/exams/more-vertical.svg') }}" 
                            alt="more vertical"
                            height="18"
                            width="4">
                    </div>
                </div>

                <div class="d-flex align-items-start justify-content-between p-4 border-radius border">
                    <div class="exam-details">
                        <div class="img-wrapper img-wrapper-success">
                            <img src="{{ asset('images/dashboard/exams/headphones.svg') }}"
                                alt="microphone"
                                width="24"
                                height="23">
                        </div>
                    
                        <div class="h4 font-weight-600 ">
                            <div class="rate font-16">64%</div>
                            <div class="rate font-14">Dictionary</div>
                        </div>
    
                        <div class="h4 font-12">20 Student</div>
                    </div>

                    <div class="more-vertical">
                        <img src="{{ asset('images/dashboard/exams/more-vertical.svg') }}" 
                            alt="more vertical"
                            height="18"
                            width="4">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('vendors-script')
<script src="{{ asset('vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('vendors/axios/axios.min.js') }}"></script>
<script src="{{ asset('vendors/jquery/jquery-3.4.1.min.js') }}"></script>
@endsection

@section('scripts')
<script src="{{ asset('js/charts/statistics.js') }}"></script>
@endsection