@extends('layouts.app')
@section('title', $title)

@section('vendors-style')
<link rel="stylesheet" href="{{ asset('vendors/ag-grid/ag-grid.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/ag-grid/ag-theme_material.css') }}">

<style>
    .ag-theme-material .ag-filter-toolpanel-header, .ag-theme-material .ag-filter-toolpanel-search, .ag-theme-material .ag-header-row, .ag-theme-material .ag-panel-title-bar-title, .ag-theme-material .ag-side-button-button, .ag-theme-material .ag-status-bar{
        background-color: #f9f9f9 !important;
    }

    #current-page{
        background-color: #1ABBB9;
        background: #1ABBB9;
        color: #fff;
    }

    #current-page, .ag-paging-number{
        padding: 8px 10px;
        border-radius: 8px;
    }

    .ag-paging-number{
        background-color: #F1F7FF;
    }
</style>
@endsection

@section('content')
<div class="mr-5">
    <div class="header-content">
        <h3 class="font-weight-600">Student List</h3>
    
        <button class="btn btn-primary btn-add font-weight-600">Add a new student</button>
    </div>
    
    <div class="content">

        <div class="filters-section flex-column flex-md-row">
            <div class="filters-child mb-3 mb-md-0 font-12">
                <label for="pageSize" class="mb-0 mr-2 font-size-sm">Show</label>
                <select name="pageSize" id="pageSize" class="custom-select mr-2">
                    @for($i=0;$i < count($pagesize['options']); $i++)
                    <option value="{{ $pagesize['options'][$i] }}">{{ $pagesize['options'][$i] }}</option>
                    @endfor
                </select>
                <label for="pageSize" class="mb-0 font-size-sm">entries</label>
            </div>

            <div class="filters-child">
                <div class="position-relative mr-2">
                    <input type="text" 
                        name="search-filter" 
                        class="form-control font-size-sm" 
                        id="search-filter" 
                        placeholder="Search name, email, or etc.">
                    <span class="position-absolute icon"><i data-feather="search"></i></span>
                </div>
            </div>
        </div>

        <x-atoms.ag-grid />
    </div>
</div>

<!-- The Modal -->
<form class="modal" 
    id="form-submit">
    
    @csrf

    <div class="modal-content px-4 py-3">
        <div class="modal-header">      
            <div class="d-flex flex-column w-100">
                <div class="field-container">
                    <input class="form-control" 
                        id="full_name" 
                        name="full_name" 
                        type="full_name"
                        placeholder=" "
                        autocomplete="off">
                    <label class="field-placeholder" 
                        for="full_name">Full Name</label>
                </div>
                <div class="field-container">
                    <input class="form-control" 
                        id="email" 
                        name="email" 
                        type="email"
                        placeholder=" "
                        autocomplete="off">
                    <label class="field-placeholder" 
                        for="email">Email Address</label>
                </div>
                <div class="field-container">
                    <input class="form-control" 
                        id="contact" 
                        name="contact" 
                        type="text"
                        placeholder=" "
                        autocomplete="off">
                    <label class="field-placeholder" 
                        for="contact">Contact</label>
                </div>
                <div class="field-container">
                    <input class="form-control" 
                        id="region" 
                        name="region" 
                        type="text"
                        placeholder=" "
                        autocomplete="off">
                    <label class="field-placeholder" 
                        for="region">Region</label>
                </div>
                <div class="field-container">
                    <select name="course_id" id="course_id" class="form-control custom-select">
                        <option value="">--Select Course--</option>
                    </select>
                    <label class="field-placeholder" 
                        for="course">Course</label>
                </div>
                <div class="field-container">
                    <input class="form-control" 
                        id="section" 
                        name="section" 
                        type="text"
                        placeholder=" "
                        autocomplete="off">
                    <label class="field-placeholder" 
                        for="section">Section</label>
                </div>
                @method("PUT")
                {{-- student ID --}}
                <input type="hidden" name="student_id" id="student_id" value="">
                {{-- auth ID --}}
                <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" 
                class="btn btn-danger" 
                id="btn-cancel">Cancel</button>

            <button type="button" 
                class="btn btn-success text-white" 
                id="btn-submit">Submit</button>
            
        </div>
    </div>
</form>
<!-- Ends here -->

<br>
@endsection

@section('vendors-script')
<script src="{{ asset('vendors/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('vendors/ag-grid/ag-grid.js') }}"></script>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>

<script type="text/javascript">
var token = $('meta[name=csrf]').attr('content');

$.ajax({
    url: 'api/students',
    type: 'GET',
    dataType: 'json',
    success: (response) => {
        initAgGrid(response, true);

        var content = "";
        for (course of response.courses) {
            console.log(course);
            content += '<option value="'+course.id+'">'+course.name+'</option>'; 
        }

        $('#course_id').append(content);
    }
});

$('.btn-add').on('click', function(){
    $('#form-submit').attr('style', 'display: flex;');
});

$('#btn-submit').on('click', function(){
    var route = ($('#student_id').val() != "") ? "/api/students/update" : "/api/students/store";
    var type = ($('#student_id').val() != "") ? 'PUT' : 'POST';

    $.ajax({
        url: route,
        type: type,
        data: {
            full_name: $('#full_name').val(),
            email: $('#email').val(),
            contact: $('#contact').val(),
            region: $('#region').val(),
            course_id: $('#course_id').val(),
            section: $('#section').val(),
            id: $('#id').val(), // Auth ID
            student_id: $("#student_id").val(), // Student ID
            _token: token
        },
        success : function(response){
            if(response.is_success){
                alert(response.message);

                window.location.href = '/students';
            }else{
                alert(response.message);
            }
        }
    });
});

</script>
@endsection