@extends('Layout.navbar')

@section('content')

<div class="container-fluid" data-aos="fade-down" data-aos-duration="1000">
    <h3 class="text-dark mb-1">Add Appointment</h3>
</div>
<button class="btn btn-primary" data-aos="fade-down" data-aos-duration="1000" type="button" style="padding: 5px 10px;margin-left: 20px;margin-top: 5px;"><a href="{{route('appointments.index')}}"><span style="--bs-body-color: var(--bs-btn-color);padding-right: 0px;margin-left: 0px;margin-right: -5px;"><span style="color: rgb(255, 255, 255);">Appointment list</span></span></a></button>
<div class="card" data-aos="fade-in" data-aos-duration="1000">
    <form style="padding-left: 56px;margin-right: 68px;" method="POST" action="{{route('appointments.store')}}" data-aos="fade-in" data-aos-duration="1000">
     {{csrf_field()}}
                <div class="row">
                    <div class="col"><label class="col-form-label text-dark mb-1" >Patient ID</lable></div>
                    <div class="col"><input class="form-control text-dark mb-1" type="text" name="patient_id" required>
                    @error('patient_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col"><label class="col-form-label text-dark mb-1" >Doctor Name</lable></div>
                    <div class="col"><input class="form-control text-dark mb-1" type="text" name="doctor_name" placeholder="Search doctor.." required></div>
                    <div id="doctor_name"></div>
                </div>

                <script>
                    $(document).ready(function(){
                        $("doctor_name").on('keyup',function()){
                            var val=$(this).val();
                            $.ajax({
                                url:"{{ route('appointments.create') }}",
                                type:"GET",
                                data:{'doctor_name':value},
                                success:function(data){
                                    $(#doctor_name).html(data);
                                }
                            });
                        }
                    });
                </script>

                <div class="row">
                    <div class="col"><label class="col-form-label text-dark mb-1">Appointment Date</lable></div>
                        <div class="col">
                            <select id="available_day" name="date" class="form-control">
                                <option value="select day">--Select Day--</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                </div>

                <div class="row">
                    <div class="col"><label class="col-form-label text-dark mb-1" >Appointment Time</label></div>
                    <div class="col">
                    <select id="available_time" name="available_time" class="form-control">
                        <option value="select time">--Select Time--</option>
                        <option value="from 8.00 AM to 10.00 AM ">from 8.00 AM to 10.00 AM </option>
                        <option value="from 10.00 AM to 12.00 PM">from 10.00 AM to 12.00 PM</option>
                        <option value="from 12.00 PM to 2.00 PM">from 12.00 PM to 2.00 PM</option>
                        <option value="from 2.00 PM to 4.00 PM">from 2.00 PM to 4.00 PM</option>
                        <option value="from 4.00 PM to 6.00 PM">from 4.00 PM to 6.00 PM</option>
                        <option value="from 6.00 PM to 8.00 PM">from 6.00 PM to 8.00 PM</option>
                        <option value="from 8.00 PM to 10.00 PM">from 8.00 PM to 10.00 PM</option>
                    </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col"><label class="col-form-label text-dark mb-1" >Problem</label></div>
                    <div class="col">
                        <input class="form-control text-dark mb-1" type="text" name="problem" required>
                    </div>
                </div>

</div>
<button class="btn btn-primary" id="btn_save" type="submit">Book Appointment</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</form>
@endsection
