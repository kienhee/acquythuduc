@extends('layouts.admin.index')
@section('title', 'View contact')

@section('content')
    <x-breadcrumb parentName="Contacts" parentLink="dashboard.contact.index" childrenName="View contact" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Subject: {{ $contact->subject }}" link="dashboard.contact.index"
                    linkName="All Categories" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label"> Name:</label>
                            <input class="form-control " type="text" id="name" value="{{ $contact->full_name }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label"> Email:</label>
                            <input class="form-control " type="text" id="email" value="{{ $contact->email }}" />
                        </div>

                        <div class=" mb-3 col-md-12">
                            <label for="content" class="form-label">Content:</label>
                            <textarea class="form-control " rows="5" placeholder="Up to 255 characters">{{ $contact->message }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
