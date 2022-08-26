@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Students') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($responseSucess)
                                    @if ($responseSucess === true)
                                        <div class="alert alert-danger">
                                            ok
                                        </div>
                                    @endif

                                @endisset
                                <p>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        New Student
                                    </button>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body mb-4">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    {{ dd($errors, $errors->any(), $errors->all()) }}
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action={{ route('students.store') }} method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input name="first_name" type="text" class="form-control" id="firstName"
                                                    aria-describedby="firstNameHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input name="nif" type="text" class="form-control" id="lastName"
                                                    aria-describedby="lastNameHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="InputEmail" class="form-label">Email address</label>
                                                <input name="email" type="email" class="form-control" id="InputEmail"
                                                    aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phoneInput" class="form-label">Phone number</label>
                                                <input name="phone_num" type="phone" class="form-control" id="phoneInput"
                                                    aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fatherName" class="form-label">Father Full name</label>
                                                <input name="father_full_name" type="text" class="form-control"
                                                    id="fatherName" aria-describedby="fatherNameHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="motherName" class="form-label">Mother Full name'</label>
                                                <input name="mother_full_name" type="text" class="form-control"
                                                    id="motherName" aria-describedby="motherNameHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nifInput" class="form-label">Nif</label>
                                                <input name="nifInput" type="number" class="form-control" id="nifInput"
                                                    aria-describedby="nifInputHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="countryInput" class="form-label">Country</label>
                                                <input name="country" type="text" class="form-control" id="countryInput"
                                                    aria-describedby="countryInputHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="streetInput" class="form-label">Street Name</label>
                                                <input name="street_name" type="text" class="form-control"
                                                    id="streetInput" aria-describedby="streetInputHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="postalInput" class="form-label">Postal code</label>
                                                <input name="postal_code" type="text" class="form-control"
                                                    id="postalInput" aria-describedby="postalInputHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="courseIdInput" class="form-label">Course</label> <br>
                                                <select name="course_id" class="form-select form-select-lg mb-3"
                                                    aria-label=".form-select-lg">
                                                    <option selected></option>
                                                    <option value="M">Men</option>
                                                    <option value="W">Women</option>
                                                    <option value="O">Other</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sexInput" class="form-label">Sex</label> <br>
                                                <select name="sex" class="form-select form-select-lg mb-3"
                                                    aria-label=".form-select-lg">
                                                    <option selected></option>
                                                    <option value="M">Men</option>
                                                    <option value="W">Women</option>
                                                    <option value="O">Other</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="statusInput" class="form-label">Studying</label>
                                                <select name="status" class="form-select form-select-lg mb-3"
                                                    aria-label=".form-select-lg">
                                                    <option selected></option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                @foreach ($studentsList as $student)
                                    <ul>
                                        <li>{{ $student->first_name }}</li>
                                    </ul>
                                @endforeach
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
