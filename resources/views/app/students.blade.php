@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Students') }}</div>
                    <div class="card-body">
                        @if ($response)
                            <div class="alert alert-success">
                                {{ $response['message'] }} <br>
                                {{ $response['data']['student']['slug'] }} || {{ $response['data']['student']['uuid'] }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @if ($errors->has('error'))
                                    Unidentified error, please contact the staff!
                                @else
                                    {{ count($errors->all()) }} errors found in the form!
                                @endif
                            </div>
                        @endif
                        <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#allStudents" aria-expanded="false" aria-controls="allStudents">
                                All Students
                            </button>
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#newStudent" aria-expanded="false" aria-controls="newStudent">
                                New Student
                            </button>
                            <button class="btn btn-primary ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#searchStudent" aria-expanded="false" aria-controls="newStudent">
                                Search Student
                            </button>
                        </p>
                        <div class="collapse {{ $collapse == 'newStudent' ? 'show' : '' }}" id="newStudent">
                            <div class="card card-body mb-4">
                                <form action={{ route('app.student.store') }} method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input name="first_name" value="{{ old('first_name') }}" type="text"
                                            class="form-control" id="firstName" aria-describedby="firstNameHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('first_name') ? $errors->first('first_name') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input name="last_name" value="{{ old('last_name') }}" type="text"
                                            class="form-control" id="lastName" aria-describedby="lastNameHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('last_name') ? $errors->first('last_name') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputEmail" class="form-label">Email address</label>
                                        <input name="email" value="{{ old('email') }}" type="email"
                                            class="form-control" id="InputEmail" aria-describedby="emailHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('email') ? $errors->first('email') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phoneInput" class="form-label">Phone number</label>
                                        <input name="phone_num" value="{{ old('phone_num') }}" type="phone"
                                            class="form-control" id="phoneInput" aria-describedby="emailHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('phone_num') ? $errors->first('phone_num') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fatherName" class="form-label">Father Full name</label>
                                        <input name="father_full_name" value="{{ old('father_full_name') }}" type="text"
                                            class="form-control" id="fatherName" aria-describedby="fatherNameHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('father_full_name') ? $errors->first('father_full_name') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="motherName" class="form-label">Mother Full name'</label>
                                        <input name="mother_full_name" value="{{ old('mother_full_name') }}" type="text"
                                            class="form-control" id="motherName" aria-describedby="motherNameHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('mother_full_name') ? $errors->first('mother_full_name') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nifInput" class="form-label">Nif</label>
                                        <input name="nif" value="{{ old('nif') }}" type="number"
                                            class="form-control" id="nifInput" aria-describedby="nifInputHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('nif') ? $errors->first('nif') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Country</label>
                                        <input name="country" value="{{ old('country') }}" type="text"
                                            class="form-control" id="countryInput" aria-describedby="countryInputHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('country') ? $errors->first('country') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="streetInput" class="form-label">Street Name</label>
                                        <input name="street_name" value="{{ old('street_name') }}" type="text"
                                            class="form-control" id="streetInput" aria-describedby="streetInputHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('street_name') ? $errors->first('street_name') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postalInput" class="form-label">Postal code</label>
                                        <input name="postal_code" value="{{ old('postal_code') }}" type="text"
                                            class="form-control" id="postalInput" aria-describedby="postalInputHelp">
                                        <div class="text-danger">
                                            {{ $errors->has('postal_code') ? $errors->first('postal_code') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseIdInput" class="form-label">Course</label> <br>
                                        <select name="course_id" class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg">
                                            <option selected></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course['id'] }}"
                                                    {{ old('course_id') == $course['id'] ? 'selected' : '' }}>
                                                    {{ Str::ucfirst($course['name']) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            {{ $errors->has('course_id') ? $errors->first('course_id') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sexInput" class="form-label">Sex</label> <br>
                                        <select name="sex" class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg">
                                            <option selected></option>
                                            <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>
                                                Men</option>
                                            <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>
                                                Women</option>
                                            <option value="O" {{ old('sex') == 'O' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        <div class="text-danger">
                                            {{ $errors->has('sex') ? $errors->first('sex') : '' }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusInput" class="form-label">Studying</label>
                                        <select name="status" class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg">
                                            <option selected></option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        <div class="text-danger">
                                            {{ $errors->has('status') ? $errors->first('status') : '' }}
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="collapse {{ $collapse == 'allStudents' ? 'show' : '' }}" id="allStudents">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Studying</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Course</th>
                                        <th scope="col"> </th>
                                        <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($students as $student)
                                        <tr>
                                            <th scope="row">{{ $student['id'] }}</th>
                                            <td>{{ $student['first_name'] }}</td>
                                            <td>{{ $student['status'] }}</td>
                                            <td>{{ $student['email'] }}</td>
                                            <td>{{ $student['country'] }}</td>
                                            <td>{{ $student['course_id'] }}</td>
                                            <td> <a href=""></a><button type="button"
                                                    class="btn btn-primary">Edit</button></td>
                                            <td> <a href=""><button type="button"
                                                        class="btn btn-danger">Del</button></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="collapse {{ $collapse == 'searchStudent' ? 'show' : '' }}" id="searchStudent">
                            <select name="car" multiple>
                                <option value="Volvo">Volvo</option>
                                <option value="Thar">Thar</option>
                                <option value="Audi">Audi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
