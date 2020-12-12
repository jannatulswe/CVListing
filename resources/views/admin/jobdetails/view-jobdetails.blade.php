<div class="modal fade" id="viewModal{{$jobdetails->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Job Title
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->job_title}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Company Name
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->company_name}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Vacancy
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->vacancy}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Job Responsibilities
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->job_responsibilities}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Employment Status
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->employee_status}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Educational Requirements
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->educational_requirement}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Experience Requirements
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->experience_requirement}}
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Additional Requirements
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->additional_requirement}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Job Location
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->job_location}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3" style="border: 1px solid black">
                        Salary
                    </div>
                    <div class="col-md-9" style="border: 1px solid black">
                        {{$jobdetails->salary}}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

